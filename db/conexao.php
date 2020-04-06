<?php

function novaConexao($banco = 'elevensbd') {
    $servidor = 'localhost';
    $user = 'root';
    $pass = '';

    $conexao = new mysqli($servidor, $user, $pass, $banco);

    if($conexao->connect_error) {
        die('Erro: ' . $conexao->connect_error);
    }

    return $conexao;
}