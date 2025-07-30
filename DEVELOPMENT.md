# 🛠️ GUÍA DE DESARROLLO LOCAL - KND STORE

## 📋 **CONFIGURACIÓN PARA DESARROLLO**

### **1. Configuración de Base de Datos Local**

Para desarrollo local, puedes usar la configuración en `includes/config-local.php`:

```php
// Configuración de base de datos - DESARROLLO LOCAL
define('DB_HOST', 'localhost');
define('DB_NAME', 'kndstore_local');
define('DB_USER', 'root');
define('DB_PASS', '');
```

### **2. Cambiar a Configuración Local**

Para usar la configuración de desarrollo, cambia en `index.php`:

```php
// Cambiar esta línea:
require_once 'includes/config.php';

// Por esta:
require_once 'includes/config-local.php';
```

### **3. Configuración de XAMPP/WAMP**

Si usas XAMPP o WAMP:

1. **Crear base de datos local:**
   ```sql
   CREATE DATABASE kndstore_local;
   ```

2. **Configurar usuario (opcional):**
   ```sql
   CREATE USER 'kndstore_user'@'localhost' IDENTIFIED BY 'password';
   GRANT ALL PRIVILEGES ON kndstore_local.* TO 'kndstore_user'@'localhost';
   FLUSH PRIVILEGES;
   ```

### **4. Configuración de URL Local**

En `includes/config-local.php`:
```php
define('SITE_URL', 'http://localhost/kndstore');
```

### **5. Configuración de Email Local**

Para desarrollo, puedes usar:
```php
define('SITE_EMAIL', 'dev@kndstore.com');
```

## 🔧 **OPTIMIZACIONES PARA DESARROLLO**

### **1. Habilitar Debug**

En `includes/config-local.php`:
```php
error_reporting(E_ALL);
ini_set('display_errors', 1);
```

### **2. Deshabilitar Cache en Desarrollo**

```php
define('ENABLE_CACHE', false);
```

### **3. Configuración de Sesiones Local**

```php
ini_set('session.cookie_secure', 0); // Deshabilitado para HTTP local
```

## 📁 **ESTRUCTURA DE ARCHIVOS**

```
kndstore/
├── includes/
│   ├── config.php          # Configuración PRODUCCIÓN
│   ├── config-local.php    # Configuración DESARROLLO
│   ├── header.php
│   └── footer.php
├── assets/
│   ├── css/
│   ├── js/
│   └── images/
├── cache/                  # Directorio de cache (se crea automáticamente)
├── .htaccess              # Configuración Apache
└── index.php
```

## 🚀 **COMANDOS ÚTILES PARA DESARROLLO**

### **1. Verificar Sintaxis PHP**
```bash
php -l includes/config.php
php -l index.php
```

### **2. Crear Directorio de Cache**
```bash
mkdir cache
chmod 755 cache
```

### **3. Verificar Permisos**
```bash
chmod 644 *.php
chmod 644 .htaccess
chmod 755 assets/
```

## 🔍 **DEBUGGING**

### **1. Logs de Rendimiento**

Los logs de rendimiento se muestran en el HTML como comentarios:
```html
<!-- Page loaded in 245ms -->
```

### **2. Verificar Conexión a Base de Datos**

Agregar temporalmente en `index.php`:
```php
$pdo = getDBConnection();
if ($pdo) {
    echo "<!-- Database connection successful -->";
} else {
    echo "<!-- Database connection failed -->";
}
```

### **3. Verificar Headers**

Usar las herramientas de desarrollador del navegador para verificar:
- Headers de seguridad
- Headers de cache
- Compresión GZIP

## 📊 **MÉTRICAS DE DESARROLLO**

### **1. Tiempo de Carga**
- Objetivo: < 500ms en desarrollo
- Se muestra en comentarios HTML

### **2. Uso de Memoria**
- Monitorear con `memory_get_usage()`
- Objetivo: < 50MB por página

### **3. Consultas a Base de Datos**
- Usar `getCachedQuery()` para optimizar
- Monitorear con logs de error

## 🔄 **CAMBIAR ENTRE DESARROLLO Y PRODUCCIÓN**

### **Para Desarrollo:**
```php
require_once 'includes/config-local.php';
```

### **Para Producción:**
```php
require_once 'includes/config.php';
```

## 🛡️ **SEGURIDAD EN DESARROLLO**

### **1. Archivos Sensibles**
- `config.php` y `config-local.php` están protegidos por `.htaccess`
- No subir `config-local.php` a producción

### **2. Base de Datos**
- Usar credenciales diferentes para desarrollo
- No usar datos reales en desarrollo

### **3. Logs**
- Los logs de error van a `error_log`
- Verificar permisos de escritura

## 📝 **NOTAS IMPORTANTES**

### **Para Desarrollo:**
- ✅ Usar `config-local.php`
- ✅ Deshabilitar cache
- ✅ Mostrar errores
- ✅ Usar HTTP local
- ✅ Credenciales de desarrollo

### **Para Producción:**
- ✅ Usar `config.php`
- ✅ Habilitar cache
- ✅ Ocultar errores
- ✅ Usar HTTPS
- ✅ Credenciales de producción

---

**Última actualización:** 29 de Julio, 2025
**Versión:** 1.1.0 