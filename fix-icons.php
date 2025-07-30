<?php
// KND Store - Solución para Iconos de Font Awesome
require_once 'includes/config.php';
require_once 'includes/header.php';
require_once 'includes/footer.php';

// Generar el header con Font Awesome mejorado
echo generateHeader('Solución de Iconos', 'Diagnóstico y solución para iconos de Font Awesome');

// Generar la navegación
echo generateNavigation();

// Generar el panel de colores
echo generateColorPanel();
?>

<!-- Contenido principal -->
<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center mb-4">🔧 Solución de Iconos - KND Store</h1>
            
            <!-- Estado de Font Awesome -->
            <div id="fontawesome-status" class="alert alert-info">
                <h4><i class="fas fa-info-circle"></i> Estado de Font Awesome</h4>
                <p id="status-text">Verificando carga de iconos...</p>
            </div>
            
            <!-- Soluciones -->
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card bg-dark">
                        <div class="card-header">
                            <h5><i class="fas fa-tools"></i> Solución 1: CDN Principal</h5>
                        </div>
                        <div class="card-body">
                            <p>Usando CDN de Cloudflare:</p>
                            <code>&lt;link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"&gt;</code>
                            <div class="mt-3">
                                <i class="fas fa-rocket fa-2x text-primary"></i>
                                <i class="fas fa-gamepad fa-2x text-success"></i>
                                <i class="fas fa-headset fa-2x text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card bg-dark">
                        <div class="card-header">
                            <h5><i class="fas fa-download"></i> Solución 2: CDN Secundario</h5>
                        </div>
                        <div class="card-body">
                            <p>Usando CDN oficial de Font Awesome:</p>
                            <code>&lt;link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.0/css/all.css"&gt;</code>
                            <div class="mt-3">
                                <i class="fas fa-code fa-2x text-info"></i>
                                <i class="fas fa-microchip fa-2x text-danger"></i>
                                <i class="fas fa-brain fa-2x text-light"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Iconos de categorías -->
            <div class="row mt-4">
                <div class="col-12">
                    <h3><i class="fas fa-list"></i> Iconos de Categorías</h3>
                    <div class="row">
                        <div class="col-lg-2 col-md-4 col-6 mb-3">
                            <div class="category-card">
                                <div class="category-icon">
                                    <i class="fas fa-rocket"></i>
                                </div>
                                <h5>Tecnología</h5>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6 mb-3">
                            <div class="category-card">
                                <div class="category-icon">
                                    <i class="fas fa-gamepad"></i>
                                </div>
                                <h5>Gaming</h5>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6 mb-3">
                            <div class="category-card">
                                <div class="category-icon">
                                    <i class="fas fa-headset"></i>
                                </div>
                                <h5>Accesorios</h5>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6 mb-3">
                            <div class="category-card">
                                <div class="category-icon">
                                    <i class="fas fa-code"></i>
                                </div>
                                <h5>Software</h5>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6 mb-3">
                            <div class="category-card">
                                <div class="category-icon">
                                    <i class="fas fa-microchip"></i>
                                </div>
                                <h5>Hardware</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Botones de acción -->
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <a href="products.php" class="btn btn-primary me-3">
                        <i class="fas fa-arrow-left"></i> Volver al Catálogo
                    </a>
                    <a href="test-icons.html" class="btn btn-secondary me-3">
                        <i class="fas fa-vial"></i> Test Completo
                    </a>
                    <a href="index.php" class="btn btn-outline-light">
                        <i class="fas fa-home"></i> Inicio
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts adicionales para Font Awesome -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Verificar si Font Awesome está cargado
    function checkFontAwesome() {
        const testElement = document.createElement('i');
        testElement.className = 'fas fa-rocket';
        testElement.style.position = 'absolute';
        testElement.style.left = '-9999px';
        testElement.style.fontSize = '1px';
        document.body.appendChild(testElement);
        
        const computedStyle = window.getComputedStyle(testElement, '::before');
        const content = computedStyle.getPropertyValue('content');
        
        document.body.removeChild(testElement);
        
        const statusDiv = document.getElementById('fontawesome-status');
        const statusText = document.getElementById('status-text');
        
        if (!content || content === 'none' || content === 'normal') {
            statusDiv.className = 'alert alert-danger';
            statusText.innerHTML = '❌ Font Awesome NO se cargó correctamente. Intentando cargar manualmente...';
            
            // Intentar cargar Font Awesome manualmente
            loadFontAwesomeManually();
        } else {
            statusDiv.className = 'alert alert-success';
            statusText.innerHTML = '✅ Font Awesome se cargó correctamente. Los iconos deberían mostrarse normalmente.';
        }
    }
    
    // Función para cargar Font Awesome manualmente
    function loadFontAwesomeManually() {
        const link = document.createElement('link');
        link.rel = 'stylesheet';
        link.href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css';
        link.onload = function() {
            setTimeout(checkFontAwesome, 1000);
        };
        link.onerror = function() {
            // Intentar con CDN alternativo
            const link2 = document.createElement('link');
            link2.rel = 'stylesheet';
            link2.href = 'https://use.fontawesome.com/releases/v6.4.0/css/all.css';
            link2.onload = function() {
                setTimeout(checkFontAwesome, 1000);
            };
            document.head.appendChild(link2);
        };
        document.head.appendChild(link);
    }
    
    // Verificar después de un delay
    setTimeout(checkFontAwesome, 1000);
});
</script>

<?php
// Generar el footer
echo generateFooter();
?> 