<head>
   <!-- SELECT CON BUSCADOR -->
   <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
   <!-- DataTables -->
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.jqueryui.min.css">

<!-- PDF Y EXCEL -->



</head>
<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Stock de Productos</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                  <li class="breadcrumb-item active">Stock</li>
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
                        <th>ID</th>
                        <!-- 0 ---> 
                        <th>Nombre Producto</th>
                        <!-- 1 --->
                        <th>Categoria</th>
                        <!-- 2 --->
                        <th>Stock Total Producto</th>
                        <!-- 3 --->
                        <th>Bodega</th>
                        <!-- 4 --->
                        <!--<th>Accion</th>
                         5 --->
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
<script>
   //Mostrar tabla principal
   $(document).ready(function(){
     $('#example1').DataTable({
      dom: 'Bfrtip',
        buttons: [
            {
               extend:     'excelHtml5',
               text:       '<i class="fas fa-file-excel"></i>',
               titleAttr:  'Exportar a Excel',
               className:  'btn btn-success btn-lg'
            },
            {
               extend:     'pdfHtml5',
               text:       '<i class="fas fa-file-pdf"></i>',
               titleAttr:  'Exportar a PDF',
               className:  'btn btn-danger btn-lg'
            },{
               extend:     'copyHtml5',
               text:       '<i class="far fa-copy"></i>',
               titleAttr:  'Copiar a portapapeles',
               className:  'btn btn-secondary btn-lg'
            },
            {
               extend:     'csvHtml5',
               text:       '<i class="fas fa-file-csv"></i>',
               titleAttr:  'Exportar a CSV',
               className:  'btn btn-outline-success btn-lg'
            },
            {
               extend:     'print',
               text:       '<i class="fas fa-print"></i>',
               titleAttr:  'Imprimir',
               className:  'btn btn-outline-dark btn-lg'
            }
        ],
       "language": {
         "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
         },
       "processing": true,
       "serverSide": true, 
       "ajax":{url:"<?php echo base_url('Stock/fetch_data'); ?>",
      type: "POST"
     },
       "columnDefs":[
         {
             "targets": [1,2,3,4],
         }
       ]
     });
   });


</script>
<!-- ESTE PARA LAS ALERTAS --->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="<?php echo base_url();?>assets/js/sweetAlert.js"></script>


<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/1.10.22/js/dataTables.jqueryui.min.js"></script>
<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" ></script>



<!-- PDF EXCEL ETC. --->

 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.23/b-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/datatables.min.js" defer ></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">

