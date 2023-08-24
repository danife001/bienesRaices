<?php

namespace Model;

class propiedad extends ActiveRecord{

    protected static $tabla = 'propiedades';
    protected static $columnasDB = ['id','titulo','precio','imagen','descripcion','habitaciones','wc','estacionamiento','creado','vendedores_id'];
  
    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedores_id;

    
    public function __construct($argc = [])
    {
        $this->id = $argc['id'] ?? null;
        $this->titulo = $argc['titulo'] ?? '';
        $this->precio = $argc['precio'] ?? '';
        $this->imagen = $argc['imagen'] ?? '';
        $this->descripcion = $argc['descripcion'] ?? '';
        $this->habitaciones = $argc['habitaciones'] ?? '';
        $this->wc = $argc['wc'] ?? '';
        $this->estacionamiento = $argc['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedores_id = $argc['vendedores_id'] ?? '';
       
    }

    public function validar(){
        if(!$this->titulo){
            self::$errores[] = "debes añadir un titulo";
        }
        

        if(!$this->precio){
            self::$errores[] = "precio es obligatorio";
        }
        if(strlen($this->descripcion)<50){
            self::$errores[] = "descripcion es obligatoria y tener almenos 50 caracteres";
        }
        
        if(!$this->habitaciones){
            self::$errores[] = "habitaciones es obligatorio";
        }

        if(!$this->wc){
            self::$errores[] = "baños es obligatorio";
        }

        if(!$this->estacionamiento){
            self::$errores[] = "estacionamiento es obligatorio";
        }
        if(!$this->vendedores_id){
            self::$errores[] = "elige un vendedor es obligatorio";
        }

        if(!$this->imagen){
            self::$errores[] = "la imagen es obligatoria ";
        }

        
        return self::$errores;
    }
}