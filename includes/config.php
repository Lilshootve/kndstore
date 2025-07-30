<?php
// KND Store - Configuración Principal

// Configuración de errores
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Configuración de zona horaria
date_default_timezone_set('America/Mexico_City');

// Configuración de seguridad mejorada - PRODUCCIÓN
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_secure', 1); // Habilitado para HTTPS en producción
ini_set('session.cookie_samesite', 'Strict');
ini_set('session.gc_maxlifetime', 3600);
ini_set('session.use_strict_mode', 1);

// Configuración de compresión - DESHABILITADA TEMPORALMENTE
// if (extension_loaded('zlib')) {
//     ini_set('zlib.output_compression', 1);
//     ini_set('zlib.output_compression_level', 6);
// }

// Headers de seguridad
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');
header('Referrer-Policy: strict-origin-when-cross-origin');
header('Permissions-Policy: geolocation=(), microphone=(), camera=()');

// Configuración de base de datos - PRODUCCIÓN (HOSTINGER)
define('DB_HOST', 'srv1710.hstgr.io');
define('DB_NAME', 'u354862096_kndstore');
define('DB_USER', 'u354862096_lilshoot');
define('DB_PASS', 'Cdrcn2577$');
define('DB_CHARSET', 'utf8mb4');

// Configuración de la aplicación - PRODUCCIÓN
define('SITE_NAME', 'KND Store');
define('SITE_URL', 'https://kndstore.com');
define('SITE_EMAIL', 'support@kndstore.com');

// Configuración de seguridad
define('HASH_COST', 12);
define('SESSION_TIMEOUT', 3600); // 1 hora
define('MAX_LOGIN_ATTEMPTS', 5);
define('LOGIN_TIMEOUT', 900); // 15 minutos

// Configuración de rendimiento
define('ENABLE_CACHE', true);
define('CACHE_TTL', 3600); // 1 hora
define('ENABLE_COMPRESSION', false); // Deshabilitado temporalmente
define('ENABLE_MINIFICATION', true);

// Función de conexión a la base de datos
function getDBConnection() {
    try {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
        $pdo = new PDO($dsn, DB_USER, DB_PASS, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);
        return $pdo;
    } catch (PDOException $e) {
        error_log("Error de conexión a la base de datos: " . $e->getMessage());
        return false;
    }
}

