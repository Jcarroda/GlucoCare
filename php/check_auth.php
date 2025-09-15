<?php
/**
 * Verificador de estado de autenticación
 * Este archivo solo verifica si el usuario está logueado
 * NO modifica la lógica de autenticación existente
 */

// Iniciar sesión si no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Configurar headers para JSON
header('Content-Type: application/json');

// Verificar si el usuario está autenticado
$authenticated = false;

if (isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])) {
    $authenticated = true;
}

// Devolver respuesta JSON
echo json_encode([
    'authenticated' => $authenticated,
    'usuario' => $authenticated ? $_SESSION['usuario'] : null
]);
?>
