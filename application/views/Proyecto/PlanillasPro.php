<head>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/stylePlanillapro.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.css" />

</head>

<div class="smoke">
    <div class="container" id="fh5co-pricing">

        <div class="heading animate-box"><h2><b>Balance Proyecto</b></h2></div>
        <div class="text-center animate-box"><h3>$99.280.000</h3></div>
        <br><br>
        <div class="row">
            <div class="col-sm-4 animate-box" data-animate-effect="fadeInLeft">
                <div class="price-box-dark animate-box">
                    <h3><b>Registro compras materiales</b></h3>
                    <!--<h2 class="text-org"><b >Precio</b></h2>-->
                    <!--<h3><b>Titulo</b></h3>-->
                    <div class="gr-line"></div>
                    <div >Total monto <b class="text-gr">$20000</b></div>
                    <div class="gr-line"></div>
                    <div>Total Presupuesto <b class="text-gr">$150.000 </b></div>
                    <div class="gr-line"></div>
                    <div>Total Balance <b class="text-gr">$50.000</b> </div>
                    <br>
                    <button class="btn btn-banner" href="<?php echo base_url()?>Inicio" data-toggle="modal"
          data-target="#materiales">Ver detalles</button>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="price-box-dark animate-box">
                    <h3><b>Registro trabajo diarios</b></h3>
                    <!--<h3><b>PER MONTH</b></h3>
                    <div class="gr-line"></div>
                    <div>50 GB DISK SPACE</div>-->
                    <div class="gr-line"></div>
                    <div>Registro mano de obra</div>
                    <div class="gr-line"></div>

                    <br>
                    <button class="btn btn-banner" href="<?php echo base_url()?>Inicio" data-toggle="modal"
          data-target="#trabajoDiario">Ver detalles </button>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="price-box-dark animate-box" data-animate-effect="fadeInRight">
                    <h3><b>Planilla mano de obra</b></h3>
                    <div class="gr-line"></div>
                    <div>Total Proyecto <b class="text-gr">$520.000</b></div>
                    <div class="gr-line"></div>
                    
                    <br>
                    <button class="btn btn-banner" href="<?php echo base_url()?>Inicio" data-toggle="modal"
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
                <div class="modal-body">
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Fecha</th>
                    <th>Detalle</th>
                    <th>Codigo de servicio</th>
                    <th>Personal</th>
                    <th>Registro fotográfico</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>04/10/2020</td>
                    <td>Se trabaja en armado</td>
                    <td>Pr0001</td>
                    <td> <a class="btn btn-block btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                      data-target="#personal">Personal</a></td>
                    <td> <a class="btn btn-block btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                      data-target="#modal-lg">Descargar</a></td>
                  </tr>
                  <tr>
                    <td>05/10/2020</td>
                    <td>Se trabaja en instalación</td>
                    <td>Pr0002</td>
                    <td> <a class="btn btn-block btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                      data-target="#personal">Personal</a></td>
                    <td> <a class="btn btn-block btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                      data-target="#modal-lg">Descargar</a></td>
                  </tr>
                  <tr>
                    <td>06/10/2020</td>
                    <td>Se trabaja en inspección</td>
                    <td>Pr0003</td>
                    <td> <a class="btn btn-block btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                      data-target="#personal">Personal</a></td>
                    <td> <a class="btn btn-block btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                      data-target="#modal-lg">Descagar</a></td>
                  </tr>
                  </table>
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
      <div class="modal-body">
          <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Personal</th>
          <th>Horas</th>

        </tr>
        </thead>
        <tbody>
        <tr>
          <td>Jorge</td>
          <td>7</td>


        </tr>
        <tr>
          <td>Omar</td>
          <td>7</td>


        </tr>
        </table>
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
      <div class="modal-body">
          <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Total mano de obra</th>
          <th>Total horas</th>
          <th>Hora trabajador</th>
          <th>Costo total</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>Jose</td>
          <td>16</td>
          <td>20000</td>
          <td>320000</td>
        </tr>

        <tr>
          <td>Omar</td>
          <td>10</td>
          <td>20000</td>
          <td>320000</td>
        </tr>
        <tfoot>
        <tr>
          <th>Total:</th>
          <th></th>
          <th></th>
          <th>520000</th>
        </tr>
        </tfoot>
        </table>
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
                <div class="modal-body">
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Compras</th>
                    <th>Monto</th>
                    <th>Detalle</th>
                    <th>Presupuesto</th>
                    <th>Balance por item</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>Factura N°XX</td>
                    <td>50000</td>
                    <td>Armado estructura</td>
                    <td>100000</td>
                    <td>50000</td>

                  </tr>
                  <tr>
                    <td>Factura N°YY</td>
                    <td>150000</td>
                    <td>Armado </td>
                    <td>50000</td>
                    <td>100000</td>

                  </tr>
                  <tfoot>
                  <tr>
                    <th>Total:</th>
                    <th>200000</th>
                    <th></th>
                    <th>150000</th>
                    <th>50000</th>

                  </tr>
                  </tfoot>

                  </table>
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


<script src="src="<?php echo base_url();?>assets/js/PlanillaProyecto/jquery.min.js"></script>



<script src="src="<?php echo base_url();?>assets/js/PlanillaProyecto/jquery.waypoints.min.js"></script>
<script src="src="<?php echo base_url();?> assets/js/PlanillaProyecto/animate.js"></script>







