<?php
require_once '../../Modelo/Conexion.php';

$idUnidad = intval($_POST['idUnidad']);
$codigo = trim($_POST['codigo']);
$run = trim($_POST['run']);
$nombre = trim($_POST['nombre']);
$telefono = trim($_POST['telefono']);
$correo = trim($_POST['correo_electronico']);

if($idUnidad <=0 || $codigo ==='' || $run === '' || $nombre === ''){
    echo "Todos los campos son obligatorios.";
    exit;
}

$stmt = $mysqli->prepare("UPDATE unidad SET codigo=?, run=?, nombre=?, telefono=?, correo_electronico=? WHERE idUnidad=?");
$stmt->bind_param("sssssi", $codigo, $run, $nombre, $telefono, $correo, $idUnidad);

if($stmt->execute()){
    echo "Unidad modificada exitosamente.";
} else {
    echo "Error al modificar la unidad: ". $mysqli->error;
}

$stmt->close();
$mysqli->close();