<?php

require 'db.inc.php';

$id = $_SESSION['userId'];


if($_SESSION['userStatus'] == 'admin'){

    $sql = "SELECT id_reserva,id_client, client_name ,number_pessoas,DATE_FORMAT(date_reserva, '%d/%m/%Y') as date, DATE_FORMAT(time_reserva, '%H:%i') as time, categoria, client_email, client_phone, observacoes, created_at, updated_at, status FROM reservas";
    $result = mysqli_query( $conn, $sql);
    $resultCheck = mysqli_num_rows($result);
}
else{
    $sql = "SELECT id_reserva,id_client, client_name ,number_pessoas,DATE_FORMAT(date_reserva, '%d/%m/%Y') as date, DATE_FORMAT(time_reserva, '%H:%i') as time, categoria, client_email, client_phone, observacoes, created_at, updated_at, status FROM reservas WHERE id_client=$id";
    $result = mysqli_query( $conn, $sql);
    $resultCheck = mysqli_num_rows($result);
}



 





