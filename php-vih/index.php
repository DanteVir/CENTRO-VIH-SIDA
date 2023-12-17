<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>VIH CENTRO INFORMATIVO</title>
    <link rel ="stylesheet" href="Style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/Style.css">
  </head>
  <body>
    
    <?php require 'partials/header.php' ?>

    <?php if(!empty($user)): ?>
      <div class="team-box">
        <img src="assets/CSS/profile4.png" alt="">

     
      <br> Bienvenido. <?= $user['email']; ?>
      <br>Has iniciado sesión correctamente
      <a href="index1.html"> <p>Click para continuar</p>
      <a href="logout.php"> <p>Click para salir</p>
      </a>
      </div>
    
    <?php else: ?>  
      <h1>EL VIH</h1>
      <div class="team-box">
        <img src="assets/CSS/profile3.png" alt="">
        <br>  ___________________________________________________________________________________________________________ <a>
        <br>  Sabias que de 33,9 millones a 43,8 millones promedio de personas vivían con el VIH en todo el mundo en 2021. </a>
        <br>  si buscas sanar solo basta con creer una fuerza mayor <a>
        <br>  ___________________________________________________________________________________________________________ <a>
        <br>   <a>
        <a href="login.php">Iniciar sesión</a> o
        <a href="signup.php">Registrarse</a>
      </div>
    <?php endif; ?>
    
  </body>
</html>
