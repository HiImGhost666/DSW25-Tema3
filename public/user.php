<?php

use Dsw\Blog\DAO\UserDAO;

require_once '../bootstrap.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die('El id no es válido.');
}

$id = $_GET['id'];

$userDAO = new UserDAO($conn);
$user = $userDAO->get($id);
$titulo = "Detalle de usuario";
include '../includes/header.php';
?>

<?php
    if ($user) {
        printf("<h1>%s: %s</h1>", $user->getId(), $user->getName());
        printf("<h2>%s</h2>", $user->getEmail());
        printf("<h3>%s</h3>", $user->getRegisterDate()->format('d/m/Y'));
        printf("<p><a href=\"edit.php?id=%s\">Editar</a></p>", $user->getId());
        printf("<p><a href=\"delete.php?id=%s\">Borrar</a></p>", $user->getId());
    } else {
        echo "Usuario no encontrado.";
    }
?>
<?php
include '../includes/footer.php';
?>