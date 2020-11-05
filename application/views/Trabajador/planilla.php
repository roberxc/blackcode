<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- SEO Meta Tags -->
      <meta name="description" content="Create a stylish landing page for your business startup and get leads for the offered services with this HTML landing page template.">
      <meta name="author" content="Inovatik">
      <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
      <meta property="og:site_name" content="" />
      <!-- website name -->
      <meta property="og:site" content="" />
      <!-- website link -->
      <meta property="og:title" content=""/>
      <!-- title shown in the actual shared post -->
      <meta property="og:description" content="" />
      <!-- description shown in the actual shared post -->
      <meta property="og:image" content="" />
      <!-- image link, make sure it's jpg -->
      <meta property="og:url" content="" />
      <!-- where do you want your post to link to -->
      <meta property="og:type" content="article" />
      <!-- Website Title -->
      <title>Registro de trabajo diario</title>
      <!-- Styles -->
      <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
      <link href="assets/css/bootstrap.css" rel="stylesheet">
      <link href="assets/css/fontawesome-all.css" rel="stylesheet">
      <link href="assets/css/swiper.css" rel="stylesheet">
      <link href="assets/css/magnific-popup.css" rel="stylesheet">
      <link href="assets/css/styles.css" rel="stylesheet">
      <!-- Favicon  -->
      <link rel="icon" href="">
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
                        <a class="btn-solid-reg " href="<?php echo base_url()?>AsistenciaTrabajador"  <?php if(isset($activo) && ($activo == 1)){echo "active"; }?>>Ingresar</a>
                        </div>
                        <hr class="cell-divide-hr">
                     </div>
                  </div>
                  <!-- end of card -->
                  <!-- end of card -->
                  <!-- Card-->

                  <div class="card">
                     <div class="card-body">
                        <div class="card-title">Gasto de Vaticos</div>
                        <hr class="cell-divide-hr">
                        <div class="price">
                           <span class="currency">$</span><span class="value">5000</span>
                           <div class="frequency">Total</div>
                        </div>
                        <hr class="cell-divide-hr">
                        <ul class="list-unstyled li-space-lg">
                           <li class="media">
                              <i class="fas fa-check"></i>
                              <div class="media-body">Desayuno</div>
                           </li>
                           <li class="media">
                              <i class="fas fa-check"></i>
                              <div class="media-body">Almuerzo</div>
                           </li>
                           <li class="media">
                              <i class="fas fa-times"></i>
                              <div class="media-body">Cena</div>
                           </li>
                           <li class="media">
                              <i class="fas fa-times"></i>
                              <div class="media-body">Agua</div>
                           </li>
                           <li class="media">
                              <i class="fas fa-times"></i>
                              <div class="media-body">Alojamiento</div>
                           </li>
                        </ul>
                        <div class="button-wrapper">
                           <a class="btn-solid-reg popup-with-move-anim" type="submit" href="#vaticos">Ingresar</a>
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
                              <h4>Ingrese los gasto de Vaticos </h4>
                              <form id="contactForm" data-toggle="validator" data-focus="false">
                                 <div class="form-group">
                                    <input type="number" class="form-control-input" id="cname" required>
                                    <label class="label-control" for="cname">Desayuno</label>
                                    <div class="help-block with-errors"></div>
                                 </div>
                                 <div class="form-group">
                                    <input type="number" class="form-control-input" id="cemail" required>
                                    <label class="label-control" for="cemail">Almuerzo</label>
                                    <div class="help-block with-errors"></div>
                                 </div>
                                 <div class="form-group">
                                    <input type="number" class="form-control-input" id="cemail" required>
                                    <label class="label-control" for="cemail">Cena</label>
                                    <div class="help-block with-errors"></div>
                                 </div>
                                 <div class="form-group">
                                    <input type="number" class="form-control-input" id="cemail" required>
                                    <label class="label-control" for="cemail">Agua</label>
                                    <div class="help-block with-errors"></div>
                                 </div>
                                 <div class="form-group">
                                    <input type="number" class="form-control-input" id="cemail" required>
                                    <label class="label-control" for="cemail">Alojamiento</label>
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
                  <!-- Card-->

                  <div class="card">
                     <div class="card-body">
                        <div class="card-title">Materiales comprados durante el trabajo</div>
                        <hr class="cell-divide-hr">
                        <div class="price">
                           <span class="currency">$</span><span class="value">10000</span>
                           <div class="frequency">Total</div>
                        </div>
                        <hr class="cell-divide-hr">
                        <div class="button-wrapper">
                           <a class="btn-solid-reg popup-with-move-anim" type="submit" href="#duranteTrab">Ingresar</a>
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
                           <label for="cars">Ingrese tipo de combustible:</label>
                           <select class="form-control-input" name="cars" id="cars">
                              <option value="volvo">Combustible 1</option>
                              <option value="saab">Combustible 2</option>
                              <option value="mercedes">Combustible 3</option>
                              <option value="audi">Combustible 4</option>
                           </select>
                        </div>
                        <div class="form-group">
                           <input type="text" class="form-control-input" id="cemail" required>
                           <label class="label-control" for="cemail">Ingresar Gato $</label>
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
                  <!-- Card-->

                  <div class="card">
                     <div class="card-body">
                        <div class="card-title">Gasto Varios</div>
                        <hr class="cell-divide-hr">
                        </br></br>
                        <div class="form-group">
                           <input type="text" class="form-control-input" id="cemail" required>
                           <label class="label-control" for="cemail">Peaje $</label>
                           <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                           <input type="text" class="form-control-input" id="cemail" required>
                           <label class="label-control" for="cemail">Estacionamiento $</label>
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
                  <form id="contactForm" data-toggle="validator" data-focus="false">
                     <div class="form-group">
                        <input type="time" class="form-control-input" id="cname" required>
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
                  <form id="contactForm" data-toggle="validator" data-focus="false">
                     <div class="form-group">
                        <input type="time" class="form-control-input" id="cname" required>
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
                  <form id="contactForm" data-toggle="validator" data-focus="false">
                     <div class="form-group">
                        <input type="time" class="form-control-input" id="cname" required>
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
                  <form id="contactForm" data-toggle="validator" data-focus="false">
                     <div class="form-group">
                        <input type="time" class="form-control-input" id="cname" required>
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
                           <TD><input type="text" name="name[]" placeholder="Ingrese" class="form-control" /></TD>
                        </TR>
                        <TR>
                           <TH>Cantidad</TH>
                           <TD><input type="text" name="name[]" placeholder="Ingrese" class="form-control" /></TD>
                        </TR>
                        <TR>
                           <TH>Valor/Unidad</TH>
                           <TD><input type="text" name="name[]" placeholder="Ingrese" class="form-control" /></TD>
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
               <a class="btn-solid-reg popup-with-move-anim" type="submit" href="#detalleTrabajo">Guardar</a></br> </br>
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
                  <div class="card-body" id="dynamic_field" >
                     <div class="card-title">Ingrese materiales comprados antes el trabajo</div>
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
                           <TH>Valor/Unidad</TH>
                           <TD><input type="text" name="name[]" placeholder="Ingrese" class="form-control" /></TD>
                        </TR>
                        <TR>
                           <TH>Agregar más</TH>
                           <TD><button type="button" name="add" id="antes" class="btn btn-success">+</button></TD>
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
               <a class="btn-solid-reg popup-with-move-anim" type="submit" href="#detalleTrabajo">Guardar</a></br> </br>
            </div>
         </div>
         <!-- end of row -->
      </div>
      <!-- end of container -->
      </div> <!-- end of lightbox-basic -->
      <!-- end of details lightbox 1 -->

      <!-- Scripts modal -->
      <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
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
   </body>
</html>