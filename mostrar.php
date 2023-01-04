<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
        <title>Usuarios</title>

        <!-- Third party style sheets -->
        <link href="css/lib/bootstrap.min.css" rel="stylesheet">
        <link href="css/lib/font-awesome.min.css" rel="stylesheet">

        <!-- CSS Custom Files -->
        <link rel="stylesheet" href="css/index.css">
        
        <title>Instituto Tecnológico de Toluca</title>
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/bootstrapXP.1657320049.css"rel="stylesheet">
        <link rel="stylesheet" href="css/tecnm.1645744063.css" media="screen" rel="stylesheet">
        <link rel="shortcut icon" href="/favicon.ico?v=1642175403"/>
        <link rel="icon" type="image/png" href="/favicon-16.1642175694.png" sizes="16x16"/>
        <link rel="icon" type="image/png" href="/favicon-32.1642175700.png" sizes="32x32"/>
        <link rel="icon" type="image/png" href="/favicon-192.1642175711.png" sizes="192x192"/>
        <link rel="icon" type="image/png" href="/favicon-512.1642175719.png" sizes="512x512"/>
        <link rel="apple-touch-icon" href="/apple-touch-icon-120x120.png?v=1642175697" sizes="120x120"/>
        <link rel="apple-touch-icon" href="/apple-touch-icon-152x152.png?v=1642175705" sizes="152x152"/>
        <link rel="apple-touch-icon" href="/apple-touch-icon.png?v=1642175715" sizes="180x180"/>
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link rel="canonical" href="https://www.tolucatecnm.mx/" />
        <meta name="description" content=""/>
        <meta name="keywords" content="Instituto Tecnológico de Toluca, "/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
        <meta property="og:title" content="Instituto Tecnológico de Toluca"/>
        <meta property="og:site_name" content="tolucatecnm.mx"/>
        <meta property="og:url" content="https://www.tolucatecnm.mx/"/>
        <meta property="og:description" content=""/>
        <meta property="og:type" content="website"/>
        <meta name="twitter:card" content="summary_large_image"/>
        <meta name="twitter:title" content="Instituto Tecnológico de Toluca"/>
        <meta name="twitter:description" content=""/>
        <meta name="twitter:type" content="website"/>
        <meta property="og:image" content="https://www.tolucatecnm.mx/images/logo.jpg"/>
        <meta name="twitter:image" content="https://www.tolucatecnm.mx/images/logo.jpg"/>
        <meta property="og:image:width" content="209"/>
        <meta property="og:image:height" content="96"/>
        <meta property="og:image:alt" content="Instituto Tecnológico de Toluca"/>
        <meta name="theme-color" content="#1B396A"/>
        <meta name="robots" content="index,follow"/>
        <link type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans:400,300,700" rel="stylesheet"/>
        <link type="text/css" href="//fonts.googleapis.com/css?family=Lato:300,400,700|Montserrat:300,400,500,600,700" rel="stylesheet"/>
        <link type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet"/>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="lazy/jquery.lazy.min.1639604795.js"></script>
        <script type="text/javascript" src="//kit.fontawesome.com/feeb80352d.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="bgRotator/bgRotator.1639604788.js"></script>
        <script type="text/javascript" src="js/init_banner.1639680509.js"></script>
            
        <script>
        var lang = $('html').attr('lang');
        if ($.fn.lazy) { 
        $(function(){ $('.lazy').lazy(); }); 
        } else{ 
        console.log("lazy not found");
        }
        </script>
        <link rel="alternate" hreflang="es-mx" href="https://www.tolucatecnm.mx/" />
        <style type="text/css">
                body{
                    background-color:#FFF;
                }
            </style> 

        <link rel="icon" href="img/ITTLogo.png">
        <title>Usuarios Internos</title>
    </head>
    <body>
        


<div class="container" align="center">
    <img src="banners/header.png" class="img-responsive" alt="Responsive image">  
</div>  

<center>

    <table class="tableUsi" >
        <thead >
            <tr>
                <th>No.Cuenta</th>
                <th>Usuario</th>
                <th>Tipo Usuario</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Horario</th>
                <th>Correo</th>
                <th>Fotografía</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include("conexion.php");
                $query = "SELECT * FROM usuarios";
                $resultado = $conexion->query($query);
                while ($row = $resultado->fetch_assoc()){

            ?>
                <tr>
                    <td><?php echo $row['nocuenta'];?></td>
                    <td><?php echo $row['usuario'];?></td>
                    <td><?php echo $row['tipousu'];?></td>
                    <td><?php echo $row['nombre'];?></td>
                    <td><?php echo $row['apellido_pat'];?></td>
                    <td><?php echo $row['apellido_mat'];?></td>
                    <td><?php echo $row['horario'];?></td>
                    <td><?php echo $row['correo'];?></td>
                    <td><img height="80px"src="data:image/png;base64,<?php echo base64_encode ($row['imagen']);?>"/></td>
                    <th><a href="procesos/editar.php?id= <?php echo $row['nocuenta'];?>">Editar</a></th>
                    <th><a href="procesos/proceso_eliminar.php?id=<?php echo $row['nocuenta'];?>">Eliminar</a></th>
                    <th><a href="procesos/credencial.php?id=<?php echo $row['nocuenta']; ?>">Credencial</a></th>
                </tr>
            <?php
                }
            ?>

        </tbody>
    </table>
</center>
            <!-- Page footer -->
            <footer class="text-center">
                <div >
                    <br><br>
                    <p>
                        Instituto Tecnológico de Toluca |
                        <a href="//www.ittoluca.edu.mx">www.ittoluca.edu.mx</a> <br>
                        Instituto Tecnológico de Toluca -
                        Algunos derechos reservados © 2013 <br><br>

                        <center><img   class="img-responsive " alt="Responsive image" src="banners/footer.png" title="footer"></center>
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

        <!-- Third party scripts -->
        <script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="js/lib/bootstrap.min.js"></script>

        <!-- Custom scripts -->
        <script type="text/javascript" src="js/login.js"></script>
    </body>
</html>