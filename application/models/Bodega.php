<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Bodega extends CI_Model {

	function __construct(){
		parent::__construct();
    }
    
    //INICIO DE INGRESAR MATERIAL NUEVO
     function insertarEntradaProducto($post){
          //TABLA MATERIAL
          $datosMaterial = Array();
          $datosMaterial['id_tipobodega'] = $post['tipobodega'];
          $datosMaterial['id_tipomaterial'] = $post['tipoproducto'];
          $datosMaterial['nombrematerial'] = $post['nombreproducto'];
          $datosMaterial['stock'] = $post['cantidadentrada'];
          $datosMaterial['detalle'] = $post['glosa'];
          
          $verificacion = $this->db->insert('material', $datosMaterial);
         
         
          //TABLA ENTRADA
          if($verificacion == TRUE){
               $datosEntrada = Array();

               $datosEntrada['id_proyecto'] = $post['centrocostos'];
               $datosEntrada['cantidadingresada'] = $post['cantidadentrada'];
               $this->db->insert('entrada', $datosEntrada);
          }
    }

    function actualizarStockProducto($post){
     //TABLA MATERIAL

     $datosdetalleentrada = Array();
     $datosdetalleentrada['id_material'] = $post['material'];
     //$datosdetalleentrada['FechaEntrada'] = Date("Y-m-d");
     $verificacion = $this->db->insert('detalleentrada', $datosdetalleentrada);
     
    
     //TABLA ENTRADA
     if($verificacion == TRUE){
          $datosdetalleentrada = Array();
          $datosEntrada = Array();
          $datosEntrada['id_proyecto'] = $post['centrodecostos2'];
          $datosEntrada['cantidadingresada'] = $post['cantidadentradaagregar'];
          $this->db->insert('entrada', $datosEntrada);

          $cantidadporactualizar = $post['cantidadentradaagregar'];
          $this->db->set('stock', 'stock + '. (int) $cantidadporactualizar,FALSE);
          $this->db->set('detalle', $post['glosaactualizar']);
          $this->db->where('id_material', $post['material']);
          $this->db->update('material');
          
     }
}


    //INICIO DE SACAR UN MATERIAL ---- SALIDA
    function insertarSalidaProducto($post){
          $bandera = false;
          $cantidadporsalir = $post['cantidadsalida'];
          $this->db->select('stock');
          $this->db->from('material');
          $this->db->where('id_material', $post['material']);

          $consulta = $this->db->get();
          $resultado = $consulta->row()->stock;
          //echo $cantidadporsalir;//echo "---";//print $resultado;


          if($resultado < $cantidadporsalir){
               //echo '<script>alert("La cantidad de stock que se desea retirar no se encuentra en bodega");</script>';
               //alertify
               $bandera = false;
          }
          else{
               $this->db->set('stock', 'stock - '. (int) $cantidadporsalir,FALSE);
          $this->db->where('id_material', $post['material']);
          $verificacion = $this->db->update('material');
          $datosdetallesalida = Array();
          $datosdetallesalida['id_material'] = $post['material'];
          //$datosdetallesalida['FechaSalida'] = Date("Y-m-d");
          $this->db->insert('detallesalida', $datosdetallesalida);
          $bandera = true;
          
            //TABLA SALIDA
          if($verificacion == TRUE){
               $datosSalida = Array();
               $datosSalida['id_proyecto'] = $post['centrocostos'];
               $datosSalida['cantidadsalida'] = $post['cantidadsalida'];
               $this->db->insert('salida', $datosSalida);
               $bandera = true;
               }
          else{
               $bandera = false;
          }
          }
          return $bandera;
     }






         //REGISTRAR CATEGORIAS -> TIPOMATERIAL
    public function registrarCateg($post){
     $datosCategoria = Array();
     $datosCategoria['nombretipomaterial'] = $post['nombrecategoria'];
     $this->db->insert('tipomaterial', $datosCategoria);
     }   


    //MOSTRAR CATEGORIAS EN SELECT
    public function verMateriales(){
     $this->db->SELECT('id_material, nombrematerial');
     $this->db->from('material');
     $this->db->order_by('nombrematerial', 'ASC');
     $query = $this->db->get();
     if($query->num_rows()>0){
         return $query->result();
     }
 }


    
    //MOSTRAR CATEGORIAS EN SELECT
    public function verCategorias(){
        $this->db->SELECT('*');
        $this->db->from('tipomaterial');
        $this->db->order_by('nombretipomaterial', 'ASC');
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result();
        }
    }

    //MOSTRAR PERSONAL EN SELECT
    public function verPersonal(){
        $this->db->SELECT('id_personal, nombrecompleto');
        $this->db->from('personal');
        $this->db->order_by('nombrecompleto', 'ASC');
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result();
        }
    }

    //MOSTRAR PROYECTOS EN SELECT
    public function verCentroCostos(){
        $this->db->SELECT('*');
        $this->db->from('proyecto');
        $this->db->order_by('nombreproyecto', 'ASC');
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result();
        }
    }

    //MOSTRAR BODEGAS EN SELECT
    public function verBodega(){
     $this->db->SELECT('id_tipobodega, nombretipobodega');
     $this->db->from('tipobodega');
     $this->db->order_by('nombretipobodega', 'ASC');
     $query = $this->db->get();
     if($query->num_rows()>0){
         return $query->result();
          }
     }

         //MOSTRAR MATERIALES PARA SALIDA EN SELECT
    public function verMaterialesDisponiblesBodega(){
     $this->db->SELECT('material.id_material, nombrematerial');
     $this->db->from('material');
     $this->db->where('material.id_material = material.id_material AND material.stock > 0');
     $this->db->order_by('nombrematerial', 'ASC');
     $query = $this->db->get();
     if($query->num_rows()>0){
         return $query->result();
          }
     }



        //ESTE ES EL SELECT DE LA TABLA PRINCIPAL DE ENTRADA

        var $table = array("tipomaterial","tipobodega","material","proyecto", "entrada", "detalleentrada");  
        var $select_column = array("entrada.id_entrada", "nombrematerial","material.id_material", "nombretipomaterial", "nombreproyecto", "fechaentrada", "entrada.cantidadingresada", "nombretipobodega", "detalle");  
        var $order_column = array("entrada.id_entrada", "nombrematerial","material.id_material", "nombretipomaterial", "nombreproyecto", "fechaentrada", "entrada.cantidadingresada", "nombretipobodega");  
        var $wheree = "material.id_tipobodega = tipobodega.id_tipobodega AND tipomaterial.id_tipomaterial = material.id_tipomaterial AND entrada.id_proyecto = proyecto.id_proyecto AND entrada.id_entrada = detalleentrada.id_entrada AND material.id_material = detalleentrada.id_material";
      
      
        function make_query_entrada()  
      {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table);  
           $this->db->where($this->wheree);
           if(isset($_POST["search"]["value"]) && $_POST["search"]["value"] != '')  
           {  
                $this->db->like("nombrematerial", $_POST["search"]["value"]);  
                //$this->db->or_like("NombreTipoMaterial", $_POST["search"]["value"]);  
                //$this->db->or_like("CantidadIngresada", $_POST["search"]["value"]);  
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('id_material', 'ASC');    
 
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
           $this->db->where("material.id_tipobodega = tipobodega.id_tipobodega AND tipomaterial.id_tipomaterial = material.id_tipomaterial AND entrada.id_proyecto = proyecto.id_proyecto AND entrada.id_entrada = detalleentrada.id_entrada AND material.id_material = detalleentrada.id_material");
           return $this->db->count_all_results();  
      }  



      //MOSTRAR TABLA DE MODEL VER MAS

      function make_query_vermas($IDENTRADA = '0')
      {
        $tableeee = array("material", "tipobodega");  
        $select_columnn = array("material.nombrematerial","tipobodega.nombretipobodega", "material.detalle");  
        //$order_column = array("nombrematerial","nombretipobodega","detalle");  
        $whereeeee = array("material.id_tipobodega = tipobodega.id_tipobodega AND material.id_material=",$IDENTRADA);
        $this->db->SELECT($select_columnn);
        $this->db->from($tableeee);
        $this->db->where($whereeeee);
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
          $this->db->SELECT('nombrematerial, nombretipobodega, detalle');
          $this->db->from('tipobodega, material');
          $this->db->where('material.id_tipoBodega = tipobodega.id_tipobodega');
          return $this->db->count_all_results();
      }
  


    //ESTE ES EL SELECT DE LA TABLA PRINCIPAL DE SALIDA

    var $tablasalida = array("detallesalida","tipomaterial","tipobodega","material","proyecto", "salida");  
    var $select_columnasalida = array("salida.id_salida", "nombrematerial", "material.id_material", "nombretipomaterial", "nombreproyecto", "fechasalida", "salida.cantidadsalida", "nombretipobodega");  
    var $order_columnasalida = array("salida.id_salida", "nombrematerial", "material.id_material", "nombretipomaterial", "nombreproyecto", "fechasalida", "salida.cantidadsalida", "nombretipobodega");  
    var $wheresalida = "material.id_tipobodega = tipobodega.id_tipobodega AND material.id_tipomaterial = tipomaterial.id_tipomaterial AND material.id_material = detallesalida.id_material AND detallesalida.id_salida = salida.id_salida AND salida.id_proyecto = proyecto.id_proyecto";
  
  
    function make_query_salida()  
  {  
       $this->db->select($this->select_columnasalida);  
       $this->db->from($this->tablasalida);  
       $this->db->where($this->wheresalida);
       if(isset($_POST["search"]["value"]) && $_POST["search"]["value"] != '')  
       {  
            $this->db->like("nombrematerial", $_POST["search"]["value"]);  
            //$this->db->or_like("CantidadSalida", $_POST["search"]["value"]);  
       }  
       if(isset($_POST["order"]))  
       {  
            $this->db->order_by($this->order_columnasalida[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
       }  
       else  
       {  
            $this->db->order_by('id_material', 'ASC');    

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
       $this->db->select($this->select_columnasalida);  
       $this->db->from($this->tablasalida);  
       $this->db->where("material.id_tipobodega = tipobodega.id_tipobodega AND material.id_tipomaterial = tipomaterial.id_tipomaterial AND material.id_material = detallesalida.id_material AND detallesalida.id_salida = salida.id_salida AND salida.id_Proyecto = proyecto.id_proyecto");
       return $this->db->count_all_results();  
  }  


    //ESTE ES EL SELECT DE LA TABLA PRINCIPAL DE Stock

    var $tablaaa = array("material","tipomaterial","tipobodega");  
    var $select_columnaaa = array("material.id_material", "nombrematerial", "nombretipomaterial","material.stock", "nombretipobodega");  
    var $order_columnaaa = array("material.id_material", "nombrematerial", "nombretipomaterial", "material.stock", "nombretipobodega");  
    var $whereee = "material.id_tipobodega = tipobodega.id_tipobodega AND material.id_tipomaterial = tipomaterial.id_tipomaterial";

    function make_query_stock()  
    {  
         $this->db->select($this->select_columnaaa);  
         $this->db->from($this->tablaaa);  
         $this->db->where($this->whereee);
         if(isset($_POST["search"]["value"]) && $_POST["search"]["value"] != '')  
         {  
              $this->db->like("NombreMaterial", $_POST["search"]["value"]);  
         }  
         if(isset($_POST["order"]))  
         {  
              $this->db->order_by($this->order_columnaaa[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
         }  
         else  
         {  
              $this->db->order_by('id_material', 'ASC');    

         }  
    }  
    function make_datatables_stock(){  
     $this->make_query_stock();  
     if ($_POST["length"] != -1) {
      $this->db->limit($_POST['length'], $_POST['start']);
     } 
     $query = $this->db->get();  
     return $query->result(); 
      
     }  
     function get_filtered_data_stock(){  
     $this->make_query_stock();  
     $query = $this->db->get();  
     return $query->num_rows();  
     }       
     function get_all_data_stock()
     {  
     $this->db->select($this->select_columnaaa);  
     $this->db->from($this->tablaaa);  
     $this->db->where("material.id_tipobodega = tipobodega.id_tipobodega AND material.id_tipomaterial = tipomaterial.id_tipomaterial");
     return $this->db->count_all_results();  
     }  

     public function getStockMateriales()
     {
         $this->db->SELECT('m.id_material, m.nombrematerial, m.stock');
         $this->db->from('material m');
         $this->db->join('tipomaterial tm', 'm.id_tipomaterial = tm.id_tipomaterial');
         $this->db->join('tipobodega tb', 'm.id_tipobodega = tb.id_tipobodega');
         $this->db->where('m.stock <=10');
         $query = $this->db->get();
         if ($query->num_rows() > 0)
         {
             return $query->result();
         }
 
     }


}
?>