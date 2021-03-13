<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdministracionModel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function registroCostoFijo($data){

        $monto = $data['valor'];
        $fecha = $data['fecha'];
		$idtipo = $data['id_tipo'];
		$detalle = $data['detalle'];
        
		$data = array(
			'fecha' => $fecha,
			'valor' => $monto,
			'detalle' => $detalle,
			'id_tipo' => $idtipo
		);
	
		return $this->db->insert('costosfijos', $data);

	}

    public function registroTipoCostoFijo($data){

        $nombre = $data['nombre'];
        
		$data = array(
			'nombre' => $nombre,
		);
	
		return $this->db->insert('tipocostosfijos', $data);

	}

	public function listaTipoCostos(){
		$query = $this->db
				->select("id_tipo,nombre") # También puedes poner * si quieres seleccionar todo
				->from("tipocostosfijos")
				->get();
    	return $query->result();
	}

    public function listaTipoUsuarios(){
		$query = $this->db
				->select("id_tipousuario,rol") # También puedes poner * si quieres seleccionar todo
				->from("tipousuario")
				->get();
    	return $query->result();
	}
	
	//Tabla de costos fijos
	function make_datatables_costosfijos(){
        $this->make_query_costosfijos();
        if ($_POST["length"] != - 1){
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();

    }

    var $tablacostosfijos = array(
        "costosfijos c",
        "tipocostosfijos t",
    );
    var $select_columna_costosfijos = array(
        "c.id_costofijos",
		"c.fecha",
		"c.valor",
        "c.detalle",
        "t.nombre as tipo",
    );

    var $order_columna_costosfijos = array(
        "c.fecha",
		"c.valor",
        "c.detalle",
        "t.nombre",
    );

    var $where_costosfijos = "c.id_tipo = t.id_tipo AND c.estado = 0";

    function make_query_costosfijos(){
        $this->db->select($this->select_columna_costosfijos);
        $this->db->from($this->tablacostosfijos);
        $this->db->where($this->where_costosfijos);

        if (isset($_POST["search"]["value"]) && $_POST["search"]["value"] != ''){
            $this->db->group_start();
            $this->db->like("t.nombre", $_POST["search"]["value"]);
            $this->db->group_end();
        }
        if (isset($_POST["order"])){
            $this->db->order_by($this->order_columna_costosfijos[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        
        }else{
            $this->db->order_by('id_orden', 'ASC');
        }
    }

    function get_all_data_costosfijos(){
        $this->db->select($this->select_columna_costosfijos);
        $this->db->from($this->tablacostosfijos);


        return $this->db->count_all_results();
    }

    function get_filtered_data_costosfijos(){
        $this->make_query_costosfijos();
        $query = $this->db->get();

        return $query->num_rows();
    }

    //Metodos para el grafico de costos fijos
    public function ObtenerTotalCostosFijosSegunFecha($fecha){
		$query = $this->db
				->select("MONTHNAME(c.fecha) AS month, SUM(c.valor) AS total") # También puedes poner * si quieres seleccionar todo
				->from("costosfijos c")
				->join("tipocostosfijos t", "c.id_tipo = t.id_tipo")
                ->where('DATE(c.fecha) IN ('.$fecha.')')
                ->where('c.estado',0)
                //->where('p.rut',$rutpersonal)
				->group_by('month')
				->order_by('FIELD(MONTH(c.fecha),"JANUARY","FEBRUARY","MARCH","APRIL","MAY","JUNE","JULY","AUGUST","SEPTEMBER","OCTOBER","NOVEMBER","DECEMBER")')
				->get();
        
        /**SELECT MONTHNAME(c.fecha) AS month,t.nombre, SUM(c.valor) total 
        * from costosfijos c, tipocostosfijos t where c.id_tipo=t.id_tipo AND 
        * DATE(c.fecha) IN ('2021-02-01','2021-02-02','2021-02-03','2021-02-04',
        * '2021-02-05','2021-02-06','2021-02-07','2021-02-08','2021-02-09','2021-02-10',
         * '2021-02-11','2021-02-12','2021-02-13','2021-02-14','2021-02-15','2021-02-16',
         * '2021-02-17','2021-02-18','2021-02-19','2021-02-20','2021-02-21','2021-02-22',
         * '2021-02-23','2021-02-24','2021-02-25','2021-02-26','2021-02-27','2021-02-28','2021-03-01') */

		return $query->result_array();
	}

    public function actualizarEstadoCostoFijo($nrocosto){
		$this->db->set('estado', 1);
        $this->db->where('id_costofijos', $nrocosto);
		return $this->db->update('costosfijos');
    }
    
    public function generarEstadisticasCostosFijos($fechainicial,$fechatermino){
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
        
        $data  = $this->ObtenerTotalCostosFijosSegunFecha($string);
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


    public function updateCajaChica($data){

        $datacajachica = array(
            'montoingreso' => $data['monto'],
            'fechaingreso' => $data['fecha'],
        );
        $this->db->where('id_ingresocaja', $data['id_caja']);
		return $this->db->update('ingresocaja',$datacajachica);
    }

    public function updateCajaChicaEgreso($data){

        $datadestinatario = array(
            'nombredestinatario' => $data['destinatario'],
        );
        $this->db->where('id_destinatario', $data['id_destinatario']);
		$this->db->update('destinatario',$datadestinatario);


        $datacajachicaegreso = array(
            'fechaegreso' => $data['fecha'],
            'montoegreso' => $data['monto'],
            'detalle' => $data['detalle'],
        );
        $this->db->where('id_egresocaja', $data['id_reg']);
		return $this->db->update('egresocaja',$datacajachicaegreso);
    }

    public function deleteCajaChicaEgreso($data){
        $datacajachicaegreso = array(
            'estadoreg' => 1,
        );
        $this->db->where('id_egresocaja', $data['id_reg']);
		return $this->db->update('egresocaja',$datacajachicaegreso);
    }

    //Devuelve el total de usuarios registrados en el ssistema
    public function totalUsuariosRegistrados(){
		$query = $this->db
				->select("COUNT(id_usuario) as total") # También puedes poner * si quieres seleccionar todo
				->from("usuario")
				->get();
    	return $query->result_array();
	}

    public function registrarTarea($ajax_data){
        $set_data = $this->session->all_userdata();
        date_default_timezone_set("America/Santiago");
        $fecha = date("Y-m-d G:i:s");

        $datatarea = array(
			'nombre' => $ajax_data['tarea'],
			'fecha' => $fecha,
            'estado' => 0,
            'id_usuario' =>  $set_data['ID_Usuario'],
		);

		return $this->db->insert('tarea',$datatarea);
	}

    public function obtenerTareas(){
		$query = $this->db
				->select("*") # También puedes poner * si quieres seleccionar todo
				->from("tarea")
                ->where("estado",0)
				->get();
    	return $query->result();
	}

    public function updateTarea($data){
        $datatarea = array(
            'estado' => 1,
        );
        $this->db->where('id_tarea', $data['idtarea']);
		return $this->db->update('tarea',$datatarea);
    }

    //Tabla de usuarios registrados
	function make_datatables_registrousuarios(){
        $this->make_query_registrousuarios();
        if ($_POST["length"] != - 1){
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();

    }

    var $tablaregistrousuarios = array(
        "usuario u",
        "tipousuario t",
    );
    var $select_columna_registrousuarios = array(
        "u.id_usuario",
        "u.nombre_completo as nombre",
		"u.rut as rut",
        "u.correo as correo",
		"t.rol as tipo",
        "u.estado",
    );

    var $order_columna_registrousuarios = array(
        "u.id_usuario",
        "u.nombre_completo",
		"u.rut",
		"t.rol",
    );

    var $where_registrousuarios = "u.id_tipousuario = t.id_tipousuario";

    function make_query_registrousuarios(){
        $this->db->select($this->select_columna_registrousuarios);
        $this->db->from($this->tablaregistrousuarios);
        $this->db->where($this->where_registrousuarios);
        if (isset($_POST["search"]["value"]) && $_POST["search"]["value"] != ''){
            $this->db->group_start();
            $this->db->like("u.nombre_completo", $_POST["search"]["value"]);
            $this->db->or_like("u.rut", $_POST["search"]["value"]);
            $this->db->or_like("u.correo", $_POST["search"]["value"]);
            $this->db->group_end();
        }
        if (isset($_POST["order"])){
            $this->db->order_by($this->order_columna_registrousuarios[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        
        }else{
            $this->db->order_by('id_usuario', 'ASC');
        }
    }

    function get_all_data_registrousuarios(){
        $this->db->select($this->select_columna_registrousuarios);
        $this->db->from($this->tablaregistrousuarios);
        return $this->db->count_all_results();
    }

    function get_filtered_data_registrousuarios(){
        $this->make_query_registrousuarios();
        $query = $this->db->get();
        return $query->num_rows();
    }

    //Eliminar registro de usuario cambiando estado
    public function eliminarRegistroUsuario($data,$estado){
        $datauser = array(
            'estado' => $estado,
        );
        $this->db->where('id_usuario', $data);
		return $this->db->update('usuario',$datauser);
    }

    //Cambiar tipo de usuario
    public function cambiarTipoUsuario($data){
        $datauser = array(
            'id_tipousuario' => $data['id_tipousuario'],
        );
        $this->db->where('id_usuario', $data['id_usuario']);
		return $this->db->update('usuario',$datauser);
    }

}

?>
