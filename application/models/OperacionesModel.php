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

	public function ObtenerProyectos(){
		$this->db->select('id_proyecto,nombreproyecto');
		$query = $this->db->get('proyecto');
    	return $query->result();
	}

	public function ObtenerPersonal(){
		$this->db->select('id_personal,rut,nombrecompleto');
		$query = $this->db->get('personal');
		
    	return $query->result();
	}

	public function getPersonal($rut){
		$this->db->like('rut', $rut, 'BOTH');
		return $this->db->get('personal')->result();
	}

	function fetch_data($query){
		$this->db->like('rut', $query);
		$query = $this->db->get('personal');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				$output[] = array(
					'name'  => $row["nombrecompleto"],
					'rut'  => $row["rut"]
				);
			}
			echo json_encode($output);
		}
	}

	public function ObtenerTiposCombustibles(){
		$names = array('Bencina', 'Petroleo');
		$this->db->select('nombretipogasto, id_tipogasto');
		$this->db->where_in('nombretipogasto',$names);
		$query = $this->db->get('tipogasto');
		return $query->result();
	}

	public function ObtenerListaPersonal($codigo){
		$query = $this->db
				->select("p.id_personal as ID, p.nombrecompleto AS nombre,p.rut AS rut") # También puedes poner * si quieres seleccionar todo
				->from("personal p")
				->join("personal_trabajo pt", "pt.id_personal = p.id_personal")
				->join("trabajodiario t", "pt.id_trabajodiario = t.id_trabajodiario")
				->join("codigoservicio c", "c.id_codigo = t.id_codigo")
				->where('c.codigoservicio', $codigo)
				->get();
    	return $query->result();
	}
	
	public function siExistecodigoservicio($codigo_servicio){
		$this->db->select('codigoservicio')
		->from('codigoservicio')
		->where('codigoservicio',$codigo_servicio)
		->limit(1);
		$query = $this->db->get();
		return $query->result();
	}

	public function getIDTrabajoDiario(){
		//SELECT tr.id_trabajodiario FROM TrabajoDiario tr, TipoTrabajo tb 
		//WHERE tr.id_tipotrabajo = tb.id_tipotrabajo AND tb.codigoservicio = 'MN1' 
		$query = $this->db
				->select("tr.id_trabajodiario") # También puedes poner * si quieres seleccionar todo
				->from("trabajodiario tr")
				->join("TipoTrabajo tb", "tr.id_tipotrabajo = tb.id_tipotrabajo")
				->where('tb.codigoservicio', $codigoservicio)
				->get();
		return $query->result_array();

	}

	public function getTipoGasto($nombre){
		$this->db->select('id_tipogasto')
				->from('tipogasto')
				->where('nombreTipoGasto',$nombre)
				->limit(1);
		 $query = $this->db->get();
		 return $query->result_array();
		
	}

	//Se obtiene el la id del trabajo diario segun el codigo de servicio 
	public function getIDTrabajoDiarioCS($codigoservicio){
		$query = $this->db->select("tr.id_trabajodiario") # También puedes poner * si quieres seleccionar todo
				->from("trabajodiario tr")
				->join("codigoservicio c", "c.id_codigo = tr.id_codigo")
				->where('c.codigoservicio', $codigoservicio);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function obtenerTotalViaticos($codigo){

		$idtipotrabajo = $this->getIDTrabajoDiarioCS($codigo);
		//var_dump('DATITOS ID: '. $idtipotrabajo[0]['id_tipotrabajo']);
		$idtrabajodiario = $idtipotrabajo[0]['id_trabajodiario'];

		//Array con las id de los gastos viaticos
		$gastosviaticos = array('Almuerzo','Cena','Agua','Alojamiento','Desayuno');

		$this->db->select_sum('g.valor');
		$this->db->from("gastos g");
		$this->db->join("tipogasto gc", "gc.id_tipogasto = g.id_tipogasto");
		$this->db->where('g.id_trabajodiario',$idtrabajodiario);
		$this->db->where_in('gc.nombretipogasto',$gastosviaticos);
		$query = $this->db->get();
		
		return $query->result();
	}

	public function obtenerEstadoPlantilla($codigo){
		if($codigo){
			$idcodigoservicio = $this->getIDcodigoservicio($codigo);
			//var_dump('DATITOS ID: '. $idtipotrabajo[0]['id_tipotrabajo']);
			$miidservicio = $idcodigoservicio[0]['id_codigo'];
			$this->db->where('id_codigo',$miidservicio);
			$this->db->limit(1);
			$query = $this->db->get('planillaestado');

			return $query->result();
		}
	}

	//Se obtiene el la id del trabajo diario segun el codigo de servicio 
	public function getIDcodigoservicio($codigoservicio){
		$query = $this->db->select("c.id_codigo") # También puedes poner * si quieres seleccionar todo
				->from("codigoservicio c")
				->where('c.codigoservicio', $codigoservicio);
		$query = $this->db->get();
		return $query->result_array();
	}

	/*Mostrar documentos y descargarlo  */

	public function downloads($name){
        
		$data = file_get_contents($this->DocumentosSubidos.$name);
		force_download($name,$data);
	 
 	}

	public function Descargar2(){
		$id=$this->uri->segment(3);
		if(empty($id)){
			redirect(base_url());
		}
		$data=$this->mfiles->getRows($id);
		$filename=$data['file_name'];
		$fileContents=file_get_contents(base_url('DocumentosSubidos/',$data['file_name']));
		force_download($filename,$fileContents);
		
	}
	/*Fin de Mostrar documentos y descargarlo  */

	//Planillas realizadas por trabajador
	public function ObtenerPlanillaPorTrabajador($idusuario){
		$query = $this->db
				->select("p.nombreProyecto AS nombreproyecto, c.codigoservicio AS codigoservicio, i.fechaasignacion AS fechatrabajo, t.personalCargo AS personalcargo, t.detalle AS detalle, t.valorasignado AS valorasignado") # También puedes poner * si quieres seleccionar todo
				->from("trabajodiario t")
				->join("codigoservicio c", "c.id_codigo = t.id_codigo")
				->join("proyecto p", "p.ID_Proyecto = t.ID_Proyecto")
				->join("ingreso i", "i.id_trabajodiario = t.id_trabajodiario")
				->where("i.ID_Usuario", $idusuario)
				->get();
		
		return $query->result();
	}

	public function obtenerGastoTotal($codigo){

		$idtipotrabajo = $this->getIDTrabajoDiarioCS($codigo);
		//var_dump('DATITOS ID: '. $idtipotrabajo[0]['id_tipotrabajo']);
		$idtrabajodiario = $idtipotrabajo[0]['id_trabajodiario'];

		$this->db->select_sum('valor');
		$this->db->where('id_trabajodiario',$idtrabajodiario);
		$this->db->limit(1);
		$query = $this->db->get('gastos');

		
		return $query->result();
	}

	//Metodo para obtener los viaticos registrados segun codigo de servicio
	public function ObtenerViaticos($codigo){

		$idtipotrabajo = $this->getIDTrabajoDiarioCS($codigo);
		//var_dump('DATITOS ID: '. $idtipotrabajo[0]['id_tipotrabajo']);
		$idtrabajodiario = $idtipotrabajo[0]['id_trabajodiario'];

		//Array con las id de los gastos viaticos
		$gastosviaticos = array('Almuerzo','Cena','Agua','Alojamiento','Desayuno');
		$query = $this->db
		->select("g.ID_Gasto AS ID, g.valor AS valor,t.nombreTipoGasto AS nombre") # También puedes poner * si quieres seleccionar todo
		->from("gastos g")
		->join("tipogasto t", "t.id_tipogasto = g.id_tipogasto")
		->where_in('t.nombretipogasto',$gastosviaticos)
		->where('g.id_trabajodiario',$idtrabajodiario)
		->get();

		return $query->result();
	}

	//Metodo para obtener los viaticos registrados segun codigo de servicio
	public function ObtenerGastosVarios($codigo){

		$idtipotrabajo = $this->getIDTrabajoDiarioCS($codigo);
		//var_dump('DATITOS ID: '. $idtipotrabajo[0]['id_tipotrabajo']);
		$idtrabajodiario = $idtipotrabajo[0]['id_trabajodiario'];

		//Array con las id de los gastos viaticos
		$gastosvarios = array('Peaje','Estacionamiento');
		$query = $this->db
		->select("g.id_gasto as id, g.valor as valor,t.nombretipoGasto AS nombre") # También puedes poner * si quieres seleccionar todo
		->from("gastos g")
		->join("tipogasto t", "t.id_tipogasto = g.id_tipogasto")
		->where_in('t.nombreTipoGasto',$gastosvarios)
		->where('g.id_trabajodiario',$idtrabajodiario)
		->get();

		return $query->result();
	}

	public function obtenerSumaAsignada($codigo){

		$idtipotrabajo = $this->getIDTrabajoDiarioCS($codigo);
		//var_dump('DATITOS ID: '. $idtipotrabajo[0]['id_tipotrabajo']);
		$idtrabajodiario = $idtipotrabajo[0]['id_trabajodiario'];

		$this->db->select('valorAsignado');
		$this->db->where('id_trabajodiario',$idtrabajodiario);
		$this->db->limit(1);
		$query = $this->db->get('trabajodiario');
		
		return $query->result();
	}

	//Metodo para obtener los tipos de viaticos ingresados y asi poder mostrar el check en la vista
	public function ObtenerTiposViaticos($codigo){

		$idtipotrabajo = $this->getIDTrabajoDiarioCS($codigo);
		//var_dump('DATITOS ID: '. $idtipotrabajo[0]['id_tipotrabajo']);
		$idtrabajodiario = $idtipotrabajo[0]['id_trabajodiario'];

		//Array con las id de los gastos viaticos
		$gastosviaticos = array('Almuerzo','Agua','Cena','Alojamiento','Desayuno');
		$query = $this->db
		->select("g.valor AS valor,t.nombreTipoGasto AS nombre") # También puedes poner * si quieres seleccionar todo
		->from("gastos g")
		->join("tipogasto t", "t.id_tipogasto = g.id_tipogasto")
		->where_in('t.nombretipogasto',$gastosviaticos)
		->where('g.id_trabajodiario',$idtrabajodiario)
		->get();
		return $query->result();
	}

	//Metodo para registrar gastos de viaticos
	public function ingresarGastosViaticos($ajax_data){

		//Obtener id de trabajo diario
		$idtipotrabajo = $this->getIDTrabajoDiarioCS($ajax_data['codigo_servicio']);
		//var_dump('DATITOS ID: '. $idtipotrabajo[0]['id_tipotrabajo']);
		$idtrabajodiario = $idtipotrabajo[0]['id_trabajodiario'];
		$idtipogasto = 0;
		$data = array(
			array(
			   'valor' => $ajax_data['valmuerzo'],
			   'cantidad' => 0,  
			   'id_tipogasto' => $this->getTipoGasto('Almuerzo')[0]['id_tipogasto'],
			   'id_trabajodiario' => $idtrabajodiario
			),
			array(
				'valor' => $ajax_data['vcena'],
				'cantidad' => 0,
				'id_tipogasto' => $this->getTipoGasto('Cena')[0]['id_tipogasto'],
				'id_trabajodiario' => $idtrabajodiario
			 ),
			 array(
				'valor' => $ajax_data['vagua'],
				'cantidad' => 0,
				'id_tipogasto' => $this->getTipoGasto('Agua')[0]['id_tipogasto'],
				'id_trabajodiario' => $idtrabajodiario
			 ),
			 array(
				'valor' => $ajax_data['valojamiento'],
				'cantidad' => 0,
				'id_tipogasto' => $this->getTipoGasto('Alojamiento')[0]['id_tipogasto'],
				'id_trabajodiario' => $idtrabajodiario
			 ),

			 array(
				'valor' => $ajax_data['vdesayuno'],
				'cantidad' => 0,
				'id_tipogasto' => $this->getTipoGasto('Desayuno')[0]['id_tipogasto'],
				'id_trabajodiario' => $idtrabajodiario
			 )
		 );

		 //Actualizar estado de planilla
		$idcodigoservicio = $this->getIDcodigoservicio($ajax_data['codigo_servicio']);

		$this->db->set('GastosViaticos','1', FALSE);
		$this->db->where('id_codigo', $idcodigoservicio[0]['id_codigo']);
		$this->db->update('planillaestado');

		return $this->db->insert_batch('gastos',$data);
	}

	//Metodo para actualizar gastos de viaticos
	public function updateGastosViaticos($ajax_data){
		//Obtener id de trabajo diario
		$idtipotrabajo = $this->getIDTrabajoDiarioCS($ajax_data['codigo_servicio']);
		//var_dump('DATITOS ID: '. $idtipotrabajo[0]['id_tipotrabajo']);
		$idtrabajodiario = $idtipotrabajo[0]['id_trabajodiario'];
		//Listado con gastos
		$gastosviaticos = $ajax_data["lista_gastos"];
		$gastosviaticosid = $ajax_data["lista_gastosid"];
		for($count = 0; $count<count($gastosviaticos); $count++){
			$lista_gastos = $gastosviaticos[$count];
			$lista_gastosid = $gastosviaticosid[$count];
			if(!empty($lista_gastos)){
				$insert_data[] = array(
					'ID_Gasto' => $lista_gastosid,
					'valor' => $lista_gastos,
					'cantidad' => 0
				);
			}
		}

		$this->db->where('id_trabajodiario',$idtrabajodiario);

		return $this->db->update_batch('gastos', $insert_data, 'ID_Gasto');
	}

	//Metodo para actualizar gastos varios
	public function updateGastosVarios($ajax_data){
		//Obtener id de trabajo diario
		$idtipotrabajo = $this->getIDTrabajoDiarioCS($ajax_data['codigo_servicio']);
		$idtrabajodiario = $idtipotrabajo[0]['id_trabajodiario'];
		//var_dump('DATITOS ID: '. $idtipotrabajo[0]['id_tipotrabajo'])
		$gastosvarios = $ajax_data["lista_gastosvarios"];
		$gastosvariosid = $ajax_data["lista_gastosvariosid"];
		for($count = 0; $count<count($gastosvarios); $count++){
			$lista_gastos = $gastosvarios[$count];
			$lista_gastosid = $gastosvariosid[$count];
			if(!empty($lista_gastos)){
				$insert_data[] = array(
					'ID_Gasto' => $lista_gastosid,
					'valor' => $lista_gastos,
					'cantidad' => 0
				);
			}
		}
		$this->db->where('id_trabajodiario',$idtrabajodiario);

		return $this->db->update_batch('gastos', $insert_data, 'ID_Gasto');
	}

	public function obtenerIDTipoTrabajo(string $abreviacion){
		$this->db->select('id_tipotrabajo')
		->from('tipotrabajo')
		->like('Abreviacion',$abreviacion, 'before')
		->limit(1);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function obtenerIDPersonal(string $rut){
		$this->db->select('id_personal')
		->from('personal')
		->where('rut',$rut);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function registrarTrabajoDiario($data){
		//Cadena de codigo sin el numero
		
		$cadena_codigo = preg_replace('/[0-9]+/', '', $data['codigo_servicio']);
		$idtipotrabajo = $this->obtenerIDTipoTrabajo($cadena_codigo);
		//var_dump('DATITOS ID: '. $idtipotrabajo[0]['id_tipotrabajo']);
		$datacodigo = array(
			'codigoservicio' => $data['codigo_servicio'],
			'id_tipotrabajo' => $idtipotrabajo[0]['id_tipotrabajo'],
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
			'id_codigo' => $id_codigo,
		);
		$this->db->insert('planillaestado', $dataplanilla);

		$datatrabajodiario = array(
			'PersonalCargo' => $data['persona_cargo'],
			'detalle' => $data['detalle_trabajo'],
			'valorAsignado' => $data['suma_asignada'],
			'ID_Proyecto' => $data['id_proyecto'],
			'id_codigo' => $id_codigo,
		);

		//Registro de trabajo diario
		$this->db->insert('trabajodiario', $datatrabajodiario);
		$id_trabajodiario = $this->db->insert_id();

		//Registro de asignacion de trabajo  a un usuario
		$set_data = $this->session->all_userdata();


		$dataingreso = array(
			'FechaAsignacion' => $data['fecha_trabajo'],
			'ID_Usuario' => $set_data['ID_Usuario'],
			'id_trabajodiario' => $id_trabajodiario,

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
				$idpersonal = $this->obtenerIDPersonal($rut);

				//$query .= 'INSERT INTO personal (rut,nombrecompleto,id_trabajodiario) VALUES ("'.$rut.'", "'.$nombre.'", "'.$id_trabajodiario.'");';
				$insert_data[] = array(
					'id_personal' => $idpersonal[0]['id_personal'],
					'id_trabajodiario'=> $id_trabajodiario,
					'fecha'=> $data['fecha_trabajo'],
				  );
			}
			
		}
		

		return  $this->db->insert_batch('personal_trabajo',$insert_data);
	}

	public function siExistePersonal($rut){
		$this->db->where('rut',$key);
		$query = $this->db->get('personal');
		if ($query->num_rows() > 0){
			return true;
		}
		else{
			return false;
		}
	}

	public function obtenerFechaTrabajoDiario($codigoservicio){
		
		$set_data = $this->session->all_userdata();
		
		$this->db->select('fechaasignacion')
		->from('ingreso i')
		->join('trabajodiario t', 'i.id_trabajodiario = t.id_trabajodiario')
		->join('codigoservicio c', 't.id_codigo = c.id_codigo')
		->where('i.id_usuario',$set_data['ID_Usuario'])
		->where('c.codigoservicio',$codigoservicio);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function registrarAsistenciaPersonal($data){
		//Registro  de asistencia
		$asistencia_manana_entrada = $data["lista_entradam"];
		$asistencia_manana_salida = $data["lista_salidam"];
		$asistencia_tarde_entrada = $data["lista_entradat"];
		$asistencia_tarde_salida = $data["lista_salidat"];
		$detallecambiohora = $data["lista_detalle"];
		//rut de personal
		$asistencia_rut = $data["lista_id"];

		$fecha_asistencia = $this->obtenerFechaTrabajoDiario($data["codigo_servicio"]);
		$fecha_asistencia = $fecha_asistencia[0]['fechaasignacion'];

		for($count = 0; $count<count($asistencia_rut); $count++){
			//Asistencia de mañana
			$asistencia_mentrada = $asistencia_manana_entrada[$count];
			$asistencia_msalida = $asistencia_manana_salida[$count];
			//Asistencia de tarde
			$asistencia_tentrada = $asistencia_tarde_entrada[$count];
			$asistencia_tsalida = $asistencia_tarde_salida[$count];

			$detalle_cambiohora = $detallecambiohora[$count];

			//ID Personal
			$asistencia_idpersonal = $asistencia_rut[$count];
			if(!empty($asistencia_mentrada) && !empty($asistencia_msalida)
			 && !empty($asistencia_tentrada) && !empty($asistencia_tsalida)){
				$horaInicio = new DateTime($asistencia_mentrada);
				$horaTermino = new DateTime($asistencia_tsalida);
				$interval = $horaInicio->diff($horaTermino);
				$asd = $interval->format('%H:%i');

				$horastotales = $interval->h;
				if($horastotales<=9){
					//echo"NO HAY HORAS EXTRAS: ". $horastotales;
					$insert_data [] = array(
						'fecha_asistencia' => $fecha_asistencia,
						'horallegadam' => $asistencia_mentrada,
						'horasalidam' => $asistencia_msalida,
						'horallegadat' => $asistencia_tentrada,
						'horasalidat' => $asistencia_tsalida,
						'id_personal' => intval($asistencia_idpersonal),
						'horastrabajadas' => $horastotales,
						'horasextras' => 0,
						'estado' => 1,
						'detalle' => $detalle_cambiohora,
					);
					
				}else{
					$mihora = new DateTime($asd);
					//Resto de hora colacion mas horas totales
					$mihora->modify('-10 hours');
					$horaextras = $mihora->format('H:i');

					//Verificar si siguen siendo 9 horas de trabajo
					$mihora = new DateTime($horaextras);
					$minutostotales = $mihora->format('i');
					//echo"HORAS EXTRAS: ".$horaextras."\n";
					//echo"MINUTOS: ".$minutostotales."\n";
					//echo"HORAS TOTALES: ".$horastotales."\n";
					//Si no hay horas extras
					if (($horaextras == '00:00') && (intval($minutostotales <30))){
						//No hay horas extras
						//echo"HORAS EXTRAS 1: 0"."\n";
						$insert_data [] = array(
							'fecha_asistencia' => $fecha_asistencia,
							'horallegadam' => $asistencia_mentrada,
							'horasalidam' => $asistencia_msalida,
							'horallegadat' => $asistencia_tentrada,
							'horasalidat' => $asistencia_tsalida,
							'id_personal' => intval($asistencia_idpersonal),
							'horastrabajadas' => 9,
							'horasextras' => 0,
							'estado' => 1,
							'detalle' => $detalle_cambiohora,
						);
					}else{
						//--------------------------------------------
						date_default_timezone_set("America/Santiago");
						$fechaactual = date("Y-m-d");
						//Si son 30 minutos se le suma 0.5 a la hora extra
						$horaextraminutos = 0;
						if((intval($minutostotales) > 0) && (intval($minutostotales) <= 59)){
							$mihora = new DateTime($horaextras);
							$horatotal = $mihora->format('H');
							$horaextraminutos = (float)0.5 + (float)$horatotal;
							//echo ("4) HORAS EXTRAS A LOS 30 MINUTOS: ".$horaextraminutos."\n");
			
							//Horas totales trabajadas
							$mihoratotal = new DateTime($horaextras);
							$mihoratotal->modify('+9 hours');
							$horastotales = $mihoratotal->format('H');
							//echo"HORAS EXTRAS 2: ".$horaextraminutos."\n";
							$insert_data [] = array(
								'fecha_asistencia' => $fecha_asistencia,
								'horallegadam' => $asistencia_mentrada,
								'horasalidam' => $asistencia_msalida,
								'horallegadat' => $asistencia_tentrada,
								'horasalidat' => $asistencia_tsalida,
								'id_personal' => intval($asistencia_idpersonal),
								'horastrabajadas' => $horastotales,
								'horasextras' => $horaextraminutos,
								'estado' => 1,
								'detalle' => $detalle_cambiohora,
							);
						}else{
							//Sin son mas de 30 minutos se le suma la hora extra
							$mihora = new DateTime($horaextras);
							$mihoraextra = $mihora->format('H');
							//echo ("5) HORAS EXTRAS PERROTE: ".$mihoraextra."\n");
			
							//Horas totales trabajadas
							$mihoratotal = new DateTime($horaextras);
							$mihoratotal->modify('+9 hours');
							$horastotales = $mihoratotal->format('H');
			
							//echo"HORAS EXTRAS 3: ".$mihoraextra."\n";
							$insert_data [] = array(
								'fecha_asistencia' => $fecha_asistencia,
								'horallegadam' => $asistencia_mentrada,
								'horasalidam' => $asistencia_msalida,
								'horallegadat' => $asistencia_tentrada,
								'horasalidat' => $asistencia_tsalida,
								'id_personal' => intval($asistencia_idpersonal),
								'horastrabajadas' => $horastotales,
								'horasextras' => $mihoraextra,
								'estado' => 1,
								'detalle' => $detalle_cambiohora,
							);
						}
						//--------------------------------------------
					}
				}
			}
		}

		//Actualizar estado de planilla
		$idcodigoservicio = $this->getIDcodigoservicio($data['codigo_servicio']);

		$this->db->set('asistencia','1', FALSE);
		$this->db->where('id_codigo', $idcodigoservicio[0]['id_codigo']);
		$this->db->update('planillaestado');

		return  $this->db->insert_batch('asistencia_personal',$insert_data);
	}

	public function updateAsistenciaPersonal($data){
		//Registro  de asistencia
		$asistencia_manana_entrada = $data["lista_entradam"];
		$asistencia_manana_salida = $data["lista_salidam"];
		$asistencia_tarde_entrada = $data["lista_entradat"];
		$asistencia_tarde_salida = $data["lista_salidat"];
		//rut de personal
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

				//Verificar si siguen siendo 9 horas de trabajo
				$mihora = new DateTime($horaextras);
				$minutostotales = $mihora->format('i');
				//Si no hay horas extras
				if (($horaextras == '00:00') && (intval($minutostotales <30))){
					//No hay horas extras
					$fechaactual = date("d/m/y");
					$insert_data [] = array(
						'fecha_asistencia' => $fechaactual,
						'horallegadam' => $asistencia_mentrada,
						'horasalidam' => $asistencia_msalida,
						'horallegadat' => $asistencia_tentrada,
						'horasalidat' => $asistencia_tsalida,
						'id_personal' => intval($asistencia_idpersonal),
						'horastrabajadas' => 9,
						'horasextras' => 0,
						'estado' => 1,
					);
				}else{
					//--------------------------------------------
					$fechaactual = date("d/m/y");
					//Si son 30 minutos se le suma 0.5 a la hora extra
					$horaextraminutos = 0;
					if((intval($minutostotales) > 0) && (intval($minutostotales) <= 59)){
						$mihora = new DateTime($horaextras);
						$horatotal = $mihora->format('H');
						$horaextraminutos = (float)0.5 + (float)$horatotal;
						//echo ("4) HORAS EXTRAS A LOS 30 MINUTOS: ".$horaextraminutos."\n");
		
						//Horas totales trabajadas
						$mihoratotal = new DateTime($horaextras);
						$mihoratotal->modify('+9 hours');
						$horastotales = $mihoratotal->format('H');
		
						$insert_data [] = array(
							'fecha_asistencia' => $fechaactual,
							'horallegadam' => $asistencia_mentrada,
							'horasalidam' => $asistencia_msalida,
							'horallegadat' => $asistencia_tentrada,
							'horasalidat' => $asistencia_tsalida,
							'id_personal' => intval($asistencia_idpersonal),
							'horastrabajadas' => $horastotales,
							'horasextras' => $horaextraminutos,
							'estado' => 1,
						);
					}else{
						//Sin son mas de 30 minutos se le suma la hora extra
						$mihora = new DateTime($horaextras);
						$mihoraextra = $mihora->format('H');
						//echo ("5) HORAS EXTRAS PERROTE: ".$mihoraextra."\n");
		
						//Horas totales trabajadas
						$mihoratotal = new DateTime($horaextras);
						$mihoratotal->modify('+9 hours');
						$horastotales = $mihoratotal->format('H');
		
						$insert_data [] = array(
							'fecha_asistencia' => $fechaactual,
							'horallegadam' => $asistencia_mentrada,
							'horasalidam' => $asistencia_msalida,
							'horallegadat' => $asistencia_tentrada,
							'horasalidat' => $asistencia_tsalida,
							'id_personal' => intval($asistencia_idpersonal),
							'horastrabajadas' => $horastotales,
							'horasextras' => $mihoraextra,
							'estado' => 1,
						);
					}
					//--------------------------------------------
				}
			}
		}
		
		return $this->db->update_batch('asistencia_personal', $insert_data, 'id_personal');
	}

	public function consultarcodigoservicio(string $codigo_servicio){
		$cadena_codigo = preg_replace('/[0-9]+/', '', $codigo_servicio);
		$query = "SELECT max(c.codigoservicio) AS Codigo FROM codigoservicio c,tipotrabajo tb
		WHERE c.id_tipotrabajo = tb.id_tipotrabajo AND tb.abreviacion LIKE '".$cadena_codigo."'";
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
					'nombreTipoGasto'=> $lista_tipo,
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
		$idtrabajo = $id_trabajodiario[0]['id_trabajodiario'];

		for($count = 0; $count<count($materiales); $count++){
			//Asistencia de mañana
			$materiales_limpio = $materiales[$count];
			$cantidad_limpio = $cantidades[$count];
			$valores_limpio = $valores[$count];

			if(!empty($materiales_limpio) && !empty($cantidad_limpio)
			 && !empty($valores_limpio)){
				$insert_gastos[] = array(
					'nombre' => $materiales_limpio,
					'cantidad'=> $cantidad_limpio,
					'valor' => $valores_limpio,
					'id_trabajodiario' => $idtrabajo,
				);
			}
		}

		//Si es 0 es: Materiales durante el trabajo
		//SI es 1 es: Materiales antes el trabajo
		//Actualizar estado de planilla
		$idcodigoservicio = $this->getIDcodigoservicio($data['codigo_servicio']);
			$this->db->set('MaterialesAntes','1', FALSE);
			$this->db->where('id_codigo', $idcodigoservicio[0]['id_codigo']);
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
		$idtrabajo = $id_trabajodiario[0]['id_trabajodiario'];

		for($count = 0; $count<count($materiales); $count++){
			//Asistencia de mañana
			$materiales_limpio = $materiales[$count];
			$cantidad_limpio = $cantidades[$count];
			$valores_limpio = $valores[$count];

			if(!empty($materiales_limpio) && !empty($cantidad_limpio)
			 && !empty($valores_limpio)){
				$insert_gastos[] = array(
					'nombre' => $materiales_limpio,
					'cantidad'=> $cantidad_limpio,
					'valor' => $valores_limpio,
					'id_trabajodiario' => $idtrabajo,
				);
			}
		}

		//Si es 0 es: Materiales durante el trabajo
		//SI es 1 es: Materiales antes el trabajo
		//Actualizar estado de planilla
		$idcodigoservicio = $this->getIDcodigoservicio($data['codigo_servicio']);
			$this->db->set('MaterialesDurante','1', FALSE);
			$this->db->where('id_codigo', $idcodigoservicio[0]['id_codigo']);
			$this->db->update('planillaestado');
		

		
		return  $this->db->insert_batch('materialesdurante',$insert_gastos);
	}

	//Registro de materiales de bodega
	public function registrarMaterialesBodega($data){
		
		//Registro  de materiales
		$materiales = $data["lista_material"];
		$cantidades = $data["lista_cantidad"];

		//Obtencion de id trabajo
		$id_trabajodiario = $this->getIDTrabajoDiarioCS($data['codigo_servicio']);
		$idtrabajo = $id_trabajodiario[0]['id_trabajodiario'];

		for($count = 0; $count<count($materiales); $count++){
			//Asistencia de mañana
			$materiales_limpio = $materiales[$count];
			$cantidad_limpio = $cantidades[$count];

			if(!empty($materiales_limpio) && !empty($cantidad_limpio)){
				$insert_gastos[] = array(
					'nombre' => $materiales_limpio,
					'cantidad'=> $cantidad_limpio,
					'id_trabajodiario' => $idtrabajo,
				);
			}
		}

		//Si es 0 es: Materiales durante el trabajo
		//SI es 1 es: Materiales antes el trabajo
		//Actualizar estado de planilla
		$idcodigoservicio = $this->getIDcodigoservicio($data['codigo_servicio']);
		$this->db->set('MaterialesBodega','1', FALSE);
		$this->db->where('id_codigo', $idcodigoservicio[0]['id_codigo']);
		$this->db->update('planillaestado');
		

		
		return  $this->db->insert_batch('materialesbodega',$insert_gastos);
	}

	//Metodo para registrar gastos varios
	public function registrarGastosVarios($ajax_data){
		//Obtener id de trabajo diario
		$idtipotrabajo = $this->getIDTrabajoDiarioCS($ajax_data['codigo_servicio']);
		//var_dump('DATITOS ID: '. $idtipotrabajo[0]['id_tipotrabajo']);
		$idtrabajodiario = $idtipotrabajo[0]['id_trabajodiario'];

			$idtipogastopeaje = $this->getTipoGasto('Peaje');
	
			$idtipogastoestacionamiento = $this->getTipoGasto('Estacionamiento');
		

		$data = array(
			array(
			   'valor' => $ajax_data['gasto_peaje'],
			   'cantidad' => 0,
			   'id_tipogasto' => $idtipogastopeaje[0]['id_tipogasto'],
			   'id_trabajodiario' => $idtrabajodiario
			),
			array(
				'valor' => $ajax_data['gasto_estacionamiento'],
				'cantidad' => 0,
				'id_tipogasto' => $idtipogastoestacionamiento[0]['id_tipogasto'],
				'id_trabajodiario' => $idtrabajodiario
			 ),
		 );

		 //Actualizar estado de planilla
		$idcodigoservicio = $this->getIDcodigoservicio($ajax_data['codigo_servicio']);
		$this->db->set('GastosVarios','1', FALSE);
		$this->db->where('id_codigo', $idcodigoservicio[0]['id_codigo']);
		$this->db->update('planillaestado');

		return $this->db->insert_batch('gastos',$data);
	}

	//Metodo para registrar gastos combustible
	public function registrarGastosCombustible($ajax_data){
		//Obtener id de trabajo diario
		$idtipotrabajo = $this->getIDTrabajoDiarioCS($ajax_data['codigo_servicio']);
		//var_dump('DATITOS ID: '. $idtipotrabajo[0]['id_tipotrabajo']);
		$idtrabajodiario = $idtipotrabajo[0]['id_trabajodiario'];

		$datagastocombustible = array(
			'valor' => $ajax_data['gasto_combustible'],
			'cantidad' => 0,
			'id_tipogasto' => $ajax_data['id_gasto'],
			'id_trabajodiario' => $idtrabajodiario,
		);

		//Actualizar estado de planilla
		$idcodigoservicio = $this->getIDcodigoservicio($ajax_data['codigo_servicio']);
		$this->db->set('Combustible','1', FALSE);
		$this->db->where('id_codigo', $idcodigoservicio[0]['id_codigo']);
		$this->db->update('planillaestado');

		return $this->db->insert('gastos',$datagastocombustible);
	}

	//Metodo para registrar gastos combustible
	public function actualizarGastosCombustible($ajax_data){
		//Obtener id de trabajo diario
		$idtipotrabajo = $this->getIDTrabajoDiarioCS($ajax_data['codigo_servicio']);
		//var_dump('DATITOS ID: '. $idtipotrabajo[0]['id_tipotrabajo']);
		$idtrabajodiario = $idtipotrabajo[0]['id_trabajodiario'];
		//$this->db->set('valor',$ajax_data['gasto_combustible'], FALSE);
		//$this->db->where('id_trabajodiario', $idtrabajodiario);

		$this->db->set("g.valor",$ajax_data['gasto_combustible']); # También puedes poner * si quieres seleccionar todo
		$this->db->from("gastos g");
		$this->db->join("tipogasto t", "t.id_tipogasto = g.id_tipogasto");
		$this->db->where('g.id_tipogasto',$ajax_data['id_gasto']);

		return $this->db->update('gastos g');
	}

	//Validar codigo de servicio
	public function validarcodigoservicio($ajax_data){
		$query = $this->db
				->select("p.nombreProyecto AS nombreProyecto, c.codigoservicio AS codigoservicio,
				i.FechaAsignacion AS FechaTrabajo, t.PersonalCargo AS PersonalCargo,
				t.detalle AS detalle, t.valorAsignado AS valorAsignado") # También puedes poner * si quieres seleccionar todo
				->from("trabajodiario t")
				->join("codigoservicio c", "c.id_codigo = t.id_codigo")
				->join("proyecto p", "p.ID_Proyecto = t.ID_Proyecto")
				->join("ingreso i", "i.id_trabajodiario = t.id_trabajodiario")
				->where("c.codigoservicio",$ajax_data)
				->limit(1)
				->get();
		
		return $query->result();
	}

	//Validar codigo de servicio
	public function ObtenerdetallePlanilla($ajax_data){
		$query = $this->db
				->select("tg.nombreTipoGasto AS nombreGastoViatico, p.nombreProyecto AS nombreProyecto, c.codigoservicio AS codigoservicio,
				i.FechaAsignacion AS FechaTrabajo, t.PersonalCargo AS PersonalCargo,
				t.detalle AS detalle, t.valorAsignado AS valorAsignado") # También puedes poner * si quieres seleccionar todo
				->from("trabajodiario t")
				->from("tipogasto tg")
				->join("codigoservicio c", "c.id_codigo = t.id_codigo")
				->join("proyecto p", "p.ID_Proyecto = t.ID_Proyecto")
				->join("ingreso i", "i.id_trabajodiario = t.id_trabajodiario")
				->join("materialesantes ma", "ma.id_trabajodiario = t.id_trabajodiario")
				->join("materialesantes md", "md.id_trabajodiario = t.id_trabajodiario")
				->join("gastos g", "g.id_trabajodiario = t.id_trabajodiario")
				->where("c.codigoservicio",$ajax_data)
				->limit(1)
				->get();
		
		return $query->result();
	}

	//Metodo para obtener los materiales comprados durante el trabajo
	public function ObtenerMaterialesDurante($codigo){

		$idtipotrabajo = $this->getIDTrabajoDiarioCS($codigo);
		//var_dump('DATITOS ID: '. $idtipotrabajo[0]['id_tipotrabajo']);
		$idtrabajodiario = $idtipotrabajo[0]['id_trabajodiario'];

		$query = $this->db
		->select("f.id_facturatrabajo as id, f.ubicaciondocumento as documento, f.montototal as monto, f.detalle") # También puedes poner * si quieres seleccionar todo
		->from("factura_trabajo f")
		->join("trabajodiario t", "t.id_trabajodiario = f.id_trabajodiario")
		->where('f.id_trabajodiario',$idtrabajodiario)
		->where('f.estado',0)
		->get();

		return $query->result();
	}

	//Metodo para obtener los materiales comprados antes el trabajo
	public function ObtenerMaterialesAntes($codigo){

		$idtipotrabajo = $this->getIDTrabajoDiarioCS($codigo);
		//var_dump('DATITOS ID: '. $idtipotrabajo[0]['id_tipotrabajo']);
		$idtrabajodiario = $idtipotrabajo[0]['id_trabajodiario'];

		$query = $this->db
		->select("ma.ID_MaterialesAntes AS ID, ma.nombre AS nombre, ma.cantidad AS cantidad, ma.valor AS valor") # También puedes poner * si quieres seleccionar todo
		->from("materialesantes ma")
		->join("trabajodiario t", "t.id_trabajodiario = ma.id_trabajodiario")
		->where('ma.id_trabajodiario',$idtrabajodiario)
		->get();

		return $query->result();
	}

	//Metodo para obtener los materiales registrados de bodega
	public function ObtenerMaterialesBodega($codigo){

		$idtipotrabajo = $this->getIDTrabajoDiarioCS($codigo);
		//var_dump('DATITOS ID: '. $idtipotrabajo[0]['id_tipotrabajo']);
		$idtrabajodiario = $idtipotrabajo[0]['id_trabajodiario'];

		$query = $this->db
		->select("mb.ID_MaterialesBodega AS ID, mb.nombre AS nombre, mb.cantidad AS cantidad") # También puedes poner * si quieres seleccionar todo
		->from("materialesbodega mb")
		->join("trabajodiario t", "t.id_trabajodiario = mb.id_trabajodiario")
		->where('mb.id_trabajodiario',$idtrabajodiario)
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
		$idtrabajo = $id_trabajodiario[0]['id_trabajodiario'];

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
					'nombre' => $materiales_limpio,
					'cantidad'=> $cantidad_limpio,
					'valor' => $valores_limpio,
				);
			}
		}
		$this->db->where('id_trabajodiario',$idtrabajo);
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
		$idtrabajo = $id_trabajodiario[0]['id_trabajodiario'];

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
					'nombre' => $materiales_limpio,
					'cantidad'=> $cantidad_limpio,
					'valor' => $valores_limpio,
				);
			}
		}
		$this->db->where('id_trabajodiario',$idtrabajo);
		return $this->db->update_batch('materialesantes', $insert_data, 'ID_MaterialesAntes');
	}

	//Actualizacion de  materiales de bodega
	public function updateGastoMaterialesBodega($data){
		
		//Registro  de materiales
		$materiales = $data["lista_material"];
		$cantidades = $data["lista_cantidad"];
		$id = $data["lista_id"];
		//Obtencion de id trabajo
		$id_trabajodiario = $this->getIDTrabajoDiarioCS($data['codigo_servicio']);
		$idtrabajo = $id_trabajodiario[0]['id_trabajodiario'];

		for($count = 0; $count<count($materiales); $count++){
			//Asistencia de mañana
			$materiales_limpio = $materiales[$count];
			$cantidad_limpio = $cantidades[$count];
			$lista_id = $id[$count];

			if(!empty($materiales_limpio) && !empty($cantidad_limpio)){
				$insert_data[] = array(
					'ID_MaterialesBodega' => $lista_id,
					'nombre' => $materiales_limpio,
					'cantidad'=> $cantidad_limpio,
				);
			}
		}
		$this->db->where('id_trabajodiario',$idtrabajo);
		return $this->db->update_batch('materialesbodega', $insert_data, 'ID_MaterialesBodega');
	}

	public function ObtenerArchivosSubidos($codigo){

		$idtipotrabajo = $this->getIDTrabajoDiarioCS($codigo);
		//var_dump('DATITOS ID: '. $idtipotrabajo[0]['id_tipotrabajo']);
		$idtrabajodiario = $idtipotrabajo[0]['id_trabajodiario'];

		$query = $this->db
		->select("dt.ID_detalleTrabajo AS ID, dt.Imagen AS Imagen") # También puedes poner * si quieres seleccionar todo
		->from("detalletrabajodiario dt")
		->join("trabajodiario t", "t.id_trabajodiario = dt.id_trabajodiario")
		->where('dt.id_trabajodiario',$idtrabajodiario)
		->get();

		return $query->result();
	}

	//Metodo para borrar un archivo subido
	public function deleteArchivoSubido($data){

		$idtipotrabajo = $this->getIDTrabajoDiarioCS($data['codigo_servicio']);
		//var_dump('DATITOS ID: '. $idtipotrabajo[0]['id_tipotrabajo']);
		$idtrabajodiario = $idtipotrabajo[0]['id_trabajodiario'];

		$this->db->where('id_trabajodiario', $idtrabajodiario);
		$this->db->where('Imagen', $data['nombre_imagen']);
		

		return $this->db->delete('detalletrabajodiario');
	}

	//Metodo para obtener detalle de planilla realizada
	public function ObtenerPlanillasRealizadas($codigoservicio){
		$query = $this->db
				->select("c.codigoservicio AS codigoservicio, i.FechaAsignacion AS FechaTrabajo, p.nombreProyecto AS Proyecto, t.PersonalCargo AS PersonalCargo") # También puedes poner * si quieres seleccionar todo
				->from("trabajodiario t")
				->join("codigoservicio c", "c.id_codigo = t.id_codigo")
				->join("proyecto p", "p.ID_Proyecto = t.ID_Proyecto")
				->join("ingreso i", "i.id_trabajodiario = t.id_trabajodiario")
				->like("c.codigoservicio", $codigoservicio,"both")
				->get();
		
		return $query->result();
	}

	public function ObtenerDetalleTrabajo($codigoservicio){
		$query = $this->db
				->select("t.detalle AS detalle, t.valorasignado AS valorasignado") # También puedes poner * si quieres seleccionar todo
				->from("trabajodiario t")
				->join("codigoservicio c", "c.id_codigo = t.id_codigo")
				->where("c.codigoservicio", $codigoservicio)
				->get();
		
		return $query->result();
	}

	public function ObtenerAsistenciaPlanilla($codigoservicio,$fechatrabajo){
		$idtipotrabajo = $this->getIDTrabajoDiarioCS($codigoservicio);
		//var_dump('DATITOS ID: '. $idtipotrabajo[0]['id_tipotrabajo']);
		$idtrabajodiario = $idtipotrabajo[0]['id_trabajodiario'];

		$query = $this->db
				->select("p.rut AS rut,a.fecha_asistencia AS Fecha, a.horallegadam AS LlegadaM, a.horasalidam AS SalidaM, a.horallegadat AS LlegadaT, a.horasalidat AS SalidaT, p.nombrecompleto AS NombreCompleto, a.horastrabajadas AS HorasTrabajadas, a.horasextras AS HorasExtras, a.detalle") # También puedes poner * si quieres seleccionar todo
				->from("trabajodiario t")
				->join("codigoservicio c", "c.id_codigo = t.id_codigo")
				->join("personal_trabajo pt", "pt.id_trabajodiario = t.id_trabajodiario")
				->join("personal p", "p.id_personal = pt.id_personal")
				->join("asistencia_personal a", "a.id_personal = p.id_personal")
				->where("c.codigoservicio", $codigoservicio)
				->where("t.id_Trabajodiario", $idtrabajodiario)
				->where("a.fecha_asistencia", $fechatrabajo)
				->get();
		
		return $query->result();
	}

	public function ObtenerGastosCombustibles($codigo){

		$idtipotrabajo = $this->getIDTrabajoDiarioCS($codigo);
		//var_dump('DATITOS ID: '. $idtipotrabajo[0]['id_tipotrabajo']);
		$idtrabajodiario = $idtipotrabajo[0]['id_trabajodiario'];

		//Array con las id de los gastos viaticos
		$gastosvarios = array('Bencina','Petroleo');
		$query = $this->db
		->select("g.id_gasto AS id, g.valor AS valor,t.nombretipogasto AS nombre") # También puedes poner * si quieres seleccionar todo
		->from("gastos g")
		->join("tipogasto t", "t.id_tipogasto = g.id_tipogasto")
		->where_in('t.nombretipoGasto',$gastosvarios)
		->where('g.id_trabajodiario',$idtrabajodiario)
		->get();

		return $query->result();
	}

	function getRows($params = array()){
        $this->db->select('Imagen');
        $this->db->from('detalletrabajodiario');
        if(!empty($params['id'])){
            $this->db->where('ID_detalleTrabajo',$params['id']);
            //get records
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            //get records
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
        }
        //return fetched data
        return $result;
	}
	
	public function Obtenerhorasextrass($rutpersonal,$fechainicio,$fechafin){
		$query = $this->db
				->select("p.rut AS rut, p.nombrecompleto AS nombre, a.horasextras AS horasextras") # También puedes poner * si quieres seleccionar todo
				->from("asistencia_personal a")
				->join("personal p", "a.id_personal = p.id_personal")
				->where("p.rut", $rutpersonal)
				->get();
		
		return $query->result();
	}

	public function ObtenerhorasextrasSegunFecha($rutpersonal,$fecha){
		
		$query = $this->db
				->select("SUM(a.horasextras) AS TotalHoras,p.rut AS Rut, p.nombrecompleto AS Nombre") # También puedes poner * si quieres seleccionar todo
				->from("asistencia_personal a")
				->join("personal p", "a.id_personal = p.id_personal")
				->where('DATE(a.fecha_asistencia) IN ('.$fecha.')')
				->where("p.rut", $rutpersonal)
				->get();

		return $query->result_array();
	}

	public function ObtenerHorasExtras($rutpersonal,$fechainicial,$fechatermino){
		// Declare an empty array 
		$arraydias = array(); 
		$pos = strpos($fechainicial, $fechatermino);
		if($pos === false){
			// Variable that store the date interval 
			// of period 1 day 
			$interval = new DateInterval('P1D'); 
		
			$realEnd = new DateTime($fechatermino); 
			$realEnd->add($interval); 
		
			$period = new DatePeriod(new DateTime($fechainicial), $interval, $realEnd); 
			
			// Use loop to store date into array 
			$format = 'y-m-d';
			foreach($period as $date) {                  
				$fecha = $date->format($format);
				$arraydias [] = $fecha;
			} 
   
			$week_array_ = $arraydias; 
			//$week_array_ = ["2020-07-06","2020-07-07"]
			$string = "'" . implode("','", $arraydias) . "'";
			//string = "'2020-07-01','2020-07-02','2020-07-03','2020-07-04'"...
			
		}else{
			$string = "";
		}
		
		$data  = $this->ObtenerhorasextrasSegunFecha($rutpersonal,$string);
		return $data;
	}

	//Obtener informacion para descargar documentacion de materiales comprados durante
	function getDocMaterialesDurante($params = array()){
        $this->db->select('ubicaciondocumento');
        $this->db->from('factura_trabajo');
        if(!empty($params['id'])){
            $this->db->where('id_facturatrabajo',$params['id']);
            //get records
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            //get records
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
        }
        //return fetched data
        return $result;
	}

	//Metodo para borrar un documento de compra de materiales durante
	public function deleteDocCompraMaterialDurante($data){
		$datadocumento = array(
            'estado' => 1,
        );
        $this->db->where('id_facturatrabajo', $data['iddoc']);
		return $this->db->update('factura_trabajo',$datadocumento);
	}

	//Tabla de trabajos diarios
	function make_datatables_trabajodiario(){
        $this->make_query_trabajodiario();
        if ($_POST["length"] != - 1){
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();

    }

    var $tablatrabajodiario = array(
        "trabajodiario t",
        "codigoservicio c",
		"proyecto p",
		"ingreso i",
    );
    var $select_columna_trabajodiario = array(
		"t.id_trabajodiario",
        "p.nombreproyecto",
        "c.codigoservicio",
		"i.fechaasignacion",
        "t.personalcargo",
    );

    var $order_columna_trabajodiario = array(
        "p.nombreproyecto",
        "c.codigoservicio",
		"i.fechaasignacion",
        "t.personalcargo",
    );

    var $where_trabajodiario = "c.id_codigo = t.id_codigo AND p.id_proyecto = t.id_proyecto AND i.id_trabajodiario = t.id_trabajodiario";

    function make_query_trabajodiario(){
        $this->db->select($this->select_columna_trabajodiario);
        $this->db->from($this->tablatrabajodiario);
        $this->db->where($this->where_trabajodiario);
        if (isset($_POST["search"]["value"]) && $_POST["search"]["value"] != ''){
            $this->db->group_start();
            $this->db->like("p.nombreproyecto", $_POST["search"]["value"]);
            $this->db->or_like("c.codigoservicio", $_POST["search"]["value"]);
            $this->db->or_like("i.fechaasignacion", $_POST["search"]["value"]);
			$this->db->or_like("t.personalcargo", $_POST["search"]["value"]);
            $this->db->group_end();
        }
        if (isset($_POST["order"])){
            $this->db->order_by($this->order_columna_trabajodiario[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        
        }else{
            $this->db->order_by('id_trabajodiario', 'ASC');
        }
    }

    function get_all_data_trabajodiario(){
        $this->db->select($this->select_columna_trabajodiario);
        $this->db->from($this->tablatrabajodiario);
        return $this->db->count_all_results();
    }

    function get_filtered_data_trabajodiario(){
        $this->make_query_trabajodiario();
        $query = $this->db->get();
        return $query->num_rows();
    }
	

}

?>