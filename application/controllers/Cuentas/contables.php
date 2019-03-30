<?php
/**
 * Created by PhpStorm.
 * User: Deyvis  G
 * Date: 27/03/2019
 * Time: 11:27 AM
 */

class contables extends CI_Controller
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
		$data_header['pri_nombre'] = 'CUENTAS CONTABLES';
		$data_header['usuario'] = get_usuario($this);
		$data_header['title'] = "Cuentas de contabilidad";
		$data_body['capital'] = $this->cuentas_contables_model->capital();
		$data_footer['inits_function'] = array("init_cuentas_contables");
		$this->load->view('header', $data_header);
		$this->load->view('Contables/cuentas',$data_body);

		$this->load->view('footer', $data_footer);
	}
	function RegistrarActivoCorriente(){
		is_logged_in_or_exit($this);

		$data = array('activo' => $this->input->post('activo'),
			'precio' => $this->input->post('precio'),
			'cantidad' => $this->input->post('cantidad'),
			'codigo' => $this->input->post('codigo'),
			'estado_Activo' => 'ACTIVO CORRIENTE',
			'fecha_registro' => $this->input->post('fecha'),
			'saldo' => $this->input->post('saldo'),
			'id_empresa' => $this->input->post('idempresa'),
			'subtotal' => $this->input->post('subtotal'),
		);
		$result = $this->cuentas_contables_model->RegistrarActivoCorriente($data);
		$datos=array('hecho'=>'SI');


		echo json_encode($datos);

	}

	function RegistrarActivoNoCorriente(){
		is_logged_in_or_exit($this);

		$data = array('activo' => $this->input->post('activo'),
			'precio' => $this->input->post('precio'),
			'cantidad' => $this->input->post('cantidad'),
			'codigo' => $this->input->post('codigo'),
			'estado_Activo' => 'ACTIVO NO CORRIENTE',
			'fecha_registro' => $this->input->post('fechass'),
			'subtotal' => $this->input->post('subotal'),
			'saldo' => $this->input->post('saldo'),
			'id_empresa' => $this->input->post('idempresas'),
		);
		$result = $this->cuentas_contables_model->RegistrarActivoNO_Corriente($data);
		$datos=array('hecho'=>'SI');


		echo json_encode($datos);

	}
	function ListarActivos(){
		is_logged_in_or_exit($this);

		$data = $this->cuentas_contables_model->ListarActivos();
		$totales_debe = $this->cuentas_contables_model->ListarDebeAndHaberCorriente();
		$result = array('data'=>array(),'totales_debe'=>$totales_debe);
		foreach ($data as $key =>$value){
			$activo = $value['activo'];
			$precio= $value['precio'];
			$cantidad = $value['cantidad'];
			$codigo = $value['codigo'];
			$fecha_registro = $value['fecha_registro'];
			$saldo = $value['saldo'];
			$subtotal = $value['subtotal'];
			$button = '
	        <button title="Eliminar Activco Corriente" type="button" onclick="liss('.$value['id_activos'].')" 
	        data-toggle="modal" data-target="#detalle_kardex" class="btn btn-danger"><i class="fa fa-remove"></i></button>
	        ';

			$result['data'][$key]=array(
				$activo,$precio,$cantidad,$codigo,$fecha_registro,$saldo,$subtotal,$button
			);
		}
		echo json_encode($result);

	}
	function ListarActivosNoCorrientes(){
		is_logged_in_or_exit($this);
		$debe= $this->cuentas_contables_model->ListarActivosNorrientes();
		$totales_debe = $this->cuentas_contables_model->ListarDebeAndHaber_No_corriente();
		$result = array('data'=>array(),'totales_debe'=>$totales_debe);

		foreach ($debe as $key =>$value){
			$activo = $value['activo'];
			$precio= $value['precio'];
			$cantidad = $value['cantidad'];
			$codigo = $value['codigo'];
			$fecha_registro = $value['fecha_registro'];
			$saldo = $value['saldo'];
			$subtotal = $value['subtotal'];
			$button = '
	        <button title="Eliminar Activo no Corriente" type="button" onclick="liss('.$value['id_activos'].')" 
	        data-toggle="modal" data-target="#detalle_kardex" class="btn btn-danger"><i class="fa fa-remove"></i></button>
	        ';

			$result['data'][$key]=array(
				$activo,$precio,$cantidad,$codigo,$fecha_registro,$saldo,$subtotal,$button
			);
		}
		echo json_encode($result);
	}














}
