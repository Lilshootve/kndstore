<?php
// Configuración de sesión ANTES de cargar config.php
if (session_status() == PHP_SESSION_NONE) {
    ini_set('session.cookie_httponly', 1);
    ini_set('session.use_only_cookies', 1);
    ini_set('session.cookie_secure', 0); // Cambiar a 1 en producción con HTTPS
    session_start();
} else {
    // Si la sesión ya está activa, solo la iniciamos
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}

require_once 'includes/config.php';
require_once 'includes/header.php';
require_once 'includes/footer.php';
?>

<?php echo generateHeader('Inicio', 'Tu tienda galáctica de productos únicos y tecnología de vanguardia'); ?>

<!-- Particles Background -->
<div id="particles-bg"></div>

<?php echo generateNavigation(); ?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-6">
                <h1 class="hero-title">
                    <span class="text-gradient">Bienvenido a</span><br>
                    <span class="text-gradient">KND Store</span>
                </h1>
                <p class="hero-subtitle">
                    Tu tienda galáctica de productos únicos y tecnología de vanguardia. 
                    Descubre un universo de posibilidades con nuestro catálogo exclusivo.
                </p>
                <div class="hero-buttons">
                    <a href="/products.php" class="btn btn-primary btn-lg">
                        <i class="fas fa-rocket"></i> Explorar Productos
                    </a>
                    <a href="/about.php" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-info-circle"></i> Conoce Más
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <div class="hero-image">
                    <img src="/assets/images/knd-logo.png" alt="KND Store" class="img-fluid hero-logo">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section py-5 bg-dark-epic">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="feature-card text-center">
                    <div class="feature-icon">
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                    <h3>Envío Galáctico</h3>
                    <p>Entregamos a cualquier parte del universo con nuestra tecnología de transporte espacial de última generación.</p>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="feature-card text-center">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Seguridad Cósmica</h3>
                    <p>Protegemos tus datos con tecnología de encriptación cuántica y protocolos de seguridad intergalácticos.</p>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="feature-card text-center">
                    <div class="feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3>Soporte 24/7</h3>
                    <p>Nuestro equipo de soporte está disponible las 24 horas del día, los 7 días de la semana, en todos los husos horarios.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products -->
<section class="featured-products py-5">
    <div class="container">
        <h2 class="section-title">Productos Destacados</h2>
        <div class="row">
            <?php
            // Simular productos destacados (en producción esto vendría de la base de datos)
            $featuredProducts = [
                [
                    'name' => 'Nave Espacial Modelo X-1',
                    'description' => 'Nave espacial de alta velocidad con tecnología de propulsión cuántica.',
                    'price' => 1500000,
                    'image' => 'assets/images/product-1.jpg'
                ],
                [
                    'name' => 'Traje Espacial Elite',
                    'description' => 'Traje espacial con protección térmica y sistema de soporte vital integrado.',
                    'price' => 25000,
                    'image' => 'assets/images/product-2.jpg'
                ],
                [
                    'name' => 'Comunicador Intergaláctico',
                    'description' => 'Dispositivo de comunicación que funciona en cualquier parte del universo.',
                    'price' => 5000,
                    'image' => 'assets/images/product-3.jpg'
                ]
            ];
            
            foreach ($featuredProducts as $product): ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="product-card">
                        <div class="product-image">
                            <img src="<?php echo $product['image']; ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                        </div>
                        <div class="product-info">
                            <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                            <p><?php echo htmlspecialchars($product['description']); ?></p>
                            <div class="product-price"><?php echo formatPrice($product['price']); ?></div>
                            <a href="/product-details.php?id=1" class="btn btn-primary">Ver Detalles</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-4">
            <a href="/products.php" class="btn btn-outline-light btn-lg">Ver Todos los Productos</a>
        </div>
    </div>
</section>

<?php 
echo generateFooter();
echo generateScripts();
?> 