<?php

    session_start();




    //variavel que verifica se a autenticação foi realizada
    $user_aut = false;
    $user_id = null;
    $profiles = array(

        1 => 'Administrativo',
        2 => 'User',
    );
    $user_profile_id = null;

    //users do sistema sem bd

    $users_app = array(

        array(
            'id' => 1,
            'email' => "admin@gmail.com",
            'password' => 'admin123',
            'profile_id' => 1,
         ),
         
        array(
            'id' => 2,
            'email' => "user@gmail.com",
            'password' => '123',
            'profile_id' => 1,
         ),

        array(
            'id' => 3,
            'email' => "joao@gmail.com",
            'password' => '123',
            'profile_id' => 2,
         ),
         
        array(
            'id' => 4,
            'email' => "ana@gmail.com",
            'password' => '123',
            'profile_id' => 2,
         ),

    );

    foreach($users_app as $user){

        if($user['email'] == $_POST['email'] && $user['password'] == $_POST['password']){
            $user_aut = true;
            $user_id = $user['id'];
            $user_profile_id = $user['profile_id'];
        }   

    }

    if($user_aut){

        echo 'User authenticated';
        
        $_SESSION['authenticated'] = 'SIM';
        $_SESSION['id'] = $user_id;
        $_SESSION['profile_id'] = $user_profile_id;
        header('Location: home.php');

    }  else {

        $_SESSION['authenticated'] = 'Não';
        header('Location: index.php?login=erro2');

    }
    
  

  
?>