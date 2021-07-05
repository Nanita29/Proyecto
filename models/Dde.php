<?php
    class Dde extends Conectar{

        public function insert_dde($id_municipio,$id_estado,$id_usuario,$d_cod,$d_nombre,$d_director_nombre,
        $d_director_tel,$d_datos,$e1,$e2,$e3,$e4){

            print_r($d_cod);
            $conectar= parent::conexion();
            parent::set_names();

            $sql="INSERT INTO proyecto_educo.dde (id_municipio,id_estado,id_usuario,d_cod,d_nombre,d_director_nombre,
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
            $sql="UPDATE proyecto_educo.dde  SET 
             id_municipio=".$id_municipio.", d_cod='".$d_cod."',d_nombre='".$d_nombre."', d_director_nombre='".$d_director_nombre."',
             d_director_tel='".$d_director_tel."', d_datos='".$d_datos."', e1='".$e1."',e2='".$e2."',e3='".$e3."',e4='".$e4."',d_fecha_mod=now()
             WHERE id_dde='".$id_dde."';"; 
            print_r($sql);
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        } 

        public function listar_dde(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT dde.id_dde,dde.id_municipio,dde.id_estado, dde.d_cod,dde.d_nombre,dde.d_director_nombre,
            dde.d_director_tel,dde.d_datos,dde.e1,dde.e2, dde.e3,dde.e4,dde.d_avance,usuario.nombre_usu,usuario.apellido_usu 
            FROM  dde, usuario WHERE dde.id_estado = 1 AND dde.id_usuario = usuario.id_usuario;";
            $sql=$conectar->prepare($sql);
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

    }
    
?>