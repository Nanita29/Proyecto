<?php
  require_once("../../config/conexion.php"); 
  if(isset($_SESSION["id_usuario"])){ 
?>
<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php");?>
	<title>Educo : Nuevo Fuente</title>
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
							<h3>Nuevo Fuente</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="../Home/index.php">Inicio</a></li>
								<li class="active">Nuevo Fuente</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

			<div class="box-typical box-typical-padding">
				<p>
					Desde esta ventana podrá registrar una nueva Fuente
				</p>

				<h5 class="m-t-lg with-border">Ingresar Información</h5>

				<div class="row">
					<form method="post" id="fuente_form">

						<input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $_SESSION["id_usuario"] ?>">

						<!-- <div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="exampleInput">Nombre</label>
								<select id="cat_id" name="cat_id" class="form-control">
									
								</select>
							</fieldset>
						</div> -->

						<div class="col-lg-12">
							<fieldset class="form-group">
								<label class="form-label semibold" for="nombre_fue">Nombre de la Fuente</label>
								<input type="text" class="form-control" id="nombre_fue" name="nombre_fue" placeholder="Ingrese el nombre">
							</fieldset>
						</div>
						
						<div class="col-lg-12">
							<fieldset class="form-group">
								<label class="form-label semibold" for="descripcion_fue">Descripción de la Fuente</label>
								<!-- <div class="summernote-theme-1">
									<textarea id="descripcion" name="descripcion" class="summernote" name="name"></textarea>
								</div> -->
                                <textarea class="form-control" id="descripcion_fue" name="descripcion_fue" rows="4" placeholder="Ingrese la descripción de la nueva Fuente"></textarea>
							</fieldset>
						</div>
						<div class="col-lg-12">
							<button type="submit" name="action" value="add" class="btn btn-rounded btn-inline btn-primary">Guardar</button>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>
	<!-- Contenido -->

	<?php require_once("../MainJs/js.php");?>
	
	<script type="text/javascript" src="nuevo_fuente.js"></script>

</body>
</html>
<?php
  } else {
    header("Location:".Conectar::ruta()."index.php");
  }
?>