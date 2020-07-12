<?php 
session_start();



if(!isset($_SESSION['userId'])){

  header("Location: autenticar.php?acesso=negado");
  exit();
}
require 'includes/db.inc.php';

$id_user = $_GET['id'];

$sql = "SELECT * FROM users WHERE  id = $id_user";
    $result = mysqli_query( $conn, $sql);
    $resultCheck = mysqli_num_rows($result);


?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Elevens Caffé</title>

        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.12.1/js/all.js" crossorigin="anonymous"></script>
       

        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Great+Vibes&display=swap" rel="stylesheet">

        <!-- Third party plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />

        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="assets/css/styles.css" rel="stylesheet" />

    </head>
    <style>
    body{
    background: -webkit-linear-gradient(left, #D0A24B, brown);
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}

.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}

    </style>

  </head>

  <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
      Editar Perfil
      </a>
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="btn btn-primary text-white"href="index.php">Voltar</a>
          </li>
      </ul>
    </nav> 

    

   

  
  <?php foreach($result as $row) : ?>
    <form action="includes/editar_perfil.inc.php?id=<?php echo $row['id']?>" method="POST" enctype="multipart/form-data"> 
  <div class="container emp-profile">
          

                <div class="row justify-content-center">
                    <div class="col-md-4 align-self-center ">
                        <div class="profile-img">
                        <?php if(($_SESSION['foto_status'] == 'com')) {?>


					<a>
					<img src="includes/showfile.php?user_id=<?php echo $_SESSION['userId'];?>" width="100">
					</a>
					<?php  } ?>

                        <?php if(($_SESSION['foto_status'] == 'sem')) {?>
					<a>
					<img src="assets/img/user.png" alt="" width="100">
					</a>
					<?php  } ?>


                            <div class="file btn btn-lg btn-primary">
                                Editar Foto
                                <input type="file" name="foto" id="foto"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md align-self-center">
                        <div class="profile-head">
                                <h2>
                                <?php echo $row['fname'] . " " .  $row['lname']?>
                                </h2>
                                <h6>
                                <?php echo $row['user_status']?>
                                </h6>
                              <!-- <p class="proile-rating">RANKINGS : <span>8/10</span></p> -->
                        </div>
                    </div>
                </div>
                <div class="row">
                  
                    <div class="col-md">
                     
                        <span><h3>Dados Pessoais</h3></span>
                    <div>
                    </div>
             <div class="row">
                    <div class="col-md-4">
                    <div class="form-group">
                      <label>Primeiro Nome</label>
                      <input name="fname" id="fname" type="text" class="form-control" value="<?php echo $row['fname']?>">
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group">
                      <label>Ultimo Nomne</label>
                      <input name="lname" id="lname" type="text" class="form-control" value="<?php echo $row['lname']?>">
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group">
                      <label>Idade</label>
                      <input name="age" id="age" type="text" class="form-control" value="<?php echo $row['age']?>">
                    </div>
                    </div>

             </div>
             <div class="row">
                    <div class="col-md">
                    <div class="form-group">
                      <label>E-Mail</label>
                      <input name="email" id="email" type="text" class="form-control" value="<?php echo $row['email']?>">
                    </div>
                    </div>
             </div>
             <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                      <label>Contacto telefónico</label>
                      <input name="phone" id="nome" type="text" class="form-control" value="<?php echo $row['phone']?>">
                    </div>
                    </div>

             </div>
             <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Password</label>
                      <input name="passwordConfirm" type="password" class="form-control" placeholder="Insira para poder confirmar a edição">
                    </div>
                    </div>
             </div>
             <div class="row">
             <div class="col-md">
                    <div class="form-group">
                        
                        <button class="btn btn-lg btn-success btn-block" name="edit-profile-submit" id="edit-profile-submit" type="submit">Editar</button>
                    </div>
                    </div>
             </div>

                   
                  </form>
                        </div>
                    </div>
                </div>
            </form>           
        </div>

        <?php endforeach ?>


  <?php foreach($result as $row) : ?>
  <div class="container emp-profile">
          
                <div class="row">
                  
                    <div class="col-md">
                     
                        <span><h3>Palavra Passe</h3></span>
                    <div>
                    </div>
                    <form action="includes/editar_pass.inc.php?id=<?php echo $row['id']?>" method="POST">
             <div class="row">
                    <div class="col-md-4">
                    <div class="form-group">
                      <label>Password Antiga</label>
                      <input name="passwordAntiga" id="passwordAntiga" type="password" class="form-control">
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group">
                      <label>Password Nova</label>
                      <input name="passwordNova" id="passwordNova" type="password" class="form-control" >
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group">
                        <label></label>
                        <button class="btn btn-outline-warning btn-block mt-1" name="edit-password-submit" id="edit-profile-submit" type="submit">Confirmar</button>
                    </div>
                    </div>

             </div>
           

                   
                  </form>
                        </div>
                    </div>
                </div>
            </form>           
        </div>

        <?php endforeach ?>












        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
</body>
</html>