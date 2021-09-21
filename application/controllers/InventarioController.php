<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InventarioController extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('id_usuario')){ Redirect('Welcome');}
        $this->load->model('InventarioModel');
    }
    public function index(){
        $data['solicitudes']=$this->InventarioModel->get_solicitudes();
        $this->load->view('contenido/cabecera');
        $this->load->view('contenido/nav');
        $this->load->view('inventario/solicitudes', $data);
        $this->load->view('contenido/pie');
    }
    function eliminar_producto(){
        $this->InventarioModel->eliminar_producto($_POST['codigo']);
    }
    function nueva_solicitud(){
        $data=1;
        $this->load->view('contenido/cabecera', $data);
        $this->load->view('contenido/nav');
        $this->load->view('inventario/nueva_solicitud', $data);
        $this->load->view('contenido/pie');
    }
    function productos(){
        $data['productos'] = $this->InventarioModel->get_productos();
        $this->load->view('contenido/cabecera', $data);
        $this->load->view('contenido/nav');
        $this->load->view('inventario/productos', $data);
        $this->load->view('contenido/pie');
    }
    function get_producto(){
        if(!isset($_POST['codigo'])){ exit; }
        echo json_encode($this->InventarioModel->get_producto($_POST['codigo']));
    }
    function solicitud(){
        $this->load->view('contenido/cabecera');
        $this->load->view('contenido/nav');
        $this->load->view('inventario/solicitud');
        $this->load->view('contenido/pie');
    }
    function solicitudes(){
    	$data['solicitudes']=$this->InventarioModel->get_solicitudes();
        $this->load->view('contenido/cabecera');
        $this->load->view('contenido/nav');
        $this->load->view('inventario/solicitudes',$data);
        $this->load->view('contenido/pie');
    }
    function guardar_solicitud(){
    	$array_solicitud = Array(
    		"solicitante"	=>$_POST['solicitante'],
    		"sucursal"		=>$_POST['sucursal'],
            "etiqueta"      =>$_POST['etiqueta'],
    		"prioridad"		=>1,
    		"estatus"		=>1,
    		"fecha"			=>date('Y-m-d')
    	);
    	$id_solicitud = $this->InventarioModel->alta_solicitud($array_solicitud);

    	$batch_detalles=Array();
    	for($i=0;$i<count($_POST['codigo']);$i++){
    		$batch_detalles[]=Array(
    			"id_solicitud"=> $id_solicitud,
    			"codigo"=>$_POST['codigo'][$i],
    			"descripcion"=>$_POST['descripcion'][$i],
    			"cantidad"=>$_POST['cantidad'][$i]
    		);
    	}

    	$this->InventarioModel->alta_solicitud_detalles($batch_detalles);
    }
    function actualizar_sol_det(){
    	$this->InventarioModel->actualizar_sol_det($_POST['id_sol_det'],$_POST['check']);
    	//verificar estatus de solicitud
    	echo json_encode($this->InventarioModel->consultar_actividad($_POST['id_sol_det']));
    }
    function etiquetado(){
        $data=1;
        $this->load->view('contenido/cabecera', $data);
        $this->load->view('contenido/nav');
        $this->load->view('inventario/etiquetado', $data);
        $this->load->view('contenido/pie');
    }
    function guardar_producto(){
        //verificar si existe
        if($this->InventarioModel->existe_producto($_POST['codigo'])){
            $codigo = $_POST['codigo'];
            unset($_POST['codigo']);
            $this->InventarioModel->actualizar_producto($codigo,$_POST);
        }else{
            $this->InventarioModel->alta_producto($_POST);
        }

    }
    function generacion_etiqueta($codigo){
        error_reporting(0);
        $p = $this->InventarioModel->get_producto($codigo);
        $data['descripcion'] = $p['descripcion'];
        $data['neto'] = $p['neto'];
        $data['codigo'] = $codigo;
        $data['origen'] = $p['origen'];
        if($data['origen']==''){$data['origen']='E.U.A.';}
        //Contenido energetico por envase
        $data['energia_total'] = ($p['energia']/$p['porsion'])*$p['neto'];
        $data['energia_total_kj'] = $data['energia_total']*4.184;
        $data['energia_100'] = ($p['energia']/$p['porsion'])*100;
        $data['energia_100_kj'] = $data['energia_100']*4.184;
        $data['unidad'] = $p['g_m'];
        $data['grasas'] = ($p['grasas']/$p['porsion'])*100;
        $data['proteinas'] = ($p['proteinas']/$p['porsion'])*100;
        $data['grasas_s'] = ($p['grasas_s']/$p['porsion'])*100;
        $data['grasas_t'] = ($p['grasas_t']/$p['porsion'])*100;
        $data['carbohidratos'] = ($p['carbohidratos']/$p['porsion'])*100;
        $data['azucares'] = ($p['azucares']/$p['porsion'])*100;
        $data['azucares_a'] = ($p['azucares_a']/$p['porsion'])*100;
        $data['sodio'] = ($p['sodio']/$p['porsion'])*100;
        $data['fibra'] = ($p['fibra']/$p['porsion'])*100;
        $data['ingredientes'] = $p['ingredientes'];
        $data['importacion'] = $p['importacion'];
        $data['adicional']="";
        $data['superficie']=$p['superficie'];


        if($p['va']!=''||$p['vaP']!=''){$data['adicional'].="Vitamina A: ".number_format((($p['va']/$p['porsion'])*100),0)."µg ".$p['vaP']."%, ";}
        if($p['ap']!=''||$p['apP']!=''){$data['adicional'].="Acido Pantotenico: ".number_format((($p['ap']/$p['porsion'])*100),0)."mg ".$p['apP']."%, ";}
        if($p['vb1']!=''||$p['vb1P']!=''){$data['adicional'].="Vitamina B1: ".number_format((($p['vb1']/$p['porsion'])*100),0)."µg ".$p['vb1P']."%, ";}
        if($p['cal']!=''||$p['calP']!=''){$data['adicional'].="Calcio: ".number_format((($p['cal']/$p['porsion'])*100),0)."mg ".$p['calP']."%, ";}
        if($p['vb2']!=''||$p['vb2P']!=''){$data['adicional'].="Vitamina B2: ".number_format((($p['vb2']/$p['porsion'])*100),0)."µg ".$p['vb2P']."%, ";}
        if($p['cob']!=''||$p['cobP']!=''){$data['adicional'].="Cobre: ".number_format((($p['cob']/$p['porsion'])*100),0)."µg ".$p['cobP']."%, ";}
        if($p['vb6']!=''||$p['vb6P']!=''){$data['adicional'].="Vitamina B6: ".number_format((($p['vb6']/$p['porsion'])*100),0)."µg ".$p['vb6P']."%, ";}
        if($p['cro']!=''||$p['croP']!=''){$data['adicional'].="Cromo: ".number_format((($p['cro']/$p['porsion'])*100),0)."µg ".$p['croP']."%, ";}
        if($p['nia']!=''||$p['niaP']!=''){$data['adicional'].="Niacina: ".number_format((($p['nia']/$p['porsion'])*100),0)."mg ".$p['niaP']."%, ";}
        if($p['flu']!=''||$p['fluP']!=''){$data['adicional'].="Fluor: ".number_format((($p['flu']/$p['porsion'])*100),0)."mg ".$p['fluP']."%, ";}
        if($p['af']!=''||$p['afP']!=''){$data['adicional'].="Acido Folico: ".number_format((($p['af']/$p['porsion'])*100),0)."µg ".$p['afP']."%, ";}
        if($p['fos']!=''||$p['fosP']!=''){$data['adicional'].="Fosforo: ".number_format((($p['fos']/$p['porsion'])*100),0)."mg ".$p['fosP']."%, ";}
        if($p['vc']!=''||$p['vcP']!=''){$data['adicional'].="Vitamina C: ".number_format((($p['vc']/$p['porsion'])*100),0)."µg ".$p['vcP']."%, ";}
        if($p['hie']!=''||$p['hieP']!=''){$data['adicional'].="Hierro: ".number_format((($p['hie']/$p['porsion'])*100),0)."mg ".$p['hieP']."%, ";}
        if($p['vd']!=''||$p['vdP']!=''){$data['adicional'].="Vitamina D: ".number_format((($p['vd']/$p['porsion'])*100),0)."µg ".$p['vdP']."%, ";}
        if($p['mag']!=''||$p['magP']!=''){$data['adicional'].="Magnesio: ".number_format((($p['mag']/$p['porsion'])*100),0)."mg ".$p['magP']."%, ";}
        if($p['ve']!=''||$p['veP']!=''){$data['adicional'].="Vitamina E: ".number_format((($p['ve']/$p['porsion'])*100),0)."µg ".$p['veP']."%, ";}
        if($p['sel']!=''||$p['selP']!=''){$data['adicional'].="Selenio: ".number_format((($p['sel']/$p['porsion'])*100),0)."µg ".$p['selP']."%, ";}
        if($p['vk']!=''||$p['vkP']!=''){$data['adicional'].="Vitamina K: ".number_format((($p['vk']/$p['porsion'])*100),0)."µg ".$p['vkP']."%, ";}
        if($p['iod']!=''||$p['iodP']!=''){$data['adicional'].="Iodo: ".number_format((($p['iod']/$p['porsion'])*100),0)."µg ".$p['iodP']."%, ";}
        if($p['zin']!=''||$p['zinP']!=''){$data['adicional'].="Zinc: ".number_format((($p['zin']/$p['porsion'])*100),0)."mg ".$p['zinP']."%, ";}
        if($p['pot']!=''||$p['potP']!=''){$data['adicional'].="Potasio: ".number_format((($p['pot']/$p['porsion'])*100),0)."mg ".$p['potP']."% ";}
        if($p['vb']!=''||$p['vbP']!=''){$data['adicional'].="Vitamina B: ".number_format((($p['vb']/$p['porsion'])*100),0)."µg ".$p['vbP']."%, ";}
        if($p['vb12']!=''||$p['vb12P']!=''){$data['adicional'].="Vitamina B12: ".number_format((($p['vb12']/$p['porsion'])*100),0)."µg ".$p['vb12P']."%, ";}
        if($p['vb3']!=''||$p['vb3P']!=''){$data['adicional'].="Vitamina B3: ".number_format((($p['vb3']/$p['porsion'])*100),0)."µg ".$p['vb3P']."%, ";}
        if($p['vd3']!=''||$p['vd3P']!=''){$data['adicional'].="Vitamina D3: ".number_format((($p['vd3']/$p['porsion'])*100),0)."µg ".$p['vd3P']."%, ";}
        /* hipersensibilidad */
        $data['ingredientes_h']="";
        if($p['gluten']==1){ $data['ingredientes_h'].=", GLUTEN"; }
        if($p['leche']==1){ $data['ingredientes_h'].=", LECHE"; }
        if($p['nueces']==1){ $data['ingredientes_h'].=", NUECES"; }
        if($p['sulfito']==1){ $data['ingredientes_h'].=", SULFITO"; }
        if($p['huevos']==1){ $data['ingredientes_h'].=", HUEVO"; }
        if($p['soya']==1){ $data['ingredientes_h'].=", SOYA"; }
        if($p['cacahuate']==1){ $data['ingredientes_h'].=", CACAHUATE"; }
        if($p['moluscos']==1){ $data['ingredientes_h'].=", MOLUSCOS"; }
        if($p['pescado']==1){ $data['ingredientes_h'].=", PESCADO"; }
        if($p['crustaceos']==1){ $data['ingredientes_h'].=", CRUSTACEOS"; }
        //sellos
        $sellos = Array(0,0,0,0,0);

        if($p['g_m']=='gr'){
            //exceso de calorias
            if($data['energia_100']>=275){ $sellos[0]=1; }
            //exceso de azucares
            if((($data['azucares']*4)/$data['energia_100'])>=0.1){ $sellos[1]=1; }
            //exceso de grasas saturadas
            if((($data['grasas_s']*9)/$data['energia_100'])>=0.1){ $sellos[2]=1; }
            //exceso de grasas TRANS
            if(((($data['grasas_t']/1000)*9)/$data['energia_100'])>=0.01){ $sellos[3]=1; }
            //exceso de grasas saturadas
            if($data['sodio']>=350){ $sellos[4]=1; }
        }
        if($p['g_m']=='ml'){
            //exceso de calorias
            if($data['energia_100']>=70||($data['azucares']*4)>10){ $sellos[0]=1; }
            //exceso de azucares
            if((($data['azucares']*4)/$data['energia_100'])>=0.1){ $sellos[1]=1; }
            //exceso de grasas saturadas
            if((($data['grasas_s']*9)/$data['energia_100'])>=0.1){ $sellos[2]=1; }
            //exceso de grasas saturadas
            if(((($data['grasas_t']/1000)*9)/$data['energia_100'])>=0.01){ $sellos[3]=1; }
            //exceso de grasas saturadas
            if($data['sodio']>=350){ $sellos[4]=1; }
        }
        /* edulcorantes */
        $data['tamano_2']=$p['superficie']*0.2;

        $data['sellos_add']="";
        $data['sellos_add_num']=0;
        if($p["edulcorantes"]==1){
            $data['sellos_add_num']++;
            $data['sellos_add'].="<img style='width: 100%' src='".base_url('assets/img/sellos/')."E_1.png'>";
        }
        if($p["cafeina"]==1){
            $data['sellos_add_num']++;
            $data['sellos_add'].="<img style='width: 100%' src='".base_url('assets/img/sellos/')."C_1.png'>";
        }
        /*conservado*/
        $data['conservado']="";
        if($p['refrigerado']==1){ $data['conservado'].="CONSERVESE REFRIGERADO<br>"; }
        if($p['congelar']==1){ $data['conservado'].="NO CONGELAR <br>"; }
        if($p['agitese']==1){ $data['conservado'].="AGITESE ANTES DE ABRIR<br>"; }
        if($p['abierto']==1){ $data['conservado'].="UNA VEZ ABIERTO CONSERVESE REFRIGERADO<br>"; }
        if($p['fresco']==1){ $data['conservado'].="CONSERVAR EN LUGAR FRESCO Y SECO<br>"; }
        


        $data['tamano']=($p['superficie']*0.7).'mm';
        $data['letra']=$p['superficie']*0.4;
        
        if($data['tamano']>15){
            $data['sellos']=base_url('assets/img/sellos/').$sellos[0].$sellos[1].$sellos[2].$sellos[3].$sellos[4].".png";
        }else{
            $data['sellos']=base_url('assets/img/sellos/40_').($sellos[0]+$sellos[1]+$sellos[2]+$sellos[3]+$sellos[4]).".png";
        }
        if((($sellos[0]+$sellos[1]+$sellos[2]+$sellos[3]+$sellos[4])==0&&$data['sellos_add']!="")||$p['exento']==1){
            $data['sellos']="";
        }
        $data['num_sellos']=($sellos[0]+$sellos[1]+$sellos[2]+$sellos[3]+$sellos[4]);


        //$data['adicional'].=$data['sellos'];
        $data['lote']=$p['lote'];
        $data['exento']=$p['exento'];
        //$data['adicional'] = ($p['grasas_t']/$p['porsion'])*100;
        return $data;
    }
    function etiqueta_svg(){
        $data = $this->generacion_etiqueta($_GET['codigo']);
        $this->load->view('inventario/crear_imagen', $data);
        //html_imagen($html);
    }
    function descargar_svg(){
        
        $this->load->helper('download');
        $name = 'svg.scut5';
        //$data = $this->generacion_etiqueta($codigo);
        $svg = $this->load->view('inventario/imprimir_etiqueta3', $_POST, TRUE);
        force_download($name, $svg,TRUE);
    }
    function generar_etiquetas(){
        $codigo = $_POST['codigo'];
        $data = $this->generacion_etiqueta($codigo);
        $this->load->view('inventario/etiqueta', $data);
    }
    function imprimir_etiqueta(){
        $codigo = $_GET['codigo'];
        $data = $this->generacion_etiqueta($codigo);
        $this->load->view('inventario/imprimir_etiqueta', $data);
    }
    function imprimir_etiqueta2(){
        $codigo = $_GET['codigo'];
        $data = $this->generacion_etiqueta($codigo);
        $this->load->view('inventario/imprimir_etiqueta2', $data);
    }
}

/* End of file InventarioController.php */
/* Location: ./application/controllers/InventarioController.php */