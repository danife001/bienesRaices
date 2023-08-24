<?php

namespace Controllers;

use Model\Admin;
use MVC\Router;


class LoginController {
    public static function login(Router $router)  {
        
        $errores =[];
        if($_SERVER['REQUEST_METHOD']=== 'POST'){
            $auth = new Admin($_POST);

            $errores = $auth->validar();

            if(empty($errores)){
                // verificar si usuario existe 
               $resultado = $auth ->existeUsuario();
               if(!$resultado){
                 $errores= Admin::getErrores();
               }else{
                 // verificar clave
                   $autenticado =$auth->comprobarPassword($resultado);
                   if($autenticado){
                     // autenticar al usuario
                     $auth->autenticar();
                    }else{
                        // clave incorrecta
                        $errores= Admin::getErrores();
                    }
                }
            }
        }
        $router->render('auth/login',[
            'errores'=>$errores
        ]);
    }
    public static function logout()  {
        session_start();

        $_SESSION=[];

        header('Location: /bienesraicesMVC/public/index.php');
    }

}