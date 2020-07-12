<?php



?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-home {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>
    <?php require "navbar_index.php" ?>

    <?php if(  isset($_GET['emptyfields']) ) : ?>

<div class="container emp-profile">

    <div class="alert alert-danger d-flex justify-content-center"r role="alert">
        
    <h3>Por Favor preencha todos os campos do formulário <span class="badge badge-secondary bg-danger">!</span></h3>
        
    </div>

</div>


<?php endif ?>

    <div class="container">    
      <div class="row">

        <div class="card-home">
          <div class="card">
            <div class="card-header">
              Menu
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-6 d-flex justify-content-center">
                   <h3>Colocar Duvida</h3><br>
                </div>
                <div class="col-6 d-flex justify-content-center">
                  <h3>Consultar Duvidas</h3><br>
                </div>
              </div>
              <div class="row">
                <div class="col-6 d-flex justify-content-center">
                  <div></div>
                   
                  <a href="colocar_duvida.php" ><img src="duvida.png" width="70" height="70"></a>
                </div>
                <div class="col-6 d-flex justify-content-center">
               
                  <a href="consultar_duvida.php" ><img src="duvidas.png" width="70" height="70"></a>
                </div>
              </div>
             
            </div>
          </div>
        </div>
    </div>
  </body>
</html>