// Función para limpiar datos de entrada
function cleanInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Función para generar token CSRF
function generateCSRFToken() {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

// Función para verificar token CSRF
function verifyCSRFToken($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

// Función para verificar si el usuario está logueado
function isLoggedIn() {
    return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
}

// Función para obtener información del usuario actual
function getCurrentUser() {
    if (!isLoggedIn()) {
        return false;
    }
    
    $pdo = getDBConnection();
    if (!$pdo) {
        return false;
    }
    
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    return $stmt->fetch();
}

// Función para redirigir
function redirect($url) {
    header("Location: $url");
    exit();
}

// Función para mostrar mensajes de error
function showError($message) {
    return "<div class='alert alert-danger'>$message</div>";
}

// Función para mostrar mensajes de éxito
function showSuccess($message) {
    return "<div class='alert alert-success'>$message</div>";
}

// Función para formatear precio
function formatPrice($price) {
    return '$' . number_format($price, 2);
}

// Función para generar slug
function generateSlug($string) {
    $string = strtolower($string);
    $string = preg_replace('/[^a-z0-9\s-]/', '', $string);
    $string = preg_replace('/[\s-]+/', '-', $string);
    return trim($string, '-');
}

// Función para validar email
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Función para validar contraseña
function validatePassword($password) {
    // Mínimo 8 caracteres, al menos una letra y un número
    return strlen($password) >= 8 && 
           preg_match('/[A-Za-z]/', $password) && 
           preg_match('/[0-9]/', $password);
}

// Función para hashear contraseña
function hashPassword($password) {
    return password_hash($password, PASSWORD_BCRYPT, ['cost' => HASH_COST]);
}

// Función para verificar contraseña
function verifyPassword($password, $hash) {
    return password_verify($password, $hash);
}

// Función para obtener productos destacados
function getFeaturedProducts($limit = 6) {
    $pdo = getDBConnection();
    if (!$pdo) {
        return [];
    }
    
    $stmt = $pdo->prepare("SELECT * FROM products WHERE featured = 1 AND active = 1 ORDER BY created_at DESC LIMIT ?");
    $stmt->execute([$limit]);
    return $stmt->fetchAll();
}

// Función para obtener categorías
function getCategories() {
    $pdo = getDBConnection();
    if (!$pdo) {
        return [];
    }
    
    $stmt = $pdo->prepare("SELECT * FROM categories WHERE active = 1 ORDER BY name");
    $stmt->execute();
    return $stmt->fetchAll();
}

// Función para obtener productos por categoría
function getProductsByCategory($categoryId, $limit = 12) {
    $pdo = getDBConnection();
    if (!$pdo) {
        return [];
    }
    
    $stmt = $pdo->prepare("SELECT * FROM products WHERE category_id = ? AND active = 1 ORDER BY created_at DESC LIMIT ?");
    $stmt->execute([$categoryId, $limit]);
    return $stmt->fetchAll();
}

// Función para buscar productos
function searchProducts($query, $limit = 12) {
    $pdo = getDBConnection();
    if (!$pdo) {
        return [];
    }
    
    $searchTerm = "%$query%";
    $stmt = $pdo->prepare("SELECT * FROM products WHERE (name LIKE ? OR description LIKE ?) AND active = 1 ORDER BY created_at DESC LIMIT ?");
    $stmt->execute([$searchTerm, $searchTerm, $limit]);
    return $stmt->fetchAll();
}

// Función para obtener carrito del usuario
function getUserCart($userId) {
    $pdo = getDBConnection();
    if (!$pdo) {
        return [];
    }
    
    $stmt = $pdo->prepare("
        SELECT c.*, p.name, p.price, p.image 
        FROM cart c 
        JOIN products p ON c.product_id = p.id 
        WHERE c.user_id = ?
    ");
    $stmt->execute([$userId]);
    return $stmt->fetchAll();
}

// Función para agregar al carrito
function addToCart($userId, $productId, $quantity = 1) {
    $pdo = getDBConnection();
    if (!$pdo) {
        return false;
    }
    
    // Verificar si el producto ya está en el carrito
    $stmt = $pdo->prepare("SELECT * FROM cart WHERE user_id = ? AND product_id = ?");
    $stmt->execute([$userId, $productId]);
    $existingItem = $stmt->fetch();
    
    if ($existingItem) {
        // Actualizar cantidad
        $stmt = $pdo->prepare("UPDATE cart SET quantity = quantity + ? WHERE user_id = ? AND product_id = ?");
        return $stmt->execute([$quantity, $userId, $productId]);
    } else {
        // Agregar nuevo item
        $stmt = $pdo->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)");
        return $stmt->execute([$userId, $productId, $quantity]);
    }
}

// Función para actualizar cantidad en carrito
function updateCartQuantity($userId, $productId, $quantity) {
    $pdo = getDBConnection();
    if (!$pdo) {
        return false;
    }
    
    if ($quantity <= 0) {
        // Eliminar item
        $stmt = $pdo->prepare("DELETE FROM cart WHERE user_id = ? AND product_id = ?");
        return $stmt->execute([$userId, $productId]);
    } else {
        // Actualizar cantidad
        $stmt = $pdo->prepare("UPDATE cart SET quantity = ? WHERE user_id = ? AND product_id = ?");
        return $stmt->execute([$quantity, $userId, $productId]);
    }
}

// Función para limpiar carrito
function clearCart($userId) {
    $pdo = getDBConnection();
    if (!$pdo) {
        return false;
    }
    
    $stmt = $pdo->prepare("DELETE FROM cart WHERE user_id = ?");
    return $stmt->execute([$userId]);
}

// Función para calcular total del carrito
function getCartTotal($userId) {
    $cart = getUserCart($userId);
    $total = 0;
    
    foreach ($cart as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    
    return $total;
}

// Función para crear pedido
function createOrder($userId, $shippingAddress, $paymentMethod) {
    $pdo = getDBConnection();
    if (!$pdo) {
        return false;
    }
    
    try {
        $pdo->beginTransaction();
        
        // Crear pedido
        $stmt = $pdo->prepare("
            INSERT INTO orders (user_id, total, shipping_address, payment_method, status) 
            VALUES (?, ?, ?, ?, 'pending')
        ");
        $total = getCartTotal($userId);
        $stmt->execute([$userId, $total, $shippingAddress, $paymentMethod]);
        $orderId = $pdo->lastInsertId();
        
        // Agregar items del pedido
        $cart = getUserCart($userId);
        foreach ($cart as $item) {
            $stmt = $pdo->prepare("
                INSERT INTO order_items (order_id, product_id, quantity, price) 
                VALUES (?, ?, ?, ?)
            ");
            $stmt->execute([$orderId, $item['product_id'], $item['quantity'], $item['price']]);
        }
        
        // Limpiar carrito
        clearCart($userId);
        
        $pdo->commit();
        return $orderId;
    } catch (Exception $e) {
        $pdo->rollBack();
        error_log("Error al crear pedido: " . $e->getMessage());
        return false;
    }
}

// Función para obtener pedidos del usuario
function getUserOrders($userId) {
    $pdo = getDBConnection();
    if (!$pdo) {
        return [];
    }
    
    $stmt = $pdo->prepare("SELECT * FROM orders WHERE user_id = ? ORDER BY created_at DESC");
    $stmt->execute([$userId]);
    return $stmt->fetchAll();
}

// Función para obtener detalles del pedido
function getOrderDetails($orderId) {
    $pdo = getDBConnection();
    if (!$pdo) {
        return false;
    }
    
    $stmt = $pdo->prepare("
        SELECT o.*, oi.*, p.name, p.image 
        FROM orders o 
        JOIN order_items oi ON o.id = oi.order_id 
        JOIN products p ON oi.product_id = p.id 
        WHERE o.id = ?
    ");
    $stmt->execute([$orderId]);
    return $stmt->fetchAll();
}

// ===== FUNCIONES DE RENDIMIENTO =====

// Configuración de cache de navegador
function setCacheHeaders($type = 'default') {
    if (!ENABLE_CACHE) return;
    
    $cacheConfig = [
        'css' => [
            'max-age' => 31536000, // 1 año
            'public' => true,
            'immutable' => true
        ],
        'js' => [
            'max-age' => 31536000, // 1 año
            'public' => true,
            'immutable' => true
        ],
        'images' => [
            'max-age' => 2592000, // 30 días
            'public' => true
        ],
        'html' => [
            'max-age' => 3600, // 1 hora
            'public' => true
        ],
        'default' => [
            'max-age' => 86400, // 1 día
            'public' => true
        ]
    ];
    
    $config = $cacheConfig[$type] ?? $cacheConfig['default'];
    
    $headers = [];
    $headers[] = 'Cache-Control: ' . 
                 ($config['public'] ? 'public' : 'private') . ', ' .
                 'max-age=' . $config['max-age'];
    
    if (isset($config['immutable'])) {
        $headers[] = 'Cache-Control: immutable';
    }
    
    foreach ($headers as $header) {
        header($header);
    }
}

// Configuración de optimización de imágenes
function optimizeImageHeaders($filename) {
    $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    
    switch ($extension) {
        case 'png':
            header('Content-Type: image/png');
            setCacheHeaders('images');
            break;
        case 'jpg':
        case 'jpeg':
            header('Content-Type: image/jpeg');
            setCacheHeaders('images');
            break;
        case 'gif':
            header('Content-Type: image/gif');
            setCacheHeaders('images');
            break;
        case 'svg':
            header('Content-Type: image/svg+xml');
            setCacheHeaders('images');
            break;
        case 'webp':
            header('Content-Type: image/webp');
            setCacheHeaders('images');
            break;
    }
}

// Configuración de minificación
function minifyCSS($css) {
    if (!ENABLE_MINIFICATION) return $css;
    
    // Remover comentarios
    $css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);
    // Remover espacios en blanco
    $css = preg_replace('/\s+/', ' ', $css);
    // Remover espacios alrededor de caracteres especiales
    $css = preg_replace('/\s*([{}:;,])\s*/', '$1', $css);
    // Remover espacios al final de líneas
    $css = preg_replace('/;\s*}/', '}', $css);
    return trim($css);
}

function minifyJS($js) {
    if (!ENABLE_MINIFICATION) return $js;
    
    // Remover comentarios de una línea
    $js = preg_replace('/\/\/.*$/m', '', $js);
    // Remover comentarios multilínea
    $js = preg_replace('/\/\*.*?\*\//s', '', $js);
    // Remover espacios en blanco extra
    $js = preg_replace('/\s+/', ' ', $js);
    return trim($js);
}

// Configuración de precarga de recursos
function generatePreloadHeaders() {
    $preloadResources = [
        'https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Inter:wght@400;600&display=swap' => 'style',
        '/assets/css/style.css' => 'style',
        '/assets/js/main.js' => 'script',
        '/assets/images/knd-logo.png' => 'image'
    ];
    
    $headers = [];
    foreach ($preloadResources as $resource => $type) {
        $headers[] = "Link: <$resource>; rel=preload; as=$type";
    }
    
    return $headers;
}

// Configuración de compresión de respuesta
function compressResponse($content) {
    if (!ENABLE_COMPRESSION || !extension_loaded('zlib') || ini_get('zlib.output_compression')) {
        return $content;
    }
    
    $content = gzencode($content, 6);
    header('Content-Encoding: gzip');
    header('Vary: Accept-Encoding');
    return $content;
}

// Configuración de monitoreo de rendimiento
function startPerformanceTimer() {
    return microtime(true);
}

function endPerformanceTimer($startTime) {
    $endTime = microtime(true);
    $executionTime = ($endTime - $startTime) * 1000; // Convertir a milisegundos
    
    if ($executionTime > 1000) { // Si toma más de 1 segundo
        error_log("Performance Warning: Page took {$executionTime}ms to load");
    }
    
    return $executionTime;
}

// Configuración de cache de consultas
function getCachedQuery($key, $callback, $ttl = null) {
    if (!$ttl) $ttl = CACHE_TTL;
    
    $cacheFile = "cache/query_" . md5($key) . ".cache";
    
    if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < $ttl) {
        return unserialize(file_get_contents($cacheFile));
    }
    
    $result = $callback();
    
    if (!is_dir('cache')) {
        mkdir('cache', 0755, true);
    }
    
    file_put_contents($cacheFile, serialize($result));
    
    return $result;
}

// Configuración de optimización de sesiones
function optimizeSessionHandling() {
    // Configurar garbage collection de sesiones
    ini_set('session.gc_probability', 1);
    ini_set('session.gc_divisor', 100);
    ini_set('session.gc_maxlifetime', SESSION_TIMEOUT);
    
    // Configurar almacenamiento de sesiones
    if (is_writable('/tmp')) {
        ini_set('session.save_handler', 'files');
        ini_set('session.save_path', '/tmp');
    }
}

// Configuración de headers de seguridad adicionales
function setSecurityHeaders() {
    $headers = [
        'X-Content-Type-Options: nosniff',
        'X-Frame-Options: DENY',
        'X-XSS-Protection: 1; mode=block',
        'Referrer-Policy: strict-origin-when-cross-origin',
        'Permissions-Policy: geolocation=(), microphone=(), camera=()',
        'Strict-Transport-Security: max-age=31536000; includeSubDomains',
        'Content-Security-Policy: default-src \'self\'; script-src \'self\' \'unsafe-inline\' https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https://fonts.googleapis.com; style-src \'self\' \'unsafe-inline\' https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https://fonts.googleapis.com; font-src \'self\' https://fonts.gstatic.com; img-src \'self\' data: https:; connect-src \'self\';'
    ];
    
    foreach ($headers as $header) {
        header($header);
    }
}

// Inicializar optimizaciones
optimizeSessionHandling();
setSecurityHeaders();
?> 