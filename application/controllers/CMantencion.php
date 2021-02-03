<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CMantencion extends CI_Controller {

	public function __construct(){
		parent::__construct();// you have missed this line.
		$this->load->model('Vehiculo');
		$this->load->model('Personal');
		$this->load->model('Mantencion');


	 }

	public function index(){
		$set_data = $this->session->all_userdata();
		if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 1) {
			$data ['activomenu'] = 20;
			$data ['activo'] = 14;
			$data ['lista_vehiculos'] = $this->Vehiculo->ObtenerVehiculos();
			$data ['lista_personal'] = $this->Personal->ObtenerListaPersonal();
			$data ['total_mantenciones'] = $this->Mantencion->ObtenerListaMantenciones();
			$this->load->view('layout/nav');
			$this->load->view('menu/menu_supremo',$data);
			$this->load->view('Administracion/VMantencion',$data);
			$this->load->view('layout/footer');
		}
		
	}
	
	public function fetch_data()
    {
        $this->load->model('Mantencion', 'mantencion');

        $fetch_data = $this->mantencion->make_datatables_mvehiculo();
        $data = array();
        foreach ($fetch_data as $value) {

            $sub_array      = array();
			$sub_array[]    = $value->id_mantencion;
			$sub_array[]    = $value->patente;
			$sub_array[]    = $value->fecha;
			$sub_array[]    = $value->nombrecompleto;
			$sub_array[]    = $value->taller;
			$sub_array[]    = $value->mecanico;
			$sub_array[]    = $value->total_m;
			$sub_array[]    = $value->detalle;
		

			
			//$sub_array[]	= '<a href="#" class="fas fa-eye" style="font-size: 20px;" data-toggle="modal" data-target="#myModalVerMas" onclick="vermas('.$value['id_material'].');" ></a>';
           // <a href="#" class="fas fa-edit" style="font-size: 20px;"></a> EN CASO DE QUERER EDITAR LOS REGISTROS
            $data[]         = $sub_array;
        }
        $output = array(
			"draw"                =>     intval($_POST["draw"]),
            "recordsTotal"        =>     $this->mantencion->get_all_data_mvehiculo(),
            "recordsFiltered"     =>     $this->mantencion->get_filtered_data_mvehiculo(),
            "data"                =>     $data
        );
		echo json_encode($output);
		
    }
}