<?php
    session_start();

    /*
    echo "<pre>";
    print_r($_SESSION);
    echo "<pre>";

    //remover indices do array de sessão

    unset($_SESSION['x']); // remove o indice apenas se existir

    echo "<pre>";
    print_r($_SESSION);
    echo "<pre>";

    //destruir a sessao

    session_destroy();// será destruida
    //forçar um rederecionamento



    echo "<pre>";
    print_r($_SESSION);
    echo "<pre>";
    */


    session_destroy();
    header('Location: ../index.php');

?>