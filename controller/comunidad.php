<?php
    require_once("../config/conexion.php");
    require_once("../models/Comunidad.php");
    $categoria = new Comunidad();

    switch($_GET["op"]){
        case "combo":
            if($_SESSION["rol_id"]==1){       
                $datos = $categoria->get_comunidad();
                if(is_array($datos)==true and count($datos)>0){
                    foreach($datos as $row)
                    {
                        if($_GET["id_sel"]==$row['id_comunidad']){
                            $html.= "<option value='".$row['id_comunidad']."'selected>".$row['nombre_com'].', '.$row['nombre_mun'].', '.$row['nombre_dep']."</option>";

                        }
                        else{
                            $html.= "<option value='".$row['id_comunidad']."'>".$row['nombre_com'].', '.$row['nombre_mun'].', '.$row['nombre_dep']."</option>";
                        }

                    }
                    echo $html;
                }           
            }

            if($_SESSION["rol_id"]==2){       
                $datos = $categoria->get_comunidad_r2($_SESSION["id_usuario"]);
                if(is_array($datos)==true and count($datos)>0){
                    foreach($datos as $row)
                    {
                        if($_GET["id_sel"]==$row['id_comunidad']){
                            $html.= "<option value='".$row['id_comunidad']."'selected>".$row['nombre_com'].', '.$row['nombre_dep']."</option>";

                        }
                        else{
                            $html.= "<option value='".$row['id_comunidad']."'>".$row['nombre_com'].', '.$row['nombre_dep']."</option>";
                        }

                    }
                    echo $html;
                }           
            }
            
        break;

        
    }
?>