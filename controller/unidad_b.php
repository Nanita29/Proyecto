<?php
    require_once("../config/conexion.php");
    require_once("../models/Unidad_B.php");
    $unidad_a = new Unidad_B();

    switch($_GET["op"]){
        case "insert":
            
           $unidad_a->insert_unidad_a(
                $_POST["id_comunidad"],
                $_POST["id_estado"],
                $_POST["id_fuente"],
                $_POST["id_usuario"],
                $_POST["a_cod"],
                $_POST["a_nombre"],
                $_POST["a_director_nombre"],
                $_POST["a_director_tel"],
                $_POST["a_dna"],
                $_POST["a_tecnico"],
                $_POST["a_centro_salud"],
                $_POST["a_docen_ini_v"],
                $_POST["a_docen_ini_m"],
                $_POST["a_docen_pri_v"],
                $_POST["a_docen_pri_m"],
                $_POST["a_docen_sec_v"],
                $_POST["a_docen_sec_m"],
                $_POST["a_est_ini_v"],
                $_POST["a_est_ini_m"],
                $_POST["a_est_pri_v"],
                $_POST["a_est_pri_m"],
                $_POST["a_est_sec_v"],
                $_POST["a_est_sec_m"],
                $_POST["a_per_med_v"],
                $_POST["a_per_med_m"],
                $_POST["a_per_enf_v"],
                $_POST["a_per_enf_m"],
                $_POST["e1"],
                $_POST["e2"],
                $_POST["e3"],
                $_POST["e4"],
                $_POST["a_avance"]);


        break;

        case "update":
            print_r( 
            $unidad_a->update_unidad_a(
                
                $_POST["id_unidad_a"],
                 $_POST["id_comunidad"],
                 $_POST["id_estado"],
                 $_POST["id_fuente"],
                 $_POST["id_usuario"],
                 $_POST["a_cod"],
                 $_POST["a_nombre"],
                 $_POST["a_director_nombre"],
                 $_POST["a_director_tel"],
                 $_POST["a_dna"],
                 $_POST["a_tecnico"],
                 $_POST["a_centro_salud"],
                 $_POST["a_docen_ini_v"],
                 $_POST["a_docen_ini_m"],
                 $_POST["a_docen_pri_v"],
                 $_POST["a_docen_pri_m"],
                 $_POST["a_docen_sec_v"],
                 $_POST["a_docen_sec_m"],
                 $_POST["a_est_ini_v"],
                 $_POST["a_est_ini_m"],
                 $_POST["a_est_pri_v"],
                 $_POST["a_est_pri_m"],
                 $_POST["a_est_sec_v"],
                 $_POST["a_est_sec_m"],
                 $_POST["a_per_med_v"],
                 $_POST["a_per_med_m"],
                 $_POST["a_per_enf_v"],
                 $_POST["a_per_enf_m"],
                 $_POST["e1"],
                 $_POST["e2"],
                 $_POST["e3"],
                 $_POST["e4"]));
 
 
         break;

        
         case "listar":
            $datos=$unidad_a->listar_unidad_a();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                /* CAMPOS EN LA TABLA: */
                $sub_array[] = $row["a_cod"];
                $sub_array[] = $row["a_nombre"];
                $sub_array[] = $row["a_director_nombre"];
                $sub_array[] = $row["a_director_tel"];
                $sub_array[] = $row["a_dna"];
                $sub_array[] = $row["a_tecnico"];
                $sub_array[] = $row["a_centro_salud"];
                $sub_array[] = $row["a_avance"];
                $sub_array[] = $row["nombre_usu"]." ".$row["apellido_usu"];

                $sub_array[] = '<a href="..\Cambio_Unidad_B\?DATA='.$row["id_unidad_a"].','.$row["id_comunidad"].','.$row["id_fuente"].'">
                <button type="button" onClick=""  id="'.$row["id_unidad_a"].'" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-edit"></i></button></a>';

                $sub_array[] = '<a href="..\Consultar_Archivos\?DATA='.$row["id_unidad_a"].','.$row["id_estado"].'"> 
                <button type="button" onClick=""  id="'.$row["id_unidad_a"].'" class="btn btn-inline btn-primary btn-sm ladda-button" ><i class="fa fa-file"></i></button></a>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1, 
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
        break;
        
        case "listardetalle":
            $datos=$unidad_a->listar_unidad_a_id($_POST['id_unidad_a']);
            $data= Array();
            ?>
                <?php
                    foreach($datos as $row){
                        ?>
                        <div >
                            <p>
                                Desde esta ventana podrá modificar una nueva Unidad Educativa " (R2.IVO7, R4.IVO3)"
                            </p>
                            <div class="row">
                            
                                <form method="post" id="unidad_form"> 

                                    <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $_SESSION["id_usuario"] ?>">

                                    <!-- INF GENERAL -->
                                    <div class="container">
                                        <div><h5 class="m-t-lg with-border">INFORMACIÓN GENERAL</h5></div>

                                        <div class="col-lg-6" style="display: none">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="id_unidad_a">Código</label>
                                                    <input type="text" class="form-control" id="id_unidad_a" name="id_unidad_a" placeholder="Ingrese el código" value=<?php echo $row['id_unidad_a'] ?>>
                                                </fieldset>
                                            </div>
                                            
                                        <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_cod">Código</label>
                                                    <input type="text" class="form-control" id="a_cod" name="a_cod" placeholder="Ingrese el código" value=<?php echo $row['a_cod'] ?>>
                                                </fieldset>
                                            </div>


                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_nombre">Nombre de la Unidad Educativa</label>
                                                    <input type="text" class="form-control" id="a_nombre" name="a_nombre" placeholder="Ingrese el nombre de la Unidad Educativa" value=<?php echo $row['a_nombre'] ?>>
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-6">
                                                <fieldset class="form-group"> 
                                                    <label class="form-label semibold" for="id_comunidad">Comunidad</label>
                                                    <select id="id_comunidad" name="id_comunidad" class="form-control" >
                                    
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
                                                    <input type="text" class="form-control" id="a_director_nombre" name="a_director_nombre" placeholder="Director" value=<?php echo $row['a_director_nombre'] ?>>
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_director_tel">Teléfono Director</label>
                                                    <input type="text" class="form-control" id="a_director_tel" name="a_director_tel" placeholder="Ingrese el teléfono del director" value=<?php echo $row['a_director_tel'] ?>>
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_dna">DNA</label>
                                                    <input type="text" class="form-control" id="a_dna" name="a_dna" placeholder="Ingrese el DNA" value=<?php echo $row['a_dna'] ?>>
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_tecnico">Técnico</label>
                                                    <input type="text" class="form-control" id="a_tecnico" name="a_tecnico" placeholder="Ingrese el técnico" value=<?php echo $row['a_tecnico'] ?>><br>
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_centro_salud">Centro de Salud</label>
                                                    <input type="text" class="form-control" id="a_centro_salud" name="a_centro_salud" placeholder="Ingrese el centro de salud" value=<?php echo $row['a_centro_salud'] ?>><br>
                                                </fieldset>
                                            </div>
                                            

                                    </div>

                                    <!-- DOCENTES -->
                                    <div class="container">
                                        <div class="centered"><h5 class="m-t-lg with-border">PLANTEL DOCENTE</h5></div>
                                            <div class="col-lg-2">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_docen_ini_v">Docentes Inicial Varones</label>
                                                    <input type="number" class="form-control" id="a_docen_ini_v" name="a_docen_ini_v" placeholder="Total" value=<?php echo $row['a_docen_ini_v'] ?>>
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-2">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_docen_ini_m">Docentes Inicial Mujeres</label>
                                                    <input type="number" class="form-control" id="a_docen_ini_m" name="a_docen_ini_m" placeholder="Total" value=<?php echo $row['a_docen_ini_m'] ?>>
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-2">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_docen_pri_v">Docentes Primaria Varones</label>
                                                    <input type="number" class="form-control" id="a_docen_pri_v" name="a_docen_pri_v" placeholder="Total"value=<?php echo $row['a_docen_pri_v'] ?>>
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-2">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_docen_pri_m">Docentes Primaria Mujeres</label>
                                                    <input type="number" class="form-control" id="a_docen_pri_m" name="a_docen_pri_m" placeholder="Total"value=<?php echo $row['a_docen_pri_m'] ?>>
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-2">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_docen_sec_v">Docentes Secundaria Varones</label>
                                                    <input type="number" class="form-control" id="a_docen_sec_v" name="a_docen_sec_v" placeholder="Total"value=<?php echo $row['a_docen_sec_v'] ?>>
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-2">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_docen_sec_m">Docentes Secundaria Mujeres</label>
                                                    <input type="number" class="form-control" id="a_docen_sec_m" name="a_docen_sec_m" placeholder="Total"value=<?php echo $row['a_docen_sec_m'] ?>><br>
                                                </fieldset>
                                            </div>
                                    </div>
                               
                                    <!-- ESTUDIANTES -->
                                    <div class="container">
                                        <div class="centered"><h5 class="m-t-lg with-border">ESTUDIANTES</h5></div>
                                            <div class="col-lg-2">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_est_ini_v">Estudiantes Inicial Varones</label>
                                                    <input type="number" class="form-control" id="a_est_ini_v" name="a_est_ini_v" placeholder="Total"value=<?php echo $row['a_est_ini_v'] ?>>
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-2">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_est_ini_m">Estudiantes Inicial Mujeres</label>
                                                    <input type="number" class="form-control" id="a_est_ini_m" name="a_est_ini_m" placeholder="Total"value=<?php echo $row['a_est_ini_m'] ?>>
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-2">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_est_pri_v">Estudiantes Primaria Varones</label>
                                                    <input type="number" class="form-control" id="a_est_pri_v" name="a_est_pri_v" placeholder="Total"value=<?php echo $row['a_est_pri_v'] ?>>
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-2">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_est_pri_m">Estudiantes Primaria Mujeres</label>
                                                    <input type="number" class="form-control" id="a_est_pri_m" name="a_est_pri_m" placeholder="Total"value=<?php echo $row['a_est_pri_m'] ?>>
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-2">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_est_sec_v">Estudiantes Secundaria Varones</label>
                                                    <input type="number" class="form-control" id="a_est_sec_v" name="a_est_sec_v" placeholder="Total"value=<?php echo $row['a_est_sec_v'] ?>>
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-2">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_est_sec_m">Estudiantes Secundaria Mujeres</label>
                                                    <input type="number" class="form-control" id="a_est_sec_m" name="a_est_sec_m" placeholder="Total"value=<?php echo $row['a_est_sec_m'] ?>><br>
                                                </fieldset>
                                            </div>

                                    </div>

                                    <!-- SALUD -->
                                    <div class="container">
                                        <div><h5 class="m-t-lg with-border">PERSONAL MÉDICO</h5></div>
                                            <div class="col-lg-2">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_per_med_v">Personal Salud Médico Varones</label>
                                                    <input type="number" class="form-control" id="a_per_med_v" name="a_per_med_v" placeholder="Total"value=<?php echo $row['a_per_med_v'] ?>>
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-2">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_per_med_m">Personal Salud Médico Mujeres</label>
                                                    <input type="number" class="form-control" id="a_per_med_m" name="a_per_med_m" placeholder="Total"value=<?php echo $row['a_per_med_m'] ?>>
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-2">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_per_enf_v">Personal Salud Enfermería Varones</label>
                                                    <input type="number" class="form-control" id="a_per_enf_v" name="a_per_enf_v" placeholder="Total"value=<?php echo $row['a_per_enf_v'] ?>>
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-2">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="a_per_enf_m">Personal Salud Enfermería Mujeres</label>
                                                    <input type="number" class="form-control" id="a_per_enf_m" name="a_per_enf_m" placeholder="Total"value=<?php echo $row['a_per_enf_m'] ?>><br>
                                                </fieldset>
                                            </div>
                                    </div>

                                    <!-- ESTADOS MONITOREO -->
                                    <div class="container">
                                        <div><h5 class="m-t-lg with-border">ESTADOS DE MONITOREO</h5></div>

                                            <div class="col-lg">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold">1. Socialización del protocolo (UE priorizadas) y DNA.</label>
                                                    <input type="radio" id="e1t" name="e1" value="0" /> Aprobado
                                                    <input type="radio" id="e1f" name="e1" value="1" /> Reprobado
                                                </fieldset>
                                            </div> 
                                            

                                            <div class="col-lg">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold">2. Elaboración - aprobación del mecanismo de referencia y contra referencia de casos (DDE, IPELC, UE priorizadas y DNA).</label>
                                                    <input type="radio" id="e2t" name="e2" value="0" /> Aprobado
                                                    <input type="radio" id="e2f" name="e2" value="1" /> Reprobado

                                                </fieldset>
                                            </div> 

                                            <div class="col-lg">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold">3. Gestión para recojo de información referida al reporte de casos y funcionamiento del mecanismo (directores UE, Comisiones de Convivencia en coordinación con DNA).</label>
                                                    <input type="radio" id="e3t" name="e3" value="0" /> Aprobado
                                                    <input type="radio" id="e3f" name="e3" value="1" /> Reprobado

                                                    
                                                </fieldset>
                                            </div> 

                                            <div class="col-lg">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold">4. Socialización de la experiencia.</label>
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
                            
                        <?php
                    }
                ?>
            <?php
        break;

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
        break;

        case "mostrar";
            $datos=$unidad_a->listar_unidad_a_id($_POST["id_unidad_a"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["id_unidad_a"] = $row["id_unidad_a"];
                    $output["id_comunidad"] = $row["id_comunidad"];
                    $output["id_estado"] = $row["id_estado"];
                    $output["id_fuente"] = $row["id_fuente"];
                    $output["a_cod"] = $row["a_cod"];
                    $output["a_nombre"] = $row["a_nombre"];
                    $output["a_director_nombre"] = $row["a_director_nombre"];
                    $output["a_director_tel"] = $row["a_director_tel"];
                    $output["a_dna"] = $row["a_dna"];
                    $output["a_tecnico"] = $row["a_tecnico"];
                    $output["a_centro_salud"] = $row["a_centro_salud"];
                    $output["a_docen_ini_v"] = $row["a_docen_ini_v"];
                    $output["a_docen_ini_m"] = $row["a_docen_ini_m"];
                    $output["a_docen_pri_v"] = $row["a_docen_pri_v"];
                    $output["a_docen_pri_m"] = $row["a_docen_pri_m"];
                    $output["a_docen_sec_v"] = $row["a_docen_sec_v"];
                    $output["a_docen_sec_m"] = $row["a_docen_sec_m"];
                    $output["a_est_ini_v"] = $row["a_est_ini_v"];
                    $output["a_est_ini_m"] = $row["a_est_ini_m"];
                    $output["a_est_pri_v"] = $row["a_est_pri_v"];
                    $output["a_est_pri_m"] = $row["a_est_pri_m"];
                    $output["a_est_sec_v"] = $row["a_est_sec_v"];
                    $output["a_est_sec_m"] = $row["a_est_sec_m"];
                    $output["a_per_med_v"] = $row["a_per_med_v"];
                    $output["a_per_med_m"] = $row["a_per_med_m"];
                    $output["a_per_enf_v"] = $row["a_per_enf_v"];
                    $output["a_per_enf_m"] = $row["a_per_enf_m"];
                    $output["e1"] = $row["e1"];
                    $output["e2"] = $row["e2"];
                    $output["e3"] = $row["e3"];
                    $output["e4"] = $row["e4"];
                    $output["a_avance"] = $row["a_avance"];
                }
                echo json_encode($output);
            }   
        break;
    }
?> 