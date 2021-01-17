
<head>
<meta charset="utf-8">
<!-------------------------------------------------------------------------------------------------------------->
 
    <!-- FONT AWESOME CSS -->
    <link href="<?php echo base_url();?>assets/evaluacionpro/css/font-awesome.min.css" rel="stylesheet" />
    <!-- ANIMATE  CSS -->
    <link href="<?php echo base_url();?>assets/evaluacionpro/css/animate.css" rel="stylesheet" />
    <!-- PRETTY PHOTO  CSS -->
    <link href="<?php echo base_url();?>assets/evaluacionpro/css/prettyPhoto.css" rel="stylesheet" />
    <!--  STYLE SWITCHER CSS -->
    <link href="<?php echo base_url();?>assets/evaluacionpro/css/styleSwitcher.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="<?php echo base_url();?>assets/evaluacionpro/css/style.css" rel="stylesheet" />
    <!--PINK STYLE VERSION IS BY DEFAULT, USE ANY ONE STYLESHEET FROM FOUR STYLESHEETS (pink,green,blue and brown) HERE-->
    <link href="<?php echo base_url();?>assets/evaluacionpro/css/blue.css" id="mainCSS" rel="stylesheet" />
  <!---------------------------------------------------------------------------------------------------------->
</head>
<body>


    <div id="home-sec">
        <div class="overlay">
            <div class="container">
                <div class="row pad-top-bottom  move-me">
                    <div class="col-lg-5 col-md-5 col-sm-5 text-center">
                    <form>
                            <label>Nombre Proyecto</label>
                            <div class="form-group">
                                <input type="text" class="form-control" required="required"  />
                            </div>
                            <label>Fecha de inicio</label>
                            <div class="form-group">
                                <input type="date" class="form-control" required="required"  />
                            </div>
                            <label>Fecha de termino</label>
                            <div class="form-group">
                                <input type="date" class="form-control" required="required"  />
                            </div>
                            <label>Monto total del proyecto</label>
                            <div class="form-group">
                                <input type="number" class="form-control" required="required" />
                            </div>
                            <div class="form-group">
                                <a href="#hire-sec" class="btn custom-btn-one ">Guardar</a>
                            </div>

                        </form>
                    
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 text-center  ">
                        <a href="<?php echo base_url();?> nicio" data-toggle="modal" data-target="#modal-lg" class="small-box-footer" class="wow bounceIn animated" data-wow-duration="1s" data-wow-delay=".1s">
                            <i class="fa fa-briefcase icon-round "></i>
                            <h4 class="wow bounceIn animated" data-wow-duration="1s" data-wow-delay=".2s">Partidas</h3>
                        </a>
                        <a href="<?php echo base_url();?> nicio" data-toggle="modal" data-target="#etapas" class="small-box-footer" class="wow bounceIn animated" data-wow-duration="1s" data-wow-delay=".3s">
                            <i class="fa fa-briefcase icon-round"></i>
                            <h4 class="wow bounceIn animated" data-wow-duration="1s" data-wow-delay=".4s">Etapas</h4>
                        </a>
                        <a href="<?php echo base_url();?> nicio" data-toggle="modal" data-target="#despiece" class="small-box-footer" class="wow bounceIn animated" data-wow-duration="1s" data-wow-delay=".5s">
                            <i class="fa fa-briefcase icon-round "></i>
                            <h4 class="wow bounceIn animated" data-wow-duration="1s" data-wow-delay=".6s">Despiece</h4>
                        </a>
                        <a href="<?php echo base_url();?> nicio" data-toggle="modal" data-target="#insta" class="small-box-footer" class="wow bounceIn animated" data-wow-duration="1s" data-wow-delay=".5s">
                            <i class="fa fa-briefcase icon-round "></i>
                            <h4 class="wow bounceIn animated" data-wow-duration="1s" data-wow-delay=".6s">Instalación</h4>
                        </a>
                        <a href="<?php echo base_url();?> nicio" data-toggle="modal" data-target="#supervision" class="small-box-footer" class="wow bounceIn animated" data-wow-duration="1s" data-wow-delay=".5s">
                            <i class="fa fa-briefcase icon-round "></i>
                            <h4 class="wow bounceIn animated" data-wow-duration="1s" data-wow-delay=".6s">Supervisión</h4>
                        </a>
                       
                        <a href="<?php echo base_url();?> nicio" data-toggle="modal" data-target="#modal-lg3" class="small-box-footer" class="wow bounceIn animated" data-wow-duration="1s" data-wow-delay=".7s">
                            <i class="fa fa-paper-plane-o icon-round"></i>
                            <h4 class="wow bounceIn animated" data-wow-duration="1s" data-wow-delay=".12s">Guardar</h4>
                        </a>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-5 text-center">
                    <label for="cars" >Seleccione Partidas del proyecto:</label>

                        <select class="form-control" name="cars" id="cars">
                        <option value="volvo">Plantas</option>
                        <option value="saab">Elevación</option>
                        <option value="mercedes">Elevación 2</option>
                        <option value="audi">Elevación 3</option>
                        </select>
                    </br>
                        <TABLE BORDER class="table table-bordered ">
                            <TR><TH>Subtotal por partida</TH>
                                <TD>$361000</TD></TR>
                            <TR><TH>Imprevistos</TH>
                                <TD>$36100</TD>  </TR>
                            <TR><TH>Costo materiales</TH>
                                <TD>$397100</TD>  </TR>
                            <TR><TH>Instalación</TH>
                                <TD>$500000</TD>  </TR>
                            <TR><TH>Supervisión</TH>
                                <TD>$240000</TD>  </TR>
                            <TR><TH>Valor equipamiento instalado</TH>
                                <TD>$24000</TD>  </TR>
                            <TR><TH>Supervisión</TH>
                                <TD>$1137100</TD>  </TR>
                            <TR><TH>Flete traslado </TH>
                                <TD>$300000</TD>  </TR>
                            <TR><TH>Gastos generales </TH>
                                <TD></TD>  </TR>
                            <TR><TH>Comisiones </TH>
                                <TD></TD>  </TR>
                            <TR><TH>Ingeniería </TH>
                                <TD></TD>  </TR>
                            <TR><TH>Utilidades </TH>
                                <TD></TD>  </TR>
                            <TR><TH>Precio sugerido venta </TH>
                                <TD>$1437100</TD>  </TR>
                        </TABLE>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--------------------------------------------------------------------------------------------->
    <!-- /.modal -->
    <div class="modal fade" id="insta">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Registrar Instalación</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                   
               <div class="card-body">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                        <label>Valor total según días de instalación:</label>
                            <div class="form-group">
                                <input type="number" class="form-control" required="required"  />
                            </div>
                        </div>
                        <!-- /.form-group -->

                        <!-- /.form-group -->
                      </div>
                      <!-- /.col -->

                      <div class="col-md-2">
                        <!-- /.form-group -->
                        <div class="form-group">
                          <label class="invisible">Guardar</label>
                          <button type="button" class="btn btn-block btn-primary">Guardar</button>
                        </div>
                        <!-- /.form-group -->
                      </div>
                      <!-- /.col -->
                    </div>
                    
                  <div class="col-lg-10" id="dynamic_field">
                    
                     <table class="table table-bordered" id="tabla_personal">
                        <TR>
                           <TH>Cantidad</TH>
                           <TH>item</TH>
                           <TH>Precio Unitario</TH>
                           <TH></TH>
                        </TR>
                        <tr>
                           <TD><input type="number" name="partida" id="item_partida" class="form-control"/></TD>
                           <TD><input type="text" name="partida" id="item_partida" class="form-control"/></TD>
                           <TD><input type="number" name="partida" id="item_partida" class="form-control"/></TD>
                           <TD><button type="button" name="add" id="agregarTrabajador" class="btn btn-success">+</button></TD>
                        </tr>
                     </table>
                  </div>
                  <!-- end of col -->
                  <!-- href="<?php echo base_url()?>PlantillaOperaciones"-->
                  
                   </div>
                   
                 </div>
                 <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-primary">Guardar</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          </div>
    

