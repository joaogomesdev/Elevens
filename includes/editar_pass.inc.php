<?php

    if(isset($_POST['edit-password-submit'])){

        session_start();

      require 'db.inc.php';

      
        
       $userId = $_GET['id'];
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
    
    
    
     
        
       
    
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



             
            
        
               
                

            
               
                

                // else {

                   

                //      $sql = "UPDATE users set username=?, age=?, phone=?, born_date=? where id=?";
                //      $stmt = mysqli_stmt_init($conn);
          
                //      if(!mysqli_stmt_prepare($stmt , $sql)){
                //          header("Location: ../profile.php?eraaaaaror=sqlierror");
                //          exit();
                //      }
                //      else{
                      
         
                //          mysqli_stmt_bind_param($stmt, 'sssss', $userName, $userAge, $userPhone,$userBornDate, $userId);
                //          mysqli_stmt_execute($stmt);
         
                //          header("Location: ../profile.php?edit=success");
                //          exit();
                //      }

                // }
                
            
            }
            
            mysqli_stmt_close($stmt);
            mysqli_close($conn);

        }
    
    
    else{
      
        header("Location: ../index.php?acesso=negado");
        exit();
    }


?>