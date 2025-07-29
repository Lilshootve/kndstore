<?php
// KND Store - Header común

// Verificar si la sesión ya está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Función para obtener el título de la página
function getPageTitle($title = '') {
    $baseTitle = 'KND Store - Tu Tienda Galáctica';
    return $title ? "$title - $baseTitle" : $baseTitle;
}

// Función para obtener la URL base
function getBaseUrl() {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    $path = dirname($_SERVER['SCRIPT_NAME']);
    return "$protocol://$host$path";
}

// Función para verificar si es la página actual
function isCurrentPage($page) {
    $currentPage = basename($_SERVER['PHP_SELF']);
    return $currentPage === $page;
}

// Función para generar meta tags
function generateMetaTags($title = '', $description = '', $keywords = '') {
    $defaultDescription = 'Tu tienda galáctica de productos únicos y tecnología de vanguardia. Descubre un universo de posibilidades.';
    $defaultKeywords = 'KND Store, tienda galáctica, productos únicos, tecnología, vanguardia';
    
    $meta = '';
    $meta .= '<meta charset="UTF-8">' . "\n";
    $meta .= '<meta name="viewport" content="width=device-width, initial-scale=1.0">' . "\n";
    $meta .= '<meta name="description" content="' . ($description ?: $defaultDescription) . '">' . "\n";
    $meta .= '<meta name="keywords" content="' . ($keywords ?: $defaultKeywords) . '">' . "\n";
    $meta .= '<meta name="author" content="KND Store">' . "\n";
    $meta .= '<meta name="robots" content="index, follow">' . "\n";
    
    // Open Graph tags
    $meta .= '<meta property="og:title" content="' . getPageTitle($title) . '">' . "\n";
    $meta .= '<meta property="og:description" content="' . ($description ?: $defaultDescription) . '">' . "\n";
    $meta .= '<meta property="og:type" content="website">' . "\n";
    $meta .= '<meta property="og:url" content="' . getBaseUrl() . '">' . "\n";
    $meta .= '<meta property="og:site_name" content="KND Store">' . "\n";
    
    return $meta;
}

// Función para generar los enlaces CSS y JS comunes
function generateCommonAssets() {
    $assets = '';
    
    // Google Fonts
    $assets .= '<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Inter:wght@400;600&display=swap" rel="stylesheet">' . "\n";
    
    // Bootstrap CSS
    $assets .= '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">' . "\n";
    
    // Font Awesome
    $assets .= '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">' . "\n";
    
    // Custom CSS
    $assets .= '<link rel="stylesheet" href="assets/css/style.css">' . "\n";
    
    return $assets;
}

// Función para generar el favicon
function generateFavicon() {
    return '<link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">' . "\n";
}

// Función para generar el header completo
function generateHeader($title = '', $description = '', $keywords = '') {
    $header = '<!DOCTYPE html>' . "\n";
    $header .= '<html lang="es" data-bs-theme="dark">' . "\n";
    $header .= '<head>' . "\n";
    $header .= generateMetaTags($title, $description, $keywords);
    $header .= generateFavicon();
    $header .= generateCommonAssets();
    $header .= '<title>' . getPageTitle($title) . '</title>' . "\n";
    $header .= '</head>' . "\n";
    $header .= '<body>' . "\n";
    
    return $header;
}

// Función para generar la navegación
function generateNavigation() {
    $nav = '<nav class="navbar navbar-expand-lg navbar-dark fixed-top">' . "\n";
    $nav .= '    <div class="container">' . "\n";
    $nav .= '        <a class="navbar-brand" href="index.php">' . "\n";
    $nav .= '            <img src="assets/images/knd-logo.png" alt="KND Store" height="40">' . "\n";
    $nav .= '        </a>' . "\n";
    $nav .= '        ' . "\n";
    $nav .= '        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">' . "\n";
    $nav .= '            <span class="navbar-toggler-icon"></span>' . "\n";
    $nav .= '        </button>' . "\n";
    $nav .= '        ' . "\n";
    $nav .= '        <div class="collapse navbar-collapse" id="navbarNav">' . "\n";
    $nav .= '            <ul class="navbar-nav me-auto">' . "\n";
    $nav .= '                <li class="nav-item">' . "\n";
    $nav .= '                    <a class="nav-link ' . (isCurrentPage('index.php') ? 'active' : '') . '" href="index.php">Inicio</a>' . "\n";
    $nav .= '                </li>' . "\n";
    $nav .= '                <li class="nav-item">' . "\n";
    $nav .= '                    <a class="nav-link ' . (isCurrentPage('products.php') ? 'active' : '') . '" href="products.php">Productos</a>' . "\n";
    $nav .= '                </li>' . "\n";
    $nav .= '                <li class="nav-item">' . "\n";
    $nav .= '                    <a class="nav-link ' . (isCurrentPage('about.php') ? 'active' : '') . '" href="about.php">Nosotros</a>' . "\n";
    $nav .= '                </li>' . "\n";
    $nav .= '                <li class="nav-item">' . "\n";
    $nav .= '                    <a class="nav-link ' . (isCurrentPage('contact.php') ? 'active' : '') . '" href="contact.php">Contacto</a>' . "\n";
    $nav .= '                </li>' . "\n";
    $nav .= '            </ul>' . "\n";
    $nav .= '            ' . "\n";
    $nav .= '            <ul class="navbar-nav">' . "\n";
    
    // Verificar si el usuario está logueado
    if (isset($_SESSION['user_id'])) {
        $nav .= '                <li class="nav-item dropdown">' . "\n";
        $nav .= '                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">' . "\n";
        $nav .= '                        <i class="fas fa-user"></i> ' . htmlspecialchars($_SESSION['user_name']) . "\n";
        $nav .= '                    </a>' . "\n";
        $nav .= '                    <ul class="dropdown-menu">' . "\n";
        $nav .= '                        <li><a class="dropdown-item" href="profile.php">Mi Perfil</a></li>' . "\n";
        $nav .= '                        <li><a class="dropdown-item" href="orders.php">Mis Pedidos</a></li>' . "\n";
        $nav .= '                        <li><a class="dropdown-item" href="cart.php">Carrito</a></li>' . "\n";
        $nav .= '                        <li><hr class="dropdown-divider"></li>' . "\n";
        $nav .= '                        <li><a class="dropdown-item" href="logout.php">Cerrar Sesión</a></li>' . "\n";
        $nav .= '                    </ul>' . "\n";
        $nav .= '                </li>' . "\n";
    } else {
        $nav .= '                <li class="nav-item">' . "\n";
        $nav .= '                    <a class="nav-link" href="login.php">Iniciar Sesión</a>' . "\n";
        $nav .= '                </li>' . "\n";
        $nav .= '                <li class="nav-item">' . "\n";
        $nav .= '                    <a class="nav-link" href="register.php">Registrarse</a>' . "\n";
        $nav .= '                </li>' . "\n";
    }
    
    $nav .= '            </ul>' . "\n";
    $nav .= '        </div>' . "\n";
    $nav .= '    </div>' . "\n";
    $nav .= '</nav>' . "\n";
    
    return $nav;
}
?> 