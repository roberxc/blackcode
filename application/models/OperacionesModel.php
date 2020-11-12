<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class OperacionesModel extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	public function ObtenerTiposTrabajos(){
		$query = $this->db->get('tipotrabajo');
    	return $query->result();
	}
	
	public function siExisteCodigoServicio($codigo_servicio){
		$this->db->select('CodigoServicio')
		->from('codigoservicio')
		->where('CodigoServicio',$codigo_servicio)
		->limit(1);
		$query = $this->db->get();
		return $query->result();
	}

	public function consultarCodigoServicio(string $codigo_servicio){
		$this->db->select('ID_TipoTrabajo')
				->from('tipotrabajo')
				->like('NombreTipoTrabajo', $codigo_servicio)
				->limit(1);
		 $query = $this->db->get();
		 $idtipotrabajo = $query->result();


		if($this->siExisteCodigoServicio($codigo_servicio)!=null){
			$dataegreso = array(
				'CodigoServicio' => $codigo_servicio,
				'ID_TipoTrabajo' => $idtipotrabajo[0]['ID_TipoTrabajo'],
			);
			$this->db->insert('codigoservicio', $dataegreso);
		}else{
			$query = $this->db->select('CodigoServicio')
			->from('codigoservicio')
			->get();
			$row = $query->last_row();
			if($row){
				$idPostfix = (int)substr($row->ID,1)+1;
				$nextId = $codigo_servicio.STR_PAD((string)$idPostfix,5,"0",STR_PAD_LEFT);
			}else{
				$nextId = $codigo_servicio.'01';
			} // For the first time
			return $nextId;

		}
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

	public function obtenerIDTipoTrabajo(string $abreviacion){
		$this->db->select('ID_TipoTrabajo')
		->from('tipotrabajo')
		->like('Abreviacion',$abreviacion)
		->limit(1);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function registrarTrabajoDiario($data){
		var_dump('DATITOS: '. $data['codigo_servicio']);
		$idtipotrabajo = $this->obtenerIDTipoTrabajo($data['codigo_servicio']);
		$datacodigo = array(
			'CodigoServicio' => $data['codigo_servicio'],
			'ID_TipoTrabajo' => $idtipotrabajo[0]['ID_TipoTrabajo'],
		);
		$this->db->insert('codigoservicio', $datacodigo);
		$id_codigo = $this->db->insert_id();

		$dataproyecto = array(
			'NombreProyecto' => $data['nombre_proyecto'],
		);

		$this->db->insert('proyecto', $dataproyecto);
		$id_proyecto = $this->db->insert_id();

		$datatrabajodiario = array(
			'PersonalCargo' => $data['nombre_proyecto'],
			'Detalle' => $data['nombre_proyecto'],
			'ValorAsignado' => $data['nombre_proyecto'],
			'ID_Proyecto' => $id_proyecto,
			'ID_Codigo' => $id_codigo,
		);

		return $this->db->insert('trabajodiario', $datatrabajodiario);


	}


}

?>