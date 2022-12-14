<?php
    session_start();
    $server = "localhost";
    $username="root";
    $password="";
    $dbname="bd_alberca";

    $conn = new mysqli($server,$username,$password,$dbname);

    if($conn->connect_error){
        die("Connection failed" .$conn->connect_error);
    }

    if(isset($_POST['nocuenta'])){
        
        $nocuenta =$_POST['nocuenta'];
		$date = date('Y-m-d');
		$time = date('H:i:s A');

		$sql = "SELECT * FROM usuarios WHERE nocuenta = '$nocuenta'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'No se puede encontrar el número de Qr '.$nocuenta;
		}else{
				$row = $query->fetch_assoc();
				$id = $row['nocuenta'];
				$sql ="SELECT * FROM asistencia WHERE nocuenta='$id' AND fecha='$date' AND STATUS='0'";
				$query=$conn->query($sql);
				if($query->num_rows>0){
				$sql = "UPDATE asistencia SET TIMEOUT='$time', STATUS='1' WHERE nocuenta='$nocuenta' AND fecha='$date'";
				$query=$conn->query($sql);
				$_SESSION['success'] = 'Salida Registrada: '.$row['apellido_pat'].' '.$row['nombre'];
			}else{
					$sql = "INSERT INTO asistencia(nocuenta,entrada,fecha,STATUS) VALUES('$nocuenta','$time','$date','0')";
					if($conn->query($sql) ===TRUE){
					 $_SESSION['success'] = 'Entrada Registada: '.$row['apellido_pat'].' '.$row['nombre'];
					 
			 }else{
			  $_SESSION['error'] = $conn->error;
		   }	
		}
	}

	}else{
		$_SESSION['error'] = 'Escane su número de código QR';
}
header("location: Checador.php");
	   
$conn->close();
?>