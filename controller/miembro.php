<?php
    require_once("../config/conexion.php");
    require_once("../models/Miembro.php");
    $miembro = new Miembro();

    switch($_GET["op"]){
        case "insert":
            
           $miembro->insert_miembro(
                $_POST["id_departamento"],
                $_POST["id_estado"],
                $_POST["id_usuario"],
                $_POST["m_cod"],
                $_POST["m_nombre"],
                $_POST["m_contactos"],
                $_POST["m_observacion"],
                $_POST["e1"],
                $_POST["e2"],
                $_POST["e3"],
                $_POST["e4"],
                $_POST["e5"],
                $_POST["e6"],
                $_POST["d_avance"]);


        break;

        case "update":
            print_r( 
            $miembro->update_miembro(
                
                $_POST["id_miembro"],
                $_POST["id_departamento"],
                $_POST["id_estado"],
                $_POST["id_usuario"],
                $_POST["m_cod"],
                $_POST["m_nombre"],
                $_POST["m_contactos"],
                $_POST["m_observacion"],
                $_POST["e1"],
                $_POST["e2"],
                $_POST["e3"],
                $_POST["e4"],
                $_POST["e5"],
                $_POST["e6"]));
 
 
         break;

        
         case "listar":
            $datos=$miembro->listar_miembro();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                /* CAMPOS EN LA TABLA: */
                $sub_array[] = $row["m_cod"];
                $sub_array[] = $row["m_nombre"];
                $sub_array[] = $row["m_contactos"];
                $sub_array[] = $row["m_avance"];
                $sub_array[] = $row["nombre_usu"]." ".$row["apellido_usu"];

                $sub_array[] = '<a href="..\Cambio_Miembro\?DATA='.$row["id_miembro"].','.$row["id_departamento"].'">
                <button type="button" onClick=""  id="'.$row["id_miembro"].'" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-edit"></i></button></a>';

                $sub_array[] = '<a href="..\Consultar_Archivos\?DATA='.$row["id_miembro"].','.$row["id_estado"].'"> 
                <button type="button" onClick=""  id="'.$row["id_miembro"].'" class="btn btn-inline btn-primary btn-sm ladda-button" ><i class="fa fa-file"></i></button></a>';
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
            $datos=$miembro->listar_miembro_id($_POST['id_miembro']);
            $data= Array();
            ?>
                <?php
                    foreach($datos as $row){
                        ?>
                        <div >
                            <p>
                                Desde esta ventana podrá modificar una Dirección Distrital "(R2.IVO7, R4.IVO3)"
                            </p>
                            <div class="row">
                            
                                <form method="post" id="unidad_form"> 

                                    <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $_SESSION["id_usuario"] ?>">

                                    <!-- INF GENERAL -->
                                    <div class="container">
                                        <div><h5 class="m-t-lg with-border">INFORMACIÓN GENERAL</h5></div>

                                        <div class="col-lg-6" style="display: none">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="id_miembro">Código</label>
                                                    <input type="text" class="form-control" id="id_miembro" name="id_miembro" placeholder="Ingrese el código" value=<?php echo $row['id_miembro'] ?>>
                                                </fieldset>
                                            </div>
                                            
                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="m_cod">Código</label>
                                                    <input type="text" class="form-control" id="m_cod" name="m_cod" placeholder="Ingrese el código" value=<?php echo $row['m_cod'] ?>>
                                                </fieldset>
                                            </div>


                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="m_nombre">Nombre del Miembro del Personal Técnico</label>
                                                    <input type="text" class="form-control" id="m_nombre" name="m_nombre" placeholder="Ingrese el nombre de la Dirección Distrital" value=<?php echo $row['m_nombre'] ?>>
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
                                                    <input type="text" class="form-control" id="m_contactos" name="m_contactos" placeholder="Director" value=<?php echo $row['m_contactos'] ?> >
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-12">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="m_observacion">Observaciones</label>
                                                    <input type="text" class="form-control" id="m_observacion" name="m_observacion" placeholder="Ingrese el teléfono del director"  value=<?php echo $row['m_observacion'] ?>>
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
            $datos=$miembro->listar_miembro_id($_POST["id_miembro"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["id_dde"] = $row["id_dde"];
                    $output["id_municipio"] = $row["id_municipio"];
                    $output["id_estado"] = $row["id_estado"];
                    $output["id_fuente"] = $row["id_fuente"];
                    $output["d_cod"] = $row["d_cod"];
                    $output["d_nombre"] = $row["d_nombre"];
                    $output["d_director_nombre"] = $row["d_director_nombre"];
                    $output["d_director_tel"] = $row["d_director_tel"];
                    $output["d_datos"] = $row["d_datos"];
                    $output["d_tecnico"] = $row["d_tecnico"];
                    $output["d_centro_salud"] = $row["d_centro_salud"];
                    $output["d_docen_ini_v"] = $row["d_docen_ini_v"];
                    $output["d_docen_ini_m"] = $row["d_docen_ini_m"];
                    $output["d_docen_pri_v"] = $row["d_docen_pri_v"];
                    $output["d_docen_pri_m"] = $row["d_docen_pri_m"];
                    $output["d_docen_sec_v"] = $row["d_docen_sec_v"];
                    $output["d_docen_sec_m"] = $row["d_docen_sec_m"];
                    $output["d_est_ini_v"] = $row["d_est_ini_v"];
                    $output["d_est_ini_m"] = $row["d_est_ini_m"];
                    $output["d_est_pri_v"] = $row["d_est_pri_v"];
                    $output["d_est_pri_m"] = $row["d_est_pri_m"];
                    $output["d_est_sec_v"] = $row["d_est_sec_v"];
                    $output["d_est_sec_m"] = $row["d_est_sec_m"];
                    $output["d_per_med_v"] = $row["d_per_med_v"];
                    $output["d_per_med_m"] = $row["d_per_med_m"];
                    $output["d_per_enf_v"] = $row["d_per_enf_v"];
                    $output["d_per_enf_m"] = $row["d_per_enf_m"];
                    $output["e1"] = $row["e1"];
                    $output["e2"] = $row["e2"];
                    $output["e3"] = $row["e3"];
                    $output["e4"] = $row["e4"];
                    $output["d_avance"] = $row["d_avance"];
                }
                echo json_encode($output);
            }   
        break;
    }
?> 