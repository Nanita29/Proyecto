<?php
  require_once("../../config/conexion.php"); 
  if(isset($_SESSION["id_usuario"])){ 
?>
<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php");?>
	<title>Educo : Consultar Unidad Educativa A "(R2.IVO6,R2.IVO7)"</title>
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
							<h3>Consultar Unidad Educativa A "(R2.IVO6,R2.IVO7)"</h3>
							<ol class="breadcrumb breadcrumb-simple">
							<li><a href="../Home/index.php">Inicio</a></li>
								<li class="active">Consultar Unidades Educativas "(R2.IVO6,R2.IVO7)"</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

			<div class="box-typical box-typical-padding">

			<button type="button" id="btnnuevo" class="btn btn-inline btn-primary">Nuevo Registro</button>

				<table id="unidad_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
					<thead>
						<tr>
							<th class="text-center">Cod</th>
							<th class="text-center">Nombre</th>
							<th class="text-center">Director</th>
                            <th class="text-center">Director Telf.</th>
                            <th class="text-center">PCPA</th>
                            <th class="text-center">Técnico</th>
                            <th class="text-center">Avance X (%)</th>
							<th class="text-center">Avance Y (%)</th> 
							<th class="text-center">Creador</th>
							<th class="text-center" style="width: 12%">Acción</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>

		</div>
	</div>
	<!-- Contenido -->
	<?php require_once("modal_unidad.php");?>
	<?php require_once("modal_archivo.php");?>
	<?php require_once("modal_archivo_data.php");?>

	<?php require_once("../MainJs/js.php");?>

	<script type="text/javascript" src="consultar_unidad.js"></script>

</body>
</html>
<?php
  } else {
    header("Location:".Conectar::ruta()."index.php");
  }
?>