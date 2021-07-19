<?php
    class Item extends Conectar{

        /* DIRECCIONES DISTRITALES */

        public function insert_dde($id_municipio,$id_estado,$id_usuario,$cod,$nombre,$director_nombre,
        $director_tel,$datos){

            print_r($cod);
            $conectar= parent::conexion();
            parent::set_names();

            $sql="INSERT INTO item (id_municipio,id_estado,id_usuario,d_cod,d_nombre,d_director_nombre,
            d_director_tel,d_datos, d_fecha_crea, d_fecha_mod, d_fecha_elim,estado) VALUES 
            ('".$id_municipio."','1','".$id_usuario."','".$cod."','".$nombre."','".$director_nombre."','".$director_tel."',
            '".$datos."',now(),NULL,NULL,'0');"; 
            print_r($sql);
            $sql=$conectar->prepare($sql);
            $sql->execute();
            //print_r ($sql);
            return $resultado=$sql->fetchAll();
        } 

        public function update_dde($id_item,$id_municipio,$id_estado,$id_usuario,$d_cod,$d_nombre,$d_director_nombre,
        $d_director_tel,$d_datos,$e1,$e2,$e3,$e4){
            print_r($id_municipio);
            $conectar= parent::conexion();
            parent::set_names();
            $sql1="UPDATE item  SET 
             id_municipio=".$id_municipio.", d_cod='".$d_cod."',d_nombre='".$d_nombre."', d_director_nombre='".$d_director_nombre."',
             d_director_tel='".$d_director_tel."', d_datos='".$d_datos."', e1='".$e1."',e2='".$e2."',e3='".$e3."',e4='".$e4."',d_fecha_mod=now()
             WHERE id_item='".$id_item."';"; 
            print_r($sql1);
            $sql1=$conectar->prepare($sql1);
            $sql1->execute();

            $sql="UPDATE item  SET 
             id_municipio=".$id_municipio.", d_cod='".$d_cod."',d_nombre='".$d_nombre."', d_director_nombre='".$d_director_nombre."',
             d_director_tel='".$d_director_tel."', d_datos='".$d_datos."', e1='".$e1."',e2='".$e2."',e3='".$e3."',e4='".$e4."',d_fecha_mod=now()
             WHERE id_item='".$id_item."';"; 
            print_r($sql);
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql;$sql1->fetchAll();
        } 

        public function listar_dde(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT item.id_item,item.id_municipio,item.id_estado, item.d_cod,item.d_nombre,item.d_director_nombre,
            item.d_director_tel,item.d_datos,item.e1,item.e2, item.e3,item.e4,item.d_avance,usuario.nombre_usu,usuario.apellido_usu 
            FROM  item, usuario WHERE item.id_estado = 1 AND item.id_usuario = usuario.id_usuario;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        } 

        public function listar_dde_id($id_item){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM item  WHERE id_item = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_item);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }
    
?>