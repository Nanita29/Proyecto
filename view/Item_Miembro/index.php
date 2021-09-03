<?php
  require_once("../../config/conexion.php"); 
  if(isset($_SESSION["id_usuario"])){ 
?>
<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php");?>
	<title>Educo : Consultar Miembro del Personal Técnico "(R1.IVO2)"</title>
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
							<h3>Consultar Miembro del Personal Técnico "(R1.IVO2)"</h3>
							<ol class="breadcrumb breadcrumb-simple">
							<li><a href="../Home/index.php">Inicio</a></li>
								<li class="active">Consultar Miembro del Personal Técnico "(R1.IVO2)"</li>
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


				<table id="miembro_data" class="table table-bordered table-striped table-vcenter js-dataTable-full" style="width: 100%">
					<thead>
						<tr>
							<th class="text-center">Acción</th>
							<th class="text-center">Departamento</th>
							<th class="text-center">Municipio</th>
							<th class="text-center">Nombre</th>
							<th class="text-center">Contactos</th>
							<th class="text-center">Observaciones</th>
							<th class="text-center">Avance (%)</th>
							<th class="text-center">ESTADOS DE MONITOREO: 1. CONOCEN NORMATIVA Y POLÍTICAS EDUCATIVAS VIGENTES EN TORNO A PCPA, PROTOCOLOS: </th>
							<th class="text-center">ESTADOS DE MONITOREO: 2. CONOCEN DATOS ESTADO DE SITUACIÓN LÍNEA DE BASE: </th>
							<th class="text-center">ESTADOS DE MONITOREO: 3. CONOCEN LA ESTRATAGIA DE PREVENCIÓN DE LA VIOLENCIA EN CONTEXTOS EDUCATIVOS: </th>
							<th class="text-center">ESTADOS DE MONITOREO: 4. CONOCEN LA PROPUESTA DE BUENAS PRÁCTICAS DE LAS MODALIDADES DE PREVENCIÓN DE LA VIOLENCIA EN EL AULA (INICIAL, PRIMARIA Y SECUNDARIA): </th>
							<th class="text-center">ESTADOS DE MONITOREO: 5. CUENTAN CON HABILIDADES PARA CAPACITAR A MAESTROS Y MAESTRAS, OTROS ACTORES Y HACER SEGUIMIENTO EN LAS ESCUELAS: </th>
							<th class="text-center">ESTADOS DE MONITOREO: 6. APLICAN CONOCIMIENTOS PARA LA GESTIÓN EXTERNA E INTERNA DE LA ESTRATEGIA EN EL PROGRAMA Y/O SERVICIO: </th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>

		</div>
	</div>
	<!-- Contenido -->
	<?php require_once("modal_miembro.php");?>
	<?php require_once("modal_archivo.php");?>
	<?php require_once("modal_archivo_data.php");?>

	<?php require_once("../MainJs/js.php");?>

	<script type="text/javascript" src="consultar_miembro.js"></script>

</body>
</html>
<?php
  } else {
    header("Location:".Conectar::ruta()."index.php");
  }
?>