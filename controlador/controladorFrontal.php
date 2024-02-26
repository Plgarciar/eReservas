<?php
//Autocarga de clases
const DIR = [0 => "controlador/", 1 => "modelo/"];
spl_autoload_register(function ($clase) {
    if (file_exists(DIR[0] . $clase . ".php")) require DIR[0] . $clase . ".php";
    if (file_exists(DIR[1] . $clase . ".php")) require DIR[1] . $clase . ".php";
    // if (file_exists(DIR[2] . $clase . ".php")) require DIR[2] . $clase . ".php";
});

$map=array(
    'home' => array(
        'controller' => 'ControladorInicio',//nombre del controlador (nombre de la clase)
        'action' => 'home', //nombre del método de esa clase
    ),
    'login' => array(
        'controller' => 'ControladorInicio',
        'action' => 'login', 
    ),
    'registro' => array(
        'controller' => 'ControladorInicio',
        'action' => 'registro', 
    ),
    'validar' => array(
        'controller' => 'ControladorInicio',
        'action' => 'validar', 
    ),
    'modificarDatos' => array(
        'controller' => 'ControladorInicio',
        'action' => 'modificarDatos',
    ),
    'logout' => array(
        'controller' => 'ControladorInicio',
        'action' => 'logout', 
    ),

    'inicio' => array(
        'controller' => 'ControladorReservas',
        'action' => 'inicio', 
    ),
    'instalaciones' => array(
        'controller' => 'ControladorReservas',
        'action' => 'instalaciones', 
    ),
    'reservas' => array(
        'controller' => 'ControladorReservas',
        'action' => 'reservas', 
    ),    
    'contacto' => array(
        'controller' => 'ControladorReservas',
        'action' => 'contacto', 
    ),
   

);

if(!isset($_SESSION)){session_start();};

if (isset($_REQUEST['ctl'])) {
    if (isset($map[$_REQUEST['ctl']])) {
        $ruta = $_REQUEST['ctl'];
    } else {
        echo '<p><h2>Error 404: No existe la ruta <i>' . $_REQUEST['ctl'] . '</h2></p>';
        exit;
    }
} else {
    //si no existe ctl en la url, tomará homo como valor por defecto, la página inicial
    $ruta = 'home';
}

$controlador = $map[$ruta];

if (method_exists($controlador['controller'], $controlador['action'])) {
    call_user_func(

        array(
            new $controlador['controller'],
            $controlador['action']
        )
    );
} else {
    echo '<p><h2>Error 404: El controlador <i>' . $controlador['controller'] . '->' . $controlador['action'] . '</i> no existe</h2></p>';
}  
?>