<?php
// KND Store - Forzar Actualización Service Worker
require_once 'includes/config.php';
require_once 'includes/header.php';
require_once 'includes/footer.php';

echo generateHeader('Forzar Actualización SW', 'Herramienta para forzar la actualización del Service Worker');
echo generateNavigation();
?>

<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center mb-4">🔄 Forzar Actualización Service Worker - KND Store</h1>
            
            <div class="alert alert-warning">
                <h5><i class="fas fa-exclamation-triangle"></i> Atención</h5>
                <p>Esta herramienta forzará la actualización del Service Worker y limpiará todos los caches. Esto puede resolver problemas de CSP y recursos externos.</p>
            </div>
            
            <!-- Estado Actual -->
            <div class="card bg-dark mb-4">
                <div class="card-header">
                    <h5><i class="fas fa-info-circle"></i> Estado Actual</h5>
                </div>
                <div class="card-body">
                    <div id="current-status" class="alert alert-info">
                        <p>Verificando estado actual...</p>
                    </div>
                </div>
            </div>
            
            <!-- Acciones -->
            <div class="card bg-dark mb-4">
                <div class="card-header">
                    <h5><i class="fas fa-tools"></i> Acciones Disponibles</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <button id="btn-force-update" class="btn btn-warning btn-lg w-100">
                                <i class="fas fa-sync-alt"></i> Forzar Actualización SW
                            </button>
                        </div>
                        <div class="col-md-6 mb-3">
                            <button id="btn-clear-all-cache" class="btn btn-danger btn-lg w-100">
                                <i class="fas fa-broom"></i> Limpiar Todo el Cache
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <button id="btn-unregister-sw" class="btn btn-outline-warning btn-lg w-100">
                                <i class="fas fa-trash"></i> Desregistrar SW
                            </button>
                        </div>
                        <div class="col-md-6 mb-3">
                            <button id="btn-reload-page" class="btn btn-primary btn-lg w-100">
                                <i class="fas fa-redo"></i> Recargar Página
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Logs -->
            <div class="card bg-dark mb-4">
                <div class="card-header">
                    <h5><i class="fas fa-file-alt"></i> Logs de Acciones</h5>
                </div>
                <div class="card-body">
                    <div id="action-logs" style="max-height: 300px; overflow-y: auto; background: #1a1a1a; padding: 15px; border-radius: 5px; font-family: monospace; font-size: 12px;">
                        <p style="color: #00bfff;">Iniciando herramienta de actualización...</p>
                    </div>
                </div>
            </div>
            
            <!-- Información Técnica -->
            <div class="card bg-dark mb-4">
                <div class="card-header">
                    <h5><i class="fas fa-cogs"></i> Información Técnica</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Versión Actual del Cache:</h6>
                            <p id="cache-version">Verificando...</p>
                            
                            <h6>Service Worker Registrado:</h6>
                            <p id="sw-registered">Verificando...</p>
                        </div>
                        <div class="col-md-6">
                            <h6>Caches Existentes:</h6>
                            <div id="existing-caches">Verificando...</div>
                            
                            <h6>Última Actualización:</h6>
                            <p id="last-update">Verificando...</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Navegación -->
            <div class="text-center">
                <a href="sw-diagnostico.php" class="btn btn-outline-info me-3">
                    <i class="fas fa-stethoscope"></i> Diagnóstico Completo
                </a>
                <a href="index.php" class="btn btn-outline-light">
                    <i class="fas fa-home"></i> Inicio
                </a>
            </div>
        </div>
    </div>
</div>

<style>
#action-logs p {
    margin: 2px 0;
    color: #00bfff;
}

#action-logs .error {
    color: #dc3545;
}

#action-logs .success {
    color: #28a745;
}

