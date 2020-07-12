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
    <title>Apoio ao Cliente</title>

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

  <?php include_once "navbarDuvidas.php" ?>

    <div class="container">    
      <div class="row">

        <div class="card-abrir-chamado">
          <div class="card">
            <div class="card-header">
            
                    <h1>Resposta de duvida <span class="badge badge-danger">?</span></h1>
                  
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col">
                  
                  <form action="../includes/responder_duvida.php?action=responder" method="post">
                    <div class="form-group">
                      <div class="form-group">
                      <label>Vai responder como ? </label>
                      <select name="typeResponse" class="form-control">
                        <option>Email referido pedo cliente</option>
                        <option>Rede Social que o cliente especeficou</option>
                      </select>
                    </div>

                    <div class="form-group" >
                      <label>Observações</label>
                      <input name="obs" type="text" class="form-control">
                      <input type="text" name="duvida" value="<?= $_GET['id_duvida']?>" hidden>
                      <input type="text" name="user" value="<?= $_GET['id_user']?>" hidden>
                    </div>
                    </div>

                    <div class="row mt-5">
                      <div class="col-6">
                        <a class="btn btn-lg btn-success btn-block" href="../help/menu_duvidas.php">Voltar</a>
                      </div>

                      <div class="col-6">
                        <button class="btn btn-lg btn-outline-info btn-block" name="resposta" type="submit">Enviar Resposta</button>
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