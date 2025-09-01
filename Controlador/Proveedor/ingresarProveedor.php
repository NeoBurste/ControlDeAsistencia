<?php
header('Content-Type: application/json');
require_once '../../Modelo/conexion.php';

$rut = $_POST['rut'];
$nombre = $_POST['nombre'];
$razon_social = $_POST['razon_social'];

// Verifica si el RUT ya existe
$stmt = $mysqli->prepare("SELECT rut FROM proveedores WHERE rut = ?");
$stmt->bind_param("s", $rut);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo 'El RUT ingresado ya existe.';
    exit;
}
$stmt->close();

// Inserta el proveedor
$stmt = $mysqli->prepare("INSERT INTO proveedores (rut, nombre, razon_social) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $rut, $nombre, $razon_social);

if ($stmt->execute()) {
    echo "Proveedor agregado correctamente.";
} else {
    echo json_encode(['success' => false, 'message' => 'Error al agregar el proveedor.']);
}
$stmt->close();
$mysqli->close();