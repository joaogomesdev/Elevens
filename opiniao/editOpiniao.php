<?php 
session_start();


if(!isset($_SESSION['userId'])){

  header("Location: ../autenticar.php?acesso=negado");
  exit();
}
require '../includes/db.inc.php';

$id = $_GET['id'];

$sql = "SELECT * FROM opinioes WHERE  id = $id";
    $result = mysqli_query( $conn, $sql);
    $resultCheck = mysqli_num_rows($result);


?>


<html>
  <head>
    <meta charset="utf-8" />
    <title>Editar Opinião</title>

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
            
                    <h1>Edição de dúvida <span class="badge badge-danger">!</span></h1>
                  
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col">
                <?php foreach($result as $row) : ?>
                  <form action="../includes/update_data_opiniao.php?id=<?php echo $id?>" method="post">
                    <div class="form-group" >
                      <label>Opiniao</label>
                      <input name="opiniao" type="text" class="form-control" value="<?php echo $row['opiniao']?>" placeholder="Título">
                    </div>
                    
    
  
                   <div class="row">
                     <div class="col-6">
                       <a  href="../index.php" class="btn btn-lg btn-success btn-block" name="edit-opiniao-submit" type="submit">Voltar</a>
                     </div>
                     <div class="col-6">
                       <button  class="btn btn-lg btn-outline-info btn-block" name="edit-opiniao-submit" type="submit">Editar</button>
                     </div>

                   </div>
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