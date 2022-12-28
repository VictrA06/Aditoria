<?php
    include ("../conexion.php");
    $id = $_REQUEST['id'];
    $query = "DELETE FROM usuarios WHERE nocuenta = '$id'";

    $resultado = $conexion ->query($query);

    $query = "DELETE FROM tbl_entidad WHERE entidad_id = '$id'";

    $resultado = $conexion ->query($query);

    if ($resultado) {
        header ("Location: ../mostrar.php");
    }else{
        echo "No se elimino";
    }
?>