<?php 
session_start();

require '../includes/db.inc.php';



$sql = "SELECT * FROM duvidas ";
    $result = mysqli_query( $conn, $sql);
    $resultCheck = mysqli_num_rows($result);

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Elevens Caffé</title>

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

            .container{
                margin-top: 10%;
            }
        </style>

    </head>
    <!---- Icon admin Login -->
 

    <?php include "../assets/content/navbar_admin.php" ?>

        <!-- Masthead-->
  

  
    <div class="container-fluid">
    <div class="row">
        <div class="col-md col-sm-6">

            
        <table class="table table-striped table-bordered">
        
            <thead>
                <tr>
                    <th>Perfil</th>
                    <th scope="col">Id do Cliente</th>
                    <th scope="col">Nome do Cliente</th>
                    <th scope="col">Tiulo</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Data de criação</th>
                    <th scope="col">Status</th>
                    <th scope="col">Options</th>
                    
                    
                    
                 
                </tr>
            </thead>
            <tbody>
            <?php foreach($result as $row) :?>

                <tr>
                    <th> <a type="button" id="view-user-btn" name="view-user-btn" class="btn btn-info text-white" href="view_profile.php?&id=<?php echo $row['id_user'] ?>">Ver Perfil</a></th>
                    <th scope="row"><?= $row['id_duvida']?></th>

                    <td><?= $row['fname'] . $row['lname']?></td>   

                    <td><?= $row['titulo']?></td>
                    <td><?= $row['categoria']?></td>
                    <td><?= $row['descricao']?></td>
                    <td><?= $row['create_at']?></td>
                 


                    <?php if($row['status'] === 'n_respondido') : ?>
                       <td> <a type="button" id="despromover-user-btn" name="despromover-user-btn" class="btn btn-primary text-white" href="">Responder</a></td>
                    <?php endif ?>

                    <?php if($row['status'] === 'respondido') : ?>
                       <td> <a type="button" id="promover-user-btn" name="promover-user-btn" class="btn btn-warning text-white" href="">Promover</a></td>
                    <?php endif ?>
                 
                    <?php if($row['duvida_status'] === 'ativo') : ?>
                        <td><a type="button" id="desativar-user-btn" name="desativar-user-btn" class="btn btn-secondary text-white" href="">Desativar</a></td>
                    <?php endif ?>
                    <?php if($row['duvida_status'] === 'desativado') : ?>
                        <td><a type="button" id="ativar-user-btn" name="ativar-user-btn" class="btn btn-primary text-white" href="">Ativar</a></td>
                    <?php endif ?>

                <?php endforeach ?>
            </tbody>
        </table>
    </div>


        <!-- Footer-->
        
    </div>
    </div>


        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
