


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

  Duvida colocada com sucesso     

</div>
<div class="alert alert-info" role="alert">

  Iremos Responder logo que possamos     

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
                        
                  <div class="card mb-3 bg-light">
                    <div class="card-header">
                    <h5> <?php echo $row['client_name']?> <span class="badge badge-primary"><?php echo $row['id_client']?></span></h6>

                    <?php if($row['id_client'] ==  $_SESSION['userId']) :?>
        
                    <a type="button" id="editar" class="btn btn-warning text-white" href="editar_duvida.php?id=<?php echo $row['id_reserva'] ?>"> Editar</a>
                    <?php endif ?>
                    <?php if($_SESSION['userStatus'] ==  'admin' || $row['id_client'] ==  $_SESSION['userId']) :?>
        
                      <a type="button" id="delete-duvida-btn" name="delete-duvida-btn" class="btn btn-danger text-white" href="../includes/delete_data_duvidas.php?delete=sim&id=<?php echo $row['id_client'] ?>"> Eliminar</a>
                    <?php endif ?>
                  </div>
                    <div class="card-body">

                      <h6 class="card-title">Categoria: <?php echo $row['categoria']?></h5>
                      <h7 class="card-subtitle mb-2 text-muted">Numero de pessoas: <?php echo $row['number_pessoas']?></h7><br>
                      <h7 class="card-subtitle mb-2 text-muted">Data da reserva: <?php echo $row['date_reserva']?></h7><br>
                      <h7 class="card-subtitle mb-2 text-muted">Hora da reserva: <?php echo $row['time_reserva']?></h7><br>
                      <h7 class="card-subtitle mb-2 text-muted">Email do cliente: <?php echo $row['client_email']?></h7><br>
                      <h7 class="card-subtitle mb-2 text-muted">Contacto telefonico do cliente: <?php echo $row['client_phone']?></h7><br>
                      <h7 class="card-subtitle mb-2 text-muted">Reserva feita em: <?php echo $row['created_at']?></h7><br>
                      <p class="card-text"><?php echo $row['observacoes']?></p>
                      
                    </div>
                  </div>

                      <?php endforeach ?>

           


              <div class="row mt-5">
                <div class="col-6">
                <a class="btn btn-lg btn-success btn-block" href="menu_duvidas.php">Voltar</a>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </body>
</html>