<?php

//Crear un usuario
require_once '../vendor/autoload.php';
require_once 'conexion.php';

// Consulta SQL o manipulacion de la base de datos

$sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
$stmt = $pdo->prepare($sql);


$stmt->execute([
    'name' => $_POST['name'],
    'email' => $_POST['email']
]);
header('Location: selectall.php');
exit();
?>