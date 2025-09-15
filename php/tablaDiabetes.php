<?php
require_once('autenticacion.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario de Control - GlucoCare</title>
    
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
    <link rel="stylesheet" href="../css/calendar.css">
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
                                <li><a href="tablaDiabetes.php" class="active">Ver Datos</a></li>
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

    <main class="main-content">
        <div class="container">

            <?php
            

            $arrayDosis = ["GL/1H", "RAC.", "INSU.", "GL/2H", "GLU_HIPO", "HORA_HIPO", "GLU_HIPER", "HORA_HIPER", "CORR"];
            $arrayDosisImprimir = ["GL/1H", "RAC.", "INSU.", "GL/2H", "GLU", "HORA", "GLU", "HORA", "CORR"];
            $tipoDeComida = ["DESAYUNO", "COMIDA", "CENA"];

            // Obtener parámetros de mes y año desde URL, o usar el mes actual por defecto
            $mes = isset($_GET['mes']) ? intval($_GET['mes']) : date("m");
            $anio = isset($_GET['anio']) ? intval($_GET['anio']) : date("Y");
            $diasDelMes = cal_days_in_month(CAL_GREGORIAN, $mes, $anio);

            // Obtener el nombre del mes en español
            $formatter = new IntlDateFormatter('es_ES', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
            $formatter->setPattern('MMMM'); // Nombre completo del mes en minúsculas
            $mesNombre = ucfirst($formatter->format(mktime(0, 0, 0, $mes, 1))); // Capitaliza la primera letra


            $id_usu = $_SESSION['id_usu'];

            $datosGuardados = [];

            $sql_control = "SELECT fecha, lenta, deporte FROM control_glucosa WHERE id_usu = ? AND MONTH(fecha) = ? AND YEAR(fecha) = ?";
            $stmt_control = $conn->prepare($sql_control);
            $stmt_control->bind_param("iii", $id_usu, $mes, $anio);
            $stmt_control->execute();
            $result_control = $stmt_control->get_result();
            while ($row = $result_control->fetch_assoc()) {
                $dia = intval(date("d", strtotime($row["fecha"])));
                $datosGuardados[$dia]['lenta'] = $row["lenta"];
                $datosGuardados[$dia]['deporte'] = $row["deporte"];
            }

            $sql_comida = "SELECT fecha, tipo_comida, gl_1h, gl_2h, raciones, insulina FROM comida WHERE id_usu = ? AND MONTH(fecha) = ? AND YEAR(fecha) = ?";
            $stmt_comida = $conn->prepare($sql_comida);
            $stmt_comida->bind_param("iii", $id_usu, $mes, $anio);
            $stmt_comida->execute();
            $result_comida = $stmt_comida->get_result();
            while ($row = $result_comida->fetch_assoc()) {
                $dia = intval(date("d", strtotime($row["fecha"])));
                $tipoComida = $row["tipo_comida"];

                $datosGuardados[$dia][$tipoComida] = [
                    "GL/1H" => $row["gl_1h"],
                    "GL/2H" => $row["gl_2h"],
                    "RAC." => $row["raciones"],
                    "INSU." => $row["insulina"],
                ];
            }

            $sql_hipo = "SELECT fecha, tipo_comida, glucosa, hora FROM hipoglucemia WHERE id_usu = ? AND MONTH(fecha) = ? AND YEAR(fecha) = ?";
            $stmt_hipo = $conn->prepare($sql_hipo);
            $stmt_hipo->bind_param("iii", $id_usu, $mes, $anio);
            $stmt_hipo->execute();
            $result_hipo = $stmt_hipo->get_result();
            while ($row = $result_hipo->fetch_assoc()) {
                $dia = intval(date("d", strtotime($row["fecha"])));
                $tipoComida = $row["tipo_comida"];
                $datosGuardados[$dia][$tipoComida]["GLU_HIPO"] = $row["glucosa"];
                $datosGuardados[$dia][$tipoComida]["HORA_HIPO"] = $row["hora"];
            }

            $sql_hiper = "SELECT fecha, tipo_comida, glucosa, hora, correccion FROM hiperglucemia WHERE id_usu = ? AND MONTH(fecha) = ? AND YEAR(fecha) = ?";
            $stmt_hiper = $conn->prepare($sql_hiper);
            $stmt_hiper->bind_param("iii", $id_usu, $mes, $anio);
            $stmt_hiper->execute();
            $result_hiper = $stmt_hiper->get_result();
            while ($row = $result_hiper->fetch_assoc()) {
                $dia = intval(date("d", strtotime($row["fecha"])));
                $tipoComida = $row["tipo_comida"];

                $datosGuardados[$dia][$tipoComida]["GLU_HIPER"] = $row["glucosa"];
                $datosGuardados[$dia][$tipoComida]["HORA_HIPER"] = $row["hora"];
                $datosGuardados[$dia][$tipoComida]["CORR"] = $row["correccion"];
            }

            generarCalendario($arrayDosis, $arrayDosisImprimir, $anio, $mes, $mesNombre, $diasDelMes, $tipoDeComida, $datosGuardados);

            function generarCalendario($array,$arrayDosisImprimir, $anio, $mes, $mesNombre, $diasMes, $tipoComida, $datosGuardados)
            {
                echo "<div class='calendar-container calendar-loading'>";
                
                // Header del calendario
                echo "<div class='calendar-header'>";
                echo "<h1 class='calendar-title'>Calendario de " . $mesNombre . " de " . $anio . "</h1>";
                echo "<p class='calendar-subtitle' style='font-size: 1.25rem; color: rgba(255, 255, 255, 1); font-weight: 600; text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);'>Control detallado de tu diabetes</p>";
                echo "</div>";
                
                // Controles del calendario
                echo "<div class='calendar-controls'>";
                echo "<div class='calendar-nav'>";
                echo "<button class='calendar-nav-btn' onclick='cambiarMes(-1)' title='Mes anterior'>";
                echo "<svg width='16' height='16' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>";
                echo "<path d='M15 18L9 12L15 6' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/>";
                echo "</svg>";
                echo "</button>";
                echo "<span class='calendar-month-display'>" . $mesNombre . " " . $anio . "</span>";
                echo "<button class='calendar-nav-btn' onclick='cambiarMes(1)' title='Mes siguiente'>";
                echo "<svg width='16' height='16' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>";
                echo "<path d='M9 18L15 12L9 6' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/>";
                echo "</svg>";
                echo "</button>";
                echo "</div>";
                
                echo "<div class='calendar-info'>";
                echo "<div class='calendar-legend'>";
                echo "<div class='legend-item'>";
                echo "<div class='legend-color meal-data'></div>";
                echo "<span>Datos de Comida</span>";
                echo "</div>";
                echo "<div class='legend-item'>";
                echo "<div class='legend-color hypo-data'></div>";
                echo "<span>Hipoglucemia</span>";
                echo "</div>";
                echo "<div class='legend-item'>";
                echo "<div class='legend-color hyper-data'></div>";
                echo "<span>Hiperglucemia</span>";
                echo "</div>";
                echo "<div class='legend-item'>";
                echo "<div class='legend-color sport-data'></div>";
                echo "<span>Deporte</span>";
                echo "</div>";
                echo "<div class='legend-item'>";
                echo "<div class='legend-color slow-data'></div>";
                echo "<span>Glucosa Lenta</span>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                
                // Tabla del calendario
                echo "<div class='calendar-responsive'>";
                echo "<table class='calendar-table'>";
                
                // Primera fila - Tipos de comida
                echo "<tr>";
                echo "<th class='day-header'>Día</th>";
                foreach ($tipoComida as $comida) {
                    echo "<th colspan='9' class='meal-header'>" . $comida . "</th>";
                }
                echo "<th class='sport-header'>Deporte</th>";
                echo "<th class='slow-header'>Lenta</th>";
                echo "</tr>";

                // Segunda fila - Categorías
                echo "<tr>";
                echo "<th></th>";
                for ($t = 0; $t < 3; $t++) {
                    echo "<th colspan='4' class='meal-data'>Datos Básicos</th>";
                    echo "<th colspan='2' class='hypo-header'>Hipoglucemia</th>";
                    echo "<th colspan='3' class='hyper-header'>Hiperglucemia</th>";
                }
                echo "<th></th><th></th>";
                echo "</tr>";

                // Tercera fila - Encabezados de columnas
                echo "<tr>";
                echo "<th></th>";
                for ($p = 0; $p < 3; $p++) {
                    foreach ($arrayDosisImprimir as $index => $title) {
                        $class = ($index > 5) ? "hyper-data" : (($index > 3) ? "hypo-data" : "meal-data");
                        echo "<th class='$class'>" . $title . "</th>";
                    }
                }
                echo "<th class='sport-data'>Nivel</th>";
                echo "<th class='slow-data'>mg/dL</th>";
                echo "</tr>";

                // Filas de datos
                for ($dia = 1; $dia <= $diasMes; $dia++) {
                    echo "<tr>";
                    echo "<td class='day-header'>" . $dia . "</td>";

                    for ($t = 0; $t < 3; $t++) {
                        $tipo = $tipoComida[$t];

                        for ($d = 0; $d < 9; $d++) {
                            $valor = isset($datosGuardados[$dia][$tipo][$array[$d]]) ? $datosGuardados[$dia][$tipo][$array[$d]] : '';
                            $class = ($d > 5) ? "hyper-data" : (($d > 3) ? "hypo-data" : "meal-data");
                            $hasData = !empty($valor) ? "has-data" : "empty";
                            
                            echo "<td class='$class $hasData' data-tooltip='$tipo - " . $arrayDosisImprimir[$d] . ": $valor'>";
                            echo $valor;
                            if (!empty($valor)) {
                                echo "<div class='data-indicator'></div>";
                            }
                            echo "</td>";
                        }
                    }

                    $valorDeporte = isset($datosGuardados[$dia]['deporte']) ? $datosGuardados[$dia]['deporte'] : '';
                    $hasSportData = !empty($valorDeporte) ? "has-data" : "empty";
                    echo "<td class='sport-data $hasSportData' data-tooltip='Nivel de deporte: $valorDeporte'>";
                    echo $valorDeporte;
                    if (!empty($valorDeporte)) {
                        echo "<div class='data-indicator'></div>";
                    }
                    echo "</td>";

                    $valorLenta = isset($datosGuardados[$dia]['lenta']) ? $datosGuardados[$dia]['lenta'] : '';
                    $hasSlowData = !empty($valorLenta) ? "has-data" : "empty";
                    echo "<td class='slow-data $hasSlowData' data-tooltip='Glucosa lenta: $valorLenta mg/dL'>";
                    echo $valorLenta;
                    if (!empty($valorLenta)) {
                        echo "<div class='data-indicator'></div>";
                    }
                    echo "</td>";

                    echo "</tr>";
                }

                echo "</table>";
                echo "</div>";
                echo "</div>";
            }

            $conn->close();
            ?>

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
            // Tooltip functionality
            const tooltip = document.createElement('div');
            tooltip.className = 'data-tooltip';
            document.body.appendChild(tooltip);

            const cells = document.querySelectorAll('.calendar-table td[data-tooltip]');
            cells.forEach(cell => {
                cell.addEventListener('mouseenter', function(e) {
                    const tooltipText = this.getAttribute('data-tooltip');
                    if (tooltipText) {
                        tooltip.textContent = tooltipText;
                        tooltip.classList.add('show');
                        
                        const rect = this.getBoundingClientRect();
                        tooltip.style.left = rect.left + (rect.width / 2) - (tooltip.offsetWidth / 2) + 'px';
                        tooltip.style.top = rect.top - tooltip.offsetHeight - 10 + 'px';
                    }
                });

                cell.addEventListener('mouseleave', function() {
                    tooltip.classList.remove('show');
                });
            });

            // Calendar navigation
            window.navegarMes = function(direction) {
                // Esta función se puede implementar para navegar entre meses
                // Por ahora solo muestra un mensaje
                alert('Navegación entre meses - Funcionalidad en desarrollo');
            };

            // Add click handlers for data cells
            cells.forEach(cell => {
                if (cell.classList.contains('has-data')) {
                    cell.style.cursor = 'pointer';
                    cell.addEventListener('click', function() {
                        const tooltipText = this.getAttribute('data-tooltip');
                        if (tooltipText) {
                            alert('Datos: ' + tooltipText);
                        }
                    });
                }
            });

            // Smooth scroll for calendar
            const calendarContainer = document.querySelector('.calendar-container');
            if (calendarContainer) {
                calendarContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }

            // Print functionality
            const printBtn = document.createElement('button');
            printBtn.className = 'btn btn-outline btn-sm';
            printBtn.innerHTML = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 9V2H18V9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M6 18H4C3.46957 18 2.96086 17.7893 2.58579 17.4142C2.21071 17.0391 2 16.5304 2 16V11C2 10.4696 2.21071 9.96086 2.58579 9.58579C2.96086 9.21071 3.46957 9 4 9H20C20.5304 9 21.0391 9.21071 21.4142 9.58579C21.7893 9.96086 22 10.4696 22 11V16C22 16.5304 21.7893 17.0391 21.4142 17.4142C21.0391 17.7893 20.5304 18 20 18H18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M18 14H6V22H18V14Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg> Imprimir';
            printBtn.onclick = () => window.print();
            
            const controls = document.querySelector('.calendar-controls');
            if (controls) {
                controls.appendChild(printBtn);
            }
        });

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

        // Función para cambiar de mes
        function cambiarMes(direccion) {
            const urlParams = new URLSearchParams(window.location.search);
            let mes = parseInt(urlParams.get('mes')) || new Date().getMonth() + 1;
            let anio = parseInt(urlParams.get('anio')) || new Date().getFullYear();
            
            mes += direccion;
            if (mes > 12) { 
                mes = 1; 
                anio++; 
            }
            if (mes < 1) { 
                mes = 12; 
                anio--; 
            }
            
            // Redirigir a la misma página con los nuevos parámetros
            window.location.href = `?mes=${mes}&anio=${anio}`;
        }
    </script>
</body>

</html>