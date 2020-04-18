<?php

if(isset($_POST['recoverPassword-submit'])){

        //tokens para a password

        $selector = bin2hex(random_bytes(8));//n of bites
        $token = random_bytes(32);



        $link = "http://localhost/Elevens/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);

        $exepires = date("U") + 1800;
        
        require "db.inc.php";

        $userEmail = $_POST['email'];

        $sql="DELETE FROM pass_reset WHERE passResetEmail=?";
        $stmt= mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){

            echo "Error de conexão a db";
            exit();

        } else{
            mysqli_stmt_bind_param($stmt, 's' , $userEmail);
            mysqli_stmt_execute($stmt);
        }

        $sql = "INSERT INTO pass_reset (passResetEmail, passResetSelector, passResetToken,  passResetExpires) VALUES(?,?,?,?)";


        $stmt= mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){

            echo "Error de conexao a db ao inserir";
            exit();

        } else{

            $incriptToken = password_hash($token, PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt, 'ssss' , $userEmail, $selector, $incriptToken, $exepires );
            mysqli_stmt_execute($stmt);
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        


        $para = $userEmail;

        $subject = 'Pedido de mudança de senha para Elevens Caffé WebSite';

        $message = '<p>Recebemos um pedido de mudança da sua senha. O link apra muda-la está abaixo. Se não pediu por favor ignore o e-mail</p>';
        $message .= '<p>Clique aqui para mudar a sua senha: </br>';
        $message .= '<a href="' . $link . '">' . $link . '</a><p>';
        

        $headers = "De : <joaogomes.email@gmail.com>\r\n";//mudar para email do elevens
        $headers .= "Para: <joaogomes.email@gmail.com>\r\n";//email do user
        $headers .= "Conteudo: text/html\r\n";

        mail($para, $subject, $message, $headers);

        header('Location: ../reset_pass_request.php?reset=success');



        
}
else{

    header("Location: ../index.php");
}