<?php

$servername = "localhost";
$username = "root";
$password = "";

$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

try {

  $pdo = new PDO("mysql:host=$servername;dbname=b_shop", $username, $password , $options);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {

  echo "Connection failed: " . $e->getMessage();
}