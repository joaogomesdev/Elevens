<?php

    if(isset($_POST['edit-password-submit'])){

        session_start();

      require 'db.inc.php';

      
        
       $userId = $_GET['id'];
      $passAntinga = $_POST['passwordAntiga'];
      $passNova = $_POST['passwordNova'];
   
    
    
    
        if( empty($passAntinga) || empty($passNova)){
            
            header("Location: ../profile.php?error=emptyfieldsPass");
            exit();
        }
        
       
        else {
    
            $sql = 'SELECT password from users where id=?';
            $stmt = mysqli_stmt_init($conn);
        
            if(!mysqli_stmt_prepare($stmt , $sql)){

                header("Location: ../profile.php?error=sqlierror"); 
                exit();
            }

           

            else {
    
                mysqli_stmt_bind_param($stmt, "s" , $userId );
                mysqli_stmt_execute($stmt);
                $result =  mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($result)){///ver se coicidem 
            
           
                $pass = md5($passAntinga);
               
                if($pass != $row['password']){
                    header("Location: ../profile.php?passErrada");
                    exit();
                }

            
                else {
                            $incriptedNew = md5($passNova);
                   

                     $sql = "UPDATE users set password=? where id=?";
                     $stmt = mysqli_stmt_init($conn);
          
                     if(!mysqli_stmt_prepare($stmt , $sql)){
                         header("Location: ../profile.php?eraaaaaror=sqlierror");
                         exit();
                     }
                     else{
                      
         
                         mysqli_stmt_bind_param($stmt, 'ss',$incriptedNew, $userId);
                         mysqli_stmt_execute($stmt);
         
                         header("Location: ../profile.php?edit=success");
                         exit();
                     }

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