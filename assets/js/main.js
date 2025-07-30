// KND Store - Main JavaScript

// Particles.js Configuration
particlesJS("particles-bg", {
    particles: {
        number: {
            value: 80,
            density: {
                enable: true,
                value_area: 800
            }
        },
        color: {
            value: ["#00bfff", "#8a2be2", "#00d4ff"]
        },
        shape: {
            type: "circle",
            stroke: {
                width: 0,
                color: "#000000"
            },
            polygon: {
                nb_sides: 5
            }
        },
        opacity: {
            value: 0.5,
            random: false,
            anim: {
                enable: false,
                speed: 1,
                opacity_min: 0.1,
                sync: false
            }
        },
        size: {
            value: 3,
            random: true,
            anim: {
                enable: false,
                speed: 40,
                size_min: 0.1,
                sync: false
            }
        },
        line_linked: {
            enable: true,
            distance: 150,
            color: "#00bfff",
            opacity: 0.4,
            width: 1
        },
        move: {
            enable: true,
            speed: 6,
            direction: "none",
            random: false,
            straight: false,
            out_mode: "out",
            bounce: false,
            attract: {
                enable: false,
                rotateX: 600,
                rotateY: 1200
            }
        }
    },
    interactivity: {
        detect_on: "canvas",
        events: {
            onhover: {
                enable: true,
                mode: "repulse"
            },
            onclick: {
                enable: true,
                mode: "push"
            },
            resize: true
        },
        modes: {
            grab: {
                distance: 400,
                line_linked: {
                    opacity: 1
                }
            },
            bubble: {
                distance: 400,
                size: 40,
                duration: 2,
                opacity: 8,
                speed: 3
            },
            repulse: {
                distance: 200,
                duration: 0.4
            },
            push: {
                particles_nb: 4
            },
            remove: {
                particles_nb: 2
            }
        }
    },
    retina_detect: true
});

// Scroll Animations for About Us Page
function initScrollAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
            }
        });
    }, observerOptions);

    // Observe sections
    document.querySelectorAll('.about-section').forEach(section => {
        observer.observe(section);
    });

    // Observe cards
    document.querySelectorAll('.value-card, .team-card, .tech-card, .future-card').forEach(card => {
        observer.observe(card);
    });
}

// Contact Form Validation and Effects
function initContactForm() {
    const contactForm = document.querySelector('.contact-form');
    if (!contactForm) return;

    const inputs = contactForm.querySelectorAll('.galactic-input, .galactic-textarea');
    const submitBtn = contactForm.querySelector('.galactic-btn');

    // Real-time validation
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            validateField(this);
        });

        input.addEventListener('input', function() {
            if (this.classList.contains('is-invalid')) {
                validateField(this);
            }
        });
    });

    // Form submission
    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        let isValid = true;
        inputs.forEach(input => {
            if (!validateField(input)) {
                isValid = false;
            }
        });

        if (isValid) {
            // Show loading state
            submitBtn.classList.add('loading');
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Transmitiendo...';

            // Simulate form submission
            setTimeout(() => {
                contactForm.submit();
            }, 1500);
        }
    });
}

// Validate individual field
function validateField(field) {
    const value = field.value.trim();
    let isValid = true;
    let errorMessage = '';

    // Remove previous validation classes
    field.classList.remove('is-valid', 'is-invalid');
    
    // Remove previous error message
    const existingError = field.parentNode.querySelector('.invalid-feedback');
    if (existingError) {
        existingError.remove();
    }

    // Validation rules
    if (field.hasAttribute('required') && !value) {
        isValid = false;
        errorMessage = 'Este campo es requerido para establecer contacto intergaláctico.';
    } else if (field.type === 'email' && value) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(value)) {
            isValid = false;
            errorMessage = 'Frecuencia de respuesta inválida. Verifica tu señal de email.';
        }
    } else if (field.name === 'name' && value && value.length < 2) {
        isValid = false;
        errorMessage = 'El nombre del piloto debe tener al menos 2 caracteres.';
    } else if (field.name === 'message' && value && value.length < 10) {
        isValid = false;
        errorMessage = 'La transmisión debe tener al menos 10 caracteres.';
    }

    // Apply validation classes
    if (isValid && value) {
        field.classList.add('is-valid');
    } else if (!isValid) {
        field.classList.add('is-invalid');
        
        // Add error message
        const errorDiv = document.createElement('div');
        errorDiv.className = 'invalid-feedback';
        errorDiv.textContent = errorMessage;
        field.parentNode.appendChild(errorDiv);
    }

    return isValid;
}

// Add to cart functionality
document.addEventListener('DOMContentLoaded', function() {
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-product-id');
            
            // Show success message
            this.innerHTML = '<i class="fas fa-check"></i> Agregado';
            this.classList.add('btn-success');
            this.classList.remove('btn-outline-neon');
            
            // Reset after 2 seconds
            setTimeout(() => {
                this.innerHTML = '<i class="fas fa-shopping-cart"></i> Agregar';
                this.classList.remove('btn-success');
                this.classList.add('btn-outline-neon');
            }, 2000);
            
            // Here you would typically send the product ID to your cart system
            console.log('Product added to cart:', productId);
        });
    });
});

// Navbar scroll effect
window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
        navbar.classList.add('navbar-scrolled');
    } else {
        navbar.classList.remove('navbar-scrolled');
    }
});

// Smooth reveal animations for elements
function revealOnScroll() {
    const elements = document.querySelectorAll('.reveal');
    
    elements.forEach(element => {
        const elementTop = element.getBoundingClientRect().top;
        const elementVisible = 150;
        
        if (elementTop < window.innerHeight - elementVisible) {
            element.classList.add('active');
        }
    });
}

