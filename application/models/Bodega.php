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
          $datosMaterial['ID_TipoBodega'] = $post['tipobodega'];
          $datosMaterial['ID_TipoMaterial'] = $post['tipoproducto'];
          $datosMaterial['NombreMaterial'] = $post['nombreproducto'];
          $datosMaterial['Stock'] = 0;
          $datosMaterial['Detalle'] = $post['glosa'];
          
          $verificacion = $this->db->insert('material', $datosMaterial);
         
         
          //TABLA ENTRADA
          if($verificacion == TRUE){
               $datosEntrada = Array();

               $datosEntrada['ID_Proyecto'] = $post['centrocostos'];
               $datosEntrada['CantidadIngresada'] = $post['cantidadentrada'];
               $this->db->insert('entrada', $datosEntrada);
               $ruta = base_url('RegistroEntrada');
               echo "<script>window.location = '{$ruta}';
               </script>";
          }
    }

    function actualizarStockProducto($post){
     //TABLA MATERIAL

     $datosdetalleentrada = Array();
     $datosdetalleentrada['ID_Material'] = $post['material'];
     //$datosdetalleentrada['FechaEntrada'] = Date("Y-m-d");
     $verificacion = $this->db->insert('detalleentrada', $datosdetalleentrada);
     
    
     //TABLA ENTRADA
     if($verificacion == TRUE){
          $datosdetalleentrada = Array();
          $datosEntrada = Array();
          $datosEntrada['ID_Proyecto'] = $post['centrodecostos2'];
          $datosEntrada['CantidadIngresada'] = $post['cantidadentradaagregar'];
          $this->db->insert('entrada', $datosEntrada);

          $cantidadporactualizar = $post['cantidadentradaagregar'];
          $this->db->set('Stock', 'Stock + '. (int) $cantidadporactualizar,FALSE);
          $this->db->set('Detalle', $post['glosaactualizar']);
          $this->db->where('ID_Material', $post['material']);
          $this->db->update('material');
          
          $ruta = base_url('RegistroEntrada');
          echo "<script>window.location = '{$ruta}';
          </script>";
     }
}


    //INICIO DE SACAR UN MATERIAL ---- SALIDA
    function insertarSalidaProducto($post){
          $cantidadporsalir = $post['cantidadsalida'];
          $this->db->set('Stock', 'Stock - '. (int) $cantidadporsalir,FALSE);
          $this->db->where('ID_Material', $post['material']);
          $verificacion = $this->db->update('material');
          $datosdetallesalida = Array();
          $datosdetallesalida['ID_Material'] = $post['material'];
          $datosdetallesalida['FechaSalida'] = Date("Y-m-d");
          $this->db->insert('detallesalida', $datosdetallesalida);
          
            //TABLA SALIDA
          if($verificacion == TRUE){
               $datosSalida = Array();
               $datosSalida['ID_Proyecto'] = $post['centrocostos'];
               $datosSalida['CantidadSalida'] = $post['cantidadsalida'];
               $this->db->insert('salida', $datosSalida);
               $ruta = base_url('RegistroSalida');
               echo "<script>window.location = '{$ruta}';
               </script>";
               }
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


    //MOSTRAR CATEGORIAS EN SELECT
    public function verMateriales(){
     $this->db->SELECT('ID_Material, NombreMaterial');
     $this->db->from('material');
     $this->db->order_by('NombreMaterial', 'ASC');
     $query = $this->db->get();
     if($query->num_rows()>0){
         return $query->result();
     }
 }


    
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
     $this->db->SELECT('material.ID_Material, NombreMaterial');
     $this->db->from('material');
     $this->db->where('material.ID_Material = material.ID_Material AND material.stock > 0');
     $this->db->order_by('NombreMaterial', 'ASC');
     $query = $this->db->get();
     if($query->num_rows()>0){
         return $query->result();
          }
     }



        //ESTE ES EL SELECT DE LA TABLA PRINCIPAL DE ENTRADA

        var $table = array("tipomaterial","tipobodega","material","proyecto", "entrada", "detalleentrada");  
        var $select_column = array("entrada.ID_Entrada", "NombreMaterial","material.ID_Material", "NombreTipoMaterial", "NombreProyecto", "FechaEntrada", "entrada.CantidadIngresada", "NombreTipoBodega");  
        var $order_column = array("entrada.ID_Entrada", "NombreMaterial","material.ID_Material", "NombreTipoMaterial", "NombreProyecto", "FechaEntrada", "entrada.CantidadIngresada", "NombreTipoBodega");  
        var $wheree = "material.ID_TipoBodega = tipobodega.ID_TipoBodega AND tipomaterial.ID_TipoMaterial = material.ID_TipoMaterial AND entrada.ID_Proyecto = proyecto.ID_Proyecto AND entrada.ID_Entrada = detalleentrada.ID_Entrada AND material.ID_Material = detalleentrada.ID_Material";
      
      
        function make_query_entrada()  
      {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table);  
           $this->db->where($this->wheree);
           if(isset($_POST["search"]["value"]) && $_POST["search"]["value"] != '')  
           {  
                $this->db->like("NombreMaterial", $_POST["search"]["value"]);  
                //$this->db->or_like("NombreTipoMaterial", $_POST["search"]["value"]);  
                //$this->db->or_like("CantidadIngresada", $_POST["search"]["value"]);  
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
           $this->db->where("material.ID_TipoBodega = tipobodega.ID_TipoBodega AND tipomaterial.ID_TipoMaterial = material.ID_TipoMaterial AND entrada.ID_Proyecto = proyecto.ID_Proyecto AND entrada.ID_Entrada = detalleentrada.ID_Entrada AND material.ID_Material = detalleentrada.ID_Material");
           return $this->db->count_all_results();  
      }  



      //MOSTRAR TABLA DE MODEL VER MAS

      function make_query_vermas($IDENTRADA = '0')
      {
        $table = array("tipobodega","material");  
        $select_column = array("NombreTipoBodega","Detalle");  
        $order_column = array("NombreTipoBodega","Detalle");  
        $wheree = array("material.ID_TipoBodega = tipobodega.ID_TipoBodega AND material.ID_Material=",$IDENTRADA);
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
          $this->db->from('tipobodega, material');
          $this->db->where('material.ID_TipoBodega = tipobodega.ID_TipoBodega');
          return $this->db->count_all_results();
      }
  


    //ESTE ES EL SELECT DE LA TABLA PRINCIPAL DE SALIDA

    var $tablasalida = array("detallesalida","tipomaterial","tipobodega","material","proyecto", "salida");  
    var $select_columnasalida = array("salida.ID_Salida", "NombreMaterial", "material.ID_Material", "NombreTipoMaterial", "NombreProyecto", "FechaSalida", "salida.CantidadSalida", "NombreTipoBodega");  
    var $order_columnasalida = array("salida.ID_Salida", "NombreMaterial", "material.ID_Material", "NombreTipoMaterial", "NombreProyecto", "FechaSalida", "salida.CantidadSalida", "NombreTipoBodega");  
    var $wheresalida = "material.ID_TipoBodega = tipobodega.ID_TipoBodega AND material.ID_TipoMaterial = tipomaterial.ID_TipoMaterial AND material.ID_Material = detallesalida.ID_Material AND detallesalida.ID_Salida = salida.ID_Salida AND salida.ID_Proyecto = proyecto.ID_Proyecto";
  
  
    function make_query_salida()  
  {  
       $this->db->select($this->select_columnasalida);  
       $this->db->from($this->tablasalida);  
       $this->db->where($this->wheresalida);
       if(isset($_POST["search"]["value"]) && $_POST["search"]["value"] != '')  
       {  
            $this->db->like("NombreMaterial", $_POST["search"]["value"]);  
            //$this->db->or_like("CantidadSalida", $_POST["search"]["value"]);  
       }  
       if(isset($_POST["order"]))  
       {  
            $this->db->order_by($this->order_columnasalida[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
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
       $this->db->select($this->select_columnasalida);  
       $this->db->from($this->tablasalida);  
       $this->db->where("material.ID_TipoBodega = tipobodega.ID_TipoBodega AND material.ID_TipoMaterial = tipomaterial.ID_TipoMaterial AND material.ID_Material = detallesalida.ID_Material AND detallesalida.ID_Salida = salida.ID_Salida AND salida.ID_Proyecto = proyecto.ID_Proyecto");
       return $this->db->count_all_results();  
  }  


    //ESTE ES EL SELECT DE LA TABLA PRINCIPAL DE SALIDA

    var $tablaaa = array("material","tipomaterial","tipobodega");  
    var $select_columnaaa = array("material.ID_Material", "NombreMaterial", "NombreTipoMaterial","material.Stock", "NombreTipoBodega");  
    var $order_columnaaa = array("material.ID_Material", "NombreMaterial", "NombreTipoMaterial", "material.Stock", "NombreTipoBodega");  
    var $whereee = "material.ID_TipoBodega = tipobodega.ID_TipoBodega AND material.ID_TipoMaterial = tipomaterial.ID_TipoMaterial";

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
              $this->db->order_by('ID_Material', 'ASC');    

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
     $this->db->where("material.ID_TipoBodega = tipobodega.ID_TipoBodega AND material.ID_TipoMaterial = tipomaterial.ID_TipoMaterial");
     return $this->db->count_all_results();  
     }  
  


}
?>