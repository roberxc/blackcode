<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {

	public function __construct(){
		parent::__construct();// you have missed this line.
		
	 }

	public function index()
	{
        $this->load->view('Administracion/VRvehiculo');
    }
}