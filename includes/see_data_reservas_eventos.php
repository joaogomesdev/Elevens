<?php

require 'db.inc.php';
setlocale(LC_ALL, 'pt_BR');
$id = $_SESSION['userId'];


if($_SESSION['userStatus'] == 'admin'){

    $sql = "SELECT id,id_client,id_evento, client_name ,number_pessoas,DATE_FORMAT(date_reserva, '%d/%m/%Y') as dateTotal, DATE_FORMAT(date_reserva, '%m/%Y') as date,DATE_FORMAT(date_reserva, '%d') as dia, DATE_FORMAT(time_reserva, '%H:%i') as time, nome_evento, client_email, number_pessoas, client_phone, observacoes, created_at, updated_at, status FROM reservas_eventos";
    $result = mysqli_query( $conn, $sql);
    $resultCheck = mysqli_num_rows($result);
}
else{
    $sql = "SELECT id,id_client,id_evento, client_name ,number_pessoas,DATE_FORMAT(date_reserva, 'd/%m/%Y') as dateTotal, DATE_FORMAT(date_reserva, '%m/%Y') as date,DATE_FORMAT(date_reserva, '%d') as dia, DATE_FORMAT(time_reserva, '%H:%i') as time, nome_evento, client_email,number_pessoas, client_phone, observacoes, created_at, updated_at, status FROM reservas_eventos WHERE id_client=$id";
    $result = mysqli_query( $conn, $sql);
    $resultCheck = mysqli_num_rows($result);
}




 





