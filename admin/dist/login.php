<?php 
ini_set('display_errors' , 0 );
session_start();

$email = $_POST['email'];
$pass = $_POST['pass'];

if($_POST['email']) {
    $users = [
        [
            "nome" => "João Gomes",
            "email" => "joaopfg.2002@gmail.com",
            "pass" => "123",
        ],
        [
            "nome" => "Ana Maria",
            "email" => "ana@gmail.com",
            "pass" => "1234",
        ],
    ];

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

    if(!$_SESSION['user']) {
        $_SESSION['erros'] = ['Email/Password inválido!'];
    }
}
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Page Title - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>


        <style>
.float{
  z-index: 1000;
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
	background-color: #f50057;
	color:#FFF;
	border-radius:50px;
	text-align:center;
	box-shadow: 2px 2px 1px black;
}

.my-float{
	margin-top: 10px;
}



        </style>
    </head>

    <a href="./../../index.php" class="float"><i class="fas fa-home fa-2x my-float"></i></a>

    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Identique-se</h3></div>
                                    <div class="card-body">
                                        <?php if ($_SESSION['erros']): ?>
                                            <div class="erros">
                                               <?php foreach ($_SESSION['erros'] as $erro): ?>
                                                   <p><?= $erro ?></p>
                                                  <?php endforeach ?>
                                                     </div>
                                                  <?php endif ?>
                                        <form action="#"  method="post">
                                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Email</label><input class="form-control py-4" id="inputEmailAddress" type="email" name="email" id="email" placeholder="Enter email address" /></div>
                                            <div class="form-group"><label class="small mb-1" for="inputPassword">Password</label><input class="form-control py-4" id="inputPassword" type="password" name="pass" id="pass" placeholder="Enter password" /></div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox"><input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" /><label class="custom-control-label" for="rememberPasswordCheck">Remember password</label></div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"><button>Login</button></div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <?php include "../../assets/content/footer.php"?>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
