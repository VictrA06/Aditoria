	</div>

	<!-- SECTION MODALS -->
	<div class="modal fade" id="modal-sale" tabindex="-1" role="dialog">
	  	<div class="modal-dialog" role="document" style="min-width:900px;">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<h4 class="modal-title" id="myModalLabel">Registro/Edicion de Pagos</h4>
	      	</div>
	      	<div class="modal-body">
	      		<form id="sale-data">
	      			<input type="hidden" value="0" name="sale-id" style="display:none;">
		       		<table class="table-form">
		       			<tr>
		       				<td>
		       					<div class="input-group">
								  	<span class="input-group-addon">Fecha</span>
								  	<input type="date" value="<?=date('Y-m-d');?>" class="form-control input-sm" name="sale-date">
								</div>	
		       				</td>
		       				<td>
		       					<div class="input-group">
								  	<span class="input-group-addon">Periodo</span>
								  	<input type="text" class="form-control input-sm" maxlength="4" placeholder="Escribe..." value="2022-2023" name="sale-serie" readonly>
								</div>	
		       				</td>
		       				<td>
		       					<div class="input-group">
								  	<span class="input-group-addon"># Pago</span>
								  	<input type="text" class="form-control input-sm" maxlength="8" placeholder="Escribe..." name="sale-number" readonly>
								</div>
		       				</td>
		       			</tr>
		       			<tr>
		       				<td>
		       					<input type="text" class="hidden" name="entity-id" value="0">
		       					<div class="input-group">
								  	<span class="input-group-addon">No.Cuenta</span>
								  	<input type="text" class="form-control input-sm" name="entity-ruc-dni" maxlength="11" placeholder="Escribe...">
								</div>
		       				</td>
		       				<td>
		       					<div class="input-group">
								  	<span class="input-group-addon">Nombre</span>
								  	<input type="text" class="form-control input-sm" name="entity-social-name" maxlength="50" placeholder="Escribe...">
								</div>
		       				</td>	
		       				<td>
		       					<div class="input-group">
								  	<span class="input-group-addon">Correo</span>
								  	<input type="text" class="form-control input-sm" name="entity-address" maxlength="100" placeholder="Escribe...">
								</div>
		       				</td>
		       			</tr>
		       		</table>
	       		</form>
	       		<br>
	       		<table class="table table-condensed table-bordered table-striped table-hover table-form" id="table-detail">
                    <form id="form-detail-sale">
                    <thead>
                        <tr>
                            <th>Actividad</th>
                            <th width="100px" style="display:none;">Unidad</th>
                            <th width="100px">Precio</th>
                            <th width="100px">Cantidad</th>
                            <th width="100px">Subtotal</th>
                            <th width="80px">Opcion</th>
                        </tr>
                        <tr>
                        	<td>
                        		<input type="text" class="hidden" name="product-id" value="0">
                        		<input type="text" class="form-control input-sm" placeholder="Escribe..." name="product-description" required>
                        	</td>
                        	<td style="display:none;">
                        		<input type="text" class="form-control input-sm" placeholder="Escribe..." name="product-unit" value="Und" required>
                        	</td>
                        	<td>
                        		<input type="number" step="any" class="form-control input-sm" placeholder="Escribe..." name="product-price" onkeyup="calculate_detail();" value="0.00" required>
                        	</td>
                        	<td>
                        		<input type="number" step="any" class="form-control input-sm" placeholder="Escribe..." name="product-amount" onkeyup="calculate_detail();" value="1.00" required>
                        	</td>
                        	<td>
                        		<input type="number" step="any" class="form-control input-sm" name="product-subtotal" value="0.00" readonly>
                        	</td>
                        	<td>
                        		<button type="submit" class="btn btn-default btn-sm">
                        			<i class="glyphicon glyphicon-plus-sign"></i> Agregar
                        		</button>
                        	</td>
                        </tr>
                    </thead>
                	</form>
                    <tbody></tbody>
                    <tfoot>
                    	<tr>
                    		<th colspan="3" style="text-align:right;">Total</th>
                    		<td>
                    			<input type="number" step="any" class="form-control input-sm" name="product-total" value="0.00" readonly>
                    		</td>
                    		<td></td>
                    	</tr>
                    </tfoot>
                </table>
	      	</div>
	      	<div class="modal-footer">
	       	 	<button type="button" class="btn btn-default" data-dismiss="modal">
	       	 		<i class="glyphicon glyphicon-arrow-left"></i> Volver
	       	 	</button>
	        	<button type="button" class="btn btn-success" id="btn-save-sale" onClick="save_sale();">
	        		<i class="glyphicon glyphicon-floppy-save"></i> Guardar Pago
	        	</button>
	      	</div>
	    </div>
	  </div>
	</div>
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