<?php
    require_once("../config/conexion.php");
    require_once("../models/Usuario.php");
    $usuario = new Usuario();

    switch($_GET["op"]){
        case "guardaryeditar":
            if(empty($_POST["id_usuario"])){       
                $usuario->insert_usuario($_POST["nombre_usu"],$_POST["apellido_usu"],$_POST["usu_correo"],$_POST["usu_pass"],$_POST["rol_id"]);     
            }
            else {
                $usuario->update_usuario($_POST["id_usuario"],$_POST["nombre_usu"],$_POST["apellido_usu"],$_POST["usu_correo"],$_POST["usu_pass"],$_POST["rol_id"]);
            }
        break;

        case "listar":
            $datos=$usuario->get_usuario();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["nombre_usu"];
                $sub_array[] = $row["apellido_usu"];
                $sub_array[] = $row["usu_correo"];

                if ($row["rol_id"]=="1"){
                    $sub_array[] = '<span class="label label-pill label-success">Administrador</span>';
                }
                if ($row["rol_id"]=="2"){
                    $sub_array[] = '<span class="label label-pill label-info">Rol 2</span>';
                }
                if ($row["rol_id"]=="3"){
                    $sub_array[] = '<span class="label label-pill label-secondary">Rol 3</span>';
                }

                $sub_array[] = '<button type="button" onClick="editar('.$row["id_usuario"].');"  id="'.$row["id_usuario"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["id_usuario"].');"  id="'.$row["id_usuario"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
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
            $usuario->delete_usuario($_POST["id_usuario"]);
        break;

        case "mostrar";
            $datos=$usuario->get_usuario_x_id($_POST["id_usuario"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["id_usuario"] = $row["id_usuario"];
                    $output["nombre_usu"] = $row["nombre_usu"];
                    $output["apellido_usu"] = $row["apellido_usu"];
                    $output["usu_correo"] = $row["usu_correo"];
                    $output["usu_pass"] = $row["usu_pass"];
                    $output["rol_id"] = $row["rol_id"];
                }
                echo json_encode($output);
            }   
        break;
//GRAFICOS
        case "total_ua";
            $datos=$usuario->get_total_ua($_POST["id_usuario"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["TOTAL"] = $row["TOTAL"];
                }
                echo json_encode($output);
            }
        break;

        case "total_ub";
            $datos=$usuario->get_total_ub($_POST["id_usuario"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["TOTAL"] = $row["TOTAL"];
                }
                echo json_encode($output);
            }
        break;

        case "total_dde";
            $datos=$usuario->get_total_dde($_POST["id_usuario"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["TOTAL"] = $row["TOTAL"];
                }
                echo json_encode($output);
            }
        break;

        case "total_m";
            $datos=$usuario->get_total_m($_POST["id_usuario"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["TOTAL"] = $row["TOTAL"];
                }
                echo json_encode($output);
            }
        break;

        case "unidades_ab";
            $datos=$usuario->get_unidades_ab($_POST["id_usuario"]);  
            echo json_encode($datos);
        break;

        case "total_archivo";
            $datos=$usuario->get_total_archivo($_POST["id_usuario"]);  
            echo json_encode($datos);
        break;

       /* 
        

        case "totalabierto";
            $datos=$usuario->get_usuario_totalabierto_x_id($_POST["id_usuario"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["TOTAL"] = $row["TOTAL"];
                }
                echo json_encode($output);
            }
        break;

        case "totalcerrado";
            $datos=$usuario->get_usuario_totalcerrado_x_id($_POST["id_usuario"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["TOTAL"] = $row["TOTAL"];
                }
                echo json_encode($output);
            }
        break;

        case "grafico";
            $datos=$usuario->get_usuario_grafico($_POST["id_usuario"]);  
            echo json_encode($datos);
        break; */

 
    }
?>