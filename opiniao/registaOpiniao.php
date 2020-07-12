<?php



    if(isset($_POST['dar-opiniao'])){

        session_start();

      require '../includes/db.inc.php';

      
        
      $userid = $_SESSION['userId'];
      $username = $_SESSION['fname'] . " " .$_SESSION['lname'];
      $opiniao = $_POST['opiniao'];
      
    
    
    
        if( empty($opiniao)){
            
            header("Location: darOpiniao.php?emptyfields");
            exit();
        }
    
        else {
    
        
              
                    $sql = "INSERT INTO opinioes (id_client, username, opiniao) VALUES ( ?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
        
                    if(!mysqli_stmt_prepare($stmt , $sql)){
                        header("Location: darOpiniao.php?eraaaaaror=sqlierror");
                        exit();
                    }
                    else{
                     
        
                        mysqli_stmt_bind_param($stmt, 'sss',  $userid, $username, $opiniao);
                        mysqli_stmt_execute($stmt);
        
                        header("Location: consultarOpiniao.php?registo=success");
                        exit();
                    }
                
            
        }
        
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    
    else{
        header("Location:   darOpiniao.php");
        exit();
    }
    