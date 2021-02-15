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
				->select("*") # También puedes poner * si quieres seleccionar todo
				->from("cotizaciones")
				->get();
		
		return $query->result();
    }

    public function getIDProveedor($rut){
		return $this->ProveedoresModel->getIDProveedor($rut);

	}

    //Subir documento de cotizaciones
	function siExisteCotizacion($ajax_data){
		$nrocotizacion = $ajax_data["nrocotizacion"];
        $nrocotizacionquery = $this->siExisteNroCotizacion($nrocotizacion);
		if(count($nrocotizacionquery) == 0){
            return true;
		}
		return false;
	}

    //Subir documento de cotizaciones
	function registrarCotizacion($data,$ajax_data){
        $proveedor = $ajax_data["proveedor"];
		$fecha = $ajax_data["fecha"];
		$nrocotizacion = $ajax_data["nrocotizacion"];

        $nrocotizacionquery = $this->siExisteNroCotizacion($nrocotizacion);

        $material = $ajax_data["id"];
		$id = $ajax_data["material"];
		$cantidad = $ajax_data["cantidad"];
		$costo = $ajax_data["costo"];
		$iva = $ajax_data["iva"];
		$importe = $ajax_data["importe"];

        $data_cotizaciones = array(
			"fecha" => $fecha,
			"nrocotizacion" => $nrocotizacion,
			"ubicaciondocumento" => $data['upload_data']['file_name'],
			"id_proveedor" => $proveedor,
		);
		$this->db->insert("cotizaciones", $data_cotizaciones);
        $idcotizacion = $this->db->insert_id();
        for($count = 0; $count<count($id); $count++){
            $materialesid_limpio = $id[$count];
            $materiales_limpio = $material[$count];
            $valores_limpio = $costo[$count];
            $cantidad_limpio = $cantidad[$count];
            //-----------------------------------
            $iva_limpio = $iva[$count];
            $importe_limpio = $importe[$count];
            if(!empty($materialesid_limpio)){
                $insert_data[] = array(
                    'id_cotizacion' => $idcotizacion,
                    'id_material' => $materialesid_limpio,
                    'preciounitario' => $valores_limpio,
                    'importe' => $importe_limpio,
                    'cantidad' => $cantidad_limpio,
                );
            }
        }
        return  $this->db->insert_batch('cotizacion_materiales',$insert_data);
	}

	public function siExisteNroCotizacion($nrocotizacion){
		$query = $this->db->select("nrocotizacion") # También puedes poner * si quieres seleccionar todo
				->from("cotizaciones")
				->where('nrocotizacion', $nrocotizacion);
		$query = $this->db->get();
		return $query->result();
	}

    public function ObtenerCotizaciones($idcotizacion){

		$query = $this->db
				->select("m.id_material, c.nrocotizacion as numero, m.nombre as nombre, cm.cantidad as cantidad, cm.preciounitario as valor, cm.importe as importe") # También puedes poner * si quieres seleccionar todo
				->from("cotizacion_materiales cm")
				->join("cotizaciones c", "cm.id_cotizacion = c.id_cotizacion")
				->join("materiales_comprados m", "m.id_material = cm.id_material")
				->where("c.id_cotizacion",$idcotizacion)
				->get();
        // if (count($query->result()) > 0) {
        return $query->result();
    }
}

?>