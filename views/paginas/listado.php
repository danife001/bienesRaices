
<div class="contenedor-anuncios">
    <?php foreach($propiedades as $propiedad) {?>
          

                
            <div class="anuncios">
                
                <img loading="lazy" src="/bienesraicesMVC/public/imagenes/<?php echo $propiedad->imagen ?>" alt="anuncio">
                
                <div class="contenido-anuncio">
                    <h3><?php echo $propiedad->titulo ?></h3>
                    <p><?php echo $propiedad->descripcion ?></p>
                    <p class="precio">$ <?php echo $propiedad->precio ?></p>
                    <ul class="icono-caracteristicas">
                        <li>
                            <img class="icono" src="/bienesraicesMVC/public/build/img/icono_wc.svg" alt="icono wc">
                            <P><?php echo $propiedad->wc ?></P>
                        </li>
                        <li>
                            <img class="icono" src="/bienesraicesMVC/public/build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                            <P><?php echo $propiedad->estacionamiento ?></P>
                        </li>   
                        <li>
                            <img class="icono" src="/bienesraicesMVC/public/build/img/icono_dormitorio.svg" alt="icono habitaciones">
                            <P><?php echo $propiedad->habitaciones ?></P>
                        </li>      
                    </ul>

                    <a href="/bienesraicesMVC/public/index.php/propiedad?id=<?php echo $propiedad->id ?>" class="boton-amarillo-block">
                        Ver Propiedad
                    </a>
                </div> <!--contenido anuncio  -->               
            </div> <!--anuncio  -->
            <?php } ?>
        </div> <!-- contenedor anuncio -->
