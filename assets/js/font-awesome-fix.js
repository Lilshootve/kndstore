// Font Awesome Fix - KND Store
(function() {
    'use strict';
    
    // Función para verificar si Font Awesome está cargado
    function isFontAwesomeLoaded() {
        const testElement = document.createElement('i');
        testElement.className = 'fas fa-rocket';
        testElement.style.position = 'absolute';
        testElement.style.left = '-9999px';
        testElement.style.fontSize = '1px';
        document.body.appendChild(testElement);
        
        const computedStyle = window.getComputedStyle(testElement, '::before');
        const content = computedStyle.getPropertyValue('content');
        
        document.body.removeChild(testElement);
        
        return content && content !== 'none' && content !== 'normal';
    }
    
    // Función para cargar Font Awesome manualmente
    function loadFontAwesome() {
        const cdnUrls = [
            'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
            'https://use.fontawesome.com/releases/v6.4.0/css/all.css',
            'https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.0/css/all.min.css'
        ];
        
        let loaded = false;
        
        function tryLoadCDN(index) {
            if (index >= cdnUrls.length || loaded) return;
            
            const link = document.createElement('link');
            link.rel = 'stylesheet';
            link.href = cdnUrls[index];
            
            link.onload = function() {
                loaded = true;
                console.log('Font Awesome cargado desde:', cdnUrls[index]);
                setTimeout(checkAndFixIcons, 1000);
            };
            
            link.onerror = function() {
                console.warn('Falló CDN:', cdnUrls[index]);
                tryLoadCDN(index + 1);
            };
            
            document.head.appendChild(link);
        }
        
        tryLoadCDN(0);
    }
    
    // Función para verificar y arreglar iconos
    function checkAndFixIcons() {
        const icons = document.querySelectorAll('.fas, .fab, .far, .fa');
        
        icons.forEach(icon => {
            const computedStyle = window.getComputedStyle(icon, '::before');
            const content = computedStyle.getPropertyValue('content');
            
            if (!content || content === 'none' || content === 'normal') {
                // Aplicar fallback visual
                icon.style.fontFamily = 'monospace';
                icon.style.fontSize = '1.2em';
                icon.style.color = 'var(--knd-neon-blue)';
                
                // Agregar texto alternativo
                const iconName = icon.className.match(/fa-(\w+)/);
                if (iconName) {
                    icon.setAttribute('title', iconName[1]);
                    const fallbackText = getFallbackText(iconName[1]);
                    icon.textContent = fallbackText;
                }
            }
        });
    }
    
    // Función para agregar fallbacks visuales
    function addVisualFallbacks() {
        const categoryIcons = document.querySelectorAll('.category-icon i');
        
        categoryIcons.forEach(icon => {
            const iconName = icon.className.match(/fa-(\w+)/);
            if (iconName) {
                const fallbackText = getFallbackText(iconName[1]);
                icon.setAttribute('data-fallback', fallbackText);
            }
        });
    }
    
    // Función para obtener texto de fallback
    function getFallbackText(iconName) {
        const fallbacks = {
            'rocket': '🚀',
            'gamepad': '🎮',
            'headset': '🎧',
            'code': '💻',
            'microchip': '🔧',
            'search': '🔍',
            'eye': '👁️',
            'envelope': '📧',
            'phone': '📞',
            'clock': '⏰',
            'palette': '🎨',
            'magic': '✨',
            'brain': '🧠',
            'credit-card': '💳',
            'coins': '🪙',
            'tools': '🔧',
            'shopping-cart': '🛒',
            'user-astronaut': '👨‍🚀',
            'crown': '👑',
            'home': '🏠',
            'info-circle': 'ℹ️',
            'shipping-fast': '🚚',
            'shield-alt': '🛡️',
            'check-circle': '✅',
            'cogs': '⚙️',
            'globe': '🌍',
            'paper-plane': '📮',
            'exclamation-triangle': '⚠️',
            'undo': '↩️',
            'copyright': '©️',
            'file-contract': '📄',
            'database': '🗄️',
            'lock': '🔒',
            'cookie-bite': '🍪',
            'share-alt': '📤',
            'user-shield': '👤🛡️',
            'user-check': '👤✅',
            'edit': '✏️',
            'satellite': '🛰️',
            'broadcast-tower': '📡',
            'bullseye': '🎯',
            'comments': '💬',
            'robot': '🤖',
            'dice': '🎲',
            'crystal-ball': '🔮',
            'question-circle': '❓',
            'vial': '🧪',
            'list': '📋',
            'download': '⬇️',
            'arrow-left': '←',
            'sign-in-alt': '➡️',
            'user-plus': '👤+'
        };
        
        return fallbacks[iconName] || '□';
    }
    
    // Función para aplicar fallbacks visuales
    function applyVisualFallbacks() {
        const icons = document.querySelectorAll('.fas, .fab, .far, .fa');
        
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
                }
            }
        });
    }
    
    // Función para agregar clase de fallback al body si es necesario
    function addFallbackClass() {
        if (!isFontAwesomeLoaded()) {
            document.body.classList.add('fontawesome-fallback');
        }
    }
    
    // Función principal de inicialización
    function init() {
        console.log('Font Awesome Fix iniciado');
        
        // Verificar si Font Awesome está cargado
        if (!isFontAwesomeLoaded()) {
            console.warn('Font Awesome no detectado, cargando...');
            loadFontAwesome();
            addFallbackClass();
        } else {
            console.log('Font Awesome detectado correctamente');
            setTimeout(checkAndFixIcons, 1000);
        }
        
        // Agregar fallbacks visuales
        addVisualFallbacks();
        
        // Aplicar fallbacks después de un delay
        setTimeout(applyVisualFallbacks, 2000);
        
        // Verificar periódicamente
        setInterval(checkAndFixIcons, 5000);
    }
    
    // Inicializar cuando el DOM esté listo
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
    
    // También verificar cuando la ventana se carga completamente
    window.addEventListener('load', function() {
        setTimeout(checkAndFixIcons, 1000);
        setTimeout(addFallbackClass, 1000);
    });
    
})(); 