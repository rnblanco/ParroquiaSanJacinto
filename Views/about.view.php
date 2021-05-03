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
						<li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
						<li class="nav-item"><a class="nav-link" href="evangelio.php">Evangelio del Día</a></li>
						<li class="nav-item"><a class="nav-link" href="articulos.php">Artículos</a></li>
						<li class="nav-item active"><a class="nav-link" href="about.php">Sobre Nosotros</a></li>
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
	
	<section id="M" class="section lb page-section">
		<div class="container">
			<div class="stat-wrap">
				<div>
					<h3></h3>					
					<p class="text-center" style="color: black;">Misión</p>					
					<h4></h4>
				</div><!-- end col -->				
			</div><!-- end row -->
			<div class="section-title"><br><p class="text-center"></p></div>

			<div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="message-box">
                        <p class="text-justify">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>                    
                    </div><!-- end messagebox -->
                </div><!-- end col -->
				
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="post-media wow fadeIn text-center">
						<img src="imagenes/mision.png" class="img-fluid img-rounded" style="width: 300px; height: 300px">
                    </div><!-- end media -->
                </div><!-- end col -->
			</div>
			
	</section>	

	<div id="V" class="section cl">
		<div class="container">
			<div class="stat-wrap">
				<div>
					<h3></h3>					
					<p class="text-center">Visión</p>					
					<h4></h4>
				</div><!-- end col -->				
			</div><!-- end row -->
			<div class="section-title"><br><p class="text-center"></p></div>

			<div class="row align-items-center">
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="post-media wow fadeIn text-center">
						<img src="imagenes/vision.png" class="img-fluid img-rounded" style="width: 300px; height: 300px; filter: invert(100%)">	
                    </div><!-- end media -->
				</div><!-- end col -->

                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="message-box">
                        <p class="text-justify" style="color:white;">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>                    
                    </div><!-- end messagebox -->
                </div><!-- end col -->
			</div>
		</div><!-- end container -->
	</div><!-- end section -->

    <section id="H" class="section lb page-section">
		<div class="container">
		<div class="stat-wrap">
				<div>
					<h3></h3>					
					<p class="text-center" style="color: black;">Historia</p>					
					<h4></h4>
				</div><!-- end col -->				
			</div><!-- end row -->
			<div class="row align-items-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="message-box">
						<br>
						<h2>"Origenes"</h2>
						<br>
                        <p class="text-justify">Lo que hoy es el “Barrio de San Jacinto”, antiguamente era un pueblo de la etnia Pipil, llamado “Tunalyucan”, que significa: “El que renace”. En tiempos de la colonia, fue un pueblo de la Provincia de San Salvador, del Reino de Guatemala. Eclesiásticamente pertenecía a la Diócesis de Santiago de Guatemala. El templo parroquial estaba ubicado en el sitio actual, y el ayuntamiento en el lugar que ocupa el Centro Escolar “Jorge Lardé”.
						<br><br>
						Dicho pueblo, fue fundado en tierras obtenidas por el convento de frailes dominicos. Se puso bajo la protección de Nuestra Señora de la Asunción y de San Jacinto de Polonia. En 1734 fue incluido en la Doctrina y Curato de los Santos Inocentes de Cuscatlán, que comprendía los pueblos de Panchimalco, Huizúcar y el Barrio de Santa Lucía. Dicho curato era atendido por los Frailes dominicos. Esto perduró hasta 1764, cuando pasó a manos del clero secular, como Cabecera de Curato.
						<br><br>
						Del 18-19 enero de 1714 visitó el Pueblo de San Jacinto, el Obispo, Fray Juan Bautista Alvarez de Toledo, de la orden franciscana, ordinario de la Diócesis de Chiapa y Soconusco. Para ese tiempo era Cura doctrinero, Fray Pedro  de Cabrera o.p., quien conocía las lenguas: Nahuat, Quiché y Kakchiquel. Los habitantes del Pueblo de San Jacinto aún hablaban la lengua nahuat. En tal visita se constató la existencia de dos cofradías en el Curato de San Jacinto: La Cofradía del “Santísimo Sacramento” y la cofradía de la “Santa Vera Cruz”. Posteriormente surgirán las Cofradías en Honor de Nuestra Señora de la Asunción, integrada por españoles y criollos; y la de San Jacinto, por el sector indígena. Las fiestas de los santos patronos se celebraban el 15 y 17 de agosto respectivamente.
						<br><br>
						En el año de 1770, Mons. Pedro Cortés y Larraz visitó el Curato de san Jacinto, que estaba organizado de la siguiente manera: como cabecera o sede parroquial, el Pueblo de San Jacinto. Como filiales, los Pueblos de Panchimalco, Huizúcar, Antiguo Cuscatlán y las haciendas: Santa Tecla, Tepeagua, San Diego, San Juan y Santa Bárbara. El número de familias del pueblo de San Jacinto era de 85, haciendo un total de 343 personas.
						<br><br>
						Existe una anécdota simpática, consignada en el libro: “Historia Moderna de El Salvador ”, del escritor Don Francisco Gavidia, relativa al prócer de la independencia, Don Domingo Antonio de Lara. Narra, que entre los años 1803 y 1810, dicho prócer habiendo construido un aparato volador, se lanzó en tres ocasiones del campanario del templo parroquial de San Jacinto. Las dos primeras fueron exitosas, mas no la última, en la cual se fracturó un brazo. Algunos atribuyen también tal hazaña al Presbítero José Domingo de Lara, familiar del prócer en cuestión, pero otros la desmienten. Lo que si podemos constatar, es que tales acontecimientos, constituyen parte de la historia de la aviación de nuestro país.						
						<br><br>
						El 17 de Enero de 1846, el entonces Obispo de la Diócesis de San Salvador, Mons.  Jorge Viteri y Ungo, autorizó al Alcalde y vecinos del pueblo de San Jacinto la construcción de un templo que sirviera como Calvario. Dicho templo, que los feligreses llamaban: “El Calvarito”, perduró por varias décadas.
						<br><br>
						El terremoto del 19 de Marzo de 1873 destruyó la ciudad capital. La misma suerte corrió el templo colonial del municipio de San Jacinto. Los feligreses trabajaron arduamente en la construcción de un nuevo templo. El 9 de agosto de 1880, el entonces alcalde de San Jacinto, Francisco Quinteros escribió a Mons. José Luis Cárcamo y Rodríguez, pidiéndole que les autorizara la celebración patronal en el nuevo templo,  que aún no estaba totalmente concluido. Monseñor Cárcamo accedió a tal petición. Para ese año, San Jacinto ya no era sede parroquial, sino capellanía de la Parroquia de la Merced. El párroco era el Presbítero Reyes Aparicio, quien inició la construcción, y la concluyó el canónigo Roque Orellana, es decir, el capellán de la Iglesia de San Jacinto.
						<br><br>
						La imagen de “Nuestra Señora de la Asunción”, patrona del pueblo, sufrió también los estragos de la catástrofe. Surgió la idea de reemplazarla por una nueva. En efecto, dicha imagen fue hecha en los talleres del connotado escultor Julio Dubois en la Ciudad de Guatemala, y obsequiada por Mons. Roque Orellana. Primeramente estuvo en casa de la Señorita Virginia Bertis, para luego ser llevada en procesión al templo. El 15 de agosto de 1887 la bendijo solemnemente Mons. Roque Orellana. Fueron padrinos de tan emotivo acto: Doña Concepción de Regalado, hija del Mariscal Santiago González, y  esposa del ex Presidente de la República Tomás Regalado. Estuvieron presentes además: el alcalde, Don Carlos Ayala; las familias: Escalante, Quinteros, Evora, Meléndez, Narvaéz y Eduardo; y la feligresía en general.
						</p>
						<br>
						<h2>"Presencia de la Congregación de la Misión"</h2>
						<br>
						<p class="text-justify">
						El 10 de Mayo de 1862 llegó a Congregación de la Misión (Padres Paulinos) y las hijas de la Caridad. La presencia Vicentina en ese país, pronto irradió a las demás naciones hermanas de Centroamérica.
						<br><br>
						El 29 de octubre de 1898 salieron de Guatemala hacia San Salvador los padres: Julio Pineda c.m. y Carlos Hetuin c.m. salvadoreño y francés respectivamente, con la idea de fundar una casa de misión en El Salvador. Llegaron el 5 de Noviembre a su destino. El “Sueño dorado” del padre Pineda se hizo realidad, pues compraron un solar en el pueblo de San Jacinto, lugar que ocupa actualmente el Seminario de los Padres Paulinos. El 2 de Octubre de 1899 se añadió otro terreno que se compró a la Señora Cecilia Velásquez, viuda del Señor Enrique Monchez, residencia actual de la Congregación. Para el 1 de Diciembre, la Congregación estrenaba la casa de misión. También del 2 al 26 de marzo de 1899, en tiempo de cuaresma, se misionó en su totalidad el pueblo de San Jacinto.
						<br><br>
						Debido al crecimiento de la capital, el Municipio de San Jacinto pasó a ser Barrio de San Salvador, por decreto Legislativo del 28 de febrero de 1901.
						<br><br>
						El 12 de julio de 1919, Mons. Antonio Adolfo Pérez y Aguilar, primer Arzobispo de El Salvador, encomendó la atención pastoral de la Capellanía de la Iglesia de San Jacinto a la Congregación de la Misión. El visitador de la Congregación era el P. Luis Durou Sure c.m.
						<br><br>
						De 1919 a 1953 han sido muchos los misioneros que han servido a nuestra iglesia. Recordamos con agradecimiento a alguno de ellos: José Vaysse c.m., Constantino Veltin c.m., Enrique Auerbach c.m., Juan Thaureaudd c.m., Miguel Cilia c.m., Juan Antonio García Artola, Francisco Ayala, Víctor Hernández c.m., Miguel Angel Solórzano c.m., José Luis Cuellar, Carlos Felipe Gómez c.m.
						</p>
						<h2>"De Capellanía a Parroquia"</h2>
						<br>
						<p class="text-justify">
						El 24 de Mayo de 1953, en la solemnidad de pentecostés, Mons. Luis Chávez y González, Arzobispo de San Salvador erigió la “Parroquia de San Jacinto” juntamente con las parroquias: Nuestra Señora del Rosario de Fátima, María Auxiliadora, Nuestra Señora de la Asunción y Nuestra Señora de la Luz. Fue señalada como fecha de inauguración de la nueva Parroquia el 12 de Junio, en la solemnidad del Sagrado Corazón de Jesús.
						<br><br>
						El 8 de Junio de 1953, Monseñor nombró Párroco al P. Vicente García Artola c.m., de origen salvadoreño. También el 6 de agosto firmó contrato de administración de la nueva Parroquia de San Jacinto con el P. Humberto Lara c.m., Visitador de los Padres Paulinos.
						<br><br>
						El año de 1956, inició en El Salvador la “Legión de María”. Asociación católica surgida en Irlanda por iniciativa de Frank Duff. El 15 de Diciembre de 1956, se fundó en la Parroquia de San Jacinto el primer Praesidium llamado: “Rosa Mística”. El Director era el P. Carlos Alberto Guzmán c.m. nuestra parroquia tiene el privilegio de ser la iglesia desde donde se difundió dicha asociación a todo el país.
						</p>
						<h2>"Iglesia Peregrina"</h2>
						<br>
						<p class="text-justify">
						Desde la fundación hasta nuestros días son muchas las experiencias parroquiales. Miles de hermanos y hermanas han entregado su vida generosamente a la construcción del Reino de Dios en nuestra porción parroquial.
						<br><br>
						También son muchos los misioneros paulinos que han pasado haciendo el bien por nuestra parroquia. Citamos a continuación en orden cronológico a quienes han sido pastores de nuestra Parroquia: P. Vicente García Artola c.m. (1953-1954), P. Jorge Alberto Pinto (1954-1957), P. Santiago Brizuela c.m. (1957), P. Jorge Mario Avila c.m. (1957-1959), P. José Antonio Alfaro (1959-1961), P. Godofredo Recinos c.m. (1961-1964), P. Carlos Alberto Guzmán c.m. (1964-1972), P. Francisco Santiago c.m. (1972-1974), P. Rodolfo Bobadilla c.m. (1975-1979; 1986), P. Eduardo López c.m. (1979-1985), P. Juan José Mendoza c.m. (1985-1986), P. Saúl Justino Mayorga (1987- 1988), P. José Domingo Segura c.m. (1988), P. Omar Cálix Majano c.m. (1989-1995), P. Pablo Pocol c.m. (1996-2001), P. Margarito Hernández c.m. (2002-2005), P. José Edilberto Lazo c.m. (2006-2012), P. Francisco Ramos c.m., P. Nelson Salgado.
						<br><br>
						El año de 1986 un terrible terremoto azotó al país. Nuestro templo parroquial, joya arquitectónica del siglo XIX, quedó profundamente dañado. Desde 1987 se iniciaron las gestiones para la construcción de un nuevo templo. El viernes 16 de agosto de 1991 se llevo a cabo la bendición, que estuvo a cargo del entonces Párroco: P. Omar Cálix Majano c.m. Para el año 1994, dicho templo parroquial, estaba concluido. Para concluir la semblanza de los pastores que han pasado por nuestra iglesia, citamos a continuación a los siguientes misioneros: P. Gonzalo Orellana c.m., P. Juan Gaitán c.m., P. Daniel Chacón c.m., P. Fausto de la Paz c.m., P. Germán Morales, P. Egberto Hernández c.m.,  Hno. Marcelino Batres c.m., P. Ovidio Cabrera c.m., P. Sebastián Rivera c.m., P. Pedro Portillo c.m., P. Raúl Mux c.m., Mons. José Eduardo Alvarez c.m., P. Ismar Conrado de León c.m., P. José santos Guillén c.m., P. Luis Antonio Gonzalez c.m., P. José Ricardo Ortiz c.m., Hno. Sixto Chacón c.m., P. David Arias c.m., P. Ramón Mendoza c.m.
						<br><br>
						El 24 de mayo de 2003, nuestra parroquia cumplió 50 años de fundación, “Bodas de Oro”. Hubo celebraciones alusivas, los días 24 y 25 del mes en curso.
						<br><br>
						Para concluir la presente reseña histórica de nuestra parroquia, queremos resaltar, que el día 15 de Agosto de 2012, la imagen de “Nuestra Señora de la Asunción” estuvo cumpliendo 125 años de su bendición, razón por la cual las fiestas patronales de ese año estuvieron dedicadas especialmente a nuestra Madre la Virgen María.
						<br><br>
						</p>
						<div class="message-box text-right">
							<h4>P. José Edilberto Lazo c.m.</h4>
						</div>												
                    </div><!-- end messagebox -->
                </div><!-- end col -->
				
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="post-media wow fadeIn"></div><!-- end media -->
                </div><!-- end col -->
			</div>
		</div>		
	</section>

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