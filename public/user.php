<?php
    require_once '../vendor/autoload.php';

use Dsw\Blog\DAO\UserDao;
use Dsw\Blog\Database;
    
    if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
        die("ID de usuario no proporcionado.");
    }

    try{
        $conn = Database::getConnection();
    }catch(PDOException $e){
        die("Error de conexión a la base de datos: " . $e->getMessage());
        exit;
    }

    $id = $_GET['id'];

    $userDAO = new UserDao($conn);
    $user = $userDAO->get($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    if($user){
        echo $user;
    } else{
        die("Usuario no encontrado.");
    }   

    
    ?>
</body>
</html>
    


