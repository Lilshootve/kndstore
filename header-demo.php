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

<?php echo generateHeader('Demo Headers', 'Demo de diferentes estilos de headers para KND Store'); ?>

<!-- Particles Background -->
<div id="particles-bg"></div>

<?php echo generateNavigation(); ?>

<!-- Demo Content -->
<section class="demo-content py-5" style="padding-top: 140px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="text-center mb-5">
                    <h1 class="demo-title">
                        <span class="text-gradient">Demo de Headers</span>
                    </h1>
                    <p class="demo-subtitle">
                        Selecciona el estilo de header que más te guste para KND Store
                    </p>
                </div>

                <!-- Header Option 1: Minimalista -->
                <div class="header-option" id="header-1">
                    <h3 class="option-title">Opción 1: Minimalista</h3>
                    <div class="header-preview header-minimal">
                        <div class="preview-navbar">
                            <div class="preview-logo">
                                <span class="logo-text">KND</span>
                            </div>
                            <div class="preview-nav">
                                <a href="#" class="preview-link active">Inicio</a>
                                <a href="#" class="preview-link">Catálogo</a>
                                <a href="#" class="preview-link">Sobre Nosotros</a>
                                <a href="#" class="preview-link">Contacto</a>
                            </div>
                        </div>
                    </div>
                    <p class="option-description">Header limpio y minimalista, sin efectos excesivos.</p>
                </div>

                <!-- Header Option 2: Galáctico Actual -->
                <div class="header-option" id="header-2">
                    <h3 class="option-title">Opción 2: Galáctico Actual</h3>
                    <div class="header-preview header-galactic">
                        <div class="preview-navbar">
                            <div class="preview-logo">
                                <span class="logo-text">KND</span>
                            </div>
                            <div class="preview-nav">
                                <a href="#" class="preview-link active">Inicio</a>
                                <a href="#" class="preview-link">Catálogo</a>
                                <a href="#" class="preview-link">Sobre Nosotros</a>
                                <a href="#" class="preview-link">Contacto</a>
                            </div>
                        </div>
                    </div>
                    <p class="option-description">El header actual con efectos galácticos y glow.</p>
                </div>

                <!-- Header Option 3: Tech Futurista -->
                <div class="header-option" id="header-3">
                    <h3 class="option-title">Opción 3: Tech Futurista</h3>
                    <div class="header-preview header-tech">
                        <div class="preview-navbar">
                            <div class="preview-logo">
                                <span class="logo-text">KND</span>
                            </div>
                            <div class="preview-nav">
                                <a href="#" class="preview-link active">Inicio</a>
                                <a href="#" class="preview-link">Catálogo</a>
                                <a href="#" class="preview-link">Sobre Nosotros</a>
                                <a href="#" class="preview-link">Contacto</a>
                            </div>
                        </div>
                    </div>
                    <p class="option-description">Estilo futurista con líneas y efectos tech.</p>
                </div>

                <!-- Header Option 4: Gaming Pro -->
                <div class="header-option" id="header-4">
                    <h3 class="option-title">Opción 4: Gaming Pro</h3>
                    <div class="header-preview header-gaming">
                        <div class="preview-navbar">
                            <div class="preview-logo">
                                <span class="logo-text">KND</span>
                            </div>
                            <div class="preview-nav">
                                <a href="#" class="preview-link active">Inicio</a>
                                <a href="#" class="preview-link">Catálogo</a>
                                <a href="#" class="preview-link">Sobre Nosotros</a>
                                <a href="#" class="preview-link">Contacto</a>
                            </div>
                        </div>
                    </div>
                    <p class="option-description">Estilo gaming con colores vibrantes y efectos dinámicos.</p>
                </div>

                <!-- Header Option 5: Elegante Oscuro -->
                <div class="header-option" id="header-5">
                    <h3 class="option-title">Opción 5: Elegante Oscuro</h3>
                    <div class="header-preview header-elegant">
                        <div class="preview-navbar">
                            <div class="preview-logo">
                                <span class="logo-text">KND</span>
                            </div>
                            <div class="preview-nav">
                                <a href="#" class="preview-link active">Inicio</a>
                                <a href="#" class="preview-link">Catálogo</a>
                                <a href="#" class="preview-link">Sobre Nosotros</a>
                                <a href="#" class="preview-link">Contacto</a>
                            </div>
                        </div>
                    </div>
                    <p class="option-description">Header elegante con tonos oscuros y sutiles efectos.</p>
                </div>

                <!-- Selection Instructions -->
                <div class="selection-instructions">
                    <h4>¿Cómo seleccionar?</h4>
                    <p>Haz clic en el header que más te guste y te mostraré el código CSS correspondiente.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php 
