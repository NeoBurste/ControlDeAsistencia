<?php
require_once '../../Modelo/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idProducto = isset($_POST['idProducto']) ? trim($_POST['idProducto']) : '';
    $nombreProducto = isset($_POST['nombreProducto']) ? trim($_POST['nombreProducto']) : '';
    $descripcion = isset($_POST['descripcion']) ? trim($_POST['descripcion']) : '';
    $idCategoria = isset($_POST['idCategoria']) ? trim($_POST['idCategoria']) : '';

    if ($idProducto !== '' && $nombreProducto !== '' && $descripcion !== '' && $idCategoria !== '') {
        $stmt = $mysqli->prepare("INSERT INTO productos (idProducto, nombreProducto, descripcion, idCategoria) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $idProducto, $nombreProducto, $descripcion, $idCategoria);

        if ($stmt->execute()) {
            header("Location: ../../Vista/RegistroDeBienes/RegistroDeBienes.php?mensaje=Producto+agregado");
            exit();
        } else {
            header("Location: ../../Vista/RegistroDeBienes/RegistroDeBienes.php?error=Error+al+agregar+el+producto");
            exit();
        }
        $stmt->close();
    } else {
        header("Location: ../../Vista/RegistroDeBienes/RegistroDeBienes.php?error=Faltan+datos");
        exit();
    }
} else {
    header("Location: ../../Vista/RegistroDeBienes/RegistroDeBienes.php");
    exit();
}
?>