<?php
    class Estado extends Conectar{

        public function get_estado(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM estado;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }
?>