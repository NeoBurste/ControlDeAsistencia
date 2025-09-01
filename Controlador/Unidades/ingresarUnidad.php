<?php
require_once '../../Modelo/Conexion.php';

//Obtener datos del formulario
$codigo = trim($_POST['codigo'] ?? '');
$run = trim($_POST['run'] ?? '');
$nombre = trim($_POST['nombre'] ?? '');
$telefono = trim($_POST['telefono'] ?? '');
$correo = trim($_POST['correo_electronico'] ?? '');

//ingresar a la base de datos
$stmt = $mysqli->prepare("INSERT INTO unidad (codigo, run, nombre, telefono, correo_electronico) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $codigo, $run, $nombre, $telefono, $correo);

if($stmt->execute()) {
    echo 'Unidad Ingresada correctamente.';
} else {
    echo "Error al ingresar la unidad: " . $mysqli->error;
}

$stmt->close();
$mysqli->close();