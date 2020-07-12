<?php

if(isset($_GET['delete']) == 'sim'){

    require 'db.inc.php';

    $id = $_GET['id'];
 

        $sql = "DELETE FROM opinioes WHERE id=?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt , $sql)){

            header("Location: ../autenticar.php?error=sqlierror"); 
            exit();

        }
        else{

            mysqli_stmt_bind_param($stmt, "s" , $id);
            $result = mysqli_stmt_execute($stmt);
            mysqli_stmt_get_result($stmt);

            if($result){
                header("Location: ../opiniao/consultarOpiniao.php?update=success");
                exit();
               
            }
            else{
                 header("Location: ../opiniao/consultarOpiniao.php?update=error");
                exit();
            }
           
            
        
    }
   
}
else{
    header("Location: ../help/consultar_duvida.php?acesso=negado");
    exit();
}
