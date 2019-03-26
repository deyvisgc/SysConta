<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kardex_model extends CI_Model
{
    function Cargar_Data_Productos()
    {
        $query = $this->db->query("SELECT p.pro_id_producto,IFNULL((SELECT cc.cla_nombre FROM clase cc WHERE cc.cla_id_clase=p.cla_clase),'') clase_nombre, 
			  IFNULL((SELECT cc.cla_nombre FROM clase cc WHERE cc.cla_id_clase=p.cla_subclase),'') subclase_nombre, pro_nombre, 
			  FORMAT(pro_cantidad, 0, 'de_DE') pro_cantidad, pro_val_compra pro_val_compra, pro_val_venta pro_val_venta,pro_lote
			FROM producto p where p.pro_cantidad >=1 GROUP BY clase_nombre,subclase_nombre,pro_nombre");
        return $query->result_array();
    }


    function Kardex_Entradas($id_producto)
    {
        $query = $this->db->query("SELECT DATE_FORMAT(ing.ing_fecha_registro,'%d-%m-%Y') as ing_fecha_registro,ingd.ind_cantidad,ingd.ind_valor, 
        FORMAT(ROUND((ingd.ind_valor * ingd.ind_cantidad),1),2) AS precio_compra,  ing.ing_numero_doc_proveedor,ingd.ind_numero_lote
        FROM ingreso as ing, ingreso_detalle as ingd,producto as p 
        WHERE ingd.ing_id_ingreso=ing.ing_id_ingreso AND p.pro_id_producto=ingd.pro_id_producto
        AND ingd.pro_id_producto = $id_producto ORDER BY ing.ing_fecha_registro DESC"
        );
        return $query->result_array();

    }

    function Kardex_Entradas_Total($id_producto)
    {
        $query = $this->db->query(
            "SELECT FORMAT(ROUND(SUM(ingd.ind_valor * ingd.ind_cantidad),1),2) AS total_entradas 
            FROM ingreso as ing, ingreso_detalle as ingd,producto as p 
            where ingd.ing_id_ingreso=ing.ing_id_ingreso AND p.pro_id_producto=ingd.pro_id_producto
            AND ingd.pro_id_producto = $id_producto"
        );
        return $query->row_array();
    }

    function Kardex_EntradasXPRODUCCION($id_producto)
    {
        $query = $this->db->query(
            "SELECT DATE_FORMAT(ingd.ing_fecha_registro,'%d-%m-%Y')
				 as ing_fecha_registro,ingd.ind_cantidad,ingd.ind_valor,ingd.ind_monto,ingd.ind_numero_lote,
				 FORMAT(ROUND((ingd.ind_valor * ingd.ind_cantidad),1),2) AS precio_compra FROM ingreso_detalle as ingd 
				WHERE ingd.pro_id_producto=$id_producto and ingd.tipo_entrada=\"produccion\"");
        return $query->result_array();

    }

    function Kardex_Entradas_Total_SUMAS($id_producto)
    {
        $query = $this->db->query(
            "SELECT FORMAT(ROUND(SUM(ingd.ind_valor * ingd.ind_cantidad),1),2) AS total_entradas 
				FROM ingreso_detalle as ingd,producto as p where p.pro_id_producto=ingd.pro_id_producto AND
				 ingd.pro_id_producto=$id_producto and ingd.tipo_entrada=\"produccion\""
        );
        return $query->row_array();

    }


    function Kardex_Salidas($idprodcuto)
    {
        $query = $this->db->query(
            "SELECT DATE_FORMAT(sal.sal_fecha_registro,'%d-%m-%Y') as sal_fecha_registro,
            sd.sad_cantidad, sad_valor,FORMAT(ROUND((sd.sad_cantidad * sd.sad_valor),1),2) as total_venta,sal.sal_numero_doc_cliente,sd.sad_numero_lote 
            FROM producto as p, salida as sal, salida_detalle as sd
            WHERE sal.sal_id_salida=sd.sal_id_salida
            AND p.pro_id_producto = sd.pro_id_producto
            AND sd.pro_id_producto=$idprodcuto ORDER BY sal.sal_fecha_registro DESC"
        );
        return $query->result_array();
    }

    function Kardex_Salidas_Total($idprodcuto)
    {
        $query = $this->db->query(
            "SELECT FORMAT(ROUND(SUM(sd.sad_cantidad * sd.sad_valor),1),2) as total_salidas,p.pro_nombre,p.pro_id_producto 
            FROM producto as p, salida as sal, salida_detalle as sd
            WHERE sal.sal_id_salida=sd.sal_id_salida
            AND p.pro_id_producto = sd.pro_id_producto
            AND sd.pro_id_producto=$idprodcuto"
        );
        return $query->row_array();
    }

    function Kardex_Existencias($idprodcuto)
    {
        $query = $this->db->query(
            "SELECT p.pro_cantidad,p.pro_val_compra,FORMAT(ROUND((p.pro_cantidad*p.pro_val_compra),1),2) as total_compra 
            FROM producto as p WHERE p.pro_id_producto=$idprodcuto"

        );
        return $query->result_array();
    }

    function Kardex_Existencias_Historial($idprodcuto)
    {
        $query = $this->db->query(
            "SELECT DATE_FORMAT(fecha,'%d-%m-%Y') as fecha, cantidad_anterior,cantidad_entrante,cantidad_actual from mov_producto where pro_id_producto=$idprodcuto ORDER BY fecha DESC"

        );
        return $query->result_array();
    }

    function kardex_salida_produccion($idproducto)
    {
        $query = $this->db->query("SELECT sp.pro_cantidad,sp.pro_monto,date_format(sp.pro_fecha,'%d-%m-%Y') AS pro_fecha,p.pro_lote,p.pro_val_compra
        FROM salida_produccion AS sp, producto AS p where p.pro_id_producto=sp.pro_id_producto AND sp.pro_id_producto=$idproducto ORDER BY pro_fecha DESC");

        return $query->result_array();
    }

    function Kardex_Salidas_Total_Produccion($idproducto)
    {
        $query = $this->db->query(
            "SELECT FORMAT(ROUND(SUM(pro_monto),1),2) AS total_salidas_produccion
            FROM salida_produccion WHERE pro_id_producto=$idproducto"
        );
        return $query->row_array();
    }


}
