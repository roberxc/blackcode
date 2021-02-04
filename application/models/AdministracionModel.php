<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdministracionModel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function registroCostoFijo($data){

        $monto = $data['valor'];
        $fecha = $data['fecha'];
		$idtipo = $data['id_tipo'];
		$detalle = $data['detalle'];
        
		$data = array(
			'fecha' => $fecha,
			'valor' => $monto,
			'detalle' => $detalle,
			'id_tipo' => $idtipo
		);
	
		return $this->db->insert('costosfijos', $data);

	}

    public function registroTipoCostoFijo($data){

        $nombre = $data['nombre'];
        
		$data = array(
			'nombre' => $nombre,
		);
	
		return $this->db->insert('tipocostosfijos', $data);

	}

	public function listaTipoCostos(){
		$query = $this->db
				->select("id_tipo,nombre") # También puedes poner * si quieres seleccionar todo
				->from("tipocostosfijos")
				->get();
    	return $query->result();
    }
}

?>
