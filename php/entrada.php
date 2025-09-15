<?php
session_start();
require_once('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["usuario"];
    $clave = $_POST["contra"];

    $sql = "SELECT id_usu, usuario, contra FROM usuario WHERE usuario = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error al preparar la consulta.");
    }

    $stmt->bind_param("s", $user);
    $stmt->execute();

    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id_usu, $storedUser, $storedPass);
        $stmt->fetch();
        $clave_encriptada = password_hash($clave, PASSWORD_BCRYPT);

        if (password_verify($clave, $clave_encriptada)) {
            $_SESSION["id_usu"] = $id_usu;
            $_SESSION["usuario"] = $storedUser;
            
            header("Location: ../index.html");
            exit();
        } else {
            echo "<script>alert('Contraseña incorrecta.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('El usuario no existe.'); window.history.back();</script>";
    }

    $stmt->close();
    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Control Diabetes</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="../favicon.svg">
    <link rel="icon" type="image/x-icon" href="../favicon.ico">
    <link rel="apple-touch-icon" href="../favicon.svg">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- CSS Modular -->
    <link rel="stylesheet" href="../css/variables.css">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/components.css">
    <link rel="stylesheet" href="../css/layout.css">
    <link rel="stylesheet" href="../css/auth.css">
    <link rel="stylesheet" href="../css/responsive.css">
