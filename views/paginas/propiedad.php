<main class="contenedor seccion contenido-centrado">
        <h1> <?php echo $propiedad->titulo ?></h1>
        
        <img loading="lazy" src="/bienesraicesMVC/public/imagenes/<?php echo $propiedad->imagen ?>" alt="anuncio">

        
        <div class="resumen-propiedad">
            <p class="precio">$<?php echo $propiedad->precio ?></p>
            <ul class="icono-caracteristicas">
                <li>
                    <img class="icono" src="/bienesraicesMVC/public/build/img/icono_wc.svg" alt="icono wc">
                    <P><?php echo $propiedad->wc ?></P>
                </li>
                <li>
                    <img  class="icono" src="/bienesraicesMVC/public/build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <P><?php echo $propiedad->estacionamiento ?></P>
                </li>   
                <li>
                    <img class="icono" src="/bienesraicesMVC/public/build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <P><?php echo $propiedad->habitaciones ?></P>
                </li>      
            </ul>
            <p><?php echo $propiedad->descripcion ?></p>
            <p><?php echo $propiedad->descripcion ?></p>
        </div>
    </main>