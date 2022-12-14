<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

$id = $_REQUEST['id'];

$server = "localhost";
    $username="root";
    $password="";
    $dbname="bd_alberca";

    $conn = new mysqli($server,$username,$password,$dbname);

    if($conn->connect_error){
        die("Connection failed" .$conn->connect_error);
    }

    $query = "SELECT correo FROM usuarios WHERE nocuenta = '$id'";
    $query = $conn->query($query);
    while ($row = $query->fetch_assoc()){
        $row['correo'];



try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
    $mail->isSMTP();      
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = false;
    $mail->Username = 'tecnatacion0@gmail.com';
    $mail->Password = 'lfsgvhshzvmzfzrg';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;


    $mail->setFrom('tecnatacion0@gmail.com', 'SMART CODE');
    $mail->addAddress($row['correo'],'COMPRAS CDP');
    $mail->addCC('vicplatino@hotmail.com');

    $mail->addAttachment('C:/Users/VictorBack/Downloads/credencial.pdf','Credencial.pdf');

    $mail->isHTML(true);
    $mail->Subject = 'Credencial';
    $mail->Body = 'No regrese este mensaje';
    $mail->send();

    echo 'Correo enviado';
} catch (Exception $e) {
    echo 'Mensaje ' . $mail->ErrorInfo;
}
    }
