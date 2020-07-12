<?php 
session_start();

$id_reserva=$_GET['id'];
if(!isset($_SESSION['userId'])){

  header("Location: ../autenticar.php?acesso=negado");
  exit();
}
require '../includes/db.inc.php';

$id_evento = $_GET['id'];

$sql = "SELECT * FROM eventos WHERE  id = $id_evento";
    $result = mysqli_query( $conn, $sql);
    $resultCheck = mysqli_num_rows($result);


?>


<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

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
  <?php if( isset($_GET['Taken']) && isset($_GET['id'] ))  : ?>

<div class="alert alert-danger" role="alert">

 Já possui uma reserva para este evento

</div>

<?php endif ?>

<?php if(  isset($_GET['emptyfields']) ) : ?>

<div class="container emp-profile">

    <div class="alert alert-danger d-flex justify-content-center"r role="alert">
        
    <h3>Por Favor preencha todos os campos do formulário <span class="badge badge-secondary bg-danger">!</span></h3>
        
    </div>

</div>


<?php endif ?>  
  <?php foreach($result as $row) : ?>
  <div class="container">    
    <div class="row">
      
      <div class="card-abrir-chamado">
        <div class="card">
          <div class="card-header">
            
            <h1>Reserva de <span class="badge badge-info"><?= $_SESSION['fname'] ?></span> para o evento <span class="badge badge-danger"><?= $row['title'] ?></span></h1>
            
            </div>
            (A reserva será realizada para a Data e Hora do inicio do evento)
            <div class="card-body">
              <div class="row">
                <div class="col">
        <form action="../includes/reservar_evento.php?id=<?php echo $row['id'] ?>&title=<?= $row['title'] ?>" method="post">

                    <div class="form-row">
                        <div class="form-group col-md-9">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nome"  value="<?= $_SESSION['fname'] . " " . $_SESSION['lname'] ?>">
                        
                        </div>
                        <div class="form-group col-md-3">
                                <label for="nome">Numero de Pessoas</label>
                                <input type="number" class="form-control" id="n_pessoas" name="n_pessoas" placeholder="Numero de Pessoas"  value="">
                        
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                                <label for="email">Data da reserva</label>
                                <input type="text" class="form-control" id="data_reserva" name="data_reserva" value="<?= $row['data'] ?>"  value="<?= $row['data'] ?>" readonly="readonly">
                            
                        
                        </div>
                        <div class="form-group col-md-4">
                                <label for="email">Horas </label>
                                <input type="text" class="form-control" id="time_reserva" name="time_reserva" placeholder="<?= $row['hora'] ?>"  value="<?= $row['hora'] ?>" readonly="readonly">
                            
                        
                        </div>
                        <div class="form-group col-md-4">
                        <label>Categoria</label>
                        <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Evento <?= $row['title'] ?>" value="<?= $row['title'] ?>"  readonly="readonly">
                      
                        </div>
                    </div>
                    <div class="form-row">

                      <div class="form-group col-md-7">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="E-mail de contacto"  value="<?= $_SESSION['userEmail'] ?>">
                      </div>
                          <div class="form-group col-md-5">
                                  <label for="nome">Contacto Telefónico</label>
                                  <input type="number" class="form-control" id="tele" name="tele" placeholder="Contacto telefónico"  value="">
                          
                          </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                                          
                                
                        </div>
                        <div class="form-group col-md-12">
                                <label for="salario">Observações</label>
                                <textarea name="observacoes" class="form-control" rows="3"></textarea>
                                
                        </div>
                    </div>

                    <div class="row mt-5">
                    <div class="col-6">
                    <a class="btn btn-lg btn-info btn-block" href="../index.php">Voltar</a>
                    </div>

                    <div class="col-6">
                    <button class="btn btn-lg btn-outline-primary btn-block" name="reservar-mesa-evento" type="submit">Confirmar Reserva</button>
                    </div>

      </form>
      
    </div>
  </div>
</div>
</div>
</div>
</div>
<?php endforeach ?>
  </body>
</html>