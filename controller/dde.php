<?php
    require_once("../config/conexion.php");
    require_once("../models/Dde.php");
    $dde = new Dde();

    switch($_GET["op"]){
        case "insert":
            
           $dde->insert_dde(
                $_POST["id_municipio"],
                $_POST["id_estado"],
                $_POST["id_usuario"],
                $_POST["d_cod"],
                $_POST["d_nombre"],
                $_POST["d_director_nombre"],
                $_POST["d_director_tel"],
                $_POST["d_datos"],
                $_POST["e1"],
                $_POST["e2"],
                $_POST["e3"],
                $_POST["e4"],
                $_POST["d_avance"]);


        break;

        case "update":
            print_r( 
            $dde->update_dde(
                
                $_POST["id_dde"],
                 $_POST["id_municipio"],
                 $_POST["id_estado"],
                 $_POST["id_usuario"],
                 $_POST["d_cod"],
                 $_POST["d_nombre"],
                 $_POST["d_director_nombre"],
                 $_POST["d_director_tel"],
                 $_POST["d_datos"],
                 $_POST["e1"],
                 $_POST["e2"],
                 $_POST["e3"],
                 $_POST["e4"]));
 
 
         break;

        
         case "listar":
            $datos=$dde->listar_dde();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                /* CAMPOS EN LA TABLA: */
                $sub_array[] = $row["d_cod"];
                $sub_array[] = $row["d_nombre"];
                $sub_array[] = $row["d_director_nombre"];
                $sub_array[] = $row["d_director_tel"];
                $sub_array[] = $row["d_datos"];
                $sub_array[] = $row["d_avance"];
                $sub_array[] = $row["nombre_usu"]." ".$row["apellido_usu"];

                $sub_array[] = '<a href="..\Cambio_Dde\?DATA='.$row["id_dde"].','.$row["id_municipio"].'">
                <button type="button" onClick=""  id="'.$row["id_dde"].'" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-edit"></i></button></a>';

                $sub_array[] = '<a href="..\Consultar_Archivos\?DATA='.$row["id_dde"].','.$row["id_estado"].'"> 
                <button type="button" onClick=""  id="'.$row["id_dde"].'" class="btn btn-inline btn-primary btn-sm ladda-button" ><i class="fa fa-file"></i></button></a>';
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
            $datos=$dde->listar_dde_id($_POST['id_dde']);
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
                                                    <label class="form-label semibold" for="id_dde">Código</label>
                                                    <input type="text" class="form-control" id="id_dde" name="id_dde" placeholder="Ingrese el código" value=<?php echo $row['id_dde'] ?>>
                                                </fieldset>
                                            </div>
                                            
                                        <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="d_cod">Código</label>
                                                    <input type="text" class="form-control" id="d_cod" name="d_cod" placeholder="Ingrese el código" value=<?php echo $row['d_cod'] ?>>
                                                </fieldset>
                                            </div>


                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="d_nombre">Nombre de la Dirección Distrital</label>
                                                    <input type="text" class="form-control" id="d_nombre" name="d_nombre" placeholder="Ingrese el nombre de la Dirección Distrital" value=<?php echo $row['d_nombre'] ?>>
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
                                                    <input type="text" class="form-control" id="d_director_nombre" name="d_director_nombre" placeholder="Director" value=<?php echo $row['d_director_nombre'] ?>>
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="d_director_tel">Teléfono Director</label>
                                                    <input type="text" class="form-control" id="d_director_tel" name="d_director_tel" placeholder="Ingrese el teléfono del director" value=<?php echo $row['d_director_tel'] ?>>
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="d_datos">Datos</label>
                                                    <input type="text" class="form-control" id="d_datos" name="d_datos" placeholder="Ingrese los datos" value=<?php echo $row['d_datos'] ?>>
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
            $datos=$dde->listar_dde_id($_POST["id_dde"]);  
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