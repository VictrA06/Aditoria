$(function(){
	$.ui.autocomplete.prototype._renderItem = function (ul, item){
        item.label = item.label.replace(new RegExp('(?![^&;]+;)(?!<[^<>]*)('+ $.ui.autocomplete.escapeRegex(this.term)+')(?![^<>]*>)(?![^&;]+;)', 'gi'), '<strong style="color:#0174DF;">$1</strong>');
        return $('<li></li>')
                .data('item.autocomplete', item)
                .append('<a>'+item.label+'</a>')
                .appendTo(ul);
    };

	$('#new-sale').on('click', function(){
		$.ajax({
			type: 'POST',
			url: base_url+'ajax/sales.php',
			data: 'action=get_lastsale',
			dataType: 'JSON',
			success: function(response){
				$('#sale-data')[0].reset();
				$('#table-detail tbody').html('');
				$('[name=product-total]').val('0.00');
				$('#sale-data [name=sale-id]').val(0);
				$('#sale-data [name=sale-serie]').val(response.serie);
				$('#sale-data [name=sale-number]').val(response.number);
				$('#sale-data [name=entity-id]').val(0);
				$('#modal-sale').modal({
					show: true,
					backdrop: 'static'
				});	
				$('#modal-sale').on('shown.bs.modal', function (){
					$('[name=sale-number]').focus();
				});
			}
		});
	});

	$('#form-detail-sale').on('submit', function(){
		var id = $('[name=product-id]').val();
		var description = $('[name=product-description]').val(); 
		var unit = $('[name=product-unit]').val(); 
		var price = $('[name=product-price]').val();
		var amount = $('[name=product-amount]').val();
		var subtotal = $('[name=product-subtotal]').val();
		var html = '<tr><td>';
		html += '<input type="text" class="hidden product-saved" value="0" style="display:none;">';
		html += '<input type="text" class="hidden product-id" value="'+id+'" style="display:none;">';
		html += '<input type="text" class="form-control input-sm product-description" value="'+description+'" readonly>';
		html += '</td><td style="display:none;">';
		html += '<input type="text" class="form-control input-sm product-unit" value="'+unit+'" readonly>';
		html += '</td><td>';
		html += '<input type="number" step="any" class="form-control input-sm product-price" value="'+price+'" readonly>';
		html += '</td><td>';
		html += '<input type="number" step="any" class="form-control input-sm product-amount" value="'+amount+'" readonly>';
		html += '</td><td>';
		html += '<input type="number" step="any" class="form-control input-sm product-subtotal" value="'+subtotal+'" readonly>';
		html += '</td><td>';
		html += '<button class="btn btn-default btn-sm" onClick="remove_detail(this, 0);"><i class="glyphicon glyphicon-minus-sign"></i> Eliminar</button>';
		html += '</td></tr>';
		$('#table-detail tbody').prepend(html);
		$('[name=product-id]').val(0);
		$('[name=product-description]').val('').focus(); 
		$('[name=product-unit]').val(''); 
		$('[name=product-price]').val('0.00');
		$('[name=product-amount]').val('1.00');
		$('[name=product-subtotal]').val('0.00');
		update_total();
		return false;
	});

	$('[name=product-description]').autocomplete({
    	source: base_url+'ajax/autocomplete.php?action=product_description',
        select: function(event, ui){
            var id = ui.item.id;
			var unit = ui.item.unit; 
			var price = ui.item.price;
			$('[name=product-id]').val(id);
			$('[name=product-unit]').val(unit); 
			$('[name=product-price]').val(price);
			$('[name=product-amount]').val('1.00').select();
			calculate_detail();
		}
    });

    $('[name=entity-social-name]').autocomplete({
    	source: base_url+'ajax/autocomplete.php?action=entity_name',
        select: function(event, ui){
            var id = ui.item.id;
			var ruc_dni = ui.item.ruc_dni; 
			var address = ui.item.address;
			$('[name=entity-id]').val(id);
			$('[name=entity-ruc-dni]').val(ruc_dni); 
			$('[name=entity-address]').val(address);
		}
    });

    $('[name=entity-ruc-dni]').autocomplete({
    	source: base_url+'ajax/autocomplete.php?action=entity_ruc_dni',
        select: function(event, ui){
            var id = ui.item.id;
			var social_name = ui.item.social_name; 
			var address = ui.item.address;
			$('[name=entity-id]').val(id);
			$('[name=entity-social-name]').val(social_name); 
			$('[name=entity-address]').val(address);
		}
    });

});

