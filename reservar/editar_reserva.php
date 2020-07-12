<?php 
session_start();

$id_reserva=$_GET['id'];
if(!isset($_SESSION['userId'])){

  header("Location: ../autenticar.php?acesso=negado");
  exit();
}
require '../includes/db.inc.php';

$id_reserva = $_GET['id'];

$sql = "SELECT id_reserva,id_client, client_name ,number_pessoas,DATE_FORMAT(date_reserva, '%d/%m/%Y') as date, DATE_FORMAT(time_reserva, '%H:%i') as time, categoria, client_email, client_phone, observacoes, created_at, updated_at FROM reservas WHERE  id_reserva = $id_reserva";
    $result = mysqli_query( $conn, $sql);
    $resultCheck = mysqli_num_rows($result);


?>


<html>
  <head>
    <meta charset="utf-8" />
    <title>Editar Reserva</title>

     <!-- Font Awesome icons (free version)-->
     <script src="https://use.fontawesome.com/releases/v5.12.1/js/all.js" crossorigin="anonymous"></script>
       

       <!-- Google fonts-->
       <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
       <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
       <link href="https://fonts.googleapis.com/css?family=Great+Vibes&display=swap" rel="stylesheet">

       <!-- Third party plugin CSS-->
       <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />

       <!-- Core theme CSS (includes Bootstrap)-->
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
            
                    <h1>Edição de Reserva <span class="badge badge-danger">!</span></h1>
                  
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col">
                <?php foreach($result as $row) : ?>
                <form action="../includes/update_data_reserva.php?id=<?= $_GET['id'] ?>" method="post">

                            <div class="form-row">
                                <div class="form-group col-md-9">
                                        <label for="nome">Nome</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Nome"  value="<?php echo $row['client_name']?>">
                                
                                </div>
                                <div class="form-group col-md-3">
                                        <label for="nome">Numero de Pessoas</label>
                                        <input type="number" class="form-control" id="n_pessoas" name="n_pessoas" placeholder="Numero de Pessoas"  value="<?php echo $row['number_pessoas']?>">
                                
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                        <label for="email">Data da reserva</label>
                                        <input type="" class="form-control" id="data_reserva" name="data_reserva" placeholder="<?php echo $row['date']?>"  value="<?php echo $row['date']?>">
                                    
                                
                                </div>
                                <div class="form-group col-md-4">
                                        <label for="email">Horas</label>
                                        <input type="time" class="form-control" id="time_reserva" name="time_reserva" placeholder=""  value="<?php echo $row['time']?>">
                                    
                                
                                </div>
                                <div class="form-group col-md-4">
                                <label>Categoria</label>
                                                  <input type="text" name="categoria" class="form-control" value="<?php echo $row['categoria']?>">
                                                   
                                                 
                              
                                </div>
                            </div>
                            <div class="form-row">

                              <div class="form-group col-md-7">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail de contacto"  value="<?php echo $row['client_email']?>">
                              </div>
                                  <div class="form-group col-md-5">
                                          <label for="nome">Contacto Telefónico</label>
                                          <input type="number" class="form-control" id="tele" name="tele" placeholder="Contacto telefónico"  value="<?php echo $row['client_phone']?>">
                                  
                                  </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                                  
                                        
                                </div>
                                <div class="form-group col-md-12">
                                        <label for="salario">Observações</label>
                                        <input type="text" name="observacoes" class="form-control" rows="3" value="<?php echo $row['observacoes']?>"></textarea>
                                        
                                </div>
                                <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="confirmBox" id="confirmBox">
                                <label class="form-check-label" for="confirmBox">Marque para confirmar</label>
                              </div>
                            </div>

                            <div class="row mt-5">
                            <div class="col-6">
                            <a class="btn btn-lg btn-info btn-block" href="consultar_reservas.php">Voltar</a>
                            </div>

                            <div class="col-6">
                            <button class="btn btn-lg btn-outline-primary btn-block" name="edit-reserva-submit" type="submit">Editar Reserva</button>
                            </div>

                            </form>
                  <?php endforeach ?>

                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>