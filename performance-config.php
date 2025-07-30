<?php
// KND Store - Configuración de Rendimiento

// Configuración de compresión
if (extension_loaded('zlib')) {
    ini_set('zlib.output_compression', 1);
    ini_set('zlib.output_compression_level', 6);
}

// Configuración de cache de navegador
function setCacheHeaders($type = 'default') {
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
    if (extension_loaded('zlib') && !ini_get('zlib.output_compression')) {
        $content = gzencode($content, 6);
        header('Content-Encoding: gzip');
        header('Vary: Accept-Encoding');
    }
    return $content;
}

// Configuración de optimización de base de datos
function optimizeDatabaseQueries() {
    // Configuraciones para optimizar consultas
    $optimizations = [
        'query_cache_size' => '64M',
        'query_cache_type' => '1',
        'innodb_buffer_pool_size' => '256M',
        'max_connections' => '100'
    ];
    
    return $optimizations;
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
function getCachedQuery($key, $callback, $ttl = 3600) {
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
    ini_set('session.gc_maxlifetime', 3600);
    
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