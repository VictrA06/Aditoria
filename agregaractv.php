<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
        <title>Nueva Actividad</title>

        <!-- Third party style sheets -->
        <link href="css/lib/bootstrap.min.css" rel="stylesheet">
        <link href="css/lib/font-awesome.min.css" rel="stylesheet">
        <!-- CSS Custom Files -->
        <link href="css/generados/login.css" rel="stylesheet">
        <link rel="stylesheet" href="css/index.css">
        <title>Instituto Tecnológico de Toluca</title>
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/tecnm.1645744063.css" media="screen" rel="stylesheet">
        <link rel="shortcut icon" href="/favicon.ico?v=1642175403"/>
        <link rel="icon" type="image/png" href="/favicon-16.1642175694.png" sizes="16x16"/>
        <link rel="icon" type="image/png" href="/favicon-32.1642175700.png" sizes="32x32"/>
        <link rel="icon" type="image/png" href="/favicon-192.1642175711.png" sizes="192x192"/>
        <link rel="icon" type="image/png" href="/favicon-512.1642175719.png" sizes="512x512"/>
        <link rel="apple-touch-icon" href="/apple-touch-icon-120x120.png?v=1642175697" sizes="120x120"/>
        <link rel="apple-touch-icon" href="/apple-touch-icon-152x152.png?v=1642175705" sizes="152x152"/>
        <link rel="apple-touch-icon" href="/apple-touch-icon.png?v=1642175715" sizes="180x180"/>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
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
            
        <link rel="alternate" hreflang="es-mx" href="https://www.tolucatecnm.mx/" />
        <style type="text/css">
                body{
                    background-color:#FFF;
                }
            </style> 

    </head>
    <body>
        


<div class="container" align="center">
    <img src="banners/header.png" class="img-responsive" alt="Responsive image">  
</div> 

        <div class="container">
           

            <!-- Navigation bar -->
            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">

                    <!-- Brand and toggle get grouped for better display -->
    
                    
                  <ul class="superior-menu">
                    <a class="navbar-brand" href="index.html">Inicio</a>  
                </ul>


                </div>

                    <!-- Nav links and other content for toggling -->
                    <!--<div class="collapse navbar-collapse" id="itt-collapsable-menu">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active">
                                <a href="/">Iniciar Sesión</a>
                            </li>
                        </ul>
                    </div>-->
                </div>
            </nav>
             <div class="container">
             <h1>Agregar una nueva actividad</h1>
                <form action="procesos/insertaractv.php" class="col-6" method="post">
                    <label>Clave de la Actividad</label>
                    <input type="text" class="form-control" name="clave" required pattern="[0-9]{8,8}" maxlength="8" title="La clave debe ser de 8 digitos">
                    <label>Nombre de la Actividad</label>
                    <input type="text" class="form-control" name="nombre" required pattern="[a-zA-Z]{4,30}" maxlength="30" title="El nombre de la actividad debe ser mayor a 5 caracteres">
                    <label>Precio de la actividad</label>
                    <input type="number" class="form-control" name="precio" required title="Introduce solo numeros">
                    <br>
                    <div class="btnActv">
                        <input type="submit" class="btn btn-success" value="agregar"></input>

                    </div>

                </form>

                <div class="col-12 mt-5">
                    <table class="table table-striped" id="lista">
                        <tr>
                            <td>Clave</td>
                            <td>Actividad</td>
                            <td>Costo</td>
                            <td>Acciones</td>
                        </tr>
                        <tbody>
                            <?php
                                include("conexion.php");
                                $query = "SELECT * FROM actividades";
                                $resultado = $conexion->query($query);
                                while ($row = $resultado->fetch_assoc()){

                            ?>
                                <tr>
                                    <td><?php echo $row['id_actv'];?></td>
                                    <td><?php echo $row['nombre_actv'];?></td>
                                    <td>$ <?php echo $row['precio'];?></td>
                                    <th><a href="procesos/editaractv.php?id= <?php echo $row['id_actv'];?>"><img src="icos/edit.png" alt="Editar" width="20px" height="20px"></a></th>
                                    <th><a href="procesos/eliminaractv.php?id=<?php echo $row['id_actv'];?>"><img src="icos/borrar.png" alt="Eliminar" width="20px" height="20px"></a></th>
                                </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>

                </div>

             </div>
             <div class="col-10 text-right" id="total"></div>
             
             <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>





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

    </body>
</html>