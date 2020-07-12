<?php 
session_start();



if($_SESSION['userStatus'] !== 'admin'){

  header("Location: ../index.php?acesso=negado");
  exit();
}




?>


<html>
  <head>
    <meta charset="utf-8" />
    <title>Dashboard</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="../assets/css/styles.css" rel="stylesheet" />
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

  <div class="container">    
      <div class="row">

        <div class="card-abrir-chamado">
          <div class="card">
            <div class="card-header">
            
                    <h1>Adicionar Evento<span class="badge badge-danger">:)</span></h1>
                  
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col">
                  
                  <form action="../includes/registar_evento.php" method="post" enctype="multipart/form-data">
                    <div class="form-group" >
                      <label>Foto</label>
                        <div class="custom-file">
                              <input type="file" name="foto" id="foto"/>
                        </div>
                    </div>
                    <div class="form-group" >
                      <label>Título</label>
                      <input name="titulo" type="text" class="form-control" placeholder="Título">
                    </div>
                    <div class="form-group" >
                    <div class="row ">
                      <div class="col-6">
                      <label>Data</label>
                      <input name="date" type="date" class="form-control" placeholder="Título">
                    
                    </div>
                      <div class="col-6">
                      <label>Hora</label>
                      <input name="hora" type="time" class="form-control" placeholder="Título">
                      
                    </div>
                    </div>
                    </div>

                    <div class="form-group">
                      <label>Descrição</label>
                      <textarea name="descricao" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="row mt-5">
                      <div class="col-6">
                        <a class="btn btn-lg btn-success btn-block" href="menu_eventos.php">Voltar</a>
                      </div>

                      <div class="col-6">
                        <button class="btn btn-lg btn-outline-info btn-block" name="registar-evento" type="submit">Adicionar Evento</button>
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