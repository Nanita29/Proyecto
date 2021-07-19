<?php
    class Unidad_B extends Conectar{

        public function insert_unidad($id_comunidad,$id_estado,$id_fuente,$id_usuario,$a_cod,$a_nombre,$a_director_nombre,
        $a_director_tel,$a_dna,$a_tecnico,$a_centro_salud,$a_docen_ini_v,$a_docen_ini_m,$a_docen_pri_v,$a_docen_pri_m,
        $a_docen_sec_v,$a_docen_sec_m,$a_est_ini_v,$a_est_ini_m,$a_est_pri_v,$a_est_pri_m,$a_est_sec_v,$a_est_sec_m,$a_per_med_v,
        $a_per_med_m,$a_per_enf_v,$a_per_enf_m,$e1,$e2,$e3,$e4){

            print_r($a_cod);
            $conectar= parent::conexion();
            parent::set_names();

            $sql="INSERT INTO unidad_educativa_a (id_comunidad, id_estado, id_fuente, id_usuario, 
            a_cod, a_nombre, a_director_nombre, a_director_tel, a_dna, a_tecnico, a_centro_salud, a_docen_ini_v, a_docen_ini_m, a_docen_pri_v,
            a_docen_pri_m, a_docen_sec_v, a_docen_sec_m, a_est_ini_v, a_est_ini_m, a_est_pri_v, a_est_pri_m, a_est_sec_v, a_est_sec_m, 
            a_per_med_v, a_per_med_m, a_per_enf_v, a_per_enf_m, a_fecha_crea, a_fecha_mod, a_fecha_elim, e1, e2, e3, e4, a_estado) VALUES 
            ('".$id_comunidad."','3','".$id_fuente."','".$id_usuario."',
            '".$a_cod."','".$a_nombre."','".$a_director_nombre."','".$a_director_tel."',
            '".$a_dna."','".$a_tecnico."','".$a_centro_salud."','".$a_docen_ini_v."','".$a_docen_ini_m."',
            '".$a_docen_pri_v."','".$a_docen_pri_m."','".$a_docen_sec_v."','".$a_docen_sec_m."',
            '".$a_est_ini_v."','".$a_est_ini_m."','".$a_est_pri_v."','".$a_est_pri_m."',
            '".$a_est_sec_v."','".$a_est_sec_m."','".$a_per_med_v."','".$a_per_med_m."',
            '".$a_per_enf_v."','".$a_per_enf_m."',now(),  NULL,NULL,
            '".$e1."','".$e2."','".$e3."','".$e4."','0');"; 
            print_r($sql);
            $sql=$conectar->prepare($sql);
            $sql->execute();
            //print_r ($sql);
            return $resultado=$sql->fetchAll();
        } 

        public function update_unidad($id_unidad_a,$id_comunidad,$id_estado,$id_fuente, $id_usuario,$a_cod ,$a_nombre,$a_director_nombre,
        $a_director_tel,$a_dna,$a_tecnico,$a_centro_salud,$a_docen_ini_v,$a_docen_ini_m,$a_docen_pri_v,$a_docen_pri_m,
        $a_docen_sec_v,$a_docen_sec_m,$a_est_ini_v,$a_est_ini_m,$a_est_pri_v,$a_est_pri_m,$a_est_sec_v,$a_est_sec_m,$a_per_med_v,
        $a_per_med_m,$a_per_enf_v,$a_per_enf_m,$e1,$e2,$e3,$e4){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE unidad_educativa_a  SET 
             id_comunidad=".$id_comunidad.", id_fuente=".$id_fuente.", a_cod='".$a_cod."',a_nombre='".$a_nombre."', 
             a_director_nombre='".$a_director_nombre."',a_director_tel='".$a_director_tel."', a_dna='".$a_dna."', a_tecnico='".$a_tecnico."', 
             a_centro_salud='".$a_centro_salud."', a_docen_ini_v=".$a_docen_ini_v.", a_docen_ini_m=".$a_docen_ini_m.", a_docen_pri_v=".$a_docen_pri_v.",
             a_docen_pri_m=".$a_docen_pri_m.", a_docen_sec_v=".$a_docen_sec_v.", a_docen_sec_m=".$a_docen_sec_m.",
             a_est_ini_v=".$a_est_ini_v.", a_est_ini_m=".$a_est_ini_m.", a_est_pri_v=".$a_est_pri_v.", a_est_pri_m=".$a_est_pri_m.", 
             a_est_sec_v=".$a_est_sec_v.", a_est_sec_m=".$a_est_sec_m.", a_per_med_v=".$a_per_med_v.", a_per_med_m=".$a_per_med_m.", 
             a_per_enf_v=".$a_per_enf_v.", a_per_enf_m=".$a_per_enf_m.",e1='".$e1."',e2='".$e2."',e3='".$e3."',e4='".$e4."',a_fecha_mod=now()
             WHERE id_unidad_a=".$id_unidad_a.";"; 
            print_r($sql);
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        } 

        public function listar_unidad(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT
            unidad_educativa_a.id_unidad_a,
            unidad_educativa_a.id_comunidad,
            unidad_educativa_a.id_fuente,
            unidad_educativa_a.id_estado,
            unidad_educativa_a.a_cod,
            unidad_educativa_a.a_nombre,
            unidad_educativa_a.a_director_nombre,
            unidad_educativa_a.a_director_tel,
            unidad_educativa_a.a_dna,
            unidad_educativa_a.a_tecnico,
            unidad_educativa_a.a_centro_salud,
            unidad_educativa_a.e1,
            unidad_educativa_a.e2,
            unidad_educativa_a.e3,
            unidad_educativa_a.e4,
            unidad_educativa_a.a_avance,
            usuario.nombre_usu,
            usuario.apellido_usu
            FROM 
            unidad_educativa_a, usuario
            WHERE unidad_educativa_a.id_estado = 3 
            AND unidad_educativa_a.id_usuario = usuario.id_usuario";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        } 

        public function listar_unidad_id($id_unidad_a){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM unidad_educativa_a  WHERE id_unidad_a = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_unidad_a);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_archivo($id_usuario,$id_unidad_a,$id_estado,$nombre_ar,$descripcion_ar,$tipo_ar,$archivo){
            $conectar= parent::conexion();
            parent::set_names();

                $extension = end(explode('.', $_FILES["archivo"]['name']));
                date_default_timezone_set('America/Mexico_City');
                //$nombre_ar= $nombre_ar."_".date('dmYHis').".".end(explode('.', $_FILES["archivo"]['name']));
                $archivo = $_FILES["archivo"]["tmp_name"];
                $directorio = '../archivos/';
                    if (!file_exists($directorio)) {
                        mkdir($directorio, 0777, true);
                    }
                $ruta_ar= $directorio.$nombre_ar."_".date('dmYHis').".".end(explode('.', $_FILES["archivo"]['name']));
                
                move_uploaded_file($_FILES["archivo"]["tmp_name"],$ruta_ar);



            $sql="INSERT INTO archivo (id_usuario,id_item,id_tabla,nombre_ar,descripcion_ar,tipo_ar,ruta_ar,fecha_crea_ar,fecha_mod_ar,
            fecha_elim_ar,estado) VALUES ('".$id_usuario."','".$id_unidad_a."','".$id_estado."','".$nombre_ar."','".$descripcion_ar."',
            '".$tipo_ar."','".$ruta_ar."',now(),NULL,NULL,'0');";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            print_r ($sql);
            return $resultado=$sql->fetchAll();
        } 

        public function listar_archivo($id_unidad_a,$id_estado){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT archivo.id_archivo, archivo.id_item, archivo.id_tabla, archivo.nombre_ar, archivo.descripcion_ar,
            archivo.tipo_ar, archivo.ruta_ar, usuario.nombre_usu,usuario.apellido_usu  
            FROM  archivo, usuario WHERE  archivo.id_usuario = usuario.id_usuario AND archivo.id_item = $id_unidad_a AND archivo.id_tabla = $id_estado;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            
            return $resultado=$sql->fetchAll();
            
        } 

    }
    
?>