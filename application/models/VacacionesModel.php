<?php
defined('BASEPATH') or exit('No direct script access allowed');

class VacacionesModel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function make_datatables_vacaciones(){
        $this->make_query_vacaciones();
        if ($_POST["length"] != - 1){
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();

    }

    //ESTE ES EL SELECT DE LA TABLA PRINCIPAL DE Stock
    var $tablaaa = array(
        "vacaciones v",
        "personal p",
    );
    var $select_columnaaa = array(
        "p.id_personal",
        "p.rut",
        "p.nombrecompleto",
        "v.fechainicio",
        "v.fechatermino",
        "v.diasausar",
    );

    var $order_columnaaa = array(
        "p.id_personal",
        "p.rut",
        "p.nombrecompleto",
        "v.fechainicio",
        "v.fechatermino",
        "v.diasausar",
    );
    var $whereee = "p.id_personal = v.id_personal";

    function make_query_vacaciones(){
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

    function get_all_data_vacaciones(){
        $this->db->select($this->select_columnaaa);
        $this->db->from($this->tablaaa);
        $this->db->where("p.id_personal = v.id_personal");

        return $this->db->count_all_results();
    }

    function get_filtered_data_vacaciones(){
        $this->make_query_vacaciones();
        $query = $this->db->get();

        return $query->num_rows();
    }

    public function registrarVacaciones($data,$fechainicio,$fechatermino){
        $id_personal = $data['rut'];

        $dias_pedidos_lista = $data['diasusar'];
        $dias_progresivos_lista = $data['diasprogresivos'];
        $dias_acumulados_lista = $data['diasacumulados'];

        for($count = 0; $count<count($dias_pedidos_lista); $count++){
            $diasprogresivos_limpio = $dias_progresivos_lista[$count];
            $diasacumulados_limpio = $dias_acumulados_lista [$count];
            $diaspedidos_limpio = $dias_pedidos_lista[$count];
        
        }
        
        $insert_data = array(
            'diasacumulados' => $diasacumulados_limpio,
            'diasprogresivos' => $diasprogresivos_limpio,
            'diasausar' => $diaspedidos_limpio,
            'fechainicio' => $fechainicio,
            'fechatermino' => $fechatermino,
            'id_personal' => $id_personal,
        );
       

        

        return $this->db->insert('vacaciones', $insert_data);
    }

}

?>
