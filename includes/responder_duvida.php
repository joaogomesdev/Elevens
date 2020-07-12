<?php
session_start();

if($_SESSION['userStatus'] == 'admin'){

   
    if($_GET['action'] === 'responder'){
        $action = $_POST['typeResponse'];
    }else {
        $action = 'desativada';
    }

      require 'db.inc.php';
       
    //   echo"<pre>";
    //   print_r($_POST);
    //   echo"</pre>";

    //   echo"<pre>";
    //   print_r($_GET);
    //   echo"</pre>";
    $resposta = "Respondido por: " . $_POST['typeResponse'];
    $obs = $_POST['obs'];
    $user = $_POST['user'];
    $duvida = $_POST['duvida'];
    
    
            $sql = 'SELECT id_duvida ,id_user  from duvidas where id_duvida=? and id_user =?';
            $stmt = mysqli_stmt_init($conn);
        
            if(!mysqli_stmt_prepare($stmt , $sql)){

                header("Location: ../admin/index.php?error=sqlierroraaaaa"); 
                exit();
            }
            else {
    
                mysqli_stmt_bind_param($stmt, "ss" , $duvida , $user);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $result = mysqli_stmt_num_rows($stmt);

             

                   

                     $sql = "UPDATE duvidas set duvida_status=? where id_duvida=?";
                     $stmt = mysqli_stmt_init($conn);
          
                     if(!mysqli_stmt_prepare($stmt , $sql)){
                         header("Location: ../admin/index.php?error=sqlierror");
                         exit();
                     }
                     else{
                      
         
                         mysqli_stmt_bind_param($stmt, 'ss', $resposta, $duvida);
                         mysqli_stmt_execute($stmt);
         
                         header("Location: ../admin/index.php?ativar=success");
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
