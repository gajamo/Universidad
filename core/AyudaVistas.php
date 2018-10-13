<?php

class AyudaVistas {

    public function url($controlador=CONTROLALDOR_DEFECTO,$accion=ACCION_DEFECTO)
    {

        $urlString = "index.php?controlador=".$controlador."&ccion=".$accion;
        return $urlString; 
    }
}