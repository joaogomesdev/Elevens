<?php

require '../includes/db.inc.php';


if($_SESSION['userStatus'] == 'admin'){

    $sql="select count(*) as total from mailchimp";
    $result=mysqli_query($conn,$sql);
    $mail=mysqli_fetch_assoc($result);

}



