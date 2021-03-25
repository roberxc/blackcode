<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Website Title -->
      <title>Registro de trabajo diario</title>
      <!-- Styles -->
      <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/css/fontawesome-all.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/css/swiper.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/css/magnific-popup.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/css/styles.css" rel="stylesheet">
      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
   </head>
   <body data-spy="scroll" data-target=".fixed-top">
      <!-- Preloader -->
      <div class="spinner-wrapper">
         <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
         </div>
      </div>
      <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-awesome fas fa-bars"></span>
         <span class="navbar-toggler-awesome fas fa-times"></span>
         </button>
         <!-- end of mobile menu toggle button -->
         <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
               <li class="nav-item">
                  <a class="nav-link page-scroll" href="<?php echo base_url()?>login" class="nav-link <?php if(isset($activo) && ($activo == 1)){echo "active"; }?>">Cancelar</a>
               </li>
            </ul>
         </div>
      </nav>
      <div id="pricing" class="cards-2">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <h2>Completar planilla de Trabajos Diarios</h2>
                  <div class="col-lg-2">
                     <input type="hidden" class="form-control-input" id="codigo_servicio" value="<?php if(isset($codigo)){ echo $codigo;}else{echo 'Error';}?>" disabled> <br>
                  </div>
               </div>
            </div>
            <!-- end of row -->
            <div class="row">
               <div class="col-lg-12">
                  <!-- Card-->
                  <!-- INGRESO DE ASISTENCIA -->
                  <div class="card">
                     <div class="card-body">
                        <div class="card-title">Marcar Asistencia</div>
                        <hr class="cell-divide-hr">
                        <?php 
                           if($asistencia_estado == 0){
                              $res = 'Ingresar';
                           }else if($asistencia_estado == 1){
                              $res = 'Modificar';
                           }
                           ?>
                        <div class="button-wrapper">
                           <button class="btn-solid-reg active" id="asistencia-modal"><?php echo $res;?></button>
                        </div>
                        <hr class="cell-divide-hr">
                     </div>
                  </div>
                  <!-- GASTO DE VIATICOS -->
                  <div class="card">
                     <div class="card-body">
                        <div class="card-title">Gasto de Viaticos</div>
                        <hr class="cell-divide-hr">
                        <div class="price">
                           <span class="currency">$</span><span class="value"><?php if(isset($total_viaticos)){if($total_viaticos[0]->valor>0){echo $total_viaticos[0]->valor;}else{ echo '0';}}else{ echo '0';}?></span>
                           <div class="frequency">Total</div>
                        </div>
                        <hr class="cell-divide-hr">
                        <ul class="list-unstyled li-space-lg">
                           <?php 
                              foreach($tipos_viaticos as $row)
                              { ?>
                           <li class="media">
                              <i class="fas <?php if($row->valor>0){ echo 'fa-check';}else{ echo 'fa-times';}?>"></i>
                              <div class="media-body"><?php echo $row->nombre;?></div>
                           </li>
                           <?php }?>
                        </ul>
                        <div class="button-wrapper">
                           <?php 
                              if($gastosviaticos_estado == 0){
                                 $res = 'Ingresar';
                              }else if($gastosviaticos_estado == 1){
                                 $res = 'Modificar';
                              }
                              ?>
                           <button class="btn-solid-reg popup-with-move-anim" type="submit" id="in-viaticos" href="#vaticos<?php echo $gastosviaticos_estado;?>"><?php if(isset($res)){ echo $res;}?></button>
                        </div>
                     </div>
                  </div>
                  <!-- Ingreso de viaticos -->
                  <div id="vaticos0" class="lightbox-basic zoom-anim-dialog mfp-hide">
                     <div class="container">
                        <div class="row">
                           <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                           <div class="col-lg-4">
                              <h4>Ingrese los gasto de Viaticos </h4>
                              <div class="form-group">
                                 <input type="number" class="form-control-input" id="vdesayuno" required>
                                 <label class="label-control" for="cname">Desayuno</label>
                                 <div class="help-block with-errors"></div>
                              </div>
                              <div class="form-group">
                                 <input type="number" class="form-control-input" id="valmuerzo" required>
                                 <label class="label-control" for="cemail">Almuerzo</label>
                                 <div class="help-block with-errors"></div>
                              </div>
                              <div class="form-group">
                                 <input type="number" class="form-control-input" id="vcena" required>
                                 <label class="label-control" for="cemail">Cena</label>
                                 <div class="help-block with-errors"></div>
                              </div>
                              <div class="form-group">
                                 <input type="number" class="form-control-input" id="vagua" required>
                                 <label class="label-control" for="cemail">Agua</label>
                                 <div class="help-block with-errors"></div>
                              </div>
                              <div class="form-group">
                                 <input type="number" class="form-control-input" id="valojamiento" required>
                                 <label class="label-control" for="cemail">Alojamiento</label>
                                 <div class="help-block with-errors"></div>
                              </div>
                              <div class="form-group">
                                 <button class="btn-solid-reg" id="addviatico" type="button">Guardar</button>
                              </div>
                           </div>
                           <!-- end of col -->
                        </div>
                        <!-- end of row -->
                     </div>
                     <!-- end of container -->
                  </div>
                  <!-- Actualizar viaticos -->
                  <div id="vaticos1" class="lightbox-basic zoom-anim-dialog mfp-hide">
                     <div class="container">
                        <div class="row">
                           <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                           <div class="col-lg-4">
                              <h4>Modificar gastos de viaticos </h4>
                              <?php 
                                 if(isset($viaticos_registrados)){
                                 foreach($viaticos_registrados as $row)
                                 { ?>
                              <div class="form-group">
                                 <input type="hidden" class="form-control-input" id="gastosid_update" value="<?php echo $row->ID?>">
                                 <input type="number" class="form-control-input" id="gastos_update" value="<?php echo $row->valor?>">
                                 <label class="label-control" for="cname"><?php echo $row->nombre?></label>
                                 <div class="help-block with-errors"></div>
                              </div>
                              <?php }
                                 }?>
                              <div class="form-group">
                                 <button class="btn-solid-reg" id="updateviatico1" type="button">Modificar</button>
                              </div>
                           </div>
                           <!-- end of col -->
                        </div>
                        <!-- end of row -->
                     </div>
                     <!-- end of container -->
                  </div>
                  <!-- MATERIALES COMPRADOS DURANTE EL TRABAJO -->
                  <div class="card">
                     <div class="card-body">
                        <div class="card-title">Materiales comprados durante el trabajo</div>
                        <hr class="cell-divide-hr">
                        <div class="price">
                           <!-- VALOR TOTAL -->
                        </div>
                        <hr class="cell-divide-hr">
                        <div class="button-wrapper">
                           <a class="btn-solid-reg popup-with-move-anim" href="#duranteTrab" id="in-mat1">Ingresar</a>
                        </div>
                     </div>
                  </div>
                  <!-- MATERIALES COMPRADOS ANTES DE LOS TRABAJOS -->
                  <div class="card">
                     <div class="card-body">
                        <div class="card-title">Materiales comprados antes de los trabajos</div>
                        <hr class="cell-divide-hr">
                        <div class="price">
                        </div>
                        <hr class="cell-divide-hr">
                        <?php 
                           if($materialantes_estado == 0){
                              $res = 'Ingresar';
                           }else if($materialantes_estado == 1){
                              $res = 'Modificar';
                           }
                           
                           ?>
                        <div class="button-wrapper">
                           <a class="btn-solid-reg popup-with-move-anim" type="submit" href="#antesTrab<?php echo $materialantes_estado;?>"><?php echo $res;?></a>
                        </div>
                     </div>
                  </div>
                  <!-- MATERIALES DE BODEGA -->
                  <div class="card">
                     <div class="card-body">
                        <div class="card-title">Materiales de bodega</div>
                        <hr class="cell-divide-hr">
                        </br></br>
                        <div class="card-subtitle">Registrar materiales utilizados de la bodega</div>
                        <hr class="cell-divide-hr">

                        <?php 
                           if($materialbodega_estado == 0){
                              $res = 'Ingresar';
                           }else if($materialbodega_estado == 1){
                              $res = 'Modificar';
                           }
                           
                           ?>
                        <div class="button-wrapper">
                           <a class="btn-solid-reg popup-with-move-anim" type="submit" href="#bodega<?php echo $materialbodega_estado;?>"><?php echo $res;?></a>
                        </div>
                     </div>
                  </div>
                  <!-- GASTO DE COMBUSTIBLE -->
                  <div class="card">
                     <div class="card-body">
                        <div class="card-title">Combustible</div>
                        <hr class="cell-divide-hr">
                        </br>
                        <div class="form-group">
                           <label for="cars">Seleccione el tipo de combustible:</label>
                           <select class="form-control-input" id="id_tipogasto">
                              <option value="" selected>Seleccione</option>
                              <?php 
                                 foreach($tipos_combustible as $row)
                                 { ?>
                              <option value="<?php echo $row->id_tipogasto?>"><?php echo $row->nombretipogasto?></option>
                              <?php }?>
                           </select>
                        </div>
                        <div class="form-group">
                           <input type="text" class="form-control-input" id="gasto_combustible" required>
                           <label class="label-control" for="cemail">Ingresar Gasto $</label>
                           <div class="help-block with-errors"></div>
                        </div>
                        <hr class="cell-divide-hr">
                        <?php 
                           if($gastocombustible_estado == 0){
                              $res = 'Guardar';
                           }else if($gastocombustible_estado == 1){
                              $res = 'Modificar';
                           }
                           
                           ?>
                        <div class="button-wrapper">
                           <button class="btn-solid-reg page-scroll" id="addgastos_combustible<?php echo$gastocombustible_estado;?>"><?php echo $res;?></button>
                        </div>
                     </div>
                  </div>
                  <!-- GASTOS VARIOS -->
                  <div class="card">
                     <div class="card-body">
                        <div class="card-title">Gastos Varios</div>
                        <hr class="cell-divide-hr">
                        </br></br>
                        <?php if(isset($gastosvarios_registrados) && (count($gastosvarios_registrados)>0)){
                           foreach($gastosvarios_registrados as $row){ ?>
                        <div class="form-group">
                           <input type="hidden" class="form-control-input" id="item_gastovariosid" value="<?php echo $row->id;?>">
                           <input type="text" class="form-control-input" id="item_gastovarios" value="<?php echo $row->valor;?>" required>
                           <label class="label-control" for="cemail"><?php echo $row->nombre;?></label>
                           <div class="help-block with-errors"></div>
                        </div>
                        <?php } 
                           }else{?>
                        <div class="form-group">
                           <input type="text" class="form-control-input" id="gasto_peaje" required>
                           <label class="label-control" for="cemail">Peaje $</label>
                           <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                           <input type="text" class="form-control-input" id="gasto_estacionamiento" required>
                           <label class="label-control" for="cemail">Estacionamiento $</label>
                           <div class="help-block with-errors"></div>
                        </div>
                        <?php }?>
                        <hr class="cell-divide-hr">
                        <?php 
                           if($gastosvarios_estado == 0){
                              $res = 'Guardar';
                           }else if($gastosvarios_estado == 1){
                              $res = 'Modificar';
                           }
                           
                           ?>
                        <div class="button-wrapper">
                           <button class="btn-solid-reg page-scroll" id="addgastos_varios<?php echo $gastosvarios_estado;?>"><?php echo $res;?></button>
                        </div>
                     </div>
                  </div>
                  <!-- end of card -->
               </div>
               <!-- end of col -->
            </div>
            <!-- end of row -->
         </div>
         <!-- end of container -->
         <!-- SUBIR FOTOGRAFIAS -->
         <div class="card">
            <div class="card-body">
               <div class="card-title">Subir Fotografias</div>
               <hr class="cell-divide-hr">
               </br></br>
               <div class="card-subtitle">Registrar fotografias que compruebe el trabajo realizado</div>
               <hr class="cell-divide-hr">
               <div class="button-wrapper">
                  <a class="btn-solid-reg popup-with-move-anim" type="submit" href="#documentosubir">Ingresar</a>
                  <a class="btn-solid-reg popup-with-move-anim" type="submit" href="#archivosubidos">Archivos subidos</a>
               </div>
            </div>
         </div>
         <!-- end of card -->
         <!-- end of card -->
         <!-- Card-->
         <div id="contact" class="form-2">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12">
                     <h2>Guardar planilla del trabajo realizado</h2>
                     <div class="form-group"></div>
                     <a class="btn-solid-reg popup-with-move-anim" type="submit" href="#confirmar">Guardar plantilla</a>
                  </div>
               </div>
               <!-- end of col -->
            </div>
            <!-- end of row -->
         </div>
         <!-- end of container -->
      </div>
      <div id="confirmar" class="lightbox-basic zoom-anim-dialog mfp-hide">
         <div class="container">
            <div class="row">
               <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
               <div class="col-lg-4">
                  <h4>Gasto total: <?php
                     if(isset($gasto_total) && isset($suma_asignada)){
                        $vuelto = $suma_asignada[0]->valorasignado-$gasto_total[0]->valor;
                        echo '$'.$gasto_total[0]->valor;
                     }
                     ?>
                     </br>Vuelto: <?php echo '$'.$vuelto;?>
                  </h4>
                  <a class="btn-solid-reg mfp-close page-scroll" href="<?php echo base_url()?>Operacion" class="nav-link <?php if(isset($activo) && ($activo == 1)){echo "active"; }?>">Guardar</a> <a class="btn-outline-reg mfp-close as-button" href="#screenshots">Atras</a>
               </div>
               <!-- end of col -->
            </div>
            <!-- end of row -->
         </div>
         <!-- end of container -->
      </div>
      <!-- Ingreso de materiales comprados durante -->
      <div id="duranteTrab" class="lightbox-basic zoom-anim-dialog mfp-hide">
         <form id="form-subir-documentocompra" style="padding:0px 15px;" class="form-horizontal" role="form" method="POST" >
            <div class="container">
               <div class="row">
                  <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                  <div class="col-lg-4">
                     <div class="card"></div>
                     
                     <div class="card-body" id="dynamic_field" >
                        <div class="card-title">Suba los documentos que verifiquen los materiales comprados</div>
                        <hr class="cell-divide-hr">
                        
                           <div class="col-lg-4">
                              <div class="card"></div>
                              <div class="card-body" id="dynamic_field" >
                                 <div class="card-title">Subir documentos</div>
                                 <hr class="cell-divide-hr">
                                 <div class="form-group">
                                    <input type="hidden" class="form-control" name="codigo1" value="<?php if(isset($codigo)){ echo $codigo;}else{echo 'Error';}?>" id="codigo1">
                                 </div>
                                 <div class="form-group">
                                    <label for="montototal">Monto total:</label>
                                    <input type="text" name="montototal" class="form-control"  id="montototal">
                                 </div>
                                 <div class="form-group">
                                    <label for="detalle">Detalle:</label>
                                    <input type="text" name="detalle" class="form-control"  id="detalle">
                                 </div>
                                 <div class="form-group">
                                    <label for="pic_file_doccompra">Ingresar:</label>
                                    <input type="file" name="pic_file_doccompra" class="form-control"  id="pic_file_doccompra">
                                 </div>
                                 <hr class="cell-divide-hr">
                                 <div class="button-wrapper">
                                 </div>
                              </div>
                           </div>
                        <hr class="cell-divide-hr">
                        <div class="button-wrapper">
                        </div>
                     </div>
                  </div>
                  <!-- end of card -->
               </div>
               <!-- end of col -->
               <div class="form-group">
                  <button type="button" onclick="subirDocumentoCompra()" class="btn-solid-reg">Guardar</button></br> </br>
               </div>
            </div>
         </form>
         <!-- end of row -->
      </div> 
      <!-- Ingreso de materiales comprados antes del trabajo -->
      <div id="antesTrab0" class="lightbox-basic zoom-anim-dialog mfp-hide">
         <div class="container">
            <div class="row">
               <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
               <div class="col-lg-4">
                  <div class="card"></div>
                  <div class="card-body" id="dynamic_field2">
                     <div class="card-title">Ingrese materiales comprados antes del trabajo</div>
                     <hr class="cell-divide-hr">
                     <table class="table table-bordered" >
                        <TR>
                           <TH>Material</TH>
                           <TD><input type="text" id="item_material2" placeholder="Ingrese" class="form-control" /></TD>
                        </TR>
                        <TR>
                           <TH>Cantidad</TH>
                           <TD><input type="text" id="item_cantidad2" placeholder="Ingrese" class="form-control" /></TD>
                        </TR>
                        <TR>
                           <TH>Total $</TH>
                           <TD><input type="text" id="item_valortotal2" placeholder="Ingrese" class="form-control" /></TD>
                        </TR>
                        <TR>
                           <TH>Agregar más</TH>
                           <TD><button type="button" id="antes" class="btn btn-success">+</button></TD>
                        </TR>
                     </table>
                     <hr class="cell-divide-hr">
                     <div class="button-wrapper">
                     </div>
                  </div>
               </div>
               <!-- end of card -->
            </div>
            <!-- end of col -->
            <div class="form-group">
               <button class="btn-solid-reg" id="addmaterial2">Guardar</button></br> </br>
            </div>
         </div>
         <!-- end of row -->
      </div>
      <!-- Actualizar materiales comprados antes del trabajo -->
      <div id="antesTrab1" class="lightbox-basic zoom-anim-dialog mfp-hide">
         <div class="container">
            <div class="row">
               <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
               <div class="col-lg-4">
                  <div class="card"></div>
                  <div class="card-body" id="dynamic_field2">
                     <div class="card-title">Modificar materiales comprados antes del trabajo</div>
                     <hr class="cell-divide-hr">
                     <table class="table table-bordered" >
                     <?php if(isset($materiales_antes) && (count($materiales_antes)>0)){
                           foreach($materiales_antes as $row){ ?>
                        <TR>
                           <TD><input type="hidden" id="item_material2_update_id" value="<?php echo $row->id;?>" class="form-control" /></TD>
                        </TR>
                        <TR>
                           <TH>Material</TH>
                           <TD><input type="text" id="item_material2_update" value="<?php echo $row->nombre;?>" class="form-control" /></TD>
                        </TR>
                        <TR>
                           <TH>Cantidad</TH>
                           <TD><input type="text" id="item_cantidad2_update" value="<?php echo $row->cantidad;?>" class="form-control" /></TD>
                        </TR>
                        <TR>
                           <TH>Total $</TH>
                           <TD><input type="text" id="item_valortotal2_update" value="<?php echo $row->valor;?>" class="form-control" /></TD>
                        </TR>
                        <?php }
                           }?>
                     </table>
                     <hr class="cell-divide-hr">
                     <div class="button-wrapper">
                     </div>
                  </div>
               </div>
               <!-- end of card -->
            </div>
            <!-- end of col -->
            <div class="form-group">
               <button class="btn-solid-reg" id="updatematerial2">Guardar</button></br> </br>
            </div>
         </div>
         <!-- end of row -->
      </div>
      <!-- Ingreso de materiales bodega-->
      <div id="bodega0" class="lightbox-basic zoom-anim-dialog mfp-hide">
         <div class="container">
            <div class="row">
               <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
               <div class="col-lg-4">
                  <div class="card"></div>
                  <div class="card-body" id="dynamic_field" >
                     <div class="card-title">Ingrese materiales de bodega</div>
                     <hr class="cell-divide-hr">
                     <table class="table table-bordered" >
                        <TR>
                           <TH>Material</TH>
                           <TD><input type="text" id="item_materialbodega_nombre" placeholder="Ingrese" class="form-control" /></TD>
                        </TR>
                        <TR>
                           <TH>Cantidad</TH>
                           <TD><input type="text" id="item_materialbodega_cantidad" placeholder="Ingrese" class="form-control" /></TD>
                        </TR>
                        <TR>
                           <TH>Agregar más</TH>
                           <TD><button type="button" name="add" id="materialbodega" class="btn btn-success">+</button></TD>
                        </TR>
                     </table>
                     <hr class="cell-divide-hr">
                     <div class="button-wrapper">
                     </div>
                  </div>
               </div>
               <!-- end of card -->
            </div>
            <!-- end of col -->
            <div class="form-group">
               <button class="btn-solid-reg" id="addmaterialbodega">Guardar</button></br> </br>
            </div>
         </div>
         <!-- end of row -->
      </div>
      <!-- Modificacion de materiales bodega-->
      <div id="bodega1" class="lightbox-basic zoom-anim-dialog mfp-hide">
         <div class="container">
            <div class="row">
               <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
               <div class="col-lg-4">
                  <div class="card"></div>
                  <div class="card-body" id="dynamic_field" >
                     <div class="card-title">Modificar materiales de bodega</div>
                     <hr class="cell-divide-hr">
                     <table class="table table-bordered">
                     <?php if(isset($materiales_bodega) && (count($materiales_bodega)>0)){
                           foreach($materiales_bodega as $row){ ?>
                        <TR>
                           <TD><input type="hidden" id="item_materialbodega_update_id" value="<?php echo $row->ID;?>" class="form-control" /></TD>
                        </TR>
                        <TR>
                           <TH>Material</TH>
                           <TD><input type="text" id="item_materialbodega_nombre_update" value="<?php echo $row->nombre;?>" class="form-control" /></TD>
                        </TR>
                        <TR>
                           <TH>Cantidad</TH>
                           <TD><input type="text" id="item_materialbodega_cantidad_update" value="<?php echo $row->Cantidad;?>" class="form-control" /></TD>
                        </TR>
                        <?php }
                           }?>
                     </table>
                     <hr class="cell-divide-hr">
                     <div class="button-wrapper">
                     </div>
                  </div>
               </div>
               <!-- end of card -->
            </div>
            <!-- end of col -->
            <div class="form-group">
               <button class="btn-solid-reg" id="updatematerialbodega">Guardar</button></br> </br>
            </div>
         </div>
         <!-- end of row -->
      </div>
      <!-- end of container -->
      <!-- SUBIR FOTOGRAFIAS -->
      <div id="documentosubir" class="lightbox-basic zoom-anim-dialog mfp-hide">
         <div class="container">
            <div class="row">
               <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
               <form id="form-subir-archivos" style="padding:0px 15px;" class="form-horizontal" role="form" action="<?php echo base_url();?>Upload/subirArchivo" method="POST" >
                  <div class="col-lg-4">
                     <div class="card"></div>
                     <div class="card-body" id="dynamic_field" >
                        <div class="card-title">Subir fotografias</div>
                        <hr class="cell-divide-hr">
                        <div class="form-group">
                           <input type="hidden" class="form-control" name="codigo1" value="<?php if(isset($codigo)){ echo $codigo;}else{echo 'Error';}?>" id="codigo1">
                        </div>
                        <div class="form-group">
                           <label for="pic_file">Ingresar:</label>
                           <input type="file" name="pic_file" class="form-control"  id="pic_file">
                        </div>
                        <button type="submit" class="btn btn-success">Guardar</button>
                        <hr class="cell-divide-hr">
                        <div class="button-wrapper">
                        </div>
                     </div>
                  </div>
               </form>
               <!-- end of card -->
            </div>
         </div>
      </div>
      <!-- ARCHIVOS SUBIDOS -->
      <div id="archivosubidos" class="lightbox-basic zoom-anim-dialog mfp-hide">
         <div class="container">
            <div class="row">
               <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
               <div class="col-lg-4">
                  <div class="card"></div>
                  <div class="card-body" id="dynamic_field" >
                     <div class="card-title">Archivo subidos</div>
                     <table class="table table-bordered">
                        <TR>
                           <td><label>Archivo</label></td>
                           <td></td>
                        </TR>
                        <?php if(isset($archivos_subidos) && (count($archivos_subidos)>0)){
                           foreach($archivos_subidos as $row){ ?>
                        <tr>
                           <TD><input type="text" value="<?php echo$row->Imagen;?>" class="form-control name-file"g/></TD>
                           <td class="project-actions text-right">
                              <button class="btn btn-danger delete_archivo"><i class="fas fa-trash"></i></button>
                           </td>
                        </tr>
                        <?php }
                           } ?>
                     </table>
                     <hr class="cell-divide-hr">
                     <div class="button-wrapper">
                     </div>
                  </div>
               </div>

            </div>
         </div>
      </div>

      <!-- end of container -->
      <div class="error"></div>
      <!-- end of details lightbox 1 -->
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"
         integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
         integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
         integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
      <!-- Scripts modal -->
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url();?>assets/js/ModificacionPlanilla/MaterialesDurante_update.js"></script>
      <script type="text/javascript" src="<?php echo base_url();?>assets/js/MaterialesDurante.js"></script>
      <script type="text/javascript" src="<?php echo base_url();?>assets/js/MaterialesAntes.js"></script>
      <script type="text/javascript" src="<?php echo base_url();?>assets/js/MaterialesBodega.js"></script>
      <!-- Scripts -->
      <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
      <script src="<?php echo base_url();?>assets/js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
      <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
      <script src="<?php echo base_url();?>assets/js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
      <script src="<?php echo base_url();?>assets/js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
      <script src="<?php echo base_url();?>assets/js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
      <script src="<?php echo base_url();?>assets/js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
      <script src="<?php echo base_url();?>assets/js/scripts.js"></script> <!-- Custom scripts -->
      <!--<script src="<?php echo base_url();?>assets/js/imagenes.js"></script>-->
      <script>var base_url = '<?php echo base_url();?>';</script>
      <script src="<?php echo base_url();?>assets/js/Operaciones/ingreso_planilla_detalle.js"></script>
      <script src="<?php echo base_url();?>assets/js/Operaciones/actualizar_planilla_detalle.js"></script>
   </body>
</html>