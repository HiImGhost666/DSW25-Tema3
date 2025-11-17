<?php
    require_once 'vendor/autoload.php';
    require_once 'public/conexion.php';
    if(isset($argv[1])){
        try{
        $sql = file_get_contents($argv[1]); // Leer el contenido del archivo SQL
        $pdo->exec($sql);
        
    } catch (Exception $e){
        die("Error al ejecutar la migración: " . $e->getMessage()); // die() es como el exit() pero muestra un mensaje
    }
    } else{
        echo "Falta el nombre del archivo de migración.";
    }
    
    
    
?>