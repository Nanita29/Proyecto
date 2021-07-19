<?php
  require_once("../../config/conexion.php"); 
  if(isset($_SESSION["id_usuario"])){ 
?>
<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php");?>
	<title>Educo : Consultar Dirección Distrital " (R2.IVO7, R4.IVO3)"</title>
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
							<h3>Consultar Dirección Distrital " (R2.IVO7, R4.IVO3)"</h3>
							<ol class="breadcrumb breadcrumb-simple">
							<li><a href="../Home/index.php">Inicio</a></li>
								<li class="active">Consultar Dirección Distrital " (R2.IVO7, R4.IVO3)"</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

			<div class="box-typical box-typical-padding">

			<button type="button" id="btnnuevo" class="btn btn-inline btn-primary">Nuevo Registro</button>

				<table id="dde_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
					<thead>
						<tr>
							<th class="text-center">Cod</th>
							<th class="text-center">Nombre</th>
							<th class="text-center">Director</th>
                            <th class="text-center">Director Telf.</th>
                            <th class="text-center">Datos</th>
                            <th class="text-center">Avance (%)</th> 
							<th class="text-center">Creador</th>
							<th class="text-center"style="width: 12%">Acción</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>

		</div>
	</div>
	<!-- Contenido -->
	<?php require_once("modal_dde.php");?>
	<?php require_once("modal_archivo.php");?>
	<?php require_once("modal_archivo_data.php");?>

	<?php require_once("../MainJs/js.php");?>

	<script type="text/javascript" src="consultar_dde.js"></script>

</body>
</html>
<?php
  } else {
    header("Location:".Conectar::ruta()."index.php");
  }
?>