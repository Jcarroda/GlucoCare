<?php
include('conexion.php');
session_start();
if (!isset($_SESSION['id_usu'])) {
    header("Location: entrada.php");
    exit();
}
$id_usu = $_SESSION['id_usu'];
?>
