# 🚀 Guía de Despliegue - GlucoCare

## 📋 Preparación para Producción

### **1. Configuración de Base de Datos**

```bash
# Crear base de datos en producción
mysql -u root -p -e "CREATE DATABASE glucocare_prod;"

# Importar esquema
mysql -u root -p glucocare_prod < database/schema.sql

# Crear usuario específico para la aplicación
mysql -u root -p -e "
CREATE USER 'glucocare_user'@'localhost' IDENTIFIED BY 'contraseña_segura';
GRANT SELECT, INSERT, UPDATE, DELETE ON glucocare_prod.* TO 'glucocare_user'@'localhost';
FLUSH PRIVILEGES;
"
```

### **2. Configuración de Archivos**

```bash
# Copiar archivos de configuración
cp php/conexion.example.php php/conexion.php
cp config.example.php config.php

# Configurar credenciales de producción
nano php/conexion.php
nano config.php
```

### **3. Configuración de Seguridad**

#### **Permisos de Archivos**
```bash
# Configurar permisos seguros
find . -type f -name "*.php" -exec chmod 644 {} \;
find . -type d -exec chmod 755 {} \;

# Archivos de configuración solo para el propietario
chmod 600 php/conexion.php
chmod 600 config.php
```

#### **Configuración de PHP**
```ini
# php.ini para producción
display_errors = Off
log_errors = On
error_log = /var/log/php/error.log
session.cookie_secure = 1
session.cookie_httponly = 1
```

### **4. Configuración de Servidor Web**

#### **Apache (.htaccess)**
```apache
# Seguridad
<Files "conexion.php">
    Order Allow,Deny
    Deny from all
</Files>

<Files "config.php">
    Order Allow,Deny
    Deny from all
</Files>

# Redirección HTTPS
RewriteEngine On
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

# Compresión
<IfModule mod_deflate.c>
    AddOutputFilterByType DEFLATE text/plain
    AddOutputFilterByType DEFLATE text/html
    AddOutputFilterByType DEFLATE text/xml
    AddOutputFilterByType DEFLATE text/css
    AddOutputFilterByType DEFLATE application/xml
    AddOutputFilterByType DEFLATE application/xhtml+xml
    AddOutputFilterByType DEFLATE application/rss+xml
    AddOutputFilterByType DEFLATE application/javascript
    AddOutputFilterByType DEFLATE application/x-javascript
</IfModule>

# Cache
<IfModule mod_expires.c>
    ExpiresActive on
    ExpiresByType text/css "access plus 1 year"
    ExpiresByType application/javascript "access plus 1 year"
    ExpiresByType image/png "access plus 1 year"
    ExpiresByType image/jpg "access plus 1 year"
    ExpiresByType image/jpeg "access plus 1 year"
</IfModule>
```

#### **Nginx**
```nginx
server {
    listen 80;
    server_name tu-dominio.com;
    return 301 https://$server_name$request_uri;
}

server {
    listen 443 ssl http2;
    server_name tu-dominio.com;
    
    root /var/www/glucocare;
    index index.html index.php;
    
    # SSL Configuration
    ssl_certificate /path/to/certificate.crt;
    ssl_certificate_key /path/to/private.key;
    
    # Security Headers
    add_header X-Frame-Options "SAMEORIGIN" always;
    add_header X-XSS-Protection "1; mode=block" always;
    add_header X-Content-Type-Options "nosniff" always;
    add_header Referrer-Policy "no-referrer-when-downgrade" always;
    add_header Content-Security-Policy "default-src 'self' http: https: data: blob: 'unsafe-inline'" always;
    
    # PHP Processing
    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }
    
    # Protect sensitive files
    location ~ /(conexion\.php|config\.php)$ {
        deny all;
    }
    
    # Static files
    location ~* \.(css|js|png|jpg|jpeg|gif|ico|svg)$ {
        expires 1y;
        add_header Cache-Control "public, immutable";
    }
}
```

### **5. Optimizaciones de Rendimiento**

