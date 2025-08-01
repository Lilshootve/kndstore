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

// Array de productos reales organizados por categorías
$productos = [
    'tecnologia' => [
        [
            'id' => 1,
            'nombre' => 'Formateo y limpieza de PC (Remoto)',
            'descripcion' => 'Recupera el rendimiento de tu PC desde la comodidad de tu nave.',
            'precio' => 10.00,
            'imagen' => 'assets/images/productos/formateo-limpieza-pc-remoto.png',
            'categoria' => 'tecnologia',
            'url' => '/producto/formateo-limpieza-pc',
            'slug' => 'formateo-limpieza-pc'
        ],
        [
            'id' => 2,
            'nombre' => 'Instalación de Windows + Drivers',
            'descripcion' => 'Sistema operativo listo para despegar. Configuración limpia y segura.',
            'precio' => 8.00,
            'imagen' => 'assets/images/productos/instalacion-windows-drivers.png',
            'categoria' => 'tecnologia',
            'url' => '/producto/instalacion-windows-drivers',
            'slug' => 'instalacion-windows-drivers'
        ],
        [
            'id' => 3,
            'nombre' => 'Optimización Gamer (FPS, temperaturas, disco)',
            'descripcion' => 'Tu PC, afinada para dominar la galaxia del gaming.',
            'precio' => 5.00,
            'imagen' => 'assets/images/productos/optimizacion-gamer-fps-temperaturas-disco.png',
            'categoria' => 'tecnologia',
            'url' => '/producto/optimizacion-gamer',
            'slug' => 'optimizacion-gamer'
        ]
    ],
    'gaming' => [
        [
            'id' => 4,
            'nombre' => 'Activación de Juegos y Gift Cards',
            'descripcion' => 'Claves para Steam, PSN, Xbox, Riot y más. Entrega directa.',
            'precio' => 3.00,
            'imagen' => 'assets/images/productos/activacion-juegos-giftcards.png',
            'categoria' => 'gaming',
            'url' => '/producto/activacion-juegos-giftcards',
            'slug' => 'activacion-juegos-giftcards'
        ],
        [
            'id' => 5,
            'nombre' => 'Asesoría para PC Gamer (Presupuesto personalizado)',
            'descripcion' => '¿Tienes $300 o $3000? Te armamos la build perfecta.',
            'precio' => 5.00,
            'imagen' => 'assets/images/productos/asesoria-pc-gamer-presupuesto.png',
            'categoria' => 'gaming',
            'url' => '/producto/asesoria-pc-gamer',
            'slug' => 'asesoria-pc-gamer'
        ],
        [
            'id' => 6,
            'nombre' => 'Death Roll Crate (Caja misteriosa)',
            'descripcion' => 'Llave, wallpaper, avatar… ¿o meme cósmico? Nunca lo sabrás.',
            'precio' => 2.00,
            'imagen' => 'assets/images/productos/death-roll-crate-caja-misteriosa.png',
            'categoria' => 'gaming',
            'url' => '/producto/death-roll-crate',
            'slug' => 'death-roll-crate'
        ]
    ],
    'accesorios' => [
        [
            'id' => 7,
            'nombre' => 'Wallpaper personalizado IA',
            'descripcion' => 'Tu fondo, tu nave. Generado a medida.',
            'precio' => 4.00,
            'imagen' => 'assets/images/productos/wallpaper-personalizado-knd.png',
            'categoria' => 'accesorios',
            'url' => '/producto/wallpaper-personalizado',
            'slug' => 'wallpaper-personalizado'
        ],
        [
            'id' => 8,
            'nombre' => 'Avatar gamer personalizado',
            'descripcion' => 'Crea tu imagen digital con estilo galáctico.',
            'precio' => 6.00,
            'imagen' => 'assets/images/productos/avatar-gamer-personalizado.png',
            'categoria' => 'accesorios',
            'url' => '/producto/avatar-personalizado',
            'slug' => 'avatar-personalizado'
        ],
        [
            'id' => 9,
            'nombre' => 'Icon Pack edición especial',
            'descripcion' => 'Reinventa tu escritorio con estética cósmica.',
            'precio' => 3.00,
            'imagen' => 'assets/images/productos/icon-pack-edicion-especial.png',
            'categoria' => 'accesorios',
            'url' => '/producto/icon-pack-knd',
            'slug' => 'icon-pack-knd'
        ]
    ],
    'software' => [
        [
            'id' => 10,
            'nombre' => 'Instalación de Office, Adobe, OBS, etc.',
            'descripcion' => 'Programas listos para usar. Te lo dejo full operativo.',
            'precio' => 5.00,
            'imagen' => 'assets/images/productos/instalacion-programas-office-adobe-obs.png',
            'categoria' => 'software',
            'url' => '/producto/instalacion-software',
            'slug' => 'instalacion-software'
        ],
        [
            'id' => 11,
            'nombre' => 'PC Ready Pack (software + configuración)',
            'descripcion' => 'Todo instalado, optimizado y listo para jugar o trabajar.',
            'precio' => 10.00,
            'imagen' => 'assets/images/productos/pc-ready-pack-software-configuracion.png',
            'categoria' => 'software',
            'url' => '/producto/pc-ready-pack',
            'slug' => 'pc-ready-pack'
        ],
        [
            'id' => 12,
            'nombre' => 'Mini tutorial PDF o video express',
            'descripcion' => '¿No sabes algo? Te lo explico claro y con estilo.',
            'precio' => 2.00,
            'imagen' => 'assets/images/productos/mini-tutorial-pdf-video-express.png',
            'categoria' => 'software',
            'url' => '/producto/tutorial-knd',
            'slug' => 'tutorial-knd'
        ]
    ],
    'hardware' => [
        [
            'id' => 13,
            'nombre' => 'Compatibilidad de piezas (¿funcionan juntas?)',
            'descripcion' => 'Evita errores antes de comprar. Te lo confirmo todo.',
            'precio' => 3.00,
            'imagen' => 'assets/images/productos/compatibilidad-piezas-pc.png',
            'categoria' => 'hardware',
            'url' => '/producto/compatibilidad-piezas',
            'slug' => 'compatibilidad-piezas'
        ],
        [
            'id' => 14,
            'nombre' => 'Simulación de Build con PDF personalizado',
            'descripcion' => 'Lista completa + imagen de referencia para tu futura nave.',
            'precio' => 7.00,
            'imagen' => 'assets/images/productos/simulacion-build-pdf-personalizado.png',
            'categoria' => 'hardware',
            'url' => '/producto/simulacion-build',
            'slug' => 'simulacion-build'
        ],
        [
            'id' => 15,
            'nombre' => 'Análisis de rendimiento de tu PC actual',
            'descripcion' => '¿Funciona bien o le falta potencia? Lo analizamos contigo.',
            'precio' => 5.00,
            'imagen' => 'assets/images/productos/analisis-rendimiento-pc.png',
            'categoria' => 'hardware',
            'url' => '/producto/analisis-pc',
            'slug' => 'analisis-pc'
        ]
    ]
];

