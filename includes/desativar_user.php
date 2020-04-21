<?php
session_start();

if($_SESSION['userStatus'] == 'admin'){


      require 'db.inc.php';

      
        
       $userId = $_GET['id'];
       $desativar = 'desativado';
    
       
        
       
  
    
            $sql = 'SELECT * from users where id=?';
            $stmt = mysqli_stmt_init($conn);
        
            if(!mysqli_stmt_prepare($stmt , $sql)){

                header("Location: ../admin/users.php?error=sqlierror"); 
                exit();
            }
            else {
    
                mysqli_stmt_bind_param($stmt, "s" , $userId );
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $result = mysqli_stmt_num_rows($stmt);

             

                   

                     $sql = "UPDATE users set acount_status=? where id=?";
                     $stmt = mysqli_stmt_init($conn);
          
                     if(!mysqli_stmt_prepare($stmt , $sql)){
                         header("Location: ../admin/users.php?error=sqlierror");
                         exit();
                     }
                     else{
                      
         
                         mysqli_stmt_bind_param($stmt, 'ss', $desativar, $userId);
                         mysqli_stmt_execute($stmt);
         
                         header("Location: ../admin/users.php?ativar=success");
                         exit();
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
