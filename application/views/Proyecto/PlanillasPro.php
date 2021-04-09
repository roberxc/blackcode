<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>BlackCode</title>
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/stylePlanillapro.css">
   </head>
   <body class="hold-transition sidebar-mini sidebar-collapse">
      <input type="text" id="codigoproyecto" value="<?php echo$codigo;?>" class="form-control" />
      <?php $set_data = $this->session->all_userdata(); 
         if (isset($set_data['nombre_completo'])) {
           $nombre = $set_data['nombre_completo'];
         }?>
      <div class="smoke">
         <div class="container" id="fh5co-pricing">
            <div class="heading animate-box">
               <h2><b>Monto total</b></h2>
            </div>
            <div class="text-center animate-box">
               <h3>$ <?php if(isset($Monto_proyecto)){if($Monto_proyecto[0]->montototal>0){echo $Monto_proyecto[0]->montototal;}else{ echo '0';}}else{ echo '0';}?></h3>
            </div>
            <div class="heading animate-box">
               <h2><b>Balance Proyecto</b></h2>
            </div>
            <div class="text-center animate-box">
               <h3>$ <?php if(isset($Monto_balanceProyecto)){echo $Monto_balanceProyecto;}else{ echo '0';}?></h3>
            </div>
            <br><br>
            <div class="row">
               <div class="col-sm-4 animate-box" data-animate-effect="fadeInLeft">
                  <div class="price-box-dark animate-box">
                     <h3><b>Registro compras materiales</b></h3>
                     <div class="gr-line"></div>
                     <div >Total monto <b class="text-gr" id="MontoTotal">$ <?php if(isset($Monto_total)){if($Monto_total[0]->totalMonto>0){echo $Monto_total[0]->totalMonto;}else{ echo '0';}}else{ echo '0';}?></b></div>
                     <div class="gr-line"></div>
                     <div>Total Presupuesto <b class="text-gr" id="presupuesto" >$ <?php if(isset($Monto_presupuesto)){if($Monto_presupuesto[0]->totalpresupuesto>0){echo $Monto_presupuesto[0]->totalpresupuesto;}else{ echo '0';}}else{ echo '0';}?></b></div>
                     <div class="gr-line"></div>
                     <div>Total Balance <b class="text-gr" id="balance" >$ <?php if(isset($Monto_balance)){ echo $Monto_balance;}else{echo 'Error';}?></b></b> </div>
                     <br>
                     <button type="button" class="btn btn-banner" onclick="generarTablaRegistroMaterial()" data-toggle="modal"
                        data-target="#materiales">Ver detalles</button>
                  </div>
               </div>
               <div class="col-sm-4">
                  <div class="price-box-dark animate-box">
                     <h3><b>Registro trabajo diarios</b></h3>
                     <div class="gr-line"></div>
                     <div>Registro mano de obra</div>
                     <div class="gr-line"></div>
                     <br>
                     <button class="btn btn-banner" onclick="generarTablaTrabajoDiario()" data-toggle="modal"
                        data-target="#trabajoDiario">Ver detalles </button>
                  </div>
               </div>
               <div class="col-sm-4">
                  <div class="price-box-dark animate-box" data-animate-effect="fadeInRight">
                     <h3><b>Planilla mano de obra</b></h3>
                     <div class="gr-line"></div>
                     <div>Total Proyecto <b class="text-gr">$ <?php if(isset($Monto_TotalProyecto)){if($Monto_TotalProyecto[0]->Total>0){echo $Monto_TotalProyecto[0]->Total;}else{ echo '0';}}else{ echo '0';}?></b></div>
                     <div class="gr-line"></div>
                     <br>
                     <button class="btn btn-banner" onclick="generarTablaManoDeObra()" data-toggle="modal"
                        data-target="#mano_obra">Ver detalles</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- /.modal -->
      <div class="modal fade" id="trabajoDiario">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <div class="modal-header">
                  <h4 class="modal-title">Registro trabajos diarios proyecto</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body" id="RegistroTrabajoDiario">
                  <!--Se mostra los datos de la tabla en el controlador Proyecto -->
               </div>
               <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-primary">Aceptar</button>
               </div>
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
      <!-- Fin dialog -->
      <div class="modal fade" id="MostrarFacturas">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <div class="modal-header">
                  <h4 class="modal-title">Personal que asiste</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body"id="mostrar-factura">
                  <!--Se mostra los datos de la tabla en el controlador Proyecto -->
               </div>
               <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-primary" onclick="generarTablaRegistroMaterial()" data-toggle="modal"
                     data-target="#materiales">Atras</button>
                  </tr>
               </div>
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <div class="modal fade" id="personal">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <div class="modal-header">
                  <h4 class="modal-title">Personal que asiste</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body"id="MostrarPersonalAsiste">
                  <!--Se mostra los datos de la tabla en el controlador Proyecto -->
               </div>
               <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                     data-target="#modal-l">Atras</button>
                  </tr>
               </div>
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
      <!-- Fin dialog -->
      <div class="modal fade" id="mano_obra">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <div class="modal-header">
                  <h4 class="modal-title">Planilla mano de obra</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body" id ="MostrarManoDeObra">
                  <!--Se mostra los datos de la tabla en el controlador Proyecto -->
               </div>
               <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-primary">Aceptar</button>
               </div>
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
      <!-- Fin dialog -->
      <!--  dialog -->
      <div class="modal fade" id="materiales">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <div class="modal-header">
                  <h4 class="modal-title">Registro de materiales</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body" id="MostrarRegistroMaterial">
                  <!--Se mostra los datos de la tabla en el controlador Proyecto -->
               </div>
               <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-primary">Aceptar</button>
               </div>
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
      <!-- Fin dialog -->
      <div class="modal fade" id="galeria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
               <div class="card card-primary card-tabs">
                  <div class="card-header p-0 pt-1">
                     <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                        <li class="pt-2 px-3">
                           <h3 class="card-title">Registros fotograficos</h3>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Imagenes</a>
                        </li>
                     </ul>
                  </div>
                  <div class="tab-content" id="custom-tabs-two-tabContent">
                     <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                     <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                           <form method="post" action="<?php echo base_url(); ?>Proyecto/descargarArchivos">
                              <input type="hidden" class="form-control" id="tipo-descarga" name="tipo-descarga">
                              <div class="card-header">
                                 <div class="col-md-12">
                                    <div class="card card-primary card-outline">
                                          <div class="table-responsive" id="tabla-fotos">
                                          </div>
                                    </div>
                                 </div>
                              </div>
                              
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>


   <!-- ESTE PARA LAS ALERTAS --->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="<?php echo base_url();?>assets/js/sweetAlert.js"></script>
