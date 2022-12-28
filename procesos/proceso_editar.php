<?php
    
    include("../conexion.php");

    $id = $_REQUEST['id'];

    $nocuenta = $_POST["id"];
    $usuario = $_POST["usuario"];
    $tipousu = $_POST["tipoUs"];
    $nombre = $_POST["nombre"]; 
    $apellido_pat = $_POST["apellido_pat"];
    $apellido_mat = $_POST["apellido_mat"];
    $horario = $_POST["horario"];
    $correo = $_POST["correo"];
    $passwd = $_POST["itt_password"];
    $imagen = addslashes(file_get_contents($_FILES['foto']['tmp_name']));

    $query = "UPDATE usuarios SET usuario='$usuario', tipousu='$tipousu', nombre='$nombre', apellido_pat='$apellido_pat', apellido_mat='$apellido_mat', horario='$horario', correo='$correo', pass='$passwd', imagen='$imagen' WHERE nocuenta = '$id'";

    $resultado = $conexion ->query($query);

    $query = "UPDATE tbl_entidad SET  entidad_razon_social='$nombre $apellido_pat $apellido_mat', entidad_direccion='$correo' WHERE entidad_id = '$id'";

    $resultado = $conexion ->query($query);


    if ($resultado){
        echo "<script>alert('Usuario Modificado!'); window.location='../mostrar.php'</script>";
    }else{
        printf("Errormessage: %s\n", mysqli_error($conexion));
    }

   
?>