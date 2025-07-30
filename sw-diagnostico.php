<?php
// KND Store - Diagnóstico Service Worker
require_once 'includes/config.php';
require_once 'includes/header.php';
require_once 'includes/footer.php';

echo generateHeader('Diagnóstico Service Worker', 'Herramienta de diagnóstico para Service Worker y CSP');
echo generateNavigation();
?>

<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center mb-4">🔧 Diagnóstico Service Worker - KND Store</h1>
            
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
            
            <!-- Estado del Service Worker -->
            <div class="card bg-dark mb-4">
                <div class="card-header">
                    <h5><i class="fas fa-cogs"></i> Estado del Service Worker</h5>
                </div>
                <div class="card-body">
                    <div id="sw-status" class="alert alert-info">
                        <p>Verificando...</p>
                    </div>
                </div>
            </div>
            
            <!-- Estado de CSP -->
            <div class="card bg-dark mb-4">
                <div class="card-header">
                    <h5><i class="fas fa-shield-alt"></i> Content Security Policy</h5>
                </div>
                <div class="card-body">
                    <div id="csp-status" class="alert alert-info">
                        <p>Verificando...</p>
                    </div>
                </div>
            </div>
            
            <!-- Recursos Cacheados -->
            <div class="card bg-dark mb-4">
                <div class="card-header">
                    <h5><i class="fas fa-database"></i> Recursos Cacheados</h5>
                </div>
                <div class="card-body">
                    <div id="cache-status" class="alert alert-info">
                        <p>Verificando...</p>
                    </div>
                </div>
            </div>
            
            <!-- Logs de Diagnóstico -->
            <div class="card bg-dark mb-4">
                <div class="card-header">
                    <h5><i class="fas fa-file-alt"></i> Logs de Diagnóstico</h5>
                </div>
                <div class="card-body">
                    <div id="diagnostic-logs" style="max-height: 300px; overflow-y: auto; background: #1a1a1a; padding: 15px; border-radius: 5px; font-family: monospace; font-size: 12px;">
                        <p style="color: #00bfff;">Iniciando diagnóstico...</p>
                    </div>
                </div>
            </div>
            
            <!-- Botones de Acción -->
            <div class="text-center">
                <button id="btn-update-sw" class="btn btn-primary me-3">
                    <i class="fas fa-sync-alt"></i> Actualizar Service Worker
                </button>
                <button id="btn-clear-cache" class="btn btn-warning me-3">
                    <i class="fas fa-broom"></i> Limpiar Cache
                </button>
                <button id="btn-test-csp" class="btn btn-info me-3">
                    <i class="fas fa-vial"></i> Test CSP
                </button>
                <a href="index.php" class="btn btn-outline-light">
                    <i class="fas fa-home"></i> Inicio
                </a>
            </div>
        </div>
    </div>
</div>

