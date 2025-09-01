<?php
require_once '../../Modelo/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rut = trim($_POST['rut'] ?? '');

    if ($rut) {
        $stmt = $mysqli->prepare("DELETE FROM proveedores WHERE rut = ?");
        if ($stmt) {
            $stmt->bind_param("s", $rut);
            if ($stmt->execute()) {
                echo "Proveedor eliminado correctamente.";
            } else {
                echo "Error al eliminar proveedor: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error en la preparación de la consulta: " . $mysqli->error;
        }
    } else {
        echo "RUT no proporcionado.";
    }
} else {
    echo "Método de solicitud no válido.";
}
?>