#### **Base de Datos**
```sql
-- Optimizar tablas
OPTIMIZE TABLE usuario, control_glucosa, comida, hipoglucemia, hiperglucemia;

-- Configurar índices adicionales si es necesario
CREATE INDEX idx_fecha_completa ON control_glucosa(fecha, id_usu);
CREATE INDEX idx_fecha_completa ON comida(fecha, id_usu);
```

#### **PHP**
```php
// Configurar OPcache
opcache.enable=1
opcache.memory_consumption=128
opcache.interned_strings_buffer=8
opcache.max_accelerated_files=4000
opcache.revalidate_freq=2
opcache.fast_shutdown=1
```

### **6. Backup y Monitoreo**

#### **Script de Backup**
```bash
#!/bin/bash
# backup.sh

DATE=$(date +%Y%m%d_%H%M%S)
BACKUP_DIR="/backups/glucocare"
DB_NAME="glucocare_prod"

# Crear directorio de backup
mkdir -p $BACKUP_DIR

# Backup de base de datos
mysqldump -u glucocare_user -p $DB_NAME > $BACKUP_DIR/db_backup_$DATE.sql

# Backup de archivos
tar -czf $BACKUP_DIR/files_backup_$DATE.tar.gz /var/www/glucocare

# Limpiar backups antiguos (más de 30 días)
find $BACKUP_DIR -name "*.sql" -mtime +30 -delete
find $BACKUP_DIR -name "*.tar.gz" -mtime +30 -delete

echo "Backup completado: $DATE"
```

#### **Cron Job para Backups**
```bash
# Ejecutar backup diario a las 2 AM
0 2 * * * /path/to/backup.sh
```

### **7. Monitoreo y Logs**

#### **Logs de Aplicación**
```php
// En config.php
'logging' => [
    'level' => 'error', // Solo errores en producción
    'file' => '/var/log/glucocare/app.log',
    'max_files' => 10
]
```

#### **Monitoreo de Sistema**
```bash
# Instalar herramientas de monitoreo
apt-get install htop iotop nethogs

# Configurar logrotate para logs de PHP
cat > /etc/logrotate.d/glucocare << EOF
/var/log/glucocare/*.log {
    daily
    missingok
    rotate 30
    compress
    delaycompress
    notifempty
    create 644 www-data www-data
}
EOF
```

### **8. Checklist de Despliegue**

- [ ] Base de datos creada y configurada
- [ ] Archivos de configuración copiados y editados
- [ ] Permisos de archivos configurados
- [ ] SSL/HTTPS configurado
- [ ] Headers de seguridad implementados
- [ ] Optimizaciones de rendimiento aplicadas
- [ ] Sistema de backup configurado
- [ ] Monitoreo y logs configurados
- [ ] Pruebas de funcionalidad realizadas
- [ ] Documentación actualizada

### **9. Comandos de Verificación**

```bash
# Verificar configuración PHP
php -m | grep -E "(pdo|mysqli|intl|json)"

# Verificar conexión a base de datos
php -r "
require_once 'php/conexion.php';
echo 'Conexión exitosa a la base de datos\n';
"

# Verificar permisos
find . -type f -name "*.php" -not -perm 644
find . -type d -not -perm 755

# Verificar SSL
openssl s_client -connect tu-dominio.com:443 -servername tu-dominio.com
```

### **10. Troubleshooting**

#### **Problemas Comunes**

1. **Error de conexión a base de datos**
   - Verificar credenciales en `php/conexion.php`
   - Verificar que MySQL esté ejecutándose
   - Verificar permisos del usuario de base de datos

2. **Errores 500**
   - Verificar logs de PHP: `/var/log/php/error.log`
   - Verificar permisos de archivos
   - Verificar sintaxis PHP: `php -l archivo.php`

3. **Problemas de rendimiento**
   - Verificar configuración de OPcache
   - Optimizar consultas de base de datos
   - Verificar uso de memoria: `free -h`

4. **Problemas de seguridad**
   - Verificar que archivos de configuración no sean accesibles
   - Verificar headers de seguridad
   - Verificar logs de acceso para intentos de intrusión

---

**¡Despliegue exitoso! 🎉**

Para soporte adicional, consulta los logs o contacta al administrador del sistema.
