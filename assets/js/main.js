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

// Initialize everything when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    initScrollAnimations();
    initContactForm();
    
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