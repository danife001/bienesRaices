<main class="contenedor seccion">
        <h1>Contacto</h1>
        <?php
            if($mensaje){?>
                <p class='alerta exito'><?php echo $mensaje ?> </p>;
         <?php   } ?>

        <picture>
            <source srcset="/bienesraicesMVC/public/build/img/destacada3.webp" type="image/webp">
            <source srcset="/bienesraicesMVC/public/build/img/destacada3.jpg" type="image/jpg">
            <img loading="lazy" src="/bienesraicesMVC/public/build/img/destacada3.jpg" alt="imagen contacto">
        </picture>
        <h2>llene el formulario de contacto</h2>
        <form class="formulario" action="contacto " method="post">
            <fieldset>
                <legend>Informacion Personal</legend>

                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu nombre" id="nombre" name="contacto[nombre]" required>

                

                

                <label for="mensaje" >Mensaje:</label>
                <textarea id="mensaje" name="contacto[mensaje]" required> </textarea>
            </fieldset>

            <fieldset>
                <legend>Informacion sobre la propiedad</legend>
                <label for="opciones"   >vende o Comprar:</label>
                <select  id="opciones" name="contacto[tipo]" required>
                    <option value=""disabled selected>seleccione</option>
                    <option value="Comprar">Compra</option>
                    <option value="Vende">Vende</option>
                </select>
                <label for="presupuesto" required>Precio o presupuesto</label>
                <input type="number" placeholder="tu precio o presupuesto" id="presupuesto" name="contacto[precio]">

            </fieldset>

            <fieldset>
                <legend>Informacion sobre la propiedad</legend>

                <p>Como desea ser contactado</p>
                <div class="forma-contacto" required>
                    <label for="contactar-telefono">Telefono </label>
                    <input  type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]">
                    <label for="contactar-email">Email </label>
                    <input  type="radio" value="email" id="contactar-email"  name="contacto[contacto]">
                </div>
                
                <div id="contacto"></div>
                
                
            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>