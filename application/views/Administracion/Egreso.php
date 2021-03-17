<head>
   <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
   <!-- SELECT CON BUSCADOR -->
   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
   <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" rel="stylesheet" />
   <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css" rel="stylesheet" />
   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
   <!-- DataTables -->
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.jqueryui.min.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

</head>
<body class="hold-transition sidebar-mini">
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-6">
                  <h1>Caja chica Egreso</h1>
               </div>
            </div>
         </div>
         <!-- /.container-fluid -->
      </section>
      <!-- Buscador -->
      <div class="col-12">
         <div class="card">
            <div class="card-header">
               <!-- SELECT2 EXAMPLE -->
               <div class="card card-default">
                  <!-- /.card-header -->
                  <form role="form" id="form" method="POST">
                     <div class="card-body">
                        <div class="row">
                        <div class="col-md-3">
                                 <!-- /.form-group -->
                                 <div class="form-group">
                                 <label>Fecha</label>
                                 <div class="form-group">
                                    <input type="date" class="form-control" placeholder="Ingrese" data-date-format="dd/mm/yyyy" id="fechaegreso">
                                 </div>
                              </div>
                                 <!-- /.form-group -->
                              </div>
                              <!-- /.col -->
                              <div class="col-md-2">
                                 <!-- /.form-group -->
                                 <div class="form-group">
                                    <label>Monto</label>
                                    <div class="form-group">
                                       <input type="text" class="form-control" placeholder="Ingrese" id="montoegreso">
                                    </div>
                                 </div>
                                 <!-- /.form-group -->
                              </div>
                              <div class="col-md-3">
                                 <!-- /.form-group -->
                                 <div class="form-group">
                                    <label>Destinatario</label>
                                    <div class="form-group">
                                       <input type="text" class="form-control" placeholder="Ingrese" id="destinatario">
                                    </div>
                                 </div>
                                 <!-- /.form-group -->
                              </div>
                              <div class="col-md-5">
                                 <!-- /.form-group -->
                                 <div class="form-group">
                                    <label>Detalle</label>
                                    <div class="form-group">
                                       <textarea type="text" class="form-control" placeholder="Ingrese" id="detalle"></textarea>
                                    </div>
                                 </div>
                                 <!-- /.form-group -->
                              </div>
                              <div class="col-md-2">
                                 <!-- /.form-group -->
                                 <div class="form-group">
                                    <label class="invisible">Guardar</label>
                                    <button type="button" class="btn btn-block btn-primary" id="add">Guardar</button>
                                 </div>
                                 <!-- /.form-group -->
                              </div>
                              <div class="col-md-2">
                                 <!-- /.form-group -->
                                 <div class="form-group">
                                    <label class="invisible">Volver</label>
                                    <button type="button" class="btn btn-block btn-warning" id="back">Volver</button>
                                 </div>
                                 <!-- /.form-group -->
                              </div>
                           <!-- /.col -->
                        </div>
                        <!-- /.row -->
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <!-- /.card -->
         <div class="card">
            <!-- /.card-header -->
            <div class="box-body">
               <div class="table-responsive">
                  <table id="tabla_egreso" name="tabla_egreso" class="table table-bordered table-striped" style="width: 100%;">
                     <thead>
                        <tr>
                        <th style="width: 3%;background-color: #006699; color: white;">Fecha</th>
                           <th style="width: 3%;background-color: #006699; color: white;">Monto $</th>
                           <th style="width: 3%;background-color: #006699; color: white;">Destinatario</th>
                           <th style="width: 3%;background-color: #006699; color: white;">Detalle</th>
                           <th style="width: 3%;background-color: #006699; color: white;">Estado</th>
                           <th style="width: 3%;background-color: #006699; color: white;">Acción</th>
                        </tr>
                     </thead>
                  </table>
               </div>
            </div>
            <!-- /.card-body -->
         </div>
         <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="modal fade" id="EditarEgreso">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <div align="center"><img src=""></div>
               </br>
               <h4 class="modal-title">Caja chica egresos</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="form-group">
                  <label>Fecha</label>
                  <div class="input-group mb-3">
                     <input type="date" class="form-control" id="fecha-update" name="fecha-update">
                  </div>
               </div>
               <div class="form-group">
                  <label>Monto</label>
                  <div class="input-group mb-3">
                     <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                     </div>
                     <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" id="monto-update" name="monto-update">
                  </div>
               </div>
               <div class="form-group">
                  <label>Destinatario</label>
                  <div class="input-group mb-3">
                     <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" id="destinatario-update" name="destinatario-update">
                  </div>
               </div>
               <div class="form-group">
                  <label>Detalle</label>
                  <div class="input-group mb-3">
                  <textarea type="text" class="form-control" placeholder="Ingrese" id="detalle-update" name="detalle-update"></textarea>
                  </div>
               </div>
            </div>
            <div class="modal-footer justify-content-between">
               <button type="button" class="btn btn-primary" onclick="updateEgreso()" data-toggle="modal"
                  data-target="#modal-l">Guardar</button>
               </tr>
            </div>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>

   <div id="EliminarEgreso" class="modal fade bd-example-modal-sm" role="dialog">
   <div class="modal-dialog modal-sm">
         <!-- Contenido del modal -->
         <div class="modal-content">
            <div class="modal-header bg-red">
               <H3>Confirmación</H3>
               <button type="button" class="close-white" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <div class="modal-body">
                    <p>Estás seguro que deseas eliminar este registro?</p>
                </div>
            </div>
            <div class="modal-footer bg-white">
               <input type="submit" class="btn btn-primary" value="Si" onclick="deleteRegEgreso()">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            </div>
         </div>
   </div>
