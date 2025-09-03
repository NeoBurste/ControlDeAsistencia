<?php
require_once '../../Modelo/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $run = trim($_POST['run'] ?? '');

    if($run) {
        $stmt = $mysqli->prepare("DELETE FROM funcionarios WHERE run = ?");
        if($stmt) {
            $stmt->bind_param("s", $run);
            if ($stmt->execute()) {
                echo "Funcionario eliminado correctamente";
            } else {
                echo "Error al eliminar funcionario: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error en la preparacion de la consulta: " . $mysqli->error;
        }
    } else {
        echo "RUN no proporcionado.";
    }
} else{
    echo "Metodo de solicitud no valido.";
}

?>