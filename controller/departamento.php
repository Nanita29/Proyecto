<?php
    require_once("../config/conexion.php");
    require_once("../models/Departamento.php");
    $categoria = new Departamento();

    switch($_GET["op"]){
        case "combo":
            if($_SESSION["rol_id"]==1){       
                $datos = $categoria->get_departamento();
                if(is_array($datos)==true and count($datos)>0){
                    foreach($datos as $row)
                    { 
                        if($_GET["id_sel"]==$row['id_departamento']){
                            $html.= "<option value='".$row['id_departamento']."'selected>".$row['nombre_dep']."</option>";

                        }
                        else{
                            $html.= "<option value='".$row['id_departamento']."'>".$row['nombre_dep']."</option>";
                        }
                    }
                    echo $html;
                }            
            }
            if($_SESSION["rol_id"]==2){       
                $datos = $categoria->get_departamento_r2($_SESSION["id_usuario"]);
                if(is_array($datos)==true and count($datos)>0){
                    foreach($datos as $row)
                    { 
                        if($_GET["id_sel"]==$row['id_departamento']){
                            $html.= "<option value='".$row['id_departamento']."'selected>".$row['nombre_dep']."</option>";

                        }
                        else{
                            $html.= "<option value='".$row['id_departamento']."'>".$row['nombre_dep']."</option>";
                        }
                    }
                    echo $html;
                }            
            }

        break;

        
    }
?>