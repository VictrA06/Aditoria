<?php
    
    include("../conexion.php");

    $id = $_REQUEST['clave'];

    $noactv = $_POST["clave"];
    $nombreactv = $_POST["nombre"];
    $precio = $_POST["precio"];

    $query = "UPDATE actividades SET nombre_actv='$nombreactv', precio='$precio' WHERE id_actv = '$id'";
    
    $resultado = $conexion ->query($query);

    $query = "UPDATE tbl_producto SET producto_descripcion='$nombreactv',producto_precio ='$precio' WHERE producto_id = '$id'";
    
    $resultado = $conexion ->query($query);

    if ($resultado){
        echo "<script>alert('Actividad Modificada!'); window.location='../agregaractv.php'</script>";
    }else{
        printf("Errormessage: %s\n", mysqli_error($conexion));
    }

   
?>