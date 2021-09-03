<?php
    class Usuario extends Conectar{

        public function login(){
            $conectar=parent::conexion();
            parent::set_names();
            if(isset($_POST["enviar"])){
                $correo = $_POST["usu_correo"];
                $pass = $_POST["usu_pass"];
                //$rol = $_POST["rol_id"];
                if(empty($correo) and empty($pass)){
                    header("Location:".conectar::ruta()."index.php?m=2");
					exit();
                }else{
                    $sql = "SELECT * FROM usuario WHERE usu_correo=? and usu_pass=?";
                    $stmt=$conectar->prepare($sql);
                    $stmt->bindValue(1, $correo);
                    $stmt->bindValue(2, $pass);
                    //$stmt->bindValue(3, $rol);
                    $stmt->execute();
                    $resultado = $stmt->fetch();
                    if (is_array($resultado) and count($resultado)>0){
                        $_SESSION["id_usuario"]=$resultado["id_usuario"];
                        $_SESSION["nombre_usu"]=$resultado["nombre_usu"];
                        $_SESSION["apellido_usu"]=$resultado["apellido_usu"];
                        $_SESSION["rol_id"]=$resultado["rol_id"];
                        header("Location:".Conectar::ruta()."view/Home/");
                        exit(); 
                    }else{
                        header("Location:".Conectar::ruta()."index.php?m=1");
                        exit();
                    }
                }
            }
        }

        public function insert_usuario($nombre_usu,$apellido_usu,$usu_correo,$usu_pass,$rol_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO usuario (id_usuario, nombre_usu, apellido_usu, usu_correo, usu_pass, rol_id, fecha_crea, fecha_mod, fecha_elim,
             estado) VALUES (NULL,?,?,?,?,?,now(), NULL, NULL, '0');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $nombre_usu);
            $sql->bindValue(2, $apellido_usu);
            $sql->bindValue(3, $usu_correo);
            $sql->bindValue(4, $usu_pass);
            $sql->bindValue(5, $rol_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_usuario($id_usuario,$nombre_usu,$apellido_usu,$usu_correo,$usu_pass,$rol_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE usuario set
                nombre_usu = ?,
                apellido_usu = ?,
                usu_correo = ?,
                usu_pass = ?,
                rol_id = ?
                WHERE
                id_usuario = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $nombre_usu);
            $sql->bindValue(2, $apellido_usu);
            $sql->bindValue(3, $usu_correo);
            $sql->bindValue(4, $usu_pass);
            $sql->bindValue(5, $rol_id);
            $sql->bindValue(6, $id_usuario);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function delete_usuario($id_usuario){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="DELETE FROM usuario WHERE (id_usuario = ?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_usuario);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_usuario(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM usuario;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_usuario_x_id($id_usuario){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM usuario  WHERE id_usuario = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_usuario);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function agregar_dpto($id_usuario,$id_departamento){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO rol (`id_usuario`, `id_departamento`) VALUES (?, ?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_usuario);
            $sql->bindValue(2, $id_departamento);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function listar_dpto($id_usuario){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT a.nombre_dep
            FROM  departamento a, rol b WHERE  a.id_departamento = b.id_departamento AND b.id_usuario = $id_usuario GROUP BY a.nombre_dep;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            
            return $resultado=$sql->fetchAll();
            print_r ($sql);
        } 

        

        

        


        

        

        

        

        

        

        

    }
?>