<main class="contenedor seccion">
        <?php
        if($resultado) {

                $mensaje = mostrarNotificacion(intval($resultado));
                if($mensaje){ ?>
                <p class="alerta exito"><?php echo s($mensaje)  ?> </p>
            <?php    }
                }
            ?>
      

        <a href="/bienesraicesMVC/public/index.php/propiedades/crear" class="boton boton-verde">Nueva Propiedad</a>
        <a href="/bienesraicesMVC/public/index.php/vendedores/crear" class="boton boton-amarillo">Nuevo Vendedor</a>
            <h2>propiedades</h2>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            
            <tbody><!-- mostrar los resultados  -->
                <?php foreach( $propiedades as $propiedad): ?>
                <tr>
                    <td><?php echo $propiedad->id ; ?></td>
                    <td><?php echo $propiedad->titulo ;?></td>
                    <td> <img src="../imagenes/<?php echo $propiedad->imagen ?>" class="imagen-tabla"></td>
                    <td>$ <?php echo $propiedad->precio ;?></td>
                    <td>
                        <form method="POST" class="w-100" action="propiedades/eliminar">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id;?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="/bienesraicesMVC/public/index.php/propiedades/actualizar?id=<?php echo $propiedad->id; ?>" class="boton-verde-block">Actualizar</a>
                        </td>
                </tr>
                <?php endforeach; ?>
            </tbody>


            </table>
        <h2>vendedores</h2>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            
            <tbody><!-- mostrar los resultados  -->
                <?php foreach( $vendedores as $vendedor): ?>
                <tr>
                    <td><?php echo $vendedor->id ; ?></td>
                    <td><?php echo $vendedor->nombre .' ' .$vendedor->apellido ;?></td>
                    <td> <?php echo $vendedor->telefono ;?></td>
                    
                    <td>
                        <form method="POST" class="w-100" action="vendedores/eliminar">
                            <input type="hidden" name="id" value="<?php echo $vendedor->id;?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="/bienesraicesMVC/public/index.php/vendedores/actualizar?id=<?php echo $vendedor->id; ?>" class="boton-verde-block">Actualizar</a>
                        </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </table>

</main>