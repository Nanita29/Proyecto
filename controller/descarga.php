<?php
  require_once("../config/conexion.php"); 
  $conexion = new Conectar();
  $idusuario = $_SESSION["id_usuario"];
  if(isset($_SESSION["id_usuario"])){ 

    $consulta_archivo = $conexion->Conexion("select ruta_ar from archivo where id = '".$id_archivo."'");  
   $archivo = $conexion->Conexion("select nombre_ar from archivo where id = '".$id_archivo."'");   
    $ruta =$consulta_archivo[0]['ruta_ar']; //ruta completa
    
     /* $split = explode("/", $ruta);
    $archivo=$split[5]; //solo el archivo */

    print_r($archivo);

        if (is_file($ruta)&&$idusuario){
            header('Content-Type: application/force-download');
            header('Content-Disposition: attachment; filename='.$archivo);
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: '.filesize($ruta));
            readfile($ruta);
        }
        else{
            echo "<b>El archivo no existe</b>";
        }




  } 
  else {
    header("Location:".Conectar::ruta()."index.php");
  }
?>