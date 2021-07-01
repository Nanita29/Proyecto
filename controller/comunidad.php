<?php
    require_once("../config/conexion.php");
    require_once("../models/Comunidad.php");
    $categoria = new Comunidad();

    switch($_GET["op"]){
        case "combo":
            $datos = $categoria->get_comunidad();
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                   // $html.= "<option value=''>".$row['id_comunidad']."</option>";
                    $html.= "<option value='".$row['id_comunidad']."'>".$row['nombre_com'].', '.$row['nombre_dep']."</option>";
                }
                echo $html;
            }
        break;
    }
?>