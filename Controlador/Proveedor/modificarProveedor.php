<?php
require_once '../../Modelo/conexion.php';

$rut_original = $_POST['rut_original'] ?? '';
$rut = $_POST['rut'] ?? '';
$nombre = $_POST['nombre'] ?? '';
$razon_social = $_POST['razon_social'] ?? '';

// Validación básica
if (!$rut_original || !$rut || !$nombre || !$razon_social) {
    echo "Todos los campos son obligatorios.";
    exit;
}

// Si el RUT fue modificado, verificar que no exista otro proveedor con ese RUT
if ($rut_original !== $rut) {
    $stmt = $mysqli->prepare("SELECT rut FROM proveedores WHERE rut = ?");
    $stmt->bind_param("s", $rut);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        echo "El RUT ingresado ya está registrado.";
        exit;
    }
    $stmt->close();
}

// Actualizar proveedor
$stmt = $mysqli->prepare("UPDATE proveedores SET rut = ?, nombre = ?, razon_social = ? WHERE rut = ?");
$stmt->bind_param("ssss", $rut, $nombre, $razon_social, $rut_original);

if ($stmt->execute()) {
    echo "Proveedor modificado correctamente.";
} else {
    echo "Error al modificar el proveedor.";
}
$stmt->close();
$mysqli->close();
?>