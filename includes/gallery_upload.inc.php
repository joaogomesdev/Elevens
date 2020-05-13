<?php

if(isset($_POST['submit-foto'])){


$newFileName = $_POST['filename']; 

if(empty($_POST['filename'])){

    $newFileName = 'Foto';

}else{

    $newFileName = strtolower(str_replace(" " , "-" , $newFileName));

}

$imageTitle = $_POST['filetitulo']; 
$imageCateg = $_POST['filecategoria']; 
$imageDesc = $_POST['filedescricao'];

$file = $_FILES['file'];

$fileName = $file["name"];
$fileType = $file["type"];
$fileTempName = $file["tmp_name"];
$fileError = $file["error"];
$fileSize = $file["size"];

$fileExt = explode(".", $fileName);
$fileActualExt = strtolower(end($fileExt));
//tipo de foto que aceitamos 
$allowed = array("jpg" , "jpeg" , "png");

if (in_array($fileActualExt, $allowed)) {

    if ($fileError === 0) {
        if($fileSize < 2000000){

                $imageFullName =  $newFileName . "." . uniqid( "", true) . "." . $fileActualExt;

                $fileDestinacion = "../assets/img/gallery/" . $imageFullName;

                include_once "db.inc.php";

                if (empty($imageTitle) || empty($imageCateg) || empty($imageDesc)) {

                    header("Location: ../index.php?emptyFields");
                    exit();

                }else{
                        $sql = "SELECT * FROM galeria";
                        $stmt = mysqli_stmt_init($conn);

                        if(!mysqli_stmt_prepare($stmt, $sql)){

                            header("Location: ../index.php?sqlierror");
                            exit();

                        }else{
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);
                            $rowCount = mysqli_num_rows($result);
                            $setImageOrder = $rowCount + 1;
                            
                           $sql = "INSERT INTO galeria(tituloFoto, categoriaFoto, descFoto, imgFullNameFoto, orderFoto) VALUES(?,?,?,?,?);";

                           if(!mysqli_stmt_prepare($stmt, $sql)){

                            header("Location: ../index.php?sqlierror");
                            exit();

                             }else{

                                mysqli_stmt_bind_param($stmt, "sssss", $imageTitle, $imageCateg,$imageDesc, $imageFullName,$setImageOrder );
                                mysqli_stmt_execute($stmt);

                                move_uploaded_file($fileTempName, $fileDestinacion);

                                header("Location: ../index.php?upload=sucess");
                              exit();

                             }


                        }



                }

        }else{
            header("Location: ../index.php?fileSizeToBig");
            exit();

        }
    }else{
        header("Location: ../index.php?errorImage");
        exit();
    }

   
}else{

    header("Location: ../index.php?typeFile");
    exit();

}

}else{

    header("Location: ../index.php?acesso=negado");
    exit();
}