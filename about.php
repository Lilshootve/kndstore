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

<?php echo generateHeader('Sobre Nosotros', 'Descubre la historia galáctica detrás de KND Store - La tienda más badass de la galaxia'); ?>

<!-- Particles Background -->
<div id="particles-bg"></div>

<?php echo generateNavigation(); ?>

<!-- Hero Section -->
<section class="hero-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="hero-title">
                    <span class="text-gradient">SOBRE</span><br>
                    <span class="text-gradient">NOSOTROS</span>
                </h1>
                <p class="hero-subtitle">
                    La historia galáctica detrás de la tienda más badass del universo
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Nuestra Historia -->
<section class="about-section py-5" id="historia">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-content">
                    <h2 class="section-title">
                        <i class="fas fa-rocket me-3"></i>
                        Nuestra Historia
                    </h2>
                    <div class="timeline-marker">
                        <span class="year">1995</span>
                    </div>
                    <p class="about-text">
                        KND Store no nació en una oficina. Nació en una mente. En 1995, mientras el mundo descubría Windows 95 y escuchaba discos compactos, una chispa se encendía en el núcleo de un futuro imposible de ignorar: fusionar tecnología y cultura gamer en una sola fuerza intergaláctica.
                    </p>
                    <p class="about-text">
                        Hoy, esa chispa es un núcleo en expansión. Somos más que una tienda. Somos una estación de comando para quienes no siguen el mapa, sino que lo hackean.
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-visual">
                    <div class="cosmic-sphere">
                        <i class="fas fa-satellite"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Nuestra Misión -->
<section class="about-section py-5 bg-dark-epic" id="mision">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <div class="about-content">
                    <div class="mission-badge">
                        <i class="fas fa-rocket"></i>
                        <span>MISIÓN GALÁCTICA</span>
                    </div>
                    <h2 class="section-title mb-4">
                        <i class="fas fa-satellite me-3"></i>
                        Nuestra Misión
                    </h2>
                    <div class="about-text">
                        <p class="lead">
                            Ser la tienda más badass de la galaxia. No solo vendemos hardware y periféricos: reclutamos a los verdaderos pilotos del metaverso, diseñamos equipamiento para héroes digitales y desatamos tecnología sin fronteras.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Nuestros Valores -->
<section class="about-section py-5" id="valores">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">
                    <i class="fas fa-star me-3"></i>
                    Nuestros Valores
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-crosshairs"></i>
                    </div>
                    <h4>Precisión Cuántica</h4>
                    <p>Nada de errores. Todo optimizado al byte.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4>Lealtad al Usuario</h4>
                    <p>No somos dioses del retail. Somos soldados del servicio.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-palette"></i>
                    </div>
                    <h4>Estética Interestelar</h4>
                    <p>Si no se ve brutal, no entra.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h4>Tecnología sin Fronteras</h4>
                    <p>Desde chips hasta blockchain, si vibra en el futuro, lo domamos.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Nuestro Equipo -->
<section class="about-section py-5 bg-dark-epic" id="equipo">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">
                    <i class="fas fa-users me-3"></i>
                    Nuestro Equipo
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="team-card featured">
                    <div class="team-avatar">
                        <i class="fas fa-robot"></i>
                    </div>
                    <h4>Kael</h4>
                    <div class="team-role">IA Táctica y Estratega Principal</div>
                    <p>Diseñado para cuestionarlo todo y encontrar la verdad en cada línea de código.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="team-card">
                    <div class="team-avatar">
                        <i class="fas fa-user-secret"></i>
                    </div>
                    <h4>El Fundador</h4>
                    <div class="team-role">Comandante de Visión y Piloto Maestro</div>
                    <p>Nombre clasificado. Solo se sabe que nació en 1995 y nunca aceptó las limitaciones del sistema solar.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="team-card">
                    <div class="team-avatar">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <h4>Unidad Técnica X-23</h4>
                    <div class="team-role">Grupo Nómada de Tecnomantes</div>
                    <p>Un grupo nómada de tecnomantes que mantienen el corazón de KND operando en frecuencias ocultas.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tecnologías que nos propulsan -->
<section class="about-section py-5" id="tecnologias">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">
                    <i class="fas fa-microchip me-3"></i>
                    Tecnologías que nos Propulsan
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="tech-card">
                    <div class="tech-icon">
                        <i class="fas fa-brain"></i>
                    </div>
                    <div class="tech-content">
                        <h4>Inteligencia Artificial Autónoma (Kael)</h4>
                        <p>No es un asistente. Es un copiloto.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="tech-card">
                    <div class="tech-icon">
                        <i class="fas fa-dice"></i>
                    </div>
                    <div class="tech-content">
                        <h4>Death Roll Chain</h4>
                        <p>Un minijuego basado en azar cósmico y criptos, creado para conquistar wallets y entretener razas digitales.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="tech-card">
                    <div class="tech-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="tech-content">
                        <h4>Sistema de Puntos Acumulables</h4>
                        <p>Con lógica galáctica. Porque la lealtad merece recompensa.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="tech-card">
                    <div class="tech-icon">
                        <i class="fas fa-network-wired"></i>
                    </div>
                    <div class="tech-content">
                        <h4>Fusión Web 3.0 + Gaming + E-commerce</h4>
                        <p>Todo en un solo nodo, sin permisos, sin límites.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Comunidad y Visión del Futuro -->
<section class="about-section py-5 bg-dark-epic" id="futuro">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="section-title mb-4">
                    <i class="fas fa-globe me-3"></i>
                    Comunidad y Visión del Futuro
                </h2>
                <div class="future-card">
                    <p class="lead mb-4">
                        La comunidad es nuestro hipercombustible. Nos movemos en canales de energía como Discord, navegamos eventos galácticos, y repartimos loot como antiguos dioses de las misiones.
                    </p>
                    <h4>
                        <i class="fas fa-rocket me-3"></i>
                        ¿El futuro?
                    </h4>
                    <ul class="future-list">
                        <li><i class="fas fa-coins"></i> Una criptomoneda propia.</li>
                        <li><i class="fas fa-university"></i> Tal vez un banco.</li>
                        <li><i class="fas fa-space-shuttle"></i> Seguro una nave.</li>
                        <li><i class="fas fa-store"></i> Definitivamente una tienda en cada planeta.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="cta-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title">
                    <i class="fas fa-satellite me-3"></i>
                    ¿Listo para unirte a la misión?
                </h2>
                <p class="cta-text">
                    Explora nuestro catálogo galáctico y descubre tecnología que desafía los límites del universo conocido.
                </p>
                <div class="cta-buttons">
                    <a href="/products.php" class="btn btn-primary btn-lg me-3">
                        <i class="fas fa-rocket"></i> Explorar Productos
                    </a>
                    <a href="/contact.php" class="btn btn-primary btn-lg">
                        <i class="fas fa-envelope"></i> Contactar
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php 
echo generateFooter();
echo generateScripts();
?> 