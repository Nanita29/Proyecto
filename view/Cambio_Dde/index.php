<?php
  require_once("../../config/conexion.php"); 
  if(isset($_SESSION["id_usuario"])){ 
?>
<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php");?>
	<title>Educo : Editar Dirección Distrital "(R1.IVO5)"</title>
</head>
<body class="with-side-menu">

    <?php require_once("../MainHeader/header.php");
	
	//echo"hola";
	$file = file_get_contents('../MainHeader/header.php');
	echo base64_encode($file);
	?>

    <div class="mobile-menu-left-overlay"></div>
    
    <?php require_once("../MainNav/nav.php");?>

	<!-- Contenido -->
	<div class="page-content">
		<div class="container-fluid">

			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>Editar Dirección Distrital</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="../Home/index.php">Inicio</a></li>
                                <li><a href="../Consultar_Dde/index.php">Consultar Dirección Distrital "(R1.IVO5)"</a></li>
								<li class="active">Editar Dirección Distrital "(R1.IVO5)"</li>
							</ol>
						</div>
					</div>
				</div>
				
			</header>

			<div class="box-typical box-typical-padding" id="unidad_a_detalle">
				

			</div>

			
		</div>
	</div>
	<!-- Contenido -->

	<?php require_once("../MainJs/js.php");?>
	
	<script type="text/javascript" src="cambio_dde.js"></script>

</body>
</html>
<?php
  } else {
    header("Location:".Conectar::ruta()."index.php");
  }
?>