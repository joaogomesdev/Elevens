<?php

require 'db.inc.php';
setlocale(LC_ALL, 'pt_BR');
$id = $_SESSION['userId'];


if($_SESSION['userStatus'] == 'admin'){

    $sql = "SELECT id,title ,descricao,  DATE_FORMAT(data, '%d/%m/%Y') as dateTotal, DATE_FORMAT(data, '%m/%Y') as date , DATE_FORMAT(data, '%d') as dia, hora as time , evento_status FROM eventos";
    $result = mysqli_query( $conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    
}




 





