<main class="contenedor seccion">
        <h1>Registrar Vendedor</h1>

        <?php foreach($errores as $error):?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>
        <a href="/bienesraicesMVC/public/index.php/admin" class="boton boton-verde">volver</a>

        <form class="formulario " method="POST"  enctype="multipart/form-data">
           
        <?php include 'formulario.php'; ?>


            <input type="submit" value="Registrar Vendedor" class="boton boton-verde">
        </form>
    </main>