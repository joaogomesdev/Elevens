<?php
session_start();

if($_SESSION['userStatus'] == 'admin'){


      require 'db.inc.php';

      
        
       $Id_reserva = $_GET['id'];
       $mudar = 'cancelada';
    
       
        
       
  
    
            $sql = 'SELECT * from reservas where id_reserva=?';
            $stmt = mysqli_stmt_init($conn);
        
            if(!mysqli_stmt_prepare($stmt , $sql)){

                header("Location: ../admin/users.php?error=sqlierror"); 
                exit();
            }
            else {
    
                mysqli_stmt_bind_param($stmt, "s" , $Id_reserva);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $result = mysqli_stmt_num_rows($stmt);

             

                   

                     $sql = "UPDATE reservas set status=? where id_reserva=?";
                     $stmt = mysqli_stmt_init($conn);
          
                     if(!mysqli_stmt_prepare($stmt , $sql)){
                         header("Location: ../reservar/menu_reserva.php?error=sqlierroraaaa");
                         exit();
                     }
                     else{
                      
         
                         mysqli_stmt_bind_param($stmt, 'ss', $mudar, $Id_reserva);
                         mysqli_stmt_execute($stmt);
         
                         header("Location: ../reservar/consultar_reservas.php?ativar=success");
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
