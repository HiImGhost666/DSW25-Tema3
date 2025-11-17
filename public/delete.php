<?php

use Dotenv\Dotenv;
    //Borrar esta mierda porque muestra todo y no es seguro

    require_once '../vendor/autoload.php';

    // Leer variables de entorno

    $dotenv = Dotenv::createImmutable(__DIR__ . '/..');
    $dotenv->safeLoad();
    
    $host = $_ENV['DB_HOST'];
    $db = $_ENV['DB_NAME'];
    $user = $_ENV['DB_USER'];
    $password = $_ENV['DB_PASS'];
    $charset = $_ENV['DB_CHARSET'];


    //Hacer la conexión a la BD.
    
    // Data Source Name (DSN)
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => FALSE,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];
    try{
        $pdo = new PDO($dsn, $user, $password, $options);
    } catch(PDOException $e){
        echo "<h1>Error en la conexión</h1>";
        printf("<p>$s</p>", $e->getMessage());
        die();
    }
    
    //    echo "Conexión existosa";


    // Consulta SQL o manipulacion de la base de datos

    if(isset($_GET['id'])){
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $_GET['id']]);
    }
    header('Location: selectall.php');
    exit();