<?php
    require_once("../config/conexion.php");
    require_once("../models/Unidad_A.php");
    $unidad_a = new Unidad_A();

    switch($_GET["op"]){

         case "guardaryeditar":

            if(empty($_POST["id_unidad_a"])){       
                $unidad_a->insert_unidad(
                    $_POST["id_comunidad"],
                    $_POST["id_estado"],
                    $_POST["id_fuente"],
                    $_POST["id_usuario"],
                    $_POST["a_cod"],
                    $_POST["a_nombre"],
                    $_POST["a_director_nombre"],
                    $_POST["a_director_tel"],
                    $_POST["a_dna"],
                    $_POST["a_centro_salud"],
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
                    $_POST["e1"],
                    $_POST["e2"],
                    $_POST["e3"],
                    $_POST["e4"],
                    $_POST["e1_2"],
                    $_POST["e2_2"],
                    $_POST["e3_2"],
                    $_POST["e4_2"]);  }          
            else {
                $unidad_a->update_unidad(
                    $_POST["id_unidad_a"],
                    $_POST["id_usuario"],
                    $_POST["id_comunidad"],
                    $_POST["id_fuente"],
                    $_POST["a_cod"],
                    $_POST["a_nombre"],
                    $_POST["a_director_nombre"],
                    $_POST["a_director_tel"],
                    $_POST["a_dna"],
                    $_POST["a_centro_salud"],
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
                    $_POST["e1"],
                    $_POST["e2"],
                    $_POST["e3"],
                    $_POST["e4"],
                    $_POST["e1_2"],
                    $_POST["e2_2"],
                    $_POST["e3_2"],
                    $_POST["e4_2"]);          }
            
        break;
  
        case "listar":
            if($_SESSION["rol_id"]==1){       
                $datos=$unidad_a->listar_unidad();
                $data= Array();
                foreach($datos as $row){
                    $sub_array = array();
                    /* CAMPOS EN LA TABLA: */
                    $sub_array[] = 
                    '<button type="button" onClick="editar('.$row["id_unidad_a"].');"  id="'.$row["id_usuario"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>
                    
                    <button type="button" onClick="archivo_data('.$row["id_unidad_a"].','.$row["id_estado"].');" id="btnarchivos"  
                    class="btn btn-inline btn-primary btn-sm ladda-button" ><i class="fa fa-file-text"></i></button>

                    <button type="button" onClick="archivo('.$row["id_unidad_a"].');" id="btnnuevo_archivo"  
                    class="btn btn-inline btn-info btn-sm ladda-button"><i class="fa fa-plus"></i></button>
                    
                    <button type="button" onClick="eliminar('.$row["id_unidad_a"].');"  id="'.$row["id_unidad_a"].'" 
                    class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';

                    $sub_array[] = $row["nombre_dep"];
                    $sub_array[] = $row["nombre_mun"];
                    $sub_array[] = $row["nombre_com"];
                    $sub_array[] = $row["a_nombre"];
                    $sub_array[] = $row["a_director_nombre"].' - '.$row["a_director_tel"];
                    $sub_array[] = $row["a_centro_salud"];
                    $sub_array[] = $row["a_dna"];
                    $sub_array[] = $row["a_avance"];
                    $sub_array[] = $row["a_avance2"];

                    if ($row["e1"]=="2"){
                        $sub_array[] = '<span class="label label-pill label-success">SI</span>';
                    }
                    else{
                        $sub_array[] = '<span class="label label-pill label-danger">NO</span>';
                    }
                    if ($row["e2"]=="2"){
                        $sub_array[] = '<span class="label label-pill label-success">SI</span>';
                    }
                    else{
                        $sub_array[] = '<span class="label label-pill label-danger">NO</span>';
                    }
                    if ($row["e3"]=="2"){
                        $sub_array[] = '<span class="label label-pill label-success">SI</span>';
                    }
                    else{
                        $sub_array[] = '<span class="label label-pill label-danger">NO</span>';
                    }
                    if ($row["e4"]=="2"){
                        $sub_array[] = '<span class="label label-pill label-success">SI</span>';
                    }
                    else{
                        $sub_array[] = '<span class="label label-pill label-danger">NO</span>';
                    }

                    if ($row["e1_2"]=="2"){
                        $sub_array[] = '<span class="label label-pill label-success">SI</span>';
                    }
                    else{
                        $sub_array[] = '<span class="label label-pill label-danger">NO</span>';
                    }
                    if ($row["e2_2"]=="2"){
                        $sub_array[] = '<span class="label label-pill label-success">SI</span>';
                    }
                    else{
                        $sub_array[] = '<span class="label label-pill label-danger">NO</span>';
                    }
                    if ($row["e3_2"]=="2"){
                        $sub_array[] = '<span class="label label-pill label-success">SI</span>';
                    }
                    else{
                        $sub_array[] = '<span class="label label-pill label-danger">NO</span>';
                    }
                    if ($row["e4_2"]=="2"){
                        $sub_array[] = '<span class="label label-pill label-success">SI</span>';
                    }
                    else{
                        $sub_array[] = '<span class="label label-pill label-danger">NO</span>';
                    }

                    $data[] = $sub_array;
                }

                $results = array(
                    "sEcho"=>1, 
                    "iTotalRecords"=>count($data),
                    "iTotalDisplayRecords"=>count($data),
                    "aaData"=>$data);
                echo json_encode($results);           
            }

            if($_SESSION["rol_id"]==3){       
                $datos=$unidad_a->listar_unidad();
                $data= Array();
                foreach($datos as $row){
                    $sub_array = array();
                    /* CAMPOS EN LA TABLA: */
                    $sub_array[] = 
                    '<button type="button" onClick="archivo_data('.$row["id_unidad_a"].','.$row["id_estado"].');" id="btnarchivos"  
                    class="btn btn-inline btn-primary btn-sm ladda-button" ><i class="fa fa-file-text"></i></button>';

                    $sub_array[] = $row["nombre_dep"];
                    $sub_array[] = $row["nombre_mun"];
                    $sub_array[] = $row["nombre_com"];
                    $sub_array[] = $row["a_nombre"];
                    $sub_array[] = $row["a_director_nombre"].' - '.$row["a_director_tel"];
                    $sub_array[] = $row["a_centro_salud"];
                    $sub_array[] = $row["a_dna"];
                    $sub_array[] = $row["a_avance"];
                    $sub_array[] = $row["a_avance2"];

                    if ($row["e1"]=="2"){
                        $sub_array[] = '<span class="label label-pill label-success">SI</span>';
                    }
                    else{
                        $sub_array[] = '<span class="label label-pill label-danger">NO</span>';
                    }
                    if ($row["e2"]=="2"){
                        $sub_array[] = '<span class="label label-pill label-success">SI</span>';
                    }
                    else{
                        $sub_array[] = '<span class="label label-pill label-danger">NO</span>';
                    }
                    if ($row["e3"]=="2"){
                        $sub_array[] = '<span class="label label-pill label-success">SI</span>';
                    }
                    else{
                        $sub_array[] = '<span class="label label-pill label-danger">NO</span>';
                    }
                    if ($row["e4"]=="2"){
                        $sub_array[] = '<span class="label label-pill label-success">SI</span>';
                    }
                    else{
                        $sub_array[] = '<span class="label label-pill label-danger">NO</span>';
                    }

                    if ($row["e1_2"]=="2"){
                        $sub_array[] = '<span class="label label-pill label-success">SI</span>';
                    }
                    else{
                        $sub_array[] = '<span class="label label-pill label-danger">NO</span>';
                    }
                    if ($row["e2_2"]=="2"){
                        $sub_array[] = '<span class="label label-pill label-success">SI</span>';
                    }
                    else{
                        $sub_array[] = '<span class="label label-pill label-danger">NO</span>';
                    }
                    if ($row["e3_2"]=="2"){
                        $sub_array[] = '<span class="label label-pill label-success">SI</span>';
                    }
                    else{
                        $sub_array[] = '<span class="label label-pill label-danger">NO</span>';
                    }
                    if ($row["e4_2"]=="2"){
                        $sub_array[] = '<span class="label label-pill label-success">SI</span>';
                    }
                    else{
                        $sub_array[] = '<span class="label label-pill label-danger">NO</span>';
                    }

                    $data[] = $sub_array;
                }

                $results = array(
                    "sEcho"=>1, 
                    "iTotalRecords"=>count($data),
                    "iTotalDisplayRecords"=>count($data),
                    "aaData"=>$data);
                echo json_encode($results);           
            }

            if($_SESSION["rol_id"]==2){       
                $datos=$unidad_a->listar_unidad_r2($_SESSION["id_usuario"]);
                $data= Array();
                foreach($datos as $row){
                    $sub_array = array();
                    /* CAMPOS EN LA TABLA: */
                    $sub_array[] = 
                    '<button type="button" onClick="editar('.$row["id_unidad_a"].');"  id="'.$row["id_usuario"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>
                    
                    <button type="button" onClick="archivo_data('.$row["id_unidad_a"].','.$row["id_estado"].');" id="btnarchivos"  
                    class="btn btn-inline btn-primary btn-sm ladda-button" ><i class="fa fa-file-text"></i></button>

                    <button type="button" onClick="archivo('.$row["id_unidad_a"].');" id="btnnuevo_archivo"  
                    class="btn btn-inline btn-info btn-sm ladda-button"><i class="fa fa-plus"></i></button>
                    
                    <button type="button" onClick="eliminar('.$row["id_unidad_a"].');"  id="'.$row["id_unidad_a"].'" 
                    class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';

                    $sub_array[] = $row["nombre_dep"];
                    $sub_array[] = $row["nombre_mun"];
                    $sub_array[] = $row["nombre_com"];
                    $sub_array[] = $row["a_nombre"];
                    $sub_array[] = $row["a_director_nombre"].' - '.$row["a_director_tel"];
                    $sub_array[] = $row["a_centro_salud"];
                    $sub_array[] = $row["a_dna"];
                    $sub_array[] = $row["a_avance"];
                    $sub_array[] = $row["a_avance2"];

                    if ($row["e1"]=="2"){
                        $sub_array[] = '<span class="label label-pill label-success">SI</span>';
                    }
                    else{
                        $sub_array[] = '<span class="label label-pill label-danger">NO</span>';
                    }
                    if ($row["e2"]=="2"){
                        $sub_array[] = '<span class="label label-pill label-success">SI</span>';
                    }
                    else{
                        $sub_array[] = '<span class="label label-pill label-danger">NO</span>';
                    }
                    if ($row["e3"]=="2"){
                        $sub_array[] = '<span class="label label-pill label-success">SI</span>';
                    }
                    else{
                        $sub_array[] = '<span class="label label-pill label-danger">NO</span>';
                    }
                    if ($row["e4"]=="2"){
                        $sub_array[] = '<span class="label label-pill label-success">SI</span>';
                    }
                    else{
                        $sub_array[] = '<span class="label label-pill label-danger">NO</span>';
                    }

                    if ($row["e1_2"]=="2"){
                        $sub_array[] = '<span class="label label-pill label-success">SI</span>';
                    }
                    else{
                        $sub_array[] = '<span class="label label-pill label-danger">NO</span>';
                    }
                    if ($row["e2_2"]=="2"){
                        $sub_array[] = '<span class="label label-pill label-success">SI</span>';
                    }
                    else{
                        $sub_array[] = '<span class="label label-pill label-danger">NO</span>';
                    }
                    if ($row["e3_2"]=="2"){
                        $sub_array[] = '<span class="label label-pill label-success">SI</span>';
                    }
                    else{
                        $sub_array[] = '<span class="label label-pill label-danger">NO</span>';
                    }
                    if ($row["e4_2"]=="2"){
                        $sub_array[] = '<span class="label label-pill label-success">SI</span>';
                    }
                    else{
                        $sub_array[] = '<span class="label label-pill label-danger">NO</span>';
                    }

                    $data[] = $sub_array;
                }

                $results = array(
                    "sEcho"=>1, 
                    "iTotalRecords"=>count($data),
                    "iTotalDisplayRecords"=>count($data),
                    "aaData"=>$data);
                echo json_encode($results);           
            }
            
        break;

        case "mostrar";
            $datos=$unidad_a->listar_unidad_id($_POST["id_unidad_a"]);  
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
                    $output["e1_2"] = $row["e1_2"];
                    $output["e2_2"] = $row["e2_2"];
                    $output["e3_2"] = $row["e3_2"];
                    $output["e4_2"] = $row["e4_2"];
                    $output["a_avance"] = $row["a_avance"];
                }
                echo json_encode($output);
            }   
        break;

        case "mostrar_p/archivo";
            $datos=$unidad_a->listar_unidad_id($_POST["id_unidad_a"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["id_unidad_a"] = $row["id_unidad_a"];
                    $output["id_estado"] = $row["id_estado"];
                    $output["a_cod"] = $row["a_cod"];
                }
                echo json_encode($output);
            }   
        break;

        case "mostrar_p/archivo_data";
            $datos=$unidad_a->listar_unidad_id($_POST["id_unidad_a"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["id_unidad_a"] = $row["id_unidad_a"];
                    $output["id_estado"] = $row["id_estado"];
                    $output["a_cod"] = $row["a_cod"];
                }
                echo json_encode($output);
            }   
        break;

        case "guardar_archivo":  
            $unidad_a->insert_archivo(
                $_POST["id_usuario"],
                $_POST["id_unidad_a"],
                $_POST["id_estado"],
                $_POST["nombre_ar"],
                $_POST["descripcion_ar"],
                $_POST["tipo_ar"],
                $FILES["archivo"]
            );
                
        break;

        case "listar_archivo":
            $datos=$unidad_a->listar_archivo($_GET['id_unidad_a'],$_GET['id_estado']);
            
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                /* CAMPOS EN LA TABLA: */
                $sub_array[] = $row["nombre_ar"];
                $sub_array[] = $row["descripcion_ar"];
                $sub_array[] = $row["tipo_ar"];
                $sub_array[] = $row["nombre_usu"]." ".$row["apellido_usu"];
                

                $sub_array[] = 
                '<a  href="../../config/descarga.php?id_archivo='.$row["id_archivo"].'">
                    <button type="button" onClick=""  id="'.$row["id_archivo"].'" class="btn btn-inline btn-primary btn-sm ladda-button">
                        <i class="fa fa-download"></i>
                    </button>
                </a>
                
                <button type="button" onClick="eliminar_archivo('.$row["id_archivo"].');"  id="'.$row["id_archivo"].'" 
                class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';

                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1, 
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
        break;

        case "eliminar":
            $unidad_a->delete_unidad($_POST["id_unidad_a"]);
        break;

        case "eliminar_archivo":
            $unidad_a->delete_archivo($_POST["id_archivo"]);
        break;

        //GRAFICOS
        
        //Total unidades A
        case "total_ua";
            $datos=$unidad_a->get_total_ua($_POST["id_usuario"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["TOTAL"] = $row["TOTAL"];
                }
                echo json_encode($output);
            }
        break;
        //Total unidades x depto
        case "un_dep_a";
            $datos=$unidad_a->get_un_dep_a($_POST["id_usuario"]);  
            echo json_encode($datos);
        break;
        //Total unidades x fuente de financiamiento
        case "un_fue_a";
            $datos=$unidad_a->get_un_fue_a($_POST["id_usuario"]);  
            echo json_encode($datos);
        break;
        //Total unidades x municipio
        case "un_mun_a";
            $datos=$unidad_a->get_un_mun_a($_POST["id_usuario"]);  
            echo json_encode($datos);
        break;
        //Porcentaje de avance x e y x dpto
        case "av_un_dep_a";
            $datos=$unidad_a->get_av_un_dep_a($_POST["id_usuario"]);  
            echo json_encode($datos);
        break;
        //Total estado 1 x
        case "estado1";
            $datos=$unidad_a->get_estado1($_POST["id_usuario"]);  
            echo json_encode($datos);
        break;
        //Total estado 2 x
        case "estado2";
            $datos=$unidad_a->get_estado2($_POST["id_usuario"]);  
            echo json_encode($datos);
        break;
        //Total estado 3 x
        case "estado3";
            $datos=$unidad_a->get_estado3($_POST["id_usuario"]);  
            echo json_encode($datos);
        break;
        //Total estado 4 x
        case "estado4";
            $datos=$unidad_a->get_estado4($_POST["id_usuario"]);  
            echo json_encode($datos);
        break;

        //Total estado 1 y
        case "estado1_2";
            $datos=$unidad_a->get_estado1_2($_POST["id_usuario"]);  
            echo json_encode($datos);
        break;
        //Total estado 2 y
        case "estado2_2";
            $datos=$unidad_a->get_estado2_2($_POST["id_usuario"]);  
            echo json_encode($datos);
        break;
        //Total estado 3 y
        case "estado3_2";
            $datos=$unidad_a->get_estado3_2($_POST["id_usuario"]);  
            echo json_encode($datos);
        break;
        //Total estado 4 y
        case "estado4_2";
            $datos=$unidad_a->get_estado4_2($_POST["id_usuario"]);  
            echo json_encode($datos);
        break;
    }
?> 