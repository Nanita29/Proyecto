<?php
    require_once("../config/conexion.php");
    require_once("../models/Dde.php");
    $dde = new Dde();

    switch($_GET["op"]){
        case "guardaryeditar":

            if(empty($_POST["id_dde"])){       
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
                    $_POST["d_avance"]);            }
            else {print_r(
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
                    $_POST["e4"]));            }
            
           


        break;

        case "listar":

            if($_SESSION["rol_id"]==1){       
                $datos=$dde->listar_dde();
                $data= Array();
                foreach($datos as $row){
                    $sub_array = array();
                    /* CAMPOS EN LA TABLA: */
                    $sub_array[] = 
                    '<button type="button" onClick="editar('.$row["id_dde"].');"  id="'.$row["id_usuario"].'" 
                    class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>
                    
                    <button type="button" onClick="archivo_data('.$row["id_dde"].','.$row["id_estado"].');" id="btnarchivos"  
                    class="btn btn-inline btn-primary btn-sm ladda-button" ><i class="fa fa-file-text"></i></button>

                    <button type="button" onClick="archivo('.$row["id_dde"].');" id="btnnuevo_archivo"  
                    class="btn btn-inline btn-info btn-sm ladda-button"><i class="fa fa-plus"></i></button>
                    
                    <button type="button" onClick="eliminar('.$row["id_dde"].');"  id="'.$row["id_dde"].'" 
                    class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
                    $sub_array[] = $row["nombre_dep"];
                    $sub_array[] = $row["nombre_mun"];
                    $sub_array[] = $row["d_nombre"];
                    $sub_array[] = $row["d_director_nombre"].' - '.$row["d_director_tel"];
                    $sub_array[] = $row["d_avance"];
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
                $datos=$dde->listar_dde();
                $data= Array();
                foreach($datos as $row){
                    $sub_array = array();
                    /* CAMPOS EN LA TABLA: */
                    $sub_array[] = 
                    '<button type="button" onClick="archivo_data('.$row["id_dde"].','.$row["id_estado"].');" id="btnarchivos"  
                    class="btn btn-inline btn-primary btn-sm ladda-button" ><i class="fa fa-file-text"></i></button>';
                    $sub_array[] = $row["nombre_dep"];
                    $sub_array[] = $row["nombre_mun"];
                    $sub_array[] = $row["d_nombre"];
                    $sub_array[] = $row["d_director_nombre"].' - '.$row["d_director_tel"];
                    $sub_array[] = $row["d_avance"];
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
                $datos=$dde->listar_dde_r2($_SESSION["id_usuario"]);
                $data= Array();
                foreach($datos as $row){
                    $sub_array = array();
                    /* CAMPOS EN LA TABLA: */
                    $sub_array[] = 
                    '<button type="button" onClick="editar('.$row["id_dde"].');"  id="'.$row["id_usuario"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>
                    
                    <button type="button" onClick="archivo_data('.$row["id_dde"].','.$row["id_estado"].');" id="btnarchivos"  
                    class="btn btn-inline btn-primary btn-sm ladda-button" ><i class="fa fa-file-text"></i></button>

                    <button type="button" onClick="archivo('.$row["id_dde"].');" id="btnnuevo_archivo"  
                    class="btn btn-inline btn-info btn-sm ladda-button"><i class="fa fa-plus"></i></button>
                    
                    <button type="button" onClick="eliminar('.$row["id_dde"].');"  id="'.$row["id_dde"].'" 
                class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
                    $sub_array[] = $row["nombre_dep"];
                    $sub_array[] = $row["nombre_mun"];
                    $sub_array[] = $row["d_nombre"];
                    $sub_array[] = $row["d_director_nombre"].' - '.$row["d_director_tel"];
                    $sub_array[] = $row["d_avance"];
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
            $datos=$dde->listar_dde_id($_POST["id_dde"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["id_dde"] = $row["id_dde"];
                    $output["id_municipio"] = $row["id_municipio"];
                    $output["id_estado"] = $row["id_estado"];
                    $output["id_usuario"] = $row["id_usuario"];
                    $output["d_cod"] = $row["d_cod"];
                    $output["d_nombre"] = $row["d_nombre"];
                    $output["d_director_nombre"] = $row["d_director_nombre"];
                    $output["d_director_tel"] = $row["d_director_tel"];
                    $output["d_datos"] = $row["d_datos"];
                    $output["e1"] = $row["e1"];
                    $output["e2"] = $row["e2"];
                    $output["e3"] = $row["e3"];
                    $output["e4"] = $row["e4"];
                    $output["d_avance"] = $row["d_avance"];
                }
                echo json_encode($output);
            }   
        break;

        case "mostrar_p/archivo";
            $datos=$dde->listar_dde_id($_POST["id_dde"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["id_dde"] = $row["id_dde"];
                    $output["id_estado"] = $row["id_estado"];
                    $output["d_cod"] = $row["d_cod"];
                }
                echo json_encode($output);
            }   
        break;

        case "mostrar_p/archivo_data";
            $datos=$dde->listar_dde_id($_POST["id_dde"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["id_dde"] = $row["id_dde"];
                    $output["id_estado"] = $row["id_estado"];
                    $output["d_cod"] = $row["d_cod"];
                }
                echo json_encode($output);
            }   
        break;

        case "guardar_archivo":  
            $dde->insert_archivo(
                $_POST["id_usuario"],
                $_POST["id_dde"],
                $_POST["id_estado"],
                $_POST["nombre_ar"],
                $_POST["descripcion_ar"],
                $_POST["tipo_ar"],
                $FILES["archivo"]
            );
                
        break;

        case "listar_archivo":
            $datos=$dde->listar_archivo($_GET['id_dde'],$_GET['id_estado']);
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

                /* $sub_array[] = '<a href="..\Cambio_Dde\?DATA='.$row["id_dde"].','.$row["id_municipio"].'">
                <button type="button" onClick=""  id="'.$row["id_dde"].'" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-edit"></i></button></a>';

                $sub_array[] = '<a href="..\Consultar_Archivos\?DATA='.$row["id_dde"].','.$row["id_estado"].'"> 
                <button type="button" onClick=""  id="'.$row["id_dde"].'" class="btn btn-inline btn-primary btn-sm ladda-button" ><i class="fa fa-file"></i></button></a>';
                 */

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
            $dde->delete_dde($_POST["id_dde"]);
        break;

        case "eliminar_archivo":
            $dde->delete_archivo($_POST["id_archivo"]);
        break;

        //GRAFICOS
        
        //Total direciones
        case "total_dde";
            $datos=$dde->get_total_dde($_POST["id_usuario"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["TOTAL"] = $row["TOTAL"];
                }
                echo json_encode($output);
            }
        break;
        //Total direcciones x depto
        case "dde_dep";
            $datos=$dde->get_dde_dep($_POST["id_usuario"]);  
            echo json_encode($datos);
        break;
        //Porcentaje de avance x e y x dpto
        case "av_dde_dep";
            $datos=$dde->get_av_dde_dep($_POST["id_usuario"]);  
            echo json_encode($datos);
        break;
        //Total direcciones x municipio
        case "dde_mun";
            $datos=$dde->get_dde_mun($_POST["id_usuario"]);  
            echo json_encode($datos);
        break;
        //Total estado 1 
        case "estado1";
            $datos=$dde->get_estado1($_POST["id_usuario"]);  
            echo json_encode($datos);
        break;
        //Total estado 2 
        case "estado2";
            $datos=$dde->get_estado2($_POST["id_usuario"]);  
            echo json_encode($datos);
        break;
        //Total estado 3 
        case "estado3";
            $datos=$dde->get_estado3($_POST["id_usuario"]);  
            echo json_encode($datos);
        break;
        //Total estado 4 
        case "estado4";
            $datos=$dde->get_estado4($_POST["id_usuario"]);  
            echo json_encode($datos);
        break;
    }
?> 