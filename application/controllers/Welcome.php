<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct(){
		parent::__construct();
		//cargar modelo de login
		$this->load->model('sistemaModel');
	}
	public function index(){
		$this->session->sess_destroy();
		$this->load->view('contenido/cabecera');
		$this->load->view('contenido/login');
		$this->load->view('contenido/pie');
	}
	function validar(){
		$resultado_session = $this->sistemaModel->validar($_POST);
		if($resultado_session){
			$this->session->set_userdata($resultado_session);
			Redirect('InicioController');
		}else{
			Redirect('Welcome?e=1');
		}
	}
}
