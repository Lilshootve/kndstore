// KND Store - Service Worker
const CACHE_NAME = 'knd-store-v1.0.0';
const urlsToCache = [
    '/',
    '/index.php',
    '/products.php',
    '/about.php',
    '/contact.php',
    '/faq.php',
    '/assets/css/style.css',
    '/assets/css/mobile-optimization.css',
    '/assets/js/main.js',
    '/assets/js/mobile-optimization.js',
    '/assets/js/scroll-smooth.js',
    '/assets/images/knd-logo.png',
    '/assets/images/favicon.ico',
    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css',
    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js',
    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
    'https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Inter:wght@400;600&display=swap',
    'https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js'
];

// Instalación del Service Worker
self.addEventListener('install', event => {
    console.log('🚀 Instalando Service Worker para KND Store...');
    
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then(cache => {
                console.log('📦 Cache abierto');
                return cache.addAll(urlsToCache);
            })
            .then(() => {
                console.log('✅ Service Worker instalado correctamente');
                return self.skipWaiting();
            })
            .catch(error => {
                console.error('❌ Error durante la instalación:', error);
            })
    );
});

// Activación del Service Worker
self.addEventListener('activate', event => {
    console.log('🔄 Activando Service Worker...');
    
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames.map(cacheName => {
                    if (cacheName !== CACHE_NAME) {
                        console.log('🗑️ Eliminando cache antiguo:', cacheName);
                        return caches.delete(cacheName);
                    }
                })
            );
        }).then(() => {
            console.log('✅ Service Worker activado');
            return self.clients.claim();
        })
    );
});

// Interceptar peticiones de red
self.addEventListener('fetch', event => {
    // Solo manejar peticiones GET
    if (event.request.method !== 'GET') {
        return;
    }

    // Excluir peticiones a APIs externas que no queremos cachear
    if (event.request.url.includes('api.') || 
        event.request.url.includes('analytics') ||
        event.request.url.includes('tracking')) {
        return;
    }

    event.respondWith(
        caches.match(event.request)
            .then(response => {
                // Si encontramos la respuesta en cache, la devolvemos
                if (response) {
                    return response;
                }

                // Si no está en cache, hacemos la petición a la red
                return fetch(event.request)
                    .then(response => {
                        // Verificar que la respuesta sea válida
                        if (!response || response.status !== 200 || response.type !== 'basic') {
                            return response;
                        }

                        // Clonar la respuesta para poder usarla
                        const responseToCache = response.clone();

                        // Agregar al cache
                        caches.open(CACHE_NAME)
                            .then(cache => {
                                cache.put(event.request, responseToCache);
                            });

                        return response;
                    })
                    .catch(() => {
                        // Si falla la red, intentar servir una página offline
                        if (event.request.destination === 'document') {
                            return caches.match('/offline.html');
                        }
                    });
            })
    );
});

// Manejar mensajes del cliente
self.addEventListener('message', event => {
    if (event.data && event.data.type === 'SKIP_WAITING') {
        self.skipWaiting();
    }
    
    if (event.data && event.data.type === 'GET_VERSION') {
        event.ports[0].postMessage({ version: CACHE_NAME });
    }
});

// Manejar notificaciones push (futuro)
self.addEventListener('push', event => {
    if (event.data) {
        const data = event.data.json();
        const options = {
            body: data.body || 'Nueva actualización en KND Store',
            icon: '/assets/images/web-app-manifest-192x192.png',
            badge: '/assets/images/web-app-manifest-192x192.png',
            vibrate: [100, 50, 100],
            data: {
                dateOfArrival: Date.now(),
                primaryKey: 1
            },
            actions: [
                {
                    action: 'explore',
                    title: 'Ver más',
                    icon: '/assets/images/web-app-manifest-192x192.png'
                },
                {
                    action: 'close',
                    title: 'Cerrar',
                    icon: '/assets/images/web-app-manifest-192x192.png'
                }
            ]
        };

        event.waitUntil(
            self.registration.showNotification(data.title || 'KND Store', options)
        );
    }
});

// Manejar clics en notificaciones
self.addEventListener('notificationclick', event => {
    event.notification.close();

    if (event.action === 'explore') {
        event.waitUntil(
            clients.openWindow('/products.php')
        );
    } else if (event.action === 'close') {
        // Solo cerrar la notificación
    } else {
        // Acción por defecto
        event.waitUntil(
            clients.openWindow('/')
        );
    }
});

// Manejar notificaciones rechazadas
self.addEventListener('notificationclose', event => {
    console.log('Notificación cerrada:', event.notification.tag);
});

// Función para limpiar caches antiguos
function cleanOldCaches() {
    return caches.keys().then(cacheNames => {
        return Promise.all(
            cacheNames.map(cacheName => {
                if (cacheName !== CACHE_NAME) {
                    console.log('🗑️ Limpiando cache antiguo:', cacheName);
                    return caches.delete(cacheName);
                }
            })
        );
    });
}

// Función para actualizar cache
function updateCache() {
    return caches.open(CACHE_NAME)
        .then(cache => {
            return cache.addAll(urlsToCache);
        });
}

// Exportar funciones para uso externo
self.KNDServiceWorker = {
    cleanOldCaches,
    updateCache,
    CACHE_NAME
}; 