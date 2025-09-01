<?php
require_once '../../Modelo/Conexion.php';

if (isset($_POST['idProducto'])) {
    $idProducto = $_POST['idProducto'];

    // Elimina el producto
    $stmt = $mysqli->prepare("DELETE FROM productos WHERE idProducto = ?");
    $stmt->bind_param("s", $idProducto);

    if ($stmt->execute()) {
        header("Location: ../../Vista/RegistroDeBienes/RegistroDeBienes.php");
        exit();
    } else {
        header("Location: ../../Vista/RegistroDeBienes/RegistroDeBienes.php?error=No se pudo eliminar el producto.");
        exit();
    }
} else {
    header("Location: ../../Vista/RegistroDeBienes/RegistroDeBienes.php?error=ID de producto no válido.");
    exit();
}