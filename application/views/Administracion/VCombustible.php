<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<meta charset="utf-8">
  <!-- SELECT CON BUSCADOR -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
   <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" rel="stylesheet" />
   <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css" rel="stylesheet" />
   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <!-- Tell the browser to be responsive to screen width -->
<div class="wrapper">
	<!-- /.navbar -->

	<!-- Content Wrapper. Contains page content nnnnnnnnnnnnnn-->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Registro Combustible</h1>
					</div>

				</div>
			</div>
			<!-- /.container-fluid -->
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-3">

						<!-- Profile Image -->
						<div class="card card-primary card-outline">
							<div class="card-body box-profile">
								<div class="text-center">
									<img class="profile-user-img img-fluid img-circle" src="<?php echo base_url();?>assets/dist/img/combus.png" alt="User profile picture">
								</div>

								<h3 class="profile-username text-center">Consumo Combustible</h3>

								<p class="text-muted text-center">CDH Ingenieria</p>

								<ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Existencia total</b> <a class="float-right"><?php if(isset($total_BoletasC)){ echo $total_BoletasC[0]['total'];}else{echo"0";}?></a>
                                    </li>
                                </ul>

								
								<button type="button" onclick="document.location.reload();"class="btn btn-outline-info btn-block">Actualizar</button>
								
							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->
					</div>
					<!-- /.col -->
					<div class="col-md-9">
						<div class="card">
							<div class="card-header p-2">
								<div class="col-md-3 text-center">
									<h5>Datos del Consumo</h5>
								</div>
								<ul class="nav nav-pills">

								</ul>
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<div class="tab-content">
									<div class="active tab-pane" id="settings">
										<form id="formcombustible" style="padding:0px 15px;" class="form-horizontal" role="form">
											<div class="form-group row">
												<label for="inputName" class="col-sm-2 col-form-label">Fecha</label>
												<div class="col-sm-10">
													<input type="date" min="2021-01-01" value="<?php echo date("Y-m-d\TH-i");?>" class="form-control" data-inputmask="'alias': 'ip'" data-mask id="fecha" >

												


												</div>
											</div>
                                 
                                 <div class="form-group row">
												<label for="inputName" class="col-sm-2 col-form-label">Patente </label>
												<div class="col-sm-10">
												<select name="id_vehiculo" id="id_vehiculo" style="width: 100%; height: 60%">
                              <?php
                                 foreach($lista_vehiculos as $i){
                                   echo '<option value="'. $i->id_vehiculo .'">'. $i->patente .'</option>';
                                 }
                                 ?>
                              </select>
													
												</div>
											</div>

											

                                 <div class="form-group row">
												<label for="inputName" class="col-sm-2 col-form-label">Conductor </label>
												<div class="col-sm-10">
													<input type="text" maxlength="50" style="text-transform:lowercase;" class="form-control" data-inputmask="'alias': 'ip'" data-mask id="conductor" >

												</div>
											</div>

                                 <div class="form-group row">
												<label for="inputName" class="col-sm-2 col-form-label">Estacion </label>
												<div class="col-sm-10">
													<input type="text" maxlength="30" style="text-transform:lowercase;" class="form-control" data-inputmask="'alias': 'ip'" data-mask id="estacion" >

												</div>
											</div>

                                 <div class="form-group row">
												<label for="inputName" class="col-sm-2 col-form-label">Litros </label>
												<div class="col-sm-10">

													<input type="number" min="0" step="1" maxlength="10" style="text-transform:lowercase;" class="form-control" data-inputmask="'alias': 'ip'" data-mask id="litros" >

													

												</div>
											</div>
                                 <div class="form-group row">
												<label for="inputName" class="col-sm-2 col-form-label">Valor </label>
												<div class="col-sm-10">

													<input type="number" min="0" step="1" maxlength="10" style="text-transform:lowercase;" class="form-control" data-inputmask="'alias': 'ip'" data-mask id="valor" >

													


												</div>
											</div>
                                 <div class="form-group row">
												
											</div>	
											<div class="form-group">
                              
                              
                           </div>
                           <hr class="mt-3 mb-3"/>
						   <hr class="mt-3 mb-3" />
						   <label for="exampleInputFile">Adjuntar Documento Asociado</label>
						   
                      
                      
                       
                              <div class="form-group">
                                 <input type="file" class="form-control-file" id="doc_ad">
                              </div>
                           </div>
											<hr class="mt-3 mb-3" />
											
											<div class="form-group row">
												<div class="offset-sm-2 col-sm-10">
													<div class="checkbox">
														<label>
														</label>
													</div>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-md-3 text-center">
													<button type="submit" id="addcombustible" class="btn btn-outline-dark btn-block ">Registrar</button>
												</div>
											</div>

									</div>
									</form>

									<!-- jQuery -->
									<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
									<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
									<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
									<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
									<script>
										var base_url = '<?php echo base_url();?>';
									</script>
									<script type="text/javascript">
   //mostrar tipoproducto
   //mostrar centrodecosto2 en tabla agregar stock
   $(document).ready(function(){
     $('#id_vehiculo').select2({
       theme: "bootstrap"
     });
   });
   $(document).ready(function(){
     $('#id_personal').select2({
       theme: "bootstrap"
     });
   }); 
</script> 
									<script src="<?php echo base_url()?>assets/js/ModoCombustible/registro_combustible.js"></script>
									</body>
									</html>