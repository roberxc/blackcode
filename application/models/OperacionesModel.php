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

	public function ObtenerTiposCombustibles(){
		$names = array(36, 37);
		$this->db->select('NombreTipoGasto');
		$this->db->where_in('ID_TipoGasto',$names);
		$query = $this->db->get('tipogasto');
		return $query->result();
	}

	public function ObtenerListaPersonal($codigo){
		$query = $this->db
				->select("p.ID_Personal as ID, p.NombreCompleto AS Nombre,p.Rut AS Rut") # También puedes poner * si quieres seleccionar todo
				->from("codigoservicio c")
				->where('c.CodigoServicio', $codigo)
				->join("trabajodiario t", "c.ID_Codigo = t.ID_Codigo")
				->join("personal p", "p.ID_TrabajoDiario = t.ID_TrabajoDiario")
				->get();
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

	//Se obtiene el la id del trabajo diario segun el codigo de servicio 
	public function getIDTrabajoDiarioCS($codigoservicio){
		$query = $this->db->select("tr.ID_TrabajoDiario") # También puedes poner * si quieres seleccionar todo
				->from("TrabajoDiario tr")
				->join("codigoservicio c", "c.ID_Codigo = tr.ID_Codigo")
				->where('c.CodigoServicio', $codigoservicio);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function obtenerTotalViaticos($codigo){

		$idtipotrabajo = $this->getIDTrabajoDiarioCS($codigo);
		//var_dump('DATITOS ID: '. $idtipotrabajo[0]['ID_TipoTrabajo']);
		$idtrabajodiario = $idtipotrabajo[0]['ID_TrabajoDiario'];

		//Array con las id de los gastos viaticos
		$gastosviaticos = array(1,2,3,4,5);

		$this->db->select_sum('Valor');
		$this->db->where('ID_TrabajoDiario',$idtrabajodiario);
		$this->db->where_in('ID_TipoGasto',$gastosviaticos);
		$query = $this->db->get('gastos');
		
		return $query->result();
	}

	//Metodo para obtener los tipos de viaticos ingresados y asi poder mostrar el check en la vista
	public function ObtenerTiposViaticos($codigo){

		$idtipotrabajo = $this->getIDTrabajoDiarioCS($codigo);
		//var_dump('DATITOS ID: '. $idtipotrabajo[0]['ID_TipoTrabajo']);
		$idtrabajodiario = $idtipotrabajo[0]['ID_TrabajoDiario'];

		//Array con las id de los gastos viaticos
		$gastosviaticos = array(1,2,3,4,5);
		$query = $this->db
		->select("g.Valor AS Valor,t.NombreTipoGasto AS Nombre") # También puedes poner * si quieres seleccionar todo
		->from("gastos g")
		->join("tipogasto t", "t.ID_TipoGasto = g.ID_TipoGasto")
		->where_in('g.ID_TipoGasto',$gastosviaticos)
		->get();
		return $query->result();
	}

	public function ingresarGastosViaticos($ajax_data){

		//Obtener id de trabajo diario
		$idtipotrabajo = $this->getIDTrabajoDiarioCS($ajax_data['codigo_servicio']);
		//var_dump('DATITOS ID: '. $idtipotrabajo[0]['ID_TipoTrabajo']);
		$idtrabajodiario = $idtipotrabajo[0]['ID_TrabajoDiario'];
		$idtipogasto = 0;
		$data = array(
			array(
			   'Valor' => $ajax_data['valmuerzo'],
			   'ID_TipoGasto' => $this->getTipoGasto('Almuerzo')[0]['ID_TipoGasto'],
			   'ID_TrabajoDiario' => $idtrabajodiario
			),
			array(
				'Valor' => $ajax_data['vcena'],
				'ID_TipoGasto' => $this->getTipoGasto('Cena')[0]['ID_TipoGasto'],
				'ID_TrabajoDiario' => $idtrabajodiario
			 ),
			 array(
				'Valor' => $ajax_data['vagua'],
				'ID_TipoGasto' => $this->getTipoGasto('Agua')[0]['ID_TipoGasto'],
				'ID_TrabajoDiario' => $idtrabajodiario
			 ),
			 array(
				'Valor' => $ajax_data['valojamiento'],
				'ID_TipoGasto' => $this->getTipoGasto('Alojamiento')[0]['ID_TipoGasto'],
				'ID_TrabajoDiario' => $idtrabajodiario
			 ),

			 array(
				'Valor' => $ajax_data['vdesayuno'],
				'ID_TipoGasto' => $this->getTipoGasto('Desayuno')[0]['ID_TipoGasto'],
				'ID_TrabajoDiario' => $idtrabajodiario
			 )
		 );

		return $this->db->insert_batch('gastos',$data);
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

	public function registrarAsistenciaPersonal($data){
		//Registro  de asistencia
		$asistencia_manana_entrada = $data["lista_entradam"];
		$asistencia_manana_salida = $data["lista_salidam"];
		$asistencia_tarde_entrada = $data["lista_entradat"];
		$asistencia_tarde_salida = $data["lista_salidat"];
		//Rut de personal
		$asistencia_rut = $data["lista_id"];
		for($count = 0; $count<count($asistencia_rut); $count++){
			//Asistencia de mañana
			$asistencia_mentrada = $asistencia_manana_entrada[$count];
			$asistencia_msalida = $asistencia_manana_salida[$count];
			//Asistencia de tarde
			$asistencia_tentrada = $asistencia_tarde_entrada[$count];
			$asistencia_tsalida = $asistencia_tarde_salida[$count];
			//ID Personal
			$asistencia_idpersonal = $asistencia_rut[$count];
			if(!empty($asistencia_mentrada) && !empty($asistencia_msalida)
			 && !empty($asistencia_tentrada) && !empty($asistencia_tsalida)){
				$horaInicio = new DateTime($asistencia_mentrada);
				$horaTermino = new DateTime($asistencia_tsalida);
				$interval = $horaInicio->diff($horaTermino);
				$asd = $interval->format('%H:%i');
			
				$mihora = new DateTime($asd);
				//Resto de hora colacion mas horas totales
				$mihora->modify('-10 hours');
				$horaextras = $mihora->format('H:i');
				//Si no hay horas extras
				if(($horaextras == '00:00')){
					//No hay horas extras
					$fechaactual = date("d/m/y");
					$insert_data[] = array(
						'Fecha_Asistencia' => $fechaactual,
						'HoraLlegadaM'=> $asistencia_mentrada,
						'HoraSalidaM'=> $asistencia_msalida,
						'HoraLlegadaT'=> $asistencia_tentrada,
						'HoraSalidaT'=> $asistencia_tsalida,
						'ID_Personal'=> $asistencia_idpersonal,
						'HorasTrabajadas'=> 9,
						'HorasExtras'=> 0,
					);
				}else{
					
					//Si hay diferencias de horas
					$fechaactual = date("d/m/y");
					//Horas totales trabajadas
					$mihora = new DateTime($horaextras);
					$mihora->modify('+9 hours');
					$horastotales = $mihora->format('H:i');
					if(strtotime($horastotales)<strtotime('09:00')) {
						//No hay horas extras
						$horaInicio = new DateTime($asistencia_mentrada);
						$horaTermino = new DateTime($asistencia_tsalida);
						$insert_data[] = array(
							'Fecha_Asistencia' => $fechaactual,
							'HoraLlegadaM'=> $asistencia_mentrada,
							'HoraSalidaM'=> $asistencia_msalida,
							'HoraLlegadaT'=> $asistencia_tentrada,
							'HoraSalidaT'=> $asistencia_tsalida,
							'ID_Personal'=> $asistencia_idpersonal,
							'HorasTrabajadas'=> $horastotales,
							'HorasExtras'=> 0,
						);
					}else{
						//Si hay horas extras	
						$insert_data[] = array(
							'Fecha_Asistencia' => $fechaactual,
							'HoraLlegadaM'=> $asistencia_mentrada,
							'HoraSalidaM'=> $asistencia_msalida,
							'HoraLlegadaT'=> $asistencia_tentrada,
							'HoraSalidaT'=> $asistencia_tsalida,
							'ID_Personal'=> $asistencia_idpersonal,
							'HorasTrabajadas'=> $horastotales,
							'HorasExtras'=> $horaextras,
						);
					}
				}
			}
		}
		return  $this->db->insert_batch('asistencia',$insert_data);
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

	//Metodo para registrar tipos de gastos
	public function registroTipoGasto($lista_tipogasto){

		for($count = 0; $count<count($lista_tipogasto); $count++){

			$lista_tipo = $lista_tipogasto[$count];

			if(!empty($lista_tipo)){
				$insert_tipogastos[] = array(
					'NombreTipoGasto'=> $lista_tipo,
				);
			}
		}
		$this->db->insert_batch('tipogasto',$insert_tipogastos);
		$id_tipogasto = $this->db->insert_id();
		return $id_tipogasto;

	}

	//Registro de materiales comprados durante el trabajo
	public function registrarMaterialesDurante($data){
		
		//Registro  de materiales
		$materiales = $data["lista_material"];
		$cantidades = $data["lista_cantidad"];
		$valores = $data["lista_valores"];
		
		//Registro del tipo de gasto
		$id_tipogasto = $this->registroTipoGasto($materiales);

		//Obtencion de id trabajo
		$id_trabajodiario = $this->getIDTrabajoDiarioCS($data['codigo_servicio']);
		$idtrabajo = $id_trabajodiario[0]['ID_TrabajoDiario'];

		for($count = 0; $count<count($materiales); $count++){
			//Asistencia de mañana
			$materiales_limpio = $materiales[$count];
			$cantidad_limpio = $cantidades[$count];
			$valores_limpio = $valores[$count];

			if(!empty($materiales_limpio) && !empty($cantidad_limpio)
			 && !empty($valores_limpio)){
				$insert_gastos[] = array(
					'Valor' => $valores_limpio,
					'Cantidad'=> $cantidad_limpio,
					'ID_TipoGasto' => $id_tipogasto,
					'ID_TrabajoDiario' => $idtrabajo,
				);
			}
		}
		return  $this->db->insert_batch('gastos',$insert_gastos);
	}

	//Metodo para registrar gastos varios
	public function registrarGastosVarios($ajax_data){
		//Obtener id de trabajo diario
		$idtipotrabajo = $this->getIDTrabajoDiarioCS($ajax_data['codigo_servicio']);
		//var_dump('DATITOS ID: '. $idtipotrabajo[0]['ID_TipoTrabajo']);
		$idtrabajodiario = $idtipotrabajo[0]['ID_TrabajoDiario'];

		if($ajax_data['gasto_peaje']>0){
			$idtipogasto = $this->getTipoGasto('Peaje');
		}else if($ajax_data['gasto_estacionamiento']>0){
			$idtipogasto = $this->getTipoGasto('Estacionamiento');
		}

		$data = array(
			array(
			   'Valor' => $ajax_data['gasto_peaje'],
			   'ID_TipoGasto' => $idtipogasto[0]['ID_TipoGasto'],
			   'ID_TrabajoDiario' => $idtrabajodiario
			),
			array(
				'Valor' => $ajax_data['gasto_estacionamiento'],
				'ID_TipoGasto' => $idtipogasto[0]['ID_TipoGasto'],
				'ID_TrabajoDiario' => $idtrabajodiario
			 ),
		 );

		return $this->db->insert_batch('gastos',$data);
	}
}

?>