<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Formulario para crear un usuario</h1>

    <form action="store.php" method="post">
        <p>
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" required>
        </p>
        <p>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        </p>
        <button type="submit">Crear Usuario</button>
    </form>
</body>
</html>