<?php
session_start();

if($_SESSION['userStatus'] == 'admin'){


    if($_GET['action'] === 'ativar'){
        $action = 'ativo';
    }else {
        $action = 'desativo';
    }

      require 'db.inc.php';

      
        
       $id = $_GET['id'];

    
       
        
       
  
    
            $sql = 'SELECT * from eventos where id=?';
            $stmt = mysqli_stmt_init($conn);
        
            if(!mysqli_stmt_prepare($stmt , $sql)){

                header("Location: ../eventos/consultar_eventos.php?error=sqlierror"); 
                exit();
            }
            else {
    
                mysqli_stmt_bind_param($stmt, "s" , $id );
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $result = mysqli_stmt_num_rows($stmt);

             

                   

                     $sql = "UPDATE eventos set evento_status=? where id=?";
                     $stmt = mysqli_stmt_init($conn);
          
                     if(!mysqli_stmt_prepare($stmt , $sql)){
                         header("Location: ../eventos/consultar_eventos.php?error=sqlierror");
                         exit();
                     }
                     else{
                      
         
                         mysqli_stmt_bind_param($stmt, 'ss', $action, $id);
                         mysqli_stmt_execute($stmt);
         
                         header("Location: ../eventos/consultar_eventos.php?ativar=success");
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
