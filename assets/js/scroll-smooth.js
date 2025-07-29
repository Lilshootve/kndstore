// Scroll suave por bloques para KND Store
document.addEventListener('DOMContentLoaded', function() {
    
    // Configuración de scroll suave
    const scrollConfig = {
        duration: 800,
        easing: 'easeInOutCubic'
    };
    
    // Función de easing personalizada
    function easeInOutCubic(t) {
        return t < 0.5 ? 4 * t * t * t : (t - 1) * (2 * t - 2) * (2 * t - 2) + 1;
    }
    
    // Función de scroll suave
    function smoothScrollTo(target, duration = scrollConfig.duration) {
        const targetElement = typeof target === 'string' ? document.querySelector(target) : target;
        if (!targetElement) return;
        
        const startPosition = window.pageYOffset;
        const targetPosition = targetElement.offsetTop - 80; // Compensar navbar
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
    
    // Navegación por teclado (flechas arriba/abajo)
    let isScrolling = false;
    document.addEventListener('keydown', function(e) {
        if (isScrolling) return;
        
        const sections = document.querySelectorAll('.hero-section, .products-section, .product-detail-section, .about-section, .contact-section');
        const currentSection = getCurrentSection(sections);
        
        if (e.key === 'ArrowDown' || e.key === 'PageDown') {
            e.preventDefault();
            const nextSection = sections[currentSection + 1];
            if (nextSection) {
                isScrolling = true;
                smoothScrollTo(nextSection);
                setTimeout(() => { isScrolling = false; }, scrollConfig.duration);
            }
        } else if (e.key === 'ArrowUp' || e.key === 'PageUp') {
            e.preventDefault();
            const prevSection = sections[currentSection - 1];
            if (prevSection) {
                isScrolling = true;
                smoothScrollTo(prevSection);
                setTimeout(() => { isScrolling = false; }, scrollConfig.duration);
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
    
    // Crear botones de navegación rápida
    function createScrollNav() {
        const nav = document.createElement('div');
        nav.className = 'scroll-nav';
        nav.innerHTML = `
            <button class="scroll-nav-btn" onclick="scrollToTop()" title="Ir arriba">
                <i class="fas fa-chevron-up"></i>
            </button>
            <button class="scroll-nav-btn" onclick="scrollToSection('.products-section')" title="Catálogo">
                <i class="fas fa-th"></i>
            </button>
            <button class="scroll-nav-btn" onclick="scrollToSection('.about-section')" title="Sobre Nosotros">
                <i class="fas fa-info-circle"></i>
            </button>
            <button class="scroll-nav-btn" onclick="scrollToSection('.contact-section')" title="Contacto">
                <i class="fas fa-envelope"></i>
            </button>
        `;
        document.body.appendChild(nav);
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
    
    // Funciones globales para los botones
    window.scrollToTop = function() {
        isScrolling = true;
        smoothScrollTo(0);
        setTimeout(() => { isScrolling = false; }, scrollConfig.duration);
    };
    
    window.scrollToSection = function(selector) {
        const section = document.querySelector(selector);
        if (section) {
            isScrolling = true;
            smoothScrollTo(section);
            setTimeout(() => { isScrolling = false; }, scrollConfig.duration);
        }
    };
    
    // Scroll suave para enlaces internos
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = this.getAttribute('href');
            const targetElement = document.querySelector(target);
            if (targetElement) {
                isScrolling = true;
                smoothScrollTo(targetElement);
                setTimeout(() => { isScrolling = false; }, scrollConfig.duration);
            }
        });
    });
    
    // Inicializar componentes
    createScrollNav();
    createScrollProgress();
    
    // Scroll suave para botones "Ver Detalles"
    document.querySelectorAll('.btn-details, .btn-primary').forEach(btn => {
        btn.addEventListener('click', function(e) {
            // Solo aplicar scroll suave si no es un enlace externo
            if (this.href && this.href.startsWith(window.location.origin)) {
                e.preventDefault();
                const targetUrl = this.href;
                // Pequeña pausa antes de navegar
                setTimeout(() => {
                    window.location.href = targetUrl;
                }, 300);
            }
        });
    });
    
    // Efecto de scroll suave para el mouse wheel (opcional)
    let wheelTimeout;
    document.addEventListener('wheel', function(e) {
        if (wheelTimeout) return;
        
        wheelTimeout = setTimeout(() => {
            wheelTimeout = null;
        }, 100);
        
        // Solo aplicar en secciones principales
        const sections = document.querySelectorAll('.hero-section, .products-section, .product-detail-section');
        if (sections.length > 0) {
            const currentSection = getCurrentSection(sections);
            const direction = e.deltaY > 0 ? 1 : -1;
            const targetSection = sections[currentSection + direction];
            
            if (targetSection && !isScrolling) {
                e.preventDefault();
                isScrolling = true;
                smoothScrollTo(targetSection);
                setTimeout(() => { isScrolling = false; }, scrollConfig.duration);
            }
        }
    }, { passive: false });
    
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