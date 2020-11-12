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

	public function getIDTrabajoDiario(){
		//SELECT tr.ID_TrabajoDiario FROM TrabajoDiario tr, TipoTrabajo tb 
		//WHERE tr.ID_TipoTrabajo = tb.ID_TipoTrabajo AND tb.CodigoServicio = 'MN1' 
		$query = $this->db
				->select("tr.ID_TrabajoDiario") # También puedes poner * si quieres seleccionar todo
				->from("TrabajoDiario tr")
				->join("TipoTrabajo tb", "tr.ID_TipoTrabajo = tb.ID_TipoTrabajo")
				->where('tb.CodigoServicio', $codigoservicio)
				->get();
		return $query->result_array();

	}

	public function getTipoGasto($nombre){
		$this->db->select('ID_TipoGasto')
				->from('tipogasto')
				->where('NombreTipoGasto',$nombre)
				->limit(1);
		 $query = $this->db->get();
		 return $query->result_array();
		
	}

	public function ingresarGastosViaticos($ajax_data){
		if($ajax_data['vagua']>0){
			$idtipogasto = $this->getTipoGasto('Agua');
			$dataegreso = array(
				'Valor' => $ajax_data['vagua'],
				'ID_TipoGasto' => $idtipogasto[0]['ID_TipoGasto'],
				'ID_TrabajoDiario' => 1,
			);

			$this->db->insert('gastos', $dataegreso);
		}else if($ajax_data['vdesayuno']>0){
			$idtipogasto = $this->getTipoGasto('Desayuno');
			$dataegreso = array(
				'Valor' => $ajax_data['vdesayuno'],
				'ID_TipoGasto' => $idtipogasto[0]['ID_TipoGasto'],
				'ID_TrabajoDiario' => 1,
			);
			
		   $this->db->insert('gastos', $dataegreso);
		}else if($ajax_data['valojamiento']>0){
			$idtipogasto = $this->getTipoGasto('Alojamiento');

			$idtipoalojamiento = $this->db->get();
			$dataegreso = array(
				'Valor' => $ajax_data['valojamiento'],
				'ID_TipoGasto' => $idtipogasto[0]['ID_TipoGasto'],
				'ID_TrabajoDiario' => 1,
			);
			
			$this->db->insert('gastos', $dataegreso);
			
		}else if($ajax_data['vcena']>0){
			$idtipogasto = $this->getTipoGasto('Cena');
			$idtipocena = $this->db->get();
			$dataegreso = array(
				'Valor' => $ajax_data['vcena'],
				'ID_TipoGasto' => $idtipogasto[0]['ID_TipoGasto'],
				'ID_TrabajoDiario' => 1,
			);
			
			$this->db->insert('gastos', $dataegreso);
			
		}else if($ajax_data['valmuerzo']>0){
			$idtipogasto = $this->getTipoGasto('Almuerzo');
			$idtipoalmuerzo = $this->db->get();
			$dataegreso = array(
				'Valor' => $ajax_data['valmuerzo'],
				'ID_TipoGasto' => $idtipogasto[0]['ID_TipoGasto'],
				'ID_TrabajoDiario' => 1,
			);
			
			$this->db->insert('gastos', $dataegreso);
			
		}

		$data = array (
			array( 'nomDat1'=>dato1,
					  'nomDat2'=>dato2),
			array('nomDat1'=>dato3,
					  'nomDat2'=>dato4));
		$this->db->insert_batch('gastos',$data);
	}


}

?>