// Función para inicializar el panel de personalización de colores
function initColorPanel() {
    console.log('🔧 Inicializando panel de colores...');
    
    const toggle = document.getElementById('colorPanelToggle');
    const sidebar = document.getElementById('colorPanelSidebar');
    const overlay = document.getElementById('colorPanelOverlay');
    const themes = document.querySelectorAll('.color-theme');

    console.log('🎨 Elementos encontrados:', {
        toggle: toggle,
        sidebar: sidebar,
        overlay: overlay,
        themes: themes.length
    });

    // Toggle del panel
    if (toggle && sidebar) {
        console.log('✅ Configurando toggle del panel');
        
        toggle.addEventListener('click', () => {
            console.log('🖱️ Click en toggle del panel');
            sidebar.classList.toggle('open');
            overlay.classList.toggle('active');
            toggle.classList.toggle('active');
        });

        // Cerrar con overlay
        overlay.addEventListener('click', () => {
            console.log('🖱️ Click en overlay');
            sidebar.classList.remove('open');
            overlay.classList.remove('active');
            toggle.classList.remove('active');
        });

        // Cerrar con ESC
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && sidebar.classList.contains('open')) {
                console.log('⌨️ Tecla ESC presionada');
                sidebar.classList.remove('open');
                overlay.classList.remove('active');
                toggle.classList.remove('active');
            }
        });
    } else {
        console.error('❌ No se encontraron elementos del panel');
    }

    // Cambiar temas de color
    themes.forEach(theme => {
        theme.addEventListener('click', () => {
            console.log('🎨 Tema seleccionado:', theme.dataset.theme);
            
            // Remover active de todos los temas
            themes.forEach(t => t.classList.remove('active'));
            
            // Agregar active al tema seleccionado
            theme.classList.add('active');
            
            // Aplicar el tema
            const themeName = theme.dataset.theme;
            applyColorTheme(themeName);
            
            // Guardar en localStorage
            localStorage.setItem('knd-color-theme', themeName);
        });
    });

    // Cargar tema guardado
    const savedTheme = localStorage.getItem('knd-color-theme');
    if (savedTheme) {
        console.log('💾 Tema guardado encontrado:', savedTheme);
        applyColorTheme(savedTheme);
        themes.forEach(theme => {
            if (theme.dataset.theme === savedTheme) {
                theme.classList.add('active');
            } else {
                theme.classList.remove('active');
            }
        });
    }
    
    console.log('✅ Panel de colores inicializado');
}

// Función para aplicar temas de color
function applyColorTheme(themeName) {
    const root = document.documentElement;
    
    const themes = {
        'galactic-blue': {
            '--knd-neon-blue': '#00bfff',
            '--knd-electric-purple': '#8a2be2',
            '--knd-dark-blue': '#16213e'
        },
        'cyber-green': {
            '--knd-neon-blue': '#00ff00',
            '--knd-electric-purple': '#32cd32',
            '--knd-dark-blue': '#006400'
        },
        'fire-red': {
            '--knd-neon-blue': '#ff0000',
            '--knd-electric-purple': '#ff4500',
            '--knd-dark-blue': '#8b0000'
        },
        'golden-sun': {
            '--knd-neon-blue': '#ffd700',
            '--knd-electric-purple': '#ffa500',
            '--knd-dark-blue': '#daa520'
        },
        'neon-pink': {
            '--knd-neon-blue': '#ff69b4',
            '--knd-electric-purple': '#ff1493',
            '--knd-dark-blue': '#c71585'
        },
        'ice-blue': {
            '--knd-neon-blue': '#00ffff',
            '--knd-electric-purple': '#87ceeb',
            '--knd-dark-blue': '#4682b4'
        }
    };

    const theme = themes[themeName];
    if (theme) {
        Object.entries(theme).forEach(([property, value]) => {
            root.style.setProperty(property, value);
        });
    }
}

// Inicializar cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', function() {
    // Registrar Service Worker para PWA
    if ('serviceWorker' in navigator) {
        window.addEventListener('load', () => {
            navigator.serviceWorker.register('/assets/js/sw.js')
                .then(registration => {
                    console.log('✅ Service Worker registrado:', registration.scope);
                })
                .catch(error => {
                    console.log('❌ Error registrando Service Worker:', error);
                });
        });
    }

    // Inicializar partículas
    if (typeof particlesJS !== 'undefined') {
        particlesJS('particles-bg', {
            particles: {
                number: { value: 80, density: { enable: true, value_area: 800 } },
                color: { value: ['#00bfff', '#8a2be2', '#00d4ff'] },
                shape: { type: 'circle' },
                opacity: { value: 0.5, random: false },
                size: { value: 3, random: true },
                line_linked: {
                    enable: true,
                    distance: 150,
                    color: '#00bfff',
                    opacity: 0.4,
                    width: 1
                },
                move: {
                    enable: true,
                    speed: 6,
                    direction: 'none',
                    random: false,
                    straight: false,
                    out_mode: 'out',
                    bounce: false
                }
            },
            interactivity: {
                detect_on: 'canvas',
                events: {
                    onhover: { enable: true, mode: 'repulse' },
                    onclick: { enable: true, mode: 'push' },
                    resize: true
                }
            },
            retina_detect: true
        });
    }

    // Inicializar animaciones de scroll
    initScrollAnimations();
    
    // Inicializar formulario de contacto
    initContactForm();
    
    // Inicializar panel de colores
    initColorPanel();
    
    // Add smooth scrolling for anchor links
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

    // Add floating animation to contact elements
    const contactElements = document.querySelectorAll('.contact-form-container, .contact-card, .hours-card');
    contactElements.forEach((element, index) => {
        element.style.animationDelay = `${index * 0.2}s`;
    });
});

window.addEventListener('scroll', revealOnScroll); 