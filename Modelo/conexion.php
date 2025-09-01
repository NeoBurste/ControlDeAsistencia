<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'control_de_asistencia';

// Crear conexión segura con MySQLi
$mysqli = new mysqli($host, $user, $password, $database);

// Verificar la conexión
if ($mysqli->connect_error) {
    die('Error de conexión (' . $mysqli->connect_errno . '): ' . $mysqli->connect_error);
}

// establecer el conjunto de caracteres a utf8mb4
$mysqli->set_charset('utf8mb4');
?>