// Filtros
$categoria_filtro = isset($_GET['categoria']) ? $_GET['categoria'] : '';
$busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';

// Filtrar productos
$productos_filtrados = [];
foreach ($productos as $categoria => $productos_categoria) {
    foreach ($productos_categoria as $producto) {
        $pasa_filtro = true;
        
        // Filtro por categoría
        if ($categoria_filtro && $producto['categoria'] !== $categoria_filtro) {
            $pasa_filtro = false;
        }
        
        // Filtro por búsqueda
        if ($busqueda) {
            $texto_busqueda = strtolower($busqueda);
            $texto_producto = strtolower($producto['nombre'] . ' ' . $producto['descripcion']);
            if (strpos($texto_producto, $texto_busqueda) === false) {
                $pasa_filtro = false;
            }
        }
        
        if ($pasa_filtro) {
            $productos_filtrados[] = $producto;
        }
    }
}
?>

<?php echo generateHeader('Catálogo', 'Catálogo y Servicios - KND Store - Tecnología, Gaming, Software y más'); ?>

<!-- Particles Background -->
<div id="particles-bg"></div>

<?php echo generateNavigation(); ?>

<!-- Hero Section -->
<section class="hero-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="hero-title">
                    <span class="text-gradient">Nuestro</span><br>
                    <span class="text-gradient">Catálogo</span>
                </h1>
                <p class="hero-subtitle">
                    Servicios digitales y tecnología galáctica para tu nave
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
            <div class="col-lg-8 mx-auto">
                <form method="GET" action="/products.php" class="search-form">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" name="busqueda" value="<?php echo htmlspecialchars($busqueda); ?>" 
                                   class="form-control search-input" placeholder="Buscar en el catálogo...">
                        </div>
                        <div class="col-md-4">
                            <select name="categoria" class="form-select">
                                <option value="">Todas las categorías</option>
                                <option value="tecnologia" <?php echo $categoria_filtro === 'tecnologia' ? 'selected' : ''; ?>>Tecnología</option>
                                <option value="gaming" <?php echo $categoria_filtro === 'gaming' ? 'selected' : ''; ?>>Gaming</option>
                                <option value="accesorios" <?php echo $categoria_filtro === 'accesorios' ? 'selected' : ''; ?>>Accesorios</option>
                                <option value="software" <?php echo $categoria_filtro === 'software' ? 'selected' : ''; ?>>Software</option>
                                <option value="hardware" <?php echo $categoria_filtro === 'hardware' ? 'selected' : ''; ?>>Hardware</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Productos -->
