<?php

use Dsw\Blog\DAO\UserDAO;

require_once '../bootstrap.php';


if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST['name']) && isset($_POST['password'])) {
    $userDAO = new UserDAO($conn);
    $user = $userDAO->login($_POST['name'], $_POST['password']);

    if ($user) {
        $_SESSION['user_id'] = $user->getId();
        $_SESSION['user_name'] = $user->getName();

        header('Location: index.php');
        exit();
    } else {
        $error = "Error de inicio de sesión: credenciales inválidas.";
    }


    
}

$titulo = "Login";
    include '../includes/header.php';

if (isset($error)) {
    printf('<p class ="error">%s</p>', $error);
}
?>


<form action="login.php" method="post">
    <p>
        <input type="text" name="name" placeholder="Nombre de usuario" required>
    </p>
    <p>
        <input type="password" name="password" placeholder="Contraseña" required>
    </p>

    <p>
        <input type="submit" value="Iniciar sesión">
    </p>
</form>

<?php
    include '../includes/footer.php';
?>