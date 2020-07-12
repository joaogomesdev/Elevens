<?php



    if(isset($_POST['edit-opiniao-submit'])){

        session_start();

      require '../includes/db.inc.php';

      
        
      $id = $_GET['id'];
      $opiniao = $_POST['opiniao'];
    
    
    
    
        
        
        if(empty($opiniao) ){

            header("Location: ../help/menu_duvidas.php?vazio");
            exit();

        }
        
        else {
    
            $sql = 'SELECT * from opinioes where id=?';
            $stmt = mysqli_stmt_init($conn);
        
            if(!mysqli_stmt_prepare($stmt , $sql)){

                header("Location: ../opiniao/menuOpiniao.php?error=sqlierror"); 
                exit();
            }
            else {
    
                mysqli_stmt_bind_param($stmt, "s" , $id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $result = mysqli_stmt_num_rows($stmt);


               

                   
                    
                    $sql = "UPDATE opinioes set opiniao=? where id=?";
                    $stmt = mysqli_stmt_init($conn);
         
                    if(!mysqli_stmt_prepare($stmt , $sql)){
                        header("Location: ../opiniao/menuOpiniao.php?eraaaaaror=sqlierror");
                        exit();
                    }
                    else{
                     
        
                        mysqli_stmt_bind_param($stmt, 'ss',  $opiniao, $id);
                        mysqli_stmt_execute($stmt);
        
                        header("Location: ../opiniao/consultarOpiniao.php?edit=success");
                        exit();
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