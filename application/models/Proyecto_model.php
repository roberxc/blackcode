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
          $datos_detalle = array(

              'imprevisto' => $datos['imprevisto'],
              'gasto_generales' => $datos['generales'],
              'comisiones' => $datos['comision'],
              'ingenieria' => $datos['ingenieria'],
              'utilidades' => $datos['utilidades'],
              'id_proyecto' => $id_proyectoss[0]["id_proyecto"],
          );
  
          $this->db->insert('porcentaje', $datos_detalle);
          
     }


     public function ingresarEvaluacion($data){

          $datos_detalle = array(
              
          
              'dias' => $data['dias'],
              'tipo' => $data['tipo'],
                           
            
          );
  
          $this->db->insert('detalle_evaluacion', $datos_detalle);
            $id_detalle = $this->db->insert_id();
  
          //Registro  
          $cantidad = $data["lista_cantidad"];
          $item = $data["lista_item"];
          $precio_unitario = $data["lista_unitario"];
          
		$id_proyectoss = $this->ObtenerCodigoProyecto();
         // echo $id_proyectoss[0]["id_proyecto"];
		for($count = 0; $count<count($cantidad); $count++){
			
			$cantidad_limpio = $cantidad[$count];
			$item_limpio = $item[$count];
               $unitario_limpio = $precio_unitario[$count];

			if(!empty($cantidad_limpio) && !empty($item_limpio)
			 && !empty($unitario_limpio)){
				$insert_evaluacion[] = array(
                         'cantidad' => $cantidad_limpio,
                         'item' => $item_limpio,
                         'precio_unitario' => $unitario_limpio,
                         'id_proyecto'=>$id_proyectoss[0]["id_proyecto"],
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
}
?>
