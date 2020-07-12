<?php

require '../includes/db.inc.php';


if($_SESSION['userStatus'] == 'admin'){

    $sql="select count(*) as total from eventos";
    $result=mysqli_query($conn,$sql);
    $eventos=mysqli_fetch_assoc($result);

}



