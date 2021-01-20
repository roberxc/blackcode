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
         <img src="<?php echo base_url();?>assets/dist/img/black.png" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">BlackCode</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="<?php echo base_url();?>assets/dist/img/0017.png" class="img-circle elevation-2"
                     alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block">Menú Administrador<?php # echo $nombre;?></a>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item has-treeview">
                     <a href="<?php echo base_url()?>Inicio"
                         class="nav-link <?php if(isset($activo) && ($activo == 2)){echo "active"; }?>">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Inicio
                         </p>
                     </a>
                 </li>
                 <li class="nav-item has-treeview <?php if(isset($activo) && ($activo == 30)){echo "menu-open"; }?>">
                     <a href="#" class="nav-link <?php if(isset($activo) && ($activo == 30)){echo "active"; }?>">
                         <i class="nav-icon fas fa-hammer"></i>
                         <p>
                             Trabajos Diarios
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="<?php echo base_url()?>Operacion/trabajoDiario"
                                 class="nav-link <?php if(isset($activo) && ($activo == 30)){echo "active"; }?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Trabajos realizados</p>
                             </a>
                         </li>
                     </ul>
                 </li>

                 <li
                     class="nav-item has-treeview <?php if(isset($activomenu) && ($activomenu == 5)){echo "menu-open"; }?>">
                     <a href="#" class="nav-link <?php if(isset($activomenu) && ($activomenu == 5)){echo "active"; }?>">
                         <i class="nav-icon fas fa-desktop"></i>
                         <p>
                             Administracion oficina
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="<?php echo base_url()?>Administracion/MenuCaja"
                                 class="nav-link <?php if(isset($activo) && ($activo == 5)){echo "active"; }?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Caja Chica</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?php echo base_url()?>Administracion/CostosFijos"
                                 class="nav-link <?php if(isset($activo) && ($activo == 6)){echo "active"; }?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Costos fijos</p>
                             </a>
                         </li>
                     </ul>
                 </li>


                 <li
                     class="nav-item has-treeview <?php if(isset($activomenu) && ($activomenu == 11)){echo "menu-open"; }?>">
                     <a href="#"
                         class="nav-link <?php if(isset($activomenu) && ($activomenu == 11)){echo "active"; }?>">
                         <i class="nav-icon fas fa-book-open"></i>
                         <p>
                             Documentacion
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="<?php echo base_url()?>Documentacion/Permamente"
                                 class="nav-link <?php if(isset($activo) && ($activo == 8)){echo "active"; }?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Permamente</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?php echo base_url()?>Documentacion/Actualizable"
                                 class="nav-link <?php if(isset($activo) && ($activo == 12)){echo "active"; }?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Actualizable</p>
                             </a>
                         </li>
                     </ul>
                 </li>

                 <li class="nav-item has-treeview <?php if(isset($activo) && ($activo == 10)){echo "menu-open"; }?>">
                     <a href="#" class="nav-link <?php if(isset($activo) && ($activo == 10)){echo "active"; }?>">
                         <i class="nav-icon fas fa-poll"></i>
                         <p>
                             Estadisticas
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="<?php echo base_url()?>Administracion/informeEgresos"
                                 class="nav-link <?php if(isset($activo) && ($activo == 10)){echo "active"; }?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Egresos caja chica</p>
                             </a>
                         </li>
                     </ul>
                 </li>

                 <li
                     class="nav-item has-treeview <?php if(isset($activomenu) && ($activomenu == 15)){echo "menu-open"; }?>">
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
                             <a href="<?php echo base_url()?>Administracion/OrdenesCompra"
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
                             <a href="<?php echo base_url()?>Administracion/Proveedores"
                                 class="nav-link <?php if(isset($activo) && ($activo == 17)){echo "active"; }?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Comprobantes de pago</p>
                             </a>
                         </li>
                     </ul>

                     
                 </li>

                 <li class="nav-item has-treeview <?php if(isset($activo) && ($activo == 9)){echo "menu-open"; }?>">
                     <a href="#" class="nav-link <?php if(isset($activo) && ($activo == 9)){echo "active"; }?>">
                         <i class="nav-icon fas fa-building"></i>
                         <p>
                             Bodega
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="<?php echo base_url()?>Stock/stockAdministracion"
                                 class="nav-link <?php if(isset($activo) && ($activo == 9)){echo "active"; }?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Ver Productos</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li
                     class="nav-item has-treeview <?php if(isset($activomenu) && ($activomenu == 20)){echo "menu-open"; }?>">
                     <a href="#"
                         class="nav-link <?php if(isset($activomenu) && ($activomenu == 20)){echo "active"; }?>">
                         <i class="nav-icon fas fa-truck-pickup"></i>
                         <p>
                             <!-- Tio Dani -->
                             Modulo Vehicular
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="<?php echo base_url()?>CRvehiculo"
                                 class="nav-link <?php if(isset($activo) && ($activo == 13)){echo "active"; }?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Registrar Vehiculo</p>
                             </a>
                         </li>

                         <li class="nav-item">
                             <a href="<?php echo base_url()?>CGarage"
                                 class="nav-link <?php if(isset($activo) && ($activo == 98)){echo "active"; }?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Garage Vehiculo</p>
                             </a>
                         </li>

                         <li class="nav-item">
                             <a href="<?php echo base_url()?>CCombustible"
                                 class="nav-link <?php if(isset($activo) && ($activo == 99)){echo "active"; }?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Combustible</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?php echo base_url()?>CMantencion"
                                 class="nav-link <?php if(isset($activo) && ($activo == 14)){echo "active"; }?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Registrar Mantenciones</p>
                             </a>
                         </li>

                         <li class="nav-item">
                             <a href="<?php echo base_url()?>CLibroMantenciones"
                                 class="nav-link <?php if(isset($activo) && ($activo == 96)){echo "active"; }?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Libro Mantenciones</p>
                             </a>
                         </li>


                     </ul>
                 </li>
                 </li>


                 <li
                     class="nav-item has-treeview <?php if(isset($activomenu) && ($activomenu == 2)){echo "menu-open"; }?>">
                     <a href="#" class="nav-link <?php if(isset($activomenu) && ($activomenu == 2)){echo "active"; }?>">
                         <i class="nav-icon fas fa-cog"></i>
                         <p>
                             Sistema
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="<?php echo base_url()?>Administracion/registroTrabajador"
                                 class="nav-link <?php if(isset($activo) && ($activo == 6)){echo "active"; }?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Registrar Usuario</p>
                             </a>
                         </li>

                     </ul>

                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="<?php echo base_url()?>Perfil"
                                 class="nav-link <?php if(isset($activo) && ($activo == 7)){echo "active"; }?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Modificar mi perfil</p>
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