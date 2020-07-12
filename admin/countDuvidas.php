<?php

require '../includes/db.inc.php';


if($_SESSION['userStatus'] == 'admin'){

    $sql="select count(*) as total from duvidas";
    $result=mysqli_query($conn,$sql);
    $duvidas=mysqli_fetch_assoc($result);

}



