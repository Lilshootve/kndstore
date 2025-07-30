<?php
// KND Store - Test de Configuración

// Incluir configuración
require_once 'includes/config.php';

echo "<!DOCTYPE html>";
echo "<html lang='es'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "<title>Test de Configuración - KND Store</title>";
echo "<style>";
echo "body { font-family: Arial, sans-serif; margin: 20px; background: #1a1a1a; color: #fff; }";
echo ".test-section { background: #2c2c2c; padding: 20px; margin: 10px 0; border-radius: 10px; }";
echo ".success { border-left: 5px solid #00ff00; }";
echo ".error { border-left: 5px solid #ff0000; }";
echo ".warning { border-left: 5px solid #ffff00; }";
echo ".info { border-left: 5px solid #00bfff; }";
echo "</style>";
echo "</head>";
echo "<body>";

echo "<h1>🧪 Test de Configuración - KND Store</h1>";

// Test 1: Configuración básica
echo "<div class='test-section info'>";
echo "<h2>📋 Configuración Básica</h2>";
echo "<p><strong>SITE_NAME:</strong> " . SITE_NAME . "</p>";
echo "<p><strong>SITE_URL:</strong> " . SITE_URL . "</p>";
echo "<p><strong>SITE_EMAIL:</strong> " . SITE_EMAIL . "</p>";
echo "<p><strong>DB_NAME:</strong> " . DB_NAME . "</p>";
echo "<p><strong>DB_USER:</strong> " . DB_USER . "</p>";
echo "</div>";

// Test 2: Conexión a base de datos
echo "<div class='test-section'>";
echo "<h2>🗄️ Test de Conexión a Base de Datos</h2>";
$pdo = getDBConnection();
if ($pdo) {
    echo "<p class='success'>✅ Conexión a base de datos exitosa</p>";
    
    // Test de consulta simple
    try {
        $stmt = $pdo->query("SELECT VERSION() as version");
        $result = $stmt->fetch();
        echo "<p><strong>Versión MySQL:</strong> " . $result['version'] . "</p>";
    } catch (Exception $e) {
        echo "<p class='error'>❌ Error en consulta: " . $e->getMessage() . "</p>";
    }
} else {
    echo "<p class='error'>❌ Error de conexión a base de datos</p>";
}
echo "</div>";

// Test 3: Funciones de seguridad
echo "<div class='test-section'>";
echo "<h2>🛡️ Test de Funciones de Seguridad</h2>";

// Test cleanInput
$testInput = "<script>alert('xss')</script>";
$cleaned = cleanInput($testInput);
if ($cleaned !== $testInput) {
    echo "<p class='success'>✅ cleanInput() funcionando correctamente</p>";
} else {
    echo "<p class='error'>❌ cleanInput() no está funcionando</p>";
}

// Test generateCSRFToken
$token = generateCSRFToken();
if (strlen($token) === 64) {
    echo "<p class='success'>✅ generateCSRFToken() funcionando correctamente</p>";
} else {
    echo "<p class='error'>❌ generateCSRFToken() no está funcionando</p>";
}

// Test verifyCSRFToken
if (verifyCSRFToken($token)) {
    echo "<p class='success'>✅ verifyCSRFToken() funcionando correctamente</p>";
} else {
    echo "<p class='error'>❌ verifyCSRFToken() no está funcionando</p>";
}

echo "</div>";

// Test 4: Funciones de rendimiento
echo "<div class='test-section'>";
echo "<h2>⚡ Test de Funciones de Rendimiento</h2>";

// Test startPerformanceTimer
$startTime = startPerformanceTimer();
sleep(1); // Simular trabajo
$executionTime = endPerformanceTimer($startTime);
if ($executionTime > 0) {
    echo "<p class='success'>✅ Timer de rendimiento funcionando: {$executionTime}ms</p>";
} else {
    echo "<p class='error'>❌ Timer de rendimiento no está funcionando</p>";
}

// Test setCacheHeaders
if (function_exists('setCacheHeaders')) {
    echo "<p class='success'>✅ setCacheHeaders() disponible</p>";
} else {
    echo "<p class='error'>❌ setCacheHeaders() no disponible</p>";
}

