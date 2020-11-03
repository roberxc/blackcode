<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class CajaChicaModel extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	//Metodos para registro con base de datos
	public function registroIngreso(string $fecha, string $monto){

		$this->db->query("INSERT INTO cajachica (Balance) VALUES ({$monto})");
		$insert_id = $this->db->insert_id();

		$data = array(
			'FechaIngreso' => $fecha,
			'MontoIngreso' => $monto,
			'ID_CajaChica' => $insert_id
		);
	
		return $this->db->insert('ingresocaja', $data);

	}

	public function registroEgreso(string $fecha, string $monto,string $destinatario,string $detalle){

		$datacajachica = array(
			'Balance' => -$monto,
		);

		$this->db->insert('cajachica', $datacajachica);
		$insert_id = $this->db->insert_id();

		$datadestinatario = array(
			'Nombre' => $destinatario,
		);

		$this->db->insert('destinatario', $datadestinatario);
		$desti_id = $this->db->insert_id();

		$dataegreso = array(
			'FechaEgreso' => $fecha,
			'MontoEgreso' => $monto,
			'ID_Destinatario' => $desti_id,
			'Vuelto' => 0,
			'ID_CajaChica' => $insert_id,
			'Detalle' => $detalle
		);
	
		return $this->db->insert('egresocaja', $dataegreso);

	}

	public function siExisteDestinatario(string $destinatario){
		$this->db->select('ID_Destinatario');
		$this->db->from('destinatario');
		return $this->db->where('Nombre', $destinatario);
	}


	public function obtenerIngresos(){
        $query = $this->db->get('ingresocaja');
        // if (count($query->result()) > 0) {
        return $query->result();
        // }
	}
	
	public function obtenerEgresos(){
		$query = $this->db
				->select("ci.FechaEgreso AS FechaEgreso, ci.MontoEgreso AS MontoEgreso, t.Nombre AS NombreDestinatario,ci.Detalle AS Detalle") # También puedes poner * si quieres seleccionar todo
				->from("destinatario t")
				->join("egresocaja ci", "ci.ID_Destinatario = t.ID_Destinatario")
				->join("cajachica c", "c.ID_CajaChica = ci.ID_CajaChica")
				->get();

        // if (count($query->result()) > 0) {
        return $query->result();
        // }
	}
	
	public function obtenerVueltos(){
		$query = $this->db
				->select("t.Nombre AS NombreDestinatario,ci.FechaEgreso AS Fecha,ci.MontoEgreso AS Asignado,ci.Vuelto AS Vuelto") # También puedes poner * si quieres seleccionar todo
				->from("destinatario t")
				->join("egresocaja ci", "ci.ID_Destinatario = t.ID_Destinatario")
				->join("cajachica c", "c.ID_CajaChica = ci.ID_CajaChica")
				->get();

        // if (count($query->result()) > 0) {
        return $query->result();
        // }
    }

	public function obtenerTotalCajaChica(){
		
		$this->db->select_sum('Balance');
		$query = $this->db->get('cajachica');
		return $query->result();
		
    }





}

?>