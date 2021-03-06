<?php
  require_once("../../config/conexion.php"); 
  if(isset($_SESSION["id_usuario"])AND $_SESSION["rol_id"]==1 OR $_SESSION["rol_id"]==3){ 
?>
<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php");?>
	<title>Educo : Consultar Archivos</title>
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
							<h3>Consultar Archivos</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Home</a></li>
								<li class="active">Consultar Archivos</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

			<div class="box-typical box-typical-padding">
				<?php
					if ($_SESSION["rol_id"]==1){ 
				?>
					<button type="button" id="btnnuevo" class="btn btn-inline btn-primary">Nuevo Registro</button>
				<?php
					}
				?>
				<table id="archivo_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
					<thead>
						<tr>
							<th class="text-center">Nombre</th>
							<th class="text-center">Descripción</th>
                            <th class="text-center">Tipo</th>
							<th class="text-center">Creador</th>
							<th class="text-center">Descargar</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>

		</div>
	</div>
	<!-- Contenido -->

	<?php require_once("modal_archivo.php");?>

	<?php require_once("../MainJs/js.php");?>
	
	<script type="text/javascript" src="consultar_archivo.js"></script>

</body>
</html>
<?php
  } else {
    header("Location:".Conectar::ruta()."index.php");
  }
?>