<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/1.10.22/js/dataTables.jqueryui.min.js"></script>
<!-- Data table -->
<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
   integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="http://malsup.github.com/jquery.form.js"></script> 
<script>var base_url = '<?php echo base_url();?>';</script>
<script src="<?php echo base_url();?>assets/js/EvaluacionProyecto/ProyectoEjecutado.js"></script>
<!-- Ekko Lightbox -->
<script src="<?php echo base_url()?>assets/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<!-- Filterizr-->
<script src="<?php echo base_url()?>assets/plugins/filterizr/jquery.filterizr.min.js"></script>
<!-- Page specific script -->
<script>
   $(function () {
     $(document).on('click', '[data-toggle="lightbox"]', function(event) {
       event.preventDefault();
       $(this).ekkoLightbox({
         alwaysShowClose: true
       });
     });
   
     $('.filter-container').filterizr({gutterPixels: 3});
     $('.btn[data-filter]').on('click', function() {
       $('.btn[data-filter]').removeClass('active');
       $(this).addClass('active');
     });
   });
</script>
<script>
   //Mostrar tabla principal
   $(document).ready(function(){
      $('#administrador_archivos').DataTable({
       "language": {
         "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
         },
       "processing": true,
       "serverSide": true, 
       "ajax":{url:"<?php echo base_url('Proyecto/ObtenerArchivos/'); ?>" + 0,0,
       type: "POST"
     },
       "columnDefs":[
         {
             "targets": [1,2,3],
             className: 'select-checkbox',
            targets:   0
         }
       ],
      select: {
         style:    'os',
         selector: 'td:first-child'
      },
     });
   });
</script>
</html>