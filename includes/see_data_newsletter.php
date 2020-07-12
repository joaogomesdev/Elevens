<?php

require 'db.inc.php';

$id = $_SESSION['userId'];


if($_SESSION['userStatus'] == 'admin'){

    $sql = "SELECT * FROM mailchimp";
    $result = mysqli_query( $conn, $sql);
    $resultCheck = mysqli_num_rows($result);

}




 





