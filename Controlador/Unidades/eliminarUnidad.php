<?php
require_once '../../Modelo/Conexion.php';

$idUnidad = intval($_POST['idUnidad'] ?? 0);

if($idUnidad <= 0){
    echo "ID invalido";
    exit;
}

$stmt = $mysqli->prepare("DELETE FROM unidad WHERE idUnidad = ?");
$stmt->bind_param("i", $idUnidad);

if($stmt->execute()){
    echo "Unidad Eliminada correctamente";
} else {
    echo "Error al eliminar la unidad";
}

$stmt->close();
$mysqli->close();