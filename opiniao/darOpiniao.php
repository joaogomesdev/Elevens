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
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-abrir-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

  <?php include_once "navbar.php" ?>
  <?php if(  isset($_GET['emptyfields']) ) : ?>

<div class="container emp-profile">

<div class="alert alert-danger d-flex justify-content-center"r role="alert">
    
<h3>Por Favor preencha o formulário <span class="badge badge-secondary bg-danger">!</span></h3>
    
</div>

</div>


<?php endif ?>
    <div class="container">    
      <div class="row">

        <div class="card-abrir-chamado">
          <div class="card">
            <div class="card-header">
            
                    <h1>Qual a sua opinião <span class="badge badge-danger">?</span></h1>
                  
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col">
                  
                  <form action="registaOpiniao.php" method="post">
                    <div class="form-group">
                      
                      <label>Opinião</label>
                      <textarea name="opiniao" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="row mt-5">
                      <div class="col-6">
                        <a class="btn btn-lg btn-success btn-block" href="../index.php">Voltar</a>
                      </div>

                      <div class="col-6">
                        <button class="btn btn-lg btn-outline-info btn-block" name="dar-opiniao" type="submit">Enviar opinião</button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>