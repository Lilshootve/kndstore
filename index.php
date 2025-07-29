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
?>

<?php echo generateHeader('Inicio', 'Tu tienda galáctica de productos únicos y tecnología de vanguardia'); ?>

<!-- Particles Background -->
<div id="particles-bg"></div>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="assets/images/knd-logo.png" alt="KND Store" height="40">
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link <?php echo isCurrentPage('index.php') ? 'active' : ''; ?>" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo isCurrentPage('products.php') ? 'active' : ''; ?>" href="products.php">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo isCurrentPage('about.php') ? 'active' : ''; ?>" href="about.php">Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo isCurrentPage('contact.php') ? 'active' : ''; ?>" href="contact.php">Contacto</a>
                </li>
            </ul>
            
            <ul class="navbar-nav">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user"></i> <?php echo htmlspecialchars($_SESSION['user_name']); ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="profile.php">Mi Perfil</a></li>
                            <li><a class="dropdown-item" href="orders.php">Mis Pedidos</a></li>
                            <li><a class="dropdown-item" href="cart.php">Carrito</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="logout.php">Cerrar Sesión</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Iniciar Sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Registrarse</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-6">
                <h1 class="hero-title">
                    Bienvenido a <span class="text-gradient">KND Store</span>
                </h1>
                <p class="hero-subtitle">
                    Tu tienda galáctica de productos únicos y tecnología de vanguardia. 
                    Descubre un universo de posibilidades con nuestro catálogo exclusivo.
                </p>
                <div class="hero-buttons">
                    <a href="products.php" class="btn btn-primary btn-lg">
                        <i class="fas fa-rocket"></i> Explorar Productos
                    </a>
                    <a href="about.php" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-info-circle"></i> Conoce Más
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <div class="hero-image">
                    <img src="assets/images/hero-graphic.png" alt="KND Store" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section py-5">
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
                            <a href="product-details.php?id=1" class="btn btn-primary">Ver Detalles</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-4">
            <a href="products.php" class="btn btn-outline-light btn-lg">Ver Todos los Productos</a>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <h5>KND Store</h5>
                <p>Tu tienda galáctica de productos únicos y tecnología de vanguardia. Descubre un universo de posibilidades.</p>
                <div class="social-links">
                    <a href="#" class="me-3"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="me-3"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="me-3"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="me-3"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 mb-4">
                <h5>Enlaces</h5>
                <ul class="list-unstyled">
                    <li><a href="index.php"><i class="fas fa-home"></i> Inicio</a></li>
                    <li><a href="products.php"><i class="fas fa-box"></i> Productos</a></li>
                    <li><a href="about.php"><i class="fas fa-info-circle"></i> Nosotros</a></li>
                    <li><a href="contact.php"><i class="fas fa-envelope"></i> Contacto</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <h5>Servicios</h5>
                <ul class="list-unstyled">
                    <li><a href="#"><i class="fas fa-shipping-fast"></i> Envío Galáctico</a></li>
                    <li><a href="#"><i class="fas fa-shield-alt"></i> Garantía Cósmica</a></li>
                    <li><a href="#"><i class="fas fa-headset"></i> Soporte 24/7</a></li>
                    <li><a href="#"><i class="fas fa-credit-card"></i> Pagos Seguros</a></li>
                </ul>
            </div>
            <div class="col-lg-3 mb-4">
                <h5>Contacto</h5>
                <ul class="list-unstyled">
                    <li><i class="fas fa-map-marker-alt"></i> Sector Galáctico 7, Vía Láctea</li>
                    <li><i class="fas fa-phone"></i> +1 (555) GALAXY</li>
                    <li><i class="fas fa-envelope"></i> info@kndstore.com</li>
                    <li><i class="fas fa-clock"></i> 24/7 Disponible</li>
                </ul>
            </div>
        </div>
        <hr class="my-4">
        <div class="row">
            <div class="col-md-6">
                <p>&copy; 2024 KND Store. Todos los derechos reservados.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="privacy.php" class="me-3">Política de Privacidad</a>
                <a href="terms.php" class="me-3">Términos de Servicio</a>
                <a href="sitemap.php">Mapa del Sitio</a>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Particles.js -->
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

<!-- Custom JS -->
<script src="assets/js/main.js"></script>

</body>
</html> 