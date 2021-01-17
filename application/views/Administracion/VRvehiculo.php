<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<!-- /.navbar -->

		<!-- Content Wrapper. Contains page content nnnnnnnnnnnnnn-->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1>Registro vehicular</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item active"><a href="#">Inicio</a></li>
								<li class="breadcrumb-item">Sistema</li>
								<li class="breadcrumb-item">Perfil</li>
							</ol>
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
										<img class="profile-user-img img-fluid img-circle" src="<?php echo base_url();?>assets/dist/img/auto.png" alt="User profile picture">
									</div>

									<h3 class="profile-username text-center">Nuevo Vehiculo</h3>

									<p class="text-muted text-center">CDH Ingenieria</p>

									<ul class="list-group list-group-unbordered mb-3">
										<li class="list-group-item">
											<b>Total</b> <a class="float-right">303</a>
										</li>
									</ul>

									<button type="reset" class="btn btn-dark btn-block">Actualizar</button>
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
										<h5>Datos del Vehiculo</h5>
									</div>
									<ul class="nav nav-pills">

									</ul>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<div class="tab-content">
										<div class="active tab-pane" id="settings">
											<form class="form-horizontal">

												<div class="form-group row">
													<label for="inputName" class="col-sm-2 col-form-label">Patente</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask id="patente" placeholder="Placa patente unica">

													</div>
												</div>
												<div class="form-group row">
													<label for="inputEmail" class="col-sm-2 col-form-label">Modelo</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask id="modelo" placeholder="Modelo del vehiculo">

													</div>
												</div>

												<div class="form-group row">
													<label for="inputName2" class="col-sm-2 col-form-label">Marca</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask id="MARCA" placeholder="Especifique marca vehiculo">


													</div>
												</div>

												<div class="form-group row">
													<label for="inputName2" class="col-sm-2 col-form-label">Color</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask id="COLOR" placeholder="Color de vehiculo">


													</div>
												</div>

												<div class="form-group row">
													<label for="inputName2" class="col-sm-2 col-form-label">Año</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask id="ANO" placeholder="Año de vehiculo">


													</div>
												</div>
												<div class="form-group row">
													<label for="inputSkills" class="col-sm-2 col-form-label">Tipo de motor</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask id="TIPOMOTOR" placeholder="Tipo de motor">


													</div>
												</div>
												<div class="form-group row">
													<label for="inputSkills" class="col-sm-2 col-form-label">GPS</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask id="GPS" placeholder="GPS">


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
														<button type="submit" class="btn btn-block btn-dark">Registrar</button>
													</div>
												</div>
											</form>
										</div>
                

	<!-- jQuery -->
	<script src="../../plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="../../dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->

</body>
</html>