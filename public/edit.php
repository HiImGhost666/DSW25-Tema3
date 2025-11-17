<?php
require_once '../vendor/autoload.php';
require_once 'conexion.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT id,name,email FROM users WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        
        $user = $stmt->fetch();

        if(!isset($_GET['id']) || !$user){
            echo "<h1>Usuario no encontrado</h1>";
            exit();
        }   
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Formulario para modificar el usuario con ID = <?php echo $id; ?></h1>

    <form action="update.php" method="post">
        <input type="hidde n" name="id" value="<?= $id ?>">
        <p>
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" required value="<?= $user['name'] ?>">
        </p>
        <p>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required value="<?= $user['email'] ?>">
        </p>
        
        <button type="submit">Editar Usuario</button>
    </form>
</body>
</html>