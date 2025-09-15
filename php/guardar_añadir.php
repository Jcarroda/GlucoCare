<?php
require_once('conexion.php');
require_once('autenticacion.php');

$id_usu = $_SESSION['id_usu'];

if (isset($_POST['submit_control'])) {
    $fecha_control = $_POST['fecha_control'];
    $deporte = $_POST['deporte'];
    $lenta = $_POST['lenta'];

    $fecha_obj = new DateTime($fecha_control);
    $año = $fecha_obj->format('Y');
    $mes = $fecha_obj->format('m');

    $dias_en_mes = cal_days_in_month(CAL_GREGORIAN, $mes, $año);

    $sql = "INSERT INTO CONTROL_GLUCOSA (id_usu, fecha, deporte, lenta) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    for ($dia = 1; $dia <= $dias_en_mes; $dia++) {
        $fecha_dia = "$año-$mes-" . str_pad($dia, 2, "0", STR_PAD_LEFT);
        $stmt->bind_param("isii", $id_usu, $fecha_dia, $deporte, $lenta);
        $stmt->execute();
    }

    echo "<script>alert('Datos insertados correctamente para todo el mes'); window.location.href='añadir.php';</script>";
    exit();
}

if (isset($_POST['submit_comida'])) {
    $tipo_comida = $_POST['tipo_comida'];
    $fecha_comida = $_POST['fecha_comida'];
    $gl_1h = $_POST['gl_1h'];
    $gl_2h = $_POST['gl_2h'];
    $raciones = $_POST['raciones'];
    $insulina = $_POST['insulina'];

    $sql = "INSERT INTO COMIDA (id_usu, tipo_comida, fecha, gl_1h, gl_2h, raciones, insulina) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issiiii", $id_usu, $tipo_comida, $fecha_comida, $gl_1h, $gl_2h, $raciones, $insulina);
    if ($stmt->execute()) {
        echo "<script>alert('Datos insertados correctamente'); window.location.href='añadir.php';</script>";
        exit();
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }
}

if (isset($_POST['submit_hipoglucemia'])) {
    $tipo_comida = strtoupper($_POST['tipo_comida_hipo']);
    $fecha = $_POST['fecha_hipo'];
    $glucosa = $_POST['glucosa_hipoglucemia'];
    $hora = $_POST['hora_hipoglucemia'];

    $sql = "INSERT INTO HIPOGLUCEMIA (id_usu, tipo_comida, fecha, glucosa, hora) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issis", $id_usu, $tipo_comida, $fecha, $glucosa, $hora);
    if ($stmt->execute()) {
        echo "<script>alert('Datos insertados correctamente'); window.location.href='añadir.php';</script>";
        exit();
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }
}

if (isset($_POST['submit_hiperglucemia'])) {
    $tipo_comida = strtoupper($_POST['tipo_comida_hiper']);
    $fecha = $_POST['fecha_hiper'];
    $glucosa = $_POST['glucosa_hiperglucemia'];
    $hora = $_POST['hora_hiperglucemia'];
    $correccion = $_POST['correccion'];

    $sql = "INSERT INTO HIPERGLUCEMIA (id_usu, tipo_comida, fecha, glucosa, hora, correccion) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issisi", $id_usu, $tipo_comida, $fecha, $glucosa, $hora, $correccion);
    if ($stmt->execute()) {
        echo "<script>alert('Datos insertados correctamente'); window.location.href='añadir.php';</script>";
        exit();
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }
}

function ejecutarConsulta($stmt, $mensaje) {
    if ($stmt->execute()) {
        echo "$mensaje<br>";
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }
    $stmt->close();
}

$conn->close();
?>
