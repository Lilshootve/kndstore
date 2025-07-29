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

<?php echo generateHeader('Demo de Fondos', 'Opciones de fondos para KND Store'); ?>

<!-- Particles Background -->
<div id="particles-bg"></div>

<?php echo generateNavigation(); ?>

<!-- Hero Section -->
<section class="hero-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="hero-title">
                    <span class="text-gradient">Demo de</span><br>
                    <span class="text-gradient">Fondos</span>
                </h1>
                <p class="hero-subtitle">
                    Elige el estilo que más te guste para reemplazar el fondo actual
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Opción 1: Fondo Sutil con Gradiente -->
<section class="bg-subtle-gradient py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title mb-4">Opción 1: Fondo Sutil con Gradiente</h2>
                <p class="mb-4">Gradiente suave azul a púrpura con transparencia</p>
                <div class="demo-content">
                    <h3>Contenido de ejemplo</h3>
                    <p>Este fondo es más sutil y elegante, perfecto para contenido que necesita destacar.</p>
                    <div class="demo-badge">Clase: bg-subtle-gradient</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Opción 2: Fondo Oscuro Simple -->
<section class="bg-dark-simple py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title mb-4">Opción 2: Fondo Oscuro Simple</h2>
                <p class="mb-4">Fondo negro sólido con borde sutil</p>
                <div class="demo-content">
                    <h3>Contenido de ejemplo</h3>
                    <p>Fondo minimalista que no distrae del contenido principal.</p>
                    <div class="demo-badge">Clase: bg-dark-simple</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Opción 3: Fondo con Patrón Sutil -->
<section class="bg-pattern-subtle py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title mb-4">Opción 3: Fondo con Patrón Sutil</h2>
                <p class="mb-4">Patrón de puntos muy sutil en el fondo</p>
                <div class="demo-content">
                    <h3>Contenido de ejemplo</h3>
                    <p>Agrega textura sin ser abrumador, mantiene la elegancia.</p>
                    <div class="demo-badge">Clase: bg-pattern-subtle</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Opción 4: Fondo con Líneas Suaves -->
<section class="bg-soft-lines py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title mb-4">Opción 4: Fondo con Líneas Suaves</h2>
                <p class="mb-4">Líneas diagonales muy sutiles</p>
                <div class="demo-content">
                    <h3>Contenido de ejemplo</h3>
                    <p>Dirección visual sutil que guía la mirada sin distraer.</p>
                    <div class="demo-badge">Clase: bg-soft-lines</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Opción 5: Fondo con Brillo Sutil -->
<section class="bg-subtle-glow py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title mb-4">Opción 5: Fondo con Brillo Sutil</h2>
                <p class="mb-4">Efecto de brillo muy tenue en las esquinas</p>
                <div class="demo-content">
                    <h3>Contenido de ejemplo</h3>
                    <p>Agrega profundidad sin ser llamativo, muy elegante.</p>
                    <div class="demo-badge">Clase: bg-subtle-glow</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Opción 6: Fondo Transparente -->
<section class="bg-transparent py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title mb-4">Opción 6: Fondo Transparente</h2>
                <p class="mb-4">Sin fondo, solo el fondo de partículas</p>
                <div class="demo-content">
                    <h3>Contenido de ejemplo</h3>
                    <p>Máxima simplicidad, deja que las partículas sean el protagonista.</p>
                    <div class="demo-badge">Clase: bg-transparent</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Instrucciones -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title mb-4">¿Cómo usar?</h2>
                <div class="instructions">
                    <p><strong>1.</strong> Elige el fondo que más te guste de las opciones arriba</p>
                    <p><strong>2.</strong> Copia la clase CSS (ej: bg-subtle-gradient)</p>
                    <p><strong>3.</strong> Reemplaza "bg-dark-epic" en tu sección about</p>
                    <p><strong>4.</strong> El CSS ya está incluido en style.css</p>
                </div>
                <div class="code-example mt-4">
                    <code>
                        &lt;section class="about-section py-5 bg-subtle-gradient animate"&gt;
                    </code>
                </div>
            </div>
        </div>
    </div>
</section>

<?php 
echo generateFooter();
echo generateScripts();
?> 