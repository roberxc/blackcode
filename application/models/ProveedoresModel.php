<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class ProveedoresModel extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	//Metodo para registrar gastos combustible
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

}

?>