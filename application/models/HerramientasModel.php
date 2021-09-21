<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HerramientasModel extends CI_Model {

	function sincronizar_cuentas($cuenta){
		//existe la cuenta?
		$this->db->where("cuenta",$cuenta['cuenta']);
		$r1 = $this->db->get('proveedores');
		if($r1->num_rows()>0){ //si existe lo actualizamos
			$this->db->where("cuenta",$cuenta['cuenta']);
			$this->db->update("proveedores",array("cuenta"=>$cuenta['cuenta'],"nombre"=>$cuenta['nombre']));
			$this->db->where("cuenta",$cuenta['cuenta']);
			$r2 = $this->db->get('proveedores');
			return $r2->row_array();
		}else{ //si no existe lo agregamos
			$this->db->insert("proveedores",array("cuenta"=>$cuenta['cuenta'],"nombre"=>$cuenta['nombre']));
			return array("cuenta"=>$cuenta['cuenta'],"nombre"=>$cuenta['nombre'],"correo"=>"");
		}
	}

	function actualizar_correo($cuenta){
		$this->db->where("cuenta",$cuenta['cuenta']);
		$this->db->update("proveedores",array("correo"=>$cuenta['correo']));
	}
	function actualizar_correos($datos){
		foreach($datos as $d){
			$this->db->where("cuenta",$d['cuenta']);
			$this->db->update("proveedores",array("correo"=>$d['correo']));
			echo $this->db->last_query()."<br><br>";
		}
	}
	function get_proveedores(){
		return $this->db->get("proveedores_contactos")->result();
	}
}

/* End of file HerramientasModel.php */
/* Location: ./application/models/HerramientasModel.php */