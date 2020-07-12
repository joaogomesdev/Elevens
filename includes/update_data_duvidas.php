<?php



    if(isset($_POST['edit-duvida-submit'])){

        session_start();

      require '../includes/db.inc.php';

      
        
      $userid = $_SESSION['userId'];
      $username = $_SESSION['userName'];
     $id_duvidaP = $_GET['id'];
      $tituloP = $_POST['titulo'];
      $categoriaP =  $_POST['categoria'];
      $descricaoP =  $_POST['descricao'];
      $confirmBox = $_POST['confirmBox'];
    
    
    
        if( empty($tituloP) || empty($categoriaP) || empty($descricaoP)){
            
            header("Location: menu_duvidas.php?error=emptyfields&");
            exit();
        }
        
        if(empty($confirmBox) ){

            header("Location: ../help/consultar_duvida.php?noConfirmBox");
            exit();

        }
        
        else {
    
            $sql = 'SELECT * from duvidas where id_duvida=?';
            $stmt = mysqli_stmt_init($conn);
        
            if(!mysqli_stmt_prepare($stmt , $sql)){

                header("Location: menu_duvidas.php?error=sqlierror"); 
                exit();
            }
            else {
    
                mysqli_stmt_bind_param($stmt, "s" , $_SESSION['userId']);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $result = mysqli_stmt_num_rows($stmt);


                if($password > 0 ){
                    header("Location: .colocar_duvida.php?error=duvidaTaken");
                    exit();
                 }

                else{
                    $id_descricao=$row['id_duvida'];
                    $tituloBD=$row['titulo'];
                    $categoriaBD=$row['categoria'];
                    $descricaoBD=$row['descricao'];
                    
                    $sql = "UPDATE duvidas set titulo=?, categoria=?, descricao=? where id_duvida=?";
                    $stmt = mysqli_stmt_init($conn);
         
                    if(!mysqli_stmt_prepare($stmt , $sql)){
                        header("Location: menu_duvidas.php?eraaaaaror=sqlierror");
                        exit();
                    }
                    else{
                     
        
                        mysqli_stmt_bind_param($stmt, 'ssss',  $tituloP, $categoriaP, $descricaoP,$id_duvidaP);
                        mysqli_stmt_execute($stmt);
        
                        header("Location: ../help/consultar_duvida.php?edit=success");
                        exit();
                    }
                }
            }
        }
        
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    
    else{
      
        header("Location: ../help/consultar_duvida.php?acesso=negado");
        exit();
    }