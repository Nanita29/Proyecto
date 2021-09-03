<?php
  require_once("../../config/conexion.php"); 
  if(isset($_SESSION["id_usuario"])){ 
?>
<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php");?>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.3.1/css/all.min.css" rel="stylesheet">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="estilo.css">



	<title>Educo : Inicio</title>
</head>
<body class="with-side-menu">

    <?php require_once("../MainHeader/header.php");?>

    <div class="mobile-menu-left-overlay"></div>
    
    <?php require_once("../MainNav/nav.php");?>

	<!-- Contenido -->
	<div class="page-content">
		<div class="container-fluid">
			<!-- INDICADORES -->
			<div class="row">
				<div class="col-xl-12">
					<div class="row">
						<div class="col-sm-3">
							<div class="circle-tile ">
								<div class="circle-tile-heading blue"><i class="fa fa-school fa-fw fa-2x"></i></div>
								<div class="circle-tile-content blue">
									<div class="circle-tile-description text-faded">Unidades Educativas<br>R2.IVO6,R2.IVO7</div>
									<div class="circle-tile-number text-faded " id="tot_ua"></div>
									<a class="circle-tile-footer" href="..\Dash_Unidad_A\">Más información <i class="fa fa-chevron-circle-right"></i></a>
								</div>
							</div>
	                    </div>
						<div class="col-sm-3">
							<div class="circle-tile ">
								<div class="circle-tile-heading green"><i class="fa fa-school fa-fw fa-2x"></i></div>
								<div class="circle-tile-content green">
									<div class="circle-tile-description text-faded">Unidades Educativas<br>R4.IVO3</div>
									<div class="circle-tile-number text-faded " id="tot_ub"></div>
									<a class="circle-tile-footer" href="..\Dash_Unidad_B\">Más información <i class="fa fa-chevron-circle-right"></i></a>
								</div>
							</div>
	                    </div>
						<div class="col-sm-3">
							<div class="circle-tile ">
								<div class="circle-tile-heading orange"><i class="fa fa-book fa-fw fa-2x"></i></div>
								<div class="circle-tile-content orange">
									<div class="circle-tile-description text-faded">Direcciones Distritales<br>R2.IVO7, R4.IVO3</div>
									<div class="circle-tile-number text-faded " id="tot_dde"></div>
									<a class="circle-tile-footer" href="..\Dash_Dde\">Más información <i class="fa fa-chevron-circle-right"></i></a>
								</div>
							</div>
	                    </div>
						<div class="col-sm-3">
							<div class="circle-tile ">
								<div class="circle-tile-heading purple"><i class="fa fa-users fa-fw fa-2x"></i></div>
								<div class="circle-tile-content purple">
									<div class="circle-tile-description text-faded">Miembros de Personal Técnico<br>R1.IVO2</div>
									<div class="circle-tile-number text-faded " id="tot_m"></div>
									<a class="circle-tile-footer" href="..\Dash_Miembro\">Más información <i class="fa fa-chevron-circle-right"></i></a>
								</div>
							</div>
	                    </div>
					</div>
				</div>
			</div>

			<!-- UNIDADES A -->
			<div class="row">
				<h3 class="m-t-lg with-border">Unidades Educativas R2.IVO6,R2.IVO7</h5>
				<div class="col-xl-12">
					<div class="row">
						<div class="col-sm-6">
							<section class="card">
								<div class="card-block">
									<canvas id="un_dep_a"></canvas>
								</div>
							</section>
	                    </div>

						<div class="col-sm-6">
							<section class="card">
								<div class="card-block">
									<canvas id="av_un_dep_a"></canvas>
								</div>
							</section>
	                    </div>
						
					</div>
				</div>
			</div>

			<!-- UNIDADES B -->
			<div class="row">
				<h3 class="m-t-lg with-border">Unidades Educativas R4.IVO3</h5>
				<div class="col-xl-12">
					<div class="row">
						<div class="col-sm-6">
							<section class="card">
								<div class="card-block">
									<canvas id="un_dep_b"></canvas>
								</div>
							</section>
	                    </div>

						<div class="col-sm-6">
							<section class="card">
								<div class="card-block">
									<canvas id="av_un_dep_b"></canvas>
								</div>
							</section>
	                    </div>
						
					</div>
				</div>
			</div>

			<!-- DDE -->
			<div class="row">
				<h3 class="m-t-lg with-border">Direcciones Distritales R2.IVO7, R4.IVO3</h5>
				<div class="col-xl-12">
					<div class="row">
						<div class="col-sm-6">
							<section class="card">
								<div class="card-block">
									<canvas id="dde_dep"></canvas>
								</div>
							</section>
	                    </div>

						<div class="col-sm-6">
							<section class="card">
								<div class="card-block">
									<canvas id="av_dde_dep"></canvas>
								</div>
							</section>
	                    </div>
						
					</div>
				</div>
			</div>

			<!-- MIEMBROS-->
			<div class="row">
				<h3 class="m-t-lg with-border">Miembros de Personal Técnico R1.IVO2</h5>
				<div class="col-xl-12">
					<div class="row">
						<div class="col-sm-6">
							<section class="card">
								<div class="card-block">
									<canvas id="m_dep"></canvas>
								</div>
							</section>
	                    </div>

						<div class="col-sm-6">
							<section class="card">
								<div class="card-block">
									<canvas id="av_m_dep"></canvas>
								</div>
							</section>
	                    </div>
						
					</div>
				</div>
			</div>

		</div>
	</div>
	
	<!-- Contenido -->

	<?php require_once("../MainJs/js.php");?>

	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
	<script type="text/javascript" src="home.js"></script>

	
</body>
</html>
<?php
  } else {
    header("Location:".Conectar::ruta()."index.php");
  }
?>


