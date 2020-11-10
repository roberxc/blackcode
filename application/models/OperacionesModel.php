<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class OperacionesModel extends CI_Model {

	function __construct(){
		parent::__construct();
	}
	
	public function consultarCodigoServicio(){
		$query = $this->db
				->select("CodigoServicio AS Codigo") # También puedes poner * si quieres seleccionar todo
				->from("tipotrabajo")
				->get();
        // if (count($query->result()) > 0) {
        return $query->result();
        // }
	}


}

?>