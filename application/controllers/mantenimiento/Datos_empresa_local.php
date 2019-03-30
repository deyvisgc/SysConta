<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datos_empresa_local extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->library('session');
		
		$this->load->database();
		$this->load->model('datos_empresa_local_model');
		$this->load->model('rol_has_privilegio_model');
		
		$this->load->helper('seguridad');
		$this->load->helper('util');
		$this->load->helper('url');
	}
	public function index()
	{
		is_logged_in_or_exit($this);
		$data_header['list_privilegio'] = get_privilegios($this);
		$data_header['pri_grupo'] = 'ADMINISTRACION';
		$data_header['pri_nombre'] = 'Datos Empresa Local';
		$data_header['usuario'] = get_usuario($this);
		$data_header['title'] = "DATOS EMPRESA LOCAL";
		$data_body['datos_empresa_local'] = $this->datos_empresa_local_model->buscar_id_unico();
		
		$data_footer['inits_function'] = array("init_datos_empresa_local");
		
		$this->load->view('header', $data_header);
		$this->load->view('mantenimiento/datos_empresa_local/formulario', $data_body);
		$this->load->view('footer', $data_footer);
	}
	public function Registrar()
	{
		is_logged_in_or_exit($this);

		$data = array('daemlo_ruc' => $this->input->post('daemlo_ruc'),
				'daemlo_nombre_empresa_fantasia' => $this->input->post('daemlo_nombre_empresa_fantasia'),
				'daemlo_direccion' => $this->input->post('daemlo_direccion'),
				'daemlo_ciudad' => $this->input->post('daemlo_ciudad'),
				'daemlo_telefono' => $this->input->post('daemlo_telefono'),
				'daemlo_facebook' => $this->input->post('daemlo_facebook'),
			    'daemlo_departamento' => $this->input->post('daemlo_departamentos'),
			    'daemlo_telefono_figo' => $this->input->post('daemlo_telefonofigo'),
			    'capital' => $this->input->post('capital1'),

		);
		$result = $this->datos_empresa_local_model->Registrar($data);
		

		echo json_encode($result);
	}
	public function actualizar()
	{
		is_logged_in_or_exit($this);

		$daemlo_id_datos_empresa_local = $this->input->post('daemlo_id_datos_empresa_local');
		$data = array('daemlo_ruc' => $this->input->post('daemlo_ruc'),
			'daemlo_nombre_empresa_fantasia' => $this->input->post('daemlo_nombre_empresa_fantasia'),
			'daemlo_direccion' => $this->input->post('daemlo_direccion'),
			'daemlo_ciudad' => $this->input->post('daemlo_ciudad'),
			'daemlo_telefono' => $this->input->post('daemlo_telefono'),
			'daemlo_facebook' => $this->input->post('daemlo_facebook'),
			'daemlo_departamento' => $this->input->post('in_daemlo_departamento'),
			'daemlo_telefono_figo' => $this->input->post('in_telefono_figo'),
			'capital' => $this->input->post('capital'),
		);
		$result = $this->datos_empresa_local_model->update_datos($daemlo_id_datos_empresa_local, $data);

		$data = array('hecho' => 'SI');
		echo json_encode($data);
	}
}
