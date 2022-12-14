<?php

include ("../conexion.php");
$nocuenta = $_POST["id"];
$tmpName = $_FILES["webcam"]["tmp_name"];
$imageName = date("Y.m.d")." - ". date("h.i.sa").'.jpeg';
if (isset($_FILES["webcam"]["tmp_name"])){

    move_uploaded_file($tmpName, '../procesos/imgcr/'.$imageName);

    $date = date("Y/m/d") . " & " . date("h:i:sa");
    $query = "INSERT INTO fotos VALUES ('','$nocuenta','$date','$imageName')";
    mysqli_query($conexion, $query);


}

?>