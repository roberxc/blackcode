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
               <h1 class="m-0 text-dark">Estado de Proyecto</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                  <li class="breadcrumb-item active">Estado de proyecto</li>
               </ol>
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
                               <th>ID</th>  <!-- 0 ---> 
                               <th>Nombre Proyecto</th>  <!-- 1 --->
                               <th>Fecha inicio</th> <!-- 3 --->
                               <th>Fecha termino</th> <!-- 4 --->
                               <th>Estado</th> <!-- 4 --->
                               <th>Progreso</th> <!-- 4 --->
                               <th>Detallle</th> <!-- 5 --->
                               <th>Ver documentos</th> <!-- 6 --->
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


     
      <!-- Modal -->
      
   </section>
</div>
  <!-- /.modal -->
  <div id="modal" class="modal fade" id="document">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title">Subir/Descargar documentos</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <button type="button" class="btn btn-primary">Subir</button>
               <button type="button" class="btn btn-primary">Ver documentacion</button>
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


   <div id="modal-estado-orden" class="modal fade bd-example-modal-sm" role="dialog">
      <div class="modal-dialog modal-sm">
         <div class="table-responsive">
            <!-- Contenido del modal -->
            <div class="modal-content">
               <div class="modal-header bg-blue">
                  <H3>Estado de orden</H3>
                  <button type="button" class="close-white" data-dismiss="modal">&times;</button>
               </div>
               <div class="modal-body">
                  <div class="card-body" id="dynamic_field" >
                     <div class="box-body">
                        <div class="modal-body" id="estado-ordenes">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
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
          "ajax":{url:"<?php echo base_url('Proyecto/fetch_ProyectoEjecutados'); ?>",
          type: "POST"
        },
          "columnDefs":[
            {
                "targets": [1,2,3,4,5,6,7],
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

<script>var base_url = '<?php echo base_url();?>';</script>
<script src="<?php echo base_url();?>assets/js/EvaluacionProyecto/proyectos.js"></script>



