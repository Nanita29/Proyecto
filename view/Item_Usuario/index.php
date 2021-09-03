<?php
  require_once("../../config/conexion.php"); 
  if(isset($_SESSION["id_usuario"]) AND $_SESSION["rol_id"]==1){ 
?>
<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php");?>
	<title>Educo : Consultar Usuarios</title>
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
							<h3>Consultar Usuarios</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Home</a></li>
								<li class="active">Consultar Usuarios</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

			<div class="box-typical box-typical-padding">
				<button type="button" id="btnnuevo" class="btn btn-inline btn-primary">Nuevo Registro</button>
				<table id="usuario_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
					<thead>
						<tr>
							<th class="text-center" style="width: 10%;">Nombre</th>
							<th class="text-center" style="width: 10%;">Apellido</th>
							<th class="text-center" style="width: 40%;">Correo</th>
							<th class="text-center" style="width: 5%;">Rol</th>
							<th class="text-center" class="text-center" style="width: 10%;">Acción</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>

		</div>
	</div>
	<!-- Contenido -->

	<?php require_once("modal_usuario.php");?>
	<?php require_once("modal_departamento.php");?>
	<?php require_once("modal_departamento_data.php");?>

	<?php require_once("../MainJs/js.php");?>
	
	<script type="text/javascript" src="consultar_usuario.js"></script>

</body>
</html>
<?php
  } else {
    header("Location:".Conectar::ruta()."index.php");
  }
?>