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
		return $this->db->update('egresocaja'); // gives UPDATE mytable SET field = field+1 WHERE id = 2
		
    }

	public function generarEstadisticasEgresos($fechainicial,$fechatermino){
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
     
	 $data  = $this->ObtenerEgresoSegunFecha($string);
     $arraydata = array(); 
     $arrayempty = array(); 

     if(count($data)>0){
         $diasespañol = array ();
         $montodata = array();
         foreach($data as $value){
             switch($value['week']){
                 case 'Monday':{
                     $diasespañol = ('Lunes');
                     $montodata = $value['total'];
                     break;
                 }
                 case 'Tuesday':{
                     $diasespañol = ('Martes');
                     $montodata = $value['total'];
                 break;
                 }
                 case 'Wednesday':{
                     $diasespañol = ('Miercoles');
                     $montodata = $value['total'];
                 break;
                 }
                 case 'Thursday':{
                     $diasespañol = ('Jueves');
                     $montodata = $value['total'];
                 break;
                 }
                 case 'Friday':{
                     $diasespañol = ('Viernes');
                     $montodata = $value['total'];
                 break;
                 }
                 case 'Saturday':{
                     $diasespañol = ('Sabado');
                     $montodata = $value['total'];
                 break;
                 }
                 case 'Sunday':{
                     $diasespañol = ('Domingo');     
                     $montodata = $value['total'];                    
                 break;
                 }

             }
 
             $arraydata[] = array(
                 "dia" => $diasespañol,
                 "monto" => $montodata,
             );
         }

         $dias = [];
         $montototal = [];
         $arraydata_ = array();
         foreach($arraydata as $data){
             if(!in_array($data['dia'],$montototal)){
                 $dias[$data['dia']] = $data['monto'];
                 $montototal[] = $data['dia'];
             }
             else{
                 $dias[$data['dia']] += $data['monto'];
             }
         }
         //echo json_encode($arraytest);
         $diasdata = array();
         $arraydata_ = array();
         for($i=0;$i<sizeof($arraydata);$i++){
             if($arraydata[$i]['dia'] == "Lunes"){
                 $diasdata [] = $arraydata[$i]['dia'];
             }

             if($arraydata[$i]['dia'] == "Martes"){
                 $diasdata [] = $arraydata[$i]['dia'];
             }

             if($arraydata[$i]['dia'] == "Miercoles"){
                 $diasdata [] = $arraydata[$i]['dia'];
             }

             if($arraydata[$i]['dia'] == "Jueves"){
                 $diasdata [] = $arraydata[$i]['dia'];
             }

             if($arraydata[$i]['dia'] == "Viernes"){
                 $diasdata [] = $arraydata[$i]['dia'];
             }

             if($arraydata[$i]['dia'] == "Sabado"){
                 $diasdata [] = $arraydata[$i]['dia'];
             }

             if($arraydata[$i]['dia'] == "Domingo"){
                 $diasdata [] = $arraydata[$i]['dia'];
             }
         }    
         
         $diasdata_ = array();
         $mimonto_ = array();
         $array1 = array_count_values($diasdata); // assign result to array1 variable

         $montoweek = array();
         $diasweek = array();
         $arraytest = array();
         foreach($dias as $value){
             $montoweek [] = $value;
		 }
		 
		 
		 $cont = 0;
         foreach($array1 as $key => $val) {
             if($key == "Lunes"){
				 $mimonto_ = intval($montoweek[$cont]/$val);
				 $diasdata_ = $key;
             }

             if($key == "Martes"){
                 $mimonto_ = intval($montoweek[$cont]/$val);
				 $diasdata_ = $key;
			}

             if($key == "Miercoles"){
                 $mimonto_ = intval($montoweek[$cont]/$val);
				 $diasdata_ = $key;
				}

             if($key== "Jueves"){
                 $mimonto_ = intval($montoweek[$cont]/$val);
				 $diasdata_ = $key;
				}

             if($key == "Viernes"){
                 $mimonto_ = intval($montoweek[$cont]/$val);
				 $diasdata_ = $key;
				}

             if($key == "Sabado"){
                 $mimonto_ = intval($montoweek[$cont]/$val);
				 $diasdata_ = $key;
				}

             if($key== "Domingo"){
                 $mimonto_ = intval($montoweek[$cont]/$val);
				 $diasdata_ = $key;
				}
		 
			 $cont = $cont + 1;
             $arraydata_[] = array(
				 "monto" => $mimonto_,
				 "dia" => $diasdata_
             );
         }

         echo json_encode($arraydata_);

     }else{
         $dias= array ('Lunes','Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo');
         $monto = array(0,0,0,0,0,0,0);
         $size = sizeof($dias);
         
         for($i=0;$i<$size;$i++){
             $arrayempty[] = array(
                 "dia" => $dias[$i],
                 "monto" => $monto[$i],
                 
             );
         }
         echo json_encode($arrayempty);
         
     }
	}

	public function ObtenerEgresoSegunFecha($fecha){
		$query = $this->db
				->select("DAYNAME(ci.FechaEgreso) AS week, SUM(ci.MontoEgreso) AS total") # También puedes poner * si quieres seleccionar todo
				->from("egresocaja ci")
				->join("cajachica c", "c.ID_CajaChica = ci.ID_CajaChica")
				->where("ci.Estado",1)
				->where('DATE(ci.FechaEgreso) IN ('.$fecha.')')
				->group_by('ci.FechaEgreso')
				->order_by('FIELD(DAYNAME(ci.FechaEgreso),"MONDAY","TUESDAY","WEDNESDAY","THURSDAY","FRIDAY","SATURDAY","SUNDAY")')
				->get();

		return $query->result_array();
	}

	function get_dataVentasbyArrayDias($array_week){
		$this->db->select('documentos_tributarios.FchEmis, SUM(documentos_tributarios.MntTotal) as total');
		$this->db->from('documentos_tributarios');
		$this->db->join('DETALLE_PAGO','documentos_tributarios.iddocumento_tributario=DETALLE_PAGO.iddocumento_tributario');
		$this->db->where('documentos_tributarios.idtipo_documento in (17,25,1,11)');
		$this->db->where('documentos_tributarios.anulado IS null');
		$this->db->where('documentos_tributarios.FchEmis IN ('.$array_week.')');
		$this->db->where('DETALLE_PAGO.idmedio_pago in (4,6,8)');
		$this->db->group_by('documentos_tributarios.FchEmis');
		$this->db->order_by('documentos_tributarios.FchEmis', 'ASC'); 
		$query = $this->db->get();
		return $query->result_array();
	}


}

?>