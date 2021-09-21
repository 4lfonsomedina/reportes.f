<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InventarioModel extends CI_Model {

	function get_solicitudes(){
		$solicitudes = $this->db->select("solicitudes_imp.*, '' as detalles, '' as full")
		->order_by('id_solicitud','DESC')
		->limit(500)
		->get('solicitudes_imp')
		->result();
		foreach($solicitudes as &$s){
			$s->detalles = $this->db->select('solicitudes_imp_det.*,productos.validado')->join('productos','solicitudes_imp_det.codigo=productos.codigo')->where('id_solicitud',$s->id_solicitud)->get('solicitudes_imp_det')->result();
			$s->full=1;
			foreach($s->detalles as $d)if($d->check==0){ $s->full=0; }
		}
		return $solicitudes;
	}
	function actualizar_sol_det($id_sol_det,$check){
		$this->db->where('id_sol_det',$id_sol_det)->update('solicitudes_imp_det',Array("check"=>$check));
	}
	function get_productos(){
		return $this->db->get('productos')->result();
	}
	function get_producto($codigo){
		$this->db->where('codigo',$codigo);
		return $this->db->get('productos')->row_array();
	}
	function existe_producto($codigo){
		$this->db->where('codigo',$codigo);
		if($this->db->get('productos')->num_rows()>0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function consultar_actividad($id_sol_det){
		$id_solicitud = $this->db->where('id_sol_det',$id_sol_det)->limit(1)->get("solicitudes_imp_det")->row()->id_solicitud;
		//verificar que no haya detalles en cero de esta solicitud
		$faltantes = $this->db->where('id_solicitud',$id_solicitud)->where('check', 0 )->get("solicitudes_imp_det")->num_rows();
		$mostrar_check = 0;
		if($faltantes == 0){ $mostrar_check=1; }
		return Array(
			"full"=> $mostrar_check,
			"id_solicitud"=> $id_solicitud,
		);
	}
	function actualizar_producto($codigo,$data){
		$this->db->where('codigo',$codigo);
		$this->db->update('productos',$data);
	}
	function alta_producto($data){
		$this->db->insert('productos',$data);
	}
	function eliminar_producto($codigo){
		$this->db->where("codigo",$codigo);
		$this->db->delete('productos');
	}
	function alta_solicitud($data){
		$this->db->insert('solicitudes_imp',$data);
		return $this->db->insert_id();
	}
	function alta_solicitud_detalles($data){
		$this->db->insert_batch('solicitudes_imp_det',$data);
	}

}

/* End of file InventarioModel.php */
/* Location: ./application/models/InventarioModel.php */