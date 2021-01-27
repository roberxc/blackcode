<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class CotizacionesModel extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function make_datatables_cotizaciones()
    {
        $this->make_query_cotizaciones();
        if ($_POST["length"] != - 1){
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();

    }

    //ESTE ES EL SELECT DE LA TABLA PRINCIPAL DE Stock
    var $tablaaa = array(
        "proveedores",
        "cotizaciones",
    );
    var $select_columnaaa = array(
		"id_cotizacion",
		"fecha",
        "nombre",
    );

    var $order_columnaaa = array(
        "id_cotizacion",
        "nombre",
        "fecha",
    );
    var $whereee = "proveedores.id_proveedor = cotizaciones.id_proveedor";

    function make_query_cotizaciones(){
        $this->db->select($this->select_columnaaa);
        $this->db->from($this->tablaaa);
        $this->db->where($this->whereee);
        
        if (isset($_POST["search"]["value"]) && $_POST["search"]["value"] != ''){
            $this->db->group_start();
            $this->db->like("id_cotizacion", $_POST["search"]["value"]);
            $this->db->or_like("nombre", $_POST["search"]["value"]);
            $this->db->group_end();
        }
        if (isset($_POST["order"])){
            $this->db->order_by($this->order_columnaaa[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        
        }else{
            $this->db->order_by('id_cotizacion', 'ASC');
        }
    }

    function get_all_data_cotizaciones(){
        $this->db->select($this->select_columnaaa);
        $this->db->from($this->tablaaa);


        return $this->db->count_all_results();
    }

    function get_filtered_data_cotizaciones(){
        $this->make_query_cotizaciones();
        $query = $this->db->get();

        return $query->num_rows();
	}
}

?>