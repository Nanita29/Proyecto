<?php
    require_once("../config/conexion.php");
    require_once("../models/Miembro.php");
    $miembro = new Miembro();

    switch($_GET["op"]){


        case "guardaryeditar":

            if(empty($_POST["id_miembro"])){       
                $miembro->insert_miembro(
                    $_POST["id_municipio"],
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
                    $_POST["m_avance"]);            }
            else {print_r(
                $miembro->update_miembro(
                    $_POST["id_miembro"],
                    $_POST["id_municipio"],
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
                    $_POST["e6"]));            }
            
           


        break;

        case "listar":

            if($_SESSION["rol_id"]==1){       
                $datos=$miembro->listar_miembro();
                $data= Array();
                foreach($datos as $row){
                    $sub_array = array();
                    /* CAMPOS EN LA TABLA: */
                    $sub_array[] = 
                    '<button type="button" onClick="editar('.$row["id_miembro"].');"  id="'.$row["id_usuario"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>
                    
                    <button type="button" onClick="archivo_data('.$row["id_miembro"].','.$row["id_estado"].');" id="btnarchivos"  
                    class="btn btn-inline btn-primary btn-sm ladda-button" ><i class="fa fa-file-text"></i></button>

                    <button type="button" onClick="archivo('.$row["id_miembro"].');" id="btnnuevo_archivo"  
                    class="btn btn-inline btn-info btn-sm ladda-button"><i class="fa fa-plus"></i></button>
                    
                    <button type="button" onClick="eliminar('.$row["id_miembro"].');"  id="'.$row["id_miembro"].'" 
                    class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';

                    $sub_array[] = $row["nombre_dep"];
                    $sub_array[] = $row["nombre_mun"];
                    $sub_array[] = $row["m_nombre"];
                    $sub_array[] = $row["m_contactos"];
                    $sub_array[] = $row["m_observacion"];
                    $sub_array[] = $row["m_avance"];

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
                    if ($row["e5"]=="2"){
                        $sub_array[] = '<span class="label label-pill label-success">SI</span>';
                    }
                    else{
                        $sub_array[] = '<span class="label label-pill label-danger">NO</span>';
                    }
                    if ($row["e6"]=="2"){
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
                $datos=$miembro->listar_miembro();
                $data= Array();
                foreach($datos as $row){
                    $sub_array = array();
                    /* CAMPOS EN LA TABLA: */
                    $sub_array[] = 
                    '<button type="button" onClick="archivo_data('.$row["id_miembro"].','.$row["id_estado"].');" id="btnarchivos"  
                    class="btn btn-inline btn-primary btn-sm ladda-button" ><i class="fa fa-file-text"></i></button>';
                    
                    $sub_array[] = $row["nombre_dep"];
                    $sub_array[] = $row["nombre_mun"];
                    $sub_array[] = $row["m_nombre"];
                    $sub_array[] = $row["m_contactos"];
                    $sub_array[] = $row["m_observacion"];
                    $sub_array[] = $row["m_avance"];

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
                    if ($row["e5"]=="2"){
                        $sub_array[] = '<span class="label label-pill label-success">SI</span>';
                    }
                    else{
                        $sub_array[] = '<span class="label label-pill label-danger">NO</span>';
                    }
                    if ($row["e6"]=="2"){
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
                $datos=$miembro->listar_miembro_r2($_SESSION["id_usuario"]);
                $data= Array();
                foreach($datos as $row){
                    $sub_array = array();
                    /* CAMPOS EN LA TABLA: */
                    $sub_array[] = 
                    '<button type="button" onClick="editar('.$row["id_miembro"].');"  id="'.$row["id_usuario"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>
                    
                    <button type="button" onClick="archivo_data('.$row["id_miembro"].','.$row["id_estado"].');" id="btnarchivos"  
                    class="btn btn-inline btn-primary btn-sm ladda-button" ><i class="fa fa-file-text"></i></button>

                    <button type="button" onClick="archivo('.$row["id_miembro"].');" id="btnnuevo_archivo"  
                    class="btn btn-inline btn-info btn-sm ladda-button"><i class="fa fa-plus"></i></button>
                    
                    <button type="button" onClick="eliminar('.$row["id_miembro"].');"  id="'.$row["id_miembro"].'" 
                    class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
                    $sub_array[] = $row["nombre_dep"];
                    $sub_array[] = $row["nombre_mun"];
                    $sub_array[] = $row["m_nombre"];
                    $sub_array[] = $row["m_contactos"];
                    $sub_array[] = $row["m_observacion"];
                    $sub_array[] = $row["m_avance"];

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
                    if ($row["e5"]=="2"){
                        $sub_array[] = '<span class="label label-pill label-success">SI</span>';
                    }
                    else{
                        $sub_array[] = '<span class="label label-pill label-danger">NO</span>';
                    }
                    if ($row["e6"]=="2"){
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
            $datos=$miembro->listar_miembro_id($_POST["id_miembro"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["id_miembro"] = $row["id_miembro"];
                    $output["id_municipio"] = $row["id_municipio"];
                    $output["id_estado"] = $row["id_estado"];
                    $output["id_usuario"] = $row["id_usuario"];
                    $output["m_cod"] = $row["m_cod"];
                    $output["m_nombre"] = $row["m_nombre"];
                    $output["m_contactos"] = $row["m_contactos"];
                    $output["m_observacion"] = $row["m_observacion"];
                    $output["e1"] = $row["e1"];
                    $output["e2"] = $row["e2"];
                    $output["e3"] = $row["e3"];
                    $output["e4"] = $row["e4"];
                    $output["e5"] = $row["e5"];
                    $output["e6"] = $row["e6"];
                    $output["m_avance"] = $row["m_avance"];
                }
                echo json_encode($output);
            }   
        break; 

        case "mostrar_p/archivo";
            $datos=$miembro->listar_miembro_id($_POST["id_miembro"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["id_miembro"] = $row["id_miembro"];
                    $output["id_estado"] = $row["id_estado"];
                    $output["m_cod"] = $row["m_cod"];
                }
                echo json_encode($output);
            }   
        break;

        case "mostrar_p/archivo_data";
            $datos=$miembro->listar_miembro_id($_POST["id_miembro"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["id_miembro"] = $row["id_miembro"];
                    $output["id_estado"] = $row["id_estado"];
                    $output["m_cod"] = $row["m_cod"];
                }
                echo json_encode($output);
            }   
        break;

        case "guardar_archivo":  
            $miembro->insert_archivo(
                $_POST["id_usuario"],
                $_POST["id_miembro"],
                $_POST["id_estado"],
                $_POST["nombre_ar"],
                $_POST["descripcion_ar"],
                $_POST["tipo_ar"],
                $FILES["archivo"]
            );
                
        break;

        case "listar_archivo":
            $datos=$miembro->listar_archivo($_GET['id_miembro'],$_GET['id_estado']);
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
            $miembro->delete_miembro($_POST["id_miembro"]);
        break;

        case "eliminar_archivo":
            $miembro->delete_archivo($_POST["id_archivo"]);
        break;

        //GRAFICOS
        
        //Total direciones
        case "total_m";
            $datos=$miembro->get_total_m($_POST["id_usuario"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["TOTAL"] = $row["TOTAL"];
                }
                echo json_encode($output);
            }
        break;
        //Total unidades x depto
        case "m_dep";
            $datos=$miembro->get_m_dep($_POST["id_usuario"]);  
            echo json_encode($datos);
        break;
        //Porcentaje de avance x e y x dpto
        case "av_m_dep";
            $datos=$miembro->get_av_m_dep($_POST["id_usuario"]);  
            echo json_encode($datos);
        break;
        //Total estado 1 
        case "estado1";
            $datos=$miembro->get_estado1($_POST["id_usuario"]);  
            echo json_encode($datos);
        break;
        //Total estado 2 
        case "estado2";
            $datos=$miembro->get_estado2($_POST["id_usuario"]);  
            echo json_encode($datos);
        break;
        //Total estado 3 
        case "estado3";
            $datos=$miembro->get_estado3($_POST["id_usuario"]);  
            echo json_encode($datos);
        break;
        //Total estado 4 
        case "estado4";
            $datos=$miembro->get_estado4($_POST["id_usuario"]);  
            echo json_encode($datos);
        break;
        //Total estado 5 
        case "estado5";
            $datos=$miembro->get_estado5($_POST["id_usuario"]);  
            echo json_encode($datos);
        break;
        //Total estado 6 
        case "estado6";
            $datos=$miembro->get_estado6($_POST["id_usuario"]);  
            echo json_encode($datos);
        break;
    }
?> 