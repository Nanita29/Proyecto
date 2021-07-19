<?php
  require_once("../../config/conexion.php"); 
  if(isset($_SESSION["id_usuario"])){ 
?>
<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php");?>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
	<title>Educo : Inicio</title>
</head>
<body class="with-side-menu">

    <?php require_once("../MainHeader/header.php");?>

    <div class="mobile-menu-left-overlay"></div>
    
    <?php require_once("../MainNav/nav.php");?>

	<!-- Contenido -->
	<div class="page-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-12">
					<div class="row">
						<div class="col-sm-3">
	                        <article class="statistic-box green">
	                            <div>
	                                <div class="number" id="tot_ua"></div>
	                                <div class="caption"><div>Unidades Educativas R2.IVO6,R2.IVO7</div></div>
	                            </div>
	                        </article>
	                    </div>
						<div class="col-sm-3">
	                        <article class="statistic-box green">
	                            <div>
	                                <div class="number" id="tot_ub"></div>
	                                <div class="caption"><div>Unidades Educativas R4.IVO3</div></div>
	                            </div>
	                        </article>
	                    </div>
						<div class="col-sm-3">
	                        <article class="statistic-box green">
	                            <div>
	                                <div class="number" id="tot_dde"></div>
	                                <div class="caption"><div>Direcciones Distritales R2.IVO7, R4.IVO3</div></div>
	                            </div>
	                        </article>
	                    </div>
						<div class="col-sm-3">
	                        <article class="statistic-box green">
	                            <div>
	                                <div class="number" id="tot_m"></div>
	                                <div class="caption"><div>Miembros de Personal Técnico R1.IVO2</div></div>
	                            </div>
	                        </article>
	                    </div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xl-12">
					<div class="row">
						<div class="col-sm-6">
							<section class="card">
								<header class="card-header">
									Unidades Educativas
								</header>
								<div class="card-block">
									<div id="unidades_ab" style="height: 250px;"></div>
								</div>
							</section>
	                    </div>

						<div class="col-sm-6">
							<section class="card">
								<header class="card-header">
									Tipos de Archivo
								</header>
								<div class="card-block">
									<div id="total_archivo" style="height: 250px;"></div>
								</div>
							</section>
	                    </div>
						
					</div>
				</div>
			</div>

			

			<section class="card">
				<header class="card-header">
					Grafico Estadístico
				</header>
				<div class="card-block">
					<div id="unidades_ab2" style="height: 250px;"></div>
				</div>
			</section>
			
		</div>
	</div>
	<!-- Contenido -->

	<?php require_once("../MainJs/js.php");?>

	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script type="text/javascript" src="home.js"></script>

</body>
</html>
<?php
  } else {
    header("Location:".Conectar::ruta()."index.php");
  }
?>