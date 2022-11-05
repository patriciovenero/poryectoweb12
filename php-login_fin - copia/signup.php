<?php 
    require 'database.php';

    $message = '';

    if (!empty($_POST['email']) && !empty($_POST['password'])){
        $sql = "INSERT INTO php_login_database (email, password) VALUES (:email, :password)";
        $stmt = $bd->prepare($sql);
        $stmt->bindParam(':email',$_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT); 
        $stmt->bindParam(':password',$password);
        
        if($stmt->execute()){
            $message = 'Usuario creado satisfactoriamente';
        } else {
            $message = 'Lo sentimos ocurrio un error al crear su contraseña';
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/CSS/estilo_sign.css">
</head>
    <body>
        <?php require 'partials/header.php' ?>
        
        <?php if(!empty($message)):?>
            <p><?= $message ?></p>
        <?php endif;?>
        <div class="signcaj">
        <h1>REGISTRARSE</h1>
        <span>or <a id="enlace" href="login.php">Login</a></span>

        <form id="line-text" action="signup.php" method="post">
            <input type="text" name="email" placeholder="Ingrese su email">
            <input type="password" name="password" placeholder="Ingrese su contraseña">
            <input type="password" name="confirm_password" placeholder="Confirme su contraseña"><br>
            <input type="submit" value="Send">
        </form>
        </div>
    </body>
</html>