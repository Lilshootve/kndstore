// Scroll suave por bloques para KND Store - Versión simplificada y confiable
document.addEventListener('DOMContentLoaded', function() {
    console.log('Scroll smooth script loaded'); // Debug
    
    // Función de scroll suave simple
    function smoothScrollTo(target) {
        console.log('Scrolling to:', target); // Debug
        
        if (target === 0) {
            // Scroll to top
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
            return;
        }
        
        const targetElement = typeof target === 'string' ? document.querySelector(target) : target;
        if (!targetElement) {
            console.log('Target not found:', target); // Debug
            return;
        }
        
        const navbarHeight = 120; // Altura del navbar
        const targetPosition = targetElement.offsetTop - navbarHeight;
        
        window.scrollTo({
            top: targetPosition,
            behavior: 'smooth'
        });
    }
    
    // Crear botones de navegación rápida
    function createScrollNav() {
        console.log('Creating scroll navigation'); // Debug
        
        const nav = document.createElement('div');
        nav.className = 'scroll-nav';
        nav.innerHTML = `
            <button class="scroll-nav-btn" id="scroll-top" title="Ir arriba">
                <i class="fas fa-chevron-up"></i>
            </button>
            <button class="scroll-nav-btn" id="scroll-products" title="Catálogo">
                <i class="fas fa-th"></i>
            </button>
            <button class="scroll-nav-btn" id="scroll-about" title="Sobre Nosotros">
                <i class="fas fa-info-circle"></i>
            </button>
            <button class="scroll-nav-btn" id="scroll-contact" title="Contacto">
                <i class="fas fa-envelope"></i>
            </button>
        `;
        document.body.appendChild(nav);
        
        // Agregar event listeners a los botones
        const topBtn = document.getElementById('scroll-top');
        const productsBtn = document.getElementById('scroll-products');
        const aboutBtn = document.getElementById('scroll-about');
        const contactBtn = document.getElementById('scroll-contact');
        
        if (topBtn) {
            topBtn.addEventListener('click', function(e) {
                e.preventDefault();
                console.log('Top button clicked'); // Debug
                smoothScrollTo(0);
            });
        }
        
        if (productsBtn) {
            productsBtn.addEventListener('click', function(e) {
                e.preventDefault();
                console.log('Products button clicked'); // Debug
                smoothScrollTo('.products-section');
            });
        }
        
        if (aboutBtn) {
            aboutBtn.addEventListener('click', function(e) {
                e.preventDefault();
                console.log('About button clicked'); // Debug
                smoothScrollTo('.about-section');
            });
        }
        
        if (contactBtn) {
            contactBtn.addEventListener('click', function(e) {
                e.preventDefault();
                console.log('Contact button clicked'); // Debug
                smoothScrollTo('.contact-section');
            });
        }
    }
    
    // Crear indicador de progreso
    function createScrollProgress() {
        const progress = document.createElement('div');
        progress.className = 'scroll-progress';
        progress.innerHTML = '<div class="scroll-progress-bar"></div>';
        document.body.appendChild(progress);
        
        // Actualizar progreso al hacer scroll
        window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset;
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;
            const scrollPercent = (scrollTop / docHeight) * 100;
            
            const progressBar = document.querySelector('.scroll-progress-bar');
            if (progressBar) {
                progressBar.style.width = scrollPercent + '%';
            }
        });
    }
    
    // Funciones globales para compatibilidad
    window.scrollToTop = function() {
        smoothScrollTo(0);
    };
    
    window.scrollToSection = function(selector) {
        smoothScrollTo(selector);
    };
    
    // Inicializar componentes
    createScrollNav();
    createScrollProgress();
    
    // Mostrar/ocultar botones de navegación según scroll
    window.addEventListener('scroll', function() {
        const scrollNav = document.querySelector('.scroll-nav');
        if (scrollNav) {
            if (window.pageYOffset > 300) {
                scrollNav.style.opacity = '1';
                scrollNav.style.visibility = 'visible';
            } else {
                scrollNav.style.opacity = '0';
                scrollNav.style.visibility = 'hidden';
            }
        }
    });
    
    // Inicializar estado de navegación
    const scrollNav = document.querySelector('.scroll-nav');
    if (scrollNav) {
        scrollNav.style.opacity = '0';
        scrollNav.style.visibility = 'hidden';
        scrollNav.style.transition = 'opacity 0.3s ease, visibility 0.3s ease';
    }
    
    console.log('Scroll navigation initialized'); // Debug
});

// Configuración adicional para mejor experiencia
document.addEventListener('DOMContentLoaded', function() {
    // Prevenir scroll jump en carga
    if (window.location.hash) {
        setTimeout(() => {
            const target = document.querySelector(window.location.hash);
            if (target) {
                target.scrollIntoView({ behavior: 'smooth' });
            }
        }, 100);
    }
    
    // Optimizar scroll para dispositivos móviles
    if ('ontouchstart' in window) {
        document.body.style.overflowScrolling = 'touch';
    }
}); 