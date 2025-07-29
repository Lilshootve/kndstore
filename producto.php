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

// Obtener el slug del producto desde la URL
$slug = isset($_GET['slug']) ? $_GET['slug'] : '';

// Array de productos con slugs
$productos = [
    'formateo-limpieza-pc' => [
        'id' => 1,
        'nombre' => 'Formateo y limpieza de PC (Remoto)',
        'descripcion' => 'Recupera el rendimiento de tu PC desde la comodidad de tu nave.<br><br>Incluye:<br>• Formateo completo del sistema<br>• Instalación de Windows limpio<br>• Instalación de drivers actualizados<br>• Optimización de rendimiento<br>• Limpieza de archivos temporales<br>• Configuración de seguridad básica',
        'precio' => 10.00,
        'imagen' => 'assets/images/productos/formateo-limpieza-pc-remoto.png',
        'categoria' => 'tecnologia',
        'slug' => 'formateo-limpieza-pc'
    ],
    'instalacion-windows-drivers' => [
        'id' => 2,
        'nombre' => 'Instalación de Windows + Drivers',
        'descripcion' => 'Sistema operativo listo para despegar. Configuración limpia y segura.<br><br>Incluye:<br>• Instalación de Windows 10/11<br>• Instalación de todos los drivers<br>• Activación del sistema<br>• Configuración inicial<br>• Instalación de actualizaciones críticas',
        'precio' => 8.00,
        'imagen' => 'assets/images/productos/instalacion-windows-drivers.png',
        'categoria' => 'tecnologia',
        'slug' => 'instalacion-windows-drivers'
    ],
    'optimizacion-gamer' => [
        'id' => 3,
        'nombre' => 'Optimización Gamer (FPS, temperaturas, disco)',
        'descripcion' => 'Tu PC, afinada para dominar la galaxia del gaming.<br><br>Incluye:<br>• Optimización de FPS en juegos<br>• Control de temperaturas<br>• Optimización del disco duro/SSD<br>• Configuración de gráficos<br>• Optimización de memoria RAM<br>• Configuración de overclock seguro',
        'precio' => 5.00,
        'imagen' => 'assets/images/productos/optimizacion-gamer-fps-temperaturas-disco.png',
        'categoria' => 'tecnologia',
        'slug' => 'optimizacion-gamer'
    ],
    'activacion-juegos-giftcards' => [
        'id' => 4,
        'nombre' => 'Activación de Juegos y Gift Cards',
        'descripcion' => 'Claves para Steam, PSN, Xbox, Riot y más. Entrega directa.<br><br>Plataformas disponibles:<br>• Steam<br>• PlayStation Network<br>• Xbox Live<br>• Riot Games<br>• Epic Games<br>• Nintendo eShop<br>• Origin/EA Play',
        'precio' => 3.00,
        'imagen' => 'assets/images/productos/activacion-juegos-giftcards.png',
        'categoria' => 'gaming',
        'slug' => 'activacion-juegos-giftcards'
    ],
    'asesoria-pc-gamer' => [
        'id' => 5,
        'nombre' => 'Asesoría para PC Gamer (Presupuesto personalizado)',
        'descripcion' => '¿Tienes $300 o $3000? Te armamos la build perfecta.<br><br>Incluye:<br>• Análisis de necesidades<br>• Selección de componentes<br>• Verificación de compatibilidad<br>• Lista de compra optimizada<br>• Guía de ensamblaje<br>• Soporte post-compra',
        'precio' => 5.00,
        'imagen' => 'assets/images/productos/asesoria-pc-gamer-presupuesto.png',
        'categoria' => 'gaming',
        'slug' => 'asesoria-pc-gamer'
    ],
    'death-roll-crate' => [
        'id' => 6,
        'nombre' => 'Death Roll Crate (Caja misteriosa)',
        'descripcion' => 'Llave, wallpaper, avatar… ¿o meme cósmico? Nunca lo sabrás.<br><br>Contenido aleatorio:<br>• Claves de juegos<br>• Wallpapers personalizados<br>• Avatares gamer<br>• Memes galácticos<br>• Descuentos especiales<br>• Contenido exclusivo KND',
        'precio' => 2.00,
        'imagen' => 'assets/images/productos/death-roll-crate-caja-misteriosa.png',
        'categoria' => 'gaming',
        'slug' => 'death-roll-crate'
    ],
    'wallpaper-personalizado' => [
        'id' => 7,
        'nombre' => 'Wallpaper personalizado estilo KND',
        'descripcion' => 'Tu fondo, tu nave. Generado a medida.<br><br>Incluye:<br>• Diseño personalizado<br>• Múltiples resoluciones<br>• Estilo galáctico KND<br>• Versión móvil incluida<br>• Archivos en alta calidad<br>• Modificaciones gratuitas',
        'precio' => 4.00,
        'imagen' => 'assets/images/productos/wallpaper-personalizado-knd.png',
        'categoria' => 'accesorios',
        'slug' => 'wallpaper-personalizado'
    ],
    'avatar-personalizado' => [
        'id' => 8,
        'nombre' => 'Avatar gamer personalizado',
        'descripcion' => 'Crea tu imagen digital con estilo galáctico.<br><br>Incluye:<br>• Diseño único<br>• Múltiples formatos<br>• Estilo KND galáctico<br>• Versiones para redes sociales<br>• Archivos editables<br>• Modificaciones incluidas',
        'precio' => 6.00,
        'imagen' => 'assets/images/productos/avatar-gamer-personalizado.png',
        'categoria' => 'accesorios',
        'slug' => 'avatar-personalizado'
    ],
    'icon-pack-knd' => [
        'id' => 9,
        'nombre' => 'Icon Pack edición especial',
        'descripcion' => 'Reinventa tu escritorio con estética cósmica.<br><br>Incluye:<br>• Pack completo de iconos<br>• Estilo galáctico KND<br>• Múltiples tamaños<br>• Instrucciones de instalación<br>• Iconos personalizables<br>• Soporte técnico',
        'precio' => 3.00,
        'imagen' => 'assets/images/productos/icon-pack-edicion-especial.png',
        'categoria' => 'accesorios',
        'slug' => 'icon-pack-knd'
    ],
    'instalacion-software' => [
        'id' => 10,
        'nombre' => 'Instalación de Office, Adobe, OBS, etc.',
        'descripcion' => 'Programas listos para usar. Te lo dejo full operativo.<br><br>Software disponible:<br>• Microsoft Office<br>• Adobe Creative Suite<br>• OBS Studio<br>• Antivirus<br>• Navegadores<br>• Herramientas de desarrollo',
        'precio' => 5.00,
        'imagen' => 'assets/images/productos/instalacion-programas-office-adobe-obs.png',
        'categoria' => 'software',
        'slug' => 'instalacion-software'
    ],
    'pc-ready-pack' => [
        'id' => 11,
        'nombre' => 'PC Ready Pack (software + configuración)',
        'descripcion' => 'Todo instalado, optimizado y listo para jugar o trabajar.<br><br>Incluye:<br>• Instalación de Windows<br>• Todos los drivers<br>• Software esencial<br>• Optimización completa<br>• Configuración de seguridad<br>• Backup del sistema',
        'precio' => 10.00,
        'imagen' => 'assets/images/productos/pc-ready-pack-software-configuracion.png',
        'categoria' => 'software',
        'slug' => 'pc-ready-pack'
    ],
    'tutorial-knd' => [
        'id' => 12,
        'nombre' => 'Mini tutorial PDF o video express',
        'descripcion' => '¿No sabes algo? Te lo explico claro y con estilo.<br><br>Formatos disponibles:<br>• PDF detallado<br>• Video tutorial<br>• Guía paso a paso<br>• Screenshots explicativos<br>• Ejemplos prácticos<br>• Soporte adicional',
        'precio' => 2.00,
        'imagen' => 'assets/images/productos/mini-tutorial-pdf-video-express.png',
        'categoria' => 'software',
        'slug' => 'tutorial-knd'
    ],
    'compatibilidad-piezas' => [
        'id' => 13,
        'nombre' => 'Compatibilidad de piezas (¿funcionan juntas?)',
        'descripcion' => 'Evita errores antes de comprar. Te lo confirmo todo.<br><br>Verificación incluye:<br>• Compatibilidad de CPU y motherboard<br>• Compatibilidad de RAM<br>• Compatibilidad de GPU<br>• Compatibilidad de fuente<br>• Compatibilidad de gabinete<br>• Recomendaciones de mejora',
        'precio' => 3.00,
        'imagen' => 'assets/images/productos/compatibilidad-piezas-pc.png',
        'categoria' => 'hardware',
        'slug' => 'compatibilidad-piezas'
    ],
    'simulacion-build' => [
        'id' => 14,
        'nombre' => 'Simulación de Build con PDF personalizado',
        'descripcion' => 'Lista completa + imagen de referencia para tu futura nave.<br><br>Incluye:<br>• Lista completa de componentes<br>• Imagen de referencia<br>• Análisis de precios<br>• Alternativas sugeridas<br>• Guía de ensamblaje<br>• Estimación de rendimiento',
        'precio' => 7.00,
        'imagen' => 'assets/images/productos/simulacion-build-pdf-personalizado.png',
        'categoria' => 'hardware',
        'slug' => 'simulacion-build'
    ],
    'analisis-pc' => [
        'id' => 15,
        'nombre' => 'Análisis de rendimiento de tu PC actual',
        'descripcion' => '¿Funciona bien o le falta potencia? Lo analizamos contigo.<br><br>Análisis incluye:<br>• Rendimiento de CPU<br>• Rendimiento de GPU<br>• Análisis de memoria RAM<br>• Velocidad de almacenamiento<br>• Temperaturas del sistema<br>• Recomendaciones de mejora',
        'precio' => 5.00,
        'imagen' => 'assets/images/productos/analisis-rendimiento-pc.png',
        'categoria' => 'hardware',
        'slug' => 'analisis-pc'
    ]
];

