<?php 

session_start();

include_once "includes/db.inc.php";

 
$sql = "SELECT email FROM mailchimp WHERE email=?";
$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt , $sql)){
    header("Location: index.php?error=sqlerrorMailchimp"); 
    exit();
}
else {

    mysqli_stmt_bind_param($stmt, "s" , $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $result = mysqli_stmt_num_rows($stmt);
    if($result > 0){
        header("Location: email_taken.html");
        exit();
     }
     
}








?>