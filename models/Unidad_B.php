<?php
require_once("../config/conexion.php");
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
             a_per_enf_v=".$a_per_enf_v.", a_per_enf_m=".$a_per_enf_m.",e1='".$e1."',e2='".$e2."',e3='".$e3."',e4='".$e4."',a_fecha_mod=now(),
             us_mod='".$id_usuario."'
             WHERE id_unidad_a=".$id_unidad_a.";"; 
            print_r($sql);
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        } 

        public function listar_unidad(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT unidad_educativa_a.id_unidad_a,unidad_educativa_a.a_cod, unidad_educativa_a.a_nombre, unidad_educativa_a.a_director_nombre,unidad_educativa_a.a_director_tel,
            unidad_educativa_a.a_dna,unidad_educativa_a.a_centro_salud,unidad_educativa_a.a_tecnico, fuente.nombre_fue, departamento.nombre_dep,
            municipio.nombre_mun, comunidad.nombre_com, unidad_educativa_a.a_avance,unidad_educativa_a.a_avance2, e1,e2,e3,e4
            FROM 
            unidad_educativa_a, municipio, comunidad, fuente, departamento
            WHERE  unidad_educativa_a.id_estado = 3
            AND unidad_educativa_a.id_fuente = fuente.id_fuente
            AND unidad_educativa_a.id_comunidad = comunidad.id_comunidad
            AND comunidad.id_municipio = municipio.id_municipio 
            AND municipio.id_departamento = departamento.id_departamento
            AND unidad_educativa_a.a_estado=0;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        } 

        public function listar_unidad_r2($id_usuario){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT unidad_educativa_a.id_unidad_a,unidad_educativa_a.a_cod, unidad_educativa_a.a_nombre, unidad_educativa_a.a_director_nombre,unidad_educativa_a.a_director_tel,
            unidad_educativa_a.a_dna,unidad_educativa_a.a_centro_salud,unidad_educativa_a.a_tecnico, fuente.nombre_fue, departamento.nombre_dep,
            municipio.nombre_mun, comunidad.nombre_com, unidad_educativa_a.a_avance,unidad_educativa_a.a_avance2,e1,e2,e3,e4
            FROM 
            unidad_educativa_a, usuario,rol, departamento , municipio, comunidad, fuente
            WHERE unidad_educativa_a.id_comunidad = comunidad.id_comunidad
            AND fuente.id_fuente = unidad_educativa_a.id_fuente
            AND comunidad.id_municipio = municipio.id_municipio
            AND unidad_educativa_a.id_estado = 3
            AND municipio.id_departamento = departamento.id_departamento
            AND usuario.id_usuario = ?
            AND usuario.id_usuario = rol.id_usuario
            AND rol.id_departamento = departamento.id_departamento;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_usuario);
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
            FROM  archivo, usuario WHERE  archivo.id_usuario = usuario.id_usuario AND archivo.id_item = $id_unidad_a 
            AND archivo.id_tabla = $id_estado
            AND archivo.estado=0;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            
            return $resultado=$sql->fetchAll();
            
        } 

        public function delete_unidad($id_unidad_a){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE unidad_educativa_a  SET a_fecha_elim=now(),a_estado=1,us_elim='".$_SESSION["id_usuario"]."'
             WHERE id_unidad_a='".$id_unidad_a."';"; 
            $sql=$conectar->prepare($sql);
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

        //GRAFICOS

        //Total unidades B
        public function get_total_ub($id_usuario){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT COUNT(*) as TOTAL FROM unidad_educativa_a where id_estado = 3 and a_estado=0";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_usuario);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        //Total unidades x depto
        public function get_un_dep_b($id_usuario){
            $conectar= parent::conexion();
            parent::set_names();
            $sql=" SELECT CONCAT(d.nombre_dep) as nom,COUNT(*) AS total
            FROM   unidad_educativa_a a, comunidad b, municipio c, departamento d 
            where a.id_comunidad = b.id_comunidad
            and b.id_municipio = c.id_municipio
            and c.id_departamento = d.id_departamento
            and a.id_estado = '3' and a_estado=0
            GROUP BY 
            d.nombre_dep
            ORDER BY nom DESC";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_usuario);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        } 
        //Total unidades x fuente de financiamiento
        public function get_un_fue_b($id_usuario){
            $conectar= parent::conexion();
            parent::set_names();
            $sql=" SELECT CONCAT(e.nombre_fue) as nom,COUNT(*) AS total
            FROM   unidad_educativa_a a, comunidad b, municipio c, departamento d , fuente e
            where a.id_comunidad = b.id_comunidad
            and b.id_municipio = c.id_municipio
            and c.id_departamento = d.id_departamento
            and a.id_estado = '3' and a_estado=0
            and a.id_fuente = e.id_fuente
            GROUP BY e.nombre_fue
            ORDER BY nom DESC";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_usuario);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        } 
        //Total unidades x municipio
        public function get_un_mun_b($id_usuario){
            $conectar= parent::conexion();
            parent::set_names();
            $sql=" SELECT CONCAT(c.nombre_mun) as nom,COUNT(*) AS total
            FROM   unidad_educativa_a a, comunidad b, municipio c, departamento d , fuente e
            where a.id_comunidad = b.id_comunidad
            and b.id_municipio = c.id_municipio
            and c.id_departamento = d.id_departamento
            and a.id_estado = '3' and a_estado=0
            and a.id_fuente = e.id_fuente
            GROUP BY c.nombre_mun
            ORDER BY nom DESC";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_usuario);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        } 
        //Porcentaje de avance x dpto
        public function get_av_un_dep_b($id_usuario){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT CONCAT(d.nombre_dep) as nom,AVG(a.a_avance) AS total
            FROM   unidad_educativa_a a, comunidad b, municipio c, departamento d 
            where a.id_comunidad = b.id_comunidad
            and b.id_municipio = c.id_municipio and a_estado=0
            and c.id_departamento = d.id_departamento
            and a.id_estado = '3'GROUP BY d.nombre_dep ORDER BY nom DESC";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_usuario);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        //Total estado 1 
        public function get_estado1($id_usuario){
            $conectar= parent::conexion();
            parent::set_names();
            $sql=" SELECT CONCAT(if(a.e1 = '1' OR a.e1 = '0', 'NO', 'SI'))  AS nom, COUNT(*) AS total
            FROM   unidad_educativa_a a
            where a.id_estado = '3' and a_estado=0
			GROUP BY if(a.e1 = '1' OR a.e1 = '0', 'NO', 'SI') ORDER BY nom DESC";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_usuario);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        //Total estado 2 
        public function get_estado2($id_usuario){
            $conectar= parent::conexion();
            parent::set_names();
            $sql=" SELECT CONCAT(if(a.e2 = '1' OR a.e2 = '0', 'NO', 'SI'))  AS nom, COUNT(*) AS total
            FROM   unidad_educativa_a a
            where a.id_estado = '3' and a_estado=0
			GROUP BY if(a.e2 = '1' OR a.e2 = '0', 'NO', 'SI') ORDER BY nom DESC";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_usuario);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        //Total estado 3 
        public function get_estado3($id_usuario){
            $conectar= parent::conexion();
            parent::set_names();
            $sql=" SELECT CONCAT(if(a.e3 = '1' OR a.e3 = '0', 'NO', 'SI'))  AS nom, COUNT(*) AS total
            FROM   unidad_educativa_a a
            where a.id_estado = '3' and a_estado=0
			GROUP BY if(a.e3 = '1' OR a.e3 = '0', 'NO', 'SI') ORDER BY nom DESC";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_usuario);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        //Total estado 4 
        public function get_estado4($id_usuario){
            $conectar= parent::conexion();
            parent::set_names();
            $sql=" SELECT CONCAT(if(a.e4 = '1' OR a.e4 = '0', 'NO', 'SI'))  AS nom, COUNT(*) AS total
            FROM   unidad_educativa_a a
            where a.id_estado = '3' and a_estado=0
			GROUP BY if(a.e4 = '1' OR a.e4 = '0', 'NO', 'SI') ORDER BY nom DESC";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_usuario);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }
    
?>