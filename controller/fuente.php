<?php
    require_once("../config/conexion.php");
    require_once("../models/Fuente.php");
    $fuente = new Fuente();

    switch($_GET["op"]){
        case "insert":
            $fuente->insert_fuente(
                $_POST["nombre_fue"],
                $_POST["descripcion_fue"]);
        break;

        case "listar":
            $datos=$fuente->listar_fuente();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                /* CAMPOS EN LA TABLA: */
                $sub_array[] = $row["nombre_fue"];
                $sub_array[] = $row["descripcion_fue"];


                $sub_array[] = '<button type="button" onClick="ver('.$row["id_fuente"].');"  id="'.$row["id_fuente"].'" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
        break;

        case "combo":
            $datos = $fuente->get_fuente();
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                        $html.= "<option value='".$row['id_fuente']."'>".$row['nombre_fue']."</option>";
/*                     $html.= "<option value=''>".$row['id_fuente'].'. '.$row['nombre'].', '.$row['departamento']."</option>";
 */                }
                echo $html;
            }
        break;
    }
?>