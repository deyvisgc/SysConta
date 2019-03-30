<?php
/**
 * Created by PhpStorm.
 * User: Deyvis  G
 * Date: 30/03/2019
 * Time: 4:06 AM
 */

class Asientos extends CI_Controller
{
	function __construct() {
		parent::__construct();
		$this->load->library('session');

		$this->load->database();
		$this->load->model('cuentas_contables_model');
		$this->load->model('rol_has_privilegio_model');

		$this->load->helper('seguridad');
		$this->load->helper('util');
		$this->load->helper('url');
	}
	public function index()
	{
		is_logged_in_or_exit($this);
		$data_header['list_privilegio'] = get_privilegios($this);
		$data_header['pri_grupo'] = 'CUENTAS CONTABLES';
		$data_header['pri_nombre'] = 'Asientos Contables';
		$data_header['usuario'] = get_usuario($this);
		$data_header['title'] = "Asientos Contables";
		$data_body['capital'] = $this->cuentas_contables_model->capital();
		$data_footer['inits_function'] = array("init_Asientos_Contables");
		$this->load->view('header', $data_header);
		$this->load->view('Asiento_Contables/index',$data_body);

		$this->load->view('footer', $data_footer);
	}
	public function RegistrarAsiento1(){
		$data=array(
			'id_Empresa'=>$this->input->post('idempresa'),
			'fecha_registro'=>$this->input->post('fecha'),
			'debe'=>$this->input->post("debe"),
			'empre_socio'=>$this->input->post("socio"),
			'descripcion'=>$this->input->post("descripcion"),
		);
		$result = $this->cuentas_contables_model->RegistrarAsiento1($data);
		$datos=array('hecho'=>'SI');


		echo json_encode($datos);
	}
	public function ListarAsiento1(){
		is_logged_in_or_exit($this);

		$data = $this->cuentas_contables_model->ListarAsientos1();
		$totales_debe = $this->cuentas_contables_model->ListarHaberAsientos1();
		$result = array('data'=>array(),'totales_haber'=>$totales_debe);
		foreach ($data as $key =>$value){
			$fecha = $value['fecha_registro'];
			$descripcion= $value['descripcion'];
			$socio = $value['empre_socio'];
			$debe = $value['debe'];
			$haber= $value['haber'];
			$button = '
	        <button title="Eliminar Asiento" type="button" onclick="liss('.$value['idcuenta'].')" 
	        data-toggle="modal" data-target="#detalle_kardex" class="btn btn-danger"><i class="fa fa-remove"></i></button>
	        ';

			$result['data'][$key]=array(
				$fecha,$descripcion,$socio,$debe,$haber,$button
			);
		}
		echo json_encode($result);

	}
}
