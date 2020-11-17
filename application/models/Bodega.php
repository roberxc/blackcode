<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Bodega extends CI_Model {

	function __construct(){
		parent::__construct();
    }
    
    //INICIO DE REGISTRO
     function registrarEntradaProducto($post){
        $datosEntradaProducto = Array();
        //TABLA MATERIAL
        $datosEntradaProducto['Nombrematerial'] = $post['nombreproducto'];
        $datosEntradaProducto['ID_TipoMaterial'] = $post['tipoproducto'];
        $this->db->insert('material', $datosEntradaProducto);

        //TABLA BODEGA
        $datosEntradaProductoBodega['ID_TipoBodega'] = $post['bodega'];
        $datosEntradaProductoBodega['ID_Material'] = $post['tipoproducto'];
        $datosEntradaProductoBodega['Detalle'] = $post['glosa'];
        $datosEntradaProductoBodega['Stock'] = $post['cantidadentrada'];

        $this->db->insert('bodega', $datosEntradaProducto);

        //TABLA ENTRADA

        $datosEntrada['ID_Proyecto'] = $post['centrocostos'];
        $datosEntrada['FechaEntrada'] = $post['fechaentrada'];
        $datosEntrada['CantidadIngresada'] = $post['cantidadentrada'];
        $datosEntrada['ID_Proyecto'] = $post['centrocostos'];

        $this->db->insert('entrada', $datosEntrada);

        $ruta = base_url('RegistroEntrada');
        echo "<script>window.location = '{$ruta}';
        </script>";
    }

    //REGISTRAR CATEGORIAS -> TIPOMATERIAL
    public function registrarCateg($post){
        $datosCategoria = Array();
        $datosCategoria['NombreTipoMaterial'] = $post['nombrecategoria'];
        $this->db->insert('tipomaterial', $datosCategoria);
        $ruta = base_url('RegistroEntrada');
        echo "<script>window.location = '{$ruta}';
        </script>";
        }   



        //INICIO DE REGISTRO
     function registrarSalidaProducto($post){
          $datosEntradaProductoBodega = Array();
  
          //TABLA BODEGA
          $datosEntradaProductoBodega['ID_TipoBodega'] = $post['bodega'];
          $datosEntradaProductoBodega['ID_Material'] = $post['tipoproducto'];
          $datosEntradaProductoBodega['Detalle'] = $post['glosa'];
          $datosEntradaProductoBodega['Stock'] = $post['cantidadentrada'];
  
          $this->db->insert('bodega', $datosEntradaProducto);
  
          //TABLA ENTRADA
  
          $datosEntrada['ID_Proyecto'] = $post['centrocostos'];
          $datosEntrada['FechaEntrada'] = $post['fechaentrada'];
          $datosEntrada['CantidadIngresada'] = $post['cantidadentrada'];
          $datosEntrada['ID_Proyecto'] = $post['centrocostos'];
  
          $this->db->insert('entrada', $datosEntrada);
  
          $ruta = base_url('RegistroEntrada');
          echo "<script>window.location = '{$ruta}';
          </script>";
      }
    
    //FIN REGISTRO

    
    //MOSTRAR CATEGORIAS EN SELECT
    public function verCategorias(){
        $this->db->SELECT('*');
        $this->db->from('tipomaterial');
        $this->db->order_by('NombreTipoMaterial', 'ASC');
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result();
        }
    }

    //MOSTRAR PERSONAL EN SELECT
    public function verPersonal(){
        $this->db->SELECT('ID_Personal, NombreCompleto');
        $this->db->from('personal');
        $this->db->order_by('NombreCompleto', 'ASC');
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result();
        }
    }

    //MOSTRAR PROYECTOS EN SELECT
    public function verCentroCostos(){
        $this->db->SELECT('*');
        $this->db->from('proyecto');
        $this->db->order_by('NombreProyecto', 'ASC');
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result();
        }
    }

    //MOSTRAR BODEGAS EN SELECT
    public function verBodega(){
     $this->db->SELECT('ID_TipoBodega, NombreTipoBodega');
     $this->db->from('tipobodega');
     $this->db->order_by('NombreTipoBodega', 'ASC');
     $query = $this->db->get();
     if($query->num_rows()>0){
         return $query->result();
          }
     }

         //MOSTRAR MATERIALES PARA SALIDA EN SELECT
    public function verMaterialesDisponiblesBodega(){
     $this->db->SELECT('bodega.ID_Material, NombreMaterial');
     $this->db->from('bodega, material');
     $this->db->where('bodega.ID_Material = material.ID_Material AND bodega.stock > 0');
     $this->db->order_by('NombreMaterial', 'ASC');
     $query = $this->db->get();
     if($query->num_rows()>0){
         return $query->result();
          }
     }



        //ESTE ES EL SELECT DE LA TABLA PRINCIPAL DE ENTRADA

        var $table = array("bodega","tipomaterial","tipobodega","material","proyecto", "entrada");  
        var $select_column = array("material.ID_Material", "NombreMaterial", "NombreTipoMaterial", "NombreProyecto", "FechaEntrada", "entrada.CantidadIngresada", "NombreTipoBodega");  
        var $order_column = array("ID_Material", "NombreMaterial", "NombreTipoMaterial", "NombreProyecto", "FechaEntrada", "CantidadIngresada", "NombreTipoBodega");  
        var $wheree = "bodega.ID_TipoBodega = tipobodega.ID_TipoBodega AND material.ID_Material = bodega.ID_Material AND tipomaterial.ID_TipoMaterial = material.ID_TipoMaterial AND bodega.ID_Registro = entrada.ID_Registro AND entrada.ID_Proyecto = proyecto.ID_Proyecto";
      
      
        function make_query_entrada()  
      {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table);  
           $this->db->where($this->wheree);
           if(isset($_POST["search"]["value"]) && $_POST["search"]["value"] != '')  
           {  
                $this->db->like("NombreMaterial", $_POST["search"]["value"]);  
                $this->db->or_like("NombreTipoMaterial", $_POST["search"]["value"]);  
                $this->db->or_like("CantidadIngresada", $_POST["search"]["value"]);  
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('ID_Material', 'ASC');    
 
           }  
      }  
      function make_datatables_entrada(){  
           $this->make_query_entrada();  
           if ($_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        } 
           $query = $this->db->get();  
           return $query->result(); 
            
      }  
      function get_filtered_data_entrada(){  
           $this->make_query_entrada();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_entrada()  
      {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table);  
           $this->db->where("bodega.ID_TipoBodega = tipobodega.ID_TipoBodega AND material.ID_Material = bodega.ID_Material AND tipomaterial.ID_TipoMaterial = material.ID_TipoMaterial AND bodega.ID_Registro = entrada.ID_Registro AND entrada.ID_Proyecto = proyecto.ID_Proyecto");
           return $this->db->count_all_results();  
      }  



      //MOSTRAR TABLA DE MODEL VER MAS

      function make_query_vermas($IDENTRADA = '0')
      {
        $table = array("tipobodega","bodega");  
        $select_column = array("NombreTipoBodega","Detalle");  
        $order_column = array("NombreTipoBodega","Detalle");  
        $wheree = array("bodega.ID_TipoBodega = tipobodega.ID_TipoBodega AND bodega.ID_Material=",$IDENTRADA);
        $this->db->SELECT($select_column);
        $this->db->from($table);
        $this->db->where($wheree);
      }
  
      function make_model_vermas($IDENTRADA = '0')
      {
          $this->make_query_vermas($IDENTRADA);
          $query = $this->db->get();
          return $query->result_array();
      }
      function get_filtered_data_vermas()
      {
          $this->make_query_vermas($IDENTRADA = '0');
          $query = $this->db->get();
          return $query->num_rows();
      }
      function get_all_data_vermas()
      {
          $this->db->SELECT('NombreTipoBodega, Detalle');
          $this->db->from('tipobodega, bodega');
          $this->db->where('bodega.ID_TipoBodega = tipobodega.ID_TipoBodega');
          return $this->db->count_all_results();
      }
  



      //ESTE ES EL SELECT DE LA TABLA PRINCIPAL DE SALIDA

      var $tabla = array("bodega","tipomaterial","tipobodega","material","proyecto", "salida");  
      var $select_columna = array("material.ID_Material", "NombreMaterial", "NombreTipoMaterial", "NombreProyecto", "FechaSalida", "salida.CantidadSalida", "NombreTipoBodega");  
      var $order_columna = array("ID_Material", "NombreMaterial", "NombreTipoMaterial", "NombreProyecto", "FechaSalida", "salida.CantidadSalida", "NombreTipoBodega");  
      var $where = "bodega.ID_TipoBodega = tipobodega.ID_TipoBodega AND material.ID_Material = bodega.ID_Material AND tipomaterial.ID_TipoMaterial = material.ID_TipoMaterial AND bodega.ID_Registro = salida.ID_Registro AND salida.ID_Proyecto = proyecto.ID_Proyecto";
    
    
      function make_query_salida()  
    {  
         $this->db->select($this->select_columna);  
         $this->db->from($this->tabla);  
         $this->db->where($this->where);
         if(isset($_POST["search"]["value"]) && $_POST["search"]["value"] != '')  
         {  
              $this->db->like("NombreMaterial", $_POST["search"]["value"]);  
              $this->db->or_like("NombreTipoMaterial", $_POST["search"]["value"]);  
              $this->db->or_like("CantidadIngresada", $_POST["search"]["value"]);  
         }  
         if(isset($_POST["order"]))  
         {  
              $this->db->order_by($this->order_columna[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
         }  
         else  
         {  
              $this->db->order_by('ID_Material', 'ASC');    

         }  
    }  
    function make_datatables_salida(){  
         $this->make_query_salida();  
         if ($_POST["length"] != -1) {
          $this->db->limit($_POST['length'], $_POST['start']);
      } 
         $query = $this->db->get();  
         return $query->result(); 
          
    }  
    function get_filtered_data_salida(){  
         $this->make_query_salida();  
         $query = $this->db->get();  
         return $query->num_rows();  
    }       
    function get_all_data_salida()  
    {  
         $this->db->select($this->select_columna);  
         $this->db->from($this->tabla);  
         $this->db->where("bodega.ID_TipoBodega = tipobodega.ID_TipoBodega AND material.ID_Material = bodega.ID_Material AND tipomaterial.ID_TipoMaterial = material.ID_TipoMaterial AND bodega.ID_Registro = salida.ID_Registro AND salida.ID_Proyecto = proyecto.ID_Proyecto");
         return $this->db->count_all_results();  
    }  

}
?>