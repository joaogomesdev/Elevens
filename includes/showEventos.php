<?php 

include "db.inc.php";

$sql = "SELECT * FROM eventos ";
    $result = mysqli_query( $conn, $sql);
    $resultCheck = mysqli_num_rows($result);

?>