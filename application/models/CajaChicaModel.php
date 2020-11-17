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
			'NombreDestinatario' => $destinatario,
		);

		$this->db->insert('destinatario', $datadestinatario);
		$desti_id = $this->db->insert_id();

		$dataegreso = array(
			'FechaEgreso' => $fecha,
			'MontoEgreso' => $monto,
			'ID_Destinatario' => $desti_id,
			'Vuelto' => 0,
			'ID_CajaChica' => $insert_id,
			'Detalle' => $detalle,
			'Estado' => 1
		);
	
		return $this->db->insert('egresocaja', $dataegreso);

	}

	public function siExisteDestinatario(string $destinatario){
		$this->db->select('ID_Destinatario');
		$this->db->from('destinatario');
		return $this->db->where('Nombre', $destinatario);
	}


	public function obtenerIngresos(){		
		$query = $this->db
				->select("i.FechaIngreso AS FechaIngreso, i.MontoIngreso AS MontoIngreso") # También puedes poner * si quieres seleccionar todo
				->from("ingresocaja i")
				->join("cajachica c", "c.ID_CajaChica = i.ID_CajaChica")
				->get();
        // if (count($query->result()) > 0) {
        return $query->result();
        // }
	}
	
	public function obtenerEgresos(){
		$query = $this->db
				->select("ci.FechaEgreso AS FechaEgreso, ci.MontoEgreso AS MontoEgreso, t.NombreDestinatario AS NombreDestinatario,ci.Detalle AS Detalle,ci.Estado AS Estado") # También puedes poner * si quieres seleccionar todo
				->from("destinatario t")
				->join("egresocaja ci", "ci.ID_Destinatario = t.ID_Destinatario")
				->join("cajachica c", "c.ID_CajaChica = ci.ID_CajaChica")
				->where("ci.Estado",1)
				->get();


        // if (count($query->result()) > 0) {
        return $query->result();
        // }
	}
	
	public function obtenerVueltos(string $fecha){
		$query = $this->db
				->select("t.NombreDestinatario AS NombreDestinatario,ci.FechaEgreso AS Fecha,ci.MontoEgreso AS Asignado,ci.Vuelto AS Vuelto,ci.Estado AS Estado") # También puedes poner * si quieres seleccionar todo
				->from("destinatario t")
				->like('ci.FechaEgreso', $fecha)
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
	
	//Actualiza el vuelto de un destinatario 
	public function actualizarVuelto(int $vuelto,string $fecha,$flag,string $vuelto_input){

		if($flag == FALSE){
			$this->db->query("INSERT INTO cajachica (Balance) VALUES ({$vuelto})");
			$insert_id = $this->db->insert_id();

			$data = array(
				'FechaIngreso' => $fecha,
				'MontoIngreso' => $vuelto,
				'ID_CajaChica' => $insert_id
			);
		
			$this->db->insert('ingresocaja', $data);
			
			$this->db->set('Vuelto', $vuelto, FALSE);
			$this->db->set('Estado', 2, FALSE);
			$this->db->where('FechaEgreso', $fecha);
		}else if($flag){
			$this->db->query("INSERT INTO cajachica (Balance) VALUES ({$vuelto_input})");
			$insert_id = $this->db->insert_id();

			$data = array(
				'FechaIngreso' => $fecha,
				'MontoIngreso' => $vuelto,
				'ID_CajaChica' => $insert_id
			);
		
			$this->db->insert('ingresocaja', $data);
			
			$this->db->set('Vuelto', $vuelto, FALSE);
			$this->db->set('Estado', 2, FALSE);
			$this->db->where('FechaEgreso', $fecha);


		}



		/*
		$query = $this->db
				->from("egresocaja i")
				->join("cajachica c", "c.ID_CajaChica = i.ID_CajaChica")
				->set('i.MontoIngreso', $vuelto, FALSE)
				->set('c.Balance', $vuelto, FALSE)
				->where('FechaEgreso', $fecha)
				->update('ingresocaja');

		$this->db->set('MontoIngreso', $vuelto, FALSE);
		$this->db->where('FechaEgreso', $fecha);
		$this->db->update('ingresocaja'); // gives UPDATE mytable SET field = field+1 WHERE id = 2
*/
		return $this->db->update('egresocaja'); // gives UPDATE mytable SET field = field+1 WHERE id = 2
		
    }





}

?>