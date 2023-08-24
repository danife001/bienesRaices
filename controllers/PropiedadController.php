<?php

namespace Controllers;

use MVC\Router;
use Model\propiedad;
use Model\vendedor;
use Intervention\Image\ImageManagerStatic as Image;


class PropiedadController{
    public static function index(Router $router) {

        $propiedades = propiedad::all();
        $vendedores = vendedor::all();

        $resultado = $_GET['resultado'] ?? null;

      $router->render('/propiedades/admin',[
        'propiedades' => $propiedades,
        'resultado' => $resultado,
        'vendedores' => $vendedores       

      ]);
    }

    public static function crear(Router $router){
        
        $propiedad = new propiedad;
        $vendedores = vendedor::all();
        $errores = propiedad::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $propiedad = new propiedad($_POST['propiedad']);

            

            // generar un nombre unico 
            $nombreImagen = md5(uniqid(rand(),true)). ".jpg";

           //  seterar la imagen 
           if($_FILES['propiedad']['tmp_name']['imagen']){
               $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
               $propiedad -> setImagen($nombreImagen);

           }
          
           // validar imagen 

           $errores= $propiedad->validar();

           
           
           if(empty($errores)){

               if(!is_dir(CARPETA_IMAGENES)){
                   mkdir(CARPETA_IMAGENES);
               }
               $image->save(CARPETA_IMAGENES.$nombreImagen);
               
              $propiedad->guardar();
              
            
           }
        }


        $router->render('propiedades/crear', [
           
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores'=>$errores
            
        ]);
        
    }
    public static function actualizar(Router $router){
        $id = validarORedireccionar('/bienesraicesMVC/public/index.php/admin');


        $propiedad =propiedad::find($id);
        $vendedores = vendedor::all();
        $errores = propiedad::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $argc = $_POST['propiedad'];



            $propiedad->sincronizar($argc);
            // validar archivos 
           $errores=$propiedad->validar();
            // subida de archivos 

            // generar un nombre unico 
            $nombreImagen = md5(uniqid(rand(),true)). ".jpg";
           
            if($_FILES['propiedad']['tmp_name']['imagen']){
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $propiedad -> setImagen($nombreImagen);
              

            }
            if(empty($errores)){
                if($_FILES['propiedad']['tmp_name']['imagen']){
                $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
            $propiedad->guardar();
               
            }
                
        }

        $router->render('/propiedades/actualizar',[


            'propiedad'=>$propiedad,
            'vendedores' =>$vendedores,
            'errores' =>$errores
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
                    $propiedad = propiedad::find($id);
                    $propiedad->eliminar();               
                }

            }
        }
    }
    
}
?>
