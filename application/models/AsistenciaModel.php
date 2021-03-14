<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AsistenciaModel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function registrarAsistenciaPersonal($data){
        $nombre_completo = $data['nombrecompleto'];
        //Hora de entrada en la mañana
        $asistencia_mentrada = $data['horallegadam'];
        $asistencia_msalida = $data['horasalidam'];

        $asistencia_tentrada = $data['horallegadat'];
        //Hora de salida en la tarde
        $asistencia_tsalida = $data['horasalidat'];

        //Otros campos
        $estado_asistencia = $data['estado'];
        $fecha_asistencia = $data['fecha'];

        $horaInicio = new DateTime($asistencia_mentrada);
        $horaTermino = new DateTime($asistencia_tsalida);
        $interval = $horaInicio->diff($horaTermino);
        $asd = $interval->format('%H:%i');

        $mihora = new DateTime($asd);
        //Resto de hora colacion mas horas totales
        $mihora->modify('-10 hours');
        $horaextras = $mihora->format('H:i');
        //Si no hay horas extras
        //echo("1) HORAS EXTRAS CON MINUTOS: ".$horaextras."\n");

        //Verificar si siguen siendo 9 horas de trabajo
        $mihora = new DateTime($horaextras);
        $minutostotales = $mihora->format('i');
        //echo("2) HORAS EXTRAS MINUTOS: ".$minutostotales."\n");

        if (($horaextras == '00:00') && (intval($minutostotales <30))){
            //echo("3) SIN HORAS EXTRAS PERRITO\n");
            //No hay horas extras
            $insert_data = array(
                'fecha_asistencia' => $fecha_asistencia,
                'horallegadam' => $asistencia_mentrada,
                'horasalidam' => $asistencia_msalida,
                'horallegadat' => $asistencia_tentrada,
                'horasalidat' => $asistencia_tsalida,
                'id_personal' => $data['idpersonal'],
                'horastrabajadas' => 9,
                'horasextras' => 0,
                'estado' => $estado_asistencia,
            );
        }else{
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

                $insert_data = array(
                    'fecha_asistencia' => $fecha_asistencia,
                    'horallegadam' => $asistencia_mentrada,
                    'horasalidam' => $asistencia_msalida,
                    'horallegadat' => $asistencia_tentrada,
                    'horasalidat' => $asistencia_tsalida,
                    'id_personal' => $data['idpersonal'],
                    'horastrabajadas' => $horastotales,
                    'horasextras' => $horaextraminutos,
                    'estado' => $estado_asistencia,
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

                $insert_data = array(
                    'fecha_asistencia' => $fecha_asistencia,
                    'horallegadam' => $asistencia_mentrada,
                    'horasalidam' => $asistencia_msalida,
                    'horallegadat' => $asistencia_tentrada,
                    'horasalidat' => $asistencia_tsalida,
                    'id_personal' => $data['idpersonal'],
                    'horastrabajadas' => $horastotales,
                    'horasextras' => $mihoraextra,
                    'estado' => $estado_asistencia,
                );
            }

        }

        return $this->db->insert('asistencia_personal', $insert_data);
    }

    function make_datatables_asistencia(){
        $this->make_query_stock();
        if ($_POST["length"] != - 1){
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();

    }

    //ESTE ES EL SELECT DE LA TABLA PRINCIPAL DE Stock
    var $tablaaa = array(
        "asistencia_personal",
        "personal",
    );
    var $select_columnaaa = array(
        "fecha_asistencia",
        "horallegadam",
        "horasalidam",
        "horallegadat",
        "horasalidat",
        "personal.id_personal",
        "personal.rut",
        "personal.nombrecompleto",
        "horastrabajadas",
        "horasextras",
        "estado",
    );

    var $order_columnaaa = array(
        "personal.rut",
        "personal.nombrecompleto",
        "horallegadam",
        "horasalidam"
    );
    var $whereee = "asistencia_personal.id_personal = personal.id_personal";

    function make_query_stock(){
        $this->db->select($this->select_columnaaa);
        $this->db->from($this->tablaaa);
        $this->db->where($this->whereee);
        
        if (isset($_POST["search"]["value"]) && $_POST["search"]["value"] != ''){
            $this->db->group_start();
            $this->db->like("rut", $_POST["search"]["value"]);
            $this->db->or_like("nombrecompleto", $_POST["search"]["value"]);
            $this->db->group_end();
        }
        if (isset($_POST["order"])){
            $this->db->order_by($this->order_columnaaa[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        
        }else{
            $this->db->order_by('id_personal', 'ASC');
        }
    }

    function get_all_data_stock(){
        $this->db->select($this->select_columnaaa);
        $this->db->from($this->tablaaa);
        $this->db->where("asistencia_personal.id_personal = personal.id_personal");

        return $this->db->count_all_results();
    }

    function get_filtered_data_stock(){
        $this->make_query_stock();
        $query = $this->db->get();

        return $query->num_rows();
    }

    public function ObtenerAsistenciaCompleta($idpersonal){
		$query = $this->db
				->select("p.rut AS rut,a.fecha_asistencia AS Fecha, a.horallegadam AS LlegadaM, a.horasalidam AS SalidaM, a.horallegadat AS LlegadaT, a.horasalidat AS SalidaT, p.nombrecompleto AS NombreCompleto, a.horastrabajadas AS HorasTrabajadas, a.horasextras AS HorasExtras,a.estado as Estado") # También puedes poner * si quieres seleccionar todo
				->from("asistencia_personal a")
				->join("personal p", "p.id_personal = a.id_personal")
				->where("p.id_personal", $idpersonal)
				->get();
		
		return $query->result();
    }
    
    public function listaPersonal(){
		$query = $this->db
				->select("id_personal,rut,nombrecompleto") # También puedes poner * si quieres seleccionar todo
                ->from("personal")
                ->group_by("rut")
				->get();
		
		return $query->result();
    }

    //Horas extras personal
    public function ObtenerhorasextrasSegunFecha($rutpersonal,$fecha){
		$query = $this->db
				->select("SUM(a.horasextras) AS TotalHoras, p.nombrecompleto AS Nombre") # También puedes poner * si quieres seleccionar todo
				->from("asistencia_personal a")
				->join("personal p", "a.id_personal = p.id_personal")
				->where('DATE(a.fecha_asistencia) IN ('.$fecha.')')
				->where("p.rut", $rutpersonal)
				->get();

		return $query->result();
    }
    
    public function Obtenerhorasextras($rutpersonal,$fechainicial,$fechatermino){
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
			$format = 'Y-m-d';
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

    //Metodos para el grafico
    public function ObtenerHorasExtrasSegunFechaGraph($fecha,$rutpersonal){
		$query = $this->db
				->select("MONTHNAME(a.fecha_asistencia) AS month, SUM(a.horasextras) AS total") # También puedes poner * si quieres seleccionar todo
				->from("asistencia_personal a")
				->join("personal p", "a.id_personal = p.id_personal")
                ->where('DATE(a.fecha_asistencia) IN ('.$fecha.')')
                ->where('p.rut',$rutpersonal)
				->group_by('month')
				->order_by('FIELD(MONTH(a.fecha_asistencia),"JANUARY","FEBRUARY","MARCH","APRIL","MAY","JUNE","JULY","AUGUST","SEPTEMBER","OCTOBER","NOVEMBER","DECEMBER")')
				->get();
        
        //SELECT MONTHNAME(a.fecha_asistencia) AS month, SUM(a.horasextras) AS total 
        //from asistencia_personal a, personal p
        //WHERE a.id_personal = p.id_personal AND DATE(a.fecha_asistencia) IN 
        //('2021-02-01','2021-02-02','2021-02-03','2021-02-04','2021-02-05','2021-02-06',
        //'2021-02-07','2021-02-08','2021-02-09','2021-02-10','2021-02-11','2021-02-12',
        //'2021-02-13','2021-02-14','2021-02-15','2021-02-16','2021-02-17','2021-02-18',
        //'2021-02-19','2021-02-20','2021-02-21','2021-02-22','2021-02-23','2021-02-24',
        //'2021-02-25','2021-02-26','2021-02-27','2021-02-28','2021-03-01','2021-03-02',
        //'2021-03-03','2021-03-04','2021-03-05') GROUP BY month

		return $query->result_array();
	}
    
    public function generarEstadisticasHorasExtras($fechainicial,$fechatermino,$rutpersonal){
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
            $format = 'Y-m-d';
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
        
        $data  = $this->ObtenerHorasExtrasSegunFechaGraph($string,$rutpersonal);
        $arraydata = array(); 
        $arrayempty = array(); 
   
        if(count($data)>0){
            $diasespañol = array();
            $montodata = array();
            foreach($data as $value){
                switch($value['month']){
                    case 'January':{
                        $diasespañol = ('Enero');
                        $montodata = $value['total'];
                    break;
                    }
                    case 'February':{
                        $diasespañol = ('Febrero');
                        $montodata = $value['total'];
                    break;
                    }
                    case 'March':{
                        $diasespañol = ('Marzo');
                        $montodata = $value['total'];
                        break;
                    }
                    case 'April':{
                        $diasespañol = ('Abril');
                        $montodata = $value['total'];
                        break;
                    }
                    case 'May':{
                        $diasespañol = ('Mayo');
                        $montodata = $value['total'];
                        break;
                    }
                    case 'June':{
                        $diasespañol = ('Junio');
                        $montodata = $value['total'];
                        break;
                    }
                    case 'July':{
                        $diasespañol = ('Julio');
                        $montodata = $value['total'];
                        break;
                    }
                    case 'Agust':{
                        $diasespañol = ('Agosto');
                        $montodata = $value['total'];
                        break;
                    }
                    case 'September':{
                        $diasespañol = ('Septiembre');
                        $montodata = $value['total'];
                        break;
                    }
                    case 'October':{
                        $diasespañol = ('Octubre');
                        $montodata = $value['total'];
                        break;
                    }
                    case 'November':{
                        $diasespañol = ('Noviembre');
                        $montodata = $value['total'];
                        break;
                    }
                    case 'December':{
                        $diasespañol = ('Diciembre');
                        $montodata = $value['total'];
                        break;
                    }
                }
                $arraydata[] = array(
                    "mes" => $diasespañol,
                    "total" => $montodata,
                );
            }
            echo json_encode($arraydata);
   
        }else{
            $dias= array ('Enero','Febrero', 'Marzo');
            $monto = array(0,0,0);
            $size = sizeof($dias);
            
            for($i=0;$i<$size;$i++){
                $arrayempty[] = array(
                    "mes" => $dias[$i],
                    "total" => $monto[$i],
                    
                );
            }
            echo json_encode($arrayempty);
            
        }
    }
}

?>
