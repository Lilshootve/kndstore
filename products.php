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

<?php echo generateHeader('Productos', 'Descubre nuestro catálogo galáctico de productos únicos y tecnología de vanguardia'); ?>

<!-- Particles Background -->
<div id="particles-bg"></div>

<?php echo generateNavigation(); ?>

<!-- Hero Section -->
<section class="hero-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="hero-title">
                    <span class="text-gradient">Nuestros</span><br>
                    <span class="text-gradient">Productos</span>
                </h1>
                <p class="hero-subtitle">
                    Explora nuestro catálogo galáctico de productos únicos y tecnología de vanguardia
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Categorías Destacadas -->
<section class="categories-section py-4 bg-dark-epic">
    <div class="container">
        <h2 class="section-title text-center mb-4">Categorías Destacadas</h2>
        <div class="row">
            <div class="col-lg-2 col-md-4 col-6 mb-3">
                <a href="/products.php?categoria=tecnologia" class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h5>Tecnología</h5>
                </a>
            </div>
            <div class="col-lg-2 col-md-4 col-6 mb-3">
                <a href="/products.php?categoria=gaming" class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-gamepad"></i>
                    </div>
                    <h5>Gaming</h5>
                </a>
            </div>
            <div class="col-lg-2 col-md-4 col-6 mb-3">
                <a href="/products.php?categoria=accesorios" class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h5>Accesorios</h5>
                </a>
            </div>
            <div class="col-lg-2 col-md-4 col-6 mb-3">
                <a href="/products.php?categoria=software" class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <h5>Software</h5>
                </a>
            </div>
            <div class="col-lg-2 col-md-4 col-6 mb-3">
                <a href="/products.php?categoria=hardware" class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-microchip"></i>
                    </div>
                    <h5>Hardware</h5>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Filtros y Búsqueda -->
<section class="filters-section py-4 bg-dark-epic">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="search-box">
                    <form class="d-flex" method="GET" action="products.php">
                        <input type="text" name="search" class="form-control me-2" placeholder="Buscar productos..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <select name="categoria" class="form-select" onchange="this.form.submit()">
                    <option value="">Todas las categorías</option>
                    <option value="tecnologia" <?php echo (isset($_GET['categoria']) && $_GET['categoria'] == 'tecnologia') ? 'selected' : ''; ?>>Tecnología</option>
                    <option value="gaming" <?php echo (isset($_GET['categoria']) && $_GET['categoria'] == 'gaming') ? 'selected' : ''; ?>>Gaming</option>
                    <option value="accesorios" <?php echo (isset($_GET['categoria']) && $_GET['categoria'] == 'accesorios') ? 'selected' : ''; ?>>Accesorios</option>
                    <option value="software" <?php echo (isset($_GET['categoria']) && $_GET['categoria'] == 'software') ? 'selected' : ''; ?>>Software</option>
                    <option value="hardware" <?php echo (isset($_GET['categoria']) && $_GET['categoria'] == 'hardware') ? 'selected' : ''; ?>>Hardware</option>
                </select>
            </div>
        </div>
    </div>
</section>

<!-- Productos -->
<section class="products-section py-5">
    <div class="container">
        <div class="row">
            <?php
            // Simular productos (en producción esto vendría de la base de datos)
            $products = [
                [
                    'id' => 1,
                    'name' => 'Nave Espacial Modelo X-1',
                    'description' => 'Nave espacial de alta velocidad con tecnología de propulsión cuántica. Ideal para exploración intergaláctica.',
                    'price' => 1500000,
                    'image' => '/assets/images/product-1.jpg',
                    'category' => 'tecnologia',
                    'featured' => true
                ],
                [
                    'id' => 2,
                    'name' => 'Traje Espacial Elite',
                    'description' => 'Traje espacial con protección térmica y sistema de soporte vital integrado. Máxima seguridad.',
                    'price' => 25000,
                    'image' => '/assets/images/product-2.jpg',
                    'category' => 'accesorios',
                    'featured' => true
                ],
                [
                    'id' => 3,
                    'name' => 'Comunicador Intergaláctico',
                    'description' => 'Dispositivo de comunicación que funciona en cualquier parte del universo. Conexión instantánea.',
                    'price' => 5000,
                    'image' => '/assets/images/product-3.jpg',
                    'category' => 'tecnologia',
                    'featured' => false
                ],
                [
                    'id' => 4,
                    'name' => 'Consola Gaming Galáctica',
                    'description' => 'Consola de gaming con gráficos de última generación y juegos exclusivos del universo.',
                    'price' => 800,
                    'image' => '/assets/images/product-4.jpg',
                    'category' => 'gaming',
                    'featured' => false
                ],
                [
                    'id' => 5,
                    'name' => 'Software de Navegación Cósmica',
                    'description' => 'Software avanzado para navegación espacial con mapas de todas las galaxias conocidas.',
                    'price' => 150,
                    'image' => '/assets/images/product-5.jpg',
                    'category' => 'software',
                    'featured' => false
                ],
                [
                    'id' => 6,
                    'name' => 'Procesador Cuántico KND-9000',
                    'description' => 'Procesador cuántico de última generación con capacidad de procesamiento ilimitada.',
                    'price' => 5000,
                    'image' => '/assets/images/product-6.jpg',
                    'category' => 'hardware',
                    'featured' => true
                ]
            ];

            // Filtrar productos por búsqueda
            if (isset($_GET['search']) && !empty($_GET['search'])) {
                $search = strtolower($_GET['search']);
                $products = array_filter($products, function($product) use ($search) {
                    return strpos(strtolower($product['name']), $search) !== false || 
                           strpos(strtolower($product['description']), $search) !== false;
                });
            }

            // Filtrar productos por categoría
            if (isset($_GET['categoria']) && !empty($_GET['categoria'])) {
                $categoria = $_GET['categoria'];
                $products = array_filter($products, function($product) use ($categoria) {
                    return $product['category'] === $categoria;
                });
            }

            // Mostrar productos
            foreach ($products as $product): ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="product-card">
                        <div class="product-image">
                            <img src="<?php echo $product['image']; ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="img-fluid">
                            <?php if ($product['featured']): ?>
                                <div class="featured-badge">
                                    <i class="fas fa-star"></i> Destacado
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="product-info">
                            <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                            <p><?php echo htmlspecialchars($product['description']); ?></p>
                            <div class="product-price"><?php echo formatPrice($product['price']); ?></div>
                            <div class="product-actions">
                                <a href="/product-details.php?id=<?php echo $product['id']; ?>" class="btn btn-primary">
                                    <i class="fas fa-eye"></i> Ver Detalles
                                </a>
                                <button class="btn btn-outline-neon add-to-cart" data-product-id="<?php echo $product['id']; ?>">
                                    <i class="fas fa-shopping-cart"></i> Agregar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <?php if (empty($products)): ?>
            <div class="text-center py-5">
                <i class="fas fa-search fa-3x mb-3" style="color: var(--knd-neon-blue);"></i>
                <h3>No se encontraron productos</h3>
                <p>Intenta con otros términos de búsqueda o categorías</p>
                <a href="/products.php" class="btn btn-primary">Ver Todos los Productos</a>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php 
echo generateFooter();
echo generateScripts();
?> 