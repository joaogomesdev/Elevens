<?php

session_start();

if( !isset($_SESSION['authenticated']) || $_SESSION['authenticated'] != 'SIM'){
  
  header('Location: index.php?login=erro2');

}



?>