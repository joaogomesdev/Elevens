<?php 

include "db.inc.php";
$query="pendente";
$sql = "SELECT id_client , username , opiniao , DATE_FORMAT(created_at, '%d/%m/%Y') as dateTotal, status     FROM opinioes";
    $opinioes = mysqli_query( $conn, $sql);
    $resultCheck = mysqli_num_rows($opinioes);

?>