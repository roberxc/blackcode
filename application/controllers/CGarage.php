<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CGarage extends CI_Controller {

	public function __construct(){
		parent::__construct();// you have missed this line.
		$this->load->model('Vehiculo');
	 }

	public function index(){
		$set_data = $this->session->all_userdata();
		if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 1) {
			$data ['activomenu'] = 20;
			$data ['activo'] = 98;

			$this->load->view('layout/nav');
			$this->load->view('menu/menu_supremo',$data);
			$this->load->view('Administracion/VGarage');
			$this->load->view('layout/footer');
		}
		
	}



	public function fetch_data()
    {
        $this->load->model('Vehiculo', 'vehiculo');

        $fetch_data = $this->vehiculo->make_datatables_vehiculo();
        $data = array();
        foreach ($fetch_data as $value) {

            $sub_array      = array();
            $sub_array[]    = $value->id_vehiculo;
            $sub_array[]    = $value->patente;

			$sub_array[]    = $value->ano;
			$sub_array[]    = $value->tipo;
			$sub_array[]    = $value->marca;
			$sub_array[]    = $value->modelo;
			$sub_array[]    = $value->color;
			$sub_array[]    = $value->tipomotor;
			$sub_array[]    = $value->gps;

			$sub_array[]    = $value->modelo;
			$sub_array[]    = $value->modelo;
			$sub_array[]    = $value->modelo;
			$sub_array[]    = $value->modelo;
			//$sub_array[]	= '<a href="#" class="fas fa-eye" style="font-size: 20px;" data-toggle="modal" data-target="#myModalVerMas" onclick="vermas('.$value['id_material'].');" ></a>';
           // <a href="#" class="fas fa-edit" style="font-size: 20px;"></a> EN CASO DE QUERER EDITAR LOS REGISTROS
            $data[]         = $sub_array;
        }
        $output = array(
			"draw"                =>     intval($_POST["draw"]),
            "recordsTotal"        =>     $this->vehiculo->get_all_data_vehiculo(),
            "recordsFiltered"     =>     $this->vehiculo->get_filtered_data_vehiculo(),
            "data"                =>     $data
        );
		echo json_encode($output);
		
    }
}