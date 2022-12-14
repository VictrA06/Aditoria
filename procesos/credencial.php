<?php

$id = $_REQUEST['id'];

require_once ('../vendor/autoload.php');

include('qr.php');

include('fotocredencial.php');

require_once ('credeforma.php');

$css = file_get_contents('../css/estilos.css');

require_once ('datos.php');

$mpdf = new \Mpdf\Mpdf([

]);

$plantilla = getPlantilla($datos);

$mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->writeHtml($plantilla, \Mpdf\HTMLParserMode::HTML_BODY);

$mpdf->Output("credencial.pdf","D");