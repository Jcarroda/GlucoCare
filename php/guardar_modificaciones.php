<?php
require_once('conexion.php');
require_once('autenticacion.php');

$id_usu = $_SESSION['id_usu'];

if (isset($_POST['submit_control'])) {
    $fecha_control = $_POST['fecha_control'];
    $deporte = $_POST['deporte'];
    $lenta = $_POST['lenta'];

    $sql = "UPDATE CONTROL_GLUCOSA SET deporte=?, lenta=? WHERE id_usu=? AND fecha=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiis", $deporte, $lenta, $id_usu, $fecha_control);
    if ($stmt->execute()) {
        echo "<script>alert('Datos modificados correctamente'); window.location.href='modificar.php';</script>";
        exit();
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }
}

if (isset($_POST['submit_comida'])) {
    $tipo_comida = $_POST['tipo_comida'];
    $fecha_comida = $_POST['fecha_comida'];
    $gl_1h = $_POST['gl_1h'];
    $gl_2h = $_POST['gl_2h'];
    $raciones = $_POST['raciones'];
    $insulina = $_POST['insulina'];

    $sql = "UPDATE COMIDA SET gl_1h=?, gl_2h=?, raciones=?, insulina=? WHERE id_usu=? AND tipo_comida=? AND fecha=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiiiiss", $gl_1h, $gl_2h, $raciones, $insulina, $id_usu, $tipo_comida, $fecha_comida);
    if ($stmt->execute()) {
        echo "<script>alert('Datos modificados correctamente'); window.location.href='modificar.php';</script>";
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

    $sql = "UPDATE HIPOGLUCEMIA SET glucosa=?, hora=? WHERE id_usu=? AND tipo_comida=? AND fecha=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isiss", $glucosa, $hora, $id_usu, $tipo_comida, $fecha);
    
    if ($stmt->execute()) {
        echo "<script>alert('Datos modificados correctamente'); window.location.href='modificar.php';</script>";
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

    $sql = "UPDATE HIPERGLUCEMIA SET glucosa=?, hora=?, correccion=? WHERE id_usu=? AND tipo_comida=? AND fecha=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isisss", $glucosa, $hora, $correccion, $id_usu, $tipo_comida, $fecha);
    
    if ($stmt->execute()) {
        echo "<script>alert('Datos modificados correctamente'); window.location.href='modificar.php';</script>";
    exit();
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }
}   

$conn->close();

?>