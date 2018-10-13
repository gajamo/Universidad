<?php

class ControladorBase{

    public function __construct()
    {
        require_once 'EntidadBase.php';
        require_once 'ModeloBase.php';

        foreach(glob("model/*.php") as $file){
            require_once $file;
        }
    }

    public function view($vista,$datos){
        foreach($datos as $id_assoc => $valor){
            $($id_assoc) = $valor;
        }

        require_once 'core/AyudaVistas.php';
        $helper = new AyudaVistar.php;
    }


    public function redirect($controlador=CONTROLALDOR_DEFECTO,$accion=ACCION_DEFECTO){

        header("Location:index.php?controlador=".$controlador."&ccion=".$accion);


    }
}