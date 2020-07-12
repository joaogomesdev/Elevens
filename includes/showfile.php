<?php
include ('db.inc.php');


$query=" select name_img,type_img,size_img,data_img from users where id='".$_GET['user_id']."';"; 
//echo $query;

$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);

$tipo_foto=$row["type_img"];

$nome_foto=$row["name_img"];
$tam_foto=$row["size_img"];

header("Content-type:$tipo_foto");
//echo $row["data_img"];
//header("Content-lenght:$tam_foto");
//header("Content-Disposition: inline; filename=$nome_foto");
//header ("Content-Description: PHP Generated Data");
//echo $dados_foto;
$dados_foto=base64_decode($row["data_img"]);
//$im = imageCreateFromString($dados_foto);
echo $dados_foto;

?>
   
    