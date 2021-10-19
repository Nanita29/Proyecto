<?php
  require_once("../../config/conexion.php"); 
  if(isset($_SESSION["id_usuario"])){ 
?>
<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php");?>
	<title>Educo : Consultar Dirección Distrital " (R1.IVO5)"</title>
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
							<h3>Consultar Dirección Distrital "(R1.IVO5)"</h3>
							<ol class="breadcrumb breadcrumb-simple">
							<li><a href="../Home/index.php">Inicio</a></li>
								<li class="active">Consultar Dirección Distrital "(R1.IVO5)"</li>
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

				<table id="dde_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
					<thead>
						<tr>
							<th class="text-center"style="width: 12%">Acción</th>
							<th class="text-center">Departamento</th>
							<th class="text-center">Municipio</th>
							<th class="text-center">Distrital</th> 
							<th class="text-center">Director/Telf</th>
                            <th class="text-center">Avance (%)</th> 
							<th class="text-center">ESTADOS DE MONITOREO: 1. CONOCEN NORMATIVA Y POLÍTICAS EDUCATIVAS VIGENTES EN TORNO A PCPA, PROTOCOLOS: </th>
							<th class="text-center">ESTADOS DE MONITOREO: 2. CONOCEN DATOS ESTADO DE SITUACIÓN LÍNEA DE BASE: </th>
							<th class="text-center">ESTADOS DE MONITOREO: 3. CONOCEN LA ESTRATAGIA DE PREVENCIÓN DE LA VIOLENCIA EN CONTEXTOS EDUCATIVOS: </th>
							<th class="text-center">ESTADOS DE MONITOREO: 4. CONOCEN LA PROPUESTA DE BUENAS PRÁCTICAS DE LAS MODALIDADES DE PREVENCIÓN DE LA VIOLENCIA EN EL AULA (INICIAL, PRIMARIA Y SECUNDARIA): </th>
							
							
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