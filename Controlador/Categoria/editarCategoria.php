<?php
require_once '../../Modelo/Conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idCategoria'], $_POST['nombreCategoria'])) {
    $idCategoria = (int)$_POST['idCategoria'];
    $nombreCategoria = $_POST['nombreCategoria'];
    $stmt = $mysqli->prepare("UPDATE categorias SET nombreCategoria = ? WHERE idCategoria = ?");
    $stmt->bind_param("si", $nombreCategoria, $idCategoria);
    $stmt->execute();
}
header("Location: ../../Vista/RegistroDeBienes/RegistroDeBienes.php");
exit();
?>