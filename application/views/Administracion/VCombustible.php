<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
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

								<h3 class="profile-username text-center">Gasto Combustible</h3>

								<p class="text-muted text-center">CDH Ingenieria</p>

								<ul class="list-group list-group-unbordered mb-3">
									<li class="list-group-item">
										<b>Existencia total</b> <a class="float-right">43</a>
									</li>
								</ul>

								
								<button type="reset" class="btn btn-outline-dark btn-block">Actualizar</button>
								
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
									<h5>Datos del Vehículo</h5>
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
													<input type="date" class="form-control" data-inputmask="'alias': 'ip'" data-mask id="fecha" >

												</div>
											</div>
                                 
                                 <div class="form-group row">
												<label for="inputName" class="col-sm-2 col-form-label">Patente </label>
												<div class="col-sm-10">
													<input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask id="patente" >

												</div>
											</div>
                                 <div class="form-group row">
												<label for="inputName" class="col-sm-2 col-form-label">Conductor </label>
												<div class="col-sm-10">
													<input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask id="conductor" >

												</div>
											</div>

                                 <div class="form-group row">
												<label for="inputName" class="col-sm-2 col-form-label">Estacion </label>
												<div class="col-sm-10">
													<input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask id="estacion" >

												</div>
											</div>

                                 <div class="form-group row">
												<label for="inputName" class="col-sm-2 col-form-label">Litros </label>
												<div class="col-sm-10">
													<input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask id="litros" >

												</div>
											</div>
                                 <div class="form-group row">
												<label for="inputName" class="col-sm-2 col-form-label">Valor </label>
												<div class="col-sm-10">
													<input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask id="valor" >

												</div>
											</div>
                                 <div class="form-group row">
												<label for="inputName" class="col-sm-2 col-form-label">Documento</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask id="doc_ad" >

												</div>
											</div>	
											
											<hr class="mt-3 mb-3" />
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
									<script src="<?php echo base_url()?>assets/js/ModoCombustible/registro_combustible.js"></script>
									</body>
									</html>