<?php



    if(isset($_POST['edit-reservaEvento-submit'])){

        session_start();

      require 'db.inc.php';
      echo "<pre>";
      print_r($_POST);
      echo "</pre>";
      echo "<pre>";
      print_r($_GET);
      echo "</pre>";

      
        
      $userid = $_SESSION['userId'];
     $id = $_GET['id'];
      $name = $_POST['name'];
      $numeroPessoas =  $_POST['n_pessoas'];
      $date =  $_POST['data_reserva'];
      $time = $_POST['time_reserva'];
      $email = $_POST['email'];
      $tele = $_POST['tele'];
      $observacoes= $_POST['observacoes'];
     
    
    
    
        if( empty($name) || empty($numeroPessoas) || empty($date) || empty($time)|| empty($email)|| empty($tele)){
            
            header("Location: ../reservar/editar_reservaEvento.php?error=emptyfields&id0".$id);
            exit();
        }
        

        
        else {
    
            $sql = 'SELECT * from reservas_eventos where id=?';
            $stmt = mysqli_stmt_init($conn);
        
            if(!mysqli_stmt_prepare($stmt , $sql)){

                header("Location: ../reservar/consultarReservas_eventos.php?error=sqlierror"); 
                exit();
            }
            else {
    
                mysqli_stmt_bind_param($stmt, "s" , $id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $result = mysqli_stmt_num_rows($stmt);


               

              
                    
                    
                    $sql = "UPDATE reservas_eventos set client_name=?,number_pessoas=?, date_reserva=?, time_reserva=?,client_email=?, client_phone=? , observacoes=?  where id=?";
                    $stmt = mysqli_stmt_init($conn);
         
                    if(!mysqli_stmt_prepare($stmt , $sql)){
                        header("Location: ../reservar/consultarReservas_eventos.php?eraaaaaror=sqlierror");
                        exit();
                    }
                    else{
                     
        
                        mysqli_stmt_bind_param($stmt, 'ssssssss',  $name, $numeroPessoas, $date,$time,$email,$tele,$observacoes,$id);
                        mysqli_stmt_execute($stmt);
        
                        header("Location: ../reservar/consultarReservas_eventos.php?edit=success");
                        exit();
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