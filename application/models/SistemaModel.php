<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SistemaModel extends CI_Model {

	function validar($access){
		$this->db->where("correo",$access['correo']);
		$this->db->where("clave",$access['clave']);
		$res = $this->db->get('usuarios');
		if($res->num_rows()>0){
			return $res->result_array()[0];
		}else{
			return FALSE;
		}
	}

}

/* End of file sistemaModel.php */
/* Location: ./application/models/sistemaModel.php */