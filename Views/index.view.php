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
						<li class="nav-item active"><a class="nav-link" href="index.php">Inicio</a></li>
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
	
	<div id="carouselExampleControls" class="carousel slide bs-slider box-slider" data-ride="carousel" data-pause="false" data-interval="6000" >
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<?php echo $slidernumHTML?>
		</ol>
		<div class="carousel-inner" role="listbox">
		<?php echo $sliderimgHTML?>
			<!-- Left Control -->
			<a class="new-effect carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				<span class="fa fa-angle-left" aria-hidden="true"></span>
				<span class="sr-only">Anterior</span>
			</a>

			<!-- Right Control -->
			<a class="new-effect carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				<span class="fa fa-angle-right" aria-hidden="true"></span>
				<span class="sr-only">Siguiente</span>
			</a>
		</div>
	</div>
	
    <div id="overviews" class="section wb">
        <div id="testimonials" class="container parallax section db parallax-off" style="background-image:url(Imagenes/Evangelio.jpg);">
            <div class="section-title row text-center">
                <div class="col-md-8 pl-5 pr-5  offset-md-2">
					<h3>Evangelio del Día</h3>
					<div class="message-box"><h4><?php echo $TituloEva?></h4></div>
					<p class="text-justify" style="color:white;"><?php echo $Eva?></p>
					<br>
					<a href="evangelio.php" class="hover-btn-new orange"><span>Leer Más</span></a>
                </div>
            </div><!-- end title -->                    
        </div><!-- end container -->
    </div><!-- end section -->

	<div class="section cl">
		<div class="container">
			<div class="stat-wrap">
				<div>
					<h3></h3>					
					<p class="text-center">Radio Online</p>					
					<h4></h4>
				</div><!-- end col -->				
			</div><!-- end row -->
			<div class="section-title"><br><p class="text-center">Nuestra comunidad cuenta con un espacio para expresarse por medio de alabanzas, lectura de la palabra de Dios, y muchas actividades más.</p></div>
			<div class="text-center">
				<audio id="stream" controls preload="none" style="width: 300px;">
					<source src="http://188.165.236.90:6304/;" type="audio/mpeg">
				</audio>
			</div>			
		</div><!-- end container -->
	</div><!-- end section -->

    <section class="section lb page-section">
		<div class="container">
			 <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
					<h3>Artículos</h3>
					<div class="message-box">
						<h4>Un espacio donde puedes ver las ultimas publicaciones sobre diversos temas que se tratan por todo el mundo en actualidad.</h4>
					</div>                    
                </div>
			</div><!-- end title -->	
			<div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="message-box">
                        <h2><?php echo $Titulo1?></h2>
                        <p><?php echo $Cuerpo1?></p>                    
                        <a href=<?php echo '"articulo.php?'.$ID.'"'?> class="hover-btn-new orange"><span>Leer Más</span></a>
                    </div><!-- end messagebox -->
                </div><!-- end col -->
				
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="post-media wow fadeIn">
                        <img src='<?php echo $Img1?>' alt="" class="img-fluid img-rounded">
                    </div><!-- end media -->
                </div><!-- end col -->
			</div>
			<div class="row align-items-center">
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="post-media wow fadeIn">
                        <img src='<?php echo $Img2?>' alt="" class="img-fluid img-rounded">
                    </div><!-- end media -->
                </div><!-- end col -->
				
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="message-box">
                        <h2><?php echo $Titulo2?></h2>
                        <p><?php echo $Cuerpo2?></p>                        
                        <a href=<?php echo '"articulo.php?'.$ID2.'"'?> class="hover-btn-new orange"><span>Leer Más</span></a>
                    </div><!-- end messagebox -->
                </div><!-- end col -->				
            </div><!-- end row -->		
		</div>
	</section>	

    <div id="testimonials" class="parallax section db parallax-off" style="background-image:url('imagenes/favicon.jpg');">
        <div class="container">
			<div class="hmv-box">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 col-md-6 col-12">
							<a href="about.php#M">
								<div class="inner-hmv">
									<div class="icon-box-hmv"><i class="flaticon-achievement"></i></div>
									<h3>Misión</h3>
									<div class="tr-pa">M</div>
									<div class="section-title"><p>Nuestra Misión</p></div>
								</div>
							</a>
						</div>
						<div class="col-lg-4 col-md-6 col-12">
							<a href="about.php#V">
								<div class="inner-hmv">
									<div class="icon-box-hmv"><i class="flaticon-eye"></i></div>
									<h3>Visión</h3>
									<div class="tr-pa">V</div>
									<div class="section-title"><p>Nuestra Visión</p></div>
								</div>
							</a>
						</div>
						<div class="col-lg-4 col-md-6 col-12">
							<a href="about.php#H">
								<div class="inner-hmv">								
									<div class="icon-box-hmv"><i class="flaticon-history"></i></div>
									<h3>Historia</h3>
									<div class="tr-pa">H</div>
									<div class="section-title text-justify"><p>Lo que hoy es el “Barrio de San Jacinto”, antiguamente era un pueblo de la etnia Pipil, llamado “Tunalyucan”, que significa: “El que renace”...</p></div>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>			
        </div><!-- end container -->
    </div><!-- end section -->

    <div class="parallax section dbcolor">
        <div class="container">
			<div class="section-title text-center">
				<h3>Enlaces Vicentinos</h3>                
			</div>
            <div class="row logos">
				<div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp"></div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="http://vincentians.com/es/" target="_blank"><img src="imagenes/vicentinos-01.png" alt="" class="img-repsonsive"></a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="https://famvin.org/es/" target="_blank"><img src="imagenes/vicentinos-02.png" alt="" class="img-repsonsive"></a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="https://www.corazondepaul.org/" target="_blank"><img src="imagenes/vicentinos-03.png" alt="" class="img-repsonsive"></a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="https://cmglobal.org/es/" target="_blank"><img src="imagenes/vicentinos-04.png" alt="" class="img-repsonsive"></a>
				</div>
				<div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp"></div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

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
	<script src="js/custom2.js"></script>
	<script src="js/timeline.min.js"></script>
	<?php print_r($mensaje)?>
	<script>
		timeline(document.querySelectorAll('.timeline'), {
			forceVerticalMode: 700,
			mode: 'horizontal',
			verticalStartPosition: 'left',
			visibleItems: 4
		});
	</script>
</body>
</html>