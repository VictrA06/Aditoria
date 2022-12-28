<?php
    include ("../conexion.php");
    $id = $_REQUEST['id'];
    $query = "DELETE FROM actividades WHERE id_actv = '$id'";

    $query = "DELETE FROM tbl_producto WHERE id_actv = '$id'";

    $resultado = $conexion ->query($query);

    if ($resultado) {
        echo "<script>alert('Actividad Eliminada!'); window.location='../agregaractv.php'</script>";
    }else{
        echo "No se elimino";
    }
?>