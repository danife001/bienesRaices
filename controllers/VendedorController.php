<?php

namespace Controllers;

use Model\vendedor;
use MVC\Router;

class VendedorController {
    public static function crear(Router $router){
        $vendedor = new vendedor;
        $errores = vendedor::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $vendedor = new vendedor($_POST['vendedor']);
        
            $errores = $vendedor->validar();
        
            if(empty($errores)){
                $vendedor->guardar();
            }
         }

        $router->render('vendedores/crear',[
            'vendedor'=> $vendedor,
            'errores'=>$errores
        ]);
    }
    public static function actualizar(Router $router){
        $id = validarORedireccionar('/bienesraicesMVC/public/index.php/admin');
        $vendedor = vendedor::find($id);
        $errores = vendedor::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $argc = $_POST['vendedor'];
            
            $vendedor->sincronizar($argc);
    
            $errores = $vendedor->validar();
    
            if(!$errores){
                $vendedor->guardar();
            }
        }
    



        $router->render('/vendedores/actualizar',[
            'vendedor'=> $vendedor,
            'errores'=>$errores
        ]);
    }
    public static function eliminar( ){
     
    if($_SERVER['REQUEST_METHOD']==='POST'){

            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
        
            if($id){

                $tipo = $_POST['tipo'];

                if(validarTipoContenido($tipo)){
                    // compara lo que se elimina 
                    $vendedor = vendedor::find($id);
                    $vendedor->eliminar();               
                }

            }
        }
    }
}