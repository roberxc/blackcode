<?php
class ModelsUsers extends CI_Model
{
    function __construct()
    {
        $this->load->database();
    }
    /**La deje con limite usuario = 1 para evitar redundancia de usuarios o errores similares con usuarios 
     * por que estoy trabajando con array solo por eso para que no mande un monton de registrso xD
     */
    public function save($user, $user_info){
        $this->db->trans_start();
        $this->db->insert('usuario', $user);
        $user_info['id_usuario'] = $this->db->insert_id();
        $this->db->insert('usuario', $user_info);
        $this->db->trans_complete();
        return !$this->db->trans_status() ? false : true;
    }
}