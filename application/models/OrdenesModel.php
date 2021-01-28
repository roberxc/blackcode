<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class OrdenesModel extends CI_Model {

	function __construct(){
		parent::__construct();
	}

    public function registrarOrdenes($data){

        //Registro de la tabla ordenes
        $proveedor = $data["idproveedor"];
        $bodega = $data["idbodega"];
        $estado = $data["estado"];
        $iva = 19;
        $total = $data["total"];
        $fecha = date("d/m/Y");

		$dataordenes = array(
			'iva' => $iva,
			'total' => $total,
			'fecha' => $fecha,
			'estado' => $estado,
			'id_proveedor' => $proveedor,
			'id_tipobodega' => $bodega,
        );

        $this->db->insert('ordenes', $dataordenes);
        $id_orden = $this->db->insert_id();
        
        //Registro de la tabla ordenes_materiales
        $idmateriales = $data["lista_iditem"];
        $valores = $data["lista_valor"];
        $cantidad = $data["lista_cantidad"];
        for($count = 0; $count<count($idmateriales); $count++){
            $materialesid_limpio = $idmateriales[$count];
            $valores_limpio = $valores[$count];
            $cantidad_limpio = $cantidad[$count];
            if(!empty($materialesid_limpio)){
				$insert_data_ordenesmateriales[] = array(
                    'id_orden' => $id_orden,
                    'id_material' => $materialesid_limpio,
                    'preciounitario' => $valores_limpio,
                    'cantidad' => $cantidad_limpio,
				);
			}
        }
        return $this->db->insert_batch('ordenes_materiales', $insert_data_ordenesmateriales);
    }

	public function registrarProveedores($ajax_data){
		$dataproveedores = array(
			'rut' => $ajax_data['rut'],
			'nombre' => $ajax_data['nombre'],
			'direccion' => $ajax_data['direccion'],
			'telefono' => $ajax_data['telefono'],
			'correo' => $ajax_data['correo'],
			'descripcion' => $ajax_data['comentario'],
			'diascredito' => $ajax_data['diascredito'],
		);

		return $this->db->insert('proveedores',$dataproveedores);
    }

	public function registrarNuevoProducto($ajax_data){
		$dataproductos = array(
			'nombre' => $ajax_data['producto'],
			'valor' => $ajax_data['valor'],
		);

		return $this->db->insert('materiales_comprados',$dataproductos);
	}

	function make_datatables_proveedores()
    {
        $this->make_query_proveedores();
        if ($_POST["length"] != - 1){
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();

    }

    //ESTE ES EL SELECT DE LA TABLA PRINCIPAL DE Stock
    var $tablaaa = array(
        "proveedores",
    );
    var $select_columnaaa = array(
		"id_proveedor",
		"rut",
        "nombre",
        "direccion",
        "telefono",
        "correo",
        "descripcion",
        "diascredito",
    );

    var $order_columnaaa = array(
        "rut",
		"nombre",
		"telefono",
    );

    function make_query_proveedores(){
        $this->db->select($this->select_columnaaa);
        $this->db->from($this->tablaaa);
        
        if (isset($_POST["search"]["value"]) && $_POST["search"]["value"] != ''){
            $this->db->group_start();
            $this->db->like("rut", $_POST["search"]["value"]);
            $this->db->or_like("nombre", $_POST["search"]["value"]);
            $this->db->group_end();
        }
        if (isset($_POST["order"])){
            $this->db->order_by($this->order_columnaaa[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        
        }else{
            $this->db->order_by('id_proveedor', 'ASC');
        }
    }

    function get_all_data_proveedores(){
        $this->db->select($this->select_columnaaa);
        $this->db->from($this->tablaaa);


        return $this->db->count_all_results();
    }

    function get_filtered_data_proveedores(){
        $this->make_query_proveedores();
        $query = $this->db->get();

        return $query->num_rows();
	}
	
	public function ObtenerProveedores($idpersonal){
		$query = $this->db
				->select("*") # También puedes poner * si quieres seleccionar todo
				->from("proveedores")
				->get();
		
		return $query->result();
    }
    
    public function listaOrdenes(){
		$query = $this->db
				->select("rut,nombre") # También puedes poner * si quieres seleccionar todo
				->from("proveedores")
				->get();
		
		return $query->result();
    }

    public function listaMateriales(){
		$query = $this->db
				->select("id_material,nombre, valor") # También puedes poner * si quieres seleccionar todo
				->from("materiales_comprados")
				->get();
    	return $query->result();
    }
    
    public function listaBodegas(){
		$query = $this->db
				->select("id_tipobodega, nombretipobodega") # También puedes poner * si quieres seleccionar todo
				->from("tipobodega")
				->get();
    	return $query->result();
    }
    
    //Tabla de con buscador ordenes
    function make_datatables_ordenes(){
        $this->make_query_ordenes();
        if ($_POST["length"] != - 1){
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();

    }

    var $tablaordenes = array(
        "proveedores",
        "ordenes",
    );
    var $select_columna_ordenes = array(
		"id_orden",
		"iva",
        "total",
        "fecha",
        "estado",
        "proveedores.nombre",
    );

    var $order_columna_ordenes = array(
        "fecha",
		"proveedores.nombre",
    );

    var $where_orden = "ordenes.id_proveedor = proveedores.id_proveedor";

    function make_query_ordenes(){
        $this->db->select($this->select_columna_ordenes);
        $this->db->from($this->tablaordenes);
        $this->db->where($this->where_orden);

        if (isset($_POST["search"]["value"]) && $_POST["search"]["value"] != ''){
            $this->db->group_start();
            $this->db->like("nombre", $_POST["search"]["value"]);
            $this->db->or_like("estado", $_POST["search"]["value"]);
            $this->db->group_end();
        }
        if (isset($_POST["order"])){
            $this->db->order_by($this->order_columna_ordenes[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        
        }else{
            $this->db->order_by('id_orden', 'ASC');
        }
    }

    function get_all_data_ordenes(){
        $this->db->select($this->select_columna_ordenes);
        $this->db->from($this->tablaordenes);


        return $this->db->count_all_results();
    }

    function get_filtered_data_ordenes(){
        $this->make_query_ordenes();
        $query = $this->db->get();

        return $query->num_rows();
    }

    public function ObtenerDetalleOrden($idorden){
		$query = $this->db
				->select("o.id_orden as numero, m.nombre as nombre, om.cantidad as cantidad, om.preciounitario as valor") # También puedes poner * si quieres seleccionar todo
				->from("ordenes_materiales om")
				->join("ordenes o", "om.id_orden = o.id_orden")
				->join("materiales_comprados m", "om.id_material = m.id_material")
				->where("o.id_orden",$idorden)
				->get();


        // if (count($query->result()) > 0) {
        return $query->result();
        // }
	}

}

?>