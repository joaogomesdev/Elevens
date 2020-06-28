<?php session_start(); // place it on the top of the script ?>
<?php
    $statusMsg = !empty($_SESSION['msg'])?$_SESSION['msg']:'';
    unset($_SESSION['msg']);
    echo $statusMsg;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<link href="css/styles.css" rel="stylesheet">
    <title>Newsletter</title>

    <style>
        html,
body {
  height: 100%;
}

body {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.top {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.middle {
 border-radius: 0;
 margin-bottom: -1px;
}
.bottom {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

.bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }

  }


    </style>
 
</head>

    <body class="text-center">
                    <form method="POST" action="action.php"  class="form-signin">
    
                <img class="mb-4" src="../assets\img\o-negocio.png" alt="" width="72" height="72">
                <h1 class=" d-block mx-auto mb-2display-4 text-success">Newsletter!</h1>
                <div class="row">
                  <div class="col">
                    
                    <h4 class=" d-block mx-auto mb-2display-4 text-info mb-2">Deseja subscrever a newsletter e receber todas as noticias e novidades em primeira mão?</h4>
                  </div>
                </div>
                <div class="row mt-5">
                  <div class="col-6">
                    <a class="btn btn-lg btn-danger text-white btn-block"  value="Não" href="../index.php">Não</a>

                  </div>
                  <div class="col-6">
                    <input  class="btn btn-lg btn-success text-white btn-block" type="submit" name="submit" value="Sim">

                  </div>
                  
                </div>

               <?php if(isset($_GET['success'])){
                            

                                 echo '<div class="alert alert-success" role="alert">

                                Muito Obrigado

                                   </div>';
                               }
                             
                             ?>
               <?php if(isset($_GET['taken'])){
                            

                                 echo '<div class="alert alert-warning text-white" role="alert">

                                Email já Registado

                                   </div>';
                               }
                             
                             ?>
                </form>
    </body>
    

</html>
