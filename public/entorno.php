<?php

use Dotenv\Dotenv;
    //Borrar esta mierda porque muestra todo y no es seguro

    require_once '../vendor/autoload.php';

    $dotenv = Dotenv::createImmutable(__DIR__ . '/..');
    $dotenv->safeLoad();
    
    echo "<pre>";
    print_r($_ENV);
    echo "</pre>";
    printf('Base de datos: %s', $_ENV['DB_NAME']);
?>