// Buscar el producto por slug
$producto = null;
if (isset($productos[$slug])) {
    $producto = $productos[$slug];
}

// Si no se encuentra el producto, redirigir a la página principal
if (!$producto) {
    header('Location: /products.php');
    exit();
}

// Generar mensaje de WhatsApp
$mensaje_whatsapp = urlencode("Hola, me interesa el servicio: " . $producto['nombre'] . " - $" . number_format($producto['precio'], 2));
$link_whatsapp = "https://wa.me/584246661334?text=" . $mensaje_whatsapp;

?>

<?php echo generateHeader($producto['nombre'], 'Detalles del servicio ' . $producto['nombre'] . ' - KND Store'); ?>

<!-- Particles Background -->
<div id="particles-bg"></div>

<?php echo generateNavigation(); ?>

<!-- Hero Section -->
<section class="hero-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="/index.php">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="/products.php">Catálogo</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($producto['nombre']); ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Producto Detalle -->
<section class="product-detail-section py-5">
    <div class="container">
        <div class="row">
            <!-- Imagen del Producto -->
            <div class="col-lg-6 mb-4">
                <div class="product-image-container">
                    <img src="<?php echo $producto['imagen']; ?>" 
                         alt="<?php echo htmlspecialchars($producto['nombre']); ?>" 
                         class="product-detail-image">
                </div>
            </div>
            
            <!-- Información del Producto -->
            <div class="col-lg-6">
                <div class="product-info-container">
                    <h1 class="product-title"><?php echo htmlspecialchars($producto['nombre']); ?></h1>
                    
                    <div class="product-price-container">
                        <span class="product-price">$<?php echo number_format($producto['precio'], 2); ?></span>
                    </div>
                    
                    <div class="product-description">
                        <?php echo $producto['descripcion']; ?>
                    </div>
                    
                    <div class="product-actions mt-4">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <a href="<?php echo $link_whatsapp; ?>" 
                                   class="btn btn-whatsapp btn-lg w-100" 
                                   target="_blank">
                                    <i class="fab fa-whatsapp me-2"></i>
                                    Solicitar por WhatsApp
                                </a>
                            </div>
                            <div class="col-md-6 mb-3">
                                <button class="btn btn-discord btn-lg w-100" 
                                        onclick="copyDiscordServer()">
                                    <i class="fab fa-discord me-2"></i>
                                    Contactar por Discord
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="product-meta mt-4">
                        <div class="category-badge">
                            <i class="fas fa-tag me-2"></i>
                            <?php echo ucfirst($producto['categoria']); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Botón Volver -->
        <div class="row mt-5">
            <div class="col-12 text-center">
                <a href="/products.php" class="btn btn-outline-neon btn-lg">
                    <i class="fas fa-arrow-left me-2"></i>
                    Volver a la tienda
                </a>
            </div>
        </div>
    </div>
</section>

<script>
function copyDiscordServer() {
    navigator.clipboard.writeText('knd_store').then(function() {
        // Mostrar notificación
        const notification = document.createElement('div');
        notification.className = 'discord-notification';
        notification.innerHTML = '<i class="fab fa-discord me-2"></i>Servidor copiado: knd_store';
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.remove();
        }, 3000);
    }).catch(function(err) {
        console.error('Error al copiar: ', err);
        alert('Servidor Discord: knd_store');
    });
}
</script>

<?php 
echo generateFooter();
echo generateScripts();
?> 