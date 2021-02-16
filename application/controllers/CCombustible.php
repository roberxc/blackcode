<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CCombustible extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Vehiculo');
		$this->load->model('Combustible');// you have missed this line.
	 }


	public function index(){
		$set_data = $this->session->all_userdata();
		if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 1) {
			$data ['activomenu'] = 20;
			$data ['activo'] = 99;
			$data ['total_BoletasC'] = $this->Combustible->Obtener_BoletasC();
			$data ['lista_vehiculos'] = $this->Vehiculo->ObtenerVehiculos();
			$this->load->view('layout/nav');
			$this->load->view('menu/menu_supremo',$data);
			$this->load->view('Administracion/VCombustible',$data);
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
            $sub_array[]    = $value->id;
            $sub_array[]    = $value->patente;
			
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