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
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../../node_modules/dist/pivot.css">
        <script type="text/javascript" src="../../node_modules/dist/pivot.js"></script>
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
		<h3 class="m-t-lg with-border">Unidades Educativas R4.IVO3</h3>
			<div class="circle-tile ">
				<div class="circle-tile-heading green"><i class="fa fa-school fa-fw fa-2x"></i></div>
				<div class="circle-tile-content green">
					<div class="circle-tile-description text-faded">Total de Registros: </div>
					<div class="circle-tile-number text-faded " id="tot_ub"></div>
				</div>
			</div>
		</div>	
		
		<div class="container-fluid">
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
									<canvas id="un_mun_b"></canvas>
								</div>
							</section>
	                    </div>
						
					</div>
					<div class="row">
						<div class="col-sm-6">
							<section class="card">
								<div class="card-block">
									<canvas id="un_fue_b"></canvas>
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
		
		<div class="container-fluid">
			<h5 class="m-t-lg with-border">Estados de Monitoreo</h5>
			<div class="col-xl-12">
				<div class="row">
						<div class="col-sm-6">
							<section class="card">
								<div class="card-block">
									<canvas id="estado1"></canvas>
								</div>
							</section>
						</div>

						<div class="col-sm-6">
							<section class="card">
								<div class="card-block">
									<canvas id="estado2"></canvas>
								</div>
							</section>
						</div>
				</div>

				<div class="row">
					<div class="col-sm-6">
						<section class="card">
							<div class="card-block">
								<canvas id="estado3"></canvas>
							</div>
						</section>
					</div>

					<div class="col-sm-6">
						<section class="card">
							<div class="card-block">
								<canvas id="estado4"></canvas>
							</div>
						</section>
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
	<script type="text/javascript" src="dash_ub.js"></script>

	
</body>
</html>
<?php
  } else {
    header("Location:".Conectar::ruta()."index.php");
  }
?>


