<?php
	include_once('../config/config.php');
	include_once('../classes/sales.php');
	require_once('../resources/tcpdf/config/lang/eng.php');
	require_once('../resources/tcpdf/tcpdf.php');
	$sales = new Sales;
	if(isset($_GET['action'])){
		switch ($_GET['action']){
			case 'print_sale':
				$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false); 
				$pdf->setPrintHeader(false);
				$pdf->setPrintFooter(false);
				$pdf->AddPage();
				$pdf->SetCreator('Rodrigo Avalos');
				$pdf->SetAuthor('Rodrigo Avalos');
				$pdf->SetAutoPageBreak(true, 5);
				$pdf->SetXY(5, 5);
				$id = $_GET['id'];
				$sale_date = ''; 
				$sale_serie = '';
				$sale_number = '';
				$entity_ruc_dni = '';
				$entity_social_name = '';
				$entity_address = '';
				$header = $sales->header_sale($id);
				foreach ($header as $key){
					$sale_date = date('d/m/Y H:i:s', strtotime($key['venta_fecha_hora']));
					$sale_serie = $key['venta_serie'];
					$sale_number = $key['venta_numero'];
					$entity_ruc_dni = $key['entidad_ruc_dni'];
					$entity_social_name = $key['entidad_razon_social'];
					$entity_address = $key['entidad_direccion'];	
				}
				$detail = $sales->detail_sale($id);
				$sale_detail = '';
				$total = 0;
				foreach ($detail as $key){
					$d_description = $key['producto_descripcion'];
					$d_unit = $key['producto_unidad']; 
					$d_price = $key['detalle_precio']; 
					$d_amount = $key['detalle_cantidad']; 
					$d_subtotal = $d_price*$d_amount;
					$total += $d_subtotal;
					$sale_detail .= '<tr>
										<td style="border-right:1px solid black;">'.$d_description.'</td>
						         		<td style="border-right:1px solid black;" align="right">'.number_format($d_price, 2).'</td>
						         		<td style="border-right:1px solid black;" align="right">'.number_format($d_amount, 2).'</td>
						         		<td align="right">'.number_format($d_subtotal, 2).'</td>
									 </tr>';
				}
				$sale_detail .= '<tr>
									<td colspan="3" align="right" style="border-top:1px solid black; border-right:1px solid black;"><strong>Total</strong></td>
									<td align="right" style="border-top:1px solid black;">'.number_format($total, 2).'</td>
								 </tr>';
				$html = '<table cellpadding="4px" style="border:1px solid black;">
							<tr>
								<td colspan="3" style="border-bottom: 1px solid black; font-size:58px;" width="562px" align="center">
									<strong>Representacion impresa de venta</strong>
								</td>
							</tr>
							<tr>
								<td width="90px"><strong>Telefono: </strong></td>
								<td width="232px">'.$entity_ruc_dni.'</td>
								<td width="240px" rowspan="4" align="center" style="font-size:72px; border-left:1px solid black;">
									<br><br>
									<strong>'.$sale_serie.'-'.$sale_number.'</strong>
								</td>
							</tr>
							<tr>
								<td><strong>Razon social: </strong></td>
								<td>'.$entity_social_name.'</td>
							</tr>
							<tr>
								<td><strong>Direccion: </strong></td>
								<td>'.$entity_address.'</td>
							</tr>
							<tr>
								<td><strong>Fecha: </strong></td>
								<td>'.$sale_date.'</td>
							</tr>
				         </table>
				         <table cellpadding="4px" style="border:1px solid black;">
				         	<tr>
				         		<td width="322px" style="border-right:1px solid black; border-bottom:1px solid black;"><strong>Descripcion</strong></td>
				         		<td width="80px" style="border-right:1px solid black; border-bottom:1px solid black;"><strong>Precio</strong></td>
				         		<td width="80px" style="border-right:1px solid black; border-bottom:1px solid black;"><strong>Cantidad</strong></td>
				         		<td width="80px" style="border-bottom:1px solid black;"><strong>Subtotal</strong></td>
				         	</tr>
				         	'.$sale_detail.'
				         </table>';

		      	$pdf->writeHTML($html, true, false, true, true, 'L');
		      	//$pdf->IncludeJS('print();');
		      	$pdf->Output('Sale.pdf', 'I');
			break;
		}
	}
?>