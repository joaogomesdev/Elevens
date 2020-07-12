<?php



    if(isset($_POST['editar-evento'])){

        session_start();

      require 'db.inc.php';

      echo"<pre>";
      print_r($_POST);
      print_r($_FILES);
      echo"</pre>";
        
      $id = $_GET['id'];
      $titulo = $_POST['titulo'];
      $date =  $_POST['date'];
      $date =  $_POST['date'];
      $hora = $_POST['hora'];
      $descricao = $_POST['descricao'];
    
     
        
      

                   

            $sql = "UPDATE eventos set title=?, data=? , hora=?, descricao=? where id=?";

            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt , $sql)){
                header("Location: ../eventos/consultar_eventos.php?eraaaaaror=sqlierror?id=".$id);
                exit();
            }
            else{
            


                mysqli_stmt_bind_param($stmt, 'sssss', $titulo, $date, $hora, $descricao, $id);



                mysqli_stmt_execute($stmt);

               
          

               if($_FILES['foto']['error']==0){
                      
                       $file_name=$_FILES['foto']['name'];
                       $file_type=$_FILES['foto']['type'];
                       $file_size=$_FILES['foto']['size'];
                       $file_tmp=$_FILES['foto']['tmp_name'];
                       $data=base64_encode(file_get_contents($file_tmp));

                       $foto_status = 'com';
                       $_SESSION['foto_status'] = $foto_status;
                     
                           $query="UPDATE eventos set name_img='".$file_name."',type_img='".$file_type."',
                       size_img=$file_size,data_img='".$data."' where id =".$id."";
                          $_SESSION['foto_status'] = "com";
                      
                       $result_up=mysqli_query($conn, $query);
                       
                   }

            

                   header("Location: ../eventos/consultar_eventos.php?success");
                   exit();
            }

       
        
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    
    else{
      
        header("Location: ../index.php?acesso=negado");
        exit();
    }