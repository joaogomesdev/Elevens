<?php

    if(isset($_POST['edit-profile-submit'])){

        session_start();

      require 'db.inc.php';

           

            
        $userId = $_GET['id'];
<<<<<<< HEAD
       $fname = $_POST['fname'];
       $lname = $_POST['lname'];
=======
       $userName = $_POST['username'];
>>>>>>> 810a2f6492e6956709cb0754306c54b7b3306e0e
       $userAge = $_POST['age'];
       $userPhone = $_POST['phone'];
       $userBornDate = $_POST['born_date'];
       $confirmPassword = $_POST['passwordConfirm'];
       $profileImg = $_POST['profile_image'];
    
    
    
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

                 if($result == 0){
                     header("Location: ../profile.php?passErrada");
                     exit();

                 }
                 if($userBornDate > date("d/m/Y")) {

                     header("Location: ../profile.php?DateMaiorNow");
                     exit();
                 }
                
                
        
               
                 if(!$confirmPassword){
                     header("Location: ../profile.php?passErrada");
                     exit();
                 }

            
               
                

                 else {

                   

<<<<<<< HEAD
                      $sql = "UPDATE users set fname=?, lname=? , age=?, phone=?, born_date=? where id=?";
=======
                      $sql = "UPDATE users set username=?, age=?, phone=?, born_date=? where id=?";
>>>>>>> 810a2f6492e6956709cb0754306c54b7b3306e0e
                      $stmt = mysqli_stmt_init($conn);
          
                      if(!mysqli_stmt_prepare($stmt , $sql)){
                          header("Location: ../profile.php?eraaaaaror=sqlierror");
                          exit();
                      }
                      else{
                      

<<<<<<< HEAD
                          mysqli_stmt_bind_param($stmt, 'ssssss', $fname, $lname, $userAge, $userPhone,$userBornDate, $userId);
=======
                          mysqli_stmt_bind_param($stmt, 'sssss', $userName, $userAge, $userPhone,$userBornDate, $userId);
>>>>>>> 810a2f6492e6956709cb0754306c54b7b3306e0e
                          mysqli_stmt_execute($stmt);

                         
                    
		
                         if($_FILES['foto']['error']==0){
                                
                                 $file_name=$_FILES['foto']['name'];
                                 $file_type=$_FILES['foto']['type'];
                                 $file_size=$_FILES['foto']['size'];
                                 $file_tmp=$_FILES['foto']['tmp_name'];
                                 $data=base64_encode(file_get_contents($file_tmp));
<<<<<<< HEAD
                                 $foto_status = 'com';
                                 $_SESSION['foto_status'] = $foto_status;
                               
                                     $query="UPDATE users set name_img='".$file_name."',type_img='".$file_type."',
                                 size_img=$file_size,data_img='".$data."',  foto_status='".$foto_status."' where id  =".$userId."";
=======
                               
                                     $query="UPDATE users set name_img='".$file_name."',type_img='".$file_type."',
                                 size_img=$file_size,data_img='".$data."' where id  =".$userId."";
>>>>>>> 810a2f6492e6956709cb0754306c54b7b3306e0e
                                
                                 $result_up=mysqli_query($conn, $query);
                                 
                             }

                      
         
                          header("Location: ../profile.php?edit=success");
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