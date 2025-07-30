// KND Store - JavaScript Principal

// Detectar si Font Awesome se cargó correctamente
function checkFontAwesome() {
    // Crear un elemento de prueba con un icono de Font Awesome
    const testElement = document.createElement('i');
    testElement.className = 'fas fa-rocket';
    testElement.style.position = 'absolute';
    testElement.style.left = '-9999px';
    testElement.style.fontSize = '1px';
    document.body.appendChild(testElement);
    
    // Obtener el contenido computado
    const computedStyle = window.getComputedStyle(testElement, '::before');
    const content = computedStyle.getPropertyValue('content');
    
    // Limpiar el elemento de prueba
    document.body.removeChild(testElement);
    
    // Si el contenido es vacío o no es un icono válido, aplicar fallback
    if (!content || content === 'none' || content === 'normal') {
        console.log('Font Awesome no se cargó correctamente, aplicando fallbacks...');
        applyIconFallbacks();
    } else {
        console.log('Font Awesome cargado correctamente');
    }
}

// Aplicar fallbacks para iconos
function applyIconFallbacks() {
    // Agregar clase CSS para activar fallbacks
    document.body.classList.add('fontawesome-fallback');
    
    // Reemplazar iconos específicos con emojis
    const iconReplacements = {
        'fa-rocket': '🚀',
        'fa-info-circle': 'ℹ',
        'fa-shipping-fast': '🚚',
        'fa-shield-alt': '🛡',
        'fa-headset': '🎧',
        'fa-search': '🔍',
        'fa-eye': '👁',
        'fa-envelope': '✉',
        'fa-phone': '📞',
        'fa-map-marker-alt': '📍',
        'fa-clock': '🕐',
        'fa-palette': '🎨',
        'fa-magic': '✨',
        'fa-gamepad': '🎮',
        'fa-code': '💻',
        'fa-microchip': '🔧',
        'fa-brain': '🧠',
        'fa-credit-card': '💳',
        'fa-coins': '🪙',
        'fa-tools': '🔧',
        'fa-box': '📦',
        'fa-satellite': '🛰',
        'fa-robot': '🤖',
        'fa-dice': '🎲',
        'fa-crystal-ball': '🔮',
        'fa-question-circle': '❓',
        'fa-user': '👤',
        'fa-bullseye': '🎯',
        'fa-comments': '💬',
        'fa-paper-plane': '✈',
        'fa-broadcast-tower': '📡',
        'fa-arrow-left': '←',
        'fa-chevron-up': '↑',
        'fa-th': '☰',
        'fa-shopping-cart': '🛒',
        'fa-user-astronaut': '👨‍🚀',
        'fa-sign-in-alt': '➡',
        'fa-user-plus': '➕',
        'fa-crown': '👑',
        'fa-file-contract': '📄',
        'fa-check-circle': '✅',
        'fa-cogs': '⚙',
        'fa-globe': '🌍',
        'fa-undo': '↩',
        'fa-copyright': '©',
        'fa-exclamation-triangle': '⚠',
        'fa-database': '🗄',
        'fa-cookie-bite': '🍪',
        'fa-share-alt': '📤',
        'fa-user-shield': '🛡',
        'fa-user-check': '✓',
        'fa-edit': '✏',
        'fa-wifi-slash': '📶',
        'fa-sync-alt': '🔄',
        'fa-mobile-alt': '📱',
        'fa-wifi': '📶',
        'fa-tag': '🏷'
    };
    
    // Reemplazar iconos en el DOM
    Object.keys(iconReplacements).forEach(iconClass => {
        const elements = document.querySelectorAll(`.fas.${iconClass}, .fa.${iconClass}`);
        elements.forEach(element => {
            element.textContent = iconReplacements[iconClass];
            element.style.fontFamily = 'inherit';
            element.style.fontWeight = 'normal';
            element.style.fontStyle = 'normal';
        });
    });
}

// Función para inicializar la aplicación
function initApp() {
    // Verificar Font Awesome después de que la página se cargue
    setTimeout(checkFontAwesome, 1000);
    
    // Inicializar otros componentes
    initScrollEffects();
    initColorPanel();
    initMobileOptimizations();
}

