<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InicioController extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('id_usuario')){ Redirect('Welcome');}
	}
	public function index(){		
		$this->load->view('contenido/cabecera');
		$this->load->view('contenido/nav');
		$this->load->view('contenido/inicio');
		$this->load->view('contenido/pie');
	}
}

/* End of file InicioController.php */
/* Location: ./application/controllers/InicioController.php */