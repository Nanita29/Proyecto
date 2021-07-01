<?php
    require_once("../config/conexion.php");
    require_once("../models/Unidad_A.php");
    $unidad_a = new Unidad_A();

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
                $_POST["a_pcpa"],
                $_POST["a_tecnico"],
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
                $_POST["file1"],
                $_POST["file2"],
                $_POST["file3"],
                $_POST["file4"],
                $_POST["a_avance"]);


        break;

        case "listar":
            $datos=$unidad_a->listar_unidad_a();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                /* CAMPOS EN LA TABLA: */
                $sub_array[] = $row["a_nombre"];
                $sub_array[] = $row["a_director_nombre"];
                $sub_array[] = $row["a_director_tel"];
                $sub_array[] = $row["a_pcpa"];
                $sub_array[] = $row["a_tecnico"];
                $sub_array[] = $row["a_avance"];
                $sub_array[] = $row["nombre_usu"]." ".$row["apellido_usu"];

                $sub_array[] = '<button type="button" onClick="ver('.$row["id_unidad_a"].');"  id="'.$row["id_unidad_a"].'" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                $data[] = $sub_array;
            }

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
                    $output["a_pcpa"] = $row["a_pcpa"];
                    $output["a_tecnico"] = $row["a_tecnico"];
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