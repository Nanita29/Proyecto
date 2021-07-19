<?php
    require_once("../config/conexion.php");
    require_once("../models/Archivo.php");
    $archivo = new Archivo();

    switch($_GET["op"]){
        case "guardar_archivo":  
            $archivo->insert_archivo(
                $_POST["id_usuario"],
                $_POST["id_item"],
                $_POST["id_estado"],
                $_POST["nombre_ar"],
                $_POST["descripcion_ar"],
                $_POST["tipo_ar"],
                $FILES["archivo"]
            );
                
        break;

        case "listar_archivo":
            $datos=$archivo->listar_archivo($_GET['id_item'],$_GET['id_estado']);
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                /* CAMPOS EN LA TABLA: */
                $sub_array[] = $row["nombre_ar"];
                $sub_array[] = $row["descripcion_ar"];
                $sub_array[] = $row["tipo_ar"];
                $sub_array[] = $row["nombre_usu"]." ".$row["apellido_usu"];
                

                $sub_array[] = 
                '<a download="'.$row["ruta_ar"].'" href="../'.$row["ruta_ar"].'">
                    <button type="button" onClick=""  id="'.$row["ruta_ar"].'" class="btn btn-inline btn-primary btn-sm ladda-button">
                        <i class="fa fa-download"></i>
                    </button>
                </a>';

                /* '
                    <button type="button" href="descarga.php?id='.$row["id_archivo"].'"  id="'.$row["ruta_ar"].'" class="btn btn-inline btn-primary btn-sm ladda-button">
                        <i class="fa fa-download"></i>
                    </button>
                ' */ 



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