<?php
    class Municipio extends Conectar{

        public function get_municipio(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT municipio.id_municipio, municipio.nombre_mun, departamento.nombre_dep
            FROM  municipio , departamento 
            WHERE  municipio.id_municipio = municipio.id_municipio 
            AND  departamento.id_departamento = municipio.id_departamento;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_municipio_r2($id_usuario){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT municipio.id_municipio, municipio.nombre_mun, departamento.nombre_dep
            FROM  municipio , departamento , usuario, rol 
            WHERE  municipio.id_municipio = municipio.id_municipio 
            AND  departamento.id_departamento = municipio.id_departamento
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