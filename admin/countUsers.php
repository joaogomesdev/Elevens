<?php

require '../includes/db.inc.php';


if($_SESSION['userStatus'] == 'admin'){

    $sql="select count(*) as total from users";
    $result=mysqli_query($conn,$sql);
    $users=mysqli_fetch_assoc($result);
    
}



