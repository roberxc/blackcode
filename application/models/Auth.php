<?php
class Auth extends CI_Model {
    function __construct(){
        $this->load->database();
    }
   /**La deje con limite usuario = 1 para evitar redundancia de usuarios o errores similares con usuarios 
    * por que estoy trabajando con array solo por eso para que no mande un monton de registrso xD
   */
    public function login($usuario, $password) {
        $data = $this->db->get_where('usuario', array('correo' => $usuario, 'contrasena' => $password),1);
        if(!$data->result()){
            return false;
        }
        return $data->row();
    }
}