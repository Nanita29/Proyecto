<?php
  require("conexion.php"); 
  require_once("../models/Archivo.php");
  $conexion = new Conectar();
  $archivo = new Archivo();
  $id_usuario = $_SESSION["id_usuario"];
  extract($_GET);


  if(isset($_SESSION["id_usuario"])){ 

     $consulta_archivo = $conexion->getRuta("SELECT ruta_ar FROM archivo WHERE id_archivo = '".$id_archivo."'");
     $nombre_archivo = $conexion->getRuta("SELECT nombre_ar FROM archivo WHERE id_archivo = '".$id_archivo."'");
     $ruta = $consulta_archivo[0]['ruta_ar'];
     $nombre_ar = $nombre_archivo[0]['nombre_ar'];
     

   // $ruta = '../../../archivos/b_02092021140341.pdf';    
    $split = explode("/",$ruta);
    $archivo=$split[4];
    $split2 = explode(".",$archivo);
    $ext=$split2[1];

    $nombre = $nombre_ar.".".$ext;
    

      if (file_exists($ruta)){
          header('Content-Type: application/force-download');
          header('Content-Disposition: attachment; filename="'.$nombre.'"');
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