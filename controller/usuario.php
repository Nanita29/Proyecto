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

        case "agregar_dpto":
            $usuario->agregar_dpto($_POST["id_usuario2"],$_POST["id_departamento"]);
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
                    $sub_array[] = '<span class="label label-pill label-info">Técnico</span>';
                }
                if ($row["rol_id"]=="3"){
                    $sub_array[] = '<span class="label label-pill label-secondary">Lectura</span>';
                }

                
                if ($row["rol_id"]=="2"){
                    $sub_array[] = 
                '<button type="button" onClick="editar('.$row["id_usuario"].');"  id="'.$row["id_usuario"].'" 
                class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>

                <button type="button" onClick="departamento_data('.$row["id_usuario"].');"  id="'.$row["id_usuario"].'" 
                class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-globe"></i></button>

                <button type="button" onClick="departamento('.$row["id_usuario"].');"  id="'.$row["id_usuario"].'" 
                class="btn btn-inline btn-info btn-sm ladda-button"><i class="fa fa-plus"></i></button>
                
                <button type="button" onClick="eliminar('.$row["id_usuario"].');"  id="'.$row["id_usuario"].'" 
                class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
                
                }
                else{
                    $sub_array[] = 
                    '<button type="button" onClick="editar('.$row["id_usuario"].');"  id="'.$row["id_usuario"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>
                    
                    <button type="button" onClick="eliminar('.$row["id_usuario"].');"  id="'.$row["id_usuario"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
                }

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

        case "listar_dpto":
            $datos=$usuario->listar_dpto($_GET['id_usuario']);
            
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                /* CAMPOS EN LA TABLA: */
                $sub_array[] = $row["nombre_dep"];

                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1, 
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
        break;
        

        

        

        

        


        

        

        

        

        

        

        

        


 
    }
?>