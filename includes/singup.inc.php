<?php

if(isset($_POST['register-submit'])){

  require 'db.inc.php';

  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $rePassword = $_POST['rePassword'];



    if( empty($username) || empty($email)  || empty($password)  || empty($rePassword)  ){
        
        header("Location: ../autenticar.php?emptyfields&username=".$username."&email=".$email."");
        exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL )){
        header("Location: ../autenticar.php?invalidemail&username=".$username."");
        exit();
    }
    else if($password !== $rePassword){
        header("Location: ../autenticar.php?passRepass&username=".$username."&email=".$email."");
        exit();
    }

    else {

        $sql = "SELECT username FROM users WHERE username=? ";
        $stmt = mysqli_stmt_init($conn);
    
        if(!mysqli_stmt_prepare($stmt , $sql)){
            header("Location: ../autenticar.php?error=sqlierror"); 
            exit();
        }
        else {

            mysqli_stmt_bind_param($stmt, "s" , $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $result = mysqli_stmt_num_rows($stmt);
            if($result > 0){
                header("Location: ../autenticar.php?userTakenRegister&email=".$email."");
                exit();
             }
            else{
                $sql = "INSERT INTO users (username, email ,password) VALUES ( ? , ? , ? )";
                $stmt = mysqli_stmt_init($conn);
    
                if(!mysqli_stmt_prepare($stmt , $sql)){
                    header("Location: ../autenticar.php?sqlierror");
                    exit();
                }
                else{
                    $incriptedPwd = password_hash($password, PASSWORD_DEFAULT);
    
                    mysqli_stmt_bind_param($stmt, 'sss', $username, $email, $incriptedPwd);
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


