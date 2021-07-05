<?php
    class Miembro extends Conectar{

        public function insert_miembro($id_departamento,$id_estado,$id_usuario,$m_cod,$m_nombre,$m_contactos,
        $m_observacion,$e1,$e2,$e3,$e4,$e5,$e6){

            print_r($m_cod);
            $conectar= parent::conexion();
            parent::set_names();

            $sql="INSERT INTO proyecto_educo.miembro (id_departamento,id_estado,id_usuario,m_cod,m_nombre,m_contactos,
            m_observacion, m_fecha_crea, m_fecha_mod, m_fecha_elim, e1, e2, e3, e4,e5, e6, m_estado) VALUES 
            ('".$id_departamento."','4','".$id_usuario."','".$m_cod."','".$m_nombre."','".$m_contactos."','".$m_observacion."',
            now(),NULL,NULL,'".$e1."','".$e2."','".$e3."','".$e4."','".$e5."','".$e6."','0');"; 
            print_r($sql);
            $sql=$conectar->prepare($sql);
            $sql->execute();
            //print_r ($sql);
            return $resultado=$sql->fetchAll();
        } 

        public function update_miembro($id_miembro,$id_departamento,$id_estado,$id_usuario,$m_cod,$m_nombre,$m_contactos,
        $m_observacion,$e1,$e2,$e3,$e4,$e5,$e6){
            print_r($id_departamento);
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE proyecto_educo.miembro  SET 
             id_departamento=".$id_departamento.", m_cod='".$m_cod."',m_nombre='".$m_nombre."', m_contactos='".$m_contactos."',
             m_observacion='".$m_observacion."', e1='".$e1."',e2='".$e2."',e3='".$e3."',e4='".$e4."',e5='".$e5."',e6='".$e6."',m_fecha_mod=now()
             WHERE id_miembro='".$id_miembro."';"; 
            print_r($sql);
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        } 

        public function listar_miembro(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT miembro.id_miembro,miembro.id_departamento,miembro.id_estado, miembro.m_cod,miembro.m_nombre,miembro.m_contactos,
            miembro.m_observacion,miembro.e1,miembro.e2, miembro.e3,miembro.e4,miembro.e5,miembro.e6,miembro.m_avance,
            usuario.nombre_usu,usuario.apellido_usu 
            FROM  miembro, usuario WHERE miembro.id_estado = 4 AND miembro.id_usuario = usuario.id_usuario;";
            $sql=$conectar->prepare($sql);
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

    }
    
?>