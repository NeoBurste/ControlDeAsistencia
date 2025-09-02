<?php

require_once '../../Modelo/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $run = trim($_POST['run'] ?? '');
    $nombre = trim($_POST['nombre'] ?? '');
    $cargo = trim($_POST['cargo'] ?? '');

    if ($run && $nombre && $cargo) {
        $stmt = $mysqli->prepare("INSERT INTO funcionarios (run, nombre, cargo) VALUES (?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("sss", $run, $nombre, $cargo);
            if ($stmt->execute()) {
                echo "Funcionario agregado correctamente.";
            } else {
                echo "Error al agregar funcionario: ". $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error en la preparacion de la consulta: ". $mysqli->error;
        }
    } else {
        echo "Todos los campos son obligatorios.";
    }
} else {
    echo "Metodo de solicitud no valido.";
}

?>