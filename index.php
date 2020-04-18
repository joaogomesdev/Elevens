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

                  <?php if( isset($_GET['registo']) && isset($_GET['registo']) == 'success' ) : ?>


                  <div class="alert alert-info" role="alert">

                   Faça Login

                  </div> 

                  <?php endif ?>

                  <?php if( isset($_GET['login']) && isset($_GET['login']) == 'erro2' ) : ?>

                        <div class="alert alert-danger" role="alert">

                            ATENÇÂO!! Autentique-se antes para ser autorizado a utilizar as outras páginas!!
                        </div>

                  <?php endif ?>
                <form action="includes/login.inc.php" method="POST">
                  <div class="form-group">
                    <input name="email" id="email" type="email" class="form-control"  placeholder="E-Mail">
                  </div>
                  <div class="form-group">
                    <input name="password" id="password" type="password" class="form-control"  placeholder="Password">
                  </div>
                  <?php if( isset($_GET['newpwd']) && isset($_GET['newpwd']) == 'passwordupdated' ) : ?>

                    <div class="alert alert-sucess" role="alert">

                        Password Mudada com Sucesso!
                    </div>

                    <?php endif ?>


                  <button class="btn btn-lg btn-success btn-block" name="login-submit" id="login-submit" type="submit">Entrar</button>

                   <a type="button" class="btn btn-outline-primary form-control mt-3" href="reset_pass_request.php">Esquecime da password</a>
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
                      
                        <?php if( isset($_GET['registo']) && isset($_GET['registo']) == 'success' ) : ?>


                        <div class="alert alert-success" role="alert">

                        Registado com sucesso

                        </div> 

                        <?php endif ?>
                          
                <form action="includes/singup.inc.php" method="POST">
                  <div class="form-group">
                    <input name="username" id="username" type="text" class="form-control"  placeholder="Nome">
                  </div>
                  <div class="form-group">
                    <input name="email" id="email" type="email" class="form-control"  placeholder="E-Mail">
                  </div>
                  <div class="form-group">
                    <input name="password" id="password" type="password" class="form-control"  placeholder="Password">
                  </div>
                  <div class="form-group">
                    <input name="rePassword" id="rePassword" type="password" class="form-control"  placeholder="Confirme a Password">
                  </div>

                  <button class="btn btn-lg btn-info btn-block form-control" name="register-submit" id="register-submit" type="submit">Registar</button>
                </form>
              </div>
            </div>

          </div>
        </div>





  </body>
</html>
