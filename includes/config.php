<?php
// KND Store - Configuración Principal (Versión Simplificada)

// Configuración de errores
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Configuración de zona horaria
date_default_timezone_set('America/Mexico_City');

// Configuración de sesión - ya se maneja en index.php
// No configurar aquí para evitar conflictos

// Headers de seguridad básicos
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');

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
    return strlen($password) >= 8 && 
           preg_match('/[A-Za-z]/', $password) && 
           preg_match('/[0-9]/', $password);
}

// Función para hashear contraseña
function hashPassword($password) {
    return password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
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

// Función simple para headers de cache
function setCacheHeaders($type = 'default') {
    // Función simplificada - no hace nada por ahora
    return;
}

// Función simple para timer de rendimiento
function startPerformanceTimer() {
    return microtime(true);
}

function endPerformanceTimer($startTime) {
    $endTime = microtime(true);
    $executionTime = ($endTime - $startTime) * 1000;
    return $executionTime;
}
?> 