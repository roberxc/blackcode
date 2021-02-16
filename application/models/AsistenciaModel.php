<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AsistenciaModel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function registrarAsistenciaPersonal($data)
    {
        $rut_personal = $data['rut'];
        $nombre_completo = $data['nombrecompleto'];
        //Registro de personal
        $datapersonal = array(
            'rut' => $rut_personal,
            'nombrecompleto' => $nombre_completo,
        );

        $this
            ->db
            ->insert('personal', $datapersonal);
        $id_personal = $this
            ->db
            ->insert_id();

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
        if (($horaextras == '00:00'))
        {
            //No hay horas extras
            $insert_data = array(
                'fecha_asistencia' => $fecha_asistencia,
                'horallegadam' => $asistencia_mentrada,
                'horasalidam' => $asistencia_msalida,
                'horallegadat' => $asistencia_tentrada,
                'horasalidat' => $asistencia_tsalida,
                'id_personal' => $id_personal,
                'horastrabajadas' => 9,
                'horasextras' => 0,
                'estado' => $estado_asistencia,
            );
        }
        else
        {
            //Si hay diferencias de horas
            $fechaactual = date("d/m/y");
            //Horas totales trabajadas
            $mihora = new DateTime($horaextras);
            $mihora->modify('+9 hours');
            $horastotales = $mihora->format('H:i');
            if (strtotime($horastotales) < strtotime('09:00'))
            {
                //No hay horas extras
                $horaInicio = new DateTime($asistencia_mentrada);
                $horaTermino = new DateTime($asistencia_tsalida);
                $insert_data = array(
                    'fecha_asistencia' => $fecha_asistencia,
                    'horallegadam' => $asistencia_mentrada,
                    'horasalidam' => $asistencia_msalida,
                    'horallegadat' => $asistencia_tentrada,
                    'horasalidat' => $asistencia_tsalida,
                    'id_personal' => $id_personal,
                    'horastrabajadas' => $horastotales,
                    'horasextras' => 0,
                    'estado' => $estado_asistencia,
                );
            }
            else
            {
                //Si hay horas extras
                $timestamp = strtotime($horaextras);
                $mihoraextra = date('h', $timestamp);
                $insert_data = array(
                    'fecha_asistencia' => $fecha_asistencia,
                    'horallegadam' => $asistencia_mentrada,
                    'horasalidam' => $asistencia_msalida,
                    'horallegadat' => $asistencia_tentrada,
                    'horasalidat' => $asistencia_tsalida,
                    'id_personal' => $id_personal,
                    'horastrabajadas' => $horastotales,
                    'horasextras' => $mihoraextra,
                    'estado' => $estado_asistencia,
                );
            }

        }

        return $this
            ->db
            ->insert('asistencia_personal', $insert_data);
    }

    function make_datatables_asistencia()
    {
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
}

?>
