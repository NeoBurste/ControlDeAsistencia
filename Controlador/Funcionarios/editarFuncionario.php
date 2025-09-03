<?php

require_once '../../Modelo/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $run_original = trim($_POST['run_original'] ?? '');
    $run = trim($_POST['run'] ?? '');
    $nombre = trim($_POST['nombre'] ?? '');
    $cargo = trim($_POST['cargo'] ?? '');

    if ($run_original && $run && $nombre && $cargo) {
        $stmt = $mysqli->prepare("UPDATE funcionarios SET run = ?, nombre = ?, cargo = ? WHERE run = ?");
        if ($stmt) {
            $stmt->bind_param("ssss", $run, $nombre, $cargo, $run_original);
            if ($stmt->execute()) {
                echo "Funcionario modificado correctamente.";
            } else {
                echo "Error al modificar funcionario: " .$stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error en la preparacion de la consulta: " . $mysqli->error;
        }
    } else {
        echo "Todods los campos son obligatorios";
    }
} else {
    echo "Metodo de solicitud no valido.";
}

?>