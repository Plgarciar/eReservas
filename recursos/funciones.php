<?php
    function filtrar(&$array)
    {
        foreach ($array as $indice => $contenido) {
            $array[$indice] = trim($array[$indice]); // Elimina espacios antes y después de los datos
            $array[$indice] = strip_tags($array[$indice]); //Retira las etiquetas HTML y PHP de un string        
            $array[$indice] = htmlspecialchars($array[$indice]); //Traduce caracteres especiales en entidades HTML
        }
    }
    
    function filtrarArray(&$array)
    {
        foreach ($array as $indice => $dato) {
            $array[$indice] = trim($dato);
            $array[$indice] = stripslashes($dato);
            $array[$indice] = htmlspecialchars($dato);
            $array[$indice] = strip_tags($dato);
        }
    }

    function filtrarV(&$variable)
    {
        $variable = trim($variable);
        $variable = stripslashes($variable);
        $variable = htmlspecialchars($variable);
        $variable = strip_tags($variable);
    }

    function mostrarError(&$error){
        
        $errores=[
            1=>'',
            2=>'El nombre no puede tener una longitud de más de 50 caracteres',
            3=>'El nombre no puede contener números',
            4=>'El email no puede tener una longitud de más de 50 caracteres',
            5=>'El email no es válido',
            6=>'El email ya existe',
            7=>'El alias no puede tener una logitud de más de 20 caracteres',
            8=>'El alias ya existe',
            9=>'Usuario registrado correctamente',
            10=>'Los campos no pueden estar vacíos',
            11=>'El nombre y/o contraseña no pueden estar vacíos',
            12=>'El nombre y/o contraseña son incorrectos',

            // 11=>'La contraseña actual es incorrecta',
            // 12=>'Las contraseñas no coinciden',
            // 13=>'Contraseña modificada correctamente',
        ];

        if(isset($errores[$error])){
            $mensaje=$errores[$error];
            return $mensaje;
        }
    }     

?>