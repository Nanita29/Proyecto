<?php
    class Fuente extends Conectar{

        public function insert_fuente($nombre_fue,$descripcion_fue){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO fuente (id_fuente,nombre_fue,descripcion_fue,fecha_crea_fue,fecha_mod_fue,fecha_elim_fue) VALUES (NULL,?,?,now(),NULL,NULL);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $nombre_fue);
            $sql->bindValue(2, $descripcion_fue);
            $sql->execute();
            print_r ($sql);
            return $resultado=$sql->fetchAll();
        } 

        public function listar_fuente(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT
                fuente.nombre_fue,
                fuente.descripcion_fue
                FROM 
                fuente";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_fuente(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM fuente;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }
    
?>