


<?php

session_start();

 

?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

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
  <?php include "../includes/see_data_duvidas.php"?>

  <?php if( isset($_GET['registo']) && isset($_GET['registo']) == 'success' ) : ?>

<div class="alert alert-success" role="alert">

  Duvida colocada com sucesso     

</div>
<div class="alert alert-info" role="alert">

  Iremos Responder logo que possamos     

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

              echo '<h1>Consulta de todas as duvidas<span class="badge badge-danger">!</span></h1>' ;

            }else{

              echo '<h1>Consultar as minhas duvidas<span class="badge badge-danger">!</span></h1>' ;
            }

            }
            ?>
            
            
            </div>
            
            <div class="card-body">
                    <?php foreach($result as $row) : ?>
                        
                  <div class="card mb-3 bg-light">
                    <div class="card-header">
                    <h5> <?php echo $row['username']?> <span class="badge badge-primary"><?php echo $row['id_user']?></span></h6>
                  </div>
                    <div class="card-body">

                      <h6 class="card-title"><?php echo $row['titulo']?></h5>
                      <h7 class="card-subtitle mb-2 text-muted"><?php echo $row['categoria']?></h7>
                      <p class="card-text"><?php echo $row['descricao']?></p>
                      
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