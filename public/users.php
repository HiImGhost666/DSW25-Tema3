<?php
require_once '../vendor/autoload.php';

use Dsw\Blog\DAO\UserDAO;
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

$userDAO = new UserDAO($conn);
$user = $userDAO->get($id);


?>