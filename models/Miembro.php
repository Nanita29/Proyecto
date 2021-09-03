<?php
require_once("../config/conexion.php");
    class Miembro extends Conectar{

        public function insert_miembro($id_municipio,$id_estado,$id_usuario,$m_cod,$m_nombre,$m_contactos,
        $m_observacion,$e1,$e2,$e3,$e4,$e5,$e6){

            print_r($m_cod);
            $conectar= parent::conexion();
            parent::set_names();

            $sql="INSERT INTO miembro (id_municipio,id_estado,id_usuario,m_cod,m_nombre,m_contactos,
            m_observacion, m_fecha_crea, m_fecha_mod, m_fecha_elim, e1, e2, e3, e4,e5, e6, m_estado) VALUES 
            ('".$id_municipio."','4','".$id_usuario."','".$m_cod."','".$m_nombre."','".$m_contactos."','".$m_observacion."',
            now(),NULL,NULL,'".$e1."','".$e2."','".$e3."','".$e4."','".$e5."','".$e6."','0');"; 
            print_r($sql);
            $sql=$conectar->prepare($sql);
            $sql->execute();
            //print_r ($sql);
            return $resultado=$sql->fetchAll();
        } 

        public function update_miembro($id_miembro,$id_municipio,$id_estado,$id_usuario,$m_cod,$m_nombre,$m_contactos,
        $m_observacion,$e1,$e2,$e3,$e4,$e5,$e6){
            print_r($id_municipio);
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE miembro  SET 
             id_municipio=".$id_municipio.", m_cod='".$m_cod."',m_nombre='".$m_nombre."', m_contactos='".$m_contactos."',
             m_observacion='".$m_observacion."', e1='".$e1."',e2='".$e2."',e3='".$e3."',e4='".$e4."',e5='".$e5."',e6='".$e6."',m_fecha_mod=now(),
             us_mod='".$id_usuario."'
             WHERE id_miembro='".$id_miembro."';"; 
            print_r($sql);
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        } 

        public function listar_miembro(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT *
            FROM  miembro, departamento , municipio
            WHERE miembro.id_estado = 4 
            AND municipio.id_municipio = miembro.id_municipio
            AND municipio.id_departamento = departamento.id_departamento
            AND miembro.m_estado = 0;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        } 

        public function listar_miembro_r2($id_usuario){
            $conectar= parent::conexion();
            parent::set_names();
            $sql=" SELECT miembro.id_miembro,miembro.id_municipio,miembro.id_estado, miembro.m_cod,miembro.m_nombre,miembro.m_contactos,
            miembro.m_observacion,miembro.e1,miembro.e2, miembro.e3,miembro.e4,miembro.e5,miembro.e6,miembro.m_avance,
            usuario.nombre_usu,usuario.apellido_usu, departamento.nombre_dep, municipio.nombre_mun
            FROM miembro, usuario,rol, departamento,municipio
 		    WHERE miembro.id_municipio = municipio.id_municipio           
            AND municipio.id_departamento = departamento.id_departamento
            AND usuario.id_usuario = ?
            AND usuario.id_usuario = rol.id_usuario
            AND rol.id_departamento = departamento.id_departamento
            and miembro.id_estado = 4;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_usuario);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        } 

        public function listar_miembro_id($id_miembro){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM miembro  WHERE id_miembro = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_miembro);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_archivo($id_usuario,$id_miembro,$id_estado,$nombre_ar,$descripcion_ar,$tipo_ar,$archivo){
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
            fecha_elim_ar,estado) VALUES ('".$id_usuario."','".$id_miembro."','".$id_estado."','".$nombre_ar."','".$descripcion_ar."',
            '".$tipo_ar."','".$ruta_ar."',now(),NULL,NULL,'0');";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            print_r ($sql);
            return $resultado=$sql->fetchAll();
        } 

        public function listar_archivo( $id_miembro,$id_estado){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT archivo.id_archivo, archivo.id_item, archivo.id_tabla, archivo.nombre_ar, archivo.descripcion_ar,
            archivo.tipo_ar, archivo.ruta_ar, usuario.nombre_usu,usuario.apellido_usu  
            FROM  archivo, usuario WHERE  archivo.id_usuario = usuario.id_usuario AND archivo.id_item = $id_miembro
             AND archivo.id_tabla = $id_estado
             AND archivo.estado=0;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
            print_r ($sql);
        } 

        public function delete_miembro($id_miembro){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE miembro  SET m_fecha_elim=now(),m_estado=1,us_elim='".$_SESSION["id_usuario"]."'
             WHERE id_miembro='".$id_miembro."';"; 
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

        //Total miembros
        public function get_total_m($id_usuario){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT COUNT(*) as TOTAL FROM miembro where id_estado = 4";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_usuario);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        //Total miembros x dpto
        public function get_m_dep($id_usuario){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT CONCAT(c.nombre_dep) as nom,COUNT(*) AS total
            FROM   miembro a, municipio b, departamento c 
            where a.id_municipio = b.id_municipio
            and b.id_departamento = c.id_departamento
            GROUP BY 
            c.nombre_dep
            ORDER BY nom DESC";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_usuario);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        } 

        //% de avance x dpto
        public function get_av_m_dep($id_usuario){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT CONCAT(c.nombre_dep) as nom,AVG(a.d_avance) AS total
            FROM   miembro a, municipio b, departamento c 
            where a.id_municipio = b.id_municipio
            and b.id_departamento = c.id_departamento
            GROUP BY c.nombre_dep ORDER BY nom DESC";
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
            FROM   miembro a
            where a.id_estado = '4'
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
            FROM   miembro a
            where a.id_estado = '4'
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
            FROM   miembro a
            where a.id_estado = '4'
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
            FROM   miembro a
            where a.id_estado = '4'
			GROUP BY if(a.e4 = '1' OR a.e4 = '0', 'NO', 'SI') ORDER BY nom DESC";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_usuario);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        //Total estado 5 
        public function get_estado5($id_usuario){
            $conectar= parent::conexion();
            parent::set_names();
            $sql=" SELECT CONCAT(if(a.e5 = '1' OR a.e5 = '0', 'NO', 'SI'))  AS nom, COUNT(*) AS total
            FROM   miembro a
            where a.id_estado = '4'
			GROUP BY if(a.e5 = '1' OR a.e5 = '0', 'NO', 'SI') ORDER BY nom DESC";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_usuario);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        //Total estado 6 
        public function get_estado6($id_usuario){
            $conectar= parent::conexion();
            parent::set_names();
            $sql=" SELECT CONCAT(if(a.e6 = '1' OR a.e6 = '0', 'NO', 'SI'))  AS nom, COUNT(*) AS total
            FROM   miembro a
            where a.id_estado = '4'
			GROUP BY if(a.e6 = '1' OR a.e6 = '0', 'NO', 'SI') ORDER BY nom DESC";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_usuario);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }
    
?>