<?php
	include_once('../config/config.php');
	include_once('../classes/autocomplete.php');
	$auto = new Autocomplete;
	
	if(isset($_GET['action'])){
		switch ($_GET['action']){
			case 'product_description':
				$value = addslashes(trim($_GET['term']));
				$sql = $auto->product_description($value);
				exit($sql);
			break;

			case 'entity_name':
				$value = addslashes(trim($_GET['term']));
				$sql = $auto->entity_name($value);
				exit($sql);
			break;

			case 'entity_ruc_dni':
				$value = addslashes(trim($_GET['term']));
				$sql = $auto->entity_ruc_dni($value);
				exit($sql);
			break;
		}
	}
?>