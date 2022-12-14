<?php
$id = $_REQUEST['id'];

$datos = array();

$server = "localhost";
$username="root";
$password="";
$dbname="bd_alberca";

$conn = new mysqli($server,$username,$password,$dbname);

$conn->set_charset('utf8');
$statement = $conn->prepare("SELECT nocuenta , nombre , apellido_pat, apellido_mat FROM usuarios WHERE nocuenta = '$id'");
$statement->execute();
$resultado = $statement->get_result();
while($row = $resultado->fetch_assoc()) $datos[ ] = $row;
$conn -> close();

