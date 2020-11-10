<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Create a stylish landing page for your business startup and get leads for the offered services with this HTML landing page template.">
    <meta name="author" content="Inovatik">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
	<meta property="og:site_name" content="" /> <!-- website name -->
	<meta property="og:site" content="" /> <!-- website link -->
	<meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="" /> <!-- where do you want your post to link to -->
	<meta property="og:type" content="article" />

    <!-- Website Title -->
    <title>Bienvenido</title>
    
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
        <a class="navbar-brand logo-image" href="index.html"><img src="images/logo.svg" alt="alternative"></a>
        
        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#header">Configurar cuenta <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="<?php echo base_url()?>login" class="nav-link <?php if(isset($activo) && ($activo == 1)){echo "active"; }?>">Salir</a>
                </li>

            </ul>
            <span class="nav-item social-icons">
                <span class="fa-stack">
                    <a href="#your-link">
                        <i class="fas fa-circle fa-stack-2x facebook"></i>
                        <i class="fab fa-facebook-f fa-stack-1x"></i>
                    </a>
                </span>
                <span class="fa-stack">
                    <a href="#your-link">
                        <i class="fas fa-circle fa-stack-2x twitter"></i>
                        <i class="fab fa-twitter fa-stack-1x"></i>
                    </a>
                </span>
            </span>
        </div>
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->


    <!-- Header -->
    
    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="text-container">
                            <h1> Bienvenido </br><span class="turquoise">Juan Rojas</span> </br>¿Que desea hacer? </h1>
                           <!-- <p class="p-large">Administra tu trabajo diario </p> -->
                           <a class="btn-solid-reg popup-with-move-anim" href="#details-lightbox-1">Registrar trabajo</a></br> </br>
                            <a class="btn-solid-lg page-scroll" href="#services">Ver trabajos realizados</a>
                        </div> <!-- end of text-container -->
                    </div> <!-- end of col -->
                    <div class="col-lg-6">
                        
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <!-- end of header -->


	<div id="details-lightbox-1" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="container">
            <div class="row">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="col-lg-4">
                    <h4>Codigo:</h4>
                    <form id="contactForm" data-toggle="validator" data-focus="false">
                    <div class="form-group">
                           <label for="cars">Tipo de trabajo</label>
                           <select class="form-control-input" name="cars" id="cars">
                              <option value="volvo">Seleccionar</option>
                              <option value="volvo">Municipalidad</option>
                              <option value="saab">Copec</option>
                              <option value="mercedes">Proyecto</option>
                              
                           </select>
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-control-input" id="cname" required>
                            <label class="label-control" for="cname">Fecha</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control-input" id="cemail" required>
                            <label class="label-control" for="cemail">Persona a cargo</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control-input" id="cemail" required>
                            <label class="label-control" for="cemail">Proyecto/Cliente</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control-input" id="cemail" required>
                            <label class="label-control" for="cemail">Suma asignada</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <a class="btn-solid-reg popup-with-move-anim" type="submit" href="#detalleTrabajo">Siguiente</a></br> </br>
                            
                        </div>
                        
                    </form>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of lightbox-basic -->

    <div id="detalleTrabajo" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="container">
            <div class="row">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="col-lg-4">
                    <h3>Trabajos realizados</h3>
                    <hr>
                    <div class="form-group">
                            <textarea class="form-control-textarea" id="cmessage" required></textarea>
                            <label class="label-control" for="cmessage">Detalle de los trabajos realizados</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                            <a class="btn-solid-reg popup-with-move-anim" type="submit" href="#trabajadores">Siguiente</a>
                            </div>

                            <div class="col-lg-4">
                            </div>

                            <div class="col-lg-4">
                            <a class="btn-solid-reg popup-with-move-anim" type="submit" href="#trabajadores">Volver</a></br> </br>
                            </div>
                        </div>
                        
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of lightbox-basic -->
    <!-- end of details lightbox 1 -->

    <div id="trabajadores" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="container">
            <div class="row">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="col-lg-4" id="dynamic_field">
                    <h3>Agregar personal</h3>
                    <hr>
                    <table class="table table-bordered" >
                        <TR>
                           <TH>Rut</TH>
                           <TD><input type="text" name="name[]" placeholder="Ingrese" class="form-control" /></TD>
                        </TR>
                        <TR>
                           <TH>Nombre completo</TH>
                           <TD><input type="text" name="name[]" placeholder="Ingrese" class="form-control" /></TD>
                        </TR>
                        <TR>
                           <TH>Agregar más</TH>
                           <TD><button type="button" name="add" id="agregarTrabajador" class="btn btn-success">+</button></TD>
                        </TR>
                     </table>
                    
                </div> <!-- end of col -->
                
                <a class="btn-solid-reg mfp-close page-scroll" href="<?php echo base_url()?>PlantillaOperaciones" class="nav-link <?php if(isset($activo) && ($activo == 1)){echo "active"; }?>">Siguiente</a>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of lightbox-basic -->
    <!-- end of details lightbox 1 -->


    <!-- Scripts modal -->
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/js/PersonalAsistencia.js"></script>
  	
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