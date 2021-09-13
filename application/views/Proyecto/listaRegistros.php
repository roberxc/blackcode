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
</head>
<body class="hold-transition sidebar-mini">
   <div class="wrapper">
      <!-- Main Sidebar Container -->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1>Personal registrado</h1>
                  </div>
               </div>
            </div>
            <!-- /.container-fluid -->
         </section>
         <!-- Buscador -->
         <div class="col-12">
            <div class="card-header">
               <section class="content">
                  <div class="box box-info ">
                     <div class="box-body">
                        <div class="table-responsive">
                           <table id="example1" name="example1" class="table table-bordered table-striped" style="width: 100%;">
                              <thead>
                                 <tr>
                                    <th style="width: 5%;background-color: #006699; color: white;">Rut</th>
                                    <th style="width: 5%;background-color: #006699; color: white;">Nombre</th>
                                    <th style="width: 5%;background-color: #006699; color: white;">Correo</th>
                                    <th style="width: 5%;background-color: #006699; color: white;">Cargo</th>
                                    <th style="width: 5%;background-color: #006699; color: white;">Accion</th>
                                 </tr>
                              </thead>
                           </table>
                        </div>
                     </div>
                  </div>
               </section>
            </div>
            <!-- /.card -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <div id="modal-confirmacion" class="modal fade bd-example-modal-sm" role="dialog">
      <div class="modal-dialog modal-sm">
         <!-- Contenido del modal -->
         <div class="modal-content">
            <div class="modal-header bg-red">
               <H3>Confirmación</H3>
               <button type="button" class="close-white" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <div class="modal-body">
                  <p>Estás seguro que deseas cambiar el estado de este registro?</p>
               </div>
            </div>
            <div class="modal-body">
               <div class="card-body" id="dynamic_field" >
                  <div class="box-body">
                     <div class="form-group">
                        <label for="sel1">Cambiar estado</label>
                        <select class="form-control" id="estado_registro">
                           <option value="" selected>Seleccione</option>
                           <option value="0">Activo</option>
                           <option value="1">Inactivo</option>
                        </select>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer bg-white">
               <input type="submit" class="btn btn-primary" value="Si" onclick="deleteRegistro()">
               <input type="hidden" id="id_usuario">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            </div>
         </div>
      </div>
   </div>
   <!-- Control Sidebar -->
   <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
   </aside>
   <!-- ./wrapper -->
   <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
   <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
   <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
      integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
   <script src="<?php echo base_url()?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
   <script>
      //Mostrar tabla principal
      $(document).ready(function(){
        $('#example1').DataTable({
          "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
          "processing": true,
          "serverSide": true, 
          "ajax":{url:"<?php echo base_url('Proyecto/obtenerRegistrosTrabajadores');?>",
          type: "POST"
        },
          "columnDefs":[
            {
                "targets": [1,2,3],
            }
          ]
        });
      
      });
   </script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
   <script src="<?php echo base_url();?>assets/js/sweetAlert.js"></script>
   <script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
   <script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
   <script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/1.10.22/js/dataTables.jqueryui.min.js"></script>
   <script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
   <!-- Bootstrap Switch -->
   <script src="<?php echo base_url();?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
   <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
   <script>var base_url = '<?php echo base_url();?>';</script>
   <script src="<?php echo base_url();?>assets/js/GestionCuentas/listado_cuentas.js"></script>
   <!-- page script -->
</body>
</html>