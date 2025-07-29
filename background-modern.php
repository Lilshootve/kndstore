<?php
require_once 'includes/config.php';
require_once 'includes/header.php';
require_once 'includes/footer.php';
?>

<?php echo generateHeader('Fondos Modernos', 'Opciones de fondos profesionales y modernos para KND Store'); ?>

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
                    <span class="text-gradient">Modernos</span>
                </h1>
                <p class="hero-subtitle">
                    Diseños profesionales e innovadores que elevan tu presencia digital
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Opción 1: Fondo con Grid Futurista -->
<section class="bg-futuristic-grid py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title mb-4">Opción 1: Grid Futurista</h2>
                <p class="mb-4">Cuadrícula tecnológica con líneas de energía y nodos conectados</p>
                <div class="demo-content">
                    <h3>Contenido de ejemplo</h3>
                    <p>Grid inteligente que simula una red de datos avanzada, perfecto para transmitir innovación y conectividad tecnológica.</p>
                    <div class="demo-badge">Clase: bg-futuristic-grid</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Opción 2: Fondo con Partículas Cuánticas -->
<section class="bg-quantum-particles py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title mb-4">Opción 2: Partículas Cuánticas</h2>
                <p class="mb-4">Partículas que aparecen y desaparecen con efectos cuánticos</p>
                <div class="demo-content">
                    <h3>Contenido de ejemplo</h3>
                    <p>Simula el comportamiento cuántico con partículas que se entrelazan y crean patrones de interferencia.</p>
                    <div class="demo-badge">Clase: bg-quantum-particles</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Opción 3: Fondo con Holograma Digital -->
<section class="bg-digital-hologram py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title mb-4">Opción 3: Holograma Digital</h2>
                <p class="mb-4">Efecto holográfico con líneas de escaneo y proyección 3D</p>
                <div class="demo-content">
                    <h3>Contenido de ejemplo</h3>
                    <p>Simula una proyección holográfica avanzada, ideal para mostrar tecnología de vanguardia y innovación.</p>
                    <div class="demo-badge">Clase: bg-digital-hologram</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Opción 4: Fondo con Circuitos Neurales -->
<section class="bg-neural-circuits py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title mb-4">Opción 4: Circuitos Neurales</h2>
                <p class="mb-4">Red neuronal artificial con conexiones sinápticas animadas</p>
                <div class="demo-content">
                    <h3>Contenido de ejemplo</h3>
                    <p>Representa una red neuronal en funcionamiento, perfecto para contenido relacionado con IA y machine learning.</p>
                    <div class="demo-badge">Clase: bg-neural-circuits</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Opción 5: Fondo con Campo de Fuerza -->
<section class="bg-force-field py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title mb-4">Opción 5: Campo de Fuerza</h2>
                <p class="mb-4">Escudo energético con ondas de protección y estabilidad</p>
                <div class="demo-content">
                    <h3>Contenido de ejemplo</h3>
                    <p>Simula un campo de fuerza galáctico, ideal para transmitir seguridad, protección y estabilidad tecnológica.</p>
                    <div class="demo-badge">Clase: bg-force-field</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Opción 6: Fondo con Portal Dimensional -->
<section class="bg-dimensional-portal py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title mb-4">Opción 6: Portal Dimensional</h2>
                <p class="mb-4">Portal que conecta dimensiones con efectos de distorsión espacial</p>
                <div class="demo-content">
                    <h3>Contenido de ejemplo</h3>
                    <p>Crea un efecto de portal dimensional que sugiere conexión con realidades alternativas y tecnología avanzada.</p>
                    <div class="demo-badge">Clase: bg-dimensional-portal</div>
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
                    <p><strong>1.</strong> Elige el fondo moderno que más te guste de las opciones arriba</p>
                    <p><strong>2.</strong> Copia la clase CSS (ej: bg-futuristic-grid)</p>
                    <p><strong>3.</strong> Reemplaza "bg-dark-epic" en tu sección about</p>
                    <p><strong>4.</strong> El CSS ya está incluido en style.css</p>
                </div>
                <div class="code-example mt-4">
                    <code>
                        &lt;section class="about-section py-5 bg-futuristic-grid animate"&gt;
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