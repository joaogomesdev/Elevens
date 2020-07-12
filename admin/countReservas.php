<?php

require '../includes/db.inc.php';


if($_SESSION['userStatus'] == 'admin'){

    $sql="select count(*) as total from reservas";
    $result=mysqli_query($conn,$sql);
    $reservas=mysqli_fetch_assoc($result);

}



