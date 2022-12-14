<?php
    require '../phpqrcode/qrlib.php';
    $id = $_REQUEST['id'];

    $server = "localhost";
    $username="root";
    $password="";
    $dbname="bd_alberca";

    $conn = new mysqli($server,$username,$password,$dbname);

    if($conn->connect_error){
        die("Connection failed" .$conn->connect_error);
    }

    $query = "SELECT nocuenta, apellido_pat FROM usuarios WHERE nocuenta = '$id'";
    $query = $conn->query($query);
    while ($row = $query->fetch_assoc()){
        $row['nocuenta'];
        $row['apellido_pat'];

        $dir = 'qr/';
        
        unlink('qr/qr.png');

        if(file_exists($dir)){
            
            $filename = $dir.'qr.png'; 
    
            $tamanio = 7;
            $level = "M";
            $frameSize = 3;
    
            echo $row['nocuenta'] ;
    
            $contenido = $row['nocuenta'] ;
            QRcode :: png($contenido, $filename,$level,$tamanio,$frameSize);

            echo '<img src="'.$filename.'"/>';
        
        }else{
    
            mkdir($dir);
            
            $filename = $dir.'qr.png'; 
    
            $tamanio = 7;
            $level = "M";
            $frameSize = 3;
    
            echo $nocuenta ;
    
            $contenido = $nocuenta ;
            QRcode :: png($contenido, $filename,$level,$tamanio,$frameSize);

            echo '<img src="'.$filename.'"/>';

        }
    }

?>