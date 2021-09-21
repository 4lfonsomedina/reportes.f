<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HerramientasController extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('id_usuario')){ Redirect('Welcome');}
		$this->load->model('HerramientasModel');
	}

	function notificacion_masiva(){
		$this->load->view('contenido/cabecera');
		$this->load->view('contenido/nav');
		$this->load->view('herramientas/notificacion');
		$this->load->view('contenido/pie');
	}
	function proveedores(){
		$mensaje=$_POST['mensaje'];
		$ruta = getcwd().'/assets/archivos/';
		$archivo = "Cierre_Fiscal_2020_Ferbis.pdf";
		limpiar_carpeta($ruta);

		//Subir documento
		if(!move_uploaded_file($_FILES['file']['tmp_name'],$ruta.$archivo)){
			 echo "0";exit;
		}

		$proveedores = $this->HerramientasModel->get_proveedores();
		//generar renglones
		foreach($proveedores as $p){

			echo '<tr>
			<td>'.$p->id_proveedor.'</td>
				<td>'.$p->nombre.'</td>
				<td class="td_correo">
					<input type="text" class="form-control input-sm input_correo" value="'.$p->correo.'" name="correo[]">
				</td>
				<td><a class="btn btn-success btn-sm btn_enviar_correo"
				mensaje="'.$mensaje.'"
				correo=""
				><i class="fa fa-envelope" aria-hidden="true"></i></a>
				<div class="loader_enviar" hidden><i class="fa fa-circle-o-notch fa-spin fa-fw fa-2x"></i><span class="sr-only">Loading...</span></div>
				<div class="envio_completo" hidden><i class="fa fa-check fa-2x" aria-hidden="true"></i></div>
				</td>
			</tr>';
		}
	}
	function enviar_correo_masivo(){
		
		if($_POST['correo']==""){
			echo "No se permite correo en blanco...";exit;
		}
		$comentario=$_POST['mensaje'];

		$config = Array(
	        'protocol' => 'smtp',
	        'smtp_host' => 'mail.ferbis.com',
	        'smtp_port' => 587,
	        'smtp_user' => 'notificaciones@ferbis.com',
        	'smtp_pass' => 'Deli.3623',
	        'mailtype'  => 'html',
	        'charset'   => 'iso-8859-1',
	        'newline' => "\r\n"
	    );

		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->from('notificaciones@ferbis.com');
		$this->email->to($_POST['correo']);
		//$this->email->cc('sistemas@ferbis.com');
		//$this->email->bcc('cuentasporpagar@ferbis.com');
		$this->email->subject('Notificacion ferbis');
		$this->email->message($comentario);
		$this->email->attach(getcwd().'/assets/archivos/Cierre_Fiscal_2020_Ferbis.pdf');	

		if (!$this->email->send()){
		        echo $this->email->print_debugger();
		}else{
			echo "1";
		}
	}
	function comprobantes_proveedores(){
		$this->load->view('contenido/cabecera');
		$this->load->view('contenido/nav');
		$this->load->view('herramientas/comprobantes');
		$this->load->view('contenido/pie');
	}
	function subir_pdf(){
		$ruta = getcwd().'/assets/archivos/';
		$archivo = "pagina.pdf";
		limpiar_carpeta($ruta);

		//Subir documento
		if(!move_uploaded_file($_FILES['file']['tmp_name'],$ruta.$archivo)){
			 echo "0";exit;
		}

		//separar pdf
		split_pdf($archivo,$ruta);
		if(is_file($ruta.$archivo)){unlink($ruta.$archivo);}

		//generar metadatos
		$cuentas = parsePostPDF($ruta);

		foreach($cuentas as $c){
			$c['cuenta'] = trim(preg_replace('/\s\s+/', ' ', $c['cuenta']));
			
			$s_cuenta = $this->HerramientasModel->sincronizar_cuentas($c); 

			echo '<tr>
 				<td><a target="_BLANK" href="'.base_url('assets/archivos/').$c['pagina']."?".rand(0, 9999).'"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> '.$c['pagina'].'</a></td>
				<td>'.$c['nombre'].'</td>
				<td>'.$c['cuenta'].'</td>
				<td class="td_mensaje">
					<textarea class="form-control input-sm text_mensaje"></textarea>
				</td>
				<td class="td_correo">
					<input type="hidden" name="cuenta[]" value="'.$c['cuenta'].'">
					<input type="text" class="form-control input-sm input_correo" value="'.$s_cuenta['correo'].'" name="correo[]">
				</td>
				<td><a class="btn btn-success btn-sm btn_enviar_correo"
				correo="'.$s_cuenta['correo'].'"
				cuenta="'.$c['cuenta'].'"
				pagina="'.$c['pagina'].'"
				mensaje=""
				><i class="fa fa-envelope" aria-hidden="true"></i></a>
				<div class="loader_enviar" hidden><i class="fa fa-circle-o-notch fa-spin fa-fw fa-2x"></i><span class="sr-only">Loading...</span></div>
				<div class="envio_completo" hidden><i class="fa fa-check fa-2x" aria-hidden="true"></i></div>
				</td>
			</tr>';
		}
/*
		echo $texto;
*/
	}
	function guardar_correos(){
		$cuentas=array();
		$contador = 0;
		foreach ($_POST['cuenta'] as $c) {
			$cuentas[]=array(
				"cuenta" => $c,
				"correo" => $_POST['correo'][$contador]
			);
			$contador++;
		}
		$this->HerramientasModel->actualizar_correos($cuentas);
	}
	function enviar_correo(){
		
		if($_POST['correo']==""){
			echo "No se permite correo en blanco...";exit;
		}
		$comentario="";
		if($_POST['mensaje']!=""){
			$comentario="Comentarios: ".$_POST['mensaje'];
		}

		//actualizo la cuenta
		$this->HerramientasModel->actualizar_correo($_POST);

		$config = Array(
	        'protocol' => 'smtp',
	        'smtp_host' => 'mail.ferbis.com',
	        'smtp_port' => 587,
	        'smtp_user' => 'notificaciones@ferbis.com',
        	'smtp_pass' => 'Deli.3623',
	        'mailtype'  => 'html',
	        'charset'   => 'iso-8859-1',
	        'newline' => "\r\n"
	    );

		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->from('notificaciones@ferbis.com');
		$this->email->to($_POST['correo']);
		$this->email->cc('cuentasporpagar@ferbis.com');
		//$this->email->bcc('cuentasporpagar@ferbis.com');
		$this->email->subject('Comprobante de pago ferbis');
		$this->email->message('Anexo a este correo puede encontrar su comprobante de pago realizado por DELI MARKET POR FERBIS S.A. DE C.V.<br>'.$comentario);
		$this->email->attach(getcwd().'/assets/archivos/'.$_POST['pagina']);	

		if (!$this->email->send()){
		        echo $this->email->print_debugger();
		}else{
			echo "1";
		}
	}

}

/* End of file HerramientasController.php */
/* Location: ./application/controllers/HerramientasController.php */