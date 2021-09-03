<?php
    class Departamento extends Conectar{

        public function get_departamento(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT *
            FROM  departamento;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_departamento_r2( $id_usuario){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT *
            FROM   departamento, usuario, rol 
            WHERE  usuario.id_usuario = ?
            AND usuario.id_usuario = rol.id_usuario
            AND rol.id_departamento = departamento.id_departamento;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_usuario);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }


    
?>