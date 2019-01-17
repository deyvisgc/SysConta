<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salida_model extends CI_Model {
    function mregistrar($data) {
        $result = $this->db->query("call proc_salida_registrar( 
			@out_hecho, 
			@out_estado, 
			@out_sal_id_salida, 
			".$data['usu_id_usuario'].", 
			".$data['pcl_id_cliente'].", 
			'".$data['sal_fecha_doc_cliente']."', 
			".$data['tdo_id_tipo_documento'].", 
			".$data['sal_monto_efectivo'].", 
			".$data['sal_monto_tar_credito'].", 
			".$data['sal_monto_tar_debito'].", 
			".$data['sal_descuento'].",
			'".$data['sal_motivo']."',
			'".$data['t_venta']."',
			'".$data['sal_deuda']."'
			)");
        $result = $this->db->query("SELECT @out_hecho as hecho, @out_estado as estado, @out_sal_id_salida as sal_id_salida");
        return $result->row();
    }
	function mbuscar_one($sal_id_salida) {
		$query = $this->db->query("
			SELECT 
			  sal_id_salida, 
			  IFNULL(pcl_id_cliente, 0) pcl_id_cliente, 
			  IFNULL(DATE_FORMAT(sal_fecha_doc_cliente, '%d/%m/%Y'), '') sal_fecha_doc_cliente, 
			  IFNULL(td.tdo_id_tipo_documento, 0) tdo_id_tipo_documento, 
			  IFNULL(td.tdo_nombre, '') tdo_nombre, 
			  IFNULL(sal_numero_doc_cliente, '') sal_numero_doc_cliente, 
			  IFNULL(sal_descuento, 0.00) sal_descuento, 
			  IFNULL(sal_motivo, '') sal_motivo, 
			  IFNULL(sal_monto, 0.00) sal_monto, 
			  IFNULL(emp_ruc, '') emp_ruc, 
			  IFNULL(emp_razon_social, '') emp_razon_social, 
			  IFNULL(emp_direccion, '') emp_direccion, 
			  IFNULL(emp_telefono, '') emp_telefono, 
			  IFNULL(emp_telefono, '') emp_telefono, 
			  IFNULL(emp_nombre_contacto, '') emp_nombre_contacto, 
			  IFNULL(tdo_nombre, '') tdo_nombre 
			FROM salida s 
			  INNER JOIN tipo_documento td 
			  ON s.tdo_id_tipo_documento=td.tdo_id_tipo_documento 
			  INNER JOIN pcliente pc 
			  ON s.pcl_id_cliente=pc.pcl_id_pcliente 
			  LEFT JOIN empresa e 
			  ON pc.emp_id_empresa=e.emp_id_empresa 
			WHERE s.sal_id_salida=$sal_id_salida");
		foreach ($query->result() as $row)
		{
			return $row;
		}
		return false;
	}

	
	public function listarCliente(){
        $consulta = "SELECT s.sal_fecha_doc_cliente, s.sal_deuda, 
s.sal_id_salida, em.emp_razon_social FROM salida as s, pcliente as cli, 
empresa as em WHERE cli.emp_id_empresa=em.emp_id_empresa AND 
cli.pcl_id_pcliente=s.pcl_id_cliente AND s.t_venta=\"deuda\" AND sal_deuda > 0";
        $datos = $this->db->query($consulta);
        return $datos->result_array();
    }

  

    public function cargaData($sal_id_salida)
    {
        $consulta = "SELECT s.sal_fecha_doc_cliente, s.sal_deuda, 
        s.sal_id_salida, em.emp_razon_social FROM salida as s, pcliente as cli, 
        empresa as em WHERE cli.emp_id_empresa=em.emp_id_empresa AND 
        cli.pcl_id_pcliente=s.pcl_id_cliente AND s.t_venta=\"deuda\" 
        AND s.sal_id_salida=$sal_id_salida";

        $data = $this->db->query($consulta,array($sal_id_salida));
        return $data->row_array();
    }

    public function editarDebt($data_deuda){

	    $consulta ="UPDATE salida SET sal_deuda = '".$data_deuda['sal_deuda']."' 
        WHERE salida.sal_id_salida = '".$data_deuda['sal_id_salida']."' ";
	    $this->db->query($consulta);
    }

    function ajustar_deuda($data) {
        $result = $this->db->query("call proc_ajustar_deuda
        ( 
            ".$data['sal_deuda'].", 
			".$data['sal_id_salida']." 
		)");
        return $result;
    }

    public function listarVentas(){
        $consulta = "SELECT e.emp_razon_social,s.sal_id_salida,s.sal_fecha_doc_cliente,s.sal_monto
        FROM pcliente as c, empresa as e, salida as s 
        WHERE e.emp_id_empresa=c.emp_id_empresa 
        AND c.pcl_id_pcliente=s.pcl_id_cliente 
        ORDER BY s.sal_id_salida DESC ";
        $datos = $this->db->query($consulta);
        return $datos->result_array();
    }
}
?>