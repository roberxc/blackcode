<?php
class Auth extends CI_Model {
    function __construct(){
        $this->load->database();
    }
   /**La deje con limite usuario = 1 para evitar redundancia de usuarios o errores similares con usuarios 
    * por que estoy trabajando con array solo por eso para que no mande un monton de registrso xD
   */
    public function login($usuario, $password) {
        
        $querypass = $this->db->select("contrasena") # También puedes poner * si quieres seleccionar todo
				->from("usuario")
				->where('correo', $usuario)
                ->get()
                ->result_array();
        if(count($querypass) > 0){
            if(password_verify($password,$querypass[0]['contrasena'])){
                $data = $this->db->get_where('usuario', array('correo' => $usuario),1);
                return $data->row();
            }else{
                return false;
            }
        }
        return false;

    }

    public function getCurrentPassword($correo,$password) {
        
        $querypass = $this->db->select("contrasena") # También puedes poner * si quieres seleccionar todo
				->from("usuario")
				->where('correo', $correo)
                ->get()
                ->result_array();
        if(count($querypass) > 0){
            if(password_verify($password,$querypass[0]['contrasena'])){
                return true;
            }else{
                return false;
            }
        }
        return false;

    }
}