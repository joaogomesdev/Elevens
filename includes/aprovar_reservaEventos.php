<?php
session_start();

if($_SESSION['userStatus'] == 'admin'){


      require 'db.inc.php';

      
        
       $Id = $_GET['id'];
       $mudar = 'aprovada';
    
       
        
       
  
    
            $sql = 'SELECT * from reservas_eventos where id=?';
            $stmt = mysqli_stmt_init($conn);
        
            if(!mysqli_stmt_prepare($stmt , $sql)){

                header("Location: ../admin/users.php?error=sqlierror"); 
                exit();
            }
            else {
    
                mysqli_stmt_bind_param($stmt, "s" , $Id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $result = mysqli_stmt_num_rows($stmt);

             

                   

                     $sql = "UPDATE reservas_eventos set status=? where id=?";
                     $stmt = mysqli_stmt_init($conn);
          
                     if(!mysqli_stmt_prepare($stmt , $sql)){
                         header("Location: ../reservar/consultarReservas_eventos.php?error=sqlierroraaaa");
                         exit();
                     }
                     else{
                      
         
                         mysqli_stmt_bind_param($stmt, 'ss', $mudar, $Id);
                         mysqli_stmt_execute($stmt);
         
                         header("Location: ../reservar/consultarReservas_eventos.php?ativar=success");
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
