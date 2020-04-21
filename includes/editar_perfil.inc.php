<?php

    if(isset($_POST['edit-profile-submit'])){

        session_start();

      require 'db.inc.php';

      
        
       $userId = $_GET['id'];
      $userName = $_POST['username'];
      $userAge = $_POST['age'];
      $userPhone = $_POST['phone'];
      $userBornDate = $_POST['born_date'];
      $confirmPassword = $_POST['passwordConfirm'];
    
    
    
        if( empty($confirmPassword)){
            
            header("Location: ../edit_profile.php?error=emptyfieldsPass");
            exit();
        }
        
       
        else {
    
            $sql = 'SELECT * from users where id=?';
            $stmt = mysqli_stmt_init($conn);
        
            if(!mysqli_stmt_prepare($stmt , $sql)){

                header("Location: ../profile.php?error=sqlierror"); 
                exit();
            }
            else {
    
                mysqli_stmt_bind_param($stmt, "s" , $userId );
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $result = mysqli_stmt_num_rows($stmt);



                if($result == 0){
                    header("Location: ../profile.php?passErrada");
                    exit();

                }
                if($userBornDate > date("d/m/Y")) {

                    header("Location: ../profile.php?DateMaiorNow");
                    exit();
                }
                
        
               
                if(!$confirmPassword){
                    header("Location: ../profile.php?passErrada");
                    exit();
                }

            
               
                

                else {

                   

                     $sql = "UPDATE users set username=?, age=?, phone=?, born_date=? where id=?";
                     $stmt = mysqli_stmt_init($conn);
          
                     if(!mysqli_stmt_prepare($stmt , $sql)){
                         header("Location: ../profile.php?eraaaaaror=sqlierror");
                         exit();
                     }
                     else{
                      
         
                         mysqli_stmt_bind_param($stmt, 'sssss', $userName, $userAge, $userPhone,$userBornDate, $userId);
                         mysqli_stmt_execute($stmt);
         
                         header("Location: ../profile.php?edit=success");
                         exit();
                     }

                }
                
            
            }

        }
        
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    
    else{
      
        header("Location: ../index.php?acesso=negado");
        exit();
    }


?>