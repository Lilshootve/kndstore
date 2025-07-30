<?php
// KND Store - Diagnóstico de Iconos
require_once 'includes/config.php';
require_once 'includes/header.php';
require_once 'includes/footer.php';

echo generateHeader('Diagnóstico de Iconos', 'Herramienta de diagnóstico para problemas con Font Awesome');
echo generateNavigation();
?>

<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center mb-4">🔍 Diagnóstico de Iconos - KND Store</h1>
            
            <!-- Información del sistema -->
            <div class="card bg-dark mb-4">
                <div class="card-header">
                    <h5><i class="fas fa-info-circle"></i> Información del Sistema</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Servidor:</strong> <?php echo $_SERVER['SERVER_SOFTWARE'] ?? 'Desconocido'; ?></p>
                            <p><strong>PHP:</strong> <?php echo PHP_VERSION; ?></p>
                            <p><strong>URL:</strong> <?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?></p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>User Agent:</strong> <?php echo $_SERVER['HTTP_USER_AGENT'] ?? 'Desconocido'; ?></p>
                            <p><strong>Protocolo:</strong> <?php echo isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'HTTPS' : 'HTTP'; ?></p>
                            <p><strong>Timestamp:</strong> <?php echo date('Y-m-d H:i:s'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Estado de Font Awesome -->
            <div id="fontawesome-status" class="alert alert-info">
                <h4><i class="fas fa-cogs"></i> Estado de Font Awesome</h4>
                <p id="status-text">Verificando carga de iconos...</p>
            </div>
            
            <!-- Pruebas de iconos -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card bg-dark mb-4">
                        <div class="card-header">
                            <h5><i class="fas fa-vial"></i> Prueba 1: Iconos Básicos</h5>
                        </div>
                        <div class="card-body">
                            <div class="icon-test-group">
                                <i class="fas fa-rocket fa-2x text-primary"></i>
                                <i class="fas fa-gamepad fa-2x text-success"></i>
                                <i class="fas fa-headset fa-2x text-warning"></i>
                                <i class="fas fa-code fa-2x text-info"></i>
                                <i class="fas fa-microchip fa-2x text-danger"></i>
                            </div>
                            <p class="mt-3">Si ves iconos arriba, Font Awesome está funcionando.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card bg-dark mb-4">
                        <div class="card-header">
                            <h5><i class="fas fa-search"></i> Prueba 2: Iconos de Navegación</h5>
                        </div>
                        <div class="card-body">
                            <div class="icon-test-group">
                                <i class="fas fa-home fa-2x text-light"></i>
                                <i class="fas fa-list fa-2x text-light"></i>
                                <i class="fas fa-info-circle fa-2x text-light"></i>
                                <i class="fas fa-envelope fa-2x text-light"></i>
                                <i class="fas fa-phone fa-2x text-light"></i>
                            </div>
                            <p class="mt-3">Iconos de navegación del sitio.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Pruebas avanzadas -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card bg-dark mb-4">
                        <div class="card-header">
                            <h5><i class="fas fa-tools"></i> Prueba 3: Iconos de Acciones</h5>
                        </div>
                        <div class="card-body">
                            <div class="icon-test-group">
                                <i class="fas fa-shopping-cart fa-2x text-primary"></i>
                                <i class="fas fa-user-astronaut fa-2x text-success"></i>
                                <i class="fas fa-crown fa-2x text-warning"></i>
                                <i class="fas fa-download fa-2x text-info"></i>
                                <i class="fas fa-arrow-left fa-2x text-danger"></i>
                            </div>
                            <p class="mt-3">Iconos de acciones y botones.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card bg-dark mb-4">
                        <div class="card-header">
                            <h5><i class="fas fa-brain"></i> Prueba 4: Iconos Especiales</h5>
                        </div>
                        <div class="card-body">
                            <div class="icon-test-group">
                                <i class="fas fa-brain fa-2x text-primary"></i>
                                <i class="fas fa-palette fa-2x text-success"></i>
                                <i class="fas fa-magic fa-2x text-warning"></i>
                                <i class="fas fa-robot fa-2x text-info"></i>
                                <i class="fas fa-dice fa-2x text-danger"></i>
                            </div>
                            <p class="mt-3">Iconos especiales del sitio.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Soluciones automáticas -->
            <div class="card bg-dark mb-4">
                <div class="card-header">
                    <h5><i class="fas fa-wrench"></i> Soluciones Automáticas</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <button id="btn-reload-fa" class="btn btn-primary w-100 mb-2">
                                <i class="fas fa-sync-alt"></i> Recargar Font Awesome
                            </button>
                        </div>
                        <div class="col-md-4">
                            <button id="btn-apply-fallbacks" class="btn btn-warning w-100 mb-2">
                                <i class="fas fa-shield-alt"></i> Aplicar Fallbacks
                            </button>
                        </div>
                        <div class="col-md-4">
                            <button id="btn-clear-cache" class="btn btn-info w-100 mb-2">
                                <i class="fas fa-broom"></i> Limpiar Cache
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Logs de diagnóstico -->
            <div class="card bg-dark mb-4">
                <div class="card-header">
                    <h5><i class="fas fa-file-alt"></i> Logs de Diagnóstico</h5>
                </div>
                <div class="card-body">
                    <div id="diagnostic-logs" style="max-height: 200px; overflow-y: auto; background: #1a1a1a; padding: 10px; border-radius: 5px; font-family: monospace; font-size: 12px;">
                        <p>Iniciando diagnóstico...</p>
                    </div>
                </div>
            </div>
            
            <!-- Enlaces útiles -->
            <div class="text-center">
                <a href="test-icons-simple.html" class="btn btn-secondary me-3">
                    <i class="fas fa-vial"></i> Test Simple
                </a>
                <a href="test-icons.html" class="btn btn-secondary me-3">
                    <i class="fas fa-flask"></i> Test Completo
                </a>
                <a href="fix-icons.php" class="btn btn-primary me-3">
                    <i class="fas fa-tools"></i> Solución Automática
                </a>
                <a href="index.php" class="btn btn-outline-light">
                    <i class="fas fa-home"></i> Inicio
                </a>
            </div>
        </div>
    </div>
</div>

<style>
.icon-test-group {
    display: flex;
    justify-content: space-around;
    align-items: center;
    flex-wrap: wrap;
    gap: 10px;
}

.icon-test-group i {
    margin: 5px;
}

#diagnostic-logs p {
    margin: 2px 0;
    color: #00bfff;
}