// Efectos de scroll
function initScrollEffects() {
    // Scroll suave para enlaces internos
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Efecto parallax para el hero
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const hero = document.querySelector('.hero-section');
        if (hero) {
            hero.style.transform = `translateY(${scrolled * 0.5}px)`;
        }
    });
}

// Panel de personalización de colores
function initColorPanel() {
    const toggle = document.getElementById('colorPanelToggle');
    const sidebar = document.getElementById('colorPanelSidebar');
    const overlay = document.getElementById('colorPanelOverlay');
    
    if (toggle && sidebar && overlay) {
        toggle.addEventListener('click', () => {
            sidebar.classList.toggle('open');
            overlay.classList.toggle('active');
            toggle.classList.toggle('active');
        });
        
        overlay.addEventListener('click', () => {
            sidebar.classList.remove('open');
            overlay.classList.remove('active');
            toggle.classList.remove('active');
        });
        
        // Temas de colores
        document.querySelectorAll('.color-theme').forEach(theme => {
            theme.addEventListener('click', () => {
                document.querySelectorAll('.color-theme').forEach(t => t.classList.remove('active'));
                theme.classList.add('active');
                
                const themeName = theme.dataset.theme;
                applyColorTheme(themeName);
            });
        });
    }
}

// Aplicar tema de colores
function applyColorTheme(themeName) {
    const root = document.documentElement;
    
    const themes = {
        'galactic-blue': {
            '--knd-neon-blue': '#00bfff',
            '--knd-electric-purple': '#8a2be2',
            '--knd-gunmetal-gray': '#2c2c2c'
        },
        'cyber-green': {
            '--knd-neon-blue': '#00ff00',
            '--knd-electric-purple': '#32cd32',
            '--knd-gunmetal-gray': '#006400'
        },
        'fire-red': {
            '--knd-neon-blue': '#ff0000',
            '--knd-electric-purple': '#ff4500',
            '--knd-gunmetal-gray': '#8b0000'
        },
        'golden-sun': {
            '--knd-neon-blue': '#ffd700',
            '--knd-electric-purple': '#ffa500',
            '--knd-gunmetal-gray': '#daa520'
        },
        'neon-pink': {
            '--knd-neon-blue': '#ff69b4',
            '--knd-electric-purple': '#ff1493',
            '--knd-gunmetal-gray': '#c71585'
        },
        'ice-blue': {
            '--knd-neon-blue': '#00ffff',
            '--knd-electric-purple': '#87ceeb',
            '--knd-gunmetal-gray': '#4682b4'
        }
    };
    
    if (themes[themeName]) {
        Object.entries(themes[themeName]).forEach(([property, value]) => {
            root.style.setProperty(property, value);
        });
        
        // Guardar preferencia
        localStorage.setItem('knd-color-theme', themeName);
    }
}

// Optimizaciones móviles
function initMobileOptimizations() {
    // Detectar si es móvil
    const isMobile = window.innerWidth <= 768;
    
    if (isMobile) {
        // Reducir animaciones en móvil
        document.body.style.setProperty('--animation-duration', '0.3s');
        
        // Optimizar scroll en móvil
        let ticking = false;
        window.addEventListener('scroll', () => {
            if (!ticking) {
                requestAnimationFrame(() => {
                    // Efectos de scroll optimizados para móvil
                    ticking = false;
                });
                ticking = true;
            }
        });
    }
}

// Cargar tema guardado
function loadSavedTheme() {
    const savedTheme = localStorage.getItem('knd-color-theme');
    if (savedTheme) {
        applyColorTheme(savedTheme);
        
        // Marcar como activo en el panel
        const themeElement = document.querySelector(`[data-theme="${savedTheme}"]`);
        if (themeElement) {
            document.querySelectorAll('.color-theme').forEach(t => t.classList.remove('active'));
            themeElement.classList.add('active');
        }
    }
}

// Inicializar cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', () => {
    initApp();
    loadSavedTheme();
});

// Inicializar cuando la ventana se cargue completamente
window.addEventListener('load', () => {
    // Verificar Font Awesome nuevamente después de que todo se cargue
    setTimeout(checkFontAwesome, 2000);
}); 