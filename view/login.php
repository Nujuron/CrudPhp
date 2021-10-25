<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sesiones</title>

    <link rel="stylesheet" href="main.css">
</head>
<body>
    <form action="" method="POST">
        <?php
            if(isset($errorLogin)){
                echo $errorLogin;
            }
        ?>
        <h2>Iniciar sesión</h2>
        <label>Nombre de usuario<input type="text" name="username" required></label>
        <label>Contraseña<input type="password" name="password" required></label>
        <p class="center"><input type="submit" value="Iniciar Sesión"></p>
    </form>
</body>
</html>