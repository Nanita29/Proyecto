<?php
    require_once("../config/conexion.php");
    require_once("../models/Municipio.php");
    $categoria = new Municipio();

    switch($_GET["op"]){
        case "combo":
            $datos = $categoria->get_municipio();
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    if($_GET["id_sel"]==$row['id_municipio']){
                        $html.= "<option value='".$row['id_municipio']."'selected>".$row['nombre_mun'].', '.$row['nombre_dep']."</option>";

                    }
                    else{
                        $html.= "<option value='".$row['id_municipio']."'>".$row['nombre_mun'].', '.$row['nombre_dep']."</option>";
                    }
                    
                   // $html.= "<option value=''>".$row['id_municipio']."</option>";
                    

                }
                echo $html;
            }
        break;

        
    }
?>