<!---------------------------------------->
<!-- /.modal -->
<div class="modal fade" id="supervision">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Registrar Supervisión</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                    <div class="card-body">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                        <label>Valor total según días de instalación:</label>
                            <div class="form-group">
                                <input type="number" class="form-control" required="required"  />
                            </div>
                        </div>
                        <!-- /.form-group -->

                        <!-- /.form-group -->
                      </div>
                      <!-- /.col -->

                      <div class="col-md-2">
                        <!-- /.form-group -->
                        <div class="form-group">
                          <label class="invisible">Guardar</label>
                          <button type="button" class="btn btn-block btn-primary">Guardar</button>
                        </div>
                        <!-- /.form-group -->
                      </div>
                      <!-- /.col -->
                    </div>
                  <div class="col-lg-10" id="dynamic_field">
                    
                     <table class="table table-bordered" id="tabla_personal">
                        <TR>
                           <TH>Cantidad</TH>
                           <TH>item</TH>
                           <TH>Precio Unitario</TH>
                           <TH></TH>
                        </TR>
                        <tr>
                           <TD><input type="number" name="partida" id="item_partida" class="form-control"/></TD>
                           <TD><input type="text" name="partida" id="item_partida" class="form-control"/></TD>
                           <TD><input type="number" name="partida" id="item_partida" class="form-control"/></TD>
                           <TD><button type="button" name="add" id="agregarTrabajador" class="btn btn-success">+</button></TD>
                        </tr>
                     </table>
                  </div>
                  <!-- end of col -->
                  <!-- href="<?php echo base_url()?>PlantillaOperaciones"-->
                  
                   </div>
                   
                 </div>
                 <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-primary">Guardar</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          </div>
    <!------------------------------------------------------------------------------------>
    <!-- /.modal -->
    <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Registrar Partidas del proyecto</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                 
                  <div class="col-lg-10" id="dynamic_field">
                    
                     <table class="table table-bordered" id="tabla_personal">
                        <TR>
                           <TH>Nombre de partida</TH>
                           <TH></TH>
                        </TR>
                        <tr>
                           <TD><input type="text" name="partida" id="item_partida" class="form-control"/></TD>
                           <TD><button type="button" name="add" id="agregarTrabajador" class="btn btn-success">+</button></TD>
                        </tr>
                     </table>
                  </div>
                  
                   </div>
                   
                 </div>
                 <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-primary">Guardar</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
    

