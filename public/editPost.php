<?php

use Dsw\Blog\DAO\PostDAO;
use Dsw\Blog\DAO\UserDAO;

require_once '../bootstrap.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die('El id no es válido.');
}

$id = $_GET['id'];

$postDAO = new PostDAO($conn);
$post = $postDAO->get($id);

if (!$post) {
    die('Artículo no existe');
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
    <h1>Editar artículo</h1>
    <form action="updatePost.php?id=<?=$id?>" method="post">
        <input type="hidden" name="user_id" value="<?=$post->getUserId()?>">
        <p>
            <label for="title">Título:</label>
            <input type="text" name="title" id="title" required value="<?=$post->getTitle()?>">
        </p>

        <p>
            <label for="body">Cuerpo:</label>
            <textarea name="body" id="body" required><?=$post->getBody()?></textarea>
        </p>

        <p>
            <label for="user">Usuario:</label>
            <select name="user_id" id="user">
                <?php
                $usersDAO = new UserDAO($conn); // Crear una instancia de UserDAO
                $users = $usersDAO->getAll(); // Obtener todos los usuarios de la base de datos 
                foreach($users as $user){
                    // if($user->getId() === $post->getUserId()){
                    //     printf('<option value="%s" selected>%s</option>', 
                    //     $user->getId(),
                    //     $user->getName()
                    //     );
                    // } else {
                    //     printf('<option value="%s">%s</option>', 
                    //     $user->getId(),
                    //     $user->getName()
                    //     );
                    // }
                    $autor = $user->getId() === $post->getUserId() ? 'selected' : ''; // Operador ternario para determinar si es el autor
                    printf('<option value="%s" %s>%s</option>', 
                    $user->getId(),
                    $autor,
                    $user->getName()
                    );
                }
                ?>
            </select>
        </p>
        <p>
            <button type="submit">Guardar</button>
        </p>
    </form>
</body>
</html>