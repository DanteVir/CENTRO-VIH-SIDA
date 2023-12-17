<?php
   $server = "localhost";
   $username = "root";
   $password ="";
   $database = "php_vih_database";
try{
    $conn = new PDO("mysql:host=$server;dbname=$database;",$username, $password);
    global $conn;
} catch (PDOException $e) {
    die('Conexion fallida: '.$e->getMessage());
}
?>