<!---------------------------------------->
 <!-- /.modal -->
 <div class="modal fade" id="etapas">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Registrar etapas de las pratidas </h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                 
                  <div class="col-lg-10" id="dynamic_field">
                    
                     <table class="table table-bordered" id="tabla_personal">
                        <TR>
                           <TH>Nombre de partida</TH>
                           <TH>Etapa</TH>
                           <TH></TH>
                        </TR>
                        <tr>
                           <TD>
                           <select class="form-control select2bs4" style="width: 90%;">
                            <option selected="selected">Seleccione</option>
                            <option>Proveedor 1</option>
                            <option>Proveedor 2</option>
                            <option>Proveedor 3</option>
                        </select>
                        </TD>
                        <TD><input type="text" name="Etapa" id="item_partida" class="form-control"/></TD>
                           <TD><button type="button" name="add" id="agregarTrabajador" class="btn btn-success">+</button></TD>
                        </tr>
                     </table>
                  </div>
                  <!-- end of col -->
                  <!-- href="<?php echo base_url()?>PlantillaOperaciones"-->
                  
                   </div>
                   
                 </div>
                 
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-primary">Guardar</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
 <!--------------------------------------------------------------------------------------------->
    <!-- /.modal -->
    <div class="modal fade" id="despiece">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Registrar Partidas del proyecto</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="row">
              <!-- Buscador de partidas ------------------------------>      
                    <div class="card-body">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label>Partida</label>
                          <select class="form-control select2bs4" style="width: 100%;">
                            <option selected="selected">Seleccione</option>
                            <option>Plantas</option>
                            <option>Elevación</option>
                          </select>
                        </div>
                        <!-- /.form-group -->

                        <!-- /.form-group -->
                      </div>
                      <!-- /.col -->

                      <div class="col-md-2">
                        <!-- /.form-group -->
                        <div class="form-group">
                          <label class="invisible">Listar</label>
                          <button type="button" class="btn btn-block btn-primary">Listar</button>
                        </div>
                        <!-- /.form-group -->
                      </div>
                      <!-- /.col -->
                    </div>
                
                  <!--Tabla despiece-------------------------------------->
                  
                
                  <div class="col-lg-10" id="dynamic_field">
                    
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Etapa</th>
                    <th>Estado</th>              
                    <th>Ingresar Despiece</th>
                    <!--<th>Editar</th>
                    <th>Descargar</th>-->

                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>Parillas</td>
                    <td>Sin registro</td>

                    <td>

                    <a class="btn btn-block btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                               data-target="#registro_despiece">Despiece</a>

                    </td>
                  </tr>
                  <tr>
                    <td>Lineas aireación</td>
                    <td>Registrado</td>
                  
                           
                      <td>

                        <a class="btn btn-block btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                               data-target="#registro_despiece">Despiece</a>

                      </td><!--
                    
-->
                  </tr>
                  </tbody>

                </table>
                  </div>
                  <!-- end of col -->
                  <!-- href="<?php echo base_url()?>PlantillaOperaciones"-->
                  
                   </div>
                   
                 </div>
                 <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-primary">Guardar</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
    

<!---------------------------------------->
 <!-- /.modal -->
 <div class="modal fade" id="registro_despiece">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Registrar Despiece</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                 
                  <div class="col-lg-10" id="dynamic_field">
                    
                     <table class="table table-bordered" id="tabla_personal">
                        <TR>
                           <TH>Cantidad</TH>
                           <TH>item</TH>
                           <TH>Precio Unitario</TH>
                           <TH></TH>
                        </TR>
                        <tr>
                           <TD><input type="number" name="partida" id="item_partida" class="form-control"/></TD>
                           <TD><input type="text" name="partida" id="item_partida" class="form-control"/></TD>
                           <TD><input type="number" name="partida" id="item_partida" class="form-control"/></TD>
                           <TD><button type="button" name="add" id="agregarTrabajador" class="btn btn-success">+</button></TD>
                        </tr>
                     </table>
                  </div>
                  <!-- end of col -->
                  <!-- href="<?php echo base_url()?>PlantillaOperaciones"-->
                  
                   </div>
                   
                 </div>
                 <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-primary">Guardar</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
    

<!---------------------------------------->




</body>

</html>
