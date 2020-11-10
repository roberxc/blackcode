<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Bodega extends CI_Model {

	function __construct(){
		parent::__construct();
    }
    
    public function registrarEntradaProducto($post){
        $datosEntradaProducto = Array();
        //TABLA MATERIAL
        $datosEntradaProducto['Nombre'] = $post['nombreproducto'];
        $datosEntradaProducto['ID_TipoMaterial'] = $post['tipoproducto'];
        $this->db->insert('material', $datosEntradaProducto);

        //TABLA BODEGA
        $datosEntradaProductoBodega['ID_CentroCosto'] = $post['centrocostos'];
        $datosEntradaProductoBodega['ID_TipoBodega'] = 1;
        $datosEntradaProductoBodega['ID_Material'] = $post[''];
        $datosEntradaProductoBodega['FechaIngreso'] = $post[''];
        $datosEntradaProductoBodega['CantidadIngresada'] = $post['cantidadentrada'];
        $datosEntradaProductoBodega['Detalle'] = $post['glosa'];
        $datosEntradaProductoBodega['Stock'] = $post[''];
        $ruta = base_url('RegistroEntrada');
        echo "<script>window.location = '{$ruta}';
        </script>";
    }

    public function registrarCateg($post){
        $datosCategoria = Array();
        $datosCategoria['Nombre'] = $post['nombrecategoria'];
        echo $datosCategoria;
        $this->db->insert('tipomaterial', $datosCategoria);
        $ruta = base_url('RegistroEntrada');
        echo "<script>window.location = '{$ruta}';
        </script>";
    }

    public function verCategorias(){
        $this->db->SELECT('*');
        $this->db->from('tipomaterial');
        $this->db->order_by('Nombre', 'ASC');
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result();
        }
    }

    public function verPersonal(){
        $this->db->SELECT('ID_Personal, NombreCompleto');
        $this->db->from('personal');
        $this->db->order_by('NombreCompleto', 'ASC');
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result();
        }
    }

    public function verCentroCostos(){
        $this->db->SELECT('*');
        $this->db->from('centrocosto');
        $this->db->order_by('Nombre', 'ASC');
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result();
        }
    }

}
?>