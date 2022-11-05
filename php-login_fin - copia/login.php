<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/CSS/estilo_log.css">
    </head>
    <body>
        
        <?php require 'partials/header.php' ?>
        <div class="logincaj">
        <h1>INICIAR SESION</h1>
        <span>o sino:   <a id="enlace" href="signup.php">registrarse</a></span>

        <form id="line-text" action="index12.php" method="post">
            <input type="text" name="email" placeholder="Ingrese su email">
            <input type="password" name="password" placeholder="Ingrese su contraseña"><BR>
            <input type="submit" value="Send" onclick="" >
        </form>
        </div>
    </body>
</html>
