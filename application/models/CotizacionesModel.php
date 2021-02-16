<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class CotizacionesModel extends CI_Model {

	function __construct(){
        parent::__construct();
        $this->load->model('ProveedoresModel');
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
		"nrocotizacion",
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
    
    public function ObtenerArchivosSubidos($idcotizacion){

		$query = $this->db
		->select("id_cotizacion AS ID, ubicaciondocumento AS Archivo") # También puedes poner * si quieres seleccionar todo
		->from("cotizaciones")
		->where('nrocotizacion',$idcotizacion)
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
    
    public function listaCotizaciones(){
		$query = $this->db
				->select("nrocotizacion") # También puedes poner * si quieres seleccionar todo
				->from("cotizaciones")
				->get();
		
		return $query->result();
    }

    public function getIDProveedor($rut){
		return $this->ProveedoresModel->getIDProveedor($rut);

	}

    //Subir documento de cotizaciones
	function subirCotizacion($data,$proveedor,$fecha,$nrocotizacion){
        $nrocotizacionquery = $this->siExisteNroCotizacion($nrocotizacion);
        $id_proveedor = $this->getIDProveedor($proveedor);
		if(count($nrocotizacionquery) == 0){
			$data = array(
				"fecha" => $fecha,
				"nrocotizacion" => $nrocotizacion,
				"ubicaciondocumento" => $data['upload_data']['file_name'],
				"id_proveedor" => $id_proveedor[0]["id_proveedor"],
			);
			return $this->db->insert("cotizaciones", $data);

		}
		return null;
	}

	public function siExisteNroCotizacion($nrocotizacion){
		$query = $this->db->select("nrocotizacion") # También puedes poner * si quieres seleccionar todo
				->from("cotizaciones")
				->where('nrocotizacion', $nrocotizacion);
		$query = $this->db->get();
		return $query->result();
	}
}

?>