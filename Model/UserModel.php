<?php

    class UserModel
    {
    
        private $db;
    
    
        public function __construct()
        {
        /*     $contraseña = "BBDDide2021";
        $usuario = "postgres";
        $nombreBaseDeDatos = "usuario";
        $rutaServidor = "cipres-bk.tandil.gov.ar";
        $puerto = "5432";
        $this->db = new PDO("pgsql:host=$rutaServidor;port=$puerto;dbname=$nombreBaseDeDatos", $usuario, $contraseña); */
            $this->db = new PDO('mysql:host=localhost;' . 'dbname=user;charset=utf8', 'root', '');
        }
    
        function getUserByEmail($user){
            $sentencia = $this->db->prepare("SELECT * FROM user WHERE email_user=?");
            $sentencia->execute(array($user));
            return $sentencia->fetch(PDO::FETCH_OBJ);
        }
        
        function getUserById($user){
            $sentencia = $this->db->prepare("SELECT * FROM user WHERE id_user=?");
            $sentencia->execute(array($user));
            return $sentencia->fetch(PDO::FETCH_OBJ);
        }
        function getUserByName($user){
            $sentencia = $this->db->prepare("SELECT * FROM user WHERE name_user=?");
            $sentencia->execute(array($user));
            return $sentencia->fetch(PDO::FETCH_OBJ);
        }
        function createuser($name_user,$email_user,$password_user)
        {
            $sentencia = $this->db->prepare('INSERT INTO user (name_user, email_user, password_user) VALUES(?,?,?)');
            $sentencia->execute(array($name_user,$email_user,$password_user));
        }
        
        function getUsers(){
            $sentencia = $this->db->prepare("SELECT * FROM user");
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        }
        function editUser($id_user, $name_user, $email_user, $password_user)
        {
            $sentencia = $this->db->prepare('UPDATE user  SET name_user=?, email_user=?, password_user=? WHERE id_user=?');
            $sentencia->execute(array($name_user, $email_user, $password_user, $id_user));
            return $sentencia->rowCount();
        }
    
        function deleteUser($id_user = null){
            $sentencia = $this->db->prepare('DELETE FROM user WHERE id_user=?');
            $sentencia->execute(array($id_user));
            return $sentencia->rowCount();
        }
    
    
    };