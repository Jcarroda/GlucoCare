<?php
require_once('conexion.php');
require_once('autenticacion.php');

$id_usu = $_SESSION['id_usu'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo_registro = $_POST['tipo_registro'];

    if ($tipo_registro == "control_glucosa" && isset($_POST['fecha'])) {
        $fecha = $_POST['fecha'];

        $sql = "DELETE FROM CONTROL_GLUCOSA WHERE id_usu=? AND fecha=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $id_usu, $fecha);

        if ($stmt->execute()) {
            echo "Control de Glucosa eliminado correctamente.<br>";
        } else {
            echo "Error al eliminar Control de Glucosa: " . $stmt->error . "<br>";
        }
    }

    if ($tipo_registro == "comida" && isset($_POST['tipo_comida'], $_POST['fecha'])) {
        $tipo_comida = $_POST['tipo_comida'];
        $fecha = $_POST['fecha'];

        $sql = "DELETE FROM COMIDA WHERE id_usu=? AND tipo_comida=? AND fecha=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iss", $id_usu, $tipo_comida, $fecha);

        if ($stmt->execute()) {
            echo "Comida eliminada correctamente.<br>";
        } else {
            echo "Error al eliminar Comida: " . $stmt->error . "<br>";
        }
    }

    if ($tipo_registro == "hipoglucemia" && isset($_POST['tipo_comida'], $_POST['fecha'])) {
        $tipo_comida = $_POST['tipo_comida'];
        $fecha = $_POST['fecha'];

        $sql = "DELETE FROM HIPOGLUCEMIA WHERE id_usu=? AND tipo_comida=? AND fecha=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iss", $id_usu, $tipo_comida, $fecha);

        if ($stmt->execute()) {
            echo "Hipoglucemia eliminada correctamente.<br>";
        } else {
            echo "Error al eliminar Hipoglucemia: " . $stmt->error . "<br>";
        }
    }

    if ($tipo_registro == "hiperglucemia" && isset($_POST['tipo_comida'], $_POST['fecha'])) {
        $tipo_comida = $_POST['tipo_comida'];
        $fecha = $_POST['fecha'];

        $sql = "DELETE FROM HIPERGLUCEMIA WHERE id_usu=? AND tipo_comida=? AND fecha=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iss", $id_usu, $tipo_comida, $fecha);

        if ($stmt->execute()) {
            echo "Hiperglucemia eliminada correctamente.<br>";
        } else {
            echo "Error al eliminar Hiperglucemia: " . $stmt->error . "<br>";
        }
    }
}

$conn->close();
?>