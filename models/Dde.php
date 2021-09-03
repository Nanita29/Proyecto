<?php
require_once("../config/conexion.php");
    class Dde extends Conectar{

        public function insert_dde($id_municipio,$id_estado,$id_usuario,$d_cod,$d_nombre,$d_director_nombre,
        $d_director_tel,$d_datos,$e1,$e2,$e3,$e4){

            print_r($d_cod);
            $conectar= parent::conexion();
            parent::set_names();

            $sql="INSERT INTO dde (id_municipio,id_estado,id_usuario,d_cod,d_nombre,d_director_nombre,
            d_director_tel,d_datos, d_fecha_crea, d_fecha_mod, d_fecha_elim, e1, e2, e3, e4, d_estado) VALUES 
            ('".$id_municipio."','1','".$id_usuario."','".$d_cod."','".$d_nombre."','".$d_director_nombre."','".$d_director_tel."',
            '".$d_datos."',now(),NULL,NULL,'".$e1."','".$e2."','".$e3."','".$e4."','0');"; 
            print_r($sql);
            $sql=$conectar->prepare($sql);
            $sql->execute();
            //print_r ($sql);
            return $resultado=$sql->fetchAll();
        } 

        public function update_dde($id_dde,$id_municipio,$id_estado,$id_usuario,$d_cod,$d_nombre,$d_director_nombre,
        $d_director_tel,$d_datos,$e1,$e2,$e3,$e4){
            print_r($id_municipio);
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE dde  SET 
             id_municipio=".$id_municipio.", d_cod='".$d_cod."',d_nombre='".$d_nombre."', d_director_nombre='".$d_director_nombre."',
             d_director_tel='".$d_director_tel."', d_datos='".$d_datos."', e1='".$e1."',e2='".$e2."',e3='".$e3."',e4='".$e4."',d_fecha_mod=now(),
             us_mod='".$id_usuario."'
             WHERE id_dde='".$id_dde."';"; 
            print_r($sql);
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        } 

        public function listar_dde(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="  SELECT  dde.id_dde, dde.d_cod,dde.d_nombre,dde.d_director_nombre,
            dde.d_director_tel,dde.d_datos,dde.d_avance, municipio.nombre_mun, departamento.nombre_dep
            FROM  dde, municipio, departamento
            WHERE  dde.id_estado = 1
            AND dde.id_municipio = municipio.id_municipio
            AND municipio.id_departamento = departamento.id_departamento
            AND dde.d_estado = 0;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        } 

        public function listar_dde_r2($id_usuario){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT dde.id_dde,dde.id_municipio,dde.id_estado, dde.d_cod,dde.d_nombre,dde.d_director_nombre,
            dde.d_director_tel,dde.d_datos,dde.e1,dde.e2, dde.e3,dde.e4,dde.d_avance,usuario.nombre_usu,usuario.apellido_usu,
            municipio.nombre_mun, departamento.nombre_dep 
            FROM  dde, usuario, rol, departamento , municipio 
            WHERE dde.id_municipio = municipio.id_municipio 
            AND municipio.id_departamento = departamento.id_departamento
            AND usuario.id_usuario = ?
            AND usuario.id_usuario = rol.id_usuario
            AND dde.id_estado = 1
            AND rol.id_departamento = departamento.id_departamento
            AND dde.d_estado = 0;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_usuario);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function listar_dde_id($id_dde){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM dde  WHERE id_dde = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_dde);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_archivo($id_usuario,$id_dde,$id_estado,$nombre_ar,$descripcion_ar,$tipo_ar,$archivo){
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
            fecha_elim_ar,estado) VALUES ('".$id_usuario."','".$id_dde."','".$id_estado."','".$nombre_ar."','".$descripcion_ar."',
            '".$tipo_ar."','".$ruta_ar."',now(),NULL,NULL,'0');";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            print_r ($sql);
            return $resultado=$sql->fetchAll();
        } 

        public function listar_archivo( $id_dde,$id_estado){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT archivo.id_archivo, archivo.id_item, archivo.id_tabla, archivo.nombre_ar, archivo.descripcion_ar,
            archivo.tipo_ar, archivo.ruta_ar, usuario.nombre_usu,usuario.apellido_usu  
            FROM  archivo, usuario WHERE  archivo.id_usuario = usuario.id_usuario AND archivo.id_item = $id_dde AND archivo.id_tabla = $id_estado
            AND archivo.estado = 0;";
            
            $sql=$conectar->prepare($sql);
            $sql->execute();
            
            return $resultado=$sql->fetchAll();
            print_r ($sql);
        } 

        public function delete_dde($id_dde){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE dde  SET d_fecha_elim=now(),d_estado=1,us_elim='".$_SESSION["id_usuario"]."'
             WHERE id_dde='".$id_dde."';"; 
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

        //Total direcciones
        public function get_total_dde($id_usuario){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT COUNT(*) as TOTAL FROM dde where id_estado = 1";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_usuario);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        //Total direcciones x dpto
        public function get_dde_dep($id_usuario){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT CONCAT(c.nombre_dep) as nom,COUNT(*) AS total
            FROM   dde a, municipio b, departamento c 
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

        //Porcentaje de avance x dpto
        public function get_av_dde_dep($id_usuario){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT CONCAT(c.nombre_dep) as nom,AVG(a.d_avance) AS total
            FROM   dde a, municipio b, departamento c 
            where a.id_municipio = b.id_municipio
            and b.id_departamento = c.id_departamento
            GROUP BY c.nombre_dep ORDER BY nom DESC";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_usuario);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        //Total direcciones x municipio
        public function get_dde_mun($id_usuario){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="  SELECT CONCAT(c.nombre_mun) as nom,COUNT(*) AS total
            FROM   dde a, comunidad b, municipio c, departamento d , fuente e
            where b.id_municipio = c.id_municipio
            and c.id_departamento = d.id_departamento
            and a.id_estado = '1'
            GROUP BY c.nombre_mun
            ORDER BY nom DESC";
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
            FROM   dde a
            where a.id_estado = '1'
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
            FROM   dde a
            where a.id_estado = '1'
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
            FROM   dde a
            where a.id_estado = '1'
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
            FROM   dde a
            where a.id_estado = '1'
			GROUP BY if(a.e4 = '1' OR a.e4 = '0', 'NO', 'SI') ORDER BY nom DESC";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_usuario);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }
    
?> 