<?php

session_start();

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
        <link href="../assets/css/styles.css" rel="stylesheet" />
    <style>

body {
    background: lightblue  no-repeat fixed center;
}

.card-counter{
  box-shadow: 2px 2px 10px #DADADA;
  margin: 5px;
  padding: 20px 10px;
  background-color: #fff;
  height: 100px;
  border-radius: 5px;
  transition: .3s linear all;
}

.card-counter:hover{
  box-shadow: 4px 4px 20px #DADADA;
  transition: .3s linear all;
}

.card-counter.primary{
  background-color: #007bff;
  color: #FFF;
}

.card-counter.danger{
  background-color: #ef5350;
  color: #FFF;
}  

.card-counter.success{
  background-color: #66bb6a;
  color: #FFF;
}  

.card-counter.info{
  background-color: #26c6da;
  color: #FFF;
}  

.card-counter i{
  font-size: 5em;
  opacity: 0.2;
}

.card-counter .count-numbers{
  position: absolute;
  right: 35px;
  top: 20px;
  font-size: 32px;
  display: block;
}

.card-counter .count-name{
  position: absolute;
  right: 35px;
  top: 65px;
  font-style: italic;
  text-transform: capitalize;
  display: block;
  font-size: 20px;
  
}
.container {
    margin-top: 200px;
    color: #FFF;
}
.justify { 
    display: flex;
    align-items: center;
    justify-content: center;
}
.eventsContainer {
    background: linear-gradient(80deg, var(--success) 50%, var(--danger) 50%);
}
.mail {
    background: linear-gradient(80deg, #3d3d3d 50%, var(--yellow) 50%);
}
.opinioesContainer {
    background: #f4623a ;
}
    </style>
    </head>
    <!---- Icon admin Login -->
 <body>
     

     
     <?php include "../assets/content/navbar_admin.php" ?>
     <?php include "countUsers.php" ?>
     <?php include "countReservas.php" ?>
     <?php include "countDuvidas.php" ?>
     <?php include "countEventos.php" ?>
     <?php include "countNews.php" ?>
     <!-- Masthead-->
     <div class="container">
         <div class="row">
                 
    <div class="col-md-3">
        <div class="card-counter info">
            <i class="fa fa-users"></i>
            <span class="count-numbers text-white"><?= $users['total'] ?></span>
            <span class="count-name text-white"><strong>Utilizadores</strong></span>
        </div>
        <div class="justify">

<a href="./users.php" class="btn btn-info text-white">Ver Mais</a>
</div>        
    </div>
             <div class="col-md-3">
                 <div class="card-counter primary">
                 <i class="fas fa-question"></i>
                     <span class="count-numbers text-white"><?= $duvidas['total'] ?></span>
                     <span class="count-name text-white">Duvidas</span>
                    </div>
                    <div class="justify">

                        <a href="../help/consultar_duvida.php" class="btn btn-info text-white">Ver Mais</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card-counter success">
                    <i class="fas fa-utensils"></i>
       
        <span class="count-numbers text-white"><?= $reservas['total'] ?></span>
        <span class="count-name text-white">Reservas</span>
      </div>
      <div class="justify">

<a href="../reservar/menu_reservas.php" class="btn btn-info text-white">Ver Mais</a>
</div>
    </div>
                <div class="col-md-3">
                    <div class="card-counter danger">
                    <i class="fas fa-glass-cheers"></i>
                        <span class="count-numbers text-white"><?= $eventos['total'] ?></span>
                        <span class="count-name text-white">Eventos</span>
                    </div>
                    <div class="justify">

<a href="../eventos/menu_eventos.php" class="btn btn-info text-white">Ver Mais</a>
</div>
                </div>
                
   

    <div class="col-md-3">
        <div class="card-counter info eventsContainer">
            <i class="fa fa-users"></i>
            <i class="fas fa-utensils"></i>
            <i class="fas fa-glass-cheers"></i>
            <span class="count-numbers text-white"><?= $users['total'] ?></span>
            <span class="count-name text-white"><strong> Reservas para eventos</strong></span>
        </div>
        <div class="justify">

<a href="../reservar/menu_reservas.php" class="btn btn-info text-white">Ver Mais</a>
</div>        
    </div>
    <div class="col-md-3">
        <div class="card-counter opinioesContainer ">
        <i class="fa fa-users"></i>
        <i class="fas fa-comments"></i>
            <span class="count-numbers text-white"><?= $users['total'] ?></span>
            <span class="count-name text-white"><strong> Opiniões</strong></span>
        </div>
        <div class="justify">

<a href="../opiniao/consultarOpiniao.php" class="btn btn-info text-white">Ver Mais</a>
</div>        
    </div>
    <div class="col-md-3 ">
        <div class="card-counter mail">
        <i class="fas fa-envelope-open-text"></i>
            <span class="count-numbers text-white"><?= $mail['total'] ?></span>
            <span class="count-name text-white"><strong>Newsletter</strong></span>
        </div>
        <div class="justify">

<a href="mailchimp.php" class="btn btn-info text-white">Ver Mais</a>
</div>        
    </div>
</div>

</body>
<!-- Footer-->



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
