<?php

$serverName = 'localhost';
$user = 'root';
$password = '';
$dbName = 'elevens';

$conn = mysqli_connect($serverName, $user, $password, $dbName);


if(!$conn){
  die("Erro de conexão : " .mysqli_connect_error()  );
}


 ?>
