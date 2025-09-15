<?php
require_once('autenticacion.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas - GlucoCare</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- CSS Modular -->
    <link rel="stylesheet" href="../css/variables.css">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/components.css">
    <link rel="stylesheet" href="../css/layout.css">
    <link rel="stylesheet" href="../css/calendar.css">
    <link rel="stylesheet" href="../css/stats.css">
    <link rel="stylesheet" href="../css/responsive.css">
    
    <!-- Estilos críticos inline para estadísticas -->
    <style>
        .stats-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }
        
        .stats-card {
            background: white;
            border-radius: 0.75rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        .stats-card-header {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            margin-bottom: 1rem;
        }
        
        .stats-card-icon {
            width: 3rem;
            height: 3rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 0.5rem;
            color: #667eea;
        }
        
        .stats-card-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1f2937;
            margin: 0;
        }
        
        .stats-card-subtitle {
            font-size: 0.875rem;
            color: #6b7280;
            margin: 0;
        }
        
        .episode-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 0.75rem 0;
            border-bottom: 1px solid #e5e7eb;
        }
        
        .episode-item:last-child {
            border-bottom: none;
        }
        
        .episode-icon {
            width: 2.5rem;
            height: 2.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 0.5rem;
        }
        
        .episode-icon.hipo {
            color: #d97706;
        }
        
        .episode-icon.hiper {
            color: #dc2626;
        }
        
        .episode-info {
            flex: 1;
        }
        
        .episode-type {
            display: block;
            font-weight: 500;
            color: #1f2937;
        }
        
        .episode-count {
            display: block;
            font-size: 0.875rem;
            color: #6b7280;
        }
        
        .monthly-chart {
            display: flex;
            align-items: end;
            justify-content: space-between;
            height: 200px;
            padding: 1rem 0;
        }
        
        .month-bar {
            display: flex;
            flex-direction: column;
            align-items: center;
            flex: 1;
            margin: 0 0.25rem;
        }
        
        .bar-container {
            height: 150px;
            display: flex;
            align-items: end;
            width: 100%;
            justify-content: center;
        }
        
        .bar {
            width: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 0.25rem;
            transition: transform 0.3s ease;
            transform-origin: bottom;
            transform: scaleY(0);
        }
        
        .month-label {
            font-size: 0.75rem;
            color: #6b7280;
            margin-top: 0.5rem;
        }
        
        .month-value {
            font-size: 0.75rem;
            font-weight: 600;
            color: #1f2937;
            margin-top: 0.25rem;
        }
        
        .insulin-list {
            space-y: 0.75rem;
        }
        
        .insulin-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 0.75rem 0;
            border-bottom: 1px solid #e5e7eb;
        }
        
        .insulin-item:last-child {
            border-bottom: none;
        }
        
        .insulin-rank {
            width: 2rem;
            height: 2rem;
            color: #667eea;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.875rem;
            margin-bottom: 0.5rem;
        }
        
        .insulin-info {
            flex: 1;
        }
        
        .insulin-date {
            display: block;
            font-weight: 500;
            color: #1f2937;
        }
        
        .insulin-amount {
            display: block;
            font-size: 0.875rem;
            color: #6b7280;
        }
        
        .stats-table table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .stats-table th,
        .stats-table td {
            padding: 0.75rem;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }
        
        .stats-table th {
            background: #f9fafb;
            font-weight: 600;
            color: #1f2937;
        }
        
        .stats-table td {
            color: #4b5563;
        }
    </style>
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
                                <li><a href="añadir.php">Añadir Datos</a></li>
                <li><a href="modificar.php">Modificar</a></li>
                                <li><a href="borrar.php">Eliminar</a></li>
                                <li><a href="estadisticas.php" class="active">Estadísticas</a></li>
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
        <div class="stats-container">
            <div class="stats-header">
                <h1 class="stats-title">Estadísticas de Control</h1>
                <p class="stats-subtitle">
                    Análisis detallado de tu control de diabetes
                </p>
            </div>

                <?php
               	include('conexion.php');

                $mes = isset($_GET['mes']) ? $_GET['mes'] : date("m");
                $anio = isset($_GET['anio']) ? $_GET['anio'] : date("Y");

            // Resumen de Episodios
                $query = "SELECT 
                    (SELECT COUNT(*) FROM hipoglucemia WHERE MONTH(fecha) = $mes AND YEAR(fecha) = $anio) AS hipo,
                    (SELECT COUNT(*) FROM hiperglucemia WHERE MONTH(fecha) = $mes AND YEAR(fecha) = $anio) AS hiper";

                $result = $conn->query($query);
                $data = $result->fetch_assoc();
            ?>

            <div class="stats-grid">
                <!-- Resumen de Episodios -->
                <div class="stats-card episodes">
                    <div class="stats-card-header">
                        <div class="stats-card-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2L13.09 8.26L20 9L13.09 9.74L12 16L10.91 9.74L4 9L10.91 8.26L12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="2"/>
                            </svg>
                        </div>
                        <h2 class="stats-card-title">Resumen de Episodios</h2>
                        <p class="stats-card-subtitle">Mes de <?php echo date('F', mktime(0, 0, 0, $mes, 1)); ?> <?php echo $anio; ?></p>
                    </div>
                    <div class="stats-card-body">
                        <div class="episode-item">
                            <div class="episode-icon hipo">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="episode-info">
                                <span class="episode-type">Hipoglucemia</span>
                                <span class="episode-count"><?php echo $data['hipo']; ?> episodios</span>
                            </div>
                        </div>
                        <div class="episode-item">
                            <div class="episode-icon hiper">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="episode-info">
                                <span class="episode-type">Hiperglucemia</span>
                                <span class="episode-count"><?php echo $data['hiper']; ?> episodios</span>
                            </div>
                        </div>
                    </div>
            </div>

                <!-- Promedio de Glucosa por Tipo de Comida -->
                <div class="stats-card food-glucose">
                    <div class="stats-card-header">
                        <div class="stats-card-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 2L3 6V20C3 20.5304 3.21071 21.0391 3.58579 21.4142C3.96086 21.7893 4.46957 22 5 22H19C19.5304 22 20.0391 21.7893 20.4142 21.4142C20.7893 21.0391 21 20.5304 21 20V6L18 2H6Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M3 6H21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M16 10C16 11.1046 15.1046 12 14 12C12.8954 12 12 11.1046 12 10C12 8.89543 12.8954 8 14 8C15.1046 8 16 8.89543 16 10Z" stroke="currentColor" stroke-width="2"/>
                            </svg>
                        </div>
                        <h2 class="stats-card-title">Promedio de Glucosa por Comida</h2>
                        <p class="stats-card-subtitle">Análisis por tipo de comida</p>
                    </div>
                    <div class="stats-card-body">
                        <div class="stats-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Tipo de Comida</th>
                                        <th>Glucosa 1h</th>
                                        <th>Glucosa 2h</th>
                                    </tr>
                                </thead>
                                <tbody>
                <?php
                $query = "SELECT tipo_comida, AVG(gl_1h) AS glucosa_1h, AVG(gl_2h) AS glucosa_2h FROM comida GROUP BY tipo_comida";
                $result = $conn->query($query);

                while ($fila = $result->fetch_assoc()) {
                    echo "<tr>";
                                        echo "<td>" . htmlspecialchars($fila['tipo_comida']) . "</td>";
                                        echo "<td>" . number_format($fila['glucosa_1h'], 1) . " mg/dL</td>";
                                        echo "<td>" . number_format($fila['glucosa_2h'], 1) . " mg/dL</td>";
                    echo "</tr>";
                }
                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>

                <!-- Días con Mayor Insulina -->
                <div class="stats-card insulin-days">
                    <div class="stats-card-header">
                        <div class="stats-card-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2L13.09 8.26L20 9L13.09 9.74L12 16L10.91 9.74L4 9L10.91 8.26L12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="2"/>
                            </svg>
                        </div>
                        <h2 class="stats-card-title">Mayor Administración de Insulina</h2>
                        <p class="stats-card-subtitle">Top 5 días con más insulina</p>
                    </div>
                    <div class="stats-card-body">
                        <div class="insulin-list">
                <?php
                $query = "SELECT fecha, SUM(insulina) AS total_insulina 
                  FROM comida 
                  GROUP BY fecha 
                  ORDER BY total_insulina DESC 
                  LIMIT 5";

                $result = $conn->query($query);
                            $rank = 1;

                while ($fila = $result->fetch_assoc()) {
                                echo "<div class='insulin-item'>";
                                echo "<div class='insulin-rank'>#" . $rank . "</div>";
                                echo "<div class='insulin-info'>";
                                echo "<span class='insulin-date'>" . date("d/m/Y", strtotime($fila['fecha'])) . "</span>";
                                echo "<span class='insulin-amount'>" . $fila['total_insulina'] . " U</span>";
                                echo "</div>";
                                echo "</div>";
                                $rank++;
                            }
                            ?>
                        </div>
                    </div>
            </div>

                <!-- Promedio Mensual -->
                <div class="stats-card monthly-avg">
                    <div class="stats-card-header">
                        <div class="stats-card-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 3V21H21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M9 9L12 6L16 10L20 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <h2 class="stats-card-title">Promedio Mensual de Glucosa</h2>
                        <p class="stats-card-subtitle">Año <?php echo date("Y"); ?></p>
                    </div>
                    <div class="stats-card-body">
                        <div class="monthly-chart">
                <?php
                $anio = date("Y");
                $query = "SELECT MONTH(fecha) AS mes, AVG(gl_1h) AS promedio_glucosa 
                  FROM comida 
                  WHERE YEAR(fecha) = $anio 
                  GROUP BY MONTH(fecha) 
                  ORDER BY mes ASC";

                $result = $conn->query($query);
                            $meses = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"];

                while ($fila = $result->fetch_assoc()) {
                                $mes_nombre = $meses[$fila['mes'] - 1];
                                $promedio = $fila['promedio_glucosa'];
                                $altura = min(100, ($promedio / 200) * 100); // Normalizar a 200 mg/dL como máximo
                                
                                echo "<div class='month-bar'>";
                                echo "<div class='bar-container'>";
                                echo "<div class='bar' style='height: " . $altura . "%'></div>";
                                echo "</div>";
                                echo "<span class='month-label'>" . $mes_nombre . "</span>";
                                echo "<span class='month-value'>" . number_format($promedio, 0) . "</span>";
                                echo "</div>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php $conn->close(); ?>
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

            // Forzar aplicación de estilos después del renderizado
            function applyStatsStyles() {
                // Asegurar que las cards tengan los estilos correctos
                const statsCards = document.querySelectorAll('.stats-card');
                statsCards.forEach(card => {
                    if (!card.style.backgroundColor) {
                        card.style.backgroundColor = 'var(--white)';
                        card.style.borderRadius = 'var(--border-radius-lg)';
                        card.style.boxShadow = 'var(--shadow-md)';
                        card.style.padding = 'var(--spacing-6)';
                        card.style.marginBottom = 'var(--spacing-6)';
                    }
                });

                // Asegurar que los iconos no tengan fondo
                const cardIcons = document.querySelectorAll('.stats-card-icon');
                cardIcons.forEach(icon => {
                    icon.style.background = 'none';
                    icon.style.backgroundColor = 'transparent';
                });

                // Asegurar que el grid tenga el layout correcto
                const statsGrid = document.querySelector('.stats-grid');
                if (statsGrid && !statsGrid.style.display) {
                    statsGrid.style.display = 'grid';
                    statsGrid.style.gridTemplateColumns = 'repeat(2, 1fr)';
                    statsGrid.style.gap = 'var(--spacing-6)';
                }

                // Asegurar que las barras del gráfico tengan estilos
                const bars = document.querySelectorAll('.bar');
                bars.forEach(bar => {
                    if (!bar.style.backgroundColor) {
                        bar.style.backgroundColor = 'var(--primary-500)';
                        bar.style.borderRadius = 'var(--border-radius-sm)';
                        bar.style.transition = 'transform 0.3s ease';
                        bar.style.transformOrigin = 'bottom';
                        bar.style.transform = 'scaleY(0)';
                    }
                });
            }

            // Aplicar estilos inmediatamente
            applyStatsStyles();

            // Aplicar estilos después de un pequeño delay para asegurar renderizado
            setTimeout(applyStatsStyles, 100);

            // Animación de barras del gráfico mensual
            const bars = document.querySelectorAll('.bar');
            bars.forEach((bar, index) => {
                setTimeout(() => {
                    bar.style.transform = 'scaleY(1)';
                }, index * 100 + 200); // Delay adicional para asegurar que los estilos estén aplicados
            });

            // Tooltips para las barras
            const monthBars = document.querySelectorAll('.month-bar');
            monthBars.forEach(bar => {
                bar.addEventListener('mouseenter', function() {
                    this.classList.add('hovered');
                });
                
                bar.addEventListener('mouseleave', function() {
                    this.classList.remove('hovered');
                });
            });

            // Forzar reflow para asegurar que los estilos se apliquen
            document.body.offsetHeight;
        });
    </script>
</body>
</html>
