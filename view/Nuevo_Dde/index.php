<?php
  require_once("../../config/conexion.php"); 
  if(isset($_SESSION["id_usuario"])){ 
?>
<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php");?>
	<title>Educo : Nueva Dirección Distrital "(R1.IVO5)"</title>
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
							<h3>Nueva Dirección Distrital</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="../Home/index.php">Inicio</a></li>
								<li class="active">Nueva Dirección Distrital "(R1.IVO5)"</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

			<div class="box-typical box-typical-padding">
				<p>
					Desde esta ventana podrá registrar una nueva Dirección Distrital "(R1.IVO5)"
				</p>


				<div class="row">
					<form method="post" id="unidad_form"> 

						<input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $_SESSION["id_usuario"] ?>">

									<!-- INF GENERAL -->
									<div class="container">
                                        <div><h5 class="m-t-lg with-border">INFORMACIÓN GENERAL</h5></div>
                                            
                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="d_cod">Código</label>
                                                    <input type="text" class="form-control" id="d_cod" name="d_cod" placeholder="Ingrese el código">
                                                </fieldset>
                                            </div>


                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="d_nombre">Nombre de la Dirección Distrital</label>
                                                    <input type="text" class="form-control" id="d_nombre" name="d_nombre" placeholder="Ingrese el nombre de la Dirección Distrital">
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-6">
                                                <fieldset class="form-group"> 
                                                    <label class="form-label semibold" for="id_municipio">Municipio</label>
                                                    <select id="id_municipio" name="id_municipio" class="form-control" >
                                    
                                                    </select>
                                                </fieldset>
                                            </div>


                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="d_director_nombre">Director</label>
                                                    <input type="text" class="form-control" id="d_director_nombre" name="d_director_nombre" placeholder="Director" >
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="d_director_tel">Teléfono Director</label>
                                                    <input type="text" class="form-control" id="d_director_tel" name="d_director_tel" placeholder="Ingrese el teléfono del director" >
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-12">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="d_datos">Datos</label>
                                                    <input type="text" class="form-control" id="d_datos" name="d_datos" placeholder="Ingrese los datos" >
                                                </fieldset>
                                            </div>

                                    </div>

                                    <!-- ESTADOS MONITOREO -->
                                    <div class="container">
                                        <div><h5 class="m-t-lg with-border">ESTADOS DE MONITOREO</h5></div>

                                            <div class="col-lg">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold">1. Conocen normativa y políticas educativas vigentes en torno a PCPA, protocolos. </label>
                                                    <input type="radio" id="e1t" name="e1" value="0" /> Aprobado
                                                    <input type="radio" id="e1f" name="e1" value="1" /> Reprobado
                                                </fieldset>
                                            </div> 
                                            

                                            <div class="col-lg">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold">2. Conocen datos estado de situación línea de base.</label>
                                                    <input type="radio" id="e2t" name="e2" value="0" /> Aprobado
                                                    <input type="radio" id="e2f" name="e2" value="1" /> Reprobado

                                                </fieldset>
                                            </div> 

                                            <div class="col-lg">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold">3. Conocen la estratagia de prevención de la violencia en contextos educativos. </label>
                                                    <input type="radio" id="e3t" name="e3" value="0" /> Aprobado
                                                    <input type="radio" id="e3f" name="e3" value="1" /> Reprobado

                                                    
                                                </fieldset>
                                            </div> 

                                            <div class="col-lg">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold">4. Conocen la propuesta de de armonización de la prevención de la violencia en la currícula educativa (inicial, primaria y secundaria). </label>
                                                    <input type="radio" id="e4t" name="e4" value="0" /> Aprobado
                                                    <input type="radio" id="e4f" name="e4" value="1" /> Reprobado
                                                </fieldset>
                                            </div> 

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
	
	<script type="text/javascript" src="nuevo_dde.js"></script>

</body>
</html>
<?php
  } else {
    header("Location:".Conectar::ruta()."index.php");
  }
?>