echo generateFooter();
echo generateScripts();
?>

<style>
/* Demo Styles */
.demo-content {
    min-height: 100vh;
    background: var(--knd-black);
}

.demo-title {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 1rem;
    text-shadow: 0 0 20px rgba(0, 191, 255, 0.5);
}

.demo-subtitle {
    font-size: 1.2rem;
    color: rgba(255, 255, 255, 0.8);
    margin-bottom: 3rem;
}

.header-option {
    margin-bottom: 4rem;
    padding: 2rem;
    background: rgba(44, 44, 44, 0.3);
    border-radius: 15px;
    border: 1px solid rgba(0, 191, 255, 0.2);
    transition: all 0.3s ease;
}

.header-option:hover {
    border-color: var(--knd-neon-blue);
    box-shadow: 0 0 20px rgba(0, 191, 255, 0.2);
    transform: translateY(-2px);
}

.option-title {
    color: var(--knd-neon-blue);
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    text-align: center;
}

.header-preview {
    margin-bottom: 1.5rem;
    border-radius: 10px;
    overflow: hidden;
    position: relative;
}

.preview-navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem 2rem;
    height: 80px;
}

.preview-logo {
    display: flex;
    align-items: center;
}

.logo-text {
    font-size: 1.8rem;
    font-weight: 700;
    color: white;
}

.preview-nav {
    display: flex;
    gap: 2rem;
}

.preview-link {
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
    position: relative;
}

.preview-link:hover,
.preview-link.active {
    color: white;
}

.option-description {
    color: rgba(255, 255, 255, 0.7);
    text-align: center;
    font-style: italic;
}

/* Header Option 1: Minimalista */
.header-minimal {
    background: linear-gradient(to bottom, rgba(0, 0, 0, 0.95) 0%, rgba(20, 20, 20, 0.9) 100%);
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.header-minimal .preview-navbar {
    background: transparent;
}

.header-minimal .logo-text {
    color: var(--knd-neon-blue);
    text-shadow: 0 0 10px rgba(0, 191, 255, 0.3);
}

.header-minimal .preview-link.active {
    color: var(--knd-neon-blue);
    border-bottom: 2px solid var(--knd-neon-blue);
}

/* Header Option 2: Galáctico Actual */
.header-galactic {
    background: linear-gradient(to bottom, 
        rgba(0, 0, 0, 0.99) 0%, 
        rgba(10, 10, 10, 0.98) 20%, 
        rgba(20, 20, 20, 0.95) 50%, 
        rgba(30, 30, 30, 0.9) 80%, 
        rgba(44, 44, 44, 0.85) 100%);
    border-bottom: 4px solid var(--knd-neon-blue);
    box-shadow: 
        0 6px 30px rgba(0, 0, 0, 0.9),
        0 0 50px rgba(0, 191, 255, 0.5);
}

.header-galactic .preview-navbar {
    background: transparent;
    backdrop-filter: blur(25px);
}

.header-galactic .logo-text {
    color: white;
    text-shadow: 0 0 20px rgba(0, 191, 255, 0.8);
    background: rgba(0, 191, 255, 0.05);
    padding: 10px 16px;
    border-radius: 8px;
    border: 1px solid rgba(0, 191, 255, 0.1);
}

.header-galactic .preview-link.active {
    color: var(--knd-neon-blue);
    text-shadow: 0 0 10px rgba(0, 191, 255, 0.5);
}

/* Header Option 3: Tech Futurista */
.header-tech {
    background: linear-gradient(135deg, 
        rgba(0, 0, 0, 0.95) 0%, 
        rgba(20, 20, 40, 0.9) 50%, 
        rgba(0, 0, 0, 0.95) 100%);
    border-bottom: 2px solid var(--knd-electric-purple);
    position: relative;
}

.header-tech::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 1px;
    background: linear-gradient(90deg, 
        transparent 0%, 
        var(--knd-neon-blue) 50%, 
        transparent 100%);
    animation: techScan 3s linear infinite;
}

