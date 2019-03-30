<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datos_empresa_local_model extends CI_Model {
	function Registrar($data) {
		$result = $this->db->query("call AgregarEmpresa(
			'".$data['daemlo_ruc']."',
			'".$data['daemlo_nombre_empresa_fantasia']."',
			'".$data['daemlo_direccion']."',
			'".$data['daemlo_ciudad']."',
			".$data['daemlo_telefono'].",
			'".$data['daemlo_facebook']."',
			'".$data['daemlo_departamento']."',
			'".$data['daemlo_telefono_figo']."',
			'".$data['capital']."'
			)");
		$result = $this->db->query("select last_insert_id() as id_empresa;");
		return $result->row();
	}
	function buscar_id_unico() {
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
	function update_datos($daemlo_id_datos_empresa_local, $data) {
		$this->db->where('daemlo_id_datos_empresa_local', $daemlo_id_datos_empresa_local);
		return $this->db->update('datos_empresa_local', $data);
	}
}
?>
