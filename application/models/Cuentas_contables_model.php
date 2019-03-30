<?php
/**
 * Created by PhpStorm.
 * User: Deyvis  G
 * Date: 27/03/2019
 * Time: 11:33 AM
 */

class Cuentas_contables_model extends CI_Model
{
function RegistrarActivoCorriente($data){
	return $this->db->insert('activos', $data);

}
function RegistrarActivoNO_Corriente($data){
	return $this->db->insert('activos', $data);
}
function capital(){

	$list = array();
	$query = $this->db->query("select 
			  daemlo_id_datos_empresa_local, 
			  daemlo_ruc, 
			  daemlo_nombre_empresa_fantasia, 
			  daemlo_direccion, 
			  daemlo_ciudad, 
			  daemlo_telefono, 
			  daemlo_facebook,
              daemlo_departamento,
              daemlo_telefono_figo,
               capital
              from datos_empresa_local 
			where daemlo_id_datos_empresa_local=1");
	foreach ($query->result() as $row)
	{
		return $row;
	}
	return false;
}
function ListarActivos(){
	$query = $this->db->query("SELECT * FROM activos WHERE estado_Activo=\"ACTIVO CORRIENTE\"");
	return $query->result_array();
}
	function ListarDebeAndHaber_No_corriente(){
		$sql=$this->db->query("call listar_debe_No_Corriente_and_corriente");
		return $sql->row_array();
	}
	function ListarDebeAndHaberCorriente(){
		$sql=$this->db->query("call listar_debe_No_Corriente_and_corriente");
		return $sql->row_array();

	}
function ListarActivosNorrientes(){
	$query = $this->db->query("SELECT * FROM activos WHERE estado_Activo=\"ACTIVO NO CORRIENTE\"");
	return $query->result_array();

}



}
