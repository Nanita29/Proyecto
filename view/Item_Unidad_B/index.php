<?php
  require_once("../../config/conexion.php"); 
  if(isset($_SESSION["id_usuario"])){ 
?>
<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php");?>
	<title>Educo : Consultar Unidad Educativa B "(R4.IVO3)"</title>
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
							<h3>Consultar Unidad Educativa B "(R4.IVO3)"</h3>
							<ol class="breadcrumb breadcrumb-simple">
							<li><a href="../Home/index.php">Inicio</a></li>
								<li class="active">Consultar Unidades Educativas B "(R4.IVO3)"</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

			<div class="box-typical box-typical-padding">

				<?php
					if ($_SESSION["rol_id"]==1 OR $_SESSION["rol_id"]==2){ 
				?>
					<button type="button" id="btnnuevo" class="btn btn-inline btn-primary">Nuevo Registro</button>
				<?php
					}
				?>

				<table id="unidad_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
					<thead>
						<tr>
							<th class="text-center">Acción</th>
							<th class="text-center">Departamento</th>
							<th class="text-center">Municipio</th>
							<th class="text-center">Comunidad</th>
							<th class="text-center">U.E.</th>
							<th class="text-center">Director/Telf</th>
							<th class="text-center">Centro Salud</th>
							<th class="text-center">DNA</th>
                            <th class="text-center">Avance (%)</th>
							<th class="text-center">ESTADOS DE MONITOREO: 1. SOCIALIZACIÓN DEL PROTOCOLO (UE PRIORIZADAS) Y DNA: </th>
							<th class="text-center">ESTADOS DE MONITOREO: 2. ELABORACIÓN - APROBACIÓN DEL MECANISMO DE REFERENCIA Y CONTRA REFERENCIA DE CASOS (DDE, UE PRIORIZADAS Y DNA): </th>
							<th class="text-center">ESTADOS DE MONITOREO: 3. GESTIÓN PARA RECOJO DE INFORMACIÓN REFERIDA AL REPORTE DE CASOS Y FUNCIONAMIENTO DEL MECANISMO (DIRECTORES UE, COMISIONES DE CONVIVENCIA EN COORDINACIÓN CON DNA): </th>
							<th class="text-center">ESTADOS DE MONITOREO: 4. SOCIALIZACIÓN DE LA EXPERIENCIA: </th>
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