<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /php-VIH/');
  }
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $message = '';
    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /php-VIH");
    } else {
      $message = 'Lo sentimos no encontramos su correo o constraseña, intentelo nuevamente';
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inicio se seción</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    
    <?php require 'partials/header.php' ?>
    <div class="team-box">
      <img src="assets/CSS/profile3.png" alt="">

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Iniciar sesion</h1>
    <span>o <a href="signup.php">Registrate</a></span>

    <form action="login.php" method="POST">
      <input name="email" type="text" placeholder="Ingresa tu correo">
      <input name="password" type="password" placeholder="ingresa tu contraseña">
      <input type="submit" value="Enviar">
    </div>
    <p>Invita: </p>
    <a href="https://campusvirtual.unac.edu.co/"><img src="assets/css/Unac.png">
    </form>
  </body>
</html>


