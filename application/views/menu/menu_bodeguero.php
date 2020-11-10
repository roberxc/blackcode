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
      <img src="<?php echo base_url();?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">BlackCodef</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url();?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
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
          <li class="nav-item has-treeview <?php if(isset($activo) && ($activo == 1)){echo "menu-open"; }?>">
            <a href="<?php echo base_url()?>Inicio" class="nav-link <?php if(isset($activo) && ($activo == 1)){echo "active"; }?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Inicio
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url()?>RegistroEntrada" class="nav-link <?php if(isset($activo) && ($activo == 2)){echo "active"; }?>">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Registro entrada
              </p>
            </a>

          </li>

          <li class="nav-item has-treeview <?php if(isset($activo) && ($activo == 3)){echo "menu-open"; }?>">
            <a href="<?php echo base_url()?>RegistroSalida" class="nav-link <?php if(isset($activo) && ($activo == 3)){echo "active"; }?>">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Registro salida
              </p>
            </a>

          </li>

          <li class="nav-item has-treeview <?php if(isset($activo) && ($activo == 4)){echo "menu-open"; }?>">
            <a href="<?php echo base_url()?>Stock" class="nav-link <?php if(isset($activo) && ($activo == 4)){echo "active"; }?>">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Stock
              </p>
            </a>

          </li>

          <li class="nav-item has-treeview <?php if(isset($activomenu) && ($activomenu == 2)){echo "menu-open"; }?>">
            <a href="#" class="nav-link <?php if(isset($activomenu) && ($activomenu == 2)){echo "active"; }?>">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Sistema
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="<?php echo base_url()?>Perfil" class="nav-link <?php if(isset($activo) && ($activo == 7)){echo "active"; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Perfil</p>
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