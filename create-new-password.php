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
      <a class="navbar-brand" href="indexs.php">

          Elevens Caffé


      </a>

    </nav>

   
      <div class="row">
    

        <div class="col">

          <div class="card-login">

            <div class="card">
              <div class="card-header">
                Recuperação da Password
              </div>
              <div class="card-body">

                 
                
                  <?php

                        $selector = $_GET['selector'];
                        $validator = $_GET['validator'];


                        if(empty($selector) || empty($validator)){

                          echo "Não podemos validar o seu pedido";
                        }else{
                          if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false ){
                              ?>

                              <form action="includes/reset_password.inc.php" method="post">
                                <input type="hidden" name="selector" value="<?php echo $selector ?>">
                                <input type="hidden" name="validator" value="<?php echo $validator ?>">
                                <div class="form-group">
                                <input name="email" id="password" type="password" class="form-control"  placeholder="Insira a nova senha...">
                                 </div>
                                 <div class="form-group">
                                  <input name="re_password" id="re_password" type="password" class="form-control"  placeholder="Confirmne a nova senha...">
                                 </div>
                                 <button class="btn btn-lg btn-success btn-block" name="reset-pass-submit" id="request-reset-submit" type="submit">Mudar a senha</button>
                            </form>


                              <?php
                          }
                        }
                    ?>
                
                
        
              </div>
            </div>

          </div>
        </div>
        





  </body>
</html>
