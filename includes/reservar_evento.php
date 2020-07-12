<?php


    if(isset($_POST['reservar-mesa-evento'])){

        session_start();

      require '../includes/db.inc.php';

    //   echo"<pre>";
    //   print_r($_POST);
    //   echo"</pre>";

    //   echo"<pre>";
    //   print_r($_GET);
    //   echo"</pre>";
        
      $id_client = $_SESSION['userId'];
      $id_evento = $_GET['id'];
      $client_name = $_POST['name'];
      $event_name = $_GET['title'];
      $nPessoas = $_POST['n_pessoas'];
      $date = $_POST['data_reserva'];
      $time = $_POST['time_reserva'];
      $clientEmail = $_POST['email'];
      $clientPhone = $_POST['tele'];
      $observacoes = $_POST['observacoes'];
   
    
    
        if( empty($id_client) || empty($id_evento) ||  empty($client_name) || empty($event_name) || empty($nPessoas) || empty($date) || empty($time) || empty($clientEmail) || empty($clientPhone)  ){
            
            header("Location: ../eventos/reservarEvento.php?emptyfields&id=".$id_evento);
            exit();
        }
    
        else {
    
            $sql = "SELECT *  FROM reservas_eventos WHERE  id_client=? and id_evento=? ";
            $stmt = mysqli_stmt_init($conn);
        
            if(!mysqli_stmt_prepare($stmt , $sql)){

                header("Location: ../eventos/reservarEvento.php?error=sqlierror1&id=".$id_evento); 
                exit();
            }
            else {
    
                mysqli_stmt_bind_param($stmt, "ss" , $id_client, $id_evento);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $result = mysqli_stmt_num_rows($stmt);

                if($result > 0){
                    header("Location: ../eventos/reservarEvento.php?Taken&id=".$id_evento);
                    exit();
                 }

                 else {
                    $sql = "INSERT INTO reservas_eventos (id_client, id_evento, client_name ,number_pessoas, date_reserva, time_reserva, nome_evento, client_email, client_phone, observacoes) VALUES ( ? , ? , ? , ? ,?, ? ,? ,?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
        
                    if(!mysqli_stmt_prepare($stmt , $sql)){
                        header("Location: menu_reservas.php?eraaaaaror=sqlierrorInsert&id=".$id_evento);
                        exit();
                    }
                    else{
                     
        
                        mysqli_stmt_bind_param($stmt, 'ssssssssss',$id_client,$id_evento, $client_name,$nPessoas, $date, $time, $event_name, $clientEmail,   $clientPhone, $observacoes );
                        mysqli_stmt_execute($stmt);
        
                        header("Location: ../reservar/consultarReservas_eventos.php?registo=success");
                        exit();
                    }
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
    