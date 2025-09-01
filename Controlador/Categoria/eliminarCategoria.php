<?php
require_once '../../Modelo/Conexion.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idCategoria'])) {
    $idCategoria = $_POST['idCategoria'];
    $stmt = $mysqli->prepare("DELETE FROM categorias WHERE idCategoria = ?");
    $stmt->bind_param("s", $idCategoria);
    if ($stmt->execute()) {
        header("Location: ../../Vista/RegistroDeBienes/RegistroDeBienes.php?mensaje=Categoria+eliminada");
        exit();
    } else {
        // Error por restricción de clave foránea
        header("Location: ../../Vista/RegistroDeBienes/RegistroDeBienes.php?error=No+se+puede+eliminar+la+categoría+porque+tiene+productos+registrados");
        exit();
    }
}
header("Location: ../../Vista/RegistroDeBienes/RegistroDeBienes.php");
exit();
?>