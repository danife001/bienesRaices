<?php

namespace Controllers;

use MVC\Router;
use Model\propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController{
    public static function index(Router $router){

        $propiedades = propiedad::get(3);
        $inicio = true;
       
        $router->render('paginas/index',[
            'propiedades'=> $propiedades,
            'inicio' => $inicio
        ]);
    }
    public static function nosotros(Router $router){
        $router->render('paginas/nosotros');
    }
    public static function propiedades(Router $router){

        $propiedades = propiedad::all();


        $router ->render('paginas/propiedades',[
            'propiedades' => $propiedades
        ]);
    }
    public static function propiedad(Router $router ){

        $id = validarORedireccionar('/bienesraicesMVC/public/index.php/propiedades');
        $propiedad = propiedad::find($id);
        
        $router ->render('paginas/propiedad',[
            'propiedad'=>$propiedad
        ]);
    }
    public static function blog(Router $router){
        $router ->render('/paginas/blog');
    }
    public static function entrada(Router $router){
        $router ->render('paginas/entrada');
    }
    public static function contacto(Router $router){
        $mensaje = null;

        if ($_SERVER['REQUEST_METHOD']==='POST'){

            $respuestas = $_POST['contacto'];
            $mail = new PHPMailer();

            
            // configurar envio de emails 
            $mail->isSMTP();
            $mail->Host='sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth= true;
            $mail->Username ='10ab9be8919ccc';
            $mail->Password = 'eb6b5c0d11e3b2';
            $mail->SMTPSecure = 'tls';
            $mail->Port= 2525;


            // configurar el contenido del mail 
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com','BienesRaices.com');
            $mail->Subject ='Tiene un nuevo mensaje ';


            // habilitar html 
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';


            
            // definir contenido
            $contenido = '<html>';
            $contenido .= '<p> Tienes un nuevo mensaje </p>';
            $contenido .= '<p> Nombre : '.$respuestas['nombre']. '</p>';
            
            // enviar de forma condicional 
            if($respuestas['contacto'] === 'telefono'){

                $contenido .= '<p> Telefono : '.$respuestas['telefono']. '</p>';
                $contenido .= '<p> Fecha Contacto: '.$respuestas['fecha']. '</p>';
                $contenido .= '<p> hora  Contacto: '.$respuestas['hora']. '</p>';
            }else{
                $contenido .= '<p> Email : '.$respuestas['email']. '</p>';
            }
          
            $contenido .= '<p> Mensaje : '.$respuestas['mensaje']. '</p>';
            $contenido .= '<p> Vende o Compra : '.$respuestas['tipo']. '</p>';
            $contenido .= '<p> Presupuesto : $'.$respuestas['precio']. '</p>';
            $contenido .= '<p> Prefiere ser contactado por:'.$respuestas['contacto']. '</p>';
           
            $contenido .= '</html>';

            $mail->Body =  $contenido;
            $mail->AltBody ='texto alternativo';


            // enviar el email
            if($mail->send()){
               $mensaje= "mensaje enviado";
            }else{
               $mensaje=  "el mensaje no se pudo enviar ";
            }


        }
        $router ->render('paginas/contacto',[
            'mensaje'=> $mensaje
        ]);
    }
}