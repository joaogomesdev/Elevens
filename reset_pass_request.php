<?php

session_start();

?>

<html>
  <head>
    <meta charset="utf-8" />
    <title> Elevens Caffé</title>

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

      <ul class="navbar-nav ml-auto my-2 my-lg-0">

      <li class="nav-item"><a class="btn btn-danger pl-2 pr-2 text-white  nav-link " href="index.php">Home</a></li>

</ul>

    </nav>

   
      <div class="row">
    

        <div class="col">

          <div class="card-login">

            <div class="card">
              <div class="card-header">
                Recuperação da Password
              </div>
              <div class="card-body">

                 
                <form action="reset_pass/processa_envio.php" method="POST">
                  <div class="form-group">
                    <input name="email" id="email" type="email" class="form-control"  placeholder="Insira o seu email...">
                  </div>
                
<?php
                           if(isset($_GET['reset'])){
                               if($_GET['reset'] == 'success'){

                                 echo '<div class="alert alert-success" role="alert">

                                 Por favor consulte o seu email

                                   </div>';
                               }
                             } 

                             ?>


                           
                  <button class="btn btn-lg btn-success btn-block" name="recoverPassword-submit" id="request-reset-submit" type="submit">Receber password  no E-mail</button>
                </form>
         
              </div>
            </div>

          </div>
        </div>
        





  </body>
</html>