// Test minifyCSS
$testCSS = "body { color: red; } /* comentario */";
$minified = minifyCSS($testCSS);
if (strlen($minified) < strlen($testCSS)) {
    echo "<p class='success'>✅ minifyCSS() funcionando correctamente</p>";
} else {
    echo "<p class='warning'>⚠️ minifyCSS() no está optimizando</p>";
}

echo "</div>";

// Test 5: Headers de seguridad
echo "<div class='test-section'>";
echo "<h2>🔒 Test de Headers de Seguridad</h2>";

$headers = headers_list();
$securityHeaders = [
    'X-Content-Type-Options',
    'X-Frame-Options',
    'X-XSS-Protection',
    'Referrer-Policy',
    'Permissions-Policy'
];

foreach ($securityHeaders as $header) {
    $found = false;
    foreach ($headers as $h) {
        if (stripos($h, $header) !== false) {
            $found = true;
            break;
        }
    }
    if ($found) {
        echo "<p class='success'>✅ Header de seguridad: {$header}</p>";
    } else {
        echo "<p class='warning'>⚠️ Header de seguridad faltante: {$header}</p>";
    }
}

echo "</div>";

// Test 6: Configuración de sesiones
echo "<div class='test-section'>";
echo "<h2>🔐 Test de Configuración de Sesiones</h2>";

if (session_status() === PHP_SESSION_ACTIVE) {
    echo "<p class='success'>✅ Sesión activa</p>";
} else {
    echo "<p class='error'>❌ Sesión no activa</p>";
}

$sessionConfig = [
    'session.cookie_httponly' => ini_get('session.cookie_httponly'),
    'session.use_only_cookies' => ini_get('session.use_only_cookies'),
    'session.cookie_secure' => ini_get('session.cookie_secure'),
    'session.cookie_samesite' => ini_get('session.cookie_samesite')
];

foreach ($sessionConfig as $setting => $value) {
    if ($value == '1' || $value == 'Strict') {
        echo "<p class='success'>✅ {$setting}: {$value}</p>";
    } else {
        echo "<p class='warning'>⚠️ {$setting}: {$value}</p>";
    }
}

echo "</div>";

// Test 7: Extensiones PHP
echo "<div class='test-section'>";
echo "<h2>🔧 Test de Extensiones PHP</h2>";

$requiredExtensions = ['pdo', 'pdo_mysql', 'zlib', 'json', 'mbstring'];
foreach ($requiredExtensions as $ext) {
    if (extension_loaded($ext)) {
        echo "<p class='success'>✅ Extensión {$ext} cargada</p>";
    } else {
        echo "<p class='error'>❌ Extensión {$ext} no disponible</p>";
    }
}

echo "</div>";

// Test 8: Permisos de directorios
echo "<div class='test-section'>";
echo "<h2>📁 Test de Permisos de Directorios</h2>";

$directories = ['cache', 'logs', 'backups'];
foreach ($directories as $dir) {
    if (!is_dir($dir)) {
        if (mkdir($dir, 0755, true)) {
            echo "<p class='success'>✅ Directorio {$dir} creado</p>";
        } else {
            echo "<p class='error'>❌ No se pudo crear directorio {$dir}</p>";
        }
    } else {
        if (is_writable($dir)) {
            echo "<p class='success'>✅ Directorio {$dir} existe y es escribible</p>";
        } else {
            echo "<p class='warning'>⚠️ Directorio {$dir} existe pero no es escribible</p>";
        }
    }
}

echo "</div>";

// Resumen final
echo "<div class='test-section info'>";
echo "<h2>📊 Resumen del Test</h2>";
echo "<p><strong>Fecha:</strong> " . date('Y-m-d H:i:s') . "</p>";
echo "<p><strong>PHP Version:</strong> " . PHP_VERSION . "</p>";
echo "<p><strong>Server:</strong> " . $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown' . "</p>";
echo "<p><strong>Memory Usage:</strong> " . round(memory_get_usage() / 1024 / 1024, 2) . " MB</p>";
echo "</div>";

echo "</body>";
echo "</html>";
?> 