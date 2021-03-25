<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class ProveedoresModel extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	//Metodo para registrar gastos combustible
	public function registrarProveedores($ajax_data){
        $flag = false;
        if($this->siExisteProveedor($ajax_data)){
            $dataproveedores = array(
                'rut' => $ajax_data['rut'],
                'nombre' => $ajax_data['nombre'],
                'direccion' => $ajax_data['direccion'],
                'telefono' => $ajax_data['telefono'],
                'correo' => $ajax_data['correo'],
                'descripcion' => $ajax_data['comentario'],
                'diascredito' => $ajax_data['diascredito'],
                'estado' => 0,
            );

            $this->db->insert('proveedores',$dataproveedores);
            $flag = true;
        }else{
            $flag = false;
        }
		
        return $flag;
	}

    function siExisteProveedor($ajax_data){
        $query = $this->db->select("id_proveedor") # También puedes poner * si quieres seleccionar todo
        ->from("proveedores")
        ->where('rut', $ajax_data["rut"]);
        $query = $this->db->get();
		if(count($query->result()) == 0){
            return true;
		}
		return false;
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
        "estado",
    );

    var $order_columnaaa = array(
        "id_proveedor",
		"rut",
        "nombre",
        "direccion",
        "telefono",
        "correo",
        "descripcion",
        "diascredito",
        "estado",
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
    
    public function listaProveedores(){
		$query = $this->db
				->select("id_proveedor,rut,nombre") # También puedes poner * si quieres seleccionar todo
				->from("proveedores")
				->get();
		
		return $query->result();
    }
    
    //Se obtiene el la id del trabajo diario segun el codigo de servicio 
	public function getIDProveedor($rut){
		$query = $this->db->select("id_proveedor") # También puedes poner * si quieres seleccionar todo
				->from("proveedores")
				->where('rut', $rut);
		$query = $this->db->get();
		return $query->result_array();
    }
    
    public function ObtenerDetalleProveedores($idproveedor){
		$query = $this->db
				->select("p.id_proveedor, p.rut as rut, p.nombre as nombre, p.direccion as direccion, p.telefono as telefono, p.correo as correo, p.descripcion as descripcion, p.diascredito as diascredito") # También puedes poner * si quieres seleccionar todo
				->from("proveedores p")
				->where("p.id_proveedor",$idproveedor)
				->get();
        // if (count($query->result()) > 0) {
        return $query->result();
        // }
	}

    //Inactivar un proveedor cambiando su estado
    public function updateEstadoProveedor($data){
        $dataproveedor = array(
            'estado' => $data['estado_registro'],
        );

        $this->db->where('id_proveedor', $data['id_proveedor']);
		return $this->db->update('proveedores',$dataproveedor);
    }

    //Actualizar un proveedor
    public function updateProveedor($data){
        $dataproveedor = array(
            'rut' => $data['rut'],
            'nombre' => $data['nombre'],
            'direccion' => $data['direccion'],
            'telefono' => $data['telefono'],
            'correo' => $data['correo'],
            'descripcion' => $data['descripcion'],
            'diascredito' => $data['credito'],
        );
        $this->db->where('id_proveedor', $data['id_proveedor']);
		return $this->db->update('proveedores',$dataproveedor);
    }

}

?>