


<?php

session_start();

if(!isset($_SESSION['userId'])){

  header("Location: ../autenticar.php?acesso=negado");
  exit();
}
 

?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>Consultar Reservas</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

  <?php include_once "navbar.php" ?>
  <?php include "../includes/see_data_reservas.php"?>

  <?php if( isset($_GET['registo']) && isset($_GET['registo']) == 'success' ) : ?>

<div class="alert alert-success" role="alert">

 Reserva feita com sucesso   

</div>

<?php endif ?>
  <?php if( isset($_GET['update']) && isset($_GET['update']) == 'success' ) : ?>

<div class="alert alert-success" role="alert">

  Duvida Eliminada com Sucesso    

</div>


<?php endif ?>



    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              
              <?php 
              if(isset($_SESSION['userName'])){

            if($_SESSION['userStatus'] == 'admin'){

              echo '<h1>Consulta de todas as reservas<span class="badge badge-danger">!</span></h1>' ;

            }else{

              echo '<h1>Consultar as minhas reservas<span class="badge badge-danger">!</span></h1>' ;
            }

            }
            ?>
            
            
            </div>
            
            <div class="card-body">
                    <?php foreach($result as $row) : ?>

                      <div class="card mb-3 bg-light" >

                        <div class="card-body">
                          <h5 class="card-title">Reserva de: <?php echo $row['client_name']?></h5>

                          <h6 class="card-subtitle mb-2 text-muted"><?php echo $row['date']?> / <?php echo $row['time']?></h6>

                          <p class="card-text">Numero de pessoas: <?php echo $row['number_pessoas']?></p>

                          <p class="card-text">Contacto telefonico do cliente: <?php echo $row['client_phone']?></p>
                          <p class="card-text">Email do cliente: <?php echo $row['client_email']?></p>
                          <p class="card-text">Reserva feita em: <?php echo $row['created_at']?></p>

                

                          <?php if($row['id_client'] ==  $_SESSION['userId'] && $row['status'] == 'pendente'):?>

                          <a type="button" id="editar" class="btn btn-warning text-white card-link" href="editar_reserva.php?id=<?php echo $row['id_reserva'] ?>"> Editar</a>
                          <a type="button" id="delete-duvida-btn" name="delete-duvida-btn card-link" class="btn btn-danger text-white" href="../includes/cancelar_reserva.php?cancelar=sim&id=<?php echo $row['id_reserva'] ?>>"  
                          >Cancelar</a>

                          <?php endif ?>

                          <?php if($_SESSION['userStatus'] ==  'admin' && $row['status'] == 'pendente'):?>
                            <a type="button" id="delete-duvida-btn" name="delete-duvida-btn card-link" class="btn btn-primary text-white" href="../includes/aprovar_reserva.php?aprovar=sim&id=<?php echo $row['id_reserva'] ?>">Aprovar</a>
                            <a type="button" id="delete-duvida-btn" name="delete-duvida-btn card-link" class="btn btn-danger text-white" href="../includes/cancelar_reserva.php?cancelar=sim&id=<?php echo $row['id_reserva'] ?>">Cancelar</a>
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

                          <?php if($_SESSION['userStatus'] ==  'admin' && $row['status'] == 'aprovada'):?>
                            <a type="button" id="delete-duvida-btn" name="delete-duvida-btn card-link" class="btn btn-danger text-white" href="../includes/cancelar_reserva.php?cancelar=sim&id=<?php echo $row['id_reserva'] ?>">Cancelar</a>

                            <?php endif ?>


                       

                            <?php if($_SESSION['userStatus'] ==  'admin' && $row['status'] == 'cancelada'):?>
                            <a type="button" id="delete-duvida-btn" name="delete-duvida-btn card-link" class="btn btn-success text-white" href="../includes/aprovar_reserva.php?aprovar=sim&id=<?php echo $row['id_reserva'] ?>">Aprovar</a>

                            <?php endif ?>

                        


                        </div>
                      </div>
                    
               

                      <?php endforeach ?>

           


              <div class="row mt-5">
                <div class="col-6">
                <a class="btn btn-lg btn-success btn-block" href="menu_reservas.php">Voltar</a>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </body>
</html>