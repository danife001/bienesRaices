<?php

    if(!isset($_SESSION)){
        session_start();
    }
    
    $auth = $_SESSION['login'] ?? null;
   if (!isset($inicio)){
     $inicio = false;
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bienes Raices</title>
    <link rel="stylesheet" href="\bienesraicesMVC\public\build\css\app.css">
</head>
<body>
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/bienesraicesMVC/public/index.php">
                    <img src="/bienesraicesMVC/public/build/img/logo.svg" alt="Logotipo de Bienes raices">
                </a>
                <div class="mobile-menu">
                    <img src="/bienesraicesMVC/public/build/img/barras.svg" alt="icono menu responsive">
                </div>
                <div class="derecha">
                    <img src="/bienesraicesMVC/public/build/img/dark-mode.svg" alt="modo oscuro" class="dark-mode-boton">
                    <nav class="navegacion">
                        <a href="/bienesraicesMVC/public/index.php/nosotros">Nosotros</a>
                        <a href="/bienesraicesMVC/public/index.php/propiedades">Anuncios</a>
                        <a href="/bienesraicesMVC/public/index.php/blog">Blog</a>
                        <a href="/bienesraicesMVC/public/index.php/contacto">Contacto</a>
                        <?php if($auth) : ?>
                            <a href="logout">Cerrar Sesion</a>
                         <?php endif ; ?>   
                    </nav>
                </div>
                
            </div>
            <?php  if($inicio){ ?>

            <h1>Venta de casas y departamentos exclusivos de lujo</h1>
            <?php   }?>
        </div>
    </header>



    <?php echo $contenido ?>

    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="nosotros.php">Nosotros</a>
                <a href="anuncios.php">Anuncios</a>
                <a href="blog.php">Blog</a>
                <a href="contacto.php">Contacto</a>
            </nav>
        </div>
       
        <p class="copyright">Todos los derechos reservados <?php echo date('Y') ?> &copy;</p>
    </footer>

    
    <script src="/bienesraicesMVC/public/build/js/bundle.min.js"></script>
</body>
</html>