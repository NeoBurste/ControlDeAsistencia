<?php
require_once '../../Modelo/Conexion.php';
if (isset($_POST['idProducto'], $_POST['nombreProducto'], $_POST['descripcion'], $_POST['idCategoria'])) {
    $id = $mysqli->real_escape_string($_POST['idProducto']);
    $nombre = $mysqli->real_escape_string($_POST['nombreProducto']);
    $desc = $mysqli->real_escape_string($_POST['descripcion']);
    $cat = $mysqli->real_escape_string($_POST['idCategoria']);
    $mysqli->query("UPDATE productos SET nombreProducto='$nombre', descripcion='$desc', idCategoria='$cat' WHERE idProducto='$id'");
}
header('Location: ../../Vista/RegistroDeBienes/RegistroDeBienes.php');
exit;