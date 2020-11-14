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
		->like('Abreviacion',$abreviacion, 'before')
		->limit(1);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function registrarTrabajoDiario($data){
		//Cadena de codigo sin el numero
		
		$cadena_codigo = preg_replace('/[0-9]+/', '', $data['codigo_servicio']);
		$idtipotrabajo = $this->obtenerIDTipoTrabajo($cadena_codigo);
		//var_dump('DATITOS ID: '. $idtipotrabajo[0]['ID_TipoTrabajo']);
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
			'PersonalCargo' => $data['persona_cargo'],
			'Detalle' => $data['detalle_trabajo'],
			'ValorAsignado' => $data['suma_asignada'],
			'ID_Proyecto' => $id_proyecto,
			'ID_Codigo' => $id_codigo,
		);

		//Registro de trabajo diario
		$this->db->insert('trabajodiario', $datatrabajodiario);
		$id_trabajodiario = $this->db->insert_id();
		
		//Registro  de personal
		
		$lista_rut = $data["lista_rut"];
		$lista_nombres = $data["lista_nombre"];
		$query = '';
		//var_dump($listadopersonal);

		for($count = 0; $count<count($lista_rut); $count++){
			$rut = $lista_rut[$count];
			$nombre = $lista_nombres[$count];

			if(!empty($rut) && !empty($nombre)){
				//$query .= 'INSERT INTO personal (Rut,NombreCompleto,ID_TrabajoDiario) VALUES ("'.$rut.'", "'.$nombre.'", "'.$id_trabajodiario.'");';
				$insert_data[] = array(
					'Rut' => $rut,
					'NombreCompleto'=> $nombre,
					'ID_TrabajoDiario'=> $id_trabajodiario,
				  );
			}
			
		}
		

		return  $this->db->insert_batch('personal',$insert_data);
	}

	public function consultarCodigoServicio(string $codigo_servicio){
		$cadena_codigo = preg_replace('/[0-9]+/', '', $codigo_servicio);
		$query = "SELECT max(c.codigoservicio) AS Codigo FROM codigoservicio c,tipotrabajo tb
		WHERE c.ID_TipoTrabajo = tb.ID_TipoTrabajo AND tb.Abreviacion LIKE '".$cadena_codigo."'";
		$data = $this->db->query($query)->row_array();
		$kode_auto = '';
		if($data){
			$max_kode = $data['Codigo'];
			$max_kode2 = (int)substr($max_kode,2);
			$kodecount = $max_kode2+1;
			$kode_auto = $cadena_codigo.sprintf('%03s',$kodecount);	
		}

		return $kode_auto;
	}

}

?>