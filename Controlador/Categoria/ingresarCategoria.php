<?php
require_once '../../Modelo/conexion.php'; // Ajusta la ruta si es necesario

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idCategoria = isset($_POST['idCategoria']) ? trim($_POST['idCategoria']) : '';
    $nombreCategoria = isset($_POST['nombreCategoria']) ? trim($_POST['nombreCategoria']) : '';

    if ($idCategoria !== '' && $nombreCategoria !== '') {
        $stmt = $mysqli->prepare("INSERT INTO categorias (nombreCategoria, idCategoria) VALUES (?, ?)");
        $stmt->bind_param("ss", $nombreCategoria, $idCategoria);

        if ($stmt->execute()) {
            // Redirige con mensaje de éxito
            header("Location: ../../Vista/RegistroDeBienes/RegistroDeBienes.php?mensaje=Categoria+agregada");
            exit();
        } else {
            // Redirige con mensaje de error
            header("Location: ../../Vista/RegistroDeBienes/RegistroDeBienes.php?error=Error+al+agregar+la+categoría");
            exit();
        }
        $stmt->close();
    } else {
        // Redirige si faltan datos
        header("Location: ../../Vista/RegistroDeBienes/RegistroDeBienes.php?error=Faltan+datos");
        exit();
    }
} else {
    // Acceso no permitido
    header("Location: ../../Vista/RegistroDeBienes/RegistroDeBienes.php");
    exit();
}