<section class="products-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="section-title text-center mb-5">
                    <?php if ($categoria_filtro): ?>
                        <?php echo ucfirst($categoria_filtro); ?>
                    <?php elseif ($busqueda): ?>
                        Resultados para "<?php echo htmlspecialchars($busqueda); ?>"
                    <?php else: ?>
                        Todo el Catálogo
                    <?php endif; ?>
                </h2>
            </div>
        </div>
        
        <?php if (empty($productos_filtrados)): ?>
            <div class="row">
                <div class="col-12 text-center">
                    <div class="no-results">
                        <i class="fas fa-search fa-3x mb-3" style="color: var(--knd-neon-blue);"></i>
                        <h3>No se encontraron servicios</h3>
                        <p>Intenta con otros términos de búsqueda o categorías</p>
                        <a href="/products.php" class="btn btn-primary">Ver todo el catálogo</a>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="row">
                <?php foreach ($productos_filtrados as $producto): ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="product-card">
                            <?php if (in_array($producto['nombre'], ['Avatar gamer personalizado', 'Wallpaper personalizado IA'])): ?>
                                <div class="product-offer-badge">Oferta</div>
                            <?php endif; ?>
                            <div class="product-image">
                                <img src="<?php echo $producto['imagen']; ?>" alt="<?php echo htmlspecialchars($producto['nombre']); ?>" 
                                     onerror="this.onerror=null; this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzAwIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDMwMCAyMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSIzMDAiIGhlaWdodD0iMjAwIiBmaWxsPSIjMmMyYzJjIi8+CjxyZWN0IHg9IjEwIiB5PSIxMCIgd2lkdGg9IjI4MCIgaGVpZ2h0PSIxODAiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzAwYmZmZiIgc3Ryb2tlLXdpZHRoPSIyIi8+CjxjaXJjbGUgY3g9IjE1MCIgY3k9IjEwMCIgcj0iMzAiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzAwYmZmZiIgc3Ryb2tlLXdpZHRoPSIzIi8+CjxwYXRoIGQ9Ik0xMzAgODAgTDE3MCA4MCBNMTMwIDEyMCBMMTcwIDEyMCIgc3Ryb2tlPSIjMDBiZmZmIiBzdHJva2Utd2lkdGg9IjIiLz4KPHN2ZyB4PSIxMjAiIHk9IjE0MCIgd2lkdGg9IjYwIiBoZWlnaHQ9IjIwIj4KICA8dGV4dCBmaWxsPSIjMDBiZmZmIiBmb250LWZhbWlseT0iQXJpYWwiIGZvbnQtc2l6ZT0iMTIiIHRleHQtYW5jaG9yPSJtaWRkbGUiPk5vIEltYWdlbjwvdGV4dD4KPC9zdmc+'; this.style.background='#2c2c2c';">
                                <div class="product-overlay">
                                    <a href="/producto.php?slug=<?php echo $producto['slug']; ?>" class="btn btn-primary">
                                        <i class="fas fa-eye me-2"></i>Ver detalles
                                    </a>
                                </div>
                            </div>
                            <div class="product-info">
                                <h5 class="product-title"><?php echo htmlspecialchars($producto['nombre']); ?></h5>
                                <p class="product-description"><?php echo htmlspecialchars($producto['descripcion']); ?></p>
                                <div class="product-footer">
                                    <?php if (in_array($producto['nombre'], ['Avatar gamer personalizado', 'Wallpaper personalizado IA'])): ?>
                                        <span class="product-price">
                                            <span class="product-price-original">$<?php echo number_format($producto['precio'], 2); ?></span>
                                            <span class="product-price-offer">$2.50</span>
                                        </span>
                                    <?php else: ?>
                                        <span class="product-price">$<?php echo number_format($producto['precio'], 2); ?></span>
                                    <?php endif; ?>
                                    <a href="/producto.php?slug=<?php echo $producto['slug']; ?>" class="btn btn-outline-neon btn-sm btn-details">
                                        Ver detalles
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php
echo generateFooter();
echo generateScripts();
?> 