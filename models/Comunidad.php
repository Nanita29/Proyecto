<?php
    class Comunidad extends Conectar{

        public function get_comunidad(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT comunidad.id_comunidad, comunidad.nombre_com, departamento.nombre_dep, municipio.nombre_mun
            FROM comunidad , departamento , municipio
            WHERE  comunidad.id_municipio = municipio.id_municipio 
            and  departamento.id_departamento = municipio.id_departamento;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_comunidad_r2($id_usuario){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT comunidad.id_comunidad, comunidad.nombre_com, departamento.nombre_dep
            FROM comunidad , departamento , municipio,usuario, rol 
            WHERE  comunidad.id_municipio = municipio.id_municipio 
            AND departamento.id_departamento = municipio.id_departamento
            AND usuario.id_usuario = ?
            AND usuario.id_usuario = rol.id_usuario
            AND rol.id_departamento = departamento.id_departamento;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_usuario);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }


    
?>