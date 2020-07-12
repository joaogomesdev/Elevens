<?php 

session_start();

    
    require 'includes/db.inc.php';

    $id_user = $_SESSION['userId'];


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
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
.tab-content{
  margin-top: -15%;
}
    </style>

  </head>

  <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
     Perfil
      </a>
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="btn btn-primary text-white"href="index.php">Voltar</a>
          </li>
      </ul>
    </nav> 

        <?php if(  isset($_GET['passErrada']) ) : ?>

        <div class="container emp-profile">
      
            <div class="alert alert-danger d-flex justify-content-center"r role="alert">
                
            <h3>Palavra-passe errada <span class="badge badge-secondary bg-danger">:(</span></h3>
                
            </div>

        </div>


<?php endif ?>

<?php if(  isset($_GET['DateMaiorNow']) ) : ?>

<div class="container emp-profile">

    <div class="alert alert-danger d-flex justify-content-center"r role="alert">
        
    <h3>Palavra-passe errada <span class="badge badge-secondary bg-danger">:(</span></h3>
        
    </div>

</div>


<?php endif ?>

<?php if(  isset($_GET['success']) ) : ?>

<div class="container emp-profile">

    <div class="alert alert-success d-flex justify-content-center"r role="alert">
        
    <h3>Dados editados com sucesso <span class="badge badge-secondary bg-success">:)</span></h3>
        
    </div>

</div>


<?php endif ?>


<?php if(  isset($_GET['emptyfieldsPass']) ) : ?>

<div class="container emp-profile">

    <div class="alert alert-danger d-flex justify-content-center"r role="alert">
        
    <h3>Insira a password para confirmar a edição<span class="badge badge-secondary bg-sdanger">!</span></h3>
        
    </div>

</div>


<?php endif ?>
    
    <div class="container emp-profile">
        <?php foreach($result as $row) : ?>
            <form method="post">
                <div class="row">
               
                    <div class="col-md-4">

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
                            <?php echo $row['fname'] . " " .$row['lname']?>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                    <?php echo $row['fname'] . " " .$row['lname']?>
                                    </h5>
                                    <h6>
                                    <?php echo $row['user_status']?>
                                    </h6>
                                    <!-- <p class="proile-rating">RANKINGS : <span>8/10</span></p> -->
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a type="submit" href="edit_profile.php?id=<?php echo $_SESSION['userId']?>" class="profile-edit-btn btn btn-primary text-white" name="btnAddMore" >Editar</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">

                        </div>
                    </div>
                    <div class="col-md-8">
                      <div class="tab-content profile-tab" id="myTabContent">
                        <span><h3>Dados Pessoais</h3></span>
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-6">
                                            <?php echo $row['id']?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nome</label>
                                            </div>
                                            <div class="col-md-6">
                                            <p><?php echo $row['fname'] . " " . $row['lname']?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                            <p><?php echo $row['email']?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Contacto Telefónico</label>
                                               
                                            </div>
                                            <div class="col-md-6">
                                            <p><?php echo $row['phone']?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Data de Criação da Conta</label>
                                            </div>
                                            <div class="col-md-6">
                                            <p><?php echo $row['created_at']?></p>
                                            </div>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
              
            </form>           
            <?php endforeach ?> 
        </div>












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