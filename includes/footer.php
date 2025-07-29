<?php
// KND Store - Footer común

// Función para generar el footer completo
function generateFooter() {
    $footer = '    <!-- Footer -->' . "\n";
    $footer .= '    <footer class="footer py-5 position-relative">' . "\n";
    $footer .= '        <div class="container position-relative z-2">' . "\n";
    $footer .= '            <div class="row g-5">' . "\n";
    $footer .= '                <div class="col-lg-4">' . "\n";
    $footer .= '                    <h3 class="mb-4">' . "\n";
    $footer .= '                        <i class="fas fa-crown me-2"></i>' . "\n";
    $footer .= '                        <span class="glow-text">KND STORE</span>' . "\n";
    $footer .= '                    </h3>' . "\n";
    $footer .= '                    <p class="mb-4" style="opacity: 0.8;">' . "\n";
    $footer .= '                        Tu tienda galáctica de productos únicos y tecnología de vanguardia. Descubre un universo de posibilidades con nuestro catálogo exclusivo.' . "\n";
    $footer .= '                    </p>' . "\n";
    $footer .= '                    <div class="d-flex mt-4">' . "\n";
    $footer .= '                        <a href="#" class="btn btn-outline-neon btn-icon me-3">' . "\n";
    $footer .= '                            <i class="fab fa-discord"></i>' . "\n";
    $footer .= '                        </a>' . "\n";
    $footer .= '                        <a href="#" class="btn btn-outline-neon btn-icon me-3">' . "\n";
    $footer .= '                            <i class="fab fa-twitter"></i>' . "\n";
    $footer .= '                        </a>' . "\n";
    $footer .= '                        <a href="#" class="btn btn-outline-neon btn-icon me-3">' . "\n";
    $footer .= '                            <i class="fab fa-instagram"></i>' . "\n";
    $footer .= '                        </a>' . "\n";
    $footer .= '                        <a href="#" class="btn btn-outline-neon btn-icon">' . "\n";
    $footer .= '                            <i class="fab fa-youtube"></i>' . "\n";
    $footer .= '                        </a>' . "\n";
    $footer .= '                    </div>' . "\n";
    $footer .= '                </div>' . "\n";
    $footer .= '                ' . "\n";
    $footer .= '                <div class="col-lg-2 col-md-4">' . "\n";
    $footer .= '                    <h5 class="mb-4">NAVEGACIÓN</h5>' . "\n";
    $footer .= '                    <ul class="list-unstyled">' . "\n";
    $footer .= '                        <li class="mb-3"><a href="index.php" class="text-decoration-none" style="opacity: 0.8;">Inicio</a></li>' . "\n";
    $footer .= '                        <li class="mb-3"><a href="products.php" class="text-decoration-none" style="opacity: 0.8;">Productos</a></li>' . "\n";
    $footer .= '                        <li class="mb-3"><a href="about.php" class="text-decoration-none" style="opacity: 0.8;">Sobre Nosotros</a></li>' . "\n";
    $footer .= '                        <li class="mb-3"><a href="contact.php" class="text-decoration-none" style="opacity: 0.8;">Contacto</a></li>' . "\n";
    $footer .= '                        <li class="mb-3"><a href="faq.php" class="text-decoration-none" style="opacity: 0.8;">FAQ</a></li>' . "\n";
    $footer .= '                        <li class="mb-3"><a href="privacy.php" class="text-decoration-none" style="opacity: 0.8;">Política de Privacidad</a></li>' . "\n";
    $footer .= '                    </ul>' . "\n";
    $footer .= '                </div>' . "\n";
    $footer .= '                ' . "\n";
    $footer .= '                <div class="col-lg-3 col-md-4">' . "\n";
    $footer .= '                    <h5 class="mb-4">CATEGORÍAS</h5>' . "\n";
    $footer .= '                    <ul class="list-unstyled">' . "\n";
    $footer .= '                        <li class="mb-3"><a href="products.php?categoria=tecnologia" class="text-decoration-none" style="opacity: 0.8;">Tecnología</a></li>' . "\n";
    $footer .= '                        <li class="mb-3"><a href="products.php?categoria=gaming" class="text-decoration-none" style="opacity: 0.8;">Gaming</a></li>' . "\n";
    $footer .= '                        <li class="mb-3"><a href="products.php?categoria=accesorios" class="text-decoration-none" style="opacity: 0.8;">Accesorios</a></li>' . "\n";
    $footer .= '                        <li class="mb-3"><a href="products.php?categoria=software" class="text-decoration-none" style="opacity: 0.8;">Software</a></li>' . "\n";
    $footer .= '                        <li class="mb-3"><a href="products.php?categoria=hardware" class="text-decoration-none" style="opacity: 0.8;">Hardware</a></li>' . "\n";
    $footer .= '                    </ul>' . "\n";
    $footer .= '                </div>' . "\n";
    $footer .= '                ' . "\n";
    $footer .= '                <div class="col-lg-3 col-md-4">' . "\n";
    $footer .= '                    <h5 class="mb-4">CONTACTO</h5>' . "\n";
    $footer .= '                    <ul class="list-unstyled">' . "\n";
    $footer .= '                        <li class="mb-3 d-flex align-items-center">' . "\n";
    $footer .= '                            <i class="fas fa-envelope me-3" style="color: var(--knd-neon-blue);"></i>' . "\n";
    $footer .= '                            <span style="opacity: 0.8;">info@kndstore.com</span>' . "\n";
    $footer .= '                        </li>' . "\n";
    $footer .= '                        <li class="mb-3 d-flex align-items-center">' . "\n";
    $footer .= '                            <i class="fas fa-headset me-3" style="color: var(--knd-neon-blue);"></i>' . "\n";
    $footer .= '                            <span style="opacity: 0.8;">Soporte 24/7</span>' . "\n";
    $footer .= '                        </li>' . "\n";
    $footer .= '                        <li class="mb-3 d-flex align-items-center">' . "\n";
    $footer .= '                            <i class="fab fa-discord me-3" style="color: var(--knd-neon-blue);"></i>' . "\n";
    $footer .= '                            <span style="opacity: 0.8;">Discord: KND_Store</span>' . "\n";
    $footer .= '                        </li>' . "\n";
    $footer .= '                        <li class="mb-3 d-flex align-items-center">' . "\n";
    $footer .= '                            <i class="fas fa-map-marker-alt me-3" style="color: var(--knd-neon-blue);"></i>' . "\n";
    $footer .= '                            <span style="opacity: 0.8;">Sector Galáctico 7, Vía Láctea</span>' . "\n";
    $footer .= '                        </li>' . "\n";
    $footer .= '                    </ul>' . "\n";
    $footer .= '                    ' . "\n";
    $footer .= '                    <h6 class="mt-4 mb-3">PAGOS SEGUROS</h6>' . "\n";
    $footer .= '                    <div class="d-flex flex-wrap">' . "\n";
    $footer .= '                        <div class="me-3 mb-3">' . "\n";
    $footer .= '                            <i class="fab fa-cc-paypal fa-2x" style="color: var(--knd-electric-purple);"></i>' . "\n";
    $footer .= '                        </div>' . "\n";
    $footer .= '                        <div class="me-3 mb-3">' . "\n";
    $footer .= '                            <i class="fab fa-cc-stripe fa-2x" style="color: var(--knd-electric-purple);"></i>' . "\n";
    $footer .= '                        </div>' . "\n";
    $footer .= '                        <div class="me-3 mb-3">' . "\n";
    $footer .= '                            <i class="fab fa-bitcoin fa-2x" style="color: var(--knd-electric-purple);"></i>' . "\n";
    $footer .= '                        </div>' . "\n";
    $footer .= '                        <div class="me-3 mb-3">' . "\n";
    $footer .= '                            <i class="fab fa-cc-visa fa-2x" style="color: var(--knd-electric-purple);"></i>' . "\n";
    $footer .= '                        </div>' . "\n";
    $footer .= '                    </div>' . "\n";
    $footer .= '                </div>' . "\n";
    $footer .= '            </div>' . "\n";
    $footer .= '            ' . "\n";
    $footer .= '            <hr class="my-5" style="border-color: rgba(138, 43, 226, 0.2);">' . "\n";
    $footer .= '            ' . "\n";
    $footer .= '            <div class="text-center pt-3">' . "\n";
    $footer .= '                <p class="mb-0" style="opacity: 0.7;">' . "\n";
    $footer .= '                    &copy; ' . date('Y') . ' KND STORE. Todos los derechos reservados.' . "\n";
    $footer .= '                </p>' . "\n";
    $footer .= '            </div>' . "\n";
    $footer .= '        </div>' . "\n";
    $footer .= '        ' . "\n";
    $footer .= '        <!-- Efecto de partículas -->' . "\n";
    $footer .= '        <div class="position-absolute top-0 left-0 w-100 h-100" id="particles-js"></div>' . "\n";
    $footer .= '    </footer>' . "\n";
    
    return $footer;
}

// Función para generar los scripts comunes
function generateScripts() {
    $scripts = '';
    
    // jQuery (requerido para AJAX)
    $scripts .= '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>' . "\n";
    
    // Bootstrap JS
    $scripts .= '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>' . "\n";
    
    // Particles.js
    $scripts .= '<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>' . "\n";
    
    // Custom JS
    $scripts .= '<script src="assets/js/main.js"></script>' . "\n";
    
    $scripts .= '</body>' . "\n";
    $scripts .= '</html>' . "\n";
    
    return $scripts;
}
?> 