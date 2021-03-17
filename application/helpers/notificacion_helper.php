<?php
function setNotificaciones($documentacionmodel){
    $CI = get_instance(); //creating instance of CI
    $set_data = $CI->session->all_userdata();
	$data [''] = 0;
    if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 1) {
        $data ['expiracion'] = 0;
        $lista_fecha = $documentacionmodel->ObtenerFechaDocActualizable();
        $fechaactual = date("d-m-Y");
        $data ['totalnotificaciones'] = 0;
        $data ['totaldocumentos'] = 0;
        foreach($lista_fecha as $row){
            //Paso de string a fecha
            $d1 = new DateTime($row->fechalimite);
            $d2 = new DateTime($fechaactual);
            $interval = $d1->diff($d2);
            $diasTotales    = $interval->d; 
            if($diasTotales == 3){
                $data ['lista_nrodocactualizables'] = $documentacionmodel->ObtenerNroDocActualizable($row->fechalimite);
                $data ['expiracion'] = 1;
                $data ['totalnotificaciones'] = $data ['totalnotificaciones'] + 1;
                $data ['totaldocumentos'] = $data ['totaldocumentos'] + 1;
            }
        }
        //Notificaciones para caja chica
        // You may need to load the model if it hasn't been pre-loaded
        $CI->load->model('CajaChicaModel');
        $data ['totalcajachica'] = $CI->CajaChicaModel->obtenerTotalCajaChica();
        $data['is_cajachica'] = false;
        if($data['totalcajachica'][0]->balance <=5000){
            $data['is_cajachica'] = true;
            $data ['totalnotificaciones'] = $data ['totalnotificaciones'] + 1;
        }
    }

    $CI->load->view('layout/nav',$data); //loading of view.php
}