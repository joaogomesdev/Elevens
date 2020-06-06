<?php

if(isset($_POST['register-submit'])){

  require 'db.inc.php';

  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $rePassword = $_POST['rePassword'];
  $foto_status = 'sem';



    if( empty($fname) || empty($lname) || empty($email)  || empty($password)  || empty($rePassword)  ){
        
        header("Location: ../autenticar.php?emptyfields&username=".$fname.$lname."&email=".$email."");
        exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL )){
        header("Location: ../autenticar.php?invalidemail&username=".$fname.$lname."");
        exit();
    }
    else if($password !== $rePassword){
        header("Location: ../autenticar.php?passRepass&username=".$fname.$lname."&email=".$email."");
        exit();
    }

    else {

        $sql = "SELECT email FROM users WHERE email=?";
        $stmt = mysqli_stmt_init($conn);
    
        if(!mysqli_stmt_prepare($stmt , $sql)){
            header("Location: ../autenticar.php?error=sqlierroraaaa"); 
            exit();
        }
        else {

            mysqli_stmt_bind_param($stmt, "s" , $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $result = mysqli_stmt_num_rows($stmt);
            if($result > 0){
                header("Location: ../autenticar.php?userTakenRegister&email=".$email."");
                exit();
             }
            else{
                $sql = "INSERT INTO users (fname,lname , email ,password, foto_status) VALUES ( ? , ? , ? , ? , ?)";
                $stmt = mysqli_stmt_init($conn);
    
                if(!mysqli_stmt_prepare($stmt , $sql)){
                    header("Location: ../autenticar.php?sqlierror");
                    exit();
                }
                else{
                    $incriptedPwd = md5($password);
    
                    mysqli_stmt_bind_param($stmt, 'sssss', $fname, $lname , $email, $incriptedPwd, $foto_status);
                    mysqli_stmt_execute($stmt);
    
                    header("Location: ../autenticar.php?RegisterSuccess");
                    exit();
                }
            }
        }
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

else{
    header("Location: ../autenticar.php");
    exit();
}


