<?php
  require_once("../../config/conexion.php"); 
  if(isset($_SESSION["id_usuario"])){ 
?>
<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php");?>
	<title>Educo : Nuevo Miembro del Personal Técnico "(R1.IVO2)</title>
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
							<h3>Nuevo Miembro del Personal Técnico "(R1.IVO2)"</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="../Home/index.php">Inicio</a></li>
								<li class="active">Nuevo Miembro del Personal Técnico "(R1.IVO2)"</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

			<div class="box-typical box-typical-padding">
				<p>
					Desde esta ventana podrá registrar una nuevo Miembro del Personal Técnico "(R1.IVO2)""
				</p>


				<div class="row">
					<form method="post" id="unidad_form"> 

						<input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $_SESSION["id_usuario"] ?>">

									<!-- INF GENERAL -->
									<div class="container">
                                        <div><h5 class="m-t-lg with-border">INFORMACIÓN GENERAL</h5></div>
                                            
                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="m_cod">Código</label>
                                                    <input type="text" class="form-control" id="m_cod" name="m_cod" placeholder="Ingrese el código">
                                                </fieldset>
                                            </div>


                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="m_nombre">Nombre del Miembro del Personal Técnico</label>
                                                    <input type="text" class="form-control" id="m_nombre" name="m_nombre" placeholder="Ingrese el nombre del Miembro del Personal Técnico">
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-6">
                                                <fieldset class="form-group"> 
                                                    <label class="form-label semibold" for="id_departamento">Departamento</label>
                                                    <select id="id_departamento" name="id_departamento" class="form-control" >
                                    
                                                    </select>
                                                </fieldset>
                                            </div>


                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="m_contactos">Contactos</label>
                                                    <input type="text" class="form-control" id="m_contactos" name="m_contactos" placeholder="Contactos" >
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-12">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="m_observacion">Observaciones</label>
                                                    <input type="text" class="form-control" id="m_observacion" name="m_observacion" placeholder="Observaciones" >
                                                </fieldset>
                                            </div>

                                    </div>

                                    <!-- ESTADOS MONITOREO -->
                                    <div class="container">
                                        <div><h5 class="m-t-lg with-border">ESTADOS DE MONITOREO</h5></div>

                                            <div class="col-lg">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold">1. Conocen normativa y politicas educativas vigentes en torno a PCPA, protocolos.</label>
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

                                            <div class="col-lg">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold">5. Cuentan con habilidades para capacitar a maestros y maestras, otros actores y hacer seguimiento en las escuelas.</label>
                                                    <input type="radio" id="e5t" name="e5" value="0" /> Aprobado
                                                    <input type="radio" id="e5f" name="e5" value="1" /> Reprobado
                                                </fieldset>
                                            </div> 

                                            <div class="col-lg">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold">6. Aplican conocimientos para la gestión externa e interna de la estrategia en el programa y/o servicio. </label>
                                                    <input type="radio" id="e6t" name="e6" value="0" /> Aprobado
                                                    <input type="radio" id="e6f" name="e6" value="1" /> Reprobado
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
	
	<script type="text/javascript" src="nuevo_miembro.js"></script>

</body>
</html>
<?php
  } else {
    header("Location:".Conectar::ruta()."index.php");
  }
?>