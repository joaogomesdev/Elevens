


<?php

session_start();

if(!isset($_SESSION['userId'])){

  header("Location: ../autenticar.php?acesso=negado");
  exit();
}

setlocale(LC_ALL, 'pt_BR');
 

?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>Consultar Reservas</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
       <!-- Font Awesome icons (free version)-->
       <script src="https://use.fontawesome.com/releases/v5.12.1/js/all.js" crossorigin="anonymous"></script>
       

       <!-- Google fonts-->
       <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
       <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
       <link href="https://fonts.googleapis.com/css?family=Great+Vibes&display=swap" rel="stylesheet">

       <!-- Third party plugin CSS-->
       <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
      @import url('https://fonts.googleapis.com/css?family=Oswald');
*
{
  margin: 0;
  padding: 0;
  border: 0;
  box-sizing: border-box
}

body
{
  background-color: #dadde6;
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif
}

.fl-left{float: left}

.fl-right{float: right}

.container
{
  width: 90%;
  margin: 100px auto
}

h1
{
  text-transform: uppercase;
  font-weight: 900;
  border-left: 10px solid #fec500;
  padding-left: 10px;
  margin-bottom: 30px
}

.row{overflow: hidden}

.card
{
  display: table-row;
  width: 49%;
  background-color: #fff;
  color: #989898;
  margin-bottom: 10px;
  font-family: 'Oswald', sans-serif;
  border-radius: 4px;
  position: relative
}

.card + .card{margin-left: 2%}

.date
{
  display: table-cell;
  width: 25%;
  position: relative;
  text-align: center;
  border-right: 2px dashed #dadde6
}

.date:before,
.date:after
{
  content: "";
  display: block;
  width: 30px;
  height: 30px;
  background-color: #DADDE6;
  position: absolute;
  top: -15px ;
  right: -15px;
  z-index: 1;
  border-radius: 50%
}

.date:after
{
  top: auto;
  bottom: -15px
}

.date time
{
  display: block;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%)
}

.date time span{
  display: block;
}

.date time span:first-child
{
  color: #2b2b2b;
  font-weight: 600;
  font-size: 250%
}

.date time span:last-child
{
  text-transform: uppercase;
  font-weight: 600;
  margin-top: -10px
}

.card-cont
{
  display: table-cell;
  width: 75%;
  font-size: 20px;
  padding: 10px 10px 30px 50px
}

.card-cont h3
{
  color: #3C3C3C;
  font-size: 130%;
  font-weight: bold;
}

.card-cont > div
{
  display: table-row
}
.card-cont .even-info {
  display: flex;
  flex-direction: column;
}
.card-cont .even-date i,
.card-cont .even-info i,
.card-cont .even-date time,
.card-cont .even-info p
{
  display: table-cell
}

.card-cont .even-date i,
.card-cont .even-info i
{
  padding: 5% 5% 0 0
}

.card-cont .even-info p
{
  font-size: 16px;
}

.card-cont .even-date time span
{
  display: flex;
  margin-bottom: 5px;
}

.card-cont a
{
  height: 30px;
  height: 30px;
  display: flex;
  align-items: center;
  justify-content: center;
  text-decoration: none;
  color: #fff;
  border-radius: 5px;
  position: absolute;
  right: 10px;
  bottom: 10px;
  font-size: 14px;
  font-weight: bold;
}

img {
  width: 20px;
  height: 20px;
  margin-right: 10px;
}





@media screen and (max-width: 860px)
{
  .card
  {
    display: block;
    float: none;
    width: 100%;
    margin-bottom: 10px
  }
  
  .card + .card{margin-left: 0}
  
  .card-cont .even-date,
  .card-cont .even-info
  {
    font-size: 75%
  }

  p {
    color: #fec500;
  }
}
    </style>
  </head>

  <body>

  <?php include_once "navbar.php" ?>
  <?php include "../includes/see_data_reservas_eventos.php"?>

  <?php if( isset($_GET['registo']) && isset($_GET['registo']) == 'success' ) : ?>

<div class="alert alert-success" role="alert">

 Reserva feita com sucesso   

</div>

<?php endif ?>
  <?php if( isset($_GET['update']) && isset($_GET['update']) == 'success' ) : ?>

<div class="alert alert-success" role="alert">

  Reserva Eliminada com Sucesso    

</div>




<?php endif ?>


<?php foreach($result as $row) : ?>
  <section class="container">
      <div class="row">
        <article class="card fl-left">
          <section class="date">
            <time datetime="23th feb">
              <span><?= $row['dia']; ?></span>
              <span><?= $row['date'];?></span>
            </time>
          </section>
          <section class="card-cont">
            <h3> Cliente: <span class="badge badge-success"><?= $row['client_name']; ?></span></span></h3>

            <h5><?= $row['nome_evento']; ?></h5>
            <div class="even-date">

           
            <time>
              <span> <img src="../assets/img/calendario.svg" alt=""><?= $row['dateTotal'];?></span>
              <span> <img src="../assets/img/tempo.svg" alt=""><?= $row['time'];?></span>
            </time>

            </div>
            <div class="even-info">
              <p > <i class="fas fa-envelope-square"></i> </i> <?= $row['client_email'];?></p>
              <p> <i class="fas fa-phone-square-alt"></i> </i> <?= $row['client_phone'];?></p>
              <p><i class="fas fa-user-friends"></i><?= $row['number_pessoas'];?> Pessoas</p>
              <p><?= $row['observacoes'];?></p>
            </div>

            
          
          </section>
        </article>
      </div>

      <?php if($_SESSION['userStatus'] ==  'admin' && $row['status'] == 'pendente'):?>
                            <a type="button" id="delete-duvida-btn" name="delete-duvida-btn card-link" class="btn btn-primary text-white" href="../includes/aprovar_reservaEventos.php?aprovar=sim&id=<?php echo $row['id'] ?>">Aprovar</a>
                            <?php endif ?>


                            <?php if($row['status'] == 'cancelada'):?>
                            <div class="alert alert-danger" role="alert">
                             Reserva Cancelada!
                            </div>
                            <?php endif ?>

                            <?php if($row['status'] == 'aprovada'):?>
                            <div class="alert alert-success" role="alert">
                             Reserva Confirmada!
                            </div>

                            <?php endif ?>

                          <?php if($row['status'] == 'pendente') :?>
                          <?php if($_SESSION['userStatus'] ==  'admin' || $row['id_client'] == $_SESSION['userId']) :?>
                            <a type="button" id="delete-duvida-btn" name="delete-duvida-btn card-link" class="btn btn-danger text-white" href="../includes/cancelar_reservaEventos.php?cancelar=sim&id=<?php echo $row['id'] ?>">Cancelar</a>

                            <?php endif ?>
                            <?php endif ?>


                       

                            <?php if($_SESSION['userStatus'] ==  'admin' && $row['status'] == 'cancelada'):?>
                            <a type="button" id="delete-duvida-btn" name="delete-duvida-btn card-link" class="btn btn-success text-white" href="../includes/aprovar_reservaEventos.php?aprovar=sim&id=<?php echo $row['id'] ?>">Aprovar</a>
         
                            <?php endif ?>

                            <?php if($row['id_client'] == $_SESSION['userId'] && $row['status'] == 'pendente'):?>
                            <a type="button" id="delete-duvida-btn" name="edit-opiniao-submit" class="btn btn-warning text-white" href="editar_reservaEvento.php?id=<?php echo $row['id'] ?>">Editar</a>

                            <?php endif ?>
                            
  </section>

<?php endforeach ?>


   


  </body>
</html>