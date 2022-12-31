<?php 
    include('../conexion.php');

    session_start();

    $correo = $_POST['correo'];
    $passwd = $_POST['itt_password'];

    $sql = "SELECT * FROM usuarios WHERE correo = '$correo' AND pass='$passwd'";

    $resultado = $conexion ->query($sql);

    $row = $resultado->fetch_assoc();

    if ($row['correo'] == $correo && $row['pass'] == $passwd) {
        if($row['tipousu']=="Administrativo"){
            $id=$_POST['nocuenta'];
            
            $_SESSION['correo'] = $correo;
            header("Location:indexad.php?id=$id");
        
        }else{
            
            $_SESSION['correo'] = $correo;
            header("Location:indexus.php?id=$id");
        }
            
        }else{
            header("Location:../login.php");

        }

    if ($resultado->num_rows > 0) {
        # code...
        echo 'Usuario Correcto';
    }else {
        echo 'El usuario no existe';
    }

?>