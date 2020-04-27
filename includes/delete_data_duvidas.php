<?php

if(isset($_GET['delete']) == 'sim'){

    require 'db.inc.php';

    $id_duvida = $_GET['id'];
 

        $sql = "DELETE FROM duvidas WHERE id_duvida=?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt , $sql)){

            header("Location: ../autenticar.php?error=sqlierror"); 
            exit();

        }
        else{

            mysqli_stmt_bind_param($stmt, "s" , $id_duvida);
            $result = mysqli_stmt_execute($stmt);
            mysqli_stmt_get_result($stmt);

            if($result){
                header("Location: ../help/consultar_duvida.php?update=success&id=$id_duvida");
                exit();
               
            }
            else{
                 header("Location: ../help/consultar_duvida.php?update=error&id=$id_duvida");
                exit();
            }
           
            
        
    }
   
}
else{
    header("Location: ../help/consultar_duvida.php?acesso=negado");
    exit();
}
