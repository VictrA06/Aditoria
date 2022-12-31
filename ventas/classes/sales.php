<?php
    include_once('model.php');
  	  class Sales extends Model{
  		public function __construct(){ 
        parent::__construct(); 
      }

      public function detail_sale($id){
        $sql = $this->db->query("SELECT p.*, d.* FROM tbl_detalle_venta AS d LEFT JOIN tbl_producto AS p ON d.producto_id = p.producto_id WHERE d.venta_id = '$id' AND d.detalle_estado = 1");
        return $sql;
      }

      public function header_sale($id){
        $sql = $this->db->query("SELECT v.*, e.* FROM tbl_venta AS v LEFT JOIN tbl_entidad AS e ON v.entidad_id = e.entidad_id WHERE v.venta_id = '$id' AND v.venta_estado = 1");
        return $sql;
      }

      public function delete_sale($id){
        $sql = $this->db->query("UPDATE tbl_venta SET venta_estado = 0 WHERE venta_id = '$id'");  
        if($sql){
          $status = 1; 
        }else{
          $status = 0;
        }
        return $status;
      }

      public function delete_detail($sale, $detail){
        $this->db->query("UPDATE tbl_detalle_venta SET detalle_estado = 0 WHERE venta_id = '$sale' AND detalle_id = '$detail'");  
      }

      public function update_total($sale_id, $total){
        $this->db->query("UPDATE tbl_venta SET venta_total = '$total' WHERE venta_id = '$sale_id'");  
      }

      public function save_detail($sale_id, $d_id, $d_price, $d_amount){
        $sql = $this->db->query("INSERT INTO tbl_detalle_venta (venta_id, producto_id, detalle_precio, detalle_cantidad, detalle_estado) VALUES ('$sale_id', '$d_id', '$d_price', '$d_amount', 1)");  
        if($sql){
          $id = $this->db->insert_id; 
        }else{
          $id = 0;
        }
        return $id;
      }

      public function save_product($d_description, $d_unit, $d_price){
        $sql = $this->db->query("INSERT INTO tbl_producto (producto_descripcion, producto_unidad, producto_precio, producto_estado) VALUES ('$d_description', '$d_unit', '$d_price', 1)");
        if($sql){
          $id = $this->db->insert_id; 
        }else{
          $id = 0;
        }
        return $id;
      }

      public function update_sale($sale_id, $sale_date, $sale_serie, $sale_number, $entity_id){
        $this->db->query("UPDATE tbl_venta SET venta_fecha_hora = '$sale_date', venta_serie = '$sale_serie', venta_numero = '$sale_number', entidad_id = '$entity_id' WHERE venta_id = '$sale_id'");
      }
        
      public function save_sale($sale_date, $sale_serie, $sale_number, $entity_id){
        $sql = $this->db->query("INSERT INTO tbl_venta (venta_fecha_hora, venta_serie, venta_numero, entidad_id, venta_estado) VALUES ('$sale_date', '$sale_serie', '$sale_number', '$entity_id', 1)");
        if($sql){
          $id = $this->db->insert_id; 
        }else{
          $id = 0;
        }
        return $id;
      }

      public function save_entity($entity_ruc_dni, $entity_social_name, $entity_address){
        $sql = $this->db->query("INSERT INTO tbl_entidad (entidad_ruc_dni, entidad_razon_social, entidad_direccion, entidad_estado) VALUES ('$entity_ruc_dni', '$entity_social_name', '$entity_address', 1)");
        if($sql){
          $id = $this->db->insert_id; 
        }else{
          $id = 0;
        }
        return $id;
      }

      public function update_entity($entity_id, $entity_ruc_dni, $entity_social_name, $entity_address){
        $this->db->query("UPDATE tbl_entidad SET entidad_ruc_dni = '$entity_ruc_dni', entidad_razon_social = '$entity_social_name', entidad_direccion = '$entity_address' WHERE entidad_id = '$entity_id'");
      }

      public function get_data(){
        $sql = $this->db->query("SELECT venta_id FROM tbl_venta WHERE venta_estado > 0 ORDER BY venta_fecha_hora DESC");
        $html = '';
        foreach($sql as $row){
          $html .= $this->build_row($row['venta_id']);
        }
        return $html;
      }

      public function build_row($id){
        $sql = $this->db->query("SELECT v.*, e.* FROM tbl_venta AS v LEFT JOIN tbl_entidad AS e ON v.entidad_id = e.entidad_id WHERE v.venta_id = '$id'");
        $html = '';
        foreach($sql as $row){
          $id = $row['venta_id'];
          $date = date('d/m/Y H:i:s', strtotime($row['venta_fecha_hora'])); 
          $serie = $row['venta_serie']; 
          $number = $row['venta_numero']; 
          $ruc_dni = $row['entidad_ruc_dni']; 
          $social_name = $row['entidad_razon_social']; 
          $total = number_format($row['venta_total'], 2, '.', ''); 
          $option = '<button class="btn btn-default btn-sm" onClick="print_sale('.$id.');">
                       <i class="glyphicon glyphicon-print"></i> Imprimir
                     </button>
                     <button class="btn btn-info btn-sm" onClick="edit_sale('.$id.');">
                       <i class="glyphicon glyphicon-edit"></i> Editar
                     </button>
                     <button class="btn btn-danger btn-sm" onClick="delete_sale('.$id.');">
                       <i class="glyphicon glyphicon-remove-sign"></i> Eliminar
                     </button>';
          $html = '<tr id="reg-'.$id.'">
                    <td>'.$date.'</td>
                    <td>'.$serie.'</td>
                    <td>'.$number.'</td>
                    <td>'.$ruc_dni.'</td>
                    <td>'.$social_name.'</td>
                    <td align="right">'.$total.'</td>
                    <td>'.$option.'</td>
                  </tr>';
        }
        return $html;
      }

      public function edit_sale($sale){
        $id = $date = $serie = $number = $entity_id = $entity_ruc_dni = $entity_social_name = $entity_address = $detail = $total = '';
        $sql = $this->db->query("SELECT v.*, e.* FROM tbl_venta AS v LEFT JOIN tbl_entidad AS e ON v.entidad_id = e.entidad_id WHERE v.venta_id = '$sale' LIMIT 1");
        foreach($sql as $row){
          $id = $row['venta_id'];
          $date = date('Y-m-d', strtotime($row['venta_fecha_hora']));
          $serie = $row['venta_serie'];
          $number = $row['venta_numero'];
          $entity_id = $row['entidad_id'];
          $entity_ruc_dni = $row['entidad_ruc_dni'];
          $entity_social_name = $row['entidad_razon_social'];
          $entity_address = $row['entidad_direccion'];
          $total = number_format($row['venta_total'], 2, '.', '');
          $sql2 = $this->db->query("SELECT d.*, p.* FROM tbl_detalle_venta AS d LEFT JOIN tbl_producto AS p ON d.producto_id = p.producto_id WHERE d.venta_id = '$id' AND d.detalle_estado = 1");
          foreach ($sql2 as $row2){
            $dd = $row2['detalle_id'];
            $did = $row2['producto_id'];
            $description = $row2['producto_descripcion'];
            $unit = $row2['producto_unidad'];
            $price = $row2['detalle_precio'];
            $amount = $row2['detalle_cantidad'];
            $subtotal = number_format($row2['detalle_precio']*$row2['detalle_cantidad'], 2, '.', '');
            $detail .= '<tr>
                          <td>
                            <input type="text" class="hidden product-saved" value="1" style="display:none;">
                            <input type="text" class="hidden product-id" value="'.$did.'" style="display:none;">
                            <input type="text" class="form-control input-sm product-description" value="'.$description.'" readonly>
                          </td>
                          <td style="display:none;">
                            <input type="text" class="form-control input-sm product-unit" value="'.$unit.'" readonly>
                          </td>
                          <td>
                            <input type="number" step="any" class="form-control input-sm product-price" value="'.$price.'" readonly>
                          </td>
                          <td>
                            <input type="number" step="any" class="form-control input-sm product-amount" value="'.$amount.'" readonly>
                          </td>
                          <td>
                            <input type="number" step="any" class="form-control input-sm product-subtotal" value="'.$subtotal.'" readonly>
                          </td>
                          <td>
                            <button class="btn btn-default btn-sm" onClick="remove_detail(this, '.$dd.');"><i class="glyphicon glyphicon-minus-sign"></i> Eliminar</button>
                          </td>
                        </tr>';
          }
        } 
        $response = array(
          'id' => $id,
          'date' => $date,
          'serie' => $serie,
          'number' => $number,
          'entity_id' => $entity_id,
          'entity_ruc_dni' => $entity_ruc_dni,
          'entity_social_name' => $entity_social_name,
          'entity_address' => $entity_address,
          'detail' => $detail,
          'total' => $total
        );
        return $response;
      }

      public function get_lastsale(){
        $serie = '2022-2023';
        $number = 0;
        $sql = $this->db->query("SELECT v.venta_numero FROM tbl_venta AS v WHERE v.venta_serie = '$serie' ORDER BY v.venta_numero DESC LIMIT 1");
        foreach ($sql as $key){
          $number = ltrim($key['venta_numero'], '0');
        } 
        $number++;
        $number = str_pad($number, 8, '0', STR_PAD_LEFT);
        $response = array(
          'serie' => $serie,
          'number' => $number
        );
        return $response;
      }

    }
?>