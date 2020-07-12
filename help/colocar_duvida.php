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

    <div class="container">    
      <div class="row">

        <div class="card-abrir-chamado">
          <div class="card">
            <div class="card-header">
            
                    <h1>Qual a sua dúvida? <span class="badge badge-danger">?</span></h1>
                  
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col">
                  
                  <form action="regista_duvida.php" method="post">
                    <div class="form-group" >
                      <label>Título</label>
                      <input name="titulo" type="text" class="form-control" placeholder="Título">
                    </div>
                    
                    <div class="form-group">
                      <label>Categoria</label>
                      <select name="categoria" class="form-control">
                        <option>Horários</option>
                        <option>Menus</option>
                        <option>Atendimento</option>
                        <option>Eventos</option>
                        <option>Outro</option>
                      </select>
                    </div>

                    <div class="form-group" >
                      <label>Email para contacto</label>
                      <input name="email" type="email" class="form-control" placeholder="Insira o email que deseja se contactado">
                    </div>

                    <div class="form-group" >
                      <label>Se desejar ser contactado por Facebook ou Instagram insira o seu ulitizador e especifique qual </label>
                      <input name="social" type="text" class="form-control" placeholder="Exemplo: Meu Facebook: Meu Utilizador / Meu Instagram: Meu @ ">
                    </div>
                    
                    <div class="form-group">
                      <label>Dúvida</label>
                      <textarea name="descricao" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="row mt-5">
                      <div class="col-6">
                        <a class="btn btn-lg btn-success btn-block" href="menu_duvidas.php">Voltar</a>
                      </div>

                      <div class="col-6">
                        <button class="btn btn-lg btn-outline-info btn-block" name="colocar-duvida-submit" type="submit">Enviar Dúvida</button>
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