function update_total(){
	var array = document.getElementsByClassName('product-subtotal');
	var total = 0;
	for(var i=0; i<array.length; i++){
		var value = parseFloat(array[i].value);
		total += value;
	}
	total = total.toFixed(2);
	$('[name=product-total]').val(total);
}

function remove_detail(e, detail){
	detail_deleted.push(detail);
	e.parentNode.parentNode.remove();
	update_total();
}

function calculate_detail(){
	var price = parseFloat($('[name=product-price]').val());
	var amount = parseFloat($('[name=product-amount]').val());
	var result = price*amount;
	result = result.toFixed(2);
	$('[name=product-subtotal]').val(result);
}

var detail_deleted = new Array();
function save_sale(){
	var question = confirm('¿Desea guardar este pago?');
	if(question == true){
		var form = $('#sale-data').serialize();
		var product_saved = new Array();
		$("input[class*='product-saved']").each(function(){product_saved.push($(this).val());});
		var product_id = new Array();
		$("input[class*='product-id']").each(function(){product_id.push($(this).val());});
		var product_description = new Array();
		$("input[class*='product-description']").each(function(){product_description.push($(this).val());});
		var product_unit = new Array();
		$("input[class*='product-unit']").each(function(){product_unit.push($(this).val());});
		var product_price = new Array();
		$("input[class*='product-price']").each(function(){product_price.push($(this).val());});
		var product_amount = new Array();
		$("input[class*='product-amount']").each(function(){product_amount.push($(this).val());});
		var data = 'action=save_sale&'+form+'&detail_deleted='+detail_deleted+'&product_saved='+product_saved+'&product_id='+product_id+'&product_description='+product_description+'&product_unit='+product_unit+'&product_price='+product_price+'&product_amount='+product_amount;
		$.ajax({
			type: 'POST',
			url: base_url+'ajax/sales.php',
			data: data,
			dataType: 'JSON',
			beforeSend: function(){
				$('#btn-save-sale').attr('disabled', 'disabled');
			},
			success: function(response){
				$('#btn-save-sale').removeAttr('disabled');
				var type = $('#sale-data [name=sale-id]').val();
				var status = response.status; 
				var row = response.row;
				var id = response.id;
				if(status > 0){
					if(type > 0){
						$('#reg-'+id).replaceWith(row);
					}else{
						$('#table-sale tbody').prepend(row);	
						print_sale(id);
					}
					detail_deleted = new Array();
					$('#modal-sale').modal('hide');
				}else{
					alert('Error al guardar la pago.');
					return false;
				}
			}
		});
	}else{
		return false;
	}
}

function edit_sale(id){
	$.ajax({
		type: 'POST',
		url: base_url+'ajax/sales.php',
		data: 'action=edit_sale&id='+id,
		dataType: 'JSON',
		success: function(response){
			$('#sale-data [name=sale-id]').val(response.id);
			$('#sale-data [name=sale-date]').val(response.date);
			$('#sale-data [name=sale-serie]').val(response.serie);
			$('#sale-data [name=sale-number]').val(response.number);
			$('#sale-data [name=entity-id]').val(response.entity_id);
			$('#sale-data [name=entity-ruc-dni]').val(response.entity_ruc_dni);
			$('#sale-data [name=entity-social-name]').val(response.entity_social_name);
			$('#sale-data [name=entity-address]').val(response.entity_address);	
			$('#table-detail tbody').html(response.detail);
			$('[name=product-total]').val(response.total);	
			$('#modal-sale').modal({
				show: true,
				backdrop: 'static'
			});	
			$('#modal-sale').on('shown.bs.modal', function (){
				$('[name=sale-number]').focus();
			});
		}
	});
}

function delete_sale(id){
	var question = confirm('¿Desea eliminar este pago?');
	if(question == true){
		$.ajax({
			type: 'POST',
			url: base_url+'ajax/sales.php',
			data: 'action=delete_sale&id='+id,
			success: function(response){
				if(response > 0){
					$('#reg-'+id).remove();
				}else{
					alert('Error al eliminar este pago.');
				}
			}
		});
	}else{
		return false;
	}
}

/*function print_sale(id){
	window.open(base_url+'ajax/print.php?action=print_sale&id='+id, 'Impresion de Pago', 'width=600, height=600');
}*/