</head>
<body>
    <!-- Header simple para páginas de autenticación -->
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <div class="logo-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2L13.09 8.26L20 9L13.09 9.74L12 16L10.91 9.74L4 9L10.91 8.26L12 2Z" fill="currentColor"/>
                            <circle cx="12" cy="12" r="3" fill="currentColor"/>
                        </svg>
                    </div>
                    <h1 class="logo-text">Control Diabetes</h1>
                </div>
                
                <nav class="nav">
                    <ul class="nav-list">
                        <li class="nav-item">
                            <a href="../index.html" class="nav-link">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3 9L12 2L21 9V20C21 20.5304 20.7893 21.0391 20.4142 21.4142C20.0391 21.7893 19.5304 22 19 22H5C4.46957 22 3.96086 21.7893 3.58579 21.4142C3.21071 21.0391 3 20.5304 3 20V9Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M9 22V12H15V22" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                Inicio
                            </a>
                        </li>
                        
                        <!-- Enlaces para usuarios NO logueados -->
                        <li class="nav-item" id="nav-registro" style="display: none;">
                            <a href="registrarse.php" class="nav-link">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16 21V19C16 17.9391 15.5786 16.9217 14.8284 16.1716C14.0783 15.4214 13.0609 15 12 15H5C3.93913 15 2.92172 15.4214 2.17157 16.1716C1.42143 16.9217 1 17.9391 1 19V21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <circle cx="8.5" cy="7" r="4" stroke="currentColor" stroke-width="2"/>
                                    <path d="M20 8V14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M23 11H17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                Registro
                            </a>
                        </li>
                        <li class="nav-item" id="nav-login" style="display: none;">
                            <a href="entrada.php" class="nav-link active">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15 3H19C19.5304 3 20.0391 3.21071 20.4142 3.58579C20.7893 3.96086 21 4.46957 21 5V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M10 17L15 12L10 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M15 12H3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                Iniciar Sesión
                            </a>
                        </li>
                        
                        <!-- Enlaces para usuarios logueados -->
                        <li class="nav-item dropdown" id="nav-control" style="display: none;">
                            <a href="#" class="nav-link dropdown-toggle">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 12L11 14L15 10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="currentColor" stroke-width="2"/>
                                </svg>
                                Control
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="dropdown-arrow">
                                    <path d="M6 9L12 15L18 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="tablaDiabetes.php">Ver Datos</a></li>
                                <li><a href="añadir.php">Añadir Datos</a></li>
                                <li><a href="modificar.php">Modificar</a></li>
                                <li><a href="borrar.php">Eliminar</a></li>
                                <li><a href="estadisticas.php">Estadísticas</a></li>
                            </ul>
                        </li>
                        <li class="nav-item" id="nav-logout" style="display: none;">
                            <a href="salida.php" class="nav-link">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V5C3 4.46957 3.21071 3.96086 3.58579 3.58579C3.96086 3.21071 4.46957 3 5 3H9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M16 17L21 12L16 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M21 12H9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                Salir
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <div class="auth-logo">
                    <div class="auth-logo-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2L13.09 8.26L20 9L13.09 9.74L12 16L10.91 9.74L4 9L10.91 8.26L12 2Z" fill="currentColor"/>
                            <circle cx="12" cy="12" r="3" fill="currentColor"/>
                        </svg>
                    </div>
                    <h1 class="auth-logo-text">Control Diabetes</h1>
                </div>
                <h2 class="auth-title">Bienvenido de vuelta</h2>
                <p class="auth-subtitle">Inicia sesión para acceder a tu panel de control</p>
            </div>

            <form method="post" class="auth-form" id="loginForm">
                <div class="form-group">
                    <label for="usuario" class="form-label">Nombre de Usuario</label>
                    <input type="text" 
                           name="usuario" 
                           id="usuario" 
                           class="form-input" 
                           required
                           placeholder="Ingresa tu nombre de usuario"
                           autocomplete="username">
                    <svg class="input-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 21V19C20 17.9391 19.5786 16.9217 18.8284 16.1716C18.0783 15.4214 17.0609 15 16 15H8C6.93913 15 5.92172 15.4214 5.17157 16.1716C4.42143 16.9217 4 17.9391 4 19V21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="12" cy="7" r="4" stroke="currentColor" stroke-width="2"/>
                    </svg>
                </div>

                <div class="form-group">
                    <label for="contra" class="form-label">Contraseña</label>
                    <input type="password" 
                           name="contra" 
                           id="contra" 
                           class="form-input" 
                           required
                           placeholder="Ingresa tu contraseña"
                           autocomplete="current-password">
                    <svg class="input-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2" stroke="currentColor" stroke-width="2"/>
                        <circle cx="12" cy="16" r="1" stroke="currentColor" stroke-width="2"/>
                        <path d="M7 11V7C7 5.67392 7.52678 4.40215 8.46447 3.46447C9.40215 2.52678 10.6739 2 12 2C13.3261 2 14.5979 2.52678 15.5355 3.46447C16.4732 4.40215 17 5.67392 17 7V11" stroke="currentColor" stroke-width="2"/>
                    </svg>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <input type="checkbox" name="remember" style="margin-right: 8px;">
                        Recordar mi sesión
                    </label>
                </div>
                
                <button type="submit" class="auth-button auth-button-primary">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 3H19C19.5304 3 20.0391 3.21071 20.4142 3.58579C20.7893 3.96086 21 4.46957 21 5V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10 17L15 12L10 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M15 12H3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Iniciar Sesión
                </button>
    </form>

            <div class="auth-link">
                <p>¿No tienes una cuenta? <a href="registrarse.php">Regístrate aquí</a></p>
            </div>

            <div class="auth-footer">
                <p>¿Olvidaste tu contraseña? <a href="#">Recuperar contraseña</a></p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('loginForm');
            const inputs = form.querySelectorAll('.form-input');

            // Form submission with loading state
            form.addEventListener('submit', function(e) {
                const button = form.querySelector('.auth-button');
                button.classList.add('loading');
                button.disabled = true;
                
                // Re-enable button after 3 seconds in case of error
                setTimeout(() => {
                    button.classList.remove('loading');
                    button.disabled = false;
                }, 3000);
            });

            // Real-time validation
            inputs.forEach(input => {
                input.addEventListener('blur', function() {
                    if (this.checkValidity()) {
                        this.classList.remove('error');
                        this.classList.add('success');
                    } else {
                        this.classList.remove('success');
                        this.classList.add('error');
                    }
                });

                input.addEventListener('input', function() {
                    if (this.classList.contains('error') && this.checkValidity()) {
                        this.classList.remove('error');
                        this.classList.add('success');
                    }
                });
            });

            // Auto-focus on first input
            document.getElementById('usuario').focus();
        });
    </script>
    
    <!-- Script para controlar navegación según estado de autenticación -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Función para verificar si el usuario está logueado
            function checkAuthStatus() {
                // Hacer una petición al servidor para verificar el estado de autenticación
                fetch('check_auth.php')
                    .then(response => response.json())
                    .then(data => {
                        if (data.authenticated) {
                            // Usuario logueado: mostrar control y salir
                            document.getElementById('nav-control').style.display = 'block';
                            document.getElementById('nav-logout').style.display = 'block';
                            // Ocultar registro e inicio de sesión
                            document.getElementById('nav-registro').style.display = 'none';
                            document.getElementById('nav-login').style.display = 'none';
                        } else {
                            // Usuario NO logueado: mostrar registro e inicio de sesión
                            document.getElementById('nav-registro').style.display = 'block';
                            document.getElementById('nav-login').style.display = 'block';
                            // Ocultar control y salir
                            document.getElementById('nav-control').style.display = 'none';
                            document.getElementById('nav-logout').style.display = 'none';
                        }
                    })
                    .catch(error => {
                        console.log('Error verificando autenticación:', error);
                        // En caso de error, mostrar enlaces para usuarios no logueados
                        document.getElementById('nav-registro').style.display = 'block';
                        document.getElementById('nav-login').style.display = 'block';
                        document.getElementById('nav-control').style.display = 'none';
                        document.getElementById('nav-logout').style.display = 'none';
                    });
            }
            
            // Verificar estado de autenticación al cargar la página
            checkAuthStatus();
        });
    </script>
</body>
</html>