</div>
   </div>

   <script>
   //Mostrar tabla principal
   $(document).ready(function(){
     $('#tabla_egreso').DataTable({
      dom: 'Bfrtip',
        buttons: [
            {
            extend:        'colvis',
            text:          '<i class="fas fa-eye"></i>',
            className:     'btn btn-outline-info btn-lg',
            titleAttr:     'Visualizar columnas',
            collectionLayout: 'fixed three-column',
            postfixButtons: [ 'colvisRestore' ]   
            },
            {
               extend:     'pdfHtml5',
               text:       '<i class="fas fa-file-pdf"></i>',
               titleAttr:  'Exportar a PDF',
               messageTop: 'Documento oficial de CDH INGENIERIA',
               title:      'Ingresos caja chica CDH INGENIERIA',
               className:  'btn btn-danger btn-lg',
               exportOptions: {
                    columns: [ 0, 1, 2]
                },
               customize: function ( doc ) {
                    doc.content.splice( 1, 0, {
                        margin: [ 0, 0, 0, 12 ],
                        alignment: 'center',
                        image: 'data:image/png;base64,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'
                    } );
                }
            },
            {
               extend:     'excelHtml5',
               text:       '<i class="fas fa-file-excel"></i>',
               titleAttr:  'Exportar a Excel',
               messageTop: 'Documento oficial de CDH INGENIERIA',
               title:      'Ingresos caja chica CDH INGENIERIA',
               className:  'btn btn-success btn-lg',
               exportOptions: {
                    columns: [ 0, 1, 2,3,4,5]
                }
            },
            {
               extend:     'print',
               text:       '<i class="fas fa-print"></i>',
               titleAttr:  'Imprimir',
               title:      'Ingresos caja chica CDH INGENIERIA',
               messageTop: 'Documento oficial de CDH INGENIERIA',
               className:  'btn btn-outline-dark btn-lg',
               exportOptions: {
                    columns: [ 0, 1, 2,3,4,5]
                }
            },
            
        ],
       "language": {
         "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
         },
       "processing": true,
       "serverSide": true, 
       "ajax":{url:"<?php echo base_url('Administracion/obtenerEgresosCajaChica'); ?>",
       type: "POST"
     },
       "columnDefs":[
         {
             "targets": [0,1,2],
             "visible": true
         },
         {
            "targets": [0,1,2],
             "visible": false,
             "searchable": false
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
   integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
   integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>var base_url = '<?php echo base_url();?>';</script>
<script src="<?php echo base_url()?>assets/js/CajaChica/egreso_cajachica.js"></script>


   <!-- PDF EXCEL ETC. --->

 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.23/b-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/datatables.min.js" defer ></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">



<!-- COLUMN --->
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js" defer></script>

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">

</body>
</html>