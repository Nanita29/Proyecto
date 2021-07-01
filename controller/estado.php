<?php
    require_once("../config/conexion.php");
    require_once("../models/Estado.php");
    $estado = new Estado();

    switch($_GET["op"]){
        case "combo":
            $datos = $estado->get_estado();
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                        $html.= "<option value='".$row['id_estado']."'>".$row['tipo']."</option>";
/*                     $html.= "<option value=''>".$row['id_estado'].'. '.$row['nombre'].', '.$row['departamento']."</option>";
 */                }
                echo $html;
            }
        break;
    }
?>