<head>
   <!-- SELECT CON BUSCADOR -->
   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
   <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" rel="stylesheet" />
   <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css" rel="stylesheet" />
   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
   <!-- DataTables -->
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.jqueryui.min.css">
</head>
<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Gastos de Combustible</h1>
            </div>
            
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
      <!-- /.container-fluid -->
   </div>
   <section class="content">
      <div class="box box-info ">
         <div class="box-body">
            <div class="table-responsive">
               <table id="example1" name="example1" class="table table-bordered table-striped" style="width: 100%;">
                  <thead>
                     <tr>
                     <th>Codigo</th>
                        <!-- 0 ---> 
                        <th>Patente</th>
                        <!-- 1 --->
                

                        
                     
                     </tr>
                  </thead>
               </table>
            </div>
         </div>
      </div>
</div>
</div>
</section>     
</body>  
</html> 
<div id="modal"></div>
<!-- Modal -->
<div class="modal fade" id="myModalVerMas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header bg-blue">
            <h4 class="modal-title" id="exampleModalLabel">Detalle Producto</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form id="frmGarage" method="POST">
            <div class="modal-body">
               <div class="box-body">
                  <div class="col-md-12">
                     <div class="panel-group">
                        <div class="panel panel-primary">
                           <div class="panel-heading">Mas Información</div>
                           <div class="panel-body">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="txtGlosa">Glosa:</label>
                                    <textarea class="form-control" name="txtGlosa" id="txtGlosa" readonly></textarea>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="panel-group">
                        <div class="panel panel-primary">
                           <div class="panel-heading">Detalles Almacenamiento</div>
                           <div class="panel-body">
                              <div class="detalle-producto table-resposive">
                                 <div class="table-responsive">
                                    <table id="table_vermas_reajustar_stock" name="table_vermas_reajustar_stock" class="table table-striped">
                                       <thead>
                                          <tr>
                                             <th>Nombre del Producto</th>
                                             <!-- 0 -->
                                             <th>Bodega</th>
                                             <!-- 1 -->
                                             <th>Cantidad Almacenada</th>
                                             <!-- 2 -->  
                                          </tr>
                                       </thead>
                                       <tbody>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
               </div>
         </form>
         </div>
      </div>
   </div>
</div>
</section>
</div>
<script>
   //Mostrar tabla principal
   $(document).ready(function(){
     $('#example1').DataTable({
       "language": {
         "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
         },
       "processing": true,
       "serverSide": true, 
       "ajax":{url:"<?php echo base_url('CGarage/fetch_data'); ?>",
       type: "POST"
     },
       "columnDefs":[
         {
             "targets": [1],
         }
       ]
     });
   });
</script>

<!-- ESTE PARA LAS ALERTAS --->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="<?php echo base_url();?>assets/js/sweetAlert.js"></script>
<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/1.10.22/js/dataTables.jqueryui.min.js"></script>
<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>