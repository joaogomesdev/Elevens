<?php



    if(isset($_POST['edit-reserva-submit'])){

        session_start();

      require 'db.inc.php';

      
        
      $userid = $_SESSION['userId'];
      $username = $_SESSION['userName'];
     $id_reserva = $_GET['id'];
      $name = $_POST['name'];
      $numeroPessoas =  $_POST['n_pessoas'];
      $date =  $_POST['data_reserva'];
      $time = $_POST['time_reserva'];
      $categoria = $_POST['categoria'];
      $email = $_POST['email'];
      $tele = $_POST['tele'];
      $observacoes= $_POST['observacoes'];
      $confirmBox = $_POST['confirmBox'];
     
    
    
    
        if( empty($name) || empty($categoria) || empty($date) || empty($time)){
            
            header("Location: consultar_reservas.php?error=emptyfields&");
            exit();
        }
        
        if(empty($confirmBox) ){

            header("Location: ../reservar/menu_reservas.php?noConfirmBox");
            exit();

        }
        
        else {
    
            $sql = 'SELECT * from reservas where id_reserva=?';
            $stmt = mysqli_stmt_init($conn);
        
            if(!mysqli_stmt_prepare($stmt , $sql)){

                header("Location: ../reservar/menu_reservas.php?error=sqlierror"); 
                exit();
            }
            else {
    
                mysqli_stmt_bind_param($stmt, "s" , $_SESSION['userId']);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $result = mysqli_stmt_num_rows($stmt);


                if($result > 0 ){
                    header("Location: consultar_reservas.php?noResult");
                    exit();
                 }

                else{
                    
                    
                    $sql = "UPDATE reservas set client_name=? where id_reserva=?";
                    $stmt = mysqli_stmt_init($conn);
         
                    if(!mysqli_stmt_prepare($stmt , $sql)){
                        header("Location: consultar_reservas.php?eraaaaaror=sqlierror");
                        exit();
                    }
                    else{
                     
        
                        mysqli_stmt_bind_param($stmt, 'sssssssss',  $name, $numeroPessoas, $date,$time,$categoria,$email,$tele,$observacoes,$id_reserva);
                        mysqli_stmt_execute($stmt);
        
                        header("Location: ../reservar/consultar_reservas.php?edit=success");
                        exit();
                    }
                }
            }
        }
        
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    
    else{
      
        header("Location: ../reservar/menu_reservas.php?acesso=negado");
        exit();
    }