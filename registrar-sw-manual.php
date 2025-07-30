<?php
// KND Store - Registro Manual Service Worker
require_once 'includes/config.php';
require_once 'includes/header.php';
require_once 'includes/footer.php';

echo generateHeader('Registro Manual SW', 'Herramienta para registrar manualmente el Service Worker');
echo generateNavigation();
?>

<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center mb-4">🔧 Registro Manual Service Worker - KND Store</h1>
            
            <div class="alert alert-warning">
                <h5><i class="fas fa-exclamation-triangle"></i> Diagnóstico de Registro</h5>
                <p>Esta herramienta intentará registrar manualmente el Service Worker y mostrará información detallada sobre cualquier error.</p>
            </div>
            
            <!-- Verificación de Archivos -->
            <div class="card bg-dark mb-4">
                <div class="card-header">
                    <h5><i class="fas fa-file-alt"></i> Verificación de Archivos</h5>
                </div>
                <div class="card-body">
                    <div id="file-check" class="alert alert-info">
                        <p>Verificando archivos del Service Worker...</p>
                    </div>
                </div>
            </div>
            
            <!-- Registro Manual -->
            <div class="card bg-dark mb-4">
                <div class="card-header">
                    <h5><i class="fas fa-cogs"></i> Registro Manual</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <button id="btn-register-sw" class="btn btn-primary btn-lg w-100">
                                <i class="fas fa-plus-circle"></i> Registrar Service Worker
                            </button>
                        </div>
                        <div class="col-md-6 mb-3">
                            <button id="btn-check-sw" class="btn btn-info btn-lg w-100">
                                <i class="fas fa-search"></i> Verificar SW
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <button id="btn-unregister-sw" class="btn btn-warning btn-lg w-100">
                                <i class="fas fa-trash"></i> Desregistrar SW
                            </button>
                        </div>
                        <div class="col-md-6 mb-3">
                            <button id="btn-test-sw-file" class="btn btn-outline-light btn-lg w-100">
                                <i class="fas fa-vial"></i> Test SW File
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Estado Detallado -->
            <div class="card bg-dark mb-4">
                <div class="card-header">
                    <h5><i class="fas fa-info-circle"></i> Estado Detallado</h5>
                </div>
                <div class="card-body">
                    <div id="detailed-status" class="alert alert-info">
                        <p>Esperando acciones...</p>
                    </div>
                </div>
            </div>
            
            <!-- Logs Detallados -->
            <div class="card bg-dark mb-4">
                <div class="card-header">
                    <h5><i class="fas fa-file-alt"></i> Logs Detallados</h5>
                </div>
                <div class="card-body">
                    <div id="detailed-logs" style="max-height: 400px; overflow-y: auto; background: #1a1a1a; padding: 15px; border-radius: 5px; font-family: monospace; font-size: 12px;">
                        <p style="color: #00bfff;">Iniciando registro manual...</p>
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
                            <h6>URL del Service Worker:</h6>
                            <p id="sw-url">Verificando...</p>
                            
                            <h6>Scope del Service Worker:</h6>
                            <p id="sw-scope">Verificando...</p>
                        </div>
                        <div class="col-md-6">
                            <h6>Estado del Navegador:</h6>
                            <p id="browser-support">Verificando...</p>
                            
                            <h6>Última Verificación:</h6>
                            <p id="last-check">Verificando...</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Navegación -->
            <div class="text-center">
                <a href="sw-diagnostico.php" class="btn btn-outline-info me-3">
                    <i class="fas fa-stethoscope"></i> Diagnóstico General
                </a>
                <a href="sw-forzar-actualizacion.php" class="btn btn-outline-warning me-3">
                    <i class="fas fa-sync-alt"></i> Forzar Actualización
                </a>
                <a href="index.php" class="btn btn-outline-light">
                    <i class="fas fa-home"></i> Inicio
                </a>
            </div>
        </div>
    </div>
</div>

<style>
#detailed-logs p {
    margin: 2px 0;
    color: #00bfff;
}

#detailed-logs .error {
    color: #dc3545;
}

#detailed-logs .success {
    color: #28a745;
}

