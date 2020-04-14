<?php
    session_start();

?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <style>

.card-login {
    padding: 30px 0 0 0;
    width: 350px;
    margin: 0 auto;
  }

  </style>
  
  </head>

  <body>

  <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">
        
          Elevens Caffé
      

      </a>
    
    </nav> 

     
      <div class="row">
          

        <div class="col-6">

          <div class="card-login">

            <div class="card">
              <div class="card-header">
                Login
              </div>
              <div class="card-body">

                  <?php if( isset($_GET['login']) && isset($_GET['login']) == 'erro' ) : ?>

        
                    <div class="alert alert-danger" role="alert">

                        E-Mail ou Password inválido(s)

                    </div>
                

                  <?php endif ?>

                  <?php if( isset($_GET['login']) && isset($_GET['login']) == 'erro2' ) : ?>

                        <div class="alert alert-danger" role="alert">

                            ATENÇÂO!! Autentique-se antes para ser autorizado a utilizar as outras páginas!!
                        </div>

                  <?php endif ?>
                <form action="validar_login.php" method="POST">
                  <div class="form-group">
                    <input name="email" type="email" class="form-control"  placeholder="E-Mail">
                  </div>
                  <div class="form-group">
                    <input name="password" type="password" class="form-control"  placeholder="Password">
                  </div>



                  <button class="btn btn-lg btn-success btn-block" type="submit">Entrar</button>
                </form>
              </div>
            </div>

          </div>
        </div>
        <div class="col-6">

          <div class="card-login">

            <div class="card">
              <div class="card-header">
                Registar
              </div>
              <div class="card-body">
                <form action="#" method="POST">
                  <div class="form-group">
                    <input name="nome" type="text" class="form-control"  placeholder="Nome">
                  </div>
                  <div class="form-group">
                    <input name="email" type="email" class="form-control"  placeholder="E-Mail">
                  </div>
                  <div class="form-group">
                    <input name="password" type="password" class="form-control"  placeholder="Password">
                  </div>



                  <button class="btn btn-lg btn-info btn-block" type="submit">Registar</button>
                </form>
              </div>
            </div>

          </div>
        </div>


    

  
  </body>
</html>