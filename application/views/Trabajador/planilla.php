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
      <!-- end of preloader -->
      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
         <!-- Text Logo - Use this if you don't have a graphic logo -->
         <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Evolo</a> -->
         <!-- Image Logo -->
         <!-- Mobile Menu Toggle Button -->
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
      <!-- end of navbar -->
      <!-- end of navigation -->
      <!-- Pricing -->
      <div id="pricing" class="cards-2">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <h2>Completar planilla de Trabajos Diarios</h2>
                  <div class="col-lg-2">
                     <input type="text" class="form-control-input" id="codigo_servicio" value="<?php if(isset($codigo)){ echo $codigo;}else{echo 'Error';}?>" disabled> <br>
                  </div>
               </div>
               <!-- end of col -->
            </div>
            <!-- end of row -->
            <div class="row">
               <div class="col-lg-12">
                  <!-- Card-->
                  <div class="card">
                     <div class="card-body">
                        <div class="card-title">Marcar Asistencia</div>
                        <hr class="cell-divide-hr">
                        <div class="button-wrapper">
                           <a class="btn-solid-reg active asistencia-modal" href="#">Ingresar</a>
                        </div>
                        <hr class="cell-divide-hr">
                     </div>
                  </div>
                  <!-- end of card -->
                  <!-- end of card -->
                  <!-- Card-->
                  <div class="card">
                     <div class="card-body">
                        <div class="card-title">Gasto de Viaticos</div>
                        <hr class="cell-divide-hr">
                        <div class="price">
                           <span class="currency">$</span><span class="value"><?php if(isset($total_viaticos)){if($total_viaticos[0]->Valor>0){echo $total_viaticos[0]->Valor;}else{ echo '0';}}else{ echo '0';}?></span>
                           <div class="frequency">Total</div>
                        </div>
                        <hr class="cell-divide-hr">
                        <ul class="list-unstyled li-space-lg">
                        <?php 
                              foreach($tipos_viaticos as $row)
                              { ?>
                              <li class="media">
                                 <i class="fas <?php if($row->Valor>0){ echo 'fa-check';}else{ echo 'fa-times';}?>"></i>
                                 <div class="media-body"><?php echo $row->Nombre;?></div>
                              </li>
                              <?php }?>
                        </ul>
                        <div class="button-wrapper">
                           <a class="btn-solid-reg popup-with-move-anim" type="submit" id="in-viaticos" href="#vaticos">Ingresar</a>
                        </div>
                     </div>
                  </div>
                  <!-- end of card -->
                  <!-- end of card -->
                  <div id="vaticos" class="lightbox-basic zoom-anim-dialog mfp-hide">
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
                  <!-- end of lightbox-basic -->
                  <!-- Card-->
                  <div class="card">
                     <div class="card-body">
                        <div class="card-title">Materiales comprados durante el trabajo</div>
                        <hr class="cell-divide-hr">
                        <div class="price">
                           <!-- VALOR TOTAL -->
                           <span class="currency">$</span><span class="value"></span>
                           <div class="frequency">Total</div>
                        </div>
                        <hr class="cell-divide-hr">
                        <div class="button-wrapper">
                           <a class="btn-solid-reg popup-with-move-anim" href="#duranteTrab" id="in-mat1">Ingresar</a>
                        </div>
                     </div>
                  </div>
                  <!-- end of card -->
                  <!-- end of card -->
                  <!-- Card-->
                  <div class="card">
                     <div class="card-body">
                        <div class="card-title">Materiales comprados antes de los trabajos</div>
                        <hr class="cell-divide-hr">
                        <div class="price">
                           <span class="currency">$</span><span class="value">9000</span>
                           <div class="frequency">Total</div>
                        </div>
                        <hr class="cell-divide-hr">
                        <div class="button-wrapper">
                           <a class="btn-solid-reg popup-with-move-anim" type="submit" href="#antesTrab">Ingresar</a>
                        </div>
                     </div>
                  </div>
                  <!-- end of card -->
                  <!-- end of card -->
                  <!-- Card-->
                  <div class="card">
                     <div class="card-body">
                        <div class="card-title">Materiales de bodega</div>
                        <hr class="cell-divide-hr">
                        </br></br>
                        <div class="card-subtitle">Registrar materiales utilizado de la bodega</div>
                        <hr class="cell-divide-hr">
                        <div class="button-wrapper">
                           <a class="btn-solid-reg popup-with-move-anim" type="submit" href="#bodega">Ingresar</a>
                        </div>
                     </div>
                  </div>
                  <!-- end of card -->
                  <!-- end of card -->
                  <!-- Card-->
                  <div class="card">
                     <div class="card-body">
                        <div class="card-title">Combustible</div>
                        <hr class="cell-divide-hr">
                        </br>
                        <div class="form-group">
                           <label for="cars">Seleccione el tipo de combustible:</label>
                           <select class="form-control-input" name="cars" id="cars">
                              <option value="" selected>Seleccione</option>
                              <?php 
                              foreach($tipos_combustible as $row)
                              { ?>
                              <option value=""><?php echo $row->NombreTipoGasto?></option>
                              <?php }?>
                           </select>
                        </div>
                        <div class="form-group">
                           <input type="text" class="form-control-input" id="cemail" required>
                           <label class="label-control" for="cemail">Ingresar Gasto $</label>
                           <div class="help-block with-errors"></div>
                        </div>
                        <hr class="cell-divide-hr">
                        <div class="button-wrapper">
                           <a class="btn-solid-reg page-scroll" href="#request">Guardar</a>
                        </div>
                     </div>
                  </div>
                  <!-- end of card -->
                  <!-- end of card -->
                  <div class="card">
                     <div class="card-body">
                        <div class="card-title">Gasto Varios</div>
                        <hr class="cell-divide-hr">
                        </br></br>
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
                        <hr class="cell-divide-hr">
                        <div class="button-wrapper">
                           <a class="btn-solid-reg page-scroll" id="addgastos_varios" href="#request">Guardar</a>
                        </div>
                     </div>
                  </div>
                  <!-- end of card -->
                  <!-- end of card -->
               </div>
               <!-- end of col -->
            </div>
            <!-- end of row -->
         </div>
         <!-- end of container -->
         <div class="card">
            <div class="card-body">
               <div class="card-title">Subir Documentos</div>
               <hr class="cell-divide-hr">
               </br></br>
               <div class="card-subtitle">Registrar documentos que verique la compra o el trabajo hecho</div>
               <hr class="cell-divide-hr">
               <div class="button-wrapper">
                  <a class="btn-solid-reg popup-with-move-anim" type="submit" href="#documentosubir">Ingresar</a>
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
      <!-- end of form-2 -->
      <!-- end of contact -->
      </div> <!-- end of cards-2 -->
      <!-- end of pricing -->
      <!-- Contact -->
      <div id="asistencia1" class="lightbox-basic zoom-anim-dialog mfp-hide">
         <div class="container">
            <div class="row">
               <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
               <div class="col-lg-4">
                  <div class="card"></div>
                  <div class="card-body">
                     <div class="card-title">Marcar asistencia</div>
                     <hr class="cell-divide-hr">
                     <div class="form-group">
                        <a class="btn-solid-reg popup-with-move-anim" type="submit" href="#mañana">En la mañana</a>    
                     </div>
                     <div class="form-group">
                        <a class="btn-solid-reg popup-with-move-anim" type="submit" href="#tarde">En la tarde</a>
                     </div>
                     <hr class="cell-divide-hr">
                     <div class="button-wrapper">
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
      </div> <!-- end of lightbox-basic -->
      <!-- end of details lightbox 1 -->
      <div id="confirmar" class="lightbox-basic zoom-anim-dialog mfp-hide">
         <div class="container">
            <div class="row">
               <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
               <div class="col-lg-4">
                  <h4>Gasto total: $17000 </br>Vuelto: $3000</h4>
                  <a class="btn-solid-reg mfp-close page-scroll" href="<?php echo base_url()?>Operacion" class="nav-link <?php if(isset($activo) && ($activo == 1)){echo "active"; }?>">Guardar</a> <a class="btn-outline-reg mfp-close as-button" href="#screenshots">Atras</a>
               </div>
               <!-- end of col -->
            </div>
            <!-- end of row -->
         </div>
         <!-- end of container -->
      </div>
      <!-- end of lightbox-basic -->
      <!-- end of details lightbox 1 -->
      <div id="mañana" class="lightbox-basic zoom-anim-dialog mfp-hide">
         <div class="container">
            <div class="row">
               <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
               <div class="col-lg-4">
                  <h4>Registrar hora de Salida </h4>
                  <form data-toggle="validator" data-focus="false">
                     <div class="form-group">
                        <input type="time" class="form-control-input" required>
                        <label class="label-control" for="cname"></label>
                        <div class="help-block with-errors"></div>
                     </div>
                     <div class="form-group">
                        <a class="btn-solid-reg popup-with-move-anim" type="submit" href="#detalleTrabajo">Guardar</a></br> </br>
                     </div>
                  </form>
               </div>
               <!-- end of col -->
            </div>
            <!-- end of row -->
         </div>
         <!-- end of container -->
      </div>
      <!-- end of lightbox-basic -->
      <div id="tarde" class="lightbox-basic zoom-anim-dialog mfp-hide">
         <div class="container">
            <div class="row">
               <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
               <div class="col-lg-4">
                  <div class="card"></div>
                  <div class="card-body">
                     <div class="card-title">Marcar asistencia</div>
                     <hr class="cell-divide-hr">
                     <div class="form-group">
                        <a class="btn-solid-reg popup-with-move-anim" type="submit" href="#retorno">Hora de retorno</a>
                     </div>
                     <div class="form-group">
                        <a class="btn-solid-reg popup-with-move-anim" type="submit" href="#salida">Hora de salida</a>
                     </div>
                     <div class="form-group">
                        <a class="btn-solid-reg popup-with-move-anim" type="submit" href="#retornoFinal">Hora de retorno finalizado</a>
                     </div>
                     <hr class="cell-divide-hr">
                     <div class="button-wrapper">
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
      </div> <!-- end of lightbox-basic -->
      <!-- end of details lightbox 1 -->
      <div id="retorno" class="lightbox-basic zoom-anim-dialog mfp-hide">
         <div class="container">
            <div class="row">
               <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
               <div class="col-lg-4">
                  <h4>Registrar hora de retorno </h4>
                  <form data-toggle="validator" data-focus="false">
                     <div class="form-group">
                        <input type="time" class="form-control-input" required>
                        <label class="label-control" for="cname"></label>
                        <div class="help-block with-errors"></div>
                     </div>
                     <div class="form-group">
                        <a class="btn-solid-reg popup-with-move-anim" type="submit" href="#detalleTrabajo">Guardar</a></br> </br>
                     </div>
                  </form>
               </div>
               <!-- end of col -->
            </div>
            <!-- end of row -->
         </div>
         <!-- end of container -->
      </div>
      <!-- end of lightbox-basic -->
      <div id="salida" class="lightbox-basic zoom-anim-dialog mfp-hide">
         <div class="container">
            <div class="row">
               <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
               <div class="col-lg-4">
                  <h4>Registrar hora de Salida </h4>
                  <form data-toggle="validator" data-focus="false">
                     <div class="form-group">
                        <input type="time" class="form-control-input" required>
                        <label class="label-control" for="cname"></label>
                        <div class="help-block with-errors"></div>
                     </div>
                     <div class="form-group">
                        <a class="btn-solid-reg popup-with-move-anim" type="submit" href="#detalleTrabajo">Guardar</a></br> </br>
                     </div>
                  </form>
               </div>
               <!-- end of col -->
            </div>
            <!-- end of row -->
         </div>
         <!-- end of container -->
      </div>
      <!-- end of lightbox-basic -->
      <div id="retornoFinal" class="lightbox-basic zoom-anim-dialog mfp-hide">
         <div class="container">
            <div class="row">
               <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
               <div class="col-lg-4">
                  <h4>Registrar hora retorno  </h4>
                  <form data-toggle="validator" data-focus="false">
                     <div class="form-group">
                        <input type="time" class="form-control-input" required>
                        <label class="label-control" for="cname"></label>
                        <div class="help-block with-errors"></div>
                     </div>
                     <div class="form-group">
                        <a class="btn-solid-reg popup-with-move-anim" type="submit" href="#detalleTrabajo">Guardar</a></br> </br>
                     </div>
                  </form>
               </div>
               <!-- end of col -->
            </div>
            <!-- end of row -->
         </div>
         <!-- end of container -->
      </div>
      <!-- end of lightbox-basic -->
      <div id="duranteTrab" class="lightbox-basic zoom-anim-dialog mfp-hide">
         <div class="container">
            <div class="row">
               <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
               <div class="col-lg-4">
                  <div class="card"></div>
                  <div class="card-body" id="dynamic_field" >
                     <div class="card-title">Ingrese materiales comprados durante el trabajo</div>
                     <hr class="cell-divide-hr">
                     <table class="table table-bordered" >
                        <TR>
                           <TH>Material</TH>
                           <TD><input type="text" id="item_material" placeholder="Ingrese" class="form-control" /></TD>
                        </TR>
                        <TR>
                           <TH>Cantidad</TH>
                           <TD><input type="text" id="item_cantidad" placeholder="Ingrese" class="form-control" /></TD>
                        </TR>
                        <TR>
                           <TH>Total $</TH>
                           <TD><input type="text" id="item_valortotal" placeholder="Ingrese" class="form-control" /></TD>
                        </TR>
                        <TR>
                           <TH>Agregar más</TH>
                           <TD><button type="button" name="add" id="durante" class="btn btn-success">+</button></TD>
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
               <a class="btn-solid-reg" id="addmaterial1" href="#">Guardar</a></br> </br>
            </div>
         </div>
         <!-- end of row -->
      </div>
      <!-- end of container -->
      </div> <!-- end of lightbox-basic -->
      <!-- end of details lightbox 1 -->
      <div id="antesTrab" class="lightbox-basic zoom-anim-dialog mfp-hide">
         <div class="container">
            <div class="row">
               <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
               <div class="col-lg-4">
                  <div class="card"></div>
                  <div class="card-body" id="dynamic_field2">
                     <div class="card-title">Ingrese materiales comprados antes el trabajo</div>
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
               <a class="btn-solid-reg" id="addmaterial2" href="#">Guardar</a></br> </br>
            </div>
         </div>
         <!-- end of row -->
      </div>
      <!-- end of container -->
      <div id="bodega" class="lightbox-basic zoom-anim-dialog mfp-hide">
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
                           <TD><input type="text" name="name[]" placeholder="Ingrese" class="form-control" /></TD>
                        </TR>
                        <TR>
                           <TH>Cantidad</TH>
                           <TD><input type="text" name="name[]" placeholder="Ingrese" class="form-control" /></TD>
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
               <a class="btn-solid-reg popup-with-move-anim" type="submit" href="#detalleTrabajo">Guardar</a></br> </br>
            </div>
         </div>
         <!-- end of row -->
      </div>
      <!-- end of container -->
      <div id="documentosubir" class="lightbox-basic zoom-anim-dialog mfp-hide">
         <div class="container">
            <div class="row">
               <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
               <div class="col-lg-4">
                  <div class="card"></div>
                  <div class="card-body" id="dynamic_field" >
                     <div class="card-title">Subir documentos</div>
                     <hr class="cell-divide-hr">

                        <form id="form_subidas" action="<?php echo base_url(); ?>imagenes/subir" method="POST" class="form-horizontal">
                        <input type="file" name="archivo[]" multiple>
                        <input type="submit" value="Subir">
                        </form>

                     <table class="table table-bordered" >
                        <TR>
                           <TD> <input type="file" name="archivossubidos[]" multiple></TD>
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
               <a class="btn-solid-reg" type="submit" href="#detalleTrabajo">Guardar</a></br> </br>
            </div>
           
         </div>
         <!-- end of row -->
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
      <script type="text/javascript" src="<?php echo base_url()?>assets/js/MaterialesDurante.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/js/MaterialesAntes.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/js/MaterialesBodega.js"></script>
      <!-- Scripts -->
      <script src="assets/js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
      <script src="assets/js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
      <script src="assets/js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
      <script src="assets/js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
      <script src="assets/js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
      <script src="assets/js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
      <script src="assets/js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
      <script src="assets/js/scripts.js"></script> <!-- Custom scripts -->



      <script src="<?php echo base_url()?>assets/js/Operaciones/ingreso_planilla.js"></script>


      <script src="<?php echo base_url();?>assets/js/imagenes.js"></script>
      
      <script src="<?php echo base_url()?>assets/js/Operaciones/ingreso_planilla_detalle.js"></script>

   </body>
</html>