<?php
    class Comunidad extends Conectar{

        public function get_comunidad(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT
            comunidad.id_comunidad,
            comunidad.nombre_com,
            departamento.nombre_dep
            FROM 
            comunidad , departamento , municipio
            WHERE  comunidad.id_municipio = municipio.id_municipio and
               departamento.id_departamento = municipio.id_departamento;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }


    
?>