<?php
require_once 'includes/config.php';
require_once 'includes/header.php';
require_once 'includes/footer.php';
?>

<?php echo generateHeader('Fondos Psicodélicos', 'Opciones de fondos psicodélicos y animados para KND Store'); ?>

<!-- Particles Background -->
<div id="particles-bg"></div>

<?php echo generateNavigation(); ?>

<!-- Hero Section -->
<section class="hero-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="hero-title">
                    <span class="text-gradient">Fondos</span><br>
                    <span class="text-gradient">Psicodélicos</span>
                </h1>
                <p class="hero-subtitle">
                    Opciones más intensas y animadas para un efecto visual impactante
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Opción 1: Fondo con Olas Psicodélicas -->
<section class="bg-psychedelic-waves py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title mb-4">Opción 1: Olas Psicodélicas</h2>
                <p class="mb-4">Ondas animadas con colores cambiantes y efectos de profundidad</p>
                <div class="demo-content">
                    <h3>Contenido de ejemplo</h3>
                    <p>Este fondo crea un efecto hipnótico con olas que se mueven constantemente, perfecto para secciones que necesitan llamar la atención.</p>
                    <div class="demo-badge">Clase: bg-psychedelic-waves</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Opción 2: Fondo con Partículas Flotantes -->
<section class="bg-floating-particles py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title mb-4">Opción 2: Partículas Flotantes</h2>
                <p class="mb-4">Partículas que flotan y cambian de color con movimiento suave</p>
                <div class="demo-content">
                    <h3>Contenido de ejemplo</h3>
                    <p>Efecto de partículas que se mueven de forma orgánica, creando una atmósfera mágica y envolvente.</p>
                    <div class="demo-badge">Clase: bg-floating-particles</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Opción 3: Fondo con Espirales Rotatorias -->
<section class="bg-rotating-spirals py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title mb-4">Opción 3: Espirales Rotatorias</h2>
                <p class="mb-4">Espirales que giran y cambian de tamaño con colores vibrantes</p>
                <div class="demo-content">
                    <h3>Contenido de ejemplo</h3>
                    <p>Espirales hipnóticas que crean un efecto de profundidad y movimiento constante, ideal para contenido dinámico.</p>
                    <div class="demo-badge">Clase: bg-rotating-spirals</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Opción 4: Fondo con Pulsos de Energía -->
<section class="bg-energy-pulses py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title mb-4">Opción 4: Pulsos de Energía</h2>
                <p class="mb-4">Pulsos de luz que se expanden desde el centro con colores cambiantes</p>
                <div class="demo-content">
                    <h3>Contenido de ejemplo</h3>
                    <p>Efecto de pulsos que simulan energía galáctica, perfecto para secciones que transmiten poder y tecnología.</p>
                    <div class="demo-badge">Clase: bg-energy-pulses</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Opción 5: Fondo con Nebulosa Animada -->
<section class="bg-animated-nebula py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title mb-4">Opción 5: Nebulosa Animada</h2>
                <p class="mb-4">Nebulosa cósmica que se mueve y cambia de forma con colores galácticos</p>
                <div class="demo-content">
                    <h3>Contenido de ejemplo</h3>
                    <p>Simula una nebulosa real con gases cósmicos que se mueven y cambian, creando una experiencia inmersiva.</p>
                    <div class="demo-badge">Clase: bg-animated-nebula</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Opción 6: Fondo con Fractales Dinámicos -->
<section class="bg-dynamic-fractals py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title mb-4">Opción 6: Fractales Dinámicos</h2>
                <p class="mb-4">Fractales que se expanden y contraen con patrones matemáticos complejos</p>
                <div class="demo-content">
                    <h3>Contenido de ejemplo</h3>
                    <p>Patrones fractales que crean una sensación de infinito y complejidad matemática, ideal para contenido tecnológico.</p>
                    <div class="demo-badge">Clase: bg-dynamic-fractals</div>
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
                    <p><strong>1.</strong> Elige el fondo psicodélico que más te guste de las opciones arriba</p>
                    <p><strong>2.</strong> Copia la clase CSS (ej: bg-psychedelic-waves)</p>
                    <p><strong>3.</strong> Reemplaza "bg-dark-epic" en tu sección about</p>
                    <p><strong>4.</strong> El CSS ya está incluido en style.css</p>
                </div>
                <div class="code-example mt-4">
                    <code>
                        &lt;section class="about-section py-5 bg-psychedelic-waves animate"&gt;
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