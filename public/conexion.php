<?php
use Dotenv\Dotenv;

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
        printf("<p>%s</p>", $e->getMessage());
        die();
    }
?>