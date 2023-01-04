<?php
include ("../conexion.php");
$tmpName = $_FILES["webcam"]["tmp_name"];
unlink('imgcr/foto.png');
$imageName = 'foto'.'.png';
move_uploaded_file($tmpName, '../procesos/imgcr/'.$imageName);

?>