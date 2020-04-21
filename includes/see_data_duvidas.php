<?php

require 'db.inc.php';

$id = $_SESSION['userId'];


if($_SESSION['userStatus'] == 'admin'){

    $sql = "SELECT * FROM duvidas";
    $result = mysqli_query( $conn, $sql);
    $resultCheck = mysqli_num_rows($result);
}
else{
$sql = "SELECT * FROM duvidas WHERE  id_user = ${id}";
    $result = mysqli_query( $conn, $sql);
    $resultCheck = mysqli_num_rows($result);
}



 