#detailed-logs .warning {
    color: #ffc107;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const logsContainer = document.getElementById('detailed-logs');
    const fileCheck = document.getElementById('file-check');
    const detailedStatus = document.getElementById('detailed-status');
    const swUrl = document.getElementById('sw-url');
    const swScope = document.getElementById('sw-scope');
    const browserSupport = document.getElementById('browser-support');
    const lastCheck = document.getElementById('last-check');
    
    function addLog(message, type = 'info') {
        const p = document.createElement('p');
        p.className = type;
        p.textContent = `[${new Date().toLocaleTimeString()}] ${message}`;
        logsContainer.appendChild(p);
        logsContainer.scrollTop = logsContainer.scrollHeight;
    }
    
    // Verificar archivos del Service Worker
    async function checkSWFiles() {
        addLog('Verificando archivos del Service Worker...', 'info');
        
        const swPath = '/assets/js/sw.js';
        swUrl.textContent = swPath;
        
        try {
            const response = await fetch(swPath);
            if (response.ok) {
                fileCheck.className = 'alert alert-success';
                fileCheck.innerHTML = `
                    <h6><strong>✅ Archivo SW Encontrado</strong></h6>
                    <p>Ruta: ${swPath}</p>
                    <p>Estado: ${response.status} ${response.statusText}</p>
                    <p>Tamaño: ${response.headers.get('content-length') || 'Desconocido'} bytes</p>
                `;
                addLog('Archivo sw.js encontrado y accesible', 'success');
            } else {
                fileCheck.className = 'alert alert-danger';
                fileCheck.innerHTML = `
                    <h6><strong>❌ Error al Acceder al Archivo</strong></h6>
                    <p>Ruta: ${swPath}</p>
                    <p>Estado: ${response.status} ${response.statusText}</p>
                `;
                addLog(`Error al acceder a sw.js: ${response.status} ${response.statusText}`, 'error');
            }
        } catch (error) {
            fileCheck.className = 'alert alert-danger';
            fileCheck.innerHTML = `
                <h6><strong>❌ Error de Red</strong></h6>
                <p>Ruta: ${swPath}</p>
                <p>Error: ${error.message}</p>
            `;
            addLog(`Error de red al verificar sw.js: ${error.message}`, 'error');
        }
        
        // Verificar soporte del navegador
        if ('serviceWorker' in navigator) {
            browserSupport.textContent = 'Soportado';
            addLog('Service Worker soportado en este navegador', 'success');
        } else {
            browserSupport.textContent = 'No soportado';
            addLog('Service Worker no soportado en este navegador', 'error');
        }
        
        lastCheck.textContent = new Date().toLocaleString();
    }
    
    // Registrar Service Worker manualmente
    async function registerSW() {
        addLog('Intentando registrar Service Worker manualmente...', 'warning');
        
        if ('serviceWorker' in navigator) {
            try {
                const registration = await navigator.serviceWorker.register('/assets/js/sw.js', {
                    scope: '/'
                });
                
                swScope.textContent = registration.scope;
                
                detailedStatus.className = 'alert alert-success';
                detailedStatus.innerHTML = `
                    <h6><strong>✅ Service Worker Registrado</strong></h6>
                    <p>Scope: ${registration.scope}</p>
                    <p>Estado: ${registration.active ? 'Activo' : 'Inactivo'}</p>
                    <p>Installing: ${registration.installing ? 'Sí' : 'No'}</p>
                    <p>Waiting: ${registration.waiting ? 'Sí' : 'No'}</p>
                `;
                
                addLog('Service Worker registrado exitosamente', 'success');
                addLog(`Scope: ${registration.scope}`, 'info');
                addLog(`Estado: ${registration.active ? 'Activo' : 'Inactivo'}`, 'info');
                
                // Escuchar eventos del Service Worker
                registration.addEventListener('updatefound', () => {
                    addLog('Nueva versión del Service Worker encontrada', 'info');
                });
                
                navigator.serviceWorker.addEventListener('controllerchange', () => {
                    addLog('Controlador del Service Worker cambiado', 'info');
                });
                
            } catch (error) {
                detailedStatus.className = 'alert alert-danger';
                detailedStatus.innerHTML = `
                    <h6><strong>❌ Error al Registrar</strong></h6>
                    <p>Error: ${error.message}</p>
                    <p>Tipo: ${error.name}</p>
                `;
                addLog(`Error al registrar Service Worker: ${error.message}`, 'error');
                addLog(`Tipo de error: ${error.name}`, 'error');
            }
        } else {
            detailedStatus.className = 'alert alert-danger';
            detailedStatus.innerHTML = '<h6><strong>❌ Service Worker No Soportado</strong></h6>';
            addLog('Service Worker no soportado en este navegador', 'error');
        }
        
        lastCheck.textContent = new Date().toLocaleString();
    }
    
    // Verificar Service Worker
    async function checkSW() {
        addLog('Verificando estado del Service Worker...', 'info');
        
        if ('serviceWorker' in navigator) {
            try {
                const registration = await navigator.serviceWorker.getRegistration();
                if (registration) {
                    detailedStatus.className = 'alert alert-success';
                    detailedStatus.innerHTML = `
                        <h6><strong>✅ Service Worker Encontrado</strong></h6>
                        <p>Scope: ${registration.scope}</p>
                        <p>Estado: ${registration.active ? 'Activo' : 'Inactivo'}</p>
                        <p>Installing: ${registration.installing ? 'Sí' : 'No'}</p>
                        <p>Waiting: ${registration.waiting ? 'Sí' : 'No'}</p>
                    `;
                    addLog('Service Worker encontrado y registrado', 'success');
                } else {
                    detailedStatus.className = 'alert alert-warning';
                    detailedStatus.innerHTML = '<h6><strong>⚠️ Service Worker No Encontrado</strong></h6>';
                    addLog('No se encontró registro del Service Worker', 'warning');
                }
            } catch (error) {
                detailedStatus.className = 'alert alert-danger';
                detailedStatus.innerHTML = `<h6><strong>❌ Error:</strong> ${error.message}</h6>`;
                addLog(`Error al verificar Service Worker: ${error.message}`, 'error');
            }
        }
        
        lastCheck.textContent = new Date().toLocaleString();
    }
    
    // Desregistrar Service Worker
    async function unregisterSW() {
        addLog('Desregistrando Service Worker...', 'warning');
        
        if ('serviceWorker' in navigator) {
            try {
                const registration = await navigator.serviceWorker.getRegistration();
                if (registration) {
                    await registration.unregister();
                    detailedStatus.className = 'alert alert-success';
                    detailedStatus.innerHTML = '<h6><strong>✅ Service Worker Desregistrado</strong></h6>';
                    addLog('Service Worker desregistrado exitosamente', 'success');
                } else {
                    addLog('No se encontró registro del Service Worker para desregistrar', 'warning');
                }
            } catch (error) {
                detailedStatus.className = 'alert alert-danger';
                detailedStatus.innerHTML = `<h6><strong>❌ Error:</strong> ${error.message}</h6>`;
                addLog(`Error al desregistrar Service Worker: ${error.message}`, 'error');
            }
        }
        
        lastCheck.textContent = new Date().toLocaleString();
    }
    
    // Test del archivo SW
    async function testSWFile() {
        addLog('Probando archivo del Service Worker...', 'info');
        
        try {
            const response = await fetch('/assets/js/sw.js');
            const content = await response.text();
            
            if (content.includes('KND Store') && content.includes('Service Worker')) {
                addLog('✅ Archivo SW válido - Contiene identificadores correctos', 'success');
            } else {
                addLog('⚠️ Archivo SW puede estar corrupto o incorrecto', 'warning');
            }
            
            addLog(`Tamaño del archivo: ${content.length} caracteres`, 'info');
            addLog(`Primeras líneas: ${content.substring(0, 100)}...`, 'info');
            
        } catch (error) {
            addLog(`❌ Error al leer archivo SW: ${error.message}`, 'error');
        }
        
        lastCheck.textContent = new Date().toLocaleString();
    }
    
    // Event listeners
    document.getElementById('btn-register-sw').addEventListener('click', registerSW);
    document.getElementById('btn-check-sw').addEventListener('click', checkSW);
    document.getElementById('btn-unregister-sw').addEventListener('click', unregisterSW);
    document.getElementById('btn-test-sw-file').addEventListener('click', testSWFile);
    
    // Inicializar
    setTimeout(checkSWFiles, 1000);
});
</script>

<?php
echo generateFooter();
?> 