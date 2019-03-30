<?php
/**
 * Created by PhpStorm.
 * User: Deyvis  G
 * Date: 30/03/2019
 * Time: 3:59 AM
 */

class Asientos_Contables extends CI_Controller
{
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
}
