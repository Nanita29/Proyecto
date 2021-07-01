<?php
  require_once("../../config/conexion.php"); 
  if(isset($_SESSION["id_usuario"])){ 
?>
<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php");?>
	<title>Educo : Contultar Unidad Educativa "A"</title>
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
							<h3>Consultar Unidad Educativa "A"</h3>
							<ol class="breadcrumb breadcrumb-simple">
							<li><a href="../Home/index.php">Inicio</a></li>
								<li class="active">Consultar Unidades Educativas "A"</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

			<div class="box-typical box-typical-padding">

						<a href="..\Nuevo_Unidad_A\">
							<button type="button" class="btn btn-primary">Nuevo Registro</button> <br><br>
                        </a>

				<table id="unidad_a_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
					<thead>
						<tr>
							<th style="width: 35%;">Nombre</th>
							<th style="width: 40%;">Director</th>
                            <th style="width: 40%;">Director Telf.</th>
                            <th style="width: 40%;">PCPA</th>
                            <th style="width: 40%;">Técnico</th>
                            <th style="width: 40%;">Avance (%)</th>
                            <th style="width: 40%;">Creador</th>
							<th class="text-center" style="width: 10%;"></th>
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

	<script type="text/javascript" src="consultar_unidad_a.js"></script>

</body>
</html>
<?php
  } else {
    header("Location:".Conectar::ruta()."index.php");
  }
?>