<?php
// ========================================
// CONTROL DIABETES - CONFIGURACIÓN DE EJEMPLO
// ========================================

// Copia este archivo como 'config.php' y configura tus valores

return [
    // Configuración de Base de Datos
    'database' => [
        'host' => 'localhost',
        'name' => 'control_diabetes',
        'user' => 'tu_usuario',
        'pass' => 'tu_contraseña',
        'charset' => 'utf8',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]
    ],

    // Configuración de la Aplicación
    'app' => [
        'name' => 'GlucoCare',
        'version' => '1.0.0',
        'env' => 'development', // development, production
        'debug' => true,
        'url' => 'http://localhost',
        'timezone' => 'Europe/Madrid'
    ],

    // Configuración de Sesiones
    'session' => [
        'lifetime' => 7200, // 2 horas
        'secure' => false, // true en HTTPS
        'httponly' => true,
        'samesite' => 'Lax'
    ],

    // Configuración de Seguridad
    'security' => [
        'password_min_length' => 8,
        'max_login_attempts' => 5,
        'lockout_duration' => 900, // 15 minutos
        'hash_algorithm' => PASSWORD_DEFAULT
    ],

    // Configuración de Email
    'mail' => [
        'host' => 'smtp.gmail.com',
        'port' => 587,
        'username' => 'tu_email@gmail.com',
        'password' => 'tu_contraseña_email',
        'encryption' => 'tls',
        'from_name' => 'GlucoCare',
        'from_email' => 'noreply@glucocare.com'
    ],

    // Configuración de Archivos
    'upload' => [
        'max_size' => 5242880, // 5MB
        'allowed_extensions' => ['jpg', 'jpeg', 'png', 'pdf'],
        'upload_path' => 'uploads/'
    ],

    // Configuración de Logs
    'logging' => [
        'level' => 'info', // debug, info, warning, error
        'file' => 'logs/app.log',
        'max_files' => 5
    ],

    // Configuración de Cache
    'cache' => [
        'enabled' => false,
        'lifetime' => 3600, // 1 hora
        'driver' => 'file' // file, redis, memcached
    ],

    // Configuración de Backup
    'backup' => [
        'enabled' => false,
        'frequency' => 'daily', // daily, weekly, monthly
        'retention' => 30, // días
        'path' => 'backups/'
    ]
];
?>
