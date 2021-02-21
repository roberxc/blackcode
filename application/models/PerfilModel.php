<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PerfilModel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function updatePerfil($data,$tokenuser){

        $password_cifrado = password_hash($data['setpassword'], PASSWORD_DEFAULT, array("cost"=>12));

        $datauser = array(
            'nombre_completo' => $data['nombre'],
            'correo' => $data['correo'],
            'contrasena' => $password_cifrado,
        );
        $this->db->where('correo', $tokenuser['correo']);
		return $this->db->update('usuario',$datauser);
    }

    public function obtenerPerfil($idusuario){
		$query = $this->db
				->select("u.nombre_completo,u.rut,u.telefono,u.correo,u.contrasena,t.rol") # También puedes poner * si quieres seleccionar todo
				->from("usuario u")
                ->join("tipousuario t", "t.id_tipousuario = u.id_tipousuario")
                ->where("u.id_usuario",$idusuario)
				->get();
    	return $query->result();
	}
}

?>
