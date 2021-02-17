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

    public function listaFacturas(){
		$query = $this->db
				->select("id_facturas,nrofactura") # También puedes poner * si quieres seleccionar todo
				->from("facturas")
				->get();
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
        $this->db->from('facturas');
        if(!empty($params['id'])){
            $this->db->where('id_facturas',$params['id']);
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

    public function getIDTrabajoDiario($codigoservicio){
		$query = $this->db
				->select("tb.ID_TrabajoDiario AS ID")
				->from("CodigoServicio c")
				->join("TrabajoDiario tb", "tb.ID_Codigo = c.ID_Codigo")
				->where("c.CodigoServicio",$codigoservicio)
				->get();
		return $query->result_array();

	}

    function subirFacturaCompraMateriales($data,$codigoservicio,$monto,$detalle){
		$idtrabajodiario = $this->getIDTrabajoDiario($codigoservicio);
		$data = array(
			"ubicaciondocumento" => $data['upload_data']['file_name'],
            "montototal" => $monto,
            "detalle" => $detalle,
            "id_trabajodiario" => $idtrabajodiario[0]['ID'],
        );
		return $this->db->insert("factura_trabajo", $data);
	}

    //Obtener id de orden
	public function getIdOrden($nroorden){
		$query = $this->db->select("id_orden") # También puedes poner * si quieres seleccionar todo
				->from("ordenes")
				->where('nroorden', $nroorden);
		$query = $this->db->get();
		return $query->result_array();
	}

    function subirFactura($data,$fecha,$nroorden,$nrofactura,$montototal,$detalle){
		$idordenquery = $this->getIdOrden($nroorden);
		$data = array(
			"fecha" => $fecha,
			"nrofactura" => $nrofactura,
            "montototal" =>$montototal,
            "detalle" =>$detalle,
			"ubicaciondocumento" => $data['upload_data']['file_name'],
			"id_orden" => $idordenquery[0]['id_orden'],
		);
		return $this->db->insert("facturas", $data);
	}

	function siExisteFactura($ajax_data){
		$nrofactura = $ajax_data["nrofactura"];
        $nrofacturaquery = $this->siExisteNroFactura($nrofactura);
		if(count($nrofacturaquery) == 0){
            return true;
		}
		return false;
	}

    public function siExisteNroFactura($nrofactura){
		$query = $this->db->select("nrofactura") # También puedes poner * si quieres seleccionar todo
				->from("facturas")
				->where('nrofactura', $nrofactura);
		$query = $this->db->get();
		return $query->result();
	}
}

?>