<?php


    if(isset($_POST['reservar-mesa-submit'])){

        session_start();

      require '../includes/db.inc.php';

      
        
      $userId = $_SESSION['userId'];
      $clientName = $_POST['name'];
      $nPessoas = $_POST['n_pessoas'];
      $date = $_POST['data_reserva'];
      $time = $_POST['time_reserva'];
      $categoria = $_POST['categoria'];
      $clientEmail = $_POST['email'];
      $clientPhone = $_POST['tele'];
      $observacoes = $_POST['observacoes'];
    
    
    
        if( empty($clientName) || empty($date) || empty($time) || empty($categoria) || empty($clientEmail) || empty($clientPhone) ){
            
            header("Location: reservar.php?emptyfields");
            exit();
        }
    
        else {
    
            $sql = "SELECT 	*  FROM reservas WHERE  id_client=? ";
            $stmt = mysqli_stmt_init($conn);
        
            if(!mysqli_stmt_prepare($stmt , $sql)){

                header("Location: menu_reservas.php?error=sqlierror"); 
                exit();
            }
            else {
    
                mysqli_stmt_bind_param($stmt, "s" , $userId);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $result = mysqli_stmt_num_rows($stmt);

              

              
                    $sql = "INSERT INTO reservas (id_client, client_name ,number_pessoas, date_reserva, time_reserva, categoria, client_email, client_phone, observacoes) VALUES ( ? , ? , ? , ? ,?, ? ,? ,?, ?)";
                    $stmt = mysqli_stmt_init($conn);
        
                    if(!mysqli_stmt_prepare($stmt , $sql)){
                        header("Location: menu_reservas.php?eraaaaaror=sqlierror");
                        exit();
                    }
                    else{
                     
        
                        mysqli_stmt_bind_param($stmt, 'sssssssss',$userId, $clientName,$nPessoas, $date, $time, $categoria, $clientEmail,   $clientPhone, $observacoes );
                        mysqli_stmt_execute($stmt);
        
                        header("Location: consultar_reservas.php?");
                        exit();
                    }
                
            }
        }
        
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    
    else{
        header("Location:   menu_reservas.php");
        exit();
    }
    