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

    /* DATATABLE DE INGRESOS CAJA CHICA */
    function make_datatables_cajaingresos(){
        $this->make_query_cajaingresos();
        if ($_POST["length"] != - 1){
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();

    }

    var $tablacajaingresos = array(
        "ingresocaja i",
        "cajachica c",
    );
    var $select_columna_cajaingresos = array(
		"i.id_ingresocaja as id",
		"i.fechaingreso as fechaingreso",
        "i.montoingreso as montoingreso",
    );

    var $order_columna_cajaingresos = array(
        "i.id_ingresocaja",
		"i.fechaingreso",
        "i.montoingreso",
    );

    var $where_cajaingresos = "c.id_cajachica = i.id_cajachica AND i.estado = 0";

    function make_query_cajaingresos(){
        $this->db->select($this->select_columna_cajaingresos);
        $this->db->from($this->tablacajaingresos);
        $this->db->where($this->where_cajaingresos);

        if (isset($_POST["search"]["value"]) && $_POST["search"]["value"] != ''){
            $this->db->like("i.fechaingreso", $_POST["search"]["value"]);
        }
        if (isset($_POST["order"])){
            $this->db->order_by($this->order_columna_cajaingresos[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        
        }else{
            $this->db->order_by('i.id_ingresocaja', 'ASC');
        }
    }

    function get_all_data_cajaingresos(){
        $this->db->select($this->select_columna_cajaingresos);
        $this->db->from($this->tablacajaingresos);
        return $this->db->count_all_results();
    }

    function get_filtered_data_cajaingresos(){
        $this->make_query_cajaingresos();
        $query = $this->db->get();
        return $query->num_rows();
    }
    /*---------------------------------------------------------*/

    /* DATATABLE DE EGRESOS CAJA CHICA */
    function make_datatables_cajaegresos(){
        $this->make_query_cajaegresos();
        if ($_POST["length"] != - 1){
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();

    }

    var $tablacajaegresos = array(
        "egresocaja ci",
        "cajachica c",
        "destinatario t",
    );
    var $select_columna_cajaegresos = array(
        "t.id_destinatario as iddestinatario",
        "ci.id_egresocaja as id",
		"ci.fechaegreso as fechaegreso",
		"ci.montoegreso as montoegreso",
        "t.nombredestinatario as destinatario",
        "ci.detalle as detalle",
        "ci.estado as estado",
    );

    var $order_columna_cajaegresos = array(
		"ci.fechaegreso",
		"ci.MontoEgreso",
        "t.nombredestinatario",
        "ci.detalle",
        "ci.estado",
    );

    var $where_cajaegresos = "ci.ID_Destinatario = t.ID_Destinatario AND c.ID_CajaChica = ci.ID_CajaChica AND ci.estadoreg = 0";

    function make_query_cajaegresos(){
        $this->db->select($this->select_columna_cajaegresos);
        $this->db->from($this->tablacajaegresos);
        $this->db->where($this->where_cajaegresos);

        if (isset($_POST["search"]["value"]) && $_POST["search"]["value"] != ''){
            $this->db->group_start();
            $this->db->like("t.nombredestinatario", $_POST["search"]["value"]);
            $this->db->or_like("ci.fechaegreso", $_POST["search"]["value"]);
            $this->db->group_end();
        }
        if (isset($_POST["order"])){
            $this->db->order_by($this->order_columna_cajaegresos[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        
        }else{
            $this->db->order_by('id_orden', 'ASC');
        }
    }

    function get_all_data_cajaegresos(){
        $this->db->select($this->select_columna_cajaegresos);
        $this->db->from($this->tablacajaegresos);
        return $this->db->count_all_results();
    }

    function get_filtered_data_cajaegresos(){
        $this->make_query_cajaegresos();
        $query = $this->db->get();
        return $query->num_rows();
    }
    /*---------------------------------------------------------*/
	
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
		$query = $this->db
				->select_sum("balance") # También puedes poner * si quieres seleccionar todo
				->from("cajachica")
				->where("estado",0)
				->get();
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

    public function ObtenerDetalleCostoFijo($idcostofijo){
		$query = $this->db
				->select("tc.id_tipo,c.id_costofijos,c.fecha,c.valor,c.detalle,tc.nombre") # También puedes poner * si quieres seleccionar todo
				->from("costosfijos c")
                ->join("tipocostosfijos tc","c.id_tipo = tc.id_tipo")
				->where("c.id_costofijos",$idcostofijo)
				->get();
        // if (count($query->result()) > 0) {
        return $query->result();
        // }
	}

    public function ObtenerTotalCostosFijos(){
		$query = $this->db
				->select("SUM(valor) as total") # También puedes poner * si quieres seleccionar todo
				->from("costosfijos c")
                ->where("estado",0)
				->get();
        // if (count($query->result()) > 0) {
        return $query->result_array();
        // }
	}

    public function updateCostosFijos($data){
        $dataproveedor = array(
            'fecha' => $data['fecha'],
            'valor' => $data['valor'],
            'detalle' => $data['detalle'],
            'id_tipo' => $data['id_tipo'],
        );
        $this->db->where('id_costofijos', $data['idcostofijo']);
		return $this->db->update('costosfijos',$dataproveedor);
    }

    //Costos fijos
    //Año anterior
    public function ObtenerMontoTotalPorMesesLast($yearlast){
        $meses = array(1,2,3,4,5,6,7,8,9,10,11,12);
		$query = $this->db
				->select("SUM(c.valor) as montototal, MONTH(c.fecha) as mes") # También puedes poner * si quieres seleccionar todo
				->from("costosfijos c")
				->where_in("MONTH(fecha)",$meses)
                ->where_in("YEAR(fecha)",$yearlast)
                ->where("estado",0)
                ->group_by("mes")
				->get();
        // if (count($query->result()) > 0) {
        return $query->result_array();
        // }
	}

    //Año actual
    public function ObtenerMontoTotalPorMesesCurrent($yearcurrent){
        $meses = array(1,2,3,4,5,6,7,8,9,10,11,12);
		$query = $this->db
				->select("SUM(c.valor) as montototal, MONTH(c.fecha) as mes") # También puedes poner * si quieres seleccionar todo
				->from("costosfijos c")
				->where_in("MONTH(fecha)",$meses)
                ->where("YEAR(fecha)",$yearcurrent)
                ->where("estado",0)
                ->group_by("mes")
				->get();
        // if (count($query->result()) > 0) {
        return $query->result_array();
        // }
	}

    public function generarEstadisticasCostosFijos($yearlast,$yearcurrent){
        //Año actual
        $datacostosfijoscurrent = $this->ObtenerMontoTotalPorMesesCurrent($yearcurrent);

        //Año anterior
        $datacostosfijoslast = $this->ObtenerMontoTotalPorMesesLast($yearlast);
        //------
        $mesesespañol_current = array ();
        $montodata_current = array();

        //------
        $mesesespañol_last = array ();
        $montodata_last = array();

        //Abreviacion de meses
        $meses = array('EN','FEB','MAR','ABR','MAY','JUN','JUL','AGO','SEP','OCT','NOV','DIC');
        //Numero de meses
        $mesesnumber = array(1,2,3,4,5,6,7,8,9,10,11,12);
        //Tamaño de data mysql
        $size_current = count($datacostosfijoscurrent);

        $size_last = count($datacostosfijoslast);
        //----------------------------------------------------------------------------
        //Año actual
        //----------------------------------------------------------------------------
        //Llenado de meses con valores
        for($i = 0;$i<count($meses);$i++){
            if($i < $size_current){
                if (in_array($datacostosfijoscurrent[$i]['mes'], $mesesnumber)) {
                    $mesesespañol_current []= $meses[$datacostosfijoscurrent[$i]['mes']-1];
                    $montodata_current [] = intval($datacostosfijoscurrent[$i]['montototal']);
                }
            }

            if($i < $size_last){
                if (in_array($datacostosfijoslast[$i]['mes'], $mesesnumber)) {
                    $mesesespañol_last [] = $meses[$datacostosfijoslast[$i]['mes']-1];
                    $montodata_last [] = intval($datacostosfijoslast[$i]['montototal']);
                }
            }
        }

        //Llenado de meses sin valores
        for($x=0;$x<count($meses);$x++){
            if(in_array($meses[$x], $mesesespañol_current) == false){
                $mesesespañol_current [] = $meses[$x];
                $montodata_current [] = 0; 
            }
        }

        for($x=0;$x<count($meses);$x++){
            if(in_array($meses[$x], $mesesespañol_last) == false){
                $mesesespañol_last [] = $meses[$x];
                $montodata_last [] = 0; 
            }
        }

        //ARRAY CON DATA
        $mesesespañol_currentdata = array();
        $montodata_currentdata = array();

        $mesesespañol_lastdata = array();
        $montodata_lastdata = array();

        for($p=0;$p<count($mesesespañol_current);$p++){
            $mesesespañol_currentdata = $mesesespañol_current[$p];
            $montodata_currentdata = $montodata_current[$p];

            $mesesespañol_lastdata = $mesesespañol_last[$p];
            $montodata_lastdata = $montodata_last[$p];

            $arraydata[] = array(
                "meses_current" => $mesesespañol_currentdata,
                "monto_current" => $montodata_currentdata,
                "meses_last" => $mesesespañol_lastdata,
                "monto_last" => $montodata_lastdata,
            );
        }
        //----------------------------------------------------------------------------
        echo json_encode($arraydata);

    }

}

?>