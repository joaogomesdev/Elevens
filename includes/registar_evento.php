
<?php



    if(isset($_POST['registar-evento'])){

        session_start();

      require './db.inc.php';

      
            $title = $_POST['titulo'];
           $date = $_POST['date'];
           $hora = $_POST['hora'];
           $descricao = $_POST['descricao'];
        
            echo "<pre>";
            print_r($_POST);
            print_r($_FILES);
            echo "</pre>";
    
         if( empty($title) && empty($date) && empty($title) && empty($hora) && empty($descricao) && empty($_FILES)){
            
             header("Location: ../add_evento.php?error=emptyfields");
             exit();
         }
    
        else {
    
            $sql = "SELECT 	title  FROM eventos WHERE title=?  ";
            $stmt = mysqli_stmt_init($conn);
        
            if(!mysqli_stmt_prepare($stmt , $sql)){

                header("Location: menu_duvidas.php?error=sqlierror"); 
                exit();
            }
            else {
    
                mysqli_stmt_bind_param($stmt, "s" , $title);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $result = mysqli_stmt_num_rows($stmt);
             
                if($result > 0){
                    header("Location: .colocar_duvida.php?error=duvidaTaken");
                    exit();
                 }

                else{
                    if($_FILES['foto']['error']==0){
                                
                        $file_name=$_FILES['foto']['name'];
                        $file_type=$_FILES['foto']['type'];
                        $file_size=$_FILES['foto']['size'];
                        $file_tmp=$_FILES['foto']['tmp_name'];  
                        $file_data=base64_encode(file_get_contents($file_tmp));

                    }
                      
                   $sql = "INSERT INTO eventos ( title, data , hora, descricao , type_img , name_img , size_img , data_img) VALUES (?,?,?,?,?,?,?,?)";
                    $stmt = mysqli_stmt_init($conn);
        
                    if(!mysqli_stmt_prepare($stmt , $sql)){
                        header("Location: menu_duvidas.php?eraaaaaror=sqlierror");
                        exit();
                    }
                    else{
                     
        
                        mysqli_stmt_bind_param($stmt, 'ssssssss',  $title , $date , $hora , $descricao , $file_type , $file_name , $file_size , $file_data  );
                        mysqli_stmt_execute($stmt);
        
                        header("Location: ../index.php?registo=success");
                        exit();
                    }
                }
            }
        }
        
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    
    else{
        header("Location:  ../eventos/add_evento.php");
        exit();
    }
    