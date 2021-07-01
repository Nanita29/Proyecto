<?php
    class Unidad_A extends Conectar{

        public function insert_unidad_a($id_comunidad,$id_estado,$id_fuente,$id_usuario,$a_cod,$a_nombre,$a_director_nombre,
        $a_director_tel,$a_pcpa,$a_tecnico,$a_docen_ini_v,$a_docen_ini_m,$a_docen_pri_v,$a_docen_pri_m,
        $a_docen_sec_v,$a_docen_sec_m,$a_est_ini_v,$a_est_ini_m,$a_est_pri_v,$a_est_pri_m,$a_est_sec_v,$a_est_sec_m,$a_per_med_v,
        $a_per_med_m,$a_per_enf_v,$a_per_enf_m,$e1,$e2,$e3,$e4,$a_avance){

            print_r($e1);
            $conectar= parent::conexion();
            parent::set_names();

            $sql="INSERT INTO proyecto_educo.unidad_educativa_a (id_unidad_a, id_comunidad, id_estado, id_fuente, id_usuario, 
            a_cod, a_nombre, a_director_nombre, a_director_tel, a_pcpa, a_tecnico, a_docen_ini_v, a_docen_ini_m, a_docen_pri_v,/*  13 */
            a_docen_pri_m, a_docen_sec_v, a_docen_sec_m, a_est_ini_v, a_est_ini_m, a_est_pri_v, a_est_pri_m, a_est_sec_v, a_est_sec_m, /* 22 */
            a_per_med_v, a_per_med_m, a_per_enf_v, a_per_enf_m, a_fecha_crea, a_fecha_mod, a_fecha_elim, e1, e2, e3, e4, a_avance, a_estado) VALUES 
            (NULL,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,now(), NULL,NULL,?,?,?,?,?,'0');"; 

            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_comunidad);
            $sql->bindValue(2, '2');
            $sql->bindValue(3, $id_fuente);
            $sql->bindValue(4, $id_usuario);
            $sql->bindValue(5, $a_cod);
            $sql->bindValue(6, $a_nombre);
            $sql->bindValue(7, $a_director_nombre);
            $sql->bindValue(8, $a_director_tel);
            $sql->bindValue(9, $a_pcpa);
            $sql->bindValue(10, $a_tecnico);
            $sql->bindValue(11, $a_docen_ini_v);
            $sql->bindValue(12, $a_docen_ini_m);
            $sql->bindValue(13, $a_docen_pri_v);
            $sql->bindValue(14, $a_docen_pri_m);
            $sql->bindValue(15, $a_docen_sec_v);
            $sql->bindValue(16, $a_docen_sec_m);
            $sql->bindValue(17, $a_est_ini_v);
            $sql->bindValue(18, $a_est_ini_m);
            $sql->bindValue(19, $a_est_pri_v);
            $sql->bindValue(20, $a_est_pri_m);
            $sql->bindValue(21, $a_est_sec_v);
            $sql->bindValue(22, $a_est_sec_m);
            $sql->bindValue(23, $a_per_med_v);
            $sql->bindValue(24, $a_per_med_m);
            $sql->bindValue(25, $a_per_enf_v);
            $sql->bindValue(26, $a_per_enf_m);
            $sql->bindValue(27, $e1);
            $sql->bindValue(28, $e2);
            $sql->bindValue(29, $e3);
            $sql->bindValue(30, $e4);
            $sql->bindValue(31, $a_avance);
            $sql->execute();
            //print_r ($sql);
            return $resultado=$sql->fetchAll();
        } 

        public function listar_unidad_a(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT
            unidad_educativa_a.id_unidad_a,
            unidad_educativa_a.a_nombre,
            unidad_educativa_a.a_director_nombre,
            unidad_educativa_a.a_director_tel,
            unidad_educativa_a.a_pcpa,
            unidad_educativa_a.a_tecnico,
            unidad_educativa_a.a_avance,
            usuario.nombre_usu,
            usuario.apellido_usu
            FROM 
            unidad_educativa_a
            INNER join usuario on unidad_educativa_a.id_usuario = usuario.id_usuario";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function listar_unidad_a_id($id_unidad_a){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT unidad_educativa_a.id_unidad_a,
                unidad_educativa_a.a_nombre,
                unidad_educativa_a.a_director_nombre,
                unidad_educativa_a.a_director_tel,
                unidad_educativa_a.a_pcpa,
                unidad_educativa_a.a_tecnico,
                unidad_educativa_a.a_avance  
                FROM unidad_educativa_a 
                WHERE id_unidad_a = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_unidad_a);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }
    
?>