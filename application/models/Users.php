<?php 
class Users extends CI_Model{
    function __construct(){
        $this->load->database();
    }

    public function create($datos){
        $option = 0;
        if($this->siExisteUsuario($datos['email']) == false){
            $password_cifrado = password_hash($datos['password'], PASSWORD_DEFAULT, array("cost"=>12));
            $datos = array(
                'nombre_completo' => $datos['name'],
                'Rut' => $datos['rut'],
                'Telefono' => $datos['telefono'],
                'correo' => $datos['email'],
                'contrasena' => $password_cifrado,
                'id_tipousuario' => $datos['tipo'],
                
            );
            if(!$this->db->insert('usuario', $datos)){
                //Si no se ingresa
                $option = 1;
            }else{
                //Si se ingresa
                $option = 2;
            }
        }else{
            //Si existe
            $option = 3;
        }
        return $option;
    }

    public function siExisteUsuario(string $correo){
		$query = $this->db->select('id_usuario')
		->from('usuario')
		->where('correo',$correo)->get();

        if($query->result()){
            return true;
        }
        return false;
	}
    
}


