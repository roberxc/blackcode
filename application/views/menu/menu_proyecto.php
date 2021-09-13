<!-- Main Sidebar Container -->
<!-- SELECT CON BUSCADOR -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<?php $set_data = $this->session->all_userdata(); 
   if (isset($set_data['nombre_completo'])) {
     $nombre = $set_data['nombre_completo'];
   }else{
     redirect('/Login', 'refresh');
   }?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="<?php echo base_url()?>Inicio" class="brand-link">
   <img src="<?php echo base_url();?>assets/dist/img/black.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
   <span class="brand-text font-weight-light">CDH Ingenieria</span>
   </a>
   <!-- Sidebar -->
   <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
         <div class="image">
            <img src="<?php echo base_url();?>assets/dist/img/0012.png" class="img-circle elevation-2" alt="User Image">
         </div>
         <div class="info">
            <a href="#" class="d-block"><?php echo $nombre;?></a>
         </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview">
               <a href="<?php echo base_url()?>Inicio" class="nav-link <?php if(isset($activo) && ($activo == 2)){echo "active"; }?>">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                     Inicio
                  </p>
               </a>
            </li>
            <li class="nav-item has-treeview <?php if(isset($activomenu) && ($activomenu == 1)){echo "menu-open"; }?>">
               <a href="#" class="nav-link <?php if(isset($activomenu) && ($activomenu == 1)){echo "active"; }?>">
                  <i class="nav-icon fas fa-hammer"></i>
                  <p>
                     Proyectos
                     <i class="fas fa-angle-left right"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="<?php echo base_url();?>Proyecto/Estado_proyecto"  class="nav-link <?php if(isset($activo) && ($activo == 4)){echo "active"; }?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Estado de proyectos </p>
                     </a>
                  </li>
               </ul>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="<?php echo base_url();?>Proyecto/Proyecto_ejecucion" class="nav-link <?php if(isset($activo) && ($activo == 5)){echo "active"; }?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Proyecto ejecutados </p>
                     </a>
                  </li>
               </ul>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a data-toggle="modal" data-target="#modal-proyecto" class="nav-link <?php if(isset($activo) && ($activo == 7)){echo "active"; }?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Directorio</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item has-treeview <?php if(isset($activomenu) && ($activomenu == 2)){echo "menu-open"; }?>">
               <a href="#" class="nav-link <?php if(isset($activomenu) && ($activomenu == 2)){echo "active"; }?>">
                  <i class="nav-icon fas fa-cog"></i>
                  <p>
                     Sistema
                     <i class="fas fa-angle-left right"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="<?php echo base_url()?>Proyecto/registroTrabajador"
                        class="nav-link <?php if(isset($activo) && ($activo == 6)){echo "active"; }?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Registrar Trabajador</p>
                     </a>
                  </li>

                  <li class="nav-item">
                     <a href="<?php echo base_url()?>Proyecto/listaTrabajadores"
                        class="nav-link <?php if(isset($activo) && ($activo == 5)){echo "active"; }?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Lista de registros</p>
                     </a>
                  </li>
               </ul>
            </li>
         </ul>
      </nav>
      <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
</aside>
<div id="modal-proyecto" class="modal fade bd-example-modal-sm" role="dialog">
   <div class="modal-dialog modal-sm">
      <!-- Contenido del modal -->
      <div class="modal-content">
         <div class="modal-header bg-blue">
            <H3>Administrador de archivos</H3>
            <button type="button" class="close-white" data-dismiss="modal">&times;</button>
         </div>
         <div class="modal-body">
            <div class="modal-body">
               <p>Seleccione el proyecto</p>
            </div>
            <div class="form-group">
               <label for="recipient-bodega" class="col-form-label">Proyecto </label>
               <select name="proyecto" id="id_proyecto" style="width: 100%; height: 60%">
                  <option value="" selected>Seleccione</option>
                  <?php
                     foreach($lista_proyectos as $i){
                        echo '<option value="'. $i->id_proyecto.'">'. $i->nombreproyecto .'</option>';
                        }
                        ?>
               </select>
            </div>
         </div>
         <div class="modal-footer bg-white">
            <button type="button" class="btn btn-primary" id="vista_proyecto">Aceptar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
   $(document).ready(function(){
     $('#id_proyecto').select2({
       theme: "bootstrap"
     });
   });
</script>
<script>var base_url = '<?php echo base_url();?>';</script>
<script src="<?php echo base_url()?>assets/js/PlanillaProyecto/menu_proyecto.js"></script>