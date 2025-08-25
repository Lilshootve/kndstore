<?php
// KND Store - Solución Específica para Font Awesome en Hostinger
// Este archivo se puede incluir en páginas que tengan problemas con iconos

// Detectar si estamos en Hostinger
$isHostinger = (strpos($_SERVER['HTTP_HOST'], 'kndstore.com') !== false || 
                strpos($_SERVER['HTTP_HOST'], 'hstgr.io') !== false);

if ($isHostinger) {
    // En Hostinger, usar estrategia de fallback inmediato
    echo '<style>
        /* Fallback inmediato para iconos en Hostinger */
        .fas, .fab, .far {
            font-family: monospace !important;
            font-size: 1.2em;
            color: #00bfff !important;
        }
        
        /* Iconos específicos con emojis */
        .fa-rocket::before { content: "🚀"; }
        .fa-gamepad::before { content: "🎮"; }
        .fa-headset::before { content: "🎧"; }
        .fa-code::before { content: "💻"; }
        .fa-microchip::before { content: "🔧"; }
        .fa-search::before { content: "🔍"; }
        .fa-eye::before { content: "👁️"; }
        .fa-envelope::before { content: "📧"; }
        .fa-phone::before { content: "📞"; }
        .fa-clock::before { content: "⏰"; }
        .fa-palette::before { content: "🎨"; }
        .fa-magic::before { content: "✨"; }
        .fa-brain::before { content: "🧠"; }
        .fa-credit-card::before { content: "💳"; }
        .fa-coins::before { content: "🪙"; }
        .fa-tools::before { content: "🔧"; }
        .fa-shopping-cart::before { content: "🛒"; }
        .fa-user-astronaut::before { content: "👨‍🚀"; }
        .fa-crown::before { content: "👑"; }
        .fa-home::before { content: "🏠"; }
        .fa-info-circle::before { content: "ℹ️"; }
        .fa-shipping-fast::before { content: "🚚"; }
        .fa-shield-alt::before { content: "🛡️"; }
        .fa-check-circle::before { content: "✅"; }
        .fa-cogs::before { content: "⚙️"; }
        .fa-globe::before { content: "🌍"; }
        .fa-paper-plane::before { content: "📮"; }
        .fa-exclamation-triangle::before { content: "⚠️"; }
        .fa-undo::before { content: "↩️"; }
        .fa-copyright::before { content: "©️"; }
        .fa-file-contract::before { content: "📄"; }
        .fa-database::before { content: "🗄️"; }
        .fa-lock::before { content: "🔒"; }
        .fa-cookie-bite::before { content: "🍪"; }
        .fa-share-alt::before { content: "📤"; }
        .fa-user-shield::before { content: "👤🛡️"; }
        .fa-user-check::before { content: "👤✅"; }
        .fa-edit::before { content: "✏️"; }
        .fa-satellite::before { content: "🛰️"; }
        .fa-broadcast-tower::before { content: "📡"; }
        .fa-bullseye::before { content: "🎯"; }
        .fa-comments::before { content: "💬"; }
        .fa-robot::before { content: "🤖"; }
        .fa-dice::before { content: "🎲"; }
        .fa-crystal-ball::before { content: "🔮"; }
        .fa-question-circle::before { content: "❓"; }
        .fa-vial::before { content: "🧪"; }
        .fa-list::before { content: "📋"; }
        .fa-download::before { content: "⬇️"; }
        .fa-arrow-left::before { content: "←"; }
        .fa-sign-in-alt::before { content: "➡️"; }
        .fa-user-plus::before { content: "👤+"; }
        .fa-star::before { content: "⭐"; }
        .fa-crosshairs::before { content: "🎯"; }
        .fa-users::before { content: "👥"; }
        .fa-user-secret::before { content: "🕵️"; }
        .fa-network-wired::before { content: "🌐"; }
        .fa-university::before { content: "🏛️"; }
        .fa-space-shuttle::before { content: "🚀"; }
        .fa-store::before { content: "🏪"; }
        
        /* Estilos para iconos de categorías */
        .category-icon {
            font-size: 2.5rem;
            color: #00bfff !important;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 60px;
        }
        
        .category-card:hover .category-icon {
            color: #8a2be2 !important;
            transform: scale(1.1);
        }
        
        /* Estilos para iconos de valores */
        .value-icon {
            font-size: 3rem;
            color: #00bfff !important;
            margin-bottom: 1rem;
        }
        
        /* Estilos para iconos de equipo */
        .team-avatar {
            font-size: 4rem;
            color: #00bfff !important;
            margin-bottom: 1rem;
        }
        
        /* Estilos para iconos de tecnología */
        .tech-icon {
            font-size: 3rem;
            color: #00bfff !important;
            margin-bottom: 1rem;
        }
        
        /* Estilos para iconos de navegación */
        .nav-link .fas,
        .nav-link .fab,
        .nav-link .far {
            margin-right: 0.5rem;
        }
        
        /* Estilos para botones */
        .btn .fas,
        .btn .fab,
        .btn .far {
            margin-right: 0.5rem;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .category-icon, .value-icon, .team-avatar, .tech-icon {
                font-size: 2rem;
            }
        }
        
        @media (max-width: 576px) {
            .category-icon, .value-icon, .team-avatar, .tech-icon {
                font-size: 1.8rem;
            }
        }
    </style>';
    
    // Script de fallback para Hostinger
    echo '<script>
        // Fallback específico para Hostinger
        (function() {
            console.log("Aplicando fallbacks específicos para Hostinger...");
            
            // Marcar el body para estilos CSS
            document.body.classList.add("hostinger-fallback");
            
            // Aplicar fallbacks a todos los iconos
            function applyHostingerFallbacks() {
                const icons = document.querySelectorAll(".fas, .fab, .far");
                let fallbackCount = 0;
                
                icons.forEach(icon => {
                    const iconName = icon.className.match(/fa-(\\w+)/);
                    if (iconName) {
                        // Asegurar que el contenido esté establecido
                        if (!icon.textContent || icon.textContent.trim() === "") {
                            const fallbackText = getFallbackText(iconName[1]);
                            icon.textContent = fallbackText;
                            fallbackCount++;
                        }
                    }
                });
                
                console.log(`Fallbacks de Hostinger aplicados a ${fallbackCount} iconos`);
                return fallbackCount;
            }
            
            // Función para obtener texto de fallback
            function getFallbackText(iconName) {
                const fallbacks = {
                    "rocket": "🚀", "gamepad": "🎮", "headset": "🎧", "code": "💻",
                    "microchip": "🔧", "search": "🔍", "eye": "👁️", "envelope": "📧",
                    "phone": "📞", "clock": "⏰", "palette": "🎨", "magic": "✨",
                    "brain": "🧠", "credit-card": "💳", "coins": "🪙", "tools": "🔧",
                    "shopping-cart": "🛒", "user-astronaut": "👨‍🚀", "crown": "👑",
                    "home": "🏠", "info-circle": "ℹ️", "shipping-fast": "🚚",
                    "shield-alt": "🛡️", "check-circle": "✅", "cogs": "⚙️",
                    "globe": "🌍", "paper-plane": "📮", "exclamation-triangle": "⚠️",
                    "undo": "↩️", "copyright": "©️", "file-contract": "📄",
                    "database": "🗄️", "lock": "🔒", "cookie-bite": "🍪",
                    "share-alt": "📤", "user-shield": "👤🛡️", "user-check": "👤✅",
                    "edit": "✏️", "satellite": "🛰️", "broadcast-tower": "📡",
                    "bullseye": "🎯", "comments": "💬", "robot": "🤖", "dice": "🎲",
                    "crystal-ball": "🔮", "question-circle": "❓", "vial": "🧪",
                    "list": "📋", "download": "⬇️", "arrow-left": "←",
                    "sign-in-alt": "➡️", "user-plus": "👤+", "star": "⭐",
                    "crosshairs": "🎯", "users": "👥", "user-secret": "🕵️",
                    "network-wired": "🌐", "university": "🏛️", "space-shuttle": "🚀",
                    "store": "🏪"
                };
                return fallbacks[iconName] || "□";
            }
            
            // Aplicar fallbacks cuando el DOM esté listo
            if (document.readyState === "loading") {
                document.addEventListener("DOMContentLoaded", applyHostingerFallbacks);
            } else {
                applyHostingerFallbacks();
            }
            
            // También aplicar cuando la ventana se carga completamente
            window.addEventListener("load", applyHostingerFallbacks);
            
            // Aplicar después de delays para asegurar que se ejecute
            setTimeout(applyHostingerFallbacks, 1000);
            setTimeout(applyHostingerFallbacks, 3000);
        })();
    </script>';
}
?>