#diagnostic-logs .error {
    color: #dc3545;
}

#diagnostic-logs .success {
    color: #28a745;
}

#diagnostic-logs .warning {
    color: #ffc107;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const logsContainer = document.getElementById('diagnostic-logs');
    const statusDiv = document.getElementById('fontawesome-status');
    const statusText = document.getElementById('status-text');
    
    function addLog(message, type = 'info') {
        const p = document.createElement('p');
        p.className = type;
        p.textContent = `[${new Date().toLocaleTimeString()}] ${message}`;
        logsContainer.appendChild(p);
        logsContainer.scrollTop = logsContainer.scrollHeight;
    }
    
    // Función para verificar Font Awesome
    function checkFontAwesome() {
        addLog('Verificando Font Awesome...');
        
        const testElement = document.createElement('i');
        testElement.className = 'fas fa-rocket';
        testElement.style.position = 'absolute';
        testElement.style.left = '-9999px';
        testElement.style.fontSize = '1px';
        document.body.appendChild(testElement);
        
        const computedStyle = window.getComputedStyle(testElement, '::before');
        const content = computedStyle.getPropertyValue('content');
        
        document.body.removeChild(testElement);
        
        if (!content || content === 'none' || content === 'normal') {
            statusDiv.className = 'alert alert-danger';
            statusText.innerHTML = '❌ Font Awesome NO se cargó correctamente.';
            addLog('Font Awesome NO detectado', 'error');
            return false;
        } else {
            statusDiv.className = 'alert alert-success';
            statusText.innerHTML = '✅ Font Awesome se cargó correctamente.';
            addLog('Font Awesome detectado correctamente', 'success');
            return true;
        }
    }
    
    // Función para recargar Font Awesome
    function reloadFontAwesome() {
        addLog('Recargando Font Awesome...', 'warning');
        
        // Remover enlaces existentes
        const existingLinks = document.querySelectorAll('link[href*="font-awesome"]');
        existingLinks.forEach(link => link.remove());
        
        // Agregar nuevos enlaces
        const cdnUrls = [
            'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
            'https://use.fontawesome.com/releases/v6.4.0/css/all.css',
            'https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.0/css/all.min.css'
        ];
        
        cdnUrls.forEach(url => {
            const link = document.createElement('link');
            link.rel = 'stylesheet';
            link.href = url;
            document.head.appendChild(link);
        });
        
        setTimeout(() => {
            if (checkFontAwesome()) {
                addLog('Font Awesome recargado exitosamente', 'success');
            } else {
                addLog('Error al recargar Font Awesome', 'error');
            }
        }, 2000);
    }
    
    // Función para aplicar fallbacks
    function applyFallbacks() {
        addLog('Aplicando fallbacks...', 'warning');
        
        const icons = document.querySelectorAll('.fas, .fab, .far, .fa');
        let fallbackCount = 0;
        
        icons.forEach(icon => {
            const computedStyle = window.getComputedStyle(icon, '::before');
            const content = computedStyle.getPropertyValue('content');
            
            if (!content || content === 'none' || content === 'normal') {
                const iconName = icon.className.match(/fa-(\w+)/);
                if (iconName) {
                    const fallbackText = getFallbackText(iconName[1]);
                    icon.textContent = fallbackText;
                    icon.style.fontFamily = 'monospace';
                    icon.style.fontSize = '1.2em';
                    fallbackCount++;
                }
            }
        });
        
        addLog(`Aplicados ${fallbackCount} fallbacks`, 'success');
    }
    
    // Función para obtener texto de fallback
    function getFallbackText(iconName) {
        const fallbacks = {
            'rocket': '🚀', 'gamepad': '🎮', 'headset': '🎧', 'code': '💻',
            'microchip': '🔧', 'search': '🔍', 'eye': '👁️', 'envelope': '📧',
            'phone': '📞', 'home': '🏠', 'info-circle': 'ℹ️', 'shipping-fast': '🚚',
            'shield-alt': '🛡️', 'check-circle': '✅', 'cogs': '⚙️', 'globe': '🌍',
            'shopping-cart': '🛒', 'user-astronaut': '👨‍🚀', 'crown': '👑',
            'download': '⬇️', 'arrow-left': '←', 'brain': '🧠', 'palette': '🎨',
            'magic': '✨', 'robot': '🤖', 'dice': '🎲'
        };
        return fallbacks[iconName] || '□';
    }
    
    // Event listeners
    document.getElementById('btn-reload-fa').addEventListener('click', reloadFontAwesome);
    document.getElementById('btn-apply-fallbacks').addEventListener('click', applyFallbacks);
    document.getElementById('btn-clear-cache').addEventListener('click', () => {
        addLog('Limpiando cache del navegador...', 'warning');
        if ('caches' in window) {
            caches.keys().then(names => {
                names.forEach(name => {
                    caches.delete(name);
                });
                addLog('Cache limpiado', 'success');
            });
        } else {
            addLog('Cache no disponible en este navegador', 'warning');
        }
    });
    
    // Inicializar diagnóstico
    setTimeout(checkFontAwesome, 1000);
    
    // Verificar periódicamente
    setInterval(checkFontAwesome, 10000);
});
</script>

<?php
echo generateFooter();
?> 