<?php

if (isset($_POST['reset-pass-submit'])) {

  $selector = $_POST['selector'];
  $validator = $_POST['validator'];
  $password = $_POST['password'];
  $rePassword = $_POST['re_password'];

  if(empty($password)  || empty($rePassword)){
        
    header("Location: ../index.php?error=emptyfiels");
    exit();
  }else if($password != $rePassword){

    header("Location: ../index.php?error=passNotSame");
    exit();
  }

  $currentDate = date('U');

  require "db.inc.php";

  $sql = "SELECT * FROM pass_reset WHERE passResetSelector=?  AND 	passResetExpires >= ?";
  $stmt= mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt, $sql)){

      echo "Error";
      exit();

  } else{
      mysqli_stmt_bind_param($stmt, 'ss' , $selector , $currentDate);
      mysqli_stmt_execute($stmt);

      $result = mysqli_stmt_get_result($stmt);
      if(!$row = mysqli_fetch_assoc($result)){

          echo "Erro, Tente Novamente";
          exit();

      } else{

            $tokenBin = hex2bin($validator);
            $tokenCkeck = password_verify($tokenBin , $row['passResetToken']);

            if($tokenCkeck == false){
                echo "Erro, Tente Novamente";
                exit();
            }else if($tokenCkeck == true){

                $tokenEmail = $ow['passResetEmail'];

                $sql ="SELECT * FROM users WHERE email=?";
                $stmt= mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
              
                    echo "Error";
                    exit();
              
                } else{
                    mysqli_stmt_bind_param($stmt, "s" , $tokenEmail);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    if(!$row = mysqli_fetch_assoc($result)){
              
                        echo "Error";
                        exit();
              
                    } else{

                        $sql = "UPDATE users SET passwurd=? WHERE email=?";
                        $stmt= mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
              
                    echo "Error";
                    exit();
              
                } else{

                    $newPwdHash =  password_hash($password, PASSWORD_DEFAULT);
                    
                    mysqli_stmt_bind_param($stmt, "ss" , $newPwdHash, $tokenEmail);
                    mysqli_stmt_execute($stmt);

                    $sql = "DELETE FROM pass_reset WHERE passResetEmail=?";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        echo "Error";
                        exit();

                    }else {
                        mysqli_stmt_bind_param($stmt, "s" , $tokenEmail);
                        mysqli_stmt_execute($stmt);
                        header('Location: ../index.php?newpwd=passwordupdated');
                    }
                }


                }
                }

            }

      }






  }

} else{

    header("Location: ../index.php?erro=");
}
