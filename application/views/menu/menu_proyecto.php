<!-- Main Sidebar Container -->
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
                     <a href="<?php echo base_url();?>Proyecto/Registro_proyecto" class="nav-link <?php if(isset($activo) && ($activo == 8)){echo "active"; }?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Evaluar Proyecto</p>
                     </a>
                  </li>
               </ul>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="<?php echo base_url();?>Proyecto/Estado_proyecto"  class="nav-link <?php if(isset($activo) && ($activo == 4)){echo "active"; }?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Estado del proyecto </p>
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
                     <a href="<?php echo base_url();?>Proyecto/AdminArchivos" class="nav-link <?php if(isset($activo) && ($activo == 6)){echo "active"; }?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Administrador de archivos</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item has-treeview <?php if(isset($activomenu) && ($activomenu == 15)){echo "menu-open"; }?>">
               <a href="#"
                  class="nav-link <?php if(isset($activomenu) && ($activomenu == 15)){echo "active"; }?>">
                  <i class="nav-icon fas fa-receipt"></i>
                  <p>
                     Compras
                     <i class="fas fa-angle-left right"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="<?php echo base_url()?>Proveedores"
                        class="nav-link <?php if(isset($activo) && ($activo == 16)){echo "active"; }?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Proveedores</p>
                     </a>
                  </li>
               </ul>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="<?php echo base_url()?>Cotizacion"
                        class="nav-link <?php if(isset($activo) && ($activo == 19)){echo "active"; }?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Cotizaciones</p>
                     </a>
                  </li>
               </ul>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="<?php echo base_url()?>Ordenes"
                        class="nav-link <?php if(isset($activo) && ($activo == 15)){echo "active"; }?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Ordenes de compra</p>
                     </a>
                  </li>
               </ul>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="<?php echo base_url()?>Factura"
                        class="nav-link <?php if(isset($activo) && ($activo == 18)){echo "active"; }?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Facturas</p>
                     </a>
                  </li>
               </ul>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="<?php echo base_url()?>ComprobantePago"
                        class="nav-link <?php if(isset($activo) && ($activo == 21)){echo "active"; }?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Comprobantes de pago</p>
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
               </ul>
            </li>
         </ul>
      </nav>
      <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
</aside>