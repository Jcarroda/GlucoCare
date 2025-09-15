<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Datos - GlucoCare</title>
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
                        <li class="nav-item dropdown" id="nav-control">
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
                                <li><a href="borrar.php" class="active">Eliminar</a></li>
                                <li><a href="estadisticas.php">Estadísticas</a></li>
                            </ul>
                        </li>
                        <li class="nav-item" id="nav-logout">
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
                <h1 class="forms-title">Eliminar Datos de Control</h1>
                <p class="forms-subtitle">
                    Elimina registros específicos de tu control de diabetes de forma segura
                </p>
            </div>

            <div class="delete-form-container">
                <div class="delete-warning">
                    <div class="warning-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 9V13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 17H12.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10.29 3.86L1.82 18C1.64547 18.3024 1.5729 18.6453 1.61286 18.9873C1.65282 19.3293 1.80314 19.6507 2.04238 19.8999C2.28162 20.1491 2.59705 20.3123 2.94001 20.3655C3.28297 20.4188 3.63451 20.3594 3.94 20.196L12 16.5L20.06 20.196C20.3655 20.3594 20.717 20.4188 21.06 20.3655C21.4029 20.3123 21.7184 20.1491 21.9576 19.8999C22.1969 19.6507 22.3472 19.3293 22.3871 18.9873C22.4271 18.6453 22.3545 18.3024 22.18 18L13.71 3.86C13.5318 3.56631 13.2807 3.32312 12.9812 3.15447C12.6817 2.98582 12.3438 2.89725 12 2.89725C11.6562 2.89725 11.3183 2.98582 11.0188 3.15447C10.7193 3.32312 10.4682 3.56631 10.29 3.86Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="warning-content">
                        <h3 class="warning-title">¡Atención!</h3>
                        <p class="warning-text">
                            Esta acción eliminará permanentemente el registro seleccionado. 
                            Esta operación no se puede deshacer.
                        </p>
                    </div>
                </div>

                <form action="guardar_borrar.php" method="POST" id="deleteForm" class="delete-form">
                    <div class="form-group">
                        <label for="tipo_registro" class="form-label">Tipo de Registro a Eliminar</label>
                        <select name="tipo_registro" id="tipo_registro" class="form-select" required>
                            <option value="">Selecciona el tipo de dato...</option>
                            <option value="control_glucosa">Control de Glucosa</option>
                            <option value="comida">Comida</option>
                            <option value="hipoglucemia">Hipoglucemia</option>
                            <option value="hiperglucemia">Hiperglucemia</option>
                        </select>
                        <div class="help-text">Selecciona qué tipo de registro quieres eliminar</div>
                    </div>

                    <div class="form-group" id="tipoComidaGroup" style="display: none;">
                        <label for="tipo_comida" class="form-label">Tipo de Comida</label>
                        <input type="text" 
                               name="tipo_comida" 
                               id="tipo_comida" 
                               class="form-input" 
                               placeholder="Ej: Desayuno, Almuerzo, Cena">
                        <div class="help-text">Especifica el tipo de comida (solo para registros de comida)</div>
                    </div>

                    <div class="form-group">
                        <label for="fecha" class="form-label">Fecha del Registro</label>
                        <input type="date" 
                               name="fecha" 
                               id="fecha" 
                               class="form-input" 
                               required>
                        <div class="help-text">Fecha del registro que quieres eliminar</div>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="form-button form-button-secondary" onclick="history.back()">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 12H5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 19L5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Cancelar
                        </button>
                        <button type="submit" class="form-button form-button-danger" id="deleteButton">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 6H5H21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M10 11V17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M14 11V17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Eliminar Registro
                        </button>
                    </div>
                </form>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tipoRegistro = document.getElementById('tipo_registro');
            const tipoComidaGroup = document.getElementById('tipoComidaGroup');
            const deleteForm = document.getElementById('deleteForm');
            const deleteButton = document.getElementById('deleteButton');

            // Mostrar/ocultar campo de tipo de comida según selección
            tipoRegistro.addEventListener('change', function() {
                if (this.value === 'comida') {
                    tipoComidaGroup.style.display = 'block';
                    document.getElementById('tipo_comida').required = true;
                } else {
                    tipoComidaGroup.style.display = 'none';
                    document.getElementById('tipo_comida').required = false;
                }
            });

            // Confirmación antes de eliminar
            deleteForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const tipoRegistro = document.getElementById('tipo_registro').value;
                const fecha = document.getElementById('fecha').value;
                
                if (!tipoRegistro || !fecha) {
                    alert('Por favor, completa todos los campos requeridos.');
                    return;
                }

                const confirmMessage = `¿Estás seguro de que quieres eliminar el registro de ${tipoRegistro} del ${fecha}?\n\nEsta acción no se puede deshacer.`;
                
                if (confirm(confirmMessage)) {
                    // Mostrar estado de carga
                    deleteButton.classList.add('loading');
                    deleteButton.disabled = true;
                    
                    // Enviar formulario
                    this.submit();
                }
            });

            // Validación en tiempo real
            const inputs = deleteForm.querySelectorAll('.form-input, .form-select');
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
    </script>
</body>
</html>