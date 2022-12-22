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
                             Registro de Pagos
                        </strong>
                    </h3>
                </div>
                <div class="panel-body">
                    <button class="btn btn-primary" id="new-sale">
                        <i class="glyphicon glyphicon-plus"></i> Nuevo Pagos
                    </button>
                    <br><br>
                    <table class="table table-condensed table-bordered table-striped table-hover" id="table-sale">
                        <thead>
                            <tr>
                                <th>Fecha y hora</th>
                                <th>Periodo</th>
                                <th>Numero de Pago</th>
                                <th>No. Cuenta</th>
                                <th>Nombre</th>
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