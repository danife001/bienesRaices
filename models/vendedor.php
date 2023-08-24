<?php
    namespace Model;

    class vendedor extends ActiveRecord{
        protected static $tabla = 'vendedores';
        protected static $columnasDB = ['id','nombre','apellido','telefono'];

        public $id;
        public $nombre;
        public $apellido;
        public $telefono;

        
        public function __construct($argc = [])
        {
        $this->id = $argc['id'] ?? null;
        $this->nombre = $argc['nombre'] ?? '';
        $this->apellido = $argc['apellido'] ?? '';
        $this->telefono = $argc['telefono'] ?? '';
        
       
        }
        public function validar(){
            if(!$this->nombre){
                self::$errores[] = "debes añadir un nombre";
            }
            if(!$this->apellido){
                self::$errores[] = "debes añadir un apellido";
            }
            if(!$this->telefono){
                self::$errores[] = "debes añadir un telefono";
            }

            if(!preg_match('/[0-9]{10}/', $this->telefono)){
                self::$errores[] = "el telefono esta mal";
            }

            return self::$errores;
        }    

    }



?>