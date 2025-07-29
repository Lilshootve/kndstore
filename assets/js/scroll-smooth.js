// Scroll suave por bloques para KND Store - Versión simplificada
document.addEventListener('DOMContentLoaded', function() {
    
    // Configuración de scroll suave
    const scrollConfig = {
        duration: 600,
        easing: 'easeInOutCubic'
    };
    
    // Función de easing personalizada
    function easeInOutCubic(t) {
        return t < 0.5 ? 4 * t * t * t : (t - 1) * (2 * t - 2) * (2 * t - 2) + 1;
    }
    
    // Función de scroll suave mejorada
    function smoothScrollTo(target, duration = scrollConfig.duration) {
        const targetElement = typeof target === 'string' ? document.querySelector(target) : target;
        if (!targetElement) return;
        
        const startPosition = window.pageYOffset;
        const targetPosition = targetElement.offsetTop - 140; // Compensar navbar alto
        const distance = targetPosition - startPosition;
        let startTime = null;
        
        function animation(currentTime) {
            if (startTime === null) startTime = currentTime;
            const timeElapsed = currentTime - startTime;
            const run = easeInOutCubic(timeElapsed / duration);
            window.scrollTo(0, startPosition + distance * run);
            if (timeElapsed < duration) requestAnimationFrame(animation);
        }
        
        requestAnimationFrame(animation);
    }
    
    // Crear botones de navegación rápida
    function createScrollNav() {
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
        document.getElementById('scroll-top').addEventListener('click', function() {
            smoothScrollTo(0);
        });
        
        document.getElementById('scroll-products').addEventListener('click', function() {
            const section = document.querySelector('.products-section');
            if (section) {
                smoothScrollTo(section);
            }
        });
        
        document.getElementById('scroll-about').addEventListener('click', function() {
            const section = document.querySelector('.about-section');
            if (section) {
                smoothScrollTo(section);
            }
        });
        
        document.getElementById('scroll-contact').addEventListener('click', function() {
            const section = document.querySelector('.contact-section');
            if (section) {
                smoothScrollTo(section);
            }
        });
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
        const section = document.querySelector(selector);
        if (section) {
            smoothScrollTo(section);
        }
    };
    
    // Scroll suave para enlaces internos (solo los que empiecen con #)
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = this.getAttribute('href');
            const targetElement = document.querySelector(target);
            if (targetElement) {
                smoothScrollTo(targetElement);
            }
        });
    });
    
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
    
    // Navegación por teclado (solo cuando se presiona Ctrl)
    document.addEventListener('keydown', function(e) {
        if (e.ctrlKey) {
            const sections = document.querySelectorAll('.hero-section, .products-section, .product-detail-section, .about-section, .contact-section');
            
            if (e.key === 'ArrowDown' || e.key === 'PageDown') {
                e.preventDefault();
                const currentSection = getCurrentSection(sections);
                const nextSection = sections[currentSection + 1];
                if (nextSection) {
                    smoothScrollTo(nextSection);
                }
            } else if (e.key === 'ArrowUp' || e.key === 'PageUp') {
                e.preventDefault();
                const currentSection = getCurrentSection(sections);
                const prevSection = sections[currentSection - 1];
                if (prevSection) {
                    smoothScrollTo(prevSection);
                }
            }
        }
    });
    
    // Función para obtener la sección actual
    function getCurrentSection(sections) {
        const scrollPosition = window.pageYOffset + 100;
        for (let i = 0; i < sections.length; i++) {
            const section = sections[i];
            const sectionTop = section.offsetTop;
            const sectionBottom = sectionTop + section.offsetHeight;
            
            if (scrollPosition >= sectionTop && scrollPosition < sectionBottom) {
                return i;
            }
        }
        return 0;
    }
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