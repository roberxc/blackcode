<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class OrdenesModel extends CI_Model {

	function __construct(){
		parent::__construct();
    }
    
    public function getIdCotizacion($nrocotizacion){
		$query = $this->db->select("id_cotizacion") # También puedes poner * si quieres seleccionar todo
				->from("cotizaciones")
				->where('nrocotizacion', $nrocotizacion);
		$query = $this->db->get();
		return $query->result_array();
	}


    public function getNroOrden($nroorden){
		$query = $this->db->select("nroorden") # También puedes poner * si quieres seleccionar todo
				->from("ordenes")
				->where('nroorden', $nroorden);
		$query = $this->db->get();
		return $query->result_array();
	}

    public function registrarOrdenes($data){
        $idordenquery = $this->getNroOrden($data['nroorden']);
        //Si existe la orden
        if(count($idordenquery) == 0){
            //Registro de la tabla ordenes
            $nrocotizacion = $data["nrocotizacion"];
            $bodega = $data["idbodega"];
            $estado = $data["estado"];
            $nroorden = $data["nroorden"];
            $iva = 19;
            $total = $data["total"];
            $idproyecto = $data["proyecto"];
            $fecha = date("d/m/Y");

            $dataordenes = array(
                'iva' => $iva,
                'nroorden' => $nroorden,
                'total' => $total,
                'fecha' => $fecha,
                'estado' => $estado,
                'id_tipobodega' => $bodega,
                'id_proyecto' => $idproyecto,
            );

            $this->db->insert('ordenes', $dataordenes);
            $id_orden = $this->db->insert_id();

            //ordenes_cotizaciones
            $dataordenes_cotizaciones = array(
                'id_orden' => $id_orden,
                'id_cotizacion' =>  $data['nrocotizacion'],
                'fecha' => $fecha,
            );

            $this->db->insert('ordenes_cotizaciones', $dataordenes_cotizaciones);
            
            //Registro de la tabla ordenes_materiales
            $idmateriales = $data["lista_iditem"];
            $valores = $data["lista_valor"];
            $cantidad = $data["lista_cantidad"];
            $importe = $data["lista_importe"];
            for($count = 0; $count<count($idmateriales); $count++){
                $materialesid_limpio = $idmateriales[$count];
                $valores_limpio = $valores[$count];
                $cantidad_limpio = $cantidad[$count];
                $importe_limpio = $importe[$count];
                if(!empty($materialesid_limpio)){
                    $insert_data_ordenesmateriales[] = array(
                        'id_orden' => $id_orden,
                        'id_material' => $materialesid_limpio,
                        'preciounitario' => $valores_limpio,
                        'cantidad' => $cantidad_limpio,
                        'importe' => $importe_limpio,
                    );
                }
            }
            return $this->db->insert_batch('ordenes_materiales', $insert_data_ordenesmateriales);
        }

        return null;

    }

	public function registrarProveedores($ajax_data){
		$dataproveedores = array(
			'rut' => $ajax_data['rut'],
			'nombre' => $ajax_data['nombre'],
			'direccion' => $ajax_data['direccion'],
			'telefono' => $ajax_data['telefono'],
			'correo' => $ajax_data['correo'],
			'descripcion' => $ajax_data['comentario'],
			'diascredito' => $ajax_data['diascredito'],
		);

		return $this->db->insert('proveedores',$dataproveedores);
    }

    public function actualizarEstadoOrden($estado,$nroorden){
		$this->db->set('estado', $estado, FALSE);
        $this->db->where('nroorden', $nroorden);
		return $this->db->update('ordenes');
    }

	public function registrarNuevoProducto($ajax_data){
		$dataproductos = array(
			'nombre' => $ajax_data['producto'],
			'valor' => $ajax_data['valor'],
		);

		return $this->db->insert('materiales_comprados',$dataproductos);
	}

	function make_datatables_proveedores()
    {
        $this->make_query_proveedores();
        if ($_POST["length"] != - 1){
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();

    }

    //ESTE ES EL SELECT DE LA TABLA PRINCIPAL DE Stock
    var $tablaaa = array(
        "proveedores",
    );
    var $select_columnaaa = array(
		"id_proveedor",
		"rut",
        "nombre",
        "direccion",
        "telefono",
        "correo",
        "descripcion",
        "diascredito",
    );

    var $order_columnaaa = array(
        "rut",
		"nombre",
		"telefono",
    );

    function make_query_proveedores(){
        $this->db->select($this->select_columnaaa);
        $this->db->from($this->tablaaa);
        
        if (isset($_POST["search"]["value"]) && $_POST["search"]["value"] != ''){
            $this->db->group_start();
            $this->db->like("rut", $_POST["search"]["value"]);
            $this->db->or_like("nombre", $_POST["search"]["value"]);
            $this->db->group_end();
        }
        if (isset($_POST["order"])){
            $this->db->order_by($this->order_columnaaa[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        
        }else{
            $this->db->order_by('id_proveedor', 'ASC');
        }
    }

    function get_all_data_proveedores(){
        $this->db->select($this->select_columnaaa);
        $this->db->from($this->tablaaa);


        return $this->db->count_all_results();
    }

    function get_filtered_data_proveedores(){
        $this->make_query_proveedores();
        $query = $this->db->get();

        return $query->num_rows();
	}
	
	public function ObtenerProveedores($idpersonal){
		$query = $this->db
				->select("*") # También puedes poner * si quieres seleccionar todo
				->from("proveedores")
				->get();
		
		return $query->result();
    }
    
    public function listaOrdenes(){
		$query = $this->db
				->select("nroorden") # También puedes poner * si quieres seleccionar todo
				->from("ordenes")
				->get();
		
		return $query->result();
    }

    public function listaMateriales(){
		$query = $this->db
				->select("id_material,nombre, valor") # También puedes poner * si quieres seleccionar todo
				->from("materiales_comprados")
				->get();
    	return $query->result();
    }
    
    public function listaBodegas(){
		$query = $this->db
				->select("id_tipobodega, nombretipobodega") # También puedes poner * si quieres seleccionar todo
				->from("tipobodega")
				->get();
    	return $query->result();
    }
    
    //Tabla de con buscador ordenes
    function make_datatables_ordenes(){
        $this->make_query_ordenes();
        if ($_POST["length"] != - 1){
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();

    }

    var $tablaordenes = array(
        "proveedores p",
        "ordenes o",
        "cotizaciones c",
        "ordenes_cotizaciones oc",
    );
    var $select_columna_ordenes = array(
		"o.nroorden",
		"o.iva",
        "o.total",
        "oc.fecha",
        "o.estado",
        "p.nombre",
        "p.rut",
        "c.id_cotizacion",
    );

    var $order_columna_ordenes = array(
        "fecha",
		"proveedores.nombre",
    );

    var $where_orden = "c.id_proveedor = p.id_proveedor AND oc.id_orden = o.id_orden AND oc.id_cotizacion = c.id_cotizacion";

    function make_query_ordenes(){
        $this->db->select($this->select_columna_ordenes);
        $this->db->from($this->tablaordenes);
        $this->db->where($this->where_orden);

        if (isset($_POST["search"]["value"]) && $_POST["search"]["value"] != ''){
            $this->db->group_start();
            $this->db->like("nombre", $_POST["search"]["value"]);
            $this->db->or_like("estado", $_POST["search"]["value"]);
            $this->db->group_end();
        }
        if (isset($_POST["order"])){
            $this->db->order_by($this->order_columna_ordenes[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        
        }else{
            $this->db->order_by('id_orden', 'ASC');
        }
    }

    function get_all_data_ordenes(){
        $this->db->select($this->select_columna_ordenes);
        $this->db->from($this->tablaordenes);


        return $this->db->count_all_results();
    }

    function get_filtered_data_ordenes(){
        $this->make_query_ordenes();
        $query = $this->db->get();

        return $query->num_rows();
    }

    public function ObtenerDetalleOrden($idorden){
		$query = $this->db
				->select("m.id_material as idmaterial, o.nroorden as numero, m.nombre as nombre, om.cantidad as cantidad, om.preciounitario as valor, om.importe as importe") # También puedes poner * si quieres seleccionar todo
				->from("ordenes_materiales om")
				->join("ordenes o", "om.id_orden = o.id_orden")
				->join("materiales_comprados m", "om.id_material = m.id_material")
				->where("o.nroorden",$idorden)
				->get();
        // if (count($query->result()) > 0) {
        return $query->result();
        // }
    }
    
    public function ObtenerEstadoOrden($idorden){
		$query = $this->db
				->select("estado") # También puedes poner * si quieres seleccionar todo
				->from("ordenes")
				->where("nroorden",$idorden)
				->get();
        // if (count($query->result()) > 0) {
        return $query->result();
        // }
	}

    /////////////////xddddddddddddddd ESTO ES UNA PRUEBA PARA EL DETALLE ORDEN DE COMPRA
    var $order_columna_ordenesss = array(
        "nroorden",
		"nombre",
    );

    function make_query_vermas($IDENTRADA = '0')
    {
        $this->db->SELECT('nroorden, nombre, cantidad, preciounitario');
        $this->db->from('ordenes_materiales, ordenes, materiales_comprados ');
        $this->db->where('ordenes.id_orden = ordenes_materiales.id_orden AND materiales_comprados.id_material = ordenes_materiales.id_material AND ordenes.nroorden =',$IDENTRADA);
    }

    function make_model_vermas($IDENTRADA = '0')
    {
        $this->make_query_vermas($IDENTRADA);
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_filtered_data_vermas()
    {
        $this->make_query_vermas($IDENTRADA = '0');
        $query = $this->db->get();
        return $query->num_rows();
    }
    function get_all_data_vermas()
    {
        $this->db->SELECT('nroorden, nombre,cantidad , preciounitario ');
        $this->db->from('ordenes_materiales, ordenes, materiales_comprados ');
        $this->db->where('ordenes.id_orden = ordenes_materiales.id_orden AND materiales_comprados.id_material = ordenes_materiales.id_material');
        return $this->db->count_all_results();
    }

}

?>