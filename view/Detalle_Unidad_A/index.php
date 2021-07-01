<?php
  require_once("../../config/conexion.php"); 
  if(isset($_SESSION["id_usuario"])){ 
?>
<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php");?>
	<title>Educo : Nueva Unidad Educativa "A"</title>
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
							<h3>Nueva Unidad Educativa</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="../Home/index.php">Inicio</a></li>
								<li class="active">Nueva Unidad Educativa "A"</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

			<div class="box-typical box-typical-padding">
				<p>
					Desde esta ventana podrá modificar una nueva Unidad Educativa "A"
				</p>


				<div class="row">
					<form method="post" id="unidad_form"> 

						<input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $_SESSION["id_usuario"] ?>">

						<!-- <div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="a_file">Código</label>
								<input type="file" class="form-control" id="a_file" name="a_file" placeholder="Ingrese el código">
							</fieldset>
						</div> -->
<!--
						<img style='display:block; width:100px;height:100px;' id='base64image'                 
       					src= 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEAYABgAAD/4QAiRXhpZgAATU0AKgAAAAgAAQESAAMAAAABAAEAAAAAAAD/2wBDAAIBAQIBAQICAgICAgICAwUDAwMDAwYEBAMFBwYHBwcGBwcICQsJCAgKCAcHCg0KCgsMDAwMBwkODw0MDgsMDAz/2wBDAQICAgMDAwYDAwYMCAcIDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAz/wAARCAFLAg0DASIAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwD5rooor8DP9oAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiv04/4h2dK/wCi96f/AOEyn/ydR/xDs6V/0XvT/wDwmU/+Tq+g/wBV8z/59f8Ak0f8z8X/AOJhvD//AKGH/lKv/wDKz8x6K/Tj/iHZ0r/oven/APhMp/8AJ1H/ABDs6V/0XvT/APwmU/8Ak6j/AFXzP/n1/wCTR/zD/iYbw/8A+hh/5Sr/APys/Meiv04/4h2dK/6L3p//AITKf/J1H/EOzpX/AEXvT/8AwmU/+TqP9V8z/wCfX/k0f8w/4mG8P/8AoYf+Uq//AMrPzHor9OP+IdnSv+i96f8A+Eyn/wAnUf8AEOzpX/Re9P8A/CZT/wCTqP8AVfM/+fX/AJNH/MP+JhvD/wD6GH/lKv8A/Kz8x6K+8vEHw3tfgb8TdR1TTf7Sj8Qa5YagbyC90uHw9FZz+HtL/tDVNH1DSbACxvtK1WE2MimCfGyVCzzFZPP+Da8vFYN0NJPW7+VrfjZp+W297foPDfE1POIyqUY2hyxad7qXNzJtXSfKpRlFNpOXK5JKLi5FFFFcZ9OFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAf/9k='

						/>
-->

						<!-- <a  download="FILENAME.txt"             
       					href= 'data:text/plain;base64,VEUgUVVJRVJPIERFTUFTSUFETyDimaU='
						   >
						   descargar
						   </a> -->

						   <!-- INF GENERAL -->
						<div class="container">
							<div><h5 class="m-t-lg with-border">INFORMACIÓN GENERAL</h5></div>
								<div class="col-lg-6">
									<fieldset class="form-group">
										<label class="form-label semibold" for="a_cod">Código</label>
										<input type="text" class="form-control" id="a_cod" name="a_cod" placeholder="a_cod">
									</fieldset>
								</div>
								
								<div class="col-lg-6">
									<fieldset class="form-group">
										<label class="form-label semibold" for="a_nombre">Nombre de la Unidad Educativa</label>
										<input type="text" class="form-control" id="a_nombre" name="a_nombre" placeholder="a_nombre">
									</fieldset>
								</div>

								<div class="col-lg-6">
									<fieldset class="form-group"> 
										<label class="form-label semibold" for="id_comunidad">Comunidad</label>
										<select id="id_comunidad" name="id_comunidad" class="form-control">
											
										</select>
									</fieldset>
								</div>

								<div class="col-lg-6">
									<fieldset class="form-group"> 
										<label class="form-label semibold" for="id_fuente">Fuente de financiamiento</label>
										<select id="id_fuente" name="id_fuente" class="form-control">
											
										</select>
									</fieldset>
								</div>


								<div class="col-lg-6">
									<fieldset class="form-group">
										<label class="form-label semibold" for="a_director_nombre">Director</label>
										<input type="text" class="form-control" id="a_director_nombre" name="a_director_nombre" placeholder="a_director_nombre">
									</fieldset>
								</div>

								<div class="col-lg-6">
									<fieldset class="form-group">
										<label class="form-label semibold" for="a_director_tel">Teléfono Director</label>
										<input type="text" class="form-control" id="a_director_tel" name="a_director_tel" placeholder="Ingrese el teléfono del director">
									</fieldset>
								</div>

								<div class="col-lg-6">
									<fieldset class="form-group">
										<label class="form-label semibold" for="a_pcpa">PCPA</label>
										<input type="text" class="form-control" id="a_pcpa" name="a_pcpa" placeholder="Ingrese el PCPA">
									</fieldset>
								</div>

								<div class="col-lg-6">
									<fieldset class="form-group">
										<label class="form-label semibold" for="a_tecnico">Técnico</label>
										<input type="text" class="form-control" id="a_tecnico" name="a_tecnico" placeholder="Ingrese el técnico"><br>
									</fieldset>
								</div>
								

						</div>

						
						
						<!-- DOCENTES -->
						<div class="container">
							<div class="centered"><h5 class="m-t-lg with-border">PLANTEL DOCENTE</h5></div>
								<div class="col-lg-2">
									<fieldset class="form-group">
										<label class="form-label semibold" for="a_docen_ini_v">Docentes Inicial Varones</label>
										<input type="number" class="form-control" id="a_docen_ini_v" name="a_docen_ini_v" placeholder="Total">
									</fieldset>
								</div>

								<div class="col-lg-2">
									<fieldset class="form-group">
										<label class="form-label semibold" for="a_docen_ini_m">Docentes Inicial Mujeres</label>
										<input type="number" class="form-control" id="a_docen_ini_m" name="a_docen_ini_m" placeholder="Total">
									</fieldset>
								</div>

								<div class="col-lg-2">
									<fieldset class="form-group">
										<label class="form-label semibold" for="a_docen_pri_v">Docentes Primaria Varones</label>
										<input type="number" class="form-control" id="a_docen_pri_v" name="a_docen_pri_v" placeholder="Total">
									</fieldset>
								</div>

								<div class="col-lg-2">
									<fieldset class="form-group">
										<label class="form-label semibold" for="a_docen_pri_m">Docentes Primaria Mujeres</label>
										<input type="number" class="form-control" id="a_docen_pri_m" name="a_docen_pri_m" placeholder="Total">
									</fieldset>
								</div>

								<div class="col-lg-2">
									<fieldset class="form-group">
										<label class="form-label semibold" for="a_docen_sec_v">Docentes Secundaria Varones</label>
										<input type="number" class="form-control" id="a_docen_sec_v" name="a_docen_sec_v" placeholder="Total">
									</fieldset>
								</div>

								<div class="col-lg-2">
									<fieldset class="form-group">
										<label class="form-label semibold" for="a_docen_sec_m">Docentes Secundaria Mujeres</label>
										<input type="number" class="form-control" id="a_docen_sec_m" name="a_docen_sec_m" placeholder="Total"><br>
									</fieldset>
								</div>
						</div>

                        
						<!-- ESTUDIANTES -->
						<div class="container">
							<div class="centered"><h5 class="m-t-lg with-border">ESTUDIANTES</h5></div>
								<div class="col-lg-2">
									<fieldset class="form-group">
										<label class="form-label semibold" for="a_est_ini_v">Estudiantes Inicial Varones</label>
										<input type="number" class="form-control" id="a_est_ini_v" name="a_est_ini_v" placeholder="Total">
									</fieldset>
								</div>

								<div class="col-lg-2">
									<fieldset class="form-group">
										<label class="form-label semibold" for="a_est_ini_m">Estudiantes Inicial Mujeres</label>
										<input type="number" class="form-control" id="a_est_ini_m" name="a_est_ini_m" placeholder="Total">
									</fieldset>
								</div>

								<div class="col-lg-2">
									<fieldset class="form-group">
										<label class="form-label semibold" for="a_est_pri_v">Estudiantes Primaria Varones</label>
										<input type="number" class="form-control" id="a_est_pri_v" name="a_est_pri_v" placeholder="Total">
									</fieldset>
								</div>

								<div class="col-lg-2">
									<fieldset class="form-group">
										<label class="form-label semibold" for="a_est_pri_m">Estudiantes Primaria Mujeres</label>
										<input type="number" class="form-control" id="a_est_pri_m" name="a_est_pri_m" placeholder="Total">
									</fieldset>
								</div>

								<div class="col-lg-2">
									<fieldset class="form-group">
										<label class="form-label semibold" for="a_est_sec_v">Estudiantes Secundaria Varones</label>
										<input type="number" class="form-control" id="a_est_sec_v" name="a_est_sec_v" placeholder="Total">
									</fieldset>
								</div>

								<div class="col-lg-2">
									<fieldset class="form-group">
										<label class="form-label semibold" for="a_est_sec_m">Estudiantes Secundaria Mujeres</label>
										<input type="number" class="form-control" id="a_est_sec_m" name="a_est_sec_m" placeholder="Total"><br>
									</fieldset>
								</div>

						</div>

                        <!-- SALUD -->
						<div class="container">
							<div><h5 class="m-t-lg with-border">PERSONAL MÉDICO</h5></div>
								<div class="col-lg-2">
									<fieldset class="form-group">
										<label class="form-label semibold" for="a_per_med_v">Personal Salud Médico Varones</label>
										<input type="number" class="form-control" id="a_per_med_v" name="a_per_med_v" placeholder="Total">
									</fieldset>
								</div>

								<div class="col-lg-2">
									<fieldset class="form-group">
										<label class="form-label semibold" for="a_per_med_m">Personal Salud Médico Mujeres</label>
										<input type="number" class="form-control" id="a_per_med_m" name="a_per_med_m" placeholder="Total">
									</fieldset>
								</div>

								<div class="col-lg-2">
									<fieldset class="form-group">
										<label class="form-label semibold" for="a_per_enf_v">Personal Salud Enfermería Varones</label>
										<input type="number" class="form-control" id="a_per_enf_v" name="a_per_enf_v" placeholder="Total">
									</fieldset>
								</div>

								<div class="col-lg-2">
									<fieldset class="form-group">
										<label class="form-label semibold" for="a_per_enf_m">Personal Salud Enfermería Mujeres</label>
										<input type="number" class="form-control" id="a_per_enf_m" name="a_per_enf_m" placeholder="Total"><br>
									</fieldset>
								</div>
						</div>

						<!-- ESTADOS MONITOREO -->
						<div class="container">
							<div><h5 class="m-t-lg with-border">ESTADOS DE MONITOREO</h5></div>

								<div class="col-lg-6">
									<fieldset class="form-group">
										<label class="form-label semibold" for="e1">ESTADO 1</label>
										<input type="file" class="form-control" id="e1" name="e1" placeholder="Ingrese el código">
									</fieldset>
								</div> 

								<div class="col-lg-6">
									<fieldset class="form-group">
										<label class="form-label semibold" for="e2">ESTADO 2</label>
										<input type="file" class="form-control" id="e2" name="e2" placeholder="Ingrese el código">
									</fieldset>
								</div> 

								<div class="col-lg-6">
									<fieldset class="form-group">
										<label class="form-label semibold" for="e3">ESTADO 3</label>
										<input type="file" class="form-control" id="e3" name="e3" placeholder="Ingrese el código">
									</fieldset>
								</div> 

								<div class="col-lg-6">
									<fieldset class="form-group">
										<label class="form-label semibold" for="e4">ESTADO 4</label>
										<input type="file" class="form-control" id="e4" name="e4" placeholder="Ingrese el código">
									</fieldset>
								</div> 

						</div>

                        
						<!-- AVANCE -->
						<div class="col-lg-3">
							<fieldset class="form-group">
								<label class="form-label semibold" for="a_avance">AVANCE</label>
								<input type="number" class="form-control" id="a_avance" name="a_avance" placeholder="Total">
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
	
	<script type="text/javascript" src="detalle_unidad_a.js"></script>

</body>
</html>
<?php
  } else {
    header("Location:".Conectar::ruta()."index.php");
  }
?>