<fieldset>
    <legend>Informacion General</legend>

    <label for="nombre">nombre:</label>
    <input type="text" id="nombre" name="vendedor[nombre]" placeholder="nombre vendedor" value="<?php echo s($vendedor->nombre); ?>">

    <label for="apellido">apellido:</label>
    <input type="text" id="apellido" name="vendedor[apellido]" placeholder="apellido vendedor" value="<?php echo s($vendedor->apellido); ?>">


</fieldset>


<fieldset>
    <legend>Informacion Extra</legend>
    <label for="telefono">telefono:</label>
    <input type="text" id="telefono" name="vendedor[telefono]" placeholder="telefono vendedor" value="<?php echo s($vendedor->telefono); ?>">

</fieldset>