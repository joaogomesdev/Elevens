<?php
 if (!isset($_POST["recoverPassword-submit"])) {

    header("Location: ../autenticar.php");
    exit();

 }
   // print_r($_POST);

   require "./libs/PHPMailer/Exception.php";
   require "./libs/PHPMailer/OAuth.php";
   require "./libs/PHPMailer/PHPMailer.php";
   require "./libs/PHPMailer/POP3.php";
   require "./libs/PHPMailer/SMTP.php";

    //Instanciando os sNamespaces
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

   


    class Mensagem{

        private $para = null;
        private $assunto = null;
        private $mensagem = null;
        public $status = array(
            'codigo_status' => null,
            'descricao_status' => '',
        );


        public function __get($attr){

            return $this->$attr;

         }

         public function __set($attr, $value){

             $this->$attr = $value;

         }

         public function mensagemValida(){

                if( empty($this->para) || empty($this->assunto) || empty($this->mensagem)){

                    return false;

                }

                else return true;
         } 


    }

    function gerar_senha($tamanho, $maiusculas, $minusculas, $numeros, $simbolos){
        $ma = "ABCDEFGHIJKLMNOPQRSTUVYXWZ"; // $ma contem as letras maiúsculas
        $mi = "abcdefghijklmnopqrstuvyxwz"; // $mi contem as letras minusculas
        $nu = "0123456789"; // $nu contem os números
        $si = "!@#$%&*()_+="; // $si contem os símbolos
        $password="";
        if ($maiusculas){
            // se $maiusculas for "true", a variável $ma é embaralhada e adicionada para a variável $password
            $password .= str_shuffle($ma);
        }
    
        if ($minusculas){
            // se $minusculas for "true", a variável $mi é embaralhada e adicionada para a variável $password
            $password .= str_shuffle($mi);
        }
    
        if ($numeros){
            // se $numeros for "true", a variável $nu é embaralhada e adicionada para a variável $password
            $password .= str_shuffle($nu);
        }
    
        if ($simbolos){
            // se $simbolos for "true", a variável $si é embaralhada e adicionada para a variável $password
            $password .= str_shuffle($si);
        }
    
        // retorna a password embaralhada com "str_shuffle" com o tamanho definido pela variável $tamanho
        return substr(str_shuffle($password),0,$tamanho);
    }

    require '../includes/db.inc.php';

    $email=$_POST["email"]; // Recebe o username ou email do formulário Login
    $procura="select * from users where email='".$email."' ;";
    $result=mysqli_query($conn,$procura);
    $nregistos=mysqli_num_rows($result);
    $registo=mysqli_fetch_assoc($result);

if($nregistos==1){
    
    //  Este email existe na base de dados!";
    $email=$registo["email"]; //guarda email para quem será enviado o formulário
                              
// Função Gerar Senha		


$password=gerar_senha(10, true, true, true, true);
// echo $password; //Para verem na página a password que foi criada

//altera o registo com a nova password
$sql="UPDATE users SET password='".md5($password)."' where email='".$email."';";
$result=mysqli_query($conn,$sql);


    $mensagem = new Mensagem();
    $mensagem->__set('para' , $_POST['email']);
    $mensagem->__set('assunto' , "Recuperação de Password");
    $mensagem->__set('mensagem' , "Solicitou a requisição da sua password.
    A sua nova password é: $password;

    Por favor, não responda a este email. A sua única função é informar.
    Atenciosamente, Ellevens Staff");


}
    // print_r($mensagem);
    

    //criar objeto PHPMAILER
   if(!$mensagem->mensagemValida()){
       echo "Mensagem não é válida";
       header("Location: index.php?teste=erro");
   }

   $mail = new PHPMailer(true);

   try {
    //Server settings
    $mail->SMTPDebug = false;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'joaogomes.emails@gmail.com';                     // SMTP username
    $mail->Password   = 'joao_gomes!2020';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('joaogomes.emails@gmail.com', 'Elevens Staff');
    $mail->addAddress($mensagem->__get('para'));     // Add a recipient



    // $mail->addAddress('ellen@example.com');               // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com'); //copia
    // $mail->addBCC('bcc@example.com'); //copia oculta

    // Attachments - Anexo
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    $headers = "MIME-Version: 1.1/r/n";
	$headers .= "Content-type: text/plain; charset=iso-8859-1/r/n";
	$headers .= "From: Elevens Staff/r/n"; //Devem personalizar com o nome do vosso projeto
    $headers .= "Return-Path: User"; //Devem personalizar com o nome do vosso projeto
                    
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $mensagem->__get('assunto');
    $mail->Body    = $mensagem->__get('mensagem');
    $mail->AltBody = 'È necessario utilizar um client que suport HTML para ter acesso total ao conteúdo dessa mensagem';

    $mail->send();
    $mensagem->status['codigo_status'] = 1;
    $mensagem->status['descricao_status'] = 'E-Mail enviado com secesso';

   

} catch (Exception $e) {

    $mensagem->status['codigo_status'] = 2;
    $mensagem->status['descricao_status'] = 'Não foi possível enviar este e-mail! Por favor tente novamente mais tarde. Detalhes do erro: ' . $mail->ErrorInfo;

    //alguma lógica que armazene o erro para posterior análise por parte do programador
}
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
      <a class="navbar-brand" href="index.php">

          Elevens Caffé
      </a>

      <ul class="navbar-nav ml-auto my-2 my-lg-0">

      <li class="nav-item"><a class="btn btn-primary pt-2 pb-2 pr-3 text-white ml-2 mr-6 nav-link js-scroll-trigger" href="../index.php">Home</a></li>

</ul>

    </nav>

    <body>

<div class="container">


<div class="py-3 text-center">
<?php if($mensagem->status['codigo_status'] == 1) : ?>

<div class="container">
    <h1 class="display-4 text-success">Sucesso</h1>
    <p><?= $mensagem->status['descricao_status'] ?></p>
    <a href="../autenticar.php" class="btn btn-success btn-lg mt-5 text-white">Autenticar</a>
</div>

<?php endif ?>     

    <?php if($mensagem->status['codigo_status'] == 2) : ?>

    <div class="container">
        <h1 class="display-4 text-danger">Ups!</h1>
        <p><?= $mensagem->status['descricao_status'] ?></p>
        <a href="../autenticar.php" class="btn btn-danger btn-lg mt-5 text-white">Tentar Outra Vez</a>
    </div>

    <?php endif ?>     
</div>
  
</div>

</body>
</html>



                                  