<?php

require_once 'config/global.php';
require_once 'core/ControladorBase.php';
require_once 'core/ControladorFronta.func.php';

if (isset($_GET["controller"]))
{
    $controllerObj = cargarControlador($_GET["controller"]);
}
else
{   
    $controllerObj = cargarControlador(CONTROLALDOR_DEFECTO);
}

lanzarAccion($controllerObj);

