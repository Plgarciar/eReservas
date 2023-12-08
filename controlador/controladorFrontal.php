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
        'controller' => 'ControladorInicio',//nombre del controlador (nombre de la clase)
        'action' => 'login', //nombre del método de esa clase
    ),
    'registro' => array(
        'controller' => 'ControladorInicio',//nombre del controlador (nombre de la clase)
        'action' => 'registro', //nombre del método de esa clase
    ),
    'validar' => array(
        'controller' => 'ControladorInicio',//nombre del controlador (nombre de la clase)
        'action' => 'validar', //nombre del método de esa clase
    ),
    'modificarDatos' => array(
        'controller' => 'ControladorInicio',//nombre del controlador (nombre de la clase)
        'action' => 'modificarDatos', //nombre del método de esa clase
    ),
    'logout' => array(
        'controller' => 'ControladorInicio',//nombre del controlador (nombre de la clase)
        'action' => 'logout', //nombre del método de esa clase
    ),


    'inicio' => array(
        'controller' => 'ControladorReservas',//nombre del controlador (nombre de la clase)
        'action' => 'inicio', //nombre del método de esa clase
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