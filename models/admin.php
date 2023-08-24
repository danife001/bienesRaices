<?php

namespace Model;

class Admin extends ActiveRecord{
    //  base de datos 
    protected static $tabla = 'usuarios';
    protected static $columnasDB =['id','email','password'];

    public $id;
    public $email;
    public $password;

    public function __construct($args=[])
    {
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    public function validar()
    {
        if(!$this->email){
            self::$errores[] ='el email es obligatorio';
        }
        if(!$this->password){
            self::$errores[] ='la clave es obligatoria';
        }

        return self::$errores;
    }

    public function existeUsuario(){
        // verificar si un usuario existe 

        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '". $this->email . "' LIMIT 1";

        $resultado= self::$db->query($query);

        if(!$resultado->num_rows){
            self::$errores[] = 'el usuario no existe';
            return;
        }
        return $resultado;
    }

    public function comprobarPassword($resultado){
        $usuario = $resultado->fetch_object();

       $autenticado =password_verify($this->password,$usuario->password);
       if(!$autenticado){
        self::$errores[] = 'clave incorrecta';
         }


        return $autenticado;
    }

    public function autenticar(){
        session_start();

        // llenar el arreglo 
        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true;

        header('Location: /bienesraicesMVC/public/index.php/admin');
    }
}
