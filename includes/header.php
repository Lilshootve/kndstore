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
    $assets .= '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">' . "\n";
    
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
    $header .= '<html lang="es">' . "\n";
    $header .= '<head>' . "\n";
    $header .= generateMetaTags($title, $description, $keywords);
    $header .= generateFavicon();
    $header .= generateCommonAssets();
    $header .= '<title>' . getPageTitle($title) . '</title>' . "\n";
    $header .= '</head>' . "\n";
    $header .= '<body>' . "\n";
    
    return $header;
}
?> 