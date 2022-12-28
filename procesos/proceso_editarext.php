<?php
    
    include("conexion.php");

    $id = $_REQUEST['id'];

    $nocuenta = $_POST["id"];
    $tipo = $_POST["tipo"];
    $nombre = $_POST["nombre"]; 
    $apellido_pat = $_POST["apellido_pat"];
    $apellido_mat = $_POST["apellido_mat"];
    $horario = $_POST["horario"];
    $correo = $_POST["correo"];
    $passwd = $_POST["itt_password"];
    $imagen = addslashes(file_get_contents($_FILES['foto']['tmp_name']));

    $query = "UPDATE externos SET tipo='$tipo', nombre='$nombre', apellido_pat='$apellido_pat', apellido_mat='$apellido_mat', horario='$horario', correo='$correo', pass='$passwd', imagen='$imagen' WHERE nocuenta = '$id'";

    $resultado = $conexion ->query($query);

    if ($resultado){
        echo "<script>alert('Acividad Modificada!'); window.location='mostrarext.php'</script>";
    }else{
        printf("Errormessage: %s\n", mysqli_error($conexion));
    }

   
?>