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
		$names = array('Bencina', 'Petroleo');
		$this->db->select('NombreTipoGasto, ID_TipoGasto');
		$this->db->where_in('NombreTipoGasto',$names);
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

	public function obtenerEstadoPlantilla($codigo){

		$idcodigoservicio = $this->getIDCodigoServicio($codigo);
		//var_dump('DATITOS ID: '. $idtipotrabajo[0]['ID_TipoTrabajo']);
		$miidservicio = $idcodigoservicio[0]['ID_Codigo'];
		$this->db->where('ID_Codigo',$miidservicio);
		$this->db->limit(1);
		$query = $this->db->get('planillaestado');

		return $query->result();
	}

	//Se obtiene el la id del trabajo diario segun el codigo de servicio 
	public function getIDCodigoServicio($codigoservicio){
		$query = $this->db->select("c.ID_Codigo") # También puedes poner * si quieres seleccionar todo
				->from("codigoservicio c")
				->where('c.CodigoServicio', $codigoservicio);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function obtenerTrabajosRealizados(){

		$query = $this->db
				->select("p.NombreProyecto AS NombreProyecto, c.CodigoServicio AS CodigoServicio, i.FechaAsignacion AS FechaTrabajo, t.PersonalCargo AS PersonalCargo, t.Detalle AS Detalle, t.ValorAsignado AS ValorAsignado") # También puedes poner * si quieres seleccionar todo
				->from("trabajodiario t")
				->join("codigoservicio c", "c.ID_Codigo = t.ID_Codigo")
				->join("proyecto p", "p.ID_Proyecto = t.ID_Proyecto")
				->join("ingreso i", "i.ID_TrabajoDiario = t.ID_TrabajoDiario")
				->get();
		
		return $query->result();
	}

	public function obtenerGastoTotal($codigo){

		$idtipotrabajo = $this->getIDTrabajoDiarioCS($codigo);
		//var_dump('DATITOS ID: '. $idtipotrabajo[0]['ID_TipoTrabajo']);
		$idtrabajodiario = $idtipotrabajo[0]['ID_TrabajoDiario'];

		$this->db->select_sum('Valor');
		$this->db->where('ID_TrabajoDiario',$idtrabajodiario);
		$this->db->limit(1);
		$query = $this->db->get('gastos');

		
		return $query->result();
	}

	//Metodo para obtener los viaticos registrados segun codigo de servicio
	public function ObtenerViaticos($codigo){

		$idtipotrabajo = $this->getIDTrabajoDiarioCS($codigo);
		//var_dump('DATITOS ID: '. $idtipotrabajo[0]['ID_TipoTrabajo']);
		$idtrabajodiario = $idtipotrabajo[0]['ID_TrabajoDiario'];

		//Array con las id de los gastos viaticos
		$gastosviaticos = array(1,2,3,4,5);
		$query = $this->db
		->select("g.ID_Gasto AS ID, g.Valor AS Valor,t.NombreTipoGasto AS Nombre") # También puedes poner * si quieres seleccionar todo
		->from("gastos g")
		->join("tipogasto t", "t.ID_TipoGasto = g.ID_TipoGasto")
		->where_in('g.ID_TipoGasto',$gastosviaticos)
		->where('g.ID_TrabajoDiario',$idtrabajodiario)
		->get();

		return $query->result();
	}

	//Metodo para obtener los viaticos registrados segun codigo de servicio
	public function ObtenerGastosVarios($codigo){

		$idtipotrabajo = $this->getIDTrabajoDiarioCS($codigo);
		//var_dump('DATITOS ID: '. $idtipotrabajo[0]['ID_TipoTrabajo']);
		$idtrabajodiario = $idtipotrabajo[0]['ID_TrabajoDiario'];

		//Array con las id de los gastos viaticos
		$gastosvarios = array('Peaje','Estacionamiento');
		$query = $this->db
		->select("g.ID_Gasto AS ID, g.Valor AS Valor,t.NombreTipoGasto AS Nombre") # También puedes poner * si quieres seleccionar todo
		->from("gastos g")
		->join("tipogasto t", "t.ID_TipoGasto = g.ID_TipoGasto")
		->where_in('t.NombreTipoGasto',$gastosvarios)
		->where('g.ID_TrabajoDiario',$idtrabajodiario)
		->get();

		return $query->result();
	}

	public function obtenerSumaAsignada($codigo){

		$idtipotrabajo = $this->getIDTrabajoDiarioCS($codigo);
		//var_dump('DATITOS ID: '. $idtipotrabajo[0]['ID_TipoTrabajo']);
		$idtrabajodiario = $idtipotrabajo[0]['ID_TrabajoDiario'];

		$this->db->select('ValorAsignado');
		$this->db->where('ID_TrabajoDiario',$idtrabajodiario);
		$this->db->limit(1);
		$query = $this->db->get('trabajodiario');
		
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

	//Metodo para registrar gastos de viaticos
	public function ingresarGastosViaticos($ajax_data){

		//Obtener id de trabajo diario
		$idtipotrabajo = $this->getIDTrabajoDiarioCS($ajax_data['codigo_servicio']);
		//var_dump('DATITOS ID: '. $idtipotrabajo[0]['ID_TipoTrabajo']);
		$idtrabajodiario = $idtipotrabajo[0]['ID_TrabajoDiario'];
		$idtipogasto = 0;
		$data = array(
			array(
			   'Valor' => $ajax_data['valmuerzo'],
			   'Cantidad' => 0,  
			   'ID_TipoGasto' => $this->getTipoGasto('Almuerzo')[0]['ID_TipoGasto'],
			   'ID_TrabajoDiario' => $idtrabajodiario
			),
			array(
				'Valor' => $ajax_data['vcena'],
				'Cantidad' => 0,
				'ID_TipoGasto' => $this->getTipoGasto('Cena')[0]['ID_TipoGasto'],
				'ID_TrabajoDiario' => $idtrabajodiario
			 ),
			 array(
				'Valor' => $ajax_data['vagua'],
				'Cantidad' => 0,
				'ID_TipoGasto' => $this->getTipoGasto('Agua')[0]['ID_TipoGasto'],
				'ID_TrabajoDiario' => $idtrabajodiario
			 ),
			 array(
				'Valor' => $ajax_data['valojamiento'],
				'Cantidad' => 0,
				'ID_TipoGasto' => $this->getTipoGasto('Alojamiento')[0]['ID_TipoGasto'],
				'ID_TrabajoDiario' => $idtrabajodiario
			 ),

			 array(
				'Valor' => $ajax_data['vdesayuno'],
				'Cantidad' => 0,
				'ID_TipoGasto' => $this->getTipoGasto('Desayuno')[0]['ID_TipoGasto'],
				'ID_TrabajoDiario' => $idtrabajodiario
			 )
		 );

		 //Actualizar estado de planilla
		$idcodigoservicio = $this->getIDCodigoServicio($ajax_data['codigo_servicio']);

		$this->db->set('GastosViaticos','1', FALSE);
		$this->db->where('ID_Codigo', $idcodigoservicio[0]['ID_Codigo']);
		$this->db->update('planillaestado');

		return $this->db->insert_batch('gastos',$data);
	}

	//Metodo para actualizar gastos de viaticos
	public function updateGastosViaticos($ajax_data){
		//Obtener id de trabajo diario
		$idtipotrabajo = $this->getIDTrabajoDiarioCS($ajax_data['codigo_servicio']);
		//var_dump('DATITOS ID: '. $idtipotrabajo[0]['ID_TipoTrabajo']);
		$idtrabajodiario = $idtipotrabajo[0]['ID_TrabajoDiario'];
		//Listado con gastos
		$gastosviaticos = $ajax_data["lista_gastos"];
		$gastosviaticosid = $ajax_data["lista_gastosid"];
		for($count = 0; $count<count($gastosviaticos); $count++){
			$lista_gastos = $gastosviaticos[$count];
			$lista_gastosid = $gastosviaticosid[$count];
			if(!empty($lista_gastos)){
				$insert_data[] = array(
					'ID_Gasto' => $lista_gastosid,
					'Valor' => $lista_gastos,
					'Cantidad' => 0
				);
			}
		}

		$this->db->where('ID_TrabajoDiario',$idtrabajodiario);

		return $this->db->update_batch('gastos', $insert_data, 'ID_Gasto');
	}

	//Metodo para actualizar gastos varios
	public function updateGastosVarios($ajax_data){
		//Obtener id de trabajo diario
		$idtipotrabajo = $this->getIDTrabajoDiarioCS($ajax_data['codigo_servicio']);
		$idtrabajodiario = $idtipotrabajo[0]['ID_TrabajoDiario'];
		//var_dump('DATITOS ID: '. $idtipotrabajo[0]['ID_TipoTrabajo'])
		$gastosvarios = $ajax_data["lista_gastosvarios"];
		$gastosvariosid = $ajax_data["lista_gastosvariosid"];
		for($count = 0; $count<count($gastosvarios); $count++){
			$lista_gastos = $gastosvarios[$count];
			$lista_gastosid = $gastosvariosid[$count];
			if(!empty($lista_gastos)){
				$insert_data[] = array(
					'ID_Gasto' => $lista_gastosid,
					'Valor' => $lista_gastos,
					'Cantidad' => 0
				);
			}
		}
		$this->db->where('ID_TrabajoDiario',$idtrabajodiario);

		return $this->db->update_batch('gastos', $insert_data, 'ID_Gasto');
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

		//Ingreso a la planilla estado
		$dataplanilla = array(
			'Asistencia' => 0,
			'MaterialesDurante' => 0,
			'MaterialesAntes' => 0,
			'MaterialesBodega' => 0,
			'Combustible' => 0,
			'GastosVarios' => 0,
			'SubirArchivos' => 0,
			'ID_Codigo' => $id_codigo,
		);
		$this->db->insert('planillaestado', $dataplanilla);

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

		//Registro de asignacion de trabajo  a un usuario
		$set_data = $this->session->all_userdata();


		$dataingreso = array(
			'FechaAsignacion' => $data['fecha_trabajo'],
			'ID_Usuario' => $set_data['ID_Usuario'],
			'ID_TrabajoDiario' => $id_trabajodiario,

		);

		$this->db->insert('ingreso', $dataingreso);

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

		//Actualizar estado de planilla
		$idcodigoservicio = $this->getIDCodigoServicio($data['codigo_servicio']);

		$this->db->set('Asistencia','1', FALSE);
		$this->db->where('ID_Codigo', $idcodigoservicio[0]['ID_Codigo']);
		$this->db->update('planillaestado');

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

	//Registro de materiales comprados antes el trabajo
	public function registrarGastoMaterialesAntes($data){
		
		//Registro  de materiales
		$materiales = $data["lista_material"];
		$cantidades = $data["lista_cantidad"];
		$valores = $data["lista_valores"];

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
					'Nombre' => $materiales_limpio,
					'Cantidad'=> $cantidad_limpio,
					'Valor' => $valores_limpio,
					'ID_TrabajoDiario' => $idtrabajo,
				);
			}
		}

		//Si es 0 es: Materiales durante el trabajo
		//SI es 1 es: Materiales antes el trabajo
		//Actualizar estado de planilla
		$idcodigoservicio = $this->getIDCodigoServicio($data['codigo_servicio']);
			$this->db->set('MaterialesAntes','1', FALSE);
			$this->db->where('ID_Codigo', $idcodigoservicio[0]['ID_Codigo']);
			$this->db->update('planillaestado');
		

		
		return  $this->db->insert_batch('materialesantes',$insert_gastos);
	}

	//Registro de materiales comprados durante el trabajo
	public function registrarGastoMaterialesDurante($data){
		
		//Registro  de materiales
		$materiales = $data["lista_material"];
		$cantidades = $data["lista_cantidad"];
		$valores = $data["lista_valores"];

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
					'Nombre' => $materiales_limpio,
					'Cantidad'=> $cantidad_limpio,
					'Valor' => $valores_limpio,
					'ID_TrabajoDiario' => $idtrabajo,
				);
			}
		}

		//Si es 0 es: Materiales durante el trabajo
		//SI es 1 es: Materiales antes el trabajo
		//Actualizar estado de planilla
		$idcodigoservicio = $this->getIDCodigoServicio($data['codigo_servicio']);
			$this->db->set('MaterialesDurante','1', FALSE);
			$this->db->where('ID_Codigo', $idcodigoservicio[0]['ID_Codigo']);
			$this->db->update('planillaestado');
		

		
		return  $this->db->insert_batch('materialesdurante',$insert_gastos);
	}

	//Metodo para registrar gastos varios
	public function registrarGastosVarios($ajax_data){
		//Obtener id de trabajo diario
		$idtipotrabajo = $this->getIDTrabajoDiarioCS($ajax_data['codigo_servicio']);
		//var_dump('DATITOS ID: '. $idtipotrabajo[0]['ID_TipoTrabajo']);
		$idtrabajodiario = $idtipotrabajo[0]['ID_TrabajoDiario'];

			$idtipogastopeaje = $this->getTipoGasto('Peaje');
	
			$idtipogastoestacionamiento = $this->getTipoGasto('Estacionamiento');
		

		$data = array(
			array(
			   'Valor' => $ajax_data['gasto_peaje'],
			   'Cantidad' => 0,
			   'ID_TipoGasto' => $idtipogastopeaje[0]['ID_TipoGasto'],
			   'ID_TrabajoDiario' => $idtrabajodiario
			),
			array(
				'Valor' => $ajax_data['gasto_estacionamiento'],
				'Cantidad' => 0,
				'ID_TipoGasto' => $idtipogastoestacionamiento[0]['ID_TipoGasto'],
				'ID_TrabajoDiario' => $idtrabajodiario
			 ),
		 );

		 //Actualizar estado de planilla
		$idcodigoservicio = $this->getIDCodigoServicio($ajax_data['codigo_servicio']);
		$this->db->set('GastosVarios','1', FALSE);
		$this->db->where('ID_Codigo', $idcodigoservicio[0]['ID_Codigo']);
		$this->db->update('planillaestado');

		return $this->db->insert_batch('gastos',$data);
	}

	//Metodo para registrar gastos combustible
	public function registrarGastosCombustible($ajax_data){
		//Obtener id de trabajo diario
		$idtipotrabajo = $this->getIDTrabajoDiarioCS($ajax_data['codigo_servicio']);
		//var_dump('DATITOS ID: '. $idtipotrabajo[0]['ID_TipoTrabajo']);
		$idtrabajodiario = $idtipotrabajo[0]['ID_TrabajoDiario'];

		$datagastocombustible = array(
			'Valor' => $ajax_data['gasto_combustible'],
			'Cantidad' => 0,
			'ID_TipoGasto' => $ajax_data['id_gasto'],
			'ID_TrabajoDiario' => $idtrabajodiario,
		);

		//Actualizar estado de planilla
		$idcodigoservicio = $this->getIDCodigoServicio($ajax_data['codigo_servicio']);
		$this->db->set('Combustible','1', FALSE);
		$this->db->where('ID_Codigo', $idcodigoservicio[0]['ID_Codigo']);
		$this->db->update('planillaestado');

		return $this->db->insert('gastos',$datagastocombustible);
	}

	//Metodo para registrar gastos combustible
	public function actualizarGastosCombustible($ajax_data){
		//Obtener id de trabajo diario
		$idtipotrabajo = $this->getIDTrabajoDiarioCS($ajax_data['codigo_servicio']);
		//var_dump('DATITOS ID: '. $idtipotrabajo[0]['ID_TipoTrabajo']);
		$idtrabajodiario = $idtipotrabajo[0]['ID_TrabajoDiario'];
		//$this->db->set('Valor',$ajax_data['gasto_combustible'], FALSE);
		//$this->db->where('ID_TrabajoDiario', $idtrabajodiario);

		$this->db->set("g.Valor",$ajax_data['gasto_combustible']); # También puedes poner * si quieres seleccionar todo
		$this->db->from("gastos g");
		$this->db->join("tipogasto t", "t.ID_TipoGasto = g.ID_TipoGasto");
		$this->db->where('g.ID_TipoGasto',$ajax_data['id_gasto']);

		return $this->db->update('gastos g');
	}

	//Validar codigo de servicio
	public function validarCodigoServicio($ajax_data){
		$query = $this->db
				->select("p.NombreProyecto AS NombreProyecto, c.CodigoServicio AS CodigoServicio,
				i.FechaAsignacion AS FechaTrabajo, t.PersonalCargo AS PersonalCargo,
				t.Detalle AS Detalle, t.ValorAsignado AS ValorAsignado") # También puedes poner * si quieres seleccionar todo
				->from("trabajodiario t")
				->join("codigoservicio c", "c.ID_Codigo = t.ID_Codigo")
				->join("proyecto p", "p.ID_Proyecto = t.ID_Proyecto")
				->join("ingreso i", "i.ID_TrabajoDiario = t.ID_TrabajoDiario")
				->where("c.CodigoServicio",$ajax_data)
				->limit(1)
				->get();
		
		return $query->result();
	}

	//Validar codigo de servicio
	public function ObtenerDetallePlanilla($ajax_data){
		$query = $this->db
				->select("tg.NombreTipoGasto AS NombreGastoViatico, p.NombreProyecto AS NombreProyecto, c.CodigoServicio AS CodigoServicio,
				i.FechaAsignacion AS FechaTrabajo, t.PersonalCargo AS PersonalCargo,
				t.Detalle AS Detalle, t.ValorAsignado AS ValorAsignado") # También puedes poner * si quieres seleccionar todo
				->from("trabajodiario t")
				->from("tipogasto tg")
				->join("codigoservicio c", "c.ID_Codigo = t.ID_Codigo")
				->join("proyecto p", "p.ID_Proyecto = t.ID_Proyecto")
				->join("ingreso i", "i.ID_TrabajoDiario = t.ID_TrabajoDiario")
				->join("materialesantes ma", "ma.ID_TrabajoDiario = t.ID_TrabajoDiario")
				->join("materialesantes md", "md.ID_TrabajoDiario = t.ID_TrabajoDiario")
				->join("gastos g", "g.ID_TrabajoDiario = t.ID_TrabajoDiario")
				->where("c.CodigoServicio",$ajax_data)
				->limit(1)
				->get();
		
		return $query->result();
	}

	public function updateAsistenciaPersonal($data){
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

		return $this->db->update_batch('asistencia', $insert_data, 'ID_Personal');
	}

	//Metodo para obtener los materiales comprados durante el trabajo
	public function ObtenerMaterialesDurante($codigo){

		$idtipotrabajo = $this->getIDTrabajoDiarioCS($codigo);
		//var_dump('DATITOS ID: '. $idtipotrabajo[0]['ID_TipoTrabajo']);
		$idtrabajodiario = $idtipotrabajo[0]['ID_TrabajoDiario'];

		$query = $this->db
		->select("md.ID_MaterialesDurante AS ID, md.Nombre AS Nombre, md.Cantidad AS Cantidad, md.Valor AS Valor") # También puedes poner * si quieres seleccionar todo
		->from("materialesdurante md")
		->join("trabajodiario t", "t.ID_TrabajoDiario = md.ID_TrabajoDiario")
		->where('md.ID_TrabajoDiario',$idtrabajodiario)
		->get();

		return $query->result();
	}

	//Metodo para obtener los materiales comprados antes el trabajo
	public function ObtenerMaterialesAntes($codigo){

		$idtipotrabajo = $this->getIDTrabajoDiarioCS($codigo);
		//var_dump('DATITOS ID: '. $idtipotrabajo[0]['ID_TipoTrabajo']);
		$idtrabajodiario = $idtipotrabajo[0]['ID_TrabajoDiario'];

		$query = $this->db
		->select("ma.ID_MaterialesAntes AS ID, ma.Nombre AS Nombre, ma.Cantidad AS Cantidad, ma.Valor AS Valor") # También puedes poner * si quieres seleccionar todo
		->from("materialesantes ma")
		->join("trabajodiario t", "t.ID_TrabajoDiario = ma.ID_TrabajoDiario")
		->where('ma.ID_TrabajoDiario',$idtrabajodiario)
		->get();

		return $query->result();
	}

	//Actualizacion de  materiales comprados durante
	public function updateGastoMaterialesDurante($data){
		
		//Registro  de materiales
		$materiales = $data["lista_material"];
		$cantidades = $data["lista_cantidad"];
		$valores = $data["lista_valores"];
		$id = $data["lista_id"];
		//Obtencion de id trabajo
		$id_trabajodiario = $this->getIDTrabajoDiarioCS($data['codigo_servicio']);
		$idtrabajo = $id_trabajodiario[0]['ID_TrabajoDiario'];

		for($count = 0; $count<count($materiales); $count++){
			//Asistencia de mañana
			$materiales_limpio = $materiales[$count];
			$cantidad_limpio = $cantidades[$count];
			$valores_limpio = $valores[$count];
			$lista_id = $id[$count];

			if(!empty($materiales_limpio) && !empty($cantidad_limpio)
			 && !empty($valores_limpio)){
				$insert_data[] = array(
					'ID_MaterialesDurante' => $lista_id,
					'Nombre' => $materiales_limpio,
					'Cantidad'=> $cantidad_limpio,
					'Valor' => $valores_limpio,
				);
			}
		}
		$this->db->where('ID_TrabajoDiario',$idtrabajo);
		return $this->db->update_batch('materialesdurante', $insert_data, 'ID_MaterialesDurante');
	}

	//Actualizacion de  materiales comprados antes
	public function updateGastoMaterialesAntes($data){
		
		//Registro  de materiales
		$materiales = $data["lista_material"];
		$cantidades = $data["lista_cantidad"];
		$valores = $data["lista_valores"];
		$id = $data["lista_id"];

		//Obtencion de id trabajo
		$id_trabajodiario = $this->getIDTrabajoDiarioCS($data['codigo_servicio']);
		$idtrabajo = $id_trabajodiario[0]['ID_TrabajoDiario'];

		for($count = 0; $count<count($materiales); $count++){
			//Asistencia de mañana
			$materiales_limpio = $materiales[$count];
			$cantidad_limpio = $cantidades[$count];
			$valores_limpio = $valores[$count];
			$lista_id = $id[$count];

			if(!empty($materiales_limpio) && !empty($cantidad_limpio)
			 && !empty($valores_limpio)){
				$insert_data[] = array(
					'ID_MaterialesAntes' => $lista_id,
					'Nombre' => $materiales_limpio,
					'Cantidad'=> $cantidad_limpio,
					'Valor' => $valores_limpio,
				);
			}
		}
		$this->db->where('ID_TrabajoDiario',$idtrabajo);
		return $this->db->update_batch('materialesantes', $insert_data, 'ID_MaterialesAntes');
	}

	//Metodo para obtener los materiales comprados antes el trabajo
	public function ObtenerArchivosSubidos($codigo){

		$idtipotrabajo = $this->getIDTrabajoDiarioCS($codigo);
		//var_dump('DATITOS ID: '. $idtipotrabajo[0]['ID_TipoTrabajo']);
		$idtrabajodiario = $idtipotrabajo[0]['ID_TrabajoDiario'];

		$query = $this->db
		->select("dt.ID_DetalleTrabajo AS ID, dt.Imagen AS Imagen") # También puedes poner * si quieres seleccionar todo
		->from("detalletrabajodiario dt")
		->join("trabajodiario t", "t.ID_TrabajoDiario = dt.ID_TrabajoDiario")
		->where('dt.ID_TrabajoDiario',$idtrabajodiario)
		->get();

		return $query->result();
	}
}

?>