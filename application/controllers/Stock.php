<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Stock extends CI_Controller
{


    public function index()
    {
        //$data['include_js'] = array("historial_reajustar_stock.js");  #este te indica que js esta usando el modulo* 
        $data ['activo'] = 3;
        $this->load->view('menu/menu_bodeguero',$data);
        //$this->load->view('Bodega/Superior/Header');
		$this->load->view('Bodega/Stock');
		$this->load->view('layout/footer');
    }
    /*
    public function fetch_data()
    {
        $this->load->model('Clase_ReajustarStock', 'reajustar');

        $fetch_data = $this->reajustar->make_datatables();
        $data = array();
        foreach ($fetch_data as $value) {
            $sub_array      = array();

            $sub_array[]    = $value['Nombre'];
            $sub_array[]    = $value['CANT_INGRESO_BODEGA'];
            $sub_array[]    = $value['CANTIDAD_OLD'];
            $sub_array[]    = $value['FECHA_ENTRADA'];
            $sub_array[]    = $value['PRECIO_COSTO'];
            $sub_array[]    = $value['PRECIO_COSTO_OLD'];
            
            $sub_array[] = '<a href="#" onclick="verMas('.$value['ID_ENTRADA'].'); detallesProd('.$value['ID_ENTRADA'].');">
            <span style="font-size: 21px;" class="glyphicon glyphicon-eye-open" data-toggle="tooltip"></span></a>&nbsp;';
            


           
           
            $data[]         = $sub_array;
        }
        $output = array(
            "draw"                =>     intval($_POST["draw"]),
            "recordsTotal"        =>     $this->reajustar->get_all_data(),
            "recordsFiltered"     =>     $this->reajustar->get_filtered_data(),
            "data"                =>     $data
        );
        echo json_encode($output);
    }


    public function fetch_vermas_data()
    {
        $this->load->model('Clase_ReajustarStock', 'reajustar');

        $fetch_data = $this->reajustar->make_model_vermas($this->input->get('id'))[0];
        echo json_encode($fetch_data);
    }


    public function fetch_detallesprod_data(){
        $this->load->model('Clase_ReajustarStock', 'reajustar');

        $fetch_data = $this->reajustar->make_model_detallesprod($this->input->get('id'))[0];
        echo json_encode($fetch_data);
    }
    */
}