@keyframes techScan {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(100%); }
}

.header-tech .preview-navbar {
    background: transparent;
}

.header-tech .logo-text {
    color: var(--knd-electric-purple);
    text-shadow: 0 0 15px rgba(138, 43, 226, 0.6);
    border: 1px solid var(--knd-electric-purple);
    padding: 8px 12px;
    border-radius: 4px;
}

.header-tech .preview-link.active {
    color: var(--knd-electric-purple);
    border-bottom: 2px solid var(--knd-electric-purple);
}

/* Header Option 4: Gaming Pro */
.header-gaming {
    background: linear-gradient(45deg, 
        rgba(0, 0, 0, 0.9) 0%, 
        rgba(20, 0, 40, 0.8) 50%, 
        rgba(0, 0, 0, 0.9) 100%);
    border-bottom: 3px solid #ff6b35;
    position: relative;
}

.header-gaming::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(90deg, 
        #ff6b35 0%, 
        #f7931e 25%, 
        #ff6b35 50%, 
        #f7931e 75%, 
        #ff6b35 100%);
    animation: gamingPulse 2s ease-in-out infinite;
}

@keyframes gamingPulse {
    0%, 100% { opacity: 0.7; }
    50% { opacity: 1; }
}

.header-gaming .preview-navbar {
    background: transparent;
}

.header-gaming .logo-text {
    color: #ff6b35;
    text-shadow: 0 0 20px rgba(255, 107, 53, 0.8);
    background: rgba(255, 107, 53, 0.1);
    padding: 10px 16px;
    border-radius: 8px;
    border: 1px solid rgba(255, 107, 53, 0.3);
}

.header-gaming .preview-link.active {
    color: #ff6b35;
    text-shadow: 0 0 10px rgba(255, 107, 53, 0.5);
}

/* Header Option 5: Elegante Oscuro */
.header-elegant {
    background: linear-gradient(to bottom, 
        rgba(0, 0, 0, 0.98) 0%, 
        rgba(15, 15, 15, 0.95) 100%);
    border-bottom: 1px solid rgba(255, 255, 255, 0.2);
}

.header-elegant .preview-navbar {
    background: transparent;
    backdrop-filter: blur(10px);
}

.header-elegant .logo-text {
    color: white;
    text-shadow: 0 0 5px rgba(255, 255, 255, 0.3);
    font-weight: 600;
}

.header-elegant .preview-link.active {
    color: white;
    border-bottom: 1px solid white;
}

/* Selection Instructions */
.selection-instructions {
    text-align: center;
    margin-top: 3rem;
    padding: 2rem;
    background: rgba(44, 44, 44, 0.3);
    border-radius: 15px;
    border: 1px solid rgba(0, 191, 255, 0.2);
}

.selection-instructions h4 {
    color: var(--knd-neon-blue);
    margin-bottom: 1rem;
}

.selection-instructions p {
    color: rgba(255, 255, 255, 0.8);
}

/* Responsive */
@media (max-width: 768px) {
    .demo-title {
        font-size: 2rem;
    }
    
    .preview-navbar {
        padding: 1rem;
        flex-direction: column;
        gap: 1rem;
        height: auto;
    }
    
    .preview-nav {
        gap: 1rem;
    }
}
</style>

<script>
// Header selection functionality
document.querySelectorAll('.header-option').forEach(option => {
    option.addEventListener('click', function() {
        const headerId = this.id;
        const headerName = this.querySelector('.option-title').textContent;
        
        // Remove active class from all options
        document.querySelectorAll('.header-option').forEach(opt => {
            opt.style.borderColor = 'rgba(0, 191, 255, 0.2)';
        });
        
        // Add active class to selected option
        this.style.borderColor = 'var(--knd-neon-blue)';
        this.style.boxShadow = '0 0 30px rgba(0, 191, 255, 0.4)';
        
        // Show selection message
        alert(`Has seleccionado: ${headerName}\n\nTe proporcionaré el código CSS correspondiente.`);
        
        // Here you would typically show the CSS code or apply the selected style
        console.log(`Selected header: ${headerId}`);
    });
});
</script> 