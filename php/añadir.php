<?php
require_once('conexion.php');
require_once('autenticacion.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Datos - GlucoCare</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- CSS Modular -->
    <link rel="stylesheet" href="../css/variables.css">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/components.css">
    <link rel="stylesheet" href="../css/layout.css">
    <link rel="stylesheet" href="../css/forms.css">
    <link rel="stylesheet" href="../css/responsive.css">
</head>

<body>
    <!-- Header -->
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
                    <h1 class="logo-text">GlucoCare</h1>
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
                            <a href="entrada.php" class="nav-link">
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
                                <li><a href="añadir.php" class="active">Añadir Datos</a></li>
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

    <main class="main-content">
        <div class="forms-container">
            <div class="forms-header">
                <h1 class="forms-title">Añadir Datos de Control</h1>
                <p class="forms-subtitle">
                    Registra tu información diaria para mantener un control completo de tu diabetes
                </p>
            </div>

            <div class="forms-grid">
                <!-- Control de Glucosa -->
                <div class="form-section control-glucose">
                    <div class="form-section-header">
                        <div class="form-section-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2L13.09 8.26L20 9L13.09 9.74L12 16L10.91 9.74L4 9L10.91 8.26L12 2Z" fill="currentColor"/>
                                <circle cx="12" cy="12" r="3" fill="currentColor"/>
                            </svg>
                        </div>
                        <h2 class="form-section-title">Control de Glucosa</h2>
                        <p class="form-section-subtitle">Registra tu nivel de actividad y glucosa basal</p>
                    </div>
                    <div class="form-section-body">
                        <form action="guardar_añadir.php" method="POST" id="controlForm">
                            <div class="form-group">
                                <label for="fecha_control" class="form-label">Fecha del Control</label>
                                <input type="date" 
                                       name="fecha_control" 
                                       id="fecha_control" 
                                       class="form-input" 
                                       required>
                            </div>

                            <div class="form-group">
                                <label for="deporte" class="form-label">Nivel de Actividad Física</label>
                                <input type="number" 
                                       name="deporte" 
                                       id="deporte" 
                                       class="form-input" 
                                       min="1" 
                                       max="5" 
                                       required
                                       placeholder="Del 1 (bajo) al 5 (alto)">
                                <div class="help-text">1 = Sedentario, 2 = Ligero, 3 = Moderado, 4 = Intenso, 5 = Muy intenso</div>
                            </div>

                            <div class="form-group">
                                <label for="lenta" class="form-label">Glucosa Basal (mg/dL)</label>
                                <input type="number" 
                                       name="lenta" 
                                       id="lenta" 
                                       class="form-input" 
                                       min="0" 
                                       max="500" 
                                       required
                                       placeholder="Ej: 120">
                                <div class="help-text">Glucosa en ayunas o basal</div>
                            </div>

                            <button type="submit" name="submit_control" class="form-button form-button-primary">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 5V19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M5 12H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                Añadir Control
                            </button>
        </form>
                    </div>
                </div>

                <!-- Añadir Comida -->
                <div class="form-section comida">
                    <div class="form-section-header">
                        <div class="form-section-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 2L3 6V20C3 20.5304 3.21071 21.0391 3.58579 21.4142C3.96086 21.7893 4.46957 22 5 22H19C19.5304 22 20.0391 21.7893 20.4142 21.4142C20.7893 21.0391 21 20.5304 21 20V6L18 2H6Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M3 6H21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M16 10C16 11.1046 15.1046 12 14 12C12.8954 12 12 11.1046 12 10C12 8.89543 12.8954 8 14 8C15.1046 8 16 8.89543 16 10Z" stroke="currentColor" stroke-width="2"/>
                            </svg>
                        </div>
                        <h2 class="form-section-title">Añadir Comida</h2>
                        <p class="form-section-subtitle">Registra los datos de tus comidas</p>
                    </div>
                    <div class="form-section-body">
                        <form action="guardar_añadir.php" method="POST" id="comidaForm">
                            <div class="form-group">
                                <label for="tipo_comida" class="form-label">Tipo de Comida</label>
                                <input type="text" 
                                       name="tipo_comida" 
                                       id="tipo_comida" 
                                       class="form-input" 
                                       required
                                       placeholder="Ej: Desayuno, Almuerzo, Cena">
                            </div>

                            <div class="form-group">
                                <label for="fecha_comida" class="form-label">Fecha de la Comida</label>
                                <input type="date" 
                                       name="fecha_comida" 
                                       id="fecha_comida" 
                                       class="form-input" 
                                       required>
                            </div>

                            <div class="input-group">
                                <div class="form-group">
                                    <label for="gl_1h" class="form-label">Glucosa 1h (mg/dL)</label>
                                    <input type="number" 
                                           name="gl_1h" 
                                           id="gl_1h" 
                                           class="form-input" 
                                           min="0" 
                                           max="500" 
                                           required
                                           placeholder="Ej: 140">
                                </div>
                                <div class="form-group">
                                    <label for="gl_2h" class="form-label">Glucosa 2h (mg/dL)</label>
                                    <input type="number" 
                                           name="gl_2h" 
                                           id="gl_2h" 
                                           class="form-input" 
                                           min="0" 
                                           max="500" 
                                           required
                                           placeholder="Ej: 120">
                                </div>
                            </div>

                            <div class="input-group">
                                <div class="form-group">
                                    <label for="raciones" class="form-label">Raciones</label>
                                    <input type="number" 
                                           name="raciones" 
                                           id="raciones" 
                                           class="form-input" 
                                           min="0" 
                                           step="0.1" 
                                           required
                                           placeholder="Ej: 2.5">
                                </div>
                                <div class="form-group">
                                    <label for="insulina" class="form-label">Insulina (unidades)</label>
                                    <input type="number" 
                                           name="insulina" 
                                           id="insulina" 
                                           class="form-input" 
                                           min="0" 
                                           step="0.1" 
                                           required
                                           placeholder="Ej: 3.5">
                                </div>
                            </div>

                            <button type="submit" name="submit_comida" class="form-button form-button-primary">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 5V19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M5 12H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                Añadir Comida
                            </button>
        </form>
                    </div>
                </div>

                <!-- Añadir Hipoglucemia -->
                <div class="form-section hipoglucemia">
                    <div class="form-section-header">
                        <div class="form-section-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <h2 class="form-section-title">Añadir Hipoglucemia</h2>
                        <p class="form-section-subtitle">Registra episodios de hipoglucemia</p>
                    </div>
                    <div class="form-section-body">
                        <form action="guardar_añadir.php" method="POST" id="hipoForm">
                            <div class="form-group">
                                <label for="tipo_comida_hipo" class="form-label">Tipo de Comida</label>
                                <input type="text" 
                                       name="tipo_comida_hipo" 
                                       id="tipo_comida_hipo" 
                                       class="form-input" 
                                       required
                                       placeholder="Ej: Desayuno, Almuerzo, Cena">
                            </div>

                            <div class="form-group">
                                <label for="fecha_hipo" class="form-label">Fecha del Episodio</label>
                                <input type="date" 
                                       name="fecha_hipo" 
                                       id="fecha_hipo" 
                                       class="form-input" 
                                       required>
                            </div>

                            <div class="input-group">
                                <div class="form-group">
                                    <label for="glucosa_hipoglucemia" class="form-label">Nivel de Glucosa (mg/dL)</label>
                                    <input type="number" 
                                           name="glucosa_hipoglucemia" 
                                           id="glucosa_hipoglucemia" 
                                           class="form-input" 
                                           min="0" 
                                           max="200" 
                                           required
                                           placeholder="Ej: 65">
                                </div>
                                <div class="form-group">
                                    <label for="hora_hipoglucemia" class="form-label">Hora del Episodio</label>
                                    <input type="time" 
                                           name="hora_hipoglucemia" 
                                           id="hora_hipoglucemia" 
                                           class="form-input" 
                                           required>
                                </div>
                            </div>

                            <button type="submit" name="submit_hipoglucemia" class="form-button form-button-primary">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 5V19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M5 12H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                Añadir Hipoglucemia
                            </button>
        </form>
                    </div>
                </div>

                <!-- Añadir Hiperglucemia -->
                <div class="form-section hiperglucemia">
                    <div class="form-section-header">
                        <div class="form-section-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <h2 class="form-section-title">Añadir Hiperglucemia</h2>
                        <p class="form-section-subtitle">Registra episodios de hiperglucemia</p>
                    </div>
                    <div class="form-section-body">
                        <form action="guardar_añadir.php" method="POST" id="hiperForm">
                            <div class="form-group">
                                <label for="tipo_comida_hiper" class="form-label">Tipo de Comida</label>
                                <input type="text" 
                                       name="tipo_comida_hiper" 
                                       id="tipo_comida_hiper" 
                                       class="form-input" 
                                       required
                                       placeholder="Ej: Desayuno, Almuerzo, Cena">
                            </div>

                            <div class="form-group">
                                <label for="fecha_hiper" class="form-label">Fecha del Episodio</label>
                                <input type="date" 
                                       name="fecha_hiper" 
                                       id="fecha_hiper" 
                                       class="form-input" 
                                       required>
                            </div>

                            <div class="input-group">
                                <div class="form-group">
                                    <label for="glucosa_hiperglucemia" class="form-label">Nivel de Glucosa (mg/dL)</label>
                                    <input type="number" 
                                           name="glucosa_hiperglucemia" 
                                           id="glucosa_hiperglucemia" 
                                           class="form-input" 
                                           min="0" 
                                           max="500" 
                                           required
                                           placeholder="Ej: 180">
                                </div>
                                <div class="form-group">
                                    <label for="hora_hiperglucemia" class="form-label">Hora del Episodio</label>
                                    <input type="time" 
                                           name="hora_hiperglucemia" 
                                           id="hora_hiperglucemia" 
                                           class="form-input" 
                                           required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="correccion" class="form-label">Corrección Aplicada (unidades)</label>
                                <input type="number" 
                                       name="correccion" 
                                       id="correccion" 
                                       class="form-input" 
                                       min="0" 
                                       step="0.1" 
                                       required
                                       placeholder="Ej: 2.5">
                                <div class="help-text">Cantidad de insulina de corrección aplicada</div>
                            </div>

                            <button type="submit" name="submit_hiperglucemia" class="form-button form-button-primary">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 5V19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M5 12H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                Añadir Hiperglucemia
                            </button>
        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-brand">
                    <div class="logo">
                        <div class="logo-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2L13.09 8.26L20 9L13.09 9.74L12 16L10.91 9.74L4 9L10.91 8.26L12 2Z" fill="currentColor"/>
                                <circle cx="12" cy="12" r="3" fill="currentColor"/>
                            </svg>
                        </div>
                        <span class="logo-text">GlucoCare</span>
                    </div>
                    <p class="footer-description">
                        Tu compañero digital para el control efectivo de la diabetes.
                    </p>
                </div>
                
                <div class="footer-links">
                    <div class="footer-column">
                        <h4 class="footer-title">Navegación</h4>
                        <ul class="footer-list">
                            <li><a href="../index.html">Inicio</a></li>
                            <li><a href="registrarse.php">Registro</a></li>
                            <li><a href="entrada.php">Iniciar Sesión</a></li>
                        </ul>
                    </div>
                    
                    <div class="footer-column">
                        <h4 class="footer-title">Control</h4>
                        <ul class="footer-list">
                            <li><a href="tablaDiabetes.php">Ver Datos</a></li>
                            <li><a href="añadir.php">Añadir Datos</a></li>
                            <li><a href="modificar.php">Modificar</a></li>
                            <li><a href="borrar.php">Eliminar</a></li>
                            <li><a href="estadisticas.php">Estadísticas</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p class="footer-copyright">
                    &copy; 2025 GlucoCare. Todos los derechos reservados.
                </p>
            </div>
        </div>
    </footer>

    <div id="modal" class="modal">
        <span class="cerrar">&times;</span>
        <img class="modal-contenido" id="imagen-modal">
    </div>

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

            // Form validation enhancement
            document.querySelectorAll('form').forEach(form => {
                form.addEventListener('submit', function(e) {
                    const button = form.querySelector('.form-button');
                    button.classList.add('loading');
                    button.disabled = true;
                    
                    // Re-enable button after 3 seconds in case of error
                    setTimeout(() => {
                        button.classList.remove('loading');
                        button.disabled = false;
                    }, 3000);
                });

                // Real-time validation
                const inputs = form.querySelectorAll('.form-input');
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
            });
        });
    </script>
</body>

</html>