<style>
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
    const swStatus = document.getElementById('sw-status');
    const cspStatus = document.getElementById('csp-status');
    const cacheStatus = document.getElementById('cache-status');
    
    function addLog(message, type = 'info') {
        const p = document.createElement('p');
        p.className = type;
        p.textContent = `[${new Date().toLocaleTimeString()}] ${message}`;
        logsContainer.appendChild(p);
        logsContainer.scrollTop = logsContainer.scrollHeight;
    }
    
    // Verificar Service Worker
    async function checkServiceWorker() {
        addLog('Verificando Service Worker...', 'info');
        
        if ('serviceWorker' in navigator) {
            try {
                const registration = await navigator.serviceWorker.getRegistration();
                if (registration) {
                    swStatus.className = 'alert alert-success';
                    swStatus.innerHTML = `
                        <h6><strong>✅ Service Worker Activo</strong></h6>
                        <p>Estado: ${registration.active ? 'Activo' : 'Inactivo'}</p>
                        <p>Scope: ${registration.scope}</p>
                    `;
                    addLog('Service Worker detectado y activo', 'success');
                } else {
                    swStatus.className = 'alert alert-danger';
                    swStatus.innerHTML = '<h6><strong>❌ Service Worker No Encontrado</strong></h6>';
                    addLog('Service Worker no encontrado', 'error');
                }
            } catch (error) {
                swStatus.className = 'alert alert-danger';
                swStatus.innerHTML = `<h6><strong>❌ Error:</strong> ${error.message}</h6>`;
                addLog(`Error al verificar Service Worker: ${error.message}`, 'error');
            }
        } else {
            swStatus.className = 'alert alert-danger';
            swStatus.innerHTML = '<h6><strong>❌ Service Worker No Soportado</strong></h6>';
            addLog('Service Worker no soportado en este navegador', 'error');
        }
    }
    
    // Verificar CSP
    function checkCSP() {
        addLog('Verificando Content Security Policy...', 'info');
        
        const cspHeader = document.querySelector('meta[http-equiv="Content-Security-Policy"]');
        if (cspHeader) {
            cspStatus.className = 'alert alert-success';
            cspStatus.innerHTML = `
                <h6><strong>✅ CSP Detectado</strong></h6>
                <p>Directiva: ${cspHeader.content}</p>
            `;
            addLog('CSP detectado en meta tag', 'success');
        } else {
            // Verificar en headers HTTP
            cspStatus.className = 'alert alert-warning';
            cspStatus.innerHTML = `
                <h6><strong>⚠️ CSP No Detectado en Meta Tag</strong></h6>
                <p>Verificando headers HTTP...</p>
            `;
            addLog('CSP no detectado en meta tag, verificando headers', 'warning');
        }
    }
    
    // Verificar Cache
    async function checkCache() {
        addLog('Verificando cache del Service Worker...', 'info');
        
        if ('caches' in window) {
            try {
                const cacheNames = await caches.keys();
                const kndCaches = cacheNames.filter(name => name.includes('knd'));
                
                if (kndCaches.length > 0) {
                    cacheStatus.className = 'alert alert-success';
                    cacheStatus.innerHTML = `
                        <h6><strong>✅ Caches Encontrados</strong></h6>
                        <ul>
                            ${kndCaches.map(cache => `<li>${cache}</li>`).join('')}
                        </ul>
                    `;
                    addLog(`Encontrados ${kndCaches.length} caches de KND Store`, 'success');
                    
                    // Verificar contenido del cache
                    for (const cacheName of kndCaches) {
                        const cache = await caches.open(cacheName);
                        const keys = await cache.keys();
                        addLog(`Cache '${cacheName}': ${keys.length} recursos`, 'info');
                    }
                } else {
                    cacheStatus.className = 'alert alert-warning';
                    cacheStatus.innerHTML = '<h6><strong>⚠️ No se encontraron caches de KND Store</strong></h6>';
                    addLog('No se encontraron caches específicos de KND Store', 'warning');
                }
            } catch (error) {
                cacheStatus.className = 'alert alert-danger';
                cacheStatus.innerHTML = `<h6><strong>❌ Error:</strong> ${error.message}</h6>`;
                addLog(`Error al verificar cache: ${error.message}`, 'error');
            }
        } else {
            cacheStatus.className = 'alert alert-danger';
            cacheStatus.innerHTML = '<h6><strong>❌ Cache API No Soportada</strong></h6>';
            addLog('Cache API no soportada en este navegador', 'error');
        }
    }
    
    // Test de CSP
    async function testCSP() {
        addLog('Realizando test de CSP...', 'info');
        
        const testUrls = [
            'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css',
            'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
            'https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Inter:wght@400;600&display=swap'
        ];
        
        for (const url of testUrls) {
            try {
                const response = await fetch(url, { mode: 'no-cors' });
                addLog(`✅ ${url} - Acceso permitido`, 'success');
            } catch (error) {
                addLog(`❌ ${url} - Bloqueado por CSP: ${error.message}`, 'error');
            }
        }
    }
    
    // Actualizar Service Worker
    async function updateServiceWorker() {
        addLog('Actualizando Service Worker...', 'warning');
        
        if ('serviceWorker' in navigator) {
            try {
                const registration = await navigator.serviceWorker.getRegistration();
                if (registration) {
                    await registration.update();
                    addLog('Service Worker actualizado', 'success');
                    setTimeout(checkServiceWorker, 1000);
                } else {
                    addLog('No se encontró registro del Service Worker', 'error');
                }
            } catch (error) {
                addLog(`Error al actualizar Service Worker: ${error.message}`, 'error');
            }
        }
    }
    
    // Limpiar Cache
    async function clearCache() {
        addLog('Limpiando cache...', 'warning');
        
        if ('caches' in window) {
            try {
                const cacheNames = await caches.keys();
                const kndCaches = cacheNames.filter(name => name.includes('knd'));
                
                for (const cacheName of kndCaches) {
                    await caches.delete(cacheName);
                    addLog(`Cache eliminado: ${cacheName}`, 'success');
                }
                
                addLog('Todos los caches de KND Store eliminados', 'success');
                setTimeout(checkCache, 1000);
            } catch (error) {
                addLog(`Error al limpiar cache: ${error.message}`, 'error');
            }
        }
    }
    
    // Event listeners
    document.getElementById('btn-update-sw').addEventListener('click', updateServiceWorker);
    document.getElementById('btn-clear-cache').addEventListener('click', clearCache);
    document.getElementById('btn-test-csp').addEventListener('click', testCSP);
    
    // Inicializar diagnóstico
    setTimeout(() => {
        checkServiceWorker();
        checkCSP();
        checkCache();
    }, 1000);
});
</script>

<?php
echo generateFooter();
?> 