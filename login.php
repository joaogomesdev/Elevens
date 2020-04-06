<?php require_once "db/conexao.php" ?>
<?php session_start();?>

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
        <link href="assets/css/styles.css" rel="stylesheet" />
        <link href="assets/css/login.css" rel="stylesheet" />

    </head>
    <!---- Icon admin Login -->
    <?php
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        
        if(count($_POST) > 0){
            $errors = [];
            $flag = true;
             //isset($_POST['nome]);
                if($flag == true){

                    if(!filter_input(INPUT_POST, "email")) {//Se nao colocar nome ou seja campo obgrigatorio;
                     $errors['email'] = "Insire o email";
                   }
                    if(!filter_input(INPUT_POST, "password")) {//Se nao colocar nome ou seja campo obgrigatorio;
                     $errors['password'] = "Insire a password";
                   }

                }else {
                    
                    $flag = false;

                }

                if($flag == false){

                    header('Location : index.php');
                }

            
                foreach($users as $user) {
                    $emailValido = $email === $user['email'];
                    $passValida = $pass === $user['pass'];
            
                    if($emailValido && $passValida) {
                        $_SESSION['erros'] = null;
                        $_SESSION['user'] = $user['nome'];
                        $exp = time() + 60 * 60 * 24 * 30;
                        setcookie('user', $user['nome'], $exp);
                        header('Location: index.php');
                    }
                }


                    
                
        }

?>
    <body>
        
        <?php include "assets/content/icon_admin.php" ?>
        <?php include "assets/content/icon_admin.php" ?>


        
       
        <form class="form-login" action="#" method="post">
        <div class="login-card card">
            <div class="card-header font-family-sans-serif">
                
                    <h2 class="text-warning mt-0">login</h2>
            
            </div>
            <div class="card-body">
            
                <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input type="email" id="email"name="email" class="form-control <?=$errors['email'] ? 'is-invalid' :  '' ?>" value="">
                    <div class="invalid-feedback"> <?= $errors['email'] ?> </div>
                
                
                </div>
                <div class="form-group">

                    <label for="password">Password</label>
                    <input type="password" id="password"name="password" class="form-control <?= $errors['password'] ? 'is-invalid' : ''?>"  placeholder="Insire a Password" >
                    <div class="invalid-feedback"> <?= $errors['password'] ?> </div>
                  
                </div>
            </div>
            <div class="card-footer">
                    <button class="btn btn-lg text-white d-flex" >Confirmar</button>
            </div>
            


        </div>

    </form>
       
        
        
        
        
        <!-- Footer-->
  
   
        

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
