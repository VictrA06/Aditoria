<?php
    $id = $_REQUEST['id'];  
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
        <title>Registro</title>

        <!-- Third party style sheets -->
        <link href="../css/lib/bootstrap.min.css" rel="stylesheet">
        <link href="../css/lib/font-awesome.min.css" rel="stylesheet">
        <!-- CSS Custom Files -->
        <link href="../css/generados/login.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/index.css">
        <title>Instituto Tecnológico de Toluca</title>
        <link rel="stylesheet" href="../css/index.css">
        <link rel="stylesheet" href="../css/bootstrapXP.1657320049.css"rel="stylesheet">
        <link rel="stylesheet" href="../css/tecnm.1645744063.css" media="screen" rel="stylesheet">
        <link rel="shortcut icon" href="/favicon.ico?v=1642175403"/>
        <link rel="icon" type="image/png" href="/favicon-16.1642175694.png" sizes="16x16"/>
        <link rel="icon" type="image/png" href="/favicon-32.1642175700.png" sizes="32x32"/>
        <link rel="icon" type="image/png" href="/favicon-192.1642175711.png" sizes="192x192"/>
        <link rel="icon" type="image/png" href="/favicon-512.1642175719.png" sizes="512x512"/>
        <link rel="apple-touch-icon" href="/apple-touch-icon-120x120.png?v=1642175697" sizes="120x120"/>
        <link rel="apple-touch-icon" href="/apple-touch-icon-152x152.png?v=1642175705" sizes="152x152"/>
        <link rel="apple-touch-icon" href="/apple-touch-icon.png?v=1642175715" sizes="180x180"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" rel="stylesheet"/>
        <link type="text/css" href="//fonts.googleapis.com/css?family=Lato:300,400,700|Montserrat:300,400,500,600,700" rel="stylesheet"/>
            
        <link rel="alternate" hreflang="es-mx" href="https://www.tolucatecnm.mx/" />

        <style type="text/css">
                body{
                    background-color:#FFF;
                }
            </style> 

        <link rel="icon" href="../img/ITTLogo.png">
    </head>
    
    <body onload="configure();">
        

<div class="container" align="center">
    <img src="../banners/header.png" class="img-responsive" alt="Responsive image">  
</div> 

        <div class="container">

            
            <!-- Main page content -->
            <div class="row">
                <div class="col-sm-offset-4 col-sm-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">Registrar</div>
                        </div>
                        <div class="panel-body">
                            <form action="" method="POST" enctype="multipart/form-data">

                                <label for="">Fotografía</label>
                                <div class="contcam">
                                    <div id="camara">

                                    </div>
                                    <div id="results" style="visibility: hidden; position:absolute;">

                                    </div>
                                    <br>
                                    <button type="submite" onclick = "guardarCaptura();" class="btn btn-primary pull-left">Tomar Foto </button>   
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Script-->

        <script type="text/javascript" src="../assets/webcam.min.js"></script>
        <script type="text/javascript">
            function configure(){
                Webcam.set({
                    width:380,
                    height:378,
                    image_format: 'jpeg',
                    jpeg_quality:90
                });

                Webcam.attach('#camara');
                
            }

            function guardarCaptura() {

                Webcam.snap(function(data_uri){
                    document.getElementById('results').innerHTML=
                    '<img id="webcam" src = "'+data_uri+'">';
                });

                Webcam.reset();

                var base64image = document.getElementById("webcam").src;

                Webcam.upload(base64image, 'function.php', function(code,text){
                    
                    alert('Se ha guardado la imagen');
                });
            }
 
        </script>

            <!-- Page footer -->
            <footer class="text-center">
                <div >
                    <br><br>
                    <p>
                        Instituto Tecnológico de Toluca |
                        <a href="//www.ittoluca.edu.mx">www.ittoluca.edu.mx</a> <br>
                        Instituto Tecnológico de Toluca -
                        Algunos derechos reservados © 2013 <br><br>

                        <center><img   class="img-responsive " alt="Responsive image" src="../banners/footer.png" title="footer"></center>
                    </p>
                    <br>
                    <p>
                        Av. Tecnológico s/n. Fraccionamiento La Virgen <br>
                        Metepec, Edo. De México, México C.P. 52149 <br>
                        Tel. (52) (722) 2 08 72 00
                    </p>
                </div>
            </footer>
        </div>
 
    </body>

    
</html>
