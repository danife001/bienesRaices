<?php 

namespace Model;

class ActiveRecord{
    
    // base de datos 
    protected static $db;
    protected static $columnasDB = [''];
    protected static $tabla = '';

    // errores 
    protected static $errores = [];
    

    
    // definir la conexion a la bd
    public static function setDB($database){
        self::$db = $database;
    }

    public function guardar(){
        if(!is_null($this->id)){
            // actualizar 
            $this->actualizar();
        }else{
            // crear un nuevo registro
            $this->crear();
        }
    }

    public function crear(){

        // sanitizar los datos 
        $atributos = $this->sanitizarDatos();

        
        

        $query = " INSERT INTO ". static::$tabla ."( ";
        $query .= join(', ',array_keys($atributos));
        $query.=" )VALUES (' ";
        $query .= join("', '",array_values($atributos));
        $query .= " ')"; 
       
        
        $resultado =self::$db->query($query);
           
        if($resultado){
                 
            // redireccionar al usuario .
            header('Location:/bienesraicesMVC/public/index.php/admin?resultado=1');
        }
    }
    public function actualizar()
    {
        // Sanitizar los datos
        $atributos = $this->sanitizarDatos();

        $valores = [];

        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        $query = "UPDATE ". static::$tabla ." SET ";
        $query .=  join(', ', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";

        $resultado = self::$db->query($query);

        if ($resultado) {
            header('Location:/bienesraicesMVC/public/index.php/admin?resultado=2');
        }
    
    }



    // eliminar un registro 

    public function eliminar(){
        // elimina la propiedad 
        $query = "DELETE FROM ". static::$tabla ." WHERE id = ".self::$db->escape_string($this->id)." LIMIT 1";
        $resultado = self::$db->query($query);

        if($resultado){
            $this->borrarImagen();
            header('location:/bienesraicesMVC/public/index.php/admin?resultado=3');
        }
        
    }


    public function atributos(){
        $atributos = [];

        foreach(static::$columnasDB as $columna){
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }
    public function sanitizarDatos(){
        
        $atributos = $this->atributos();
        $sanitizado =[];

        foreach($atributos as $key => $value){
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }
    // subida de archivos 
    public function setImagen($imagen){

        if(!is_null($this->id)){
            // comprobar si existe un archivo 
            $this->borrarImagen();
        }


        if($imagen){
            $this->imagen = $imagen;
        }
    }
    // eliminar imagen 
    public function borrarImagen(){
        $existeArchivo = file_exists(CARPETA_IMAGENES.$this->imagen);
            if($existeArchivo){
                unlink(CARPETA_IMAGENES.$this->imagen);
            }
    }

    // validacion 
    public static function getErrores(){
        
        return static::$errores;
    }

    public function validar(){
        static::$errores=[];
        
        return static::$errores;
    }

    // lista todas los regitros  
    public static function all(){
        $query = "SELECT * FROM " . static::$tabla ;

        $resultado = self::consultarSQL($query);

        return $resultado;
    }


    // obtiene determinado numero de registros
    public static function get($cantidad){
        $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;

        
        $resultado = self::consultarSQL($query);

        return $resultado;
    }


    // busca una propiedad por id
    public static function find($id){
        $query = "SELECT * FROM ". static::$tabla ." WHERE id ={$id}";

        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }

    public static function consultarSQL($query) {
        // consultar la base de datos 
        $resultado = self::$db->query($query);

        // iterar los resultados 
        $array = [];
        while($registro = $resultado->fetch_assoc()){
            $array [] = static::crearObjeto($registro);
        }

       
        // liberal la menmoria 
        $resultado -> free();
        // retornar los resultados 
        return $array;
    }


    protected static function crearObjeto($registro){
        $objeto = new static;

       foreach($registro as $key => $value){
            if(property_exists($objeto,$key)){
                $objeto->$key = $value;
            }
       }
       return$objeto;
    }

    // sincronizar el objeto 
    public function sincronizar( $argc=[] ){
        foreach($argc as $key => $value){
            if(property_exists($this,$key)&& !is_null($value)){
                $this->$key = $value;
            }
        }
    }
}



?>