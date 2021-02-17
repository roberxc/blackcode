<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class ComprobantePagoModel extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function make_datatables_comprobante()
    {
        $this->make_query_comprobante();
        if ($_POST["length"] != - 1){
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();

    }

    //ESTE ES EL SELECT DE LA TABLA PRINCIPAL DE Stock
    var $tablaaa = array(
        "facturas f",
        "documento_pago d",
        "ordenes o",
        "ordenes_cotizaciones oc",
        "cotizaciones c",
    );
    var $select_columnaaa = array(
        "f.nrofactura",
        "o.nroorden",
        "c.nrocotizacion",
        "d.nrodocumento",
        "d.fecha",
        "d.detalle",
    );

    var $order_columnaaa = array(
        "nrodocumento",
    );
    var $whereee = "f.id_facturas = d.id_factura AND f.id_orden = o.id_orden AND oc.id_orden = o.id_orden AND oc.id_cotizacion = c.id_cotizacion";

    function make_query_comprobante(){
        $this->db->select($this->select_columnaaa);
        $this->db->from($this->tablaaa);
        $this->db->where($this->whereee);
        if (isset($_POST["search"]["value"]) && $_POST["search"]["value"] != ''){
            $this->db->group_start();
            $this->db->like("nrodocumento", $_POST["search"]["value"]);
             $this->db->group_end();
        }
        if (isset($_POST["order"])){
            $this->db->order_by($this->order_columnaaa[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        
        }else{
            $this->db->order_by('id_facturas', 'ASC');
        }
    }

    function get_all_data_comprobante(){
        $this->db->select($this->select_columnaaa);
        $this->db->from($this->tablaaa);
        return $this->db->count_all_results();
    }

    function get_filtered_data_comprobante(){
        $this->make_query_comprobante();
        $query = $this->db->get();

        return $query->num_rows();
    }
    
    public function ObtenerArchivosSubidos($nrodocumento){

		$query = $this->db
		->select("id_documentopago AS ID, ubicaciondocumento AS Archivo") # También puedes poner * si quieres seleccionar todo
		->from("documento_pago")
		->where('nrodocumento',$nrodocumento)
		->get();

		return $query->result();
    }

    function subirComprobante($data,$fecha,$detalle,$nrodocumento,$nrofactura){
		$data = array(
			"nrodocumento" => $nrodocumento,
			"fecha" => $fecha,
			"detalle" => $detalle,
			"ubicaciondocumento" => $data['upload_data']['file_name'],
			"id_factura" => $nrofactura,
		);
		return $this->db->insert("documento_pago", $data);
	}
    
    function getRows($params = array()){
        $this->db->select('ubicaciondocumento');
        $this->db->from('documento_pago');
        if(!empty($params['id'])){
            $this->db->where('id_documentopago',$params['id']);
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