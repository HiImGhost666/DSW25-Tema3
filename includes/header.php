<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Mi Blog</h1>

        <?php
        if ($user) {
            printf('<p>Bienvenido, %s | <a href="logout.php">Cerrar sesión</a></p>', $user->getName());
        } else {
            echo '<p><a href="login.php">Iniciar sesión</a></p>';
        }
        ?>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="users.php">Usuarios</a></li>
                <li><a href="posts.php">Artículos</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <h1><?= $titulo ?></h1>
    <div id="container">

    </div>
</body>
</html>