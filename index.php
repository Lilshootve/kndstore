<?php
session_start();
require_once 'includes/config.php';
require_once 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KND Store - Tu Tienda Galáctica</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Inter:wght@400;600&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    
    <!-- Particles.js -->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
</head>
<body>
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
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.php">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contacto</a>
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
                            <i class="fas fa-info-circle"></i> Conocer Más
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image">
                        <img src="assets/images/hero-illustration.svg" alt="KND Store" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <h3>Envío Rápido</h3>
                        <p>Entrega galáctica en tiempo récord a cualquier parte del universo.</p>
                    </div>
                </div>
                <div class="col-md-4 text-center mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3>Seguridad Total</h3>
                        <p>Protección de datos de nivel espacial con tecnología de última generación.</p>
                    </div>
                </div>
                <div class="col-md-4 text-center mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h3>Soporte 24/7</h3>
                        <p>Asistencia disponible en cualquier momento del día o noche galáctica.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="featured-products py-5">
        <div class="container">
            <h2 class="section-title text-center mb-5">Productos Destacados</h2>
            <div class="row">
                <?php
                // Aquí irían los productos destacados
                $featured_products = [
                    [
                        'id' => 1,
                        'name' => 'Nave Espacial Modelo X',
                        'price' => 999.99,
                        'image' => 'assets/images/product1.jpg',
                        'description' => 'Nave espacial de última generación con tecnología galáctica.'
                    ],
                    [
                        'id' => 2,
                        'name' => 'Traje Espacial Premium',
                        'price' => 299.99,
                        'image' => 'assets/images/product2.jpg',
                        'description' => 'Traje espacial con protección total y diseño futurista.'
                    ],
                    [
                        'id' => 3,
                        'name' => 'Comunicador Intergaláctico',
                        'price' => 199.99,
                        'image' => 'assets/images/product3.jpg',
                        'description' => 'Comunicador que conecta con cualquier parte del universo.'
                    ]
                ];

                foreach ($featured_products as $product): ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="product-card">
                            <div class="product-image">
                                <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="img-fluid">
                            </div>
                            <div class="product-info">
                                <h3><?php echo $product['name']; ?></h3>
                                <p><?php echo $product['description']; ?></p>
                                <div class="product-price">$<?php echo number_format($product['price'], 2); ?></div>
                                <a href="product.php?id=<?php echo $product['id']; ?>" class="btn btn-primary">
                                    Ver Detalles
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>KND Store</h5>
                    <p>Tu tienda galáctica de confianza. Ofrecemos los mejores productos del universo con la más alta calidad y tecnología de vanguardia.</p>
                </div>
                <div class="col-md-4">
                    <h5>Enlaces Rápidos</h5>
                    <ul class="list-unstyled">
                        <li><a href="products.php">Productos</a></li>
                        <li><a href="about.php">Nosotros</a></li>
                        <li><a href="contact.php">Contacto</a></li>
                        <li><a href="privacy.php">Política de Privacidad</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contacto</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-envelope"></i> info@kndstore.com</li>
                        <li><i class="fas fa-phone"></i> +1 (555) 123-4567</li>
                        <li><i class="fas fa-map-marker-alt"></i> Galaxia Vía Láctea</li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12 text-center">
                    <p>&copy; 2024 KND Store. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script src="assets/js/main.js"></script>
</body>
</html> 