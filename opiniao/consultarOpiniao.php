<?php 
session_start();

if(!isset($_SESSION['userId'])){

  header("Location: ../autenticar.php?acesso=negado");
  exit();
}
require '../includes/db.inc.php';





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
  <?php include "../includes/see_data_opiniao.php"?>

  <?php if( isset($_GET['registo']) && isset($_GET['registo']) == 'success' ) : ?>

<div class="alert alert-success" role="alert">

  Muito obrigado pela sua opinião   

</div>
<?php endif ?>
  <?php if( isset($_GET['update']) && isset($_GET['update']) == 'success' ) : ?>

<div class="alert alert-success" role="alert">

  Eliminado com Sucesso    

</div>


<?php endif ?>



    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              
              <?php 
              if(isset($_SESSION['fname'])){

            if($_SESSION['userStatus'] == 'admin'){

              echo '<h1>Consulta de todas as opiniões<span class="badge badge-danger">!</span></h1>' ;

            }else{

              echo '<h1>Consultar as minhas opiniões<span class="badge badge-danger">!</span></h1>' ;
            }

            }
            ?>
            
            
            </div>
            
            <div class="card-body">
                    <?php foreach($result as $row) : ?>
                       
                      <div class="card mb-3 bg-light" >

<div class="card-body">
  <h5 class="card-title">Opinião de: <?php echo $row['username']?></h5>



  <p class="card-text">Opinião:  <?php echo $row['opiniao']?></p>



 





</div>
<?php if($row['id_client'] == $_SESSION['userId'] ):?>
                            <a type="button" id="delete-duvida-btn" name="edit-opiniao-submit" class="btn btn-warning text-white" href="editOpiniao.php?id=<?php echo $row['id'] ?>">Editar</a>

                            <?php endif ?>


                       

                            <?php if($_SESSION['userStatus'] ==  'admin' || $row['id_client'] == $_SESSION['userId']):?>
                            <a type="button" id="delete-duvida-btn" name="delete" class="btn btn-danger text-white" href="../includes/delete_data_opiniao.php?delete=sim&id=<?php echo $row['id'] ?>">Eliminar</a>

                            <?php endif ?>
                              
                            <?php if($row['status'] ==  'pendente' ):?>
                            <?php if($_SESSION['userStatus'] ==  'admin' ):?>
                            <a type="button" id="delete-duvida-btn" name="delete" class="btn btn-info text-white" href="../includes/delete_data_opiniao.php?delete=sim&id=<?php echo $row['id'] ?>">Aceitar comentário</a>

                            <?php endif ?>
                            <?php endif ?>


                            <?php if($row['status'] ==  'aceito' ):?>
                           
                            <a type="button" id="delete-duvida-btn" name="delete" class="btn btn-success text-white" href="">Aprovada</a>

                        
                            <?php endif ?>
</div>

                      <?php endforeach ?>

           


              <div class="row mt-5">
                <div class="col-6">
                <a class="btn btn-lg btn-success btn-block" href="menuOpiniao.php">Voltar</a>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </body>
</html>