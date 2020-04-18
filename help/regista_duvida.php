<?php


    if(isset($_POST['colocar-duvida-submit'])){

        session_start();

      require '../includes/db.inc.php';

      
        
      $userid = $_SESSION['userId'];
      $titulo = $_POST['titulo'];
      $categoria =  $_POST['categoria'];
      $descricao =  $_POST['descricao'];
    
    
    
        if( empty($titulo) || empty($categoria) || empty($descricao)){
            
            header("Location: menu_duvidas.php?error=emptyfields&");
            exit();
        }
    
        else {
    
            $sql = "SELECT 	userId, titulo  FROM duvidas WHERE userId=? and titulo=? ";
            $stmt = mysqli_stmt_init($conn);
        
            if(!mysqli_stmt_prepare($stmt , $sql)){

                header("Location: menu_duvidas.php?error=sqlierror"); 
                exit();
            }
            else {
    
                mysqli_stmt_bind_param($stmt, "ss" , $userid, $titulo);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $result = mysqli_stmt_num_rows($stmt);

                if($result > 0){
                    header("Location: ../index.php?error=duvidaTaken");
                    exit();
                 }

                else{
                    $sql = "INSERT INTO duvidas (userid, titulo ,categoria, descricao) VALUES ( ? , ? , ? ,?)";
                    $stmt = mysqli_stmt_init($conn);
        
                    if(!mysqli_stmt_prepare($stmt , $sql)){
                        header("Location: menu_duvidas.php?eraaaaaror=sqlierror");
                        exit();
                    }
                    else{
                     
        
                        mysqli_stmt_bind_param($stmt, 'ssss',  $userid, $titulo, $categoria , $descricao);
                        mysqli_stmt_execute($stmt);
        
                        header("Location: consultar_duvida.php?registo=success");
                        exit();
                    }
                }
            }
        }
        
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    
    else{
        header("Location:   /index.php");
        exit();
    }
    