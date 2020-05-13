
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
    <?php require "navbar_index_reservas.php" ?>


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
                   <h3>Adicionar Evento</h3><br>
                </div>
                <div class="col-6 d-flex justify-content-center">
                  <h3>Consultar Eventos</h3><br>
                </div>
              </div>
              <div class="row">
                <div class="col-6 d-flex justify-content-center">
                  <div></div>
                   
                  <a href="add_evento.php" ><img src="encontro.png" width="70" height="70"></a>
                </div>
                <div class="col-6 d-flex justify-content-center">
               
                  <a href="consultar_eventos.php" ><img src="musica.png" width="70" height="70"></a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>