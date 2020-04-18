<?php

if(isset($_POST['login-submit'])){

    require 'db.inc.php';

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];



    if(empty($email)  || empty($password)){
        
        header("Location: ../autenticar.php?error=emptyfiels");
        exit();
    }
    else{
        $sql = "SELECT * FROM users WHERE username=? OR email=?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt , $sql)){

            header("Location: ../autenticar.php?error=sqlierror"); 
            exit();

        }
        else{

            mysqli_stmt_bind_param($stmt, "ss" , $email, $email);
            mysqli_stmt_execute($stmt);
            $result =  mysqli_stmt_get_result($stmt);
           

            if($row = mysqli_fetch_assoc($result)){///ver se coicidem 

                $pwdCheck = password_verify($password, $row['password']);// ve se as pwd sao iguais
               
                if($pwdCheck == false){
                    header("Location: ../autenticar.php?error=passErrada");
                    exit();
                }

                else if($pwdCheck == true){

                        session_start();
                        $_SESSION['userId'] = $row['id'];
                        $_SESSION['userName'] = $row['username'];
                        $_SESSION['userEmail'] = $row['mail'];
                        $_SESSION['userStatus'] = $row['user_status'];

                        header('Location:  ../index.php?login=sucess');
                        exit();

                }

                else{
                     header("Location: ../autenticar.php?error=passErrada");
                     exit();
                 }

             }
             else{
                header("Location: ../autenticar.php?error=noUser");
                exit();
             }


             
        }
    }
   
}
else{
    header("Location: ../autenticar.php");
    exit();
}