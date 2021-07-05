<?php
    class Municipio extends Conectar{

        public function get_municipio(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT
            municipio.id_municipio,
            municipio.nombre_mun,
            departamento.nombre_dep
            FROM 
            municipio , departamento 
            WHERE  municipio.id_municipio = municipio.id_municipio and
               departamento.id_departamento = municipio.id_departamento;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }


    
?>