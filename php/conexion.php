<?php
// Archivo de ejemplo para configuración de base de datos
// Copia este archivo como 'conexion.php' y configura tus credenciales

$host = 'localhost';           // Host de la base de datos
$dbname = 'glucocare';   // Nombre de la base de datos
$username = 'tu_usuario';      // Usuario de MySQL
$password = 'tu_contraseña';   // Contraseña de MySQL

try {
    $conn = new mysqli($host, $username, $password, $dbname);
    
    // Verificar conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }
    
    // Configurar charset
    $conn->set_charset("utf8");
    
} catch (Exception $e) {
    die("Error al conectar con la base de datos: " . $e->getMessage());
}
?>
