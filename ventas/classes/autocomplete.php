<?php
    include_once('model.php');
  	  class Autocomplete extends Model{
  		public function __construct(){ 
        parent::__construct(); 
      }

      public function product_description($value){
        $sql = $this->db->query("SELECT * FROM tbl_producto WHERE producto_descripcion LIKE '%$value%' LIMIT 10");
        $data = array();
        foreach($sql as $row){
          $id = $row['producto_id'];
          $description = $row['producto_descripcion'];
          $unit = $row['producto_unidad'];
          $price = $row['producto_precio'];
          $data[] = array('value' => $description,
                          'id' => $id,
                          'unit' => $unit,
                          'price' => $price);
        }
        return json_encode($data);
      }

      public function entity_name($value){
        $sql = $this->db->query("SELECT * FROM tbl_entidad WHERE entidad_razon_social LIKE '%$value%' LIMIT 10");
        $data = array();
        foreach($sql as $row){
          $id = $row['entidad_id'];
          $social_name = $row['entidad_razon_social'];
          $ruc_dni = $row['entidad_ruc_dni'];
          $address = $row['entidad_direccion'];
          $data[] = array('value' => $social_name,
                          'id' => $id,
                          'ruc_dni' => $ruc_dni,
                          'address' => $address);
        }
        return json_encode($data);
      }

      public function entity_ruc_dni($value){
        $sql = $this->db->query("SELECT * FROM tbl_entidad WHERE entidad_ruc_dni LIKE '%$value%' LIMIT 10");
        $data = array();
        foreach($sql as $row){
          $id = $row['entidad_id'];
          $social_name = $row['entidad_razon_social'];
          $ruc_dni = $row['entidad_ruc_dni'];
          $address = $row['entidad_direccion'];
          $data[] = array('value' => $ruc_dni,
                          'id' => $id,
                          'social_name' => $social_name,
                          'address' => $address);
        }
        return json_encode($data);
      }
    }
?>