<?php
    
    include("../conexion.php");

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

    $query = "INSERT INTO usuarios(nocuenta, usuario, tipousu, nombre, apellido_pat, apellido_mat, horario, correo, pass, imagen) VALUES ('$nocuenta','$usuario','$tipousu','$nombre',
    '$apellido_pat','$apellido_mat','$horario','$correo','$passwd' , '$imagen')";

    $resultado = $conexion ->query($query);

    $query = "INSERT INTO tbl_entidad(entidad_ruc_dni, entidad_razon_social, entidad_direccion,entidad_estado) VALUES ('$nocuenta','$nombre $apellido_pat $apellido_mat','$correo','1')";

    $resultado = $conexion ->query($query);

    if ($resultado){
        echo "<script>alert('Bienvenido! solicita tu pago en ventanilla para continuar con el tramite'); window.location='../index.html'</script>";
    }else{
        echo "<script>alert('No.Cuenta incorrecto o existe alguien con ese numero de cuenta'); window.location='../altas.php'</script>";
    }

   
?>