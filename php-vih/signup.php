<?php

  require 'database.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $GLOBALS['conn']->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);
    if ($stmt->execute()) {
      $message = 'Usuario creado exitoxamente';
    } else {
      $message = 'Lo sentimos, debe haber habido un problema al crear su cuenta';
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registrate</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/Style.css">
  </head>
  <body>

    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
    <div class="team-box">
      <img src="assets/CSS/profile3.png" alt="">
    <h1>Registrarse</h1>
    <span>o <a href="login.php">iniciar sesión</a></span>

    <form action="signup.php" method="POST">
      <input name="nombre" type="text" placeholder="ingresa tu nombre">
      <input name="apellido" type="text" placeholder="ingresa tu apellido">
      <input name="email" type="text" placeholder="ingresa tu email">
      <input name="password" type="password" placeholder="ingresa una contraseña">
      <input name="confirm_password" type="password" placeholder="confirma tu contraseña">
      <input type="submit" value="enviar">
      </div>
    </form>

  </body>
</html>
