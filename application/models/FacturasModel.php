<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class FacturasModel extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function make_datatables_facturas()
    {
        $this->make_query_facturas();
        if ($_POST["length"] != - 1){
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();

    }

    //ESTE ES EL SELECT DE LA TABLA PRINCIPAL DE Stock
    var $tablaaa = array(
        "proveedores p",
        "cotizaciones c",
        "facturas f",
        "ordenes o",
        "ordenes_cotizaciones oc",
    );
    var $select_columnaaa = array(
        "f.nrofactura",
        "f.fecha",
        "p.nombre",
        "p.rut",
        "c.nrocotizacion",
        "o.nroorden",
    );

    var $order_columnaaa = array(
        "id_facturas",
        "nombre",
    );
    var $whereee = "o.id_orden = f.id_orden AND o.id_orden = oc.id_orden AND c.id_cotizacion = oc.id_cotizacion AND c.id_proveedor = p.id_proveedor";

    function make_query_facturas(){
        $this->db->select($this->select_columnaaa);
        $this->db->from($this->tablaaa);
        $this->db->where($this->whereee);
        
        if (isset($_POST["search"]["value"]) && $_POST["search"]["value"] != ''){
            $this->db->group_start();
            $this->db->like("id_facturas", $_POST["search"]["value"]);
            $this->db->or_like("nombre", $_POST["search"]["value"]);
            $this->db->or_like("rut", $_POST["search"]["value"]);
            $this->db->group_end();
        }
        if (isset($_POST["order"])){
            $this->db->order_by($this->order_columnaaa[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        
        }else{
            $this->db->order_by('id_facturas', 'ASC');
        }
    }

    function get_all_data_facturas(){
        $this->db->select($this->select_columnaaa);
        $this->db->from($this->tablaaa);


        return $this->db->count_all_results();
    }

    function get_filtered_data_facturas(){
        $this->make_query_facturas();
        $query = $this->db->get();

        return $query->num_rows();
    }
    
    public function ObtenerArchivosSubidos($nrofactura){

		$query = $this->db
		->select("id_facturas AS ID, ubicaciondocumento AS Archivo") # También puedes poner * si quieres seleccionar todo
		->from("facturas")
		->where('nrofactura',$nrofactura)
		->get();

		return $query->result();
    }
    
    function getRows($params = array()){
        $this->db->select('ubicaciondocumento');
        $this->db->from('cotizaciones');
        if(!empty($params['id'])){
            $this->db->where('id_cotizacion',$params['id']);
            //get records
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            //get records
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
        }
        //return fetched data
        return $result;
	}
}

?>