<?php
    require_once("../config/conexion.php");
    require_once("../models/Departamento.php");
    $categoria = new Departamento();

    switch($_GET["op"]){
        case "combo":
            $datos = $categoria->get_departamento();
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                { 
                    if($_GET["id_sel"]==$row['id_departamento']){
                        $html.= "<option value='".$row['id_departamento']."'selected>".$row['nombre_dep'].', '.$row['descripcion_dep']."</option>";

                    }
                    else{
                        $html.= "<option value='".$row['id_departamento']."'>".$row['nombre_dep'].', '.$row['descripcion_dep']."</option>";
                    }
                    
                   // $html.= "<option value=''>".$row['id_departamento']."</option>";
                    

                }
                echo $html;
            }
        break;

        
    }
?>