<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proyecto_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this
			->load
			->database();
	}

	public function ingresoProyecto($datos)
	{

		$datos_detalle = array(

			'nombreproyecto' => $datos['nombreProyecto'],
			'fecha_inicio' => $datos['fechaInicio'],
			'fecha_termino' => $datos['fechaTermino'],
			'montototal' => $datos['monto']
		);

		$this
			->db
			->insert('proyecto', $datos_detalle);
		$id_proyecto = $this
			->db
			->insert_id();

		$set_data = $this
			->session
			->all_userdata();

		$datos_proyectousuario = array(

			'id_usuario' => $set_data['ID_Usuario'],
			'id_proyecto' => $id_proyecto,
			'estado' => 0
		);

		$this
			->db
			->insert('proyecto_usuario', $datos_proyectousuario);

	}
	public function registroPersonal($datos)
	{

		$datos = array(

			'nombrecompleto' => $datos['name'],
			'rut' => $datos['rut'],
			'telefono' => $datos['telefono'],
			'correo' => $datos['email'],
			'cargo' => $datos['cargo']

		);
		$this
			->db
			->insert('personal', $datos);
	}

	public function ObtenerCodigoProyecto()
	{
		$query = $this
			->db
			->select("id_proyecto")
			->from("proyecto")
			->order_by("id_proyecto", "DESC")
			->limit("1")
			->get();
		return $query->result_array();

	}

	function Mostrarpartidas()
	{
		$id_proyectos = $this->ObtenerCodigoProyecto();
		$this
			->db
			->SELECT('id_partidas, nombre');
		$this
			->db
			->from('partidas');
		$this
			->db
			->order_by('nombre', 'ASC');
		$this
			->db
			->where('id_proyecto', $id_proyectos[0]["id_proyecto"]);
		$query = $this
			->db
			->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
	}

	function MostrarpartidasEtapas($id_partida)
	{
		$id_proyectos = $this->ObtenerCodigoProyecto();

		$query = $this
			->db
			->SELECT('e.id_etapas as id, e.nombre as nombreetapa, e.estado as estado')
			->from('proyecto py')
			->join("partidas p", "p.id_proyecto = py.id_proyecto")
			->join("etapas e", "e.id_partidas = p.id_partidas")
			->where('p.id_partidas', $id_partida)->where('py.id_proyecto', $id_proyectos[0]["id_proyecto"])->get();

		return $query->result();
	}

	public function registrarPartidasModels($data)
	{

		//Registro
		$nombre = $data["lista_partida"];

		$id_proyectoss = $this->ObtenerCodigoProyecto();
		// echo $id_proyectoss[0]["id_proyecto"];
		for ($count = 0;$count < count($nombre);$count++)
		{

			$nombre_limpio = $nombre[$count];

			if (!empty($nombre_limpio) /* && !empty($cantidad_limpio)
			 && !empty($valores_limpio)*/)
			{
				$insert_partidas[] = array(
					'nombre' => $nombre_limpio,
					'id_proyecto' => $id_proyectoss[0]["id_proyecto"]

				);
			}
		}
		return $this
			->db
			->insert_batch('partidas', $insert_partidas);
	}

	public function ingresoPorcentaje($datos)
	{
		$id_proyectoss = $this->ObtenerCodigoProyecto();
		$id_partida = $datos["partidas6"];
		$impre = $datos['imprevisto'];
		$gene = $datos['generales'];
		$comi = $datos['comision'];
		$ingen = $datos['ingenieria'];
		$util = $datos['utilidades'];

		$porcentajeImp = $impre / 100;
		$porcentajeGene = $gene / 100;
		$porcentajeComi = $comi / 100;
		$porcentajeIngen = $ingen / 100;
		$porcentajeUtil = $util / 100;

		$datos_detalle = array(

			'imprevisto' => $porcentajeImp,
			'gasto_generales' => $porcentajeGene,
			'comisiones' => $porcentajeComi,
			'ingenieria' => $porcentajeIngen,
			'utilidades' => $porcentajeUtil,
			'id_partidas' => $id_partida
		);

		$this
			->db
			->insert('porcentaje', $datos_detalle);

	}
	public function ingresoFleteTraslado($datos)
	{
		$id_partida = $datos["partidas7"];
		$valor = $datos['flete_Traslado'];

		$datapartida['id_partida'] = $id_partida;

		$datos_fleteTraslado = array(

			'valor' => $valor,
			'id_partidas' => $id_partida
		);

		$this
			->db
			->insert('flete_traslado', $datos_fleteTraslado);

		$subtotalPartida = $this->obtenerResumen($datapartida);
		$imprevistos = $this->obtenerImprevisto($datapartida);
		$instalacion = $this->obtenerInstalacion($datapartida);
		$supervision = $this->obtenerSupervision($datapartida);
		$gastoGeneral = $this->totalGastoGeneral($datapartida);
		$comision = $this->totalComisiones($datapartida);
		$ingenieria = $this->totalIngenieria($datapartida);
		$utilidades = $this->totalUtilidades($datapartida);

		//---------------------
		$subtotalpartida_limpio = 0;
		$imprevistos_limpio = 0;
		$instalacion_limpio = 0;
		$supervision_limpio = 0;

		foreach ($subtotalPartida as $row)
		{
			$subtotalPartida_limpio = $row->SubTotal; //20
			
		}

		foreach ($imprevistos as $row)
		{
			$imprevistos_limpio = $row->imprevisto; //0.1
			
		}

		foreach ($instalacion as $row)
		{
			$instalacion_limpio = $row->instalacion; //20
			
		}

		foreach ($supervision as $row)
		{
			$supervision_limpio = $row->supervision; //20
			
		}

		$totalImprevisto = intval($subtotalPartida_limpio) * (float)$imprevistos_limpio; //Imprevistos
		//echo"Total imprevisto ".$totalImprevisto."\n";
		

		$costoMaterial = intval($subtotalPartida_limpio) + intval($totalImprevisto);
		//echo"Costo material ".$costoMaterial."\n";
		

		$valorEquipamiento = intval($costoMaterial) + intval($instalacion_limpio) + intval($supervision_limpio);
		//echo"Valor equipamiento ".$valorEquipamiento."\n";
		$precioSugeridoVenta = intval($valor) + intval($valorEquipamiento) + (float)$gastoGeneral + (float)$comision + (float)$ingenieria + (float)$utilidades;

		$this
			->db
			->set('precio_sugerido', $precioSugeridoVenta);
		$this
			->db
			->where('id_partidas', $id_partida);
		return $this
			->db
			->update('partidas');

	}

	public function ingresarSupervision($data)
	{

		$datos_detalle = array(

			'dias' => $data['dias'],
			'tipo' => $data['tipo']

		);

		$this
			->db
			->insert('detalle_evaluacion', $datos_detalle);
		$id_detalle = $this
			->db
			->insert_id();

		//Registro
		$id_partida = $data["partidas4"];
		$cantidad = $data["lista_cantidad"];
		$item = $data["lista_item"];
		$precio_unitario = $data["lista_unitario"];

		$id_proyectoss = $this->ObtenerCodigoProyecto();
		// echo $id_proyectoss[0]["id_proyecto"];
		for ($count = 0;$count < count($cantidad);$count++)
		{

			$cantidad_limpio = $cantidad[$count];
			$item_limpio = $item[$count];
			$unitario_limpio = $precio_unitario[$count];
			$total = $cantidad_limpio * $unitario_limpio;

			if (!empty($cantidad_limpio) && !empty($item_limpio) && !empty($unitario_limpio))
			{
				$insert_evaluacion[] = array(
					'cantidad' => $cantidad_limpio,
					'item' => $item_limpio,
					'precio_unitario' => $unitario_limpio,
					'total' => $total,
					'id_partidas' => $id_partida,
					'id_detalle' => $id_detalle
				);
			}
		}
		return $this
			->db
			->insert_batch('evaluacion', $insert_evaluacion);
	}
	public function ingresarInstalacion($data)
	{

		$datos_detalle = array(

			'dias' => $data['dias'],
			'tipo' => $data['tipo']

		);

		$this
			->db
			->insert('detalle_evaluacion', $datos_detalle);
		$id_detalle = $this
			->db
			->insert_id();

		//Registro
		$id_partida = $data["partidas5"];
		$cantidad = $data["lista_cantidad"];
		$item = $data["lista_item"];
		$precio_unitario = $data["lista_unitario"];

		$id_proyectoss = $this->ObtenerCodigoProyecto();
		// echo $id_proyectoss[0]["id_proyecto"];
		for ($count = 0;$count < count($cantidad);$count++)
		{

			$cantidad_limpio = $cantidad[$count];
			$item_limpio = $item[$count];
			$unitario_limpio = $precio_unitario[$count];
			$total = $cantidad_limpio * $unitario_limpio;

			if (!empty($cantidad_limpio) && !empty($item_limpio) && !empty($unitario_limpio))
			{
				$insert_evaluacion[] = array(
					'cantidad' => $cantidad_limpio,
					'item' => $item_limpio,
					'precio_unitario' => $unitario_limpio,
					'total' => $total,
					'id_partidas' => $id_partida,
					'id_detalle' => $id_detalle
				);
			}
		}
		return $this
			->db
			->insert_batch('evaluacion', $insert_evaluacion);
	}

	public function listaProyectosEjecutados($idusuario)
	{
		$query = $this
			->db
			->select("COUNT(pr.id_proyecto) as total") # También puedes poner * si quieres seleccionar todo
		
			->from("proyecto pr")
			->join("proyecto_usuario pu", "pr.id_proyecto = pu.id_proyecto")
			->where("pu.estado", 0)
			->where("pu.id_usuario", $idusuario)->get();

		return $query->result_array();
	}

	public function listaProyectosEnEjecucion()
	{
		$query = $this
			->db
			->select("COUNT(pr.id_proyecto) as total") # También puedes poner * si quieres seleccionar todo
		
			->from("proyecto pr")
			->join("proyecto_usuario pu", "pr.id_proyecto = pu.id_proyecto")
			->where("pu.estado", 0)
			->get();

		return $query->result_array();
	}

	//Listado de proyectos segun la cuenta de login
	public function listaProyectosSegunUsuario($idusuario)
	{
		$query = $this
			->db
			->select("pr.id_proyecto,pr.nombreproyecto") # También puedes poner * si quieres seleccionar todo
		
			->from("proyecto pr")
			->join("proyecto_usuario pu", "pr.id_proyecto = pu.id_proyecto")
			->where("pu.estado", 0)
			->where("pu.id_usuario", $idusuario)->get();
		return $query->result();
	}

	public function listaProyectos()
	{
		$query = $this
			->db
			->select("*") # También puedes poner * si quieres seleccionar todo
		
			->from("proyecto")
			->get();
		return $query->result();
	}

	public function getNombreProyecto($idproyecto)
	{
		$query = $this
			->db
			->select("nombreproyecto") # También puedes poner * si quieres seleccionar todo
		
			->from("proyecto")
			->where("id_proyecto", $idproyecto)->get();

		return $query->result_array();
	}

	public function ingresarEtapas($data)
	{

		//Registro
		$id_partida = $data["partida2"];
		$estado = $data["estado"];
		$nombre = $data["lista_etapa"];

		// echo $id_proyectoss[0]["id_proyecto"];
		for ($count = 0;$count < count($nombre);$count++)
		{

			$nombre_limpio = $nombre[$count];

			if (!empty($nombre_limpio))
			{
				$insert_etapas[] = array(
					'nombre' => $nombre_limpio,
					'estado' => $estado,
					'id_partidas' => $id_partida

				);
			}
		}
		return $this
			->db
			->insert_batch('etapas', $insert_etapas);
	}

	public function ingresarDespiece($data)
	{

		//Registro
		$id_etapa = $data["idEtapa"];
		$cantidad = $data["lista_cantidad"];
		$item = $data["lista_item"];
		$precio = $data["lista_precio"];

		$datos_fletes = array(

			'id_etapas' => $data['idEtapa'],
			'valor' => $data['valorFlete']

		);

		$this
			->db
			->insert('fletes', $datos_fletes);

		$this->actualizarEstadoEtapa($id_etapa);

		// echo $id_proyectoss[0]["id_proyecto"];
		for ($count = 0;$count < count($cantidad);$count++)
		{

			$cantidad_limpio = $cantidad[$count];
			$item_limpio = $item[$count];
			$precio_limpio = $precio[$count];
			$total = $cantidad_limpio * $precio_limpio;

			if (!empty($cantidad_limpio) && !empty($item_limpio) && !empty($precio_limpio))
			{
				$insert_despiece[] = array(
					'cantidad' => $cantidad_limpio,
					'item' => $item_limpio,
					'precio_unitario' => $precio_limpio,
					'total' => $total,
					'id_etapas' => $id_etapa

				);
			}
		}
		return $this
			->db
			->insert_batch('despiece', $insert_despiece);
	}

	public function ingresoflete($datos)
	{

		$datos_flete = array(

			'id_etapas' => $datos['id_etapa'],
			'valor' => $datos['valor']

		);

		$this
			->db
			->insert('fletes', $datos_flete);

	}

	function obtenerResumen($id_partida)
	{
		$sql = "SELECT sum(total) SubTotal FROM (SELECT total FROM despiece d, partidas p,etapas e WHERE p.id_partidas=e.id_partidas AND e.id_etapas = d.id_etapas AND e.id_partidas= " . $id_partida["id_partida"] . " union all SELECT valor FROM  partidas p, fletes f,etapas e WHERE p.id_partidas=e.id_partidas AND e.id_etapas=f.id_etapas AND e.id_partidas= " . $id_partida["id_partida"] . " )x";
		$query = $this
			->db
			->query($sql);

		return $query->result();
	}

	public function obtenerImprevisto($id_partida)
	{
		$id_proyectoss = $this->ObtenerCodigoProyecto();
		$query = $this
			->db
			->SELECT('imprevisto')
			->from('partidas p')
			->join("proyecto pr", "pr.id_proyecto = p.id_proyecto")
			->join("porcentaje po", "p.id_partidas=po.id_partidas")
			->where('pr.id_proyecto', $id_proyectoss[0]['id_proyecto'])->where('p.id_partidas', $id_partida["id_partida"])->get();
		return $query->result();
	}

	/* select sum(total)*dias as Instalacion
	   from partidas p,evaluacion e,detalle_evaluacion d,proyecto pr 
	   WHERE pr.id_proyecto=p.id_proyecto 
	   And p.id_partidas=e.id_partidas 
	   and e.id_detalle=d.id_detalle 
	   and d.tipo="Instalacion" 
	   and p.id_partidas=23 
	   and pr.id_proyecto=17 */
	public function obtenerInstalacion($id_partida)
	{
		$id_proyectoss = $this->ObtenerCodigoProyecto();
		// $instalacion='Instalacion';
		$query = $this
			->db
			->SELECT('sum(total)*dias as instalacion')
			->from('partidas p')
			->join("proyecto pr", "pr.id_proyecto = p.id_proyecto")
			->join("evaluacion e", "p.id_partidas=e.id_partidas")
			->join("detalle_evaluacion d", "e.id_detalle=d.id_detalle")
			->where('pr.id_proyecto', $id_proyectoss[0]['id_proyecto'])->where('p.id_partidas', $id_partida["id_partida"])->where('d.tipo', "Instalacion")
			->get();
		return $query->result();
	}
	public function obtenerSupervision($id_partida)
	{
		$id_proyectoss = $this->ObtenerCodigoProyecto();

		$query = $this
			->db
			->SELECT('sum(total)*dias as supervision')
			->from('partidas p')
			->join("proyecto pr", "pr.id_proyecto = p.id_proyecto")
			->join("evaluacion e", "p.id_partidas=e.id_partidas")
			->join("detalle_evaluacion d", "e.id_detalle=d.id_detalle")
			->where('pr.id_proyecto', $id_proyectoss[0]['id_proyecto'])->where('p.id_partidas', $id_partida["id_partida"])->where('d.tipo', "Supervision")
			->get();
		return $query->result();
	}

	/*
	   select  gasto_generales,comisiones,ingenieria,utilidades
	   from partidas p,porcentaje po,proyecto pr 
	   WHERE pr.id_proyecto=p.id_proyecto 
	   And p.id_partidas=po.id_partidas 
	   and p.id_partidas=23 
	   and pr.id_proyecto=17*/

	public function obtenerPorcentaje($id_partida)
	{
		$id_proyectoss = $this->ObtenerCodigoProyecto();

		$query = $this
			->db
			->SELECT('comisiones,ingenieria,utilidades')
			->from('partidas p')
			->join("proyecto pr", "pr.id_proyecto = p.id_proyecto")
			->join("porcentaje po", "p.id_partidas=po.id_partidas")
			->where('pr.id_proyecto', $id_proyectoss[0]['id_proyecto'])->where('p.id_partidas', $id_partida["id_partida"])->get();
		return $query->result();
	}

	public function actualizarEstadoEtapa($idetapa)
	{
		$this
			->db
			->set('estado', 1);
		$this
			->db
			->where('id_etapas', $idetapa);
		return $this
			->db
			->update('etapas');
	}

	public function obtenerFleteTraslado($id_partida)
	{
		$id_proyectoss = $this->ObtenerCodigoProyecto();

		$query = $this
			->db
			->SELECT('valor')
			->from('partidas p')
			->join("proyecto pr", "pr.id_proyecto = p.id_proyecto")
			->join("flete_traslado f", "p.id_partidas=f.id_partidas")
			->where('pr.id_proyecto', $id_proyectoss[0]['id_proyecto'])->where('p.id_partidas', $id_partida["id_partida"])->get();
		return $query->result();
	}
	/************************************************************************************ */
	public function obtenerGastoGeneral($id_partida)
	{
		$id_proyectoss = $this->ObtenerCodigoProyecto();

		$query = $this
			->db
			->SELECT('gasto_generales')
			->from('partidas p')
			->join("proyecto pr", "pr.id_proyecto = p.id_proyecto")
			->join("porcentaje pc", "p.id_partidas=pc.id_partidas")
			->where('pr.id_proyecto', $id_proyectoss[0]['id_proyecto'])->where('p.id_partidas', $id_partida["id_partida"])->get();
		return $query->result();

	}
	public function totalGastoGeneral($id_partida)
	{

		$gastoGeneral = $this->obtenerGastoGeneral($id_partida);

		$subtotalPartida = $this->obtenerResumen($id_partida);
		$imprevistos = $this->obtenerImprevisto($id_partida);
		$instalacion = $this->obtenerInstalacion($id_partida);
		$supervision = $this->obtenerSupervision($id_partida);

		//---------------------
		$gastogeneral_limpio = 0;
		$subtotalpartida_limpio = 0;
		$imprevistos_limpio = 0;
		$instalacion_limpio = 0;
		$supervision_limpio = 0;

		foreach ($gastoGeneral as $row)
		{
			$gastogeneral_limpio = $row->gasto_generales; //0.2
			
		}

		foreach ($subtotalPartida as $row)
		{
			$subtotalPartida_limpio = $row->SubTotal; //20
			
		}

		foreach ($imprevistos as $row)
		{
			$imprevistos_limpio = $row->imprevisto; //0.1
			
		}

		foreach ($instalacion as $row)
		{
			$instalacion_limpio = $row->instalacion; //20
			
		}

		foreach ($supervision as $row)
		{
			$supervision_limpio = $row->supervision; //20
			
		}

		$totalImprevisto = intval($subtotalPartida_limpio) * (float)$imprevistos_limpio; //Imprevistos
		//echo"Total imprevisto ".$totalImprevisto."\n";
		

		$costoMaterial = intval($subtotalPartida_limpio) + intval($totalImprevisto);
		//echo"Costo material ".$costoMaterial."\n";
		

		$valorEquipamiento = intval($costoMaterial) + intval($instalacion_limpio) + intval($supervision_limpio);
		//echo"Valor equipamiento ".$valorEquipamiento."\n";
		$totalgastogeneral = intval($valorEquipamiento) * (float)$gastogeneral_limpio;
		//echo"Total gasto general ".$totalgastogeneral."\n";
		return $totalgastogeneral;
	}

	public function obtenerComisiones($id_partida)
	{
		$id_proyectoss = $this->ObtenerCodigoProyecto();

		$query = $this
			->db
			->SELECT('comisiones')
			->from('partidas p')
			->join("proyecto pr", "pr.id_proyecto = p.id_proyecto")
			->join("porcentaje pc", "p.id_partidas=pc.id_partidas")
			->where('pr.id_proyecto', $id_proyectoss[0]['id_proyecto'])->where('p.id_partidas', $id_partida["id_partida"])->get();
		return $query->result();
	}
	public function totalComisiones($id_partida)
	{

		$comision = $this->obtenerComisiones($id_partida);

		$subtotalPartida = $this->obtenerResumen($id_partida);
		$imprevistos = $this->obtenerImprevisto($id_partida);
		$instalacion = $this->obtenerInstalacion($id_partida);
		$supervision = $this->obtenerSupervision($id_partida);

		//---------------------
		$comision_limpio = 0;
		$subtotalpartida_limpio = 0;
		$imprevistos_limpio = 0;
		$instalacion_limpio = 0;
		$supervision_limpio = 0;

		foreach ($comision as $row)
		{
			$comision_limpio = $row->comisiones; //0.2
			
		}

		foreach ($subtotalPartida as $row)
		{
			$subtotalPartida_limpio = $row->SubTotal; //20
			
		}

		foreach ($imprevistos as $row)
		{
			$imprevistos_limpio = $row->imprevisto; //0.1
			
		}

		foreach ($instalacion as $row)
		{
			$instalacion_limpio = $row->instalacion; //20
			
		}

		foreach ($supervision as $row)
		{
			$supervision_limpio = $row->supervision; //20
			
		}

		$totalImprevisto = intval($subtotalPartida_limpio) * (float)$imprevistos_limpio; //Imprevistos
		//echo"Total imprevisto ".$totalImprevisto."\n";
		

		$costoMaterial = intval($subtotalPartida_limpio) + intval($totalImprevisto);
		//echo"Costo material ".$costoMaterial."\n";
		

		$valorEquipamiento = intval($costoMaterial) + intval($instalacion_limpio) + intval($supervision_limpio);
		//echo"Valor equipamiento ".$valorEquipamiento."\n";
		$totalcomision = intval($valorEquipamiento) * (float)$comision_limpio;
		//echo"Total gasto general ".$totalcomision."\n";
		return $totalcomision;

	}
	public function obtenerIngenieria($id_partida)
	{
		$id_proyectoss = $this->ObtenerCodigoProyecto();

		$query = $this
			->db
			->SELECT('ingenieria')
			->from('partidas p')
			->join("proyecto pr", "pr.id_proyecto = p.id_proyecto")
			->join("porcentaje pc", "p.id_partidas=pc.id_partidas")
			->where('pr.id_proyecto', $id_proyectoss[0]['id_proyecto'])->where('p.id_partidas', $id_partida["id_partida"])->get();
		return $query->result();
	}
	public function totalIngenieria($id_partida)
	{

		$ingenieria = $this->obtenerIngenieria($id_partida);

		$subtotalPartida = $this->obtenerResumen($id_partida);
		$imprevistos = $this->obtenerImprevisto($id_partida);
		$instalacion = $this->obtenerInstalacion($id_partida);
		$supervision = $this->obtenerSupervision($id_partida);

		//---------------------
		$ingenieria_limpio = 0;
		$subtotalpartida_limpio = 0;
		$imprevistos_limpio = 0;
		$instalacion_limpio = 0;
		$supervision_limpio = 0;

		foreach ($ingenieria as $row)
		{
			$ingenieria_limpio = $row->ingenieria; //0.2
			
		}

		foreach ($subtotalPartida as $row)
		{
			$subtotalPartida_limpio = $row->SubTotal; //20
			
		}

		foreach ($imprevistos as $row)
		{
			$imprevistos_limpio = $row->imprevisto; //0.1
			
		}

		foreach ($instalacion as $row)
		{
			$instalacion_limpio = $row->instalacion; //20
			
		}

		foreach ($supervision as $row)
		{
			$supervision_limpio = $row->supervision; //20
			
		}

		$totalImprevisto = intval($subtotalPartida_limpio) * (float)$imprevistos_limpio; //Imprevistos
		//echo"Total imprevisto ".$totalImprevisto."\n";
		

		$costoMaterial = intval($subtotalPartida_limpio) + intval($totalImprevisto);
		//echo"Costo material ".$costoMaterial."\n";
		

		$valorEquipamiento = intval($costoMaterial) + intval($instalacion_limpio) + intval($supervision_limpio);
		//echo"Valor equipamiento ".$valorEquipamiento."\n";
		$totalingenieria = intval($valorEquipamiento) * (float)$ingenieria_limpio;
		//echo"Total gasto ingenieria ".$totalingenieria."\n";
		return $totalingenieria;
	}

	public function obtenerUtilidades($id_partida)
	{
		$id_proyectoss = $this->ObtenerCodigoProyecto();

		$query = $this
			->db
			->SELECT('utilidades')
			->from('partidas p')
			->join("proyecto pr", "pr.id_proyecto = p.id_proyecto")
			->join("porcentaje pc", "p.id_partidas=pc.id_partidas")
			->where('pr.id_proyecto', $id_proyectoss[0]['id_proyecto'])->where('p.id_partidas', $id_partida["id_partida"])->group_by('utilidades')
			->get();
		return $query->result();
	}

	public function totalUtilidades($id_partida)
	{

		$utilidades = $this->obtenerUtilidades($id_partida);

		$subtotalPartida = $this->obtenerResumen($id_partida);
		$imprevistos = $this->obtenerImprevisto($id_partida);
		$instalacion = $this->obtenerInstalacion($id_partida);
		$supervision = $this->obtenerSupervision($id_partida);

		//---------------------
		$utilidades_limpio = 0;
		$subtotalpartida_limpio = 0;
		$imprevistos_limpio = 0;
		$instalacion_limpio = 0;
		$supervision_limpio = 0;

		foreach ($utilidades as $row)
		{
			$utilidades_limpio = $row->utilidades; //0.2
			
		}

		foreach ($subtotalPartida as $row)
		{
			$subtotalPartida_limpio = $row->SubTotal; //20
			
		}

		foreach ($imprevistos as $row)
		{
			$imprevistos_limpio = $row->imprevisto; //0.1
			
		}

		foreach ($instalacion as $row)
		{
			$instalacion_limpio = $row->instalacion; //20
			
		}

		foreach ($supervision as $row)
		{
			$supervision_limpio = $row->supervision; //20
			
		}

		//echo"Supervision model: ".$supervision_limpio;
		$totalImprevisto = intval($subtotalPartida_limpio) * (float)$imprevistos_limpio; //Imprevistos
		//echo"Total imprevisto ".$totalImprevisto."\n";
		

		$costoMaterial = intval($subtotalPartida_limpio) + intval($totalImprevisto);
		//echo"Costo material ".$costoMaterial."\n";
		

		$valorEquipamiento = intval($costoMaterial) + intval($instalacion_limpio) + intval($supervision_limpio);
		//echo"Valor equipamiento ".$valorEquipamiento."\n";
		$totalUtilidades = intval($valorEquipamiento) * (float)$utilidades_limpio;
		//echo"Total utilidades ".$totalUtilidades."\n";
		return $totalUtilidades;
	}
	/*********************************************************************************************** */
	public function obtenerPrecioSugeridoProyecto()
	{

		$id_proyectoss = $this->ObtenerCodigoProyecto();

		$query = $this
			->db
			->SELECT('round (sum(precio_sugerido)) as PrecioSugerido')
			->from('partidas p')
			->join("proyecto pr", "pr.id_proyecto = p.id_proyecto")
			->where('pr.id_proyecto', $id_proyectoss[0]['id_proyecto'])->get();
		return $query->result();

		/**SELECT round (sum(precio_sugerido)) FROM partidas p,proyecto pr WHERE pr.id_proyecto=p.id_proyecto and pr.id_proyecto=34 */

	}

	/* ----------------------------------Tabla Estado--------------------------------*/
	//Tabla de con buscador ordenes
	function make_datatables_EstadoProyecto()
	{
		$this->make_query_EstadoProyecto();
		if ($_POST["length"] != - 1)
		{
			$this
				->db
				->limit($_POST['length'], $_POST['start']);
		}
		$query = $this
			->db
			->get();
		return $query->result();

	}
	var $tablaEstadoProyecto = array(
		"proyecto p",
		"usuario u",
		"proyecto_usuario pu"
	);
	var $select_columna_EstadoProyecto = array(
		"p.id_proyecto",
		"p.nombreproyecto",
		"u.nombre_completo as nombreusuario",
		"p.fecha_inicio",
		"p.fecha_termino",
		"pu.estado"
	);

	var $order_columna_EstadoProyecto = array(
		"p.id_proyecto",
		"p.nombreproyecto",
		"u.nombre_completo ",
		"p.fecha_inicio",
		"p.fecha_termino",
		"pu.estado"
	);

	var $where_EstadoProyecto = "p.id_proyecto = pu.id_proyecto AND u.id_usuario = pu.id_usuario";

	function make_query_EstadoProyecto()
	{
		$this
			->db
			->select($this->select_columna_EstadoProyecto);
		$this
			->db
			->from($this->tablaEstadoProyecto);
		$this
			->db
			->where($this->where_EstadoProyecto);

		if (isset($_POST["search"]["value"]) && $_POST["search"]["value"] != '')
		{
			$this
				->db
				->group_start();
			$this
				->db
				->like("p.nombreproyecto", $_POST["search"]["value"]);
			$this
				->db
				->group_end();
		}
		if (isset($_POST["order"]))
		{
			$this
				->db
				->order_by($this->order_columna_EstadoProyecto[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);

		}
		else
		{
			$this
				->db
				->order_by('id_proyecto', 'ASC');
		}
	}

	function get_all_data_EstadoProyecto()
	{
		$this
			->db
			->select($this->select_columna_EstadoProyecto);
		$this
			->db
			->from($this->tablaEstadoProyecto);

		return $this
			->db
			->count_all_results();
	}

	function get_filtered_data_EstadoProyecto()
	{
		$this->make_query_EstadoProyecto();
		$query = $this
			->db
			->get();

		return $query->num_rows();
	}
	/* ----------------------------------Fin Tabla Estado--------------------------------*/
	/* ----------------------------------Tabla Proyecto ejecutados--------------------------------*/
	//Tabla de con buscador ordenes
	function make_datatables_ProyectoEjecutados()
	{
		$this->make_query_ProyectoEjecutados();
		if ($_POST["length"] != - 1)
		{
			$this
				->db
				->limit($_POST['length'], $_POST['start']);
		}
		$query = $this
			->db
			->get();
		return $query->result();

	}
	var $tablaProyectoEjecutados = array(
		"proyecto p",
		"usuario u",
		"proyecto_usuario pu"
	);
	var $select_columna_ProyectoEjecutados = array(
		"p.id_proyecto",
		"p.nombreproyecto",
		"p.fecha_inicio",
		"p.fecha_termino",
		"pu.estado"
	);

	var $order_columna_ProyectoEjecutados = array(
		"p.id_proyecto",
		"p.nombreproyecto",
		"p.fecha_inicio",
		"p.fecha_termino",
		"pu.estado"
	);
	//$set_data = $this->session->all_userdata();
	function make_query_ProyectoEjecutados()
	{
		$set_data = $this
			->session
			->all_userdata();
		$this
			->db
			->select($this->select_columna_ProyectoEjecutados);
		$this
			->db
			->from($this->tablaProyectoEjecutados);

		$this
			->db
			->where("p.id_proyecto = pu.id_proyecto AND u.id_usuario = pu.id_usuario AND u.id_usuario =" . $set_data['ID_Usuario']);

		if (isset($_POST["search"]["value"]) && $_POST["search"]["value"] != '')
		{
			$this
				->db
				->group_start();
			$this
				->db
				->like("p.nombreproyecto", $_POST["search"]["value"]);
			$this
				->db
				->group_end();
		}
		if (isset($_POST["order"]))
		{
			$this
				->db
				->order_by($this->order_columna_ProyectoEjecutados[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);

		}
		else
		{
			$this
				->db
				->order_by('id_proyecto', 'ASC');
		}
	}

	function get_all_data_ProyectoEjecutados()
	{
		$this
			->db
			->select($this->select_columna_ProyectoEjecutados);
		$this
			->db
			->from($this->tablaProyectoEjecutados);

		return $this
			->db
			->count_all_results();
	}

	function get_filtered_data_ProyectoEjecutados()
	{
		$this->make_query_ProyectoEjecutados();
		$query = $this
			->db
			->get();

		return $query->num_rows();
	}
	/* ----------------------------------Fin Tabla ejecutados--------------------------------*/
	public function obtenerTotalFactura($codigo)
	{

		$query = $this
			->db
			->SELECT('SUM(f.montototal)AS totalMonto')
			->from('trabajodiario t ')
			->join("proyecto pr", "pr.id_proyecto = t.id_proyecto")
			->join("factura_trabajo f", "t.id_trabajodiario=f.id_trabajodiario ")
			->where('pr.id_proyecto', $codigo)->get();
		return $query->result();
	}

	public function obtenerTotalPresupuesto($codigo)
	{
		$query = $this
			->db
			->SELECT('SUM(t.valorasignado)AS totalpresupuesto ')
			->from('trabajodiario t ')
			->join("proyecto pr", "pr.id_proyecto = t.id_proyecto")
			->where('pr.id_proyecto', $codigo)->get();
		return $query->result();
	}
	public function TotalBalance($codigo)
	{

		$totalMonto = $this->obtenerTotalFactura($codigo);
		$totalPresupuesto = $this->obtenerTotalPresupuesto($codigo);

		$totalMonto_limpio = 0;
		$totalPresupuesto_limpio = 0;

		foreach ($totalMonto as $row)
		{
			$totalMonto_limpio = $row->totalMonto; //0.2
			
		}

		foreach ($totalPresupuesto as $row)
		{
			$totalPresupuesto_limpio = $row->totalpresupuesto; //20
			
		}

		$totalBalance = intval($totalMonto_limpio) - intval($totalPresupuesto_limpio);
		$convertirPositivo = intval($totalBalance);

		return $convertirPositivo;
	}

	public function obtenerTrabajoDiario($codigo)
	{
		$query = $this
			->db
			->SELECT('t.id_trabajodiario as id, fecha_inicio, detalle, codigoservicio')
			->from('trabajodiario t ')
			->join("proyecto pr", "pr.id_proyecto = t.id_proyecto")
			->join("codigoservicio c", "t.id_codigo=c.id_codigo")
			->where('pr.id_proyecto', $codigo)->get();
		return $query->result();
	}
	public function obtenerMontoProyecto($codigo)
	{
		$query = $this
			->db
			->SELECT('montototal')
			->from('proyecto p ')
			->where('p.id_proyecto', $codigo)->get();
		return $query->result();
	}

	public function MostrarMaterialesProyecto($codigo)
	{

		$query = $this
			->db
			->SELECT('t.id_trabajodiario as id,f.montototal as monto,t.valorasignado as presupuesto,t.detalle as detalle')
			->from('trabajodiario t ')
			->join("proyecto pr", "pr.id_proyecto = t.id_proyecto")
			->join("factura_trabajo f", "t.id_trabajodiario=f.id_trabajodiario ")
			->where('t.id_proyecto', $codigo)->get();
		return $query->result();
	}
	public function MostrarPersonal($codigo)
	{

		$query = $this
			->db
			->SELECT(' pl.nombrecompleto as nombre,ap.horastrabajadas as hora ')
			->from('trabajodiario td ')
		//->join("proyecto pr", "pr.id_proyecto = td.id_proyecto")
		
			->join("personal_trabajo pt", "pt.id_trabajodiario=td.id_trabajodiario")
			->join("personal pl", "pt.id_personal=pl.id_personal")
			->join("asistencia_personal ap", "ap.id_personal=pl.id_personal")
			->where('td.id_trabajodiario', $codigo)->get();
		return $query->result();
	}
	public function MostrarDocumento($codigo)
	{

		$query = $this
			->db
			->SELECT('f.id_facturatrabajo as id,f.ubicaciondocumento as documento')
			->from('trabajodiario t ')
			->join("factura_trabajo f", "t.id_trabajodiario=f.id_trabajodiario ")
			->where('f.id_trabajodiario', $codigo)->get();
		return $query->result();
	}

	//Este es para obtener el archivo que se descargara de la bd osea se obtiene el nombre mas que nada
	//El archivo de libro de mantenciones
	function getRows($params = array())
	{
		$this
			->db
			->select('ubicaciondocumento');
		$this
			->db
			->from('factura_trabajo');
		if (!empty($params['id']))
		{
			$this
				->db
				->where('id_facturatrabajo', $params['id']);
			//get records
			$query = $this
				->db
				->get();
			$result = ($query->num_rows() > 0) ? $query->row_array() : false;
		}
		else
		{
			//set start and limit
			if (array_key_exists("start", $params) && array_key_exists("limit", $params))
			{
				$this
					->db
					->limit($params['limit'], $params['start']);
			}
			elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params))
			{
				$this
					->db
					->limit($params['limit']);
			}
			//get records
			$query = $this
				->db
				->get();
			$result = ($query->num_rows() > 0) ? $query->result_array() : false;
		}
		//return fetched data
		return $result;
	}

	public function MostrarTotalManoObra($codigo)
	{

		$query = $this
			->db
			->SELECT('pl.rut as rut,pl.nombrecompleto,SUM(ap.horastrabajadas) as horastrabajadas')
			->from('trabajodiario td ')
			->join("proyecto pr", "pr.id_proyecto = td.id_proyecto")
			->join("personal_trabajo pt", "pt.id_trabajodiario=td.id_trabajodiario")
			->join("personal pl", "pt.id_personal=pl.id_personal")
			->join("asistencia_personal ap", "ap.id_personal=pl.id_personal")
			->where('pr.id_proyecto', $codigo)->group_by('rut')
			->get();
		return $query->result();
	}
	public function MostrarTotalProyecto($codigo)
	{

		$query = $this
			->db
			->SELECT('SUM(ap.horastrabajadas) * 20000 as Total')
			->from('trabajodiario td ')
			->join("proyecto pr", "pr.id_proyecto = td.id_proyecto")
			->join("personal_trabajo pt", "pt.id_trabajodiario=td.id_trabajodiario")
			->join("personal pl", "pt.id_personal=pl.id_personal")
			->join("asistencia_personal ap", "ap.id_personal=pl.id_personal")
			->where('pr.id_proyecto', $codigo)->get();
		return $query->result();
	}

	public function TotalBalanceProyecto($codigo)
	{

		$totalMonto = $this->obtenerTotalFactura($codigo);
		$totalProyecto = $this->MostrarTotalProyecto($codigo);
		$totalMontoProyecto = $this->obtenerMontoProyecto($codigo);

		$totalMonto_limpio = 0;
		$totalProyecto_limpio = 0;
		$MontoProyecto_limpio = 0;

		foreach ($totalMonto as $row)
		{
			$totalMonto_limpio = $row->totalMonto; //0.2
			
		}

		foreach ($totalProyecto as $row)
		{
			$totalProyecto_limpio = $row->Total; //20
			
		}

		foreach ($totalMontoProyecto as $row)
		{
			$MontoProyecto_limpio = $row->montototal; //20
			
		}
		$totalBalanceProyecto = intval($MontoProyecto_limpio) - (intval($totalProyecto_limpio) + intval($totalMonto_limpio));

		return $totalBalanceProyecto;
	}

	//Archivos
	public function getRowsArchivos($id = '')
	{
		$this
			->db
			->select('id_archivo,nombre,fecha_subida');
		$this
			->db
			->from('archivo_proyecto');
		if ($id)
		{
			$this
				->db
				->where('id_archivo', $id);
			$query = $this
				->db
				->get();
			$result = $query->row_array();
		}
		else
		{
			$this
				->db
				->order_by('fecha_subida', 'desc');
			$query = $this
				->db
				->get();
			$result = $query->result_array();
		}
		return !empty($result) ? $result : false;
	}

	/*
	 * Insert file data into the database
	 * @param array the data for inserting into the table
	*/
	public function insert($data = array() , $idproyecto, $directorio)
	{
		$id_directorio = $this->obtenerIDDirectorio($directorio);
		for ($i = 0;$i < count($data);$i++)
		{
			$insert_data[] = array(
				'nombre' => $data[$i]['nombre'],
				'fecha_subida' => $data[$i]['fecha_subida'],
				'estado' => 0,
				'formato' => $data[$i]['tipo'],
				'id_directorio' => $id_directorio[0]['id_directorio'],
				'id_proyecto' => $idproyecto
			);
		}
		$insert = $this
			->db
			->insert_batch('archivo_proyecto', $insert_data);
		return $insert ? true : false;
	}

	//Obtener id de directorio
	public function obtenerIDDirectorio($directorio)
	{
		$query = $this
			->db
			->SELECT('id_directorio')
			->from('directorio_proyecto')
			->where('directorio', $directorio)->get();
		return $query->result_array();
	}

	public function ObtenerArchivos($data)
	{
		$id_directorio = $this->obtenerIDDirectorio($data['id_directorio']);
		$query = $this
			->db
			->select("ap.nombre as nombre,ap.fecha_subida as fecha_subida,ap.estado as estado,ap.formato as formato,dp.nombre as directorio") # También puedes poner * si quieres seleccionar todo
			->from("archivo_proyecto ap")
			->join("proyecto p", "p.id_proyecto = ap.id_proyecto")
			->join("directorio_proyecto dp", "ap.id_directorio = dp.id_directorio")
			->where("ap.id_proyecto", $data['id_proyecto'])->where("dp.id_directorio", $id_directorio[0]['id_directorio'])->where("ap.estado", 0)
			->limit(50)
            ->get();
		return $query->result();
	}

    public function ObtenerImagenes($data,$limit,$offset)
	{
		$id_directorio = $this->obtenerIDDirectorio($data['id_directorio']);
        $query = $this
			->db
			->select("ap.nombre as nombre,ap.fecha_subida as fecha_subida,ap.estado as estado,ap.formato as formato,dp.nombre as directorio") # También puedes poner * si quieres seleccionar todo
			->from("archivo_proyecto ap")
			->join("proyecto p", "p.id_proyecto = ap.id_proyecto")
			->join("directorio_proyecto dp", "ap.id_directorio = dp.id_directorio")
			->where("ap.id_proyecto", $data['id_proyecto'])->where("dp.id_directorio", $id_directorio[0]['id_directorio'])->where("ap.estado", 0)
			->limit($limit,$offset)
            ->get();

        $response = "<section class='content'>";
        $response .= "<div class='container-fluid'>";
        $response .= "<div class='row'>";
        $response .= "<div class='col-12'>";
        $response .= "<div class='card card-primary'>";
        $response .= "<div class='card-body'>";
        $response .= "<div>";
        $response .= "<div class='mb-2'>";
        $response .= "<a class='btn btn-secondary' href='javascript:void(0)' data-shuffle> -- </a>";
        $response .= "<div class='float-right'>";
        $response .= "<select class='custom-select' style='width: auto;' data-sortOrder>";
        $response .= "<option value='sortData'> Ordenar por fecha </option>";
        $response .= "</select>";
        $response .= "<div class='btn-group'>";
        $response .= "<input type='button' class='btn btn-default' value='Ascendente' onclick='ordenFotos(1)'/>";
        $response .= "<input type='button' class='btn btn-default' value='Descendente' onclick='ordenFotos(2)'/>";
        $response .= "</div>";
        $response .= "</div>";
        $response .= "</div>";
        $response .= "</div>";
        $response .= "<div>";
        $response .= "<div class='filter-container p-0 row'>";
        foreach ($query->result() as $row) {
            $response .= "<div class='filtr-item col-sm-4' data-category='1' data-sort='white sample'>";
            $response .= "<a href='" . base_url() . "ArchivosSubidos/" . $row->nombre . "' data-toggle='lightbox' data-footer='Fecha: " . $row->fecha_subida . "' data-title='Nombre: " . $row->nombre . "'>";
            $response .= "<img src='" . base_url() . "ArchivosSubidos/" . $row->nombre . "' class='img-fluid mb-2' alt='white sample'/>";
            $response .= "</a>";
            $response .= "<br>";
            $response .= "<input type='checkbox' name='images[]' class='select' value='" . $row->nombre . "'/>";
            $response .= "</div>";
        }
        $response .= "</div>";
        $response .= "</div>";
        $response .= "</div>";
        $response .= "</div>";
        $response .= "</div>";
        $response .= "</div>";
        $response .= "</div>";
        $response .= "</section>";
        return $response;
	}

    public function ObtenerImageness($data)
	{
		$id_directorio = $this->obtenerIDDirectorio($data['id_directorio']);
        $query = $this
			->db
			->select("ap.nombre as nombre,ap.fecha_subida as fecha_subida,ap.estado as estado,ap.formato as formato,dp.nombre as directorio") # También puedes poner * si quieres seleccionar todo
			->from("archivo_proyecto ap")
			->join("proyecto p", "p.id_proyecto = ap.id_proyecto")
			->join("directorio_proyecto dp", "ap.id_directorio = dp.id_directorio")
			->where("ap.id_proyecto", $data['id_proyecto'])
            ->where("dp.id_directorio", $id_directorio[0]['id_directorio'])
            ->where("ap.estado", 0);

        
        return $query->get();
	}

    public function ObtenerFilasImagenes($data)
	{
		$id_directorio = $this->obtenerIDDirectorio($data['id_directorio']);
		$query = $this
			->db
			->select("ap.id_archivo") # También puedes poner * si quieres seleccionar todo
			->from("archivo_proyecto ap")
			->join("proyecto p", "p.id_proyecto = ap.id_proyecto")
			->join("directorio_proyecto dp", "ap.id_directorio = dp.id_directorio")
			->where("ap.id_proyecto", $data['id_proyecto'])->where("dp.id_directorio", $id_directorio[0]['id_directorio'])->where("ap.estado", 0)
			->limit(50)
            ->get();
		return $query->num_rows();
	}

	public function ObtenerFotosOrdenadas($id_proyecto, $tipo_orden)
	{
		//1 ascendente
		$orden = "";
		if ($tipo_orden == 2)
		{
			$orden = "asc";
		}

		if ($tipo_orden == 1)
		{
			$orden = "desc";
		}
		$query = $this
			->db
			->select("ap.nombre as nombre,ap.fecha_subida as fecha_subida,ap.estado as estado,ap.formato as formato,dp.nombre as directorio") # También puedes poner * si quieres seleccionar todo
		
			->from("archivo_proyecto ap")
			->join("proyecto p", "p.id_proyecto = ap.id_proyecto")
			->join("directorio_proyecto dp", "ap.id_directorio = dp.id_directorio")
			->where("ap.id_proyecto", $id_proyecto)->where("dp.id_directorio", 2)
			->where("ap.estado", 0)
			->order_by("fecha_subida", $orden)->get();

		return $query->result();
	}

	//DATA TABLE DE ADMINISTRADOR DE ARCHIVOS
	function make_datatables_archivos($directorio, $id_proyecto)
	{
		$this->make_query_archivos($directorio, $id_proyecto);
		if ($_POST["length"] != - 1)
		{
			$this
				->db
				->limit($_POST['length'], $_POST['start']);
		}
		$query = $this
			->db
			->get();
		return $query->result();

	}

	var $tablaarchivos = array(
		"archivo_proyecto ap",
		"proyecto p",
		"directorio_proyecto dp"
	);
	var $select_columna_archivos = array(
		"ap.id_archivo as id_archivo",
		"ap.nombre as nombrearchivo",
		"ap.fecha_subida as fecha_subida",
		"ap.estado as estado",
		"ap.formato as formato",
		"dp.nombre as directorio"
	);

	var $order_columna_archivos = array(
		"ap.nombre",
		"ap.fecha_subida",
		"ap.estado",
		"ap.formato",
		"dp.nombre"
	);

	var $where_archivos = "p.id_proyecto = ap.id_proyecto AND ap.id_directorio = dp.id_directorio";

	function make_query_archivos($directorio, $id_proyecto)
	{
		$id_directorio = $this->obtenerIDDirectorio($directorio);
		$this
			->db
			->select($this->select_columna_archivos);
		$this
			->db
			->from($this->tablaarchivos);
		$this
			->db
			->where($this->where_archivos);
		$this
			->db
			->where("ap.id_proyecto", $id_proyecto);
		$this
			->db
			->where("dp.id_directorio", $id_directorio[0]['id_directorio']);
		$this
			->db
			->where("ap.estado", 0);

		if (isset($_POST["search"]["value"]) && $_POST["search"]["value"] != '')
		{
			$this
				->db
				->group_start();
			$this
				->db
				->like("ap.nombre", $_POST["search"]["value"]);
			$this
				->db
				->or_like("ap.fecha_subida", $_POST["search"]["value"]);
			$this
				->db
				->group_end();
		}
		if (isset($_POST["order"]))
		{
			$this
				->db
				->order_by($this->order_columna_archivos[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);

		}
		else
		{
			$this
				->db
				->order_by('id_archivo', 'ASC');
		}
	}

	function get_all_data_archivos()
	{
		$this
			->db
			->select($this->select_columna_archivos);
		$this
			->db
			->from($this->tablaarchivos);
		return $this
			->db
			->count_all_results();
	}

	function get_filtered_data_archivos($directorio, $id_proyecto)
	{
		$this->make_query_archivos($directorio, $id_proyecto);
		$query = $this
			->db
			->get();
		return $query->num_rows();
	}

	//Obtener el nombre del archivo a descargar
	function getNombreArchivo($lista_nombres, $select, $table)
	{
		$this
			->db
			->select($select . ' as nombre');
		$this
			->db
			->from($table);
		if (!empty($lista_nombres))
		{
			//var_dump($lista_nombres);
			$this
				->db
				->where_in($select, $lista_nombres);
			//get records
			$query = $this
				->db
				->get();
			$result = ($query->num_rows() > 0) ? $query->result() : false;
		}
		else
		{
			//set start and limit
			if (array_key_exists("start", $params) && array_key_exists("limit", $params))
			{
				$this
					->db
					->limit($params['limit'], $params['start']);
			}
			elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params))
			{
				$this
					->db
					->limit($params['limit']);
			}
			//get records
			$query = $this
				->db
				->get();
			$result = ($query->num_rows() > 0) ? $query->result_array() : false;
		}
		//return fetched data
		return $result;
	}

	//Eliminar archivos cambiando su estado
	public function eliminarArchivos($lista_nombres)
	{
		for ($i = 0;$i < count($lista_nombres);$i++)
		{
			$data[] = array(
				'nombre' => $lista_nombres[$i],
				'estado' => 1

			);

		}
		$this
			->db
			->update_batch('archivo_proyecto', $data, 'nombre');
	}

	//DATA TABLE PARA EL DETALLE DE ARCHIVOS DE UN PROYECTO
	function make_datatables_detallearchivos($id_proyecto)
	{
		$this->make_query_detallearchivos($id_proyecto);
		if ($_POST["length"] != - 1)
		{
			$this
				->db
				->limit($_POST['length'], $_POST['start']);
		}
		$query = $this
			->db
			->get();
		return $query->result();

	}

	var $tabladetallearchivos = array(
		"trabajodiario tr",
		"factura_trabajo ft",
		"proyecto p"
	);
	var $select_columna_detallearchivos = array(
		"ft.ubicaciondocumento",
		"ft.montototal",
		"ft.detalle",
		"ft.id_facturatrabajo"
	);

	var $order_columna_detallearchivos = array(
		"ft.ubicaciondocumento",
		"ft.montototal",
		"ft.detalle",
		"ft.id_facturatrabajo"
	);

	var $where_detallearchivos = "tr.id_trabajodiario = ft.id_trabajodiario AND p.id_proyecto = tr.id_proyecto";

	function make_query_detallearchivos($id_proyecto)
	{
		$this
			->db
			->select($this->select_columna_detallearchivos);
		$this
			->db
			->from($this->tabladetallearchivos);
		$this
			->db
			->where($this->where_detallearchivos);
		$this
			->db
			->where("tr.id_proyecto", $id_proyecto);

		if (isset($_POST["search"]["value"]) && $_POST["search"]["value"] != '')
		{
			$this
				->db
				->group_start();
			$this
				->db
				->like("ft.ubicaciondocumento", $_POST["search"]["value"]);
			$this
				->db
				->group_end();
		}
		if (isset($_POST["order"]))
		{
			$this
				->db
				->order_by($this->order_columna_detallearchivos[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);

		}
		else
		{
			$this
				->db
				->order_by('id_facturatrabajo', 'ASC');
		}
	}

	function get_all_data_detallearchivos()
	{
		$this
			->db
			->select($this->select_columna_detallearchivos);
		$this
			->db
			->from($this->tabladetallearchivos);
		return $this
			->db
			->count_all_results();
	}

	function get_filtered_data_detallearchivos($id_proyecto)
	{
		$this->make_query_detallearchivos($id_proyecto);
		$query = $this
			->db
			->get();
		return $query->num_rows();
	}

	//Metodo para obtener imagenes subidas de todos los trabajos diarios realizados en un proyecto
	//y mostrarlas en estado de proyecto
	public function ObtenerImagenesOperacion($data)
	{
		$query = $this
			->db
			->select("dt.id_detalletrabajo,dt.imagen") # También puedes poner * si quieres seleccionar todo
		
			->from("trabajodiario tr")
			->join("proyecto p", "p.id_proyecto = tr.id_proyecto")
			->join("detalletrabajodiario dt", "dt.id_trabajodiario = tr.id_trabajodiario")
			->where("p.id_proyecto", $data['id_proyecto'])->get();
		return $query->result();
	}

	//Metodo para obtener imagenes subidas de un trabajo diario en especifico
	//y mostrarlas en proyectos ejecutados
	public function ObtenerImagenesTrabajoDiario($data)
	{
		$query = $this
			->db
			->select("dt.id_detalletrabajo,dt.imagen") # También puedes poner * si quieres seleccionar todo
		
			->from("trabajodiario tr")
			->join("proyecto p", "p.id_proyecto = tr.id_proyecto")
			->join("detalletrabajodiario dt", "dt.id_trabajodiario = tr.id_trabajodiario")
			->where("tr.id_trabajodiario", $data['id_trabajodiario'])->get();
		return $query->result();
	}

	//Grafico inicio proyecto
	public function ObtenerBalancePorProyecto($idusuario){
		$query = $this
			->db
			->select("pr.id_proyecto,pr.nombreproyecto") # También puedes poner * si quieres seleccionar todo
			->from("proyecto pr")
			->join("proyecto_usuario pu", "pr.id_proyecto = pu.id_proyecto")
			->where("pu.estado", 0)
			->where("pu.id_usuario", $idusuario)
			->get();

        return $query->result();
        // }
	}

	public function generarEstadisticasBalancePorProyectos($idusuario){

		$lista_proyectos = $this->ObtenerBalancePorProyecto($idusuario);

		foreach($lista_proyectos as $row){
			$arraydata[] = array(
                "proyecto" => $row->nombreproyecto,
                "balance" => $this->TotalBalanceProyecto($row->id_proyecto),
            );
		}

        echo json_encode($arraydata);

    }
}

?>
