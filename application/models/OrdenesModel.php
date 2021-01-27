<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class OrdenesModel extends CI_Model {

	function __construct(){
		parent::__construct();
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
    

}

?>