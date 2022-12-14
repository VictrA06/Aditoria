<?php
    include ("conexion.php");
    $id = $_REQUEST['id'];
    $query = "DELETE FROM externos WHERE nocuenta = '$id'";

    $resultado = $conexion ->query($query);

    if ($resultado) {
        header ("Location: mostrarext.php");
    }else{
        echo "No se elimino";
    }
?>