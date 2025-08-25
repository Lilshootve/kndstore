<?php
// KND Store - Diagnóstico de Iconos
require_once 'includes/config.php';
require_once 'includes/header.php';
require_once 'includes/footer.php';

echo generateHeader('Diagnóstico de Iconos', 'Herramienta para verificar el estado de Font Awesome');
echo generateNavigation();
?>

<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center mb-4">🔧 Diagnóstico de Iconos - KND Store</h1>
            
            <!-- Estado de Font Awesome -->
            <div class="card bg-dark mb-4">
                <div class="card-header">
                    <h5><i class="fas fa-info-circle"></i> Estado de Font Awesome</h5>
                </div>
                <div class="card-body">
                    <div id="fa-status" class="alert alert-info">
                        <p>Verificando...</p>
                    </div>
                </div>
            </div>
            
            <!-- Iconos de Prueba -->
            <div class="card bg-dark mb-4">
                <div class="card-header">
                    <h5><i class="fas fa-vial"></i> Iconos de Prueba</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-rocket fa-2x text-primary mb-2"></i>
                                <div>Cohete</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-gamepad fa-2x text-primary mb-2"></i>
                                <div>Gamepad</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-headset fa-2x text-primary mb-2"></i>
                                <div>Headset</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-code fa-2x text-primary mb-2"></i>
                                <div>Código</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-microchip fa-2x text-primary mb-2"></i>
                                <div>Microchip</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-search fa-2x text-primary mb-2"></i>
                                <div>Búsqueda</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-eye fa-2x text-primary mb-2"></i>
                                <div>Ojo</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-envelope fa-2x text-primary mb-2"></i>
                                <div>Envelope</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-phone fa-2x text-primary mb-2"></i>
                                <div>Teléfono</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-clock fa-2x text-primary mb-2"></i>
                                <div>Reloj</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-palette fa-2x text-primary mb-2"></i>
                                <div>Paleta</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-magic fa-2x text-primary mb-2"></i>
                                <div>Magia</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-brain fa-2x text-primary mb-2"></i>
                                <div>Cerebro</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-credit-card fa-2x text-primary mb-2"></i>
                                <div>Tarjeta</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-coins fa-2x text-primary mb-2"></i>
                                <div>Monedas</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-tools fa-2x text-primary mb-2"></i>
                                <div>Herramientas</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-shopping-cart fa-2x text-primary mb-2"></i>
                                <div>Carrito</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-user-astronaut fa-2x text-primary mb-2"></i>
                                <div>Astronauta</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-crown fa-2x text-primary mb-2"></i>
                                <div>Corona</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-home fa-2x text-primary mb-2"></i>
                                <div>Casa</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-info-circle fa-2x text-primary mb-2"></i>
                                <div>Info</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-shipping-fast fa-2x text-primary mb-2"></i>
                                <div>Envío</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-shield-alt fa-2x text-primary mb-2"></i>
                                <div>Escudo</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-check-circle fa-2x text-primary mb-2"></i>
                                <div>Check</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-cogs fa-2x text-primary mb-2"></i>
                                <div>Engranajes</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-globe fa-2x text-primary mb-2"></i>
                                <div>Globo</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-paper-plane fa-2x text-primary mb-2"></i>
                                <div>Avión</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-exclamation-triangle fa-2x text-primary mb-2"></i>
                                <div>Advertencia</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-undo fa-2x text-primary mb-2"></i>
                                <div>Deshacer</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-copyright fa-2x text-primary mb-2"></i>
                                <div>Copyright</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-file-contract fa-2x text-primary mb-2"></i>
                                <div>Contrato</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-database fa-2x text-primary mb-2"></i>
                                <div>Base de Datos</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-lock fa-2x text-primary mb-2"></i>
                                <div>Candado</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-cookie-bite fa-2x text-primary mb-2"></i>
                                <div>Cookie</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-share-alt fa-2x text-primary mb-2"></i>
                                <div>Compartir</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-user-shield fa-2x text-primary mb-2"></i>
                                <div>Usuario Escudo</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-user-check fa-2x text-primary mb-2"></i>
                                <div>Usuario Check</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-edit fa-2x text-primary mb-2"></i>
                                <div>Editar</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-satellite fa-2x text-primary mb-2"></i>
                                <div>Satélite</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-broadcast-tower fa-2x text-primary mb-2"></i>
                                <div>Torre</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-bullseye fa-2x text-primary mb-2"></i>
                                <div>Diana</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-comments fa-2x text-primary mb-2"></i>
                                <div>Comentarios</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-robot fa-2x text-primary mb-2"></i>
                                <div>Robot</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-dice fa-2x text-primary mb-2"></i>
                                <div>Dados</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-crystal-ball fa-2x text-primary mb-2"></i>
                                <div>Bola de Cristal</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-question-circle fa-2x text-primary mb-2"></i>
                                <div>Pregunta</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-vial fa-2x text-primary mb-2"></i>
                                <div>Tubo de Ensayo</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-list fa-2x text-primary mb-2"></i>
                                <div>Lista</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-download fa-2x text-primary mb-2"></i>
                                <div>Descargar</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-arrow-left fa-2x text-primary mb-2"></i>
                                <div>Flecha Izquierda</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-sign-in-alt fa-2x text-primary mb-2"></i>
                                <div>Entrar</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center p-3 border border-primary rounded">
                                <i class="fas fa-user-plus fa-2x text-primary mb-2"></i>
                                <div>Agregar Usuario</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Botones de Acción -->
            <div class="text-center">
                <a href="test-icons-simple.html" class="btn btn-primary me-3" target="_blank">
                    <i class="fas fa-external-link-alt"></i> Test Externo
                </a>
                <a href="index.php" class="btn btn-outline-light">
                    <i class="fas fa-home"></i> Inicio
                </a>
            </div>
        </div>
    </div>
</div>

<script>
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
        
        const statusDiv = document.getElementById('fa-status');
        
        if (content && content !== 'none' && content !== 'normal') {
            statusDiv.innerHTML = '<div class="alert alert-success"><i class="fas fa-check-circle"></i> Font Awesome cargado correctamente</div>';
        } else {
            statusDiv.innerHTML = '<div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Font Awesome NO está cargado</div>';
        }
    }
    
    // Verificar cuando la página se carga
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', checkFontAwesome);
    } else {
        checkFontAwesome();
    }
    
    // También verificar cuando la ventana se carga completamente
    window.addEventListener('load', checkFontAwesome);
</script>

<?php echo generateFooter(); ?> 