<?php

    session_start();

    //montagem do texto
    $titulo = str_replace( '#', '-' , $_POST['titulo']);
    $categoria = str_replace( '#', '-' , $_POST['categoria']);
    $descricao = str_replace( '#', '-' , $_POST['descricao']);

    //implode ('#' , $_POST);
    
    $text = $_SESSION['id'] . '#' . $titulo . '#' .  $categoria . '#' . $descricao . PHP_EOL;//php end of line

    //abre o aquivo
    $arquivo = fopen('../../../Elevens/arquivo.txt' , 'a');
    //escrever no arquivo
    fwrite($arquivo , $text);
    //fechar o arquivo
    fclose($arquivo);

    header('Location: colocar_duvida.php');


    //echo $text;


?>