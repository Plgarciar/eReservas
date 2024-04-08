<?php ob_start();?>

<h2>Contacta con nosotros</h2>

<form action="" id="formContacto">
    <label for=""></label>
    <input type="text" name="" id="" placeholder="Nombre">

    <label for=""></label>
    <input type="tel" name="" id="" placeholder="Teléfono">

    <label for=""></label>
    <input type="email" name="" id="" placeholder="Dirección de correo electrónico">

    <label for=""></label>
    <input type="text" name="" id="" placeholder="Asunto">

    <label for=""></label>
    <textarea name="" id="" cols="30" rows="10" placeholder="Mensaje"></textarea>

    <input type="submit" value="Enviar" >
</form>
<!--cambiar mapa -->
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3013.651532824039!2d-5.552724884587869!3d40.9453037793072!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd3f3ad804625da5%3A0x52d1a6533c857ca6!2sAyuntamiento%20de%20Calvarrasa%20de%20Abajo!5e0!3m2!1ses!2ses!4v1622708800408!5m2!1ses!2ses" allowfullscreen=""></iframe>

<?php $contenido = ob_get_clean();?>

<?php include 'estructura.php' ;?>