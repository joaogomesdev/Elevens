<?php

    if(isset($_POST['edit-profile-submit'])){

        session_start();

      require 'db.inc.php';

           

            
      $userId = $_GET['id'];
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];

       $userAge = $_POST['age'];
       $userPhone = $_POST['phone'];
       $userBornDate = $_POST['born_date'];
       $confirmPassword = $_POST['passwordConfirm'];
    
    
    
         if( empty($confirmPassword)){
            
             header("Location: ../profile.php?error=emptyfieldsPass");
             exit();
         }
        
       
         else {
    
             $sql = 'SELECT * from users where id=?';
             $stmt = mysqli_stmt_init($conn);
        
             if(!mysqli_stmt_prepare($stmt , $sql)){

                 header("Location: ../profile.php?error=sqlierror"); 
                 exit();
             }

           

             else {
    
                 mysqli_stmt_bind_param($stmt, "s" , $userId );
                 mysqli_stmt_execute($stmt);
                 $result =  mysqli_stmt_get_result($stmt);

         if($row = mysqli_fetch_assoc($result)){//ver se coicidem 

                 $pass = md5($confirmPassword);

           

                 if($pass != $row['password']){
                     header("Location: ../profile.php?passErrada");
                     exit();
                 }

               
                 if($userBornDate > date("d/m/Y")) {

                     header("Location: ../profile.php?DateMaiorNow");
                     exit();
                 }
                


            
               
                

                 else {

                   

                      $sql = "UPDATE users set fname=?, lname=? , age=?, phone=?, born_date=? where id=?";

                      $stmt = mysqli_stmt_init($conn);
          
                      if(!mysqli_stmt_prepare($stmt , $sql)){
                          header("Location: ../profile.php?eraaaaaror=sqlierror");
                          exit();
                      }
                      else{
                      


                          mysqli_stmt_bind_param($stmt, 'ssssss', $fname, $lname, $userAge, $userPhone,$userBornDate, $userId);



                          mysqli_stmt_execute($stmt);

                         
                    
		
                         if($_FILES['foto']['error']===0){
                                
                                 $file_name=$_FILES['foto']['name'];
                                 $file_type=$_FILES['foto']['type'];
                                 $file_size=$_FILES['foto']['size'];
                                 $file_tmp=$_FILES['foto']['tmp_name'];
                                 $data=base64_encode(file_get_contents($file_tmp));

                                 $foto_status = 'com';
                                 $_SESSION['foto_status'] = $foto_status;
                               
                                     $query="UPDATE users set name_img='".$file_name."',type_img='".$file_type."',
                                 size_img=$file_size,data_img='".$data."',  foto_status='".$foto_status."' where id =".$userId."";

                                
                                 $result_up=mysqli_query($conn, $query);
                                 
                             }

                      
         
                             header("Location: ../profile.php?success");
                             exit();
                      }

                 }
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


?>