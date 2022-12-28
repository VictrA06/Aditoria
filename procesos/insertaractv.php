<?php
    
    include("../conexion.php");

    $noactv = $_POST["clave"];
    $nombreactv = $_POST["nombre"];
    $precio = $_POST["precio"];

    $query = "INSERT INTO actividades(id_actv, nombre_actv, precio) VALUES ('$noactv','$nombreactv','$precio')";

    $resultado = $conexion ->query($query);

    $query = "INSERT INTO tbl_producto(producto_descripcion, producto_id ,producto_precio,producto_estado) VALUES ('$nombreactv','$noactv','$precio','1')";

    $resultado = $conexion ->query($query);

    if ($resultado){
        echo "<script>alert('Actividad Agregada'); window.location='../agregaractv.php'</script>";
    }else{
        echo "<script>alert('Error'); window.location='../agregaractv.php'</script>";
    }

   
?>