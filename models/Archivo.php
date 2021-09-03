<?php
require_once("../config/conexion.php");
    class Archivo extends Conectar{

        public function insert_archivo($id_usuario,$id_item,$id_estado,$nombre_ar,$descripcion_ar,$tipo_ar,$archivo){
            $conectar= parent::conexion();
            parent::set_names();

                $extension = end(explode('.', $_FILES["archivo"]['name']));
                    if($extension == null || $extension == '')
                    {
                        $extension = "txt";
                        //$id_estado = 5;
                        $id_usuario = $_SESSION["id_usuario"];
                        $nombre_ar = "ARCHIVO DAÑADO";
                    }
                date_default_timezone_set('America/Mexico_City');
                //$nombre_ar= $nombre_ar."_".date('dmYHis').".".end(explode('.', $_FILES["archivo"]['name']));
                $archivo = $_FILES["archivo"]["tmp_name"];
                $directorio = '../../../archivos/';
                    if (!file_exists($directorio)) {
                        mkdir($directorio, 0777, true);
                    }
                $ruta_ar= $directorio.$nombre_ar."_".date('dmYHis').".".$extension;
                
                move_uploaded_file($_FILES["archivo"]["tmp_name"],$ruta_ar);



            $sql="INSERT INTO archivo (id_usuario,id_item,id_tabla,nombre_ar,descripcion_ar,tipo_ar,ruta_ar,fecha_crea_ar,fecha_mod_ar,
            fecha_elim_ar,estado) VALUES ('".$id_usuario."','".$id_item."','".$id_estado."','".$nombre_ar."','".$descripcion_ar."',
           '".$tipo_ar."', '".$ruta_ar."',now(),NULL,NULL,'0');";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            print_r ($sql);
            return $resultado=$sql->fetchAll();
        } 

        public function listar_archivo($id_item,$id_estado){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT archivo.id_archivo, archivo.id_item, archivo.id_tabla, archivo.nombre_ar, archivo.descripcion_ar, archivo.tipo_ar,
            archivo.ruta_ar, usuario.nombre_usu,usuario.apellido_usu  
            FROM  archivo, usuario WHERE  archivo.id_usuario = usuario.id_usuario 
            AND archivo.id_item = $id_item AND archivo.id_tabla = $id_estado AND archivo.estado = 0;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
            print_r ($sql);
        } 

        /* public function getRuta2($id_archivo){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM archivo  WHERE id_archivo = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_archivo);
            $sql->execute();
            print_r ($sql);
            return $resultado=$sql->fetchAll();
        } */

        public function getNombre($id_archivo){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT nombre_ar FROM archivo  WHERE id_archivo = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_archivo);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function delete_archivo($id_archivo){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE archivo  SET fecha_elim_ar=now(),estado=1,us_elim='".$_SESSION["id_usuario"]."'
             WHERE id_archivo='".$id_archivo."';"; 
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        } 


        
    }
    
?>