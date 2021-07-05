<?php
  require_once("../../config/conexion.php"); 
  if(isset($_SESSION["id_usuario"])){ 
?>
<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php");?>
	<title>Educo : Consultar Unidad Educativa " (R2.IVO7, R4.IVO3)"</title>
</head>
<body class="with-side-menu">

    <?php require_once("../MainHeader/header.php");?>

    <div class="mobile-menu-left-overlay"></div>
    
    <?php require_once("../MainNav/nav.php");?>

	<!-- Contenido -->
	<div class="page-content">
		<div class="container-fluid">

			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>Consultar Unidad Educativa " (R2.IVO7, R4.IVO3)"</h3>
							<ol class="breadcrumb breadcrumb-simple">
							<li><a href="../Home/index.php">Inicio</a></li>
								<li class="active">Consultar Unidades Educativas " (R2.IVO7, R4.IVO3)"</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

			<div class="box-typical box-typical-padding">

						<a href="..\Nuevo_Unidad_B\">
							<button type="button" class="btn btn-primary">Nuevo Registro</button> <br><br>
                        </a>

				<table id="unidad_a_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
					<thead>
						<tr>
							<th class="text-center">Cod</th>
							<th class="text-center">Nombre</th>
							<th class="text-center">Director</th>
                            <th class="text-center">Director Telf.</th>
                            <th class="text-center">DNA</th>
                            <th class="text-center">Técnico</th>
							<th class="text-center">Centro Salud</th>
                            <th class="text-center">Avance (%)</th> 
							<th class="text-center">Creador</th>
							<th class="text-center"></th>
							<th class="text-center"></th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>

		</div>
	</div>
	<!-- Contenido -->
	

	<?php require_once("../MainJs/js.php");?>

	<script type="text/javascript" src="consultar_unidad_b.js"></script>

</body>
</html>
<?php
  } else {
    header("Location:".Conectar::ruta()."index.php");
  }
?>