#action-logs .warning {
    color: #ffc107;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const logsContainer = document.getElementById('action-logs');
    const currentStatus = document.getElementById('current-status');
    const cacheVersion = document.getElementById('cache-version');
    const swRegistered = document.getElementById('sw-registered');
    const existingCaches = document.getElementById('existing-caches');
    const lastUpdate = document.getElementById('last-update');
    
    function addLog(message, type = 'info') {
        const p = document.createElement('p');
        p.className = type;
        p.textContent = `[${new Date().toLocaleTimeString()}] ${message}`;
        logsContainer.appendChild(p);
        logsContainer.scrollTop = logsContainer.scrollHeight;
    }
    
    // Verificar estado actual
    async function checkCurrentStatus() {
        addLog('Verificando estado actual del Service Worker...', 'info');
        
        if ('serviceWorker' in navigator) {
            try {
                const registration = await navigator.serviceWorker.getRegistration();
                if (registration) {
                    currentStatus.className = 'alert alert-success';
                    currentStatus.innerHTML = `
                        <h6><strong>✅ Service Worker Activo</strong></h6>
                        <p>Estado: ${registration.active ? 'Activo' : 'Inactivo'}</p>
                        <p>Scope: ${registration.scope}</p>
                    `;
                    swRegistered.textContent = 'Sí';
                    addLog('Service Worker detectado y activo', 'success');
                } else {
                    currentStatus.className = 'alert alert-warning';
                    currentStatus.innerHTML = '<h6><strong>⚠️ Service Worker No Encontrado</strong></h6>';
                    swRegistered.textContent = 'No';
                    addLog('Service Worker no encontrado', 'warning');
                }
            } catch (error) {
                currentStatus.className = 'alert alert-danger';
                currentStatus.innerHTML = `<h6><strong>❌ Error:</strong> ${error.message}</h6>`;
                swRegistered.textContent = 'Error';
                addLog(`Error al verificar Service Worker: ${error.message}`, 'error');
            }
        } else {
            currentStatus.className = 'alert alert-danger';
            currentStatus.innerHTML = '<h6><strong>❌ Service Worker No Soportado</strong></h6>';
            swRegistered.textContent = 'No soportado';
            addLog('Service Worker no soportado en este navegador', 'error');
        }
        
        // Verificar caches
        if ('caches' in window) {
            try {
                const cacheNames = await caches.keys();
                const kndCaches = cacheNames.filter(name => name.includes('knd'));
                
                if (kndCaches.length > 0) {
                    existingCaches.innerHTML = `<ul>${kndCaches.map(cache => `<li>${cache}</li>`).join('')}</ul>`;
                    cacheVersion.textContent = kndCaches[0] || 'No disponible';
                    addLog(`Encontrados ${kndCaches.length} caches de KND Store`, 'success');
                } else {
                    existingCaches.textContent = 'No se encontraron caches';
                    cacheVersion.textContent = 'No disponible';
                    addLog('No se encontraron caches específicos de KND Store', 'warning');
                }
            } catch (error) {
                existingCaches.textContent = `Error: ${error.message}`;
                cacheVersion.textContent = 'Error';
                addLog(`Error al verificar cache: ${error.message}`, 'error');
            }
        } else {
            existingCaches.textContent = 'Cache API no soportada';
            cacheVersion.textContent = 'No soportado';
            addLog('Cache API no soportada en este navegador', 'error');
        }
        
        lastUpdate.textContent = new Date().toLocaleString();
    }
    
    // Forzar actualización del Service Worker
    async function forceUpdateSW() {
        addLog('Forzando actualización del Service Worker...', 'warning');
        
        if ('serviceWorker' in navigator) {
            try {
                const registration = await navigator.serviceWorker.getRegistration();
                if (registration) {
                    // Enviar mensaje para saltar espera
                    if (registration.waiting) {
                        registration.waiting.postMessage({ type: 'SKIP_WAITING' });
                        addLog('Mensaje SKIP_WAITING enviado al Service Worker', 'success');
                    }
                    
                    // Forzar actualización
                    await registration.update();
                    addLog('Service Worker actualizado', 'success');
                    
                    // Recargar página después de un momento
                    setTimeout(() => {
                        addLog('Recargando página en 3 segundos...', 'info');
                        setTimeout(() => {
                            window.location.reload();
                        }, 3000);
                    }, 1000);
                } else {
                    addLog('No se encontró registro del Service Worker', 'error');
                }
            } catch (error) {
                addLog(`Error al actualizar Service Worker: ${error.message}`, 'error');
            }
        }
    }
    
    // Limpiar todo el cache
    async function clearAllCache() {
        addLog('Limpiando todo el cache...', 'warning');
        
        if ('caches' in window) {
            try {
                const cacheNames = await caches.keys();
                const kndCaches = cacheNames.filter(name => name.includes('knd'));
                
                for (const cacheName of kndCaches) {
                    await caches.delete(cacheName);
                    addLog(`Cache eliminado: ${cacheName}`, 'success');
                }
                
                addLog('Todos los caches de KND Store eliminados', 'success');
                setTimeout(checkCurrentStatus, 1000);
            } catch (error) {
                addLog(`Error al limpiar cache: ${error.message}`, 'error');
            }
        }
    }
    
    // Desregistrar Service Worker
    async function unregisterSW() {
        addLog('Desregistrando Service Worker...', 'warning');
        
        if ('serviceWorker' in navigator) {
            try {
                const registration = await navigator.serviceWorker.getRegistration();
                if (registration) {
                    await registration.unregister();
                    addLog('Service Worker desregistrado', 'success');
                    setTimeout(checkCurrentStatus, 1000);
                } else {
                    addLog('No se encontró registro del Service Worker', 'error');
                }
            } catch (error) {
                addLog(`Error al desregistrar Service Worker: ${error.message}`, 'error');
            }
        }
    }
    
    // Recargar página
    function reloadPage() {
        addLog('Recargando página...', 'info');
        window.location.reload();
    }
    
    // Event listeners
    document.getElementById('btn-force-update').addEventListener('click', forceUpdateSW);
    document.getElementById('btn-clear-all-cache').addEventListener('click', clearAllCache);
    document.getElementById('btn-unregister-sw').addEventListener('click', unregisterSW);
    document.getElementById('btn-reload-page').addEventListener('click', reloadPage);
    
    // Inicializar
    setTimeout(checkCurrentStatus, 1000);
});
</script>

<?php
echo generateFooter();
?> 