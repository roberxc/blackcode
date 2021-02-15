<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Proyecto_model extends CI_Model {

	function __construct(){
          parent::__construct();
          $this->load->database();
    }
  
     public function ingresoProyecto($datos){

          $datos_detalle = array(

              'nombreproyecto' => $datos['nombreProyecto'],
              'fecha_inicio' => $datos['fechaInicio'],
              'fecha_termino' => $datos['fechaTermino'],
              'montototal' => $datos['monto'],
          );

          $this->db->insert('proyecto', $datos_detalle);
          $id_proyecto = $this->db->insert_id();

          $set_data = $this->session->all_userdata();

          $datos_proyectousuario = array(

               'id_usuario' => $set_data['ID_Usuario'],
               'id_proyecto' => $id_proyecto,
               'estado' => 0,
           );
  
          

          $this->db->insert('proyecto_usuario', $datos_proyectousuario);
          
     }

      public function ObtenerCodigoProyecto(){
          $query = $this->db
                  ->select("id_proyecto") 
                  ->from("proyecto")
                  ->order_by("id_proyecto","DESC")
                  ->limit("1")
                  ->get();
         return $query->result_array();
        
      }

      

     function Mostrarpartidas(){
          $id_proyectos = $this->ObtenerCodigoProyecto();
          $this->db->SELECT('id_partidas, nombre');
          $this->db->from('partidas');
          $this->db->order_by('nombre', 'ASC');
          $this->db->where('id_proyecto' ,$id_proyectos[0]["id_proyecto"]);
          $query = $this->db->get();
          if($query->num_rows()>0){
          return $query->result();
          }
     }

     function MostrarpartidasEtapas($id_partida){
          $id_proyectos = $this->ObtenerCodigoProyecto();

          $query = $this->db->SELECT('e.id_etapas as id, e.nombre as nombreetapa, e.estado as estado')
          ->from('proyecto py')
          ->join("partidas p", "p.id_proyecto = py.id_proyecto")
          ->join("etapas e", "e.id_partidas = p.id_partidas")
          ->where('p.id_partidas' ,$id_partida)
          ->where('py.id_proyecto' ,$id_proyectos[0]["id_proyecto"])
          ->get();
          

          return $query->result();
     }

      public function registrarPartidasModels($data){
		
		//Registro  
		$nombre = $data["lista_partida"];
          
		$id_proyectoss = $this->ObtenerCodigoProyecto();
         // echo $id_proyectoss[0]["id_proyecto"];
		for($count = 0; $count<count($nombre); $count++){
			
			$nombre_limpio = $nombre[$count];
			

			if(!empty($nombre_limpio)/* && !empty($cantidad_limpio)
			 && !empty($valores_limpio)*/){
				$insert_partidas[] = array(
                         'nombre' => $nombre_limpio,
                         'id_proyecto'=>$id_proyectoss[0]["id_proyecto"],
				
				);
			}
		}
		return  $this->db->insert_batch('partidas',$insert_partidas);
     }

     public function ingresoPorcentaje($datos){
          $id_proyectoss = $this->ObtenerCodigoProyecto();
          $id_partida = $datos["partidas6"];
          $impre=$datos['imprevisto'];
          $gene = $datos['generales'];
          $comi = $datos['comision'];    
          $ingen = $datos['ingenieria'];  
          $util= $datos['utilidades'];  

          $porcentajeImp= $impre /100;
          $porcentajeGene= $gene /100;
          $porcentajeComi= $comi /100;
          $porcentajeIngen= $ingen /100;
          $porcentajeUtil= $util /100;
          
          $datos_detalle = array(

              'imprevisto' => $porcentajeImp,
              'gasto_generales' => $porcentajeGene,
              'comisiones' =>  $porcentajeComi,
              'ingenieria' => $porcentajeIngen,
              'utilidades' => $porcentajeUtil,
              'id_partidas' => $id_partida,
          );
  
          $this->db->insert('porcentaje', $datos_detalle);
          
     }
     public function ingresoFleteTraslado($datos){
          $id_partida = $datos["partidas7"];
          $valor=$datos['flete_Traslado'];

          $datapartida['id_partida'] = $id_partida;
          
          $datos_fleteTraslado = array(

              'valor' => $valor,
              'id_partidas' => $id_partida,
          );

  
          $this->db->insert('flete_traslado', $datos_fleteTraslado);
          
          $subtotalPartida=$this->obtenerResumen($datapartida);
          $imprevistos=$this->obtenerImprevisto($datapartida);
          $instalacion=$this ->obtenerInstalacion($datapartida);
          $supervision=$this->obtenerSupervision($datapartida);
          $gastoGeneral=$this->totalGastoGeneral($datapartida);
          $comision=$this->totalComisiones($datapartida);
          $ingenieria=$this->totalIngenieria($datapartida);
          $utilidades=$this->totalUtilidades($datapartida);
      
          //---------------------

          $subtotalpartida_limpio = 0;
          $imprevistos_limpio = 0;
          $instalacion_limpio = 0;
          $supervision_limpio = 0;
          
        
      
          foreach($subtotalPartida as $row){
              $subtotalPartida_limpio = $row->SubTotal; //20
          }
      
          foreach($imprevistos as $row){
              $imprevistos_limpio = $row->imprevisto; //0.1
          }
      
          foreach($instalacion as $row){
              $instalacion_limpio = $row->instalacion; //20
          }
      
          foreach($supervision as $row){
              $supervision_limpio = $row->supervision; //20
          }
      
          
          $totalImprevisto = intval($subtotalPartida_limpio) * (float)$imprevistos_limpio; //Imprevistos 
          //echo"Total imprevisto ".$totalImprevisto."\n";
          
      
          $costoMaterial= intval($subtotalPartida_limpio) + intval($totalImprevisto); 
          //echo"Costo material ".$costoMaterial."\n";
          
          
          $valorEquipamiento=intval($costoMaterial) + intval($instalacion_limpio) + intval($supervision_limpio);
          //echo"Valor equipamiento ".$valorEquipamiento."\n";
          
          $precioSugeridoVenta=intval($valor)+intval($valorEquipamiento)+ (float)$gastoGeneral+(float)$comision+(float)$ingenieria+(float)$utilidades;
        

          $this->db->set('precio_sugerido',$precioSugeridoVenta);
          $this->db->where('id_partidas', $id_partida);
          return $this->db->update('partidas');

     }


     public function ingresarSupervision($data){

          $datos_detalle = array(
              
          
              'dias' => $data['dias'],
              'tipo' => $data['tipo'],
                           
            
          );
  
          $this->db->insert('detalle_evaluacion', $datos_detalle);
            $id_detalle = $this->db->insert_id();
  
          //Registro  
          $id_partida = $data["partidas4"];
          $cantidad = $data["lista_cantidad"];
          $item = $data["lista_item"];
          $precio_unitario = $data["lista_unitario"];
          
		$id_proyectoss = $this->ObtenerCodigoProyecto();
         // echo $id_proyectoss[0]["id_proyecto"];
		for($count = 0; $count<count($cantidad); $count++){
			
			$cantidad_limpio = $cantidad[$count];
			$item_limpio = $item[$count];
               $unitario_limpio = $precio_unitario[$count];
               $total = $cantidad_limpio * $unitario_limpio;

			if(!empty($cantidad_limpio) && !empty($item_limpio)
			 && !empty($unitario_limpio)){
				$insert_evaluacion[] = array(
                         'cantidad' => $cantidad_limpio,
                         'item' => $item_limpio,
                         'precio_unitario' => $unitario_limpio,
                         'total' => $total,
                         'id_partidas'=>$id_partida,
                         'id_detalle'=>$id_detalle,
				);
			}
		}
		return  $this->db->insert_batch('evaluacion',$insert_evaluacion);
     }
     public function ingresarInstalacion($data){

          $datos_detalle = array(
              
          
              'dias' => $data['dias'],
              'tipo' => $data['tipo'],
                           
            
          );
  
          $this->db->insert('detalle_evaluacion', $datos_detalle);
            $id_detalle = $this->db->insert_id();
  
          //Registro  
          $id_partida = $data["partidas5"];
          $cantidad = $data["lista_cantidad"];
          $item = $data["lista_item"];
          $precio_unitario = $data["lista_unitario"];
          
		$id_proyectoss = $this->ObtenerCodigoProyecto();
         // echo $id_proyectoss[0]["id_proyecto"];
		for($count = 0; $count<count($cantidad); $count++){
			
			$cantidad_limpio = $cantidad[$count];
			$item_limpio = $item[$count];
               $unitario_limpio = $precio_unitario[$count];
               $total = $cantidad_limpio * $unitario_limpio;

			if(!empty($cantidad_limpio) && !empty($item_limpio)
			 && !empty($unitario_limpio)){
				$insert_evaluacion[] = array(
                         'cantidad' => $cantidad_limpio,
                         'item' => $item_limpio,
                         'precio_unitario' => $unitario_limpio,
                         'total' => $total,
                         'id_partidas'=>$id_partida,
                         'id_detalle'=>$id_detalle,
				);
			}
		}
		return  $this->db->insert_batch('evaluacion',$insert_evaluacion);
     }


     public function listaProyectos(){
		$query = $this->db
				->select("*") # También puedes poner * si quieres seleccionar todo
				->from("proyecto")
				->get();
		
		return $query->result();
    }

     

     public function ingresarEtapas($data){
		
		//Registro  
          $id_partida = $data["partida2"];
          $estado = $data["estado"];
          $nombre = $data["lista_etapa"];
          
		
         // echo $id_proyectoss[0]["id_proyecto"];
		for($count = 0; $count<count($nombre); $count++){
			
			$nombre_limpio = $nombre[$count];

			if(!empty($nombre_limpio)){
				$insert_etapas[] = array(
                         'nombre' => $nombre_limpio,
                         'estado' => $estado,
                         'id_partidas' => $id_partida,
				
				);
			}
		}
		return  $this->db->insert_batch('etapas',$insert_etapas);
     }

     public function ingresarDespiece($data){
		
          //Registro  
         
          $id_etapa = $data["idEtapa"];
          $cantidad = $data["lista_cantidad"];
          $item = $data["lista_item"];
          $precio = $data["lista_precio"];

          $datos_fletes = array(
              
          
               'id_etapas' => $data['idEtapa'],
               'valor' => $data['valorFlete'],
                            
             
           );
   
           $this->db->insert('fletes', $datos_fletes);

           $this->actualizarEstadoEtapa($id_etapa);
		
         // echo $id_proyectoss[0]["id_proyecto"];
		for($count = 0; $count<count($cantidad); $count++){
			
               $cantidad_limpio = $cantidad[$count];
               $item_limpio = $item[$count];
               $precio_limpio = $precio[$count];
               $total = $cantidad_limpio * $precio_limpio;

			if(!empty($cantidad_limpio) && !empty($item_limpio)
               && !empty($precio_limpio)){
				$insert_despiece[] = array(
                         'cantidad' => $cantidad_limpio,
                         'item' => $item_limpio,
                         'precio_unitario' => $precio_limpio,
                         'total' => $total,
                         'id_etapas'=>$id_etapa,
				
				);
			}
		}
		return  $this->db->insert_batch('despiece',$insert_despiece);
     }

     public function ingresoflete($datos){

          $datos_flete = array(

              'id_etapas' => $datos['id_etapa'],
              'valor' => $datos['valor'],
              
          );
  
          $this->db->insert('fletes', $datos_flete);
          
     }

     function obtenerResumen($id_partida){
          $sql = "SELECT sum(total) SubTotal FROM (SELECT total FROM despiece d, partidas p,etapas e WHERE p.id_partidas=e.id_partidas AND e.id_etapas = d.id_etapas AND e.id_partidas= ".$id_partida["id_partida"]." union all SELECT valor FROM  partidas p, fletes f,etapas e WHERE p.id_partidas=e.id_partidas AND e.id_etapas=f.id_etapas AND e.id_partidas= ".$id_partida["id_partida"]." )x";
          $query = $this->db->query($sql);  

          return $query->result();
     }

     public function obtenerImprevisto($id_partida){
          $id_proyectoss = $this->ObtenerCodigoProyecto();
          $query = $this->db->SELECT('imprevisto')
          ->from('partidas p')
          ->join("proyecto pr", "pr.id_proyecto = p.id_proyecto")
          ->join("porcentaje po", "p.id_partidas=po.id_partidas")
          ->where('pr.id_proyecto' ,$id_proyectoss[0]['id_proyecto'])
          ->where('p.id_partidas' ,$id_partida["id_partida"])
          ->get();
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
     public function obtenerInstalacion($id_partida){
          $id_proyectoss = $this->ObtenerCodigoProyecto();
         // $instalacion='Instalacion';
          $query = $this->db->SELECT('sum(total)*dias as instalacion')
          ->from('partidas p')
          ->join("proyecto pr", "pr.id_proyecto = p.id_proyecto")
          ->join("evaluacion e", "p.id_partidas=e.id_partidas")
          ->join("detalle_evaluacion d", "e.id_detalle=d.id_detalle")
          ->where('pr.id_proyecto' ,$id_proyectoss[0]['id_proyecto'])
          ->where('p.id_partidas' ,$id_partida["id_partida"])
          ->where('d.tipo',"Instalacion")
          ->get();
          return $query->result();
     }
     public function obtenerSupervision($id_partida){
          $id_proyectoss = $this->ObtenerCodigoProyecto();
          
          $query = $this->db->SELECT('sum(total)*dias as supervision')
          ->from('partidas p')
          ->join("proyecto pr", "pr.id_proyecto = p.id_proyecto")
          ->join("evaluacion e", "p.id_partidas=e.id_partidas")
          ->join("detalle_evaluacion d", "e.id_detalle=d.id_detalle")
          ->where('pr.id_proyecto' ,$id_proyectoss[0]['id_proyecto'])
          ->where('p.id_partidas' ,$id_partida["id_partida"])
          ->where('d.tipo',"Supervision")
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

     public function obtenerPorcentaje($id_partida){
          $id_proyectoss = $this->ObtenerCodigoProyecto();
          
          $query = $this->db->SELECT('comisiones,ingenieria,utilidades')
          ->from('partidas p')
          ->join("proyecto pr", "pr.id_proyecto = p.id_proyecto")
          ->join("porcentaje po", "p.id_partidas=po.id_partidas")
          ->where('pr.id_proyecto' ,$id_proyectoss[0]['id_proyecto'])
          ->where('p.id_partidas' ,$id_partida["id_partida"])
          ->get();
          return $query->result();
     }

     public function actualizarEstadoEtapa($idetapa){
		$this->db->set('estado',1);
        $this->db->where('id_etapas', $idetapa);
		return $this->db->update('etapas');
    }

    public function obtenerFleteTraslado($id_partida){
     $id_proyectoss = $this->ObtenerCodigoProyecto();
     
     $query = $this->db->SELECT('valor')
     ->from('partidas p')
     ->join("proyecto pr", "pr.id_proyecto = p.id_proyecto")
     ->join("flete_traslado f", "p.id_partidas=f.id_partidas")
     ->where('pr.id_proyecto' ,$id_proyectoss[0]['id_proyecto'])
     ->where('p.id_partidas' ,$id_partida["id_partida"])
     ->get();
     return $query->result();
}
/************************************************************************************ */
public function obtenerGastoGeneral($id_partida){
    $id_proyectoss = $this->ObtenerCodigoProyecto();
   
    $query = $this->db->SELECT('gasto_generales')
    ->from('partidas p')
    ->join("proyecto pr", "pr.id_proyecto = p.id_proyecto")
    ->join("porcentaje pc", "p.id_partidas=pc.id_partidas")
    ->where('pr.id_proyecto' ,$id_proyectoss[0]['id_proyecto'])
    ->where('p.id_partidas' ,$id_partida["id_partida"])
    ->get();
    return $query->result();
        
}
    public function totalGastoGeneral($id_partida){

        $gastoGeneral =$this->obtenerGastoGeneral($id_partida);

        $subtotalPartida=$this->obtenerResumen($id_partida);
        $imprevistos=$this->obtenerImprevisto($id_partida);
        $instalacion=$this ->obtenerInstalacion($id_partida);
        $supervision=$this->obtenerSupervision($id_partida);

        //---------------------
        $gastogeneral_limpio = 0;
        $subtotalpartida_limpio = 0;
        $imprevistos_limpio = 0;
        $instalacion_limpio = 0;
        $supervision_limpio = 0;

        foreach($gastoGeneral as $row){
           $gastogeneral_limpio = $row->gasto_generales; //0.2
        }

        foreach($subtotalPartida as $row){
            $subtotalPartida_limpio = $row->SubTotal; //20
        }

        foreach($imprevistos as $row){
            $imprevistos_limpio = $row->imprevisto; //0.1
        }

        foreach($instalacion as $row){
            $instalacion_limpio = $row->instalacion; //20
        }

        foreach($supervision as $row){
            $supervision_limpio = $row->supervision; //20
        }

        
        $totalImprevisto = intval($subtotalPartida_limpio) * (float)$imprevistos_limpio; //Imprevistos 
        //echo"Total imprevisto ".$totalImprevisto."\n";
        

        $costoMaterial= intval($subtotalPartida_limpio) + intval($totalImprevisto); 
        //echo"Costo material ".$costoMaterial."\n";
        
        
        $valorEquipamiento=intval($costoMaterial) + intval($instalacion_limpio) + intval($supervision_limpio);
        //echo"Valor equipamiento ".$valorEquipamiento."\n";

        $totalgastogeneral=intval($valorEquipamiento) * (float)$gastogeneral_limpio;
        //echo"Total gasto general ".$totalgastogeneral."\n";
        return $totalgastogeneral;
    }


public function obtenerComisiones($id_partida){
    $id_proyectoss = $this->ObtenerCodigoProyecto();
    
    $query = $this->db->SELECT('comisiones')
    ->from('partidas p')
    ->join("proyecto pr", "pr.id_proyecto = p.id_proyecto")
    ->join("porcentaje pc", "p.id_partidas=pc.id_partidas")
    ->where('pr.id_proyecto' ,$id_proyectoss[0]['id_proyecto'])
    ->where('p.id_partidas' ,$id_partida["id_partida"])
    ->get();
    return $query->result();
}
public function totalComisiones($id_partida){

    $comision =$this->obtenerComisiones($id_partida);

    $subtotalPartida=$this->obtenerResumen($id_partida);
    $imprevistos=$this->obtenerImprevisto($id_partida);
    $instalacion=$this ->obtenerInstalacion($id_partida);
    $supervision=$this->obtenerSupervision($id_partida);

    //---------------------
    $comision_limpio = 0;
    $subtotalpartida_limpio = 0;
    $imprevistos_limpio = 0;
    $instalacion_limpio = 0;
    $supervision_limpio = 0;

    foreach($comision as $row){
       $comision_limpio = $row->comisiones; //0.2
    }

    foreach($subtotalPartida as $row){
        $subtotalPartida_limpio = $row->SubTotal; //20
    }

    foreach($imprevistos as $row){
        $imprevistos_limpio = $row->imprevisto; //0.1
    }

    foreach($instalacion as $row){
        $instalacion_limpio = $row->instalacion; //20
    }

    foreach($supervision as $row){
        $supervision_limpio = $row->supervision; //20
    }

    
    $totalImprevisto = intval($subtotalPartida_limpio) * (float)$imprevistos_limpio; //Imprevistos 
    //echo"Total imprevisto ".$totalImprevisto."\n";
    

    $costoMaterial= intval($subtotalPartida_limpio) + intval($totalImprevisto); 
    //echo"Costo material ".$costoMaterial."\n";
    
    
    $valorEquipamiento=intval($costoMaterial) + intval($instalacion_limpio) + intval($supervision_limpio);
    //echo"Valor equipamiento ".$valorEquipamiento."\n";

    $totalcomision=intval($valorEquipamiento) * (float)$comision_limpio;
    //echo"Total gasto general ".$totalcomision."\n";
    return $totalcomision;

}
public function obtenerIngenieria($id_partida){
    $id_proyectoss = $this->ObtenerCodigoProyecto();
    
    $query = $this->db->SELECT('ingenieria')
    ->from('partidas p')
    ->join("proyecto pr", "pr.id_proyecto = p.id_proyecto")
    ->join("porcentaje pc", "p.id_partidas=pc.id_partidas")
    ->where('pr.id_proyecto' ,$id_proyectoss[0]['id_proyecto'])
    ->where('p.id_partidas' ,$id_partida["id_partida"])
    ->get();
    return $query->result();
}
public function totalIngenieria($id_partida){

    $ingenieria =$this->obtenerIngenieria($id_partida);

    $subtotalPartida=$this->obtenerResumen($id_partida);
    $imprevistos=$this->obtenerImprevisto($id_partida);
    $instalacion=$this ->obtenerInstalacion($id_partida);
    $supervision=$this->obtenerSupervision($id_partida);

    //---------------------
    $ingenieria_limpio = 0;
    $subtotalpartida_limpio = 0;
    $imprevistos_limpio = 0;
    $instalacion_limpio = 0;
    $supervision_limpio = 0;

    foreach($ingenieria as $row){
       $ingenieria_limpio = $row->ingenieria; //0.2
    }

    foreach($subtotalPartida as $row){
        $subtotalPartida_limpio = $row->SubTotal; //20
    }

    foreach($imprevistos as $row){
        $imprevistos_limpio = $row->imprevisto; //0.1
    }

    foreach($instalacion as $row){
        $instalacion_limpio = $row->instalacion; //20
    }

    foreach($supervision as $row){
        $supervision_limpio = $row->supervision; //20
    }

    
    $totalImprevisto = intval($subtotalPartida_limpio) * (float)$imprevistos_limpio; //Imprevistos 
    //echo"Total imprevisto ".$totalImprevisto."\n";
    

    $costoMaterial= intval($subtotalPartida_limpio) + intval($totalImprevisto); 
    //echo"Costo material ".$costoMaterial."\n";
    
    
    $valorEquipamiento=intval($costoMaterial) + intval($instalacion_limpio) + intval($supervision_limpio);
    //echo"Valor equipamiento ".$valorEquipamiento."\n";

    $totalingenieria=intval($valorEquipamiento) * (float)$ingenieria_limpio;
    //echo"Total gasto ingenieria ".$totalingenieria."\n";
    return $totalingenieria;
}

public function obtenerUtilidades($id_partida){
    $id_proyectoss = $this->ObtenerCodigoProyecto();
    
    $query = $this->db->SELECT('utilidades')
    ->from('partidas p')
    ->join("proyecto pr", "pr.id_proyecto = p.id_proyecto")
    ->join("porcentaje pc", "p.id_partidas=pc.id_partidas")
    ->where('pr.id_proyecto' ,$id_proyectoss[0]['id_proyecto'])
    ->where('p.id_partidas' ,$id_partida["id_partida"])
    ->group_by('utilidades')
    ->get();
    return $query->result();
}

public function totalUtilidades($id_partida){

    $utilidades =$this->obtenerUtilidades($id_partida);

    $subtotalPartida=$this->obtenerResumen($id_partida);
    $imprevistos=$this->obtenerImprevisto($id_partida);
    $instalacion=$this ->obtenerInstalacion($id_partida);
    $supervision=$this->obtenerSupervision($id_partida);

    //---------------------
    $utilidades_limpio = 0;
    $subtotalpartida_limpio = 0;
    $imprevistos_limpio = 0;
    $instalacion_limpio = 0;
    $supervision_limpio = 0;

    foreach($utilidades as $row){
       $utilidades_limpio = $row->utilidades; //0.2
    }

    foreach($subtotalPartida as $row){
        $subtotalPartida_limpio = $row->SubTotal; //20
    }

    foreach($imprevistos as $row){
        $imprevistos_limpio = $row->imprevisto; //0.1
    }

    foreach($instalacion as $row){
        $instalacion_limpio = $row->instalacion; //20
    }

    foreach($supervision as $row){
        $supervision_limpio = $row->supervision; //20
    }

    //echo"Supervision model: ".$supervision_limpio;
    
    $totalImprevisto = intval($subtotalPartida_limpio) * (float)$imprevistos_limpio; //Imprevistos 
    //echo"Total imprevisto ".$totalImprevisto."\n";
    

    $costoMaterial= intval($subtotalPartida_limpio) + intval($totalImprevisto); 
    //echo"Costo material ".$costoMaterial."\n";
    
    
    $valorEquipamiento=intval($costoMaterial) + intval($instalacion_limpio) + intval($supervision_limpio);
    //echo"Valor equipamiento ".$valorEquipamiento."\n";

    $totalUtilidades=intval($valorEquipamiento) * (float)$utilidades_limpio;
    //echo"Total utilidades ".$totalUtilidades."\n";
    return $totalUtilidades;
}
/*********************************************************************************************** */
public function obtenerPrecioSugeridoProyecto(){

    $id_proyectoss = $this->ObtenerCodigoProyecto();
    
    $query = $this->db->SELECT('round (sum(precio_sugerido)) as PrecioSugerido')
    ->from('partidas p')
    ->join("proyecto pr", "pr.id_proyecto = p.id_proyecto")
    ->where('pr.id_proyecto' ,$id_proyectoss[0]['id_proyecto'])
    ->get();
    return $query->result();

   /**SELECT round (sum(precio_sugerido)) FROM partidas p,proyecto pr WHERE pr.id_proyecto=p.id_proyecto and pr.id_proyecto=34 */


}

/* ----------------------------------Tabla Estado--------------------------------*/
//Tabla de con buscador ordenes
function make_datatables_EstadoProyecto(){
     $this->make_query_EstadoProyecto();
     if ($_POST["length"] != - 1){
         $this->db->limit($_POST['length'], $_POST['start']);
     }
     $query = $this->db->get();
     return $query->result();

 }
 var $tablaEstadoProyecto = array(
     "proyecto p",
     "usuario u",
     "proyecto_usuario pu",
 );
 var $select_columna_EstadoProyecto = array(
       "p.id_proyecto",
       "p.nombreproyecto",
     "u.nombre_completo as nombreusuario",
     "p.fecha_inicio",
     "p.fecha_termino",
     "pu.estado",
 );

 var $order_columna_EstadoProyecto = array(
     "p.id_proyecto",
     "p.nombreproyecto",
     "u.nombre_completo ",
     "p.fecha_inicio",
     "p.fecha_termino",
     "pu.estado",
 );

 var $where_EstadoProyecto = "p.id_proyecto = pu.id_proyecto AND u.id_usuario = pu.id_usuario";

 function make_query_EstadoProyecto(){
     $this->db->select($this->select_columna_EstadoProyecto);
     $this->db->from($this->tablaEstadoProyecto);
     $this->db->where($this->where_EstadoProyecto);

     if (isset($_POST["search"]["value"]) && $_POST["search"]["value"] != ''){
         $this->db->group_start();
         $this->db->like("p.nombreproyecto", $_POST["search"]["value"]);
         $this->db->group_end();
     }
     if (isset($_POST["order"])){
         $this->db->order_by($this->order_columna_EstadoProyecto[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
     
     }else{
         $this->db->order_by('id_proyecto', 'ASC');
     }
 }

 function get_all_data_EstadoProyecto(){
     $this->db->select($this->select_columna_EstadoProyecto);
     $this->db->from($this->tablaEstadoProyecto);


     return $this->db->count_all_results();
 }

 function get_filtered_data_EstadoProyecto(){
     $this->make_query_EstadoProyecto();
     $query = $this->db->get();

     return $query->num_rows();
 }
/* ----------------------------------Fin Tabla Estado--------------------------------*/
/* ----------------------------------Tabla Proyecto ejecutados--------------------------------*/
//Tabla de con buscador ordenes
function make_datatables_ProyectoEjecutados(){
     $this->make_query_ProyectoEjecutados();
     if ($_POST["length"] != - 1){
         $this->db->limit($_POST['length'], $_POST['start']);
     }
     $query = $this->db->get();
     return $query->result();

 }
 var $tablaProyectoEjecutados = array(
     "proyecto p",
     "usuario u",
     "proyecto_usuario pu",
 );
 var $select_columna_ProyectoEjecutados = array(
       "p.id_proyecto",
       "p.nombreproyecto",

     "p.fecha_inicio",
     "p.fecha_termino",
     "pu.estado",
 );

 var $order_columna_ProyectoEjecutados = array(
     "p.id_proyecto",
     "p.nombreproyecto",
   
     "p.fecha_inicio",
     "p.fecha_termino",
     "pu.estado",
 );
 //$set_data = $this->session->all_userdata();

 function make_query_ProyectoEjecutados(){
     $set_data = $this->session->all_userdata();
     $this->db->select($this->select_columna_ProyectoEjecutados);
     $this->db->from($this->tablaProyectoEjecutados);

     $this->db->where("p.id_proyecto = pu.id_proyecto AND u.id_usuario = pu.id_usuario AND u.id_usuario =".$set_data['ID_Usuario']);

     if (isset($_POST["search"]["value"]) && $_POST["search"]["value"] != ''){
         $this->db->group_start();
         $this->db->like("p.nombreproyecto", $_POST["search"]["value"]);
         $this->db->group_end();
     }
     if (isset($_POST["order"])){
         $this->db->order_by($this->order_columna_ProyectoEjecutados[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
     
     }else{
         $this->db->order_by('id_proyecto', 'ASC');
     }
 }

 function get_all_data_ProyectoEjecutados(){
     $this->db->select($this->select_columna_ProyectoEjecutados);
     $this->db->from($this->tablaProyectoEjecutados);


     return $this->db->count_all_results();
 }

 function get_filtered_data_ProyectoEjecutados(){
     $this->make_query_ProyectoEjecutados();
     $query = $this->db->get();

     return $query->num_rows();
 }
/* ----------------------------------Fin Tabla Estado--------------------------------*/
}
?>
