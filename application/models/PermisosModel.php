<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class PermisosModel extends CI_Model {

	function __construct(){
        parent::__construct();
	}

	function make_datatables_permisos()
    {
        $this->make_query_permisos();
        if ($_POST["length"] != - 1){
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();

    }

    //ESTE ES EL SELECT DE LA TABLA PRINCIPAL DE Stock
    var $tablaaa = array(
        "permiso pm",
        "tipo_permiso t",
        "personal p",
    );
    var $select_columnaaa = array(
		"pm.id_permiso",
        "p.rut",
        "p.nombrecompleto",
		"pm.fecha_inicio",
        "pm.fecha_termino",
        "t.nombre as tipopermiso",
    );

    var $order_columnaaa = array(
        "pm.id_permiso",
        "p.rut",
        "p.nombrecompleto",
		"pm.fecha_inicio",
        "pm.fecha_termino",
    );

    var $whereee = "p.id_personal = pm.id_personal AND pm.id_tipopermiso=t.id_tipopermiso";

    function make_query_permisos(){
        $this->db->select($this->select_columnaaa);
        $this->db->from($this->tablaaa);
        $this->db->where($this->whereee);
        
        if (isset($_POST["search"]["value"]) && $_POST["search"]["value"] != ''){
            $this->db->group_start();
            $this->db->like("nombrecompleto", $_POST["search"]["value"]);
            $this->db->or_like("rut", $_POST["search"]["value"]);
            $this->db->group_end();
        }
        if (isset($_POST["order"])){
            $this->db->order_by($this->order_columnaaa[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        
        }else{
            $this->db->order_by('id_permiso', 'ASC');
        }
    }

    function get_all_data_permisos(){
        $this->db->select($this->select_columnaaa);
        $this->db->from($this->tablaaa);


        return $this->db->count_all_results();
    }

    function get_filtered_data_permisos(){
        $this->make_query_permisos();
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

	function registrarPermiso($data,$ajax_data){

        $fecha = explode('-',$ajax_data["fecha_permiso"]);
        $detalle = $ajax_data["detalle"];
        $idpersonal = $ajax_data["rutpersonal"];
        $idtipopermiso = $ajax_data["tipopermiso"];

        $data_permisos = array(
			"detalle" => $detalle,
			"fecha_inicio" => $fecha[0],
			"fecha_termino" => $fecha[1],
            "ubicaciondocumento" => $data['upload_data']['file_name'],
			"id_personal" => $idpersonal,
            "id_tipopermiso" => $idtipopermiso,
		);
		
        return  $this->db->insert("permiso", $data_permisos);
	}

    public function ObtenerTipoPermisos(){
		$query = $this->db
				->select("*") # También puedes poner * si quieres seleccionar todo
				->from("tipo_permiso")
				->get();
        // if (count($query->result()) > 0) {
        return $query->result();
    }
}

?>