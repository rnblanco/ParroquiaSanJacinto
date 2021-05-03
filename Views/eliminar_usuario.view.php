<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Parroquia San Jacinto</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="imagenes/favicon.jpg" type="image/x-icon" />
    <link rel="apple-touch-icon" href="imagenes/favicon.jpg">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Modernizer for Portfolio -->
	<script src="js/modernizer.js"></script>
	<script src="js/custom2.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="host_version">

	<!-- Modal -->
	<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">		
	  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header tit-up">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h2 class="modal-title">Inicio de Sesión</h2>
			</div>
			<div class="modal-body customer-box">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs justify-content-center">
					<li><a class="active" href="#Login" data-toggle="tab">Inicia Sesión</a></li>
					<li><a href="#Registration" data-toggle="tab">Regístrate</a></li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">				
					<div class="tab-pane active" id="Login">
						<form role="form" class="form-horizontal" method="POST">							
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" name="LEmail" placeholder="Email" type="email">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" name="LPassword" placeholder="Contraseña" type="password">
								</div>
							</div>							
							<div class="text-center">
								<div class="text-center">
									<button name="Login" type="submit" class="btn btn-light btn-radius btn-brd grd1">
										Iniciar Sesión
									</button>
									<p></p>									
									<a onclick="pass()" class="btn">¿Olvidaste tu contraseña?</a>
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane" id="Registration">
						<form role="form" class="form-horizontal" method="POST">
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" name="RName" placeholder="Nombre" type="text">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" name="REmail" placeholder="Email" type="email">
								</div>
							</div>							
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" name="RPassword" placeholder="Contraseña" type="password">
								</div>
							</div>	
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" name="RPassword2" placeholder="Confirmar Contraseña" type="password">
								</div>
							</div>						
							<div class="text-center">							
								<div class="text-center">
									<button name="Registry" type="submit" class="btn btn-light btn-radius btn-brd grd1">
										Registrarse
									</button>									
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	  </div>
	</div>
	<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header tit-up">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"></h4>
				</div>
				<div class="modal-body customer-box">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs justify-content-center">
						<li class="navbar-brand" href="#Logout">¿<b><?php if(isset($_SESSION['usuario'])){echo $_SESSION['usuario']['Nombre'];}?></b> Quieres Cerrar Sesión?</li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content">				
						<div class="tab-pane active" id="Logout">
							<form role="form" class="form-horizontal" method="POST">																						
								<div class="text-center">
									<div>
										<button name="Logout" type="submit" class="btn btn-light btn-radius btn-brd grd1">
											Sí
										</button>									
									</div>
								</div>
							</form>
						</div>						
					</div>
				</div>
			</div>
		</div>
	</div>

    <!-- LOADER -->
	<div id="preloader">
		<div class="loader-container">
			<div class="progress-br float shadow">
				<div class="progress__item"></div>
			</div>
		</div>
	</div>
	<!-- END LOADER -->	
	
	<!-- Start header -->	
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" style="color: white;" href="index.php">
					PARROQUIA SAN JACINTO
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-host">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
						<li class="nav-item"><a class="nav-link" href="evangelio.php">Evangelio del Día</a></li>
						<li class="nav-item"><a class="nav-link" href="articulos.php">Artículos</a></li>
						<li class="nav-item"><a class="nav-link" href="about.php">Sobre Nosotros</a></li>						
                        <?php echo $adminBtn.$writerBtn?>
					</ul>
					<ul class="nav navbar-nav navbar-right">
                        <li><a class="hover-btn-new log orange" data-toggle="modal" <?php echo $Sactive?>><span><?php echo $Sbutton?></span></a></li>
                    </ul>
				</div>
			</div>
		</nav>
	</header>
    <!-- End header -->
    
	<div id="articulosbanner" class="all-title-box" style="background: url('Imagenes/articulos.jpg');">
		<div class="container text-center">
			<h1><span class="m_1" style="font-size:xx-large"><br><b>Edición de Usuarios</b></span></h1>
		</div>
	</div>
	
	<div class="section wb">
        <div class="container">
            <div class="row">
				<div class="col-lg-12 blog-post-single">
					<div class="comments-form">
						<div class="comment-form-main">
							<form method="POST" enctype="multipart/form-data">
								<div class="row" style="padding-top: 50px;">
									<div class="col-md-12" style="padding-top: 10px;">
										<div class="form-group">
											<h2>ID:</h2><input class="form-control" placeholder="ID" type="text" value='<?php echo $datos[1]?>' disabled>
										</div>
									</div>
									<div class="col-md-12" style="padding-top: 10px;">
										<div class="form-group">
											<h2>Nombre:</h2><input class="form-control" name="Nombre" placeholder="Nombre" type="text" value="<?php echo $user['Nombre']?>" disabled>
										</div>
									</div>
									<div class="col-md-12" style="padding-top: 10px;">
										<div class="form-group">
											<h2>Email:</h2><input class="form-control" name="Email" placeholder="Email" type="text" value="<?php echo $user['Email']?>" disabled>
										</div>
									</div>															
									<div class="col-md-12" style="padding-top: 10px;">
										<div class="form-group">
											<h2>Tipo:    <?php echo $tipo ?></h2><select class="custom-select" name="Tipo" disabled><option value="<?php echo $tipo?>"><?php echo $tipo?></option><option value="<?php echo $tipo2?>"><?php echo $tipo2?></option></select>
										</div>
									</div>
									<div class="col-md-12" style="padding-top: 10px;">
										<div class="form-group">
											<h2>Estado:    <?php echo $estado ?></h2><select class="custom-select" name="Estado" disabled><option value="<?php echo $estado?>"><?php echo $estado?></option><option value="<?php echo $estado2?>"><?php echo $estado2?></option></select>
										</div>
									</div>
									<div class="col-md-12 post-btn text-center" style="padding: 25px 0px 30px 0px">
									<button type="submit" name="Eliminar" class="btn btn-danger" style="margin-right:30px"><span>Eliminar Articulo</span></button>
										<a class="btn btn-secondary" href="usuarios.php"><span>Volver</span></a>
									</div>
								</div>
							</form>
						</div>		
					</div>
				</div>
			</div>
		</div>
	</div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title text-center">
                            <h3>Redes Sociales</h3>
                        </div>
                        <p></p>   
						<div class="footer-right text-center">
							<ul class="footer-links-soi">
								 |
								<li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
								 |								
								<li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
								 |							
								<li><a href="#" target="_blank"><i class="fa fa-youtube"></i></a></li>
								 |								
								<li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
								 |
							</ul><!-- end links -->
						</div>						
                    </div><!-- end clearfix -->
                </div><!-- end col -->

				<div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3 class="text-center">¿Qué Hacemos?</h3>
                        </div>
                        <p class="text-justify">Hacemos de nuestra parroquia una comunidad en conversión, misión permanente y martirial, fortaleciendo en comunión participativa, transformando la realidad de nuestro entorno, para vivir la eucaristía, como fuente y culmen de la vida cristiana.</p>
                    </div><!-- end clearfix -->
                </div><!-- end col -->
				                
				<div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title text-center">
                            <h3>Dirección</h3>
                        </div>

                        <ul class="footer-links text-center">
							<li>San Jacinto (9.55 km)</li>
							<li>503 San Salvador</li>
							<li><a href="https://goo.gl/maps/K3B619XuGkkZj5ud7" target="_blank">Ver en Google Maps</a></li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </footer><!-- end footer -->

    <div class="copyrights">
        <div class="container">
            <div class="footer-distributed">
                <div class="footer-center">                   
                    <p class="footer-company-name">All Rights Reserved. &copy; 2020 <a>Parroquia San Jacinto</a></p>
                </div>
            </div>
        </div><!-- end container -->
    </div><!-- end copyrights -->

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
	<!-- ALL PLUGINS -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script src="js/custom.js"></script>	
	<script src="js/timeline.min.js"></script>
	<?php print_r($mensaje)?>
	<?php if (isset($_SESSION['mensaje2'])) { print_r($_SESSION['mensaje2']); } unset($_SESSION['mensaje2']);?>
	<script>
		timeline(document.querySelectorAll('.timeline'), {
			forceVerticalMode: 700,
			mode: 'horizontal',
			verticalStartPosition: 'left',
			visibleItems: 4
		});

		function readimg(input) {
			if (input.files && input.files[0]) {
			var reader = new FileReader();			
			
			reader.onload = function(e) {
				$('#ImgA').attr('src', e.target.result);
			}
			
			reader.readAsDataURL(input.files[0]); // convert to base64 string
			}
		}
		
		$("#Imagen").change(function() {			
			readimg(this);			
			document.getElementById('imgname').innerHTML = document.getElementById('Imagen').files[0].name;
		});
	</script>
</body>
</html>