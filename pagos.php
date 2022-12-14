            <?php
                include_once('templates/header.php');
                include_once('classes/sales.php'); 
                $sales = new Sales;
            ?>
            <div class="row">
            <br>
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3>
                            <strong>
                                <i class="glyphicon glyphicon-shopping-cart"></i> Registro de Ventas
                            </strong>
                        </h3>
                    </div>
                       <div class="panel-body">
                        <button class="btn btn-primary" id="new-sale">
                            <i class="glyphicon glyphicon-plus"></i> Nueva venta
                        </button>
                        <br><br>
                        <table class="table table-condensed table-bordered table-striped table-hover" id="table-sale">
                            <thead>
                                <tr>
                                    <th>Fecha y hora</th>
                                    <th>Serie</th>
                                    <th>Numero</th>
                                    <th>RUC/DNI</th>
                                    <th>Razon social</th>
                                    <th>Total</th>
                                    <th width="250px">Opcion</th>
                                </tr>
                            </thead>
                            <tbody><?=$sales->get_data();?></tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
<?php include_once('templates/footer.php'); ?>

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