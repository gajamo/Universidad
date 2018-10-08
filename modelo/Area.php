<?
class Area{
	    var $idarea=0;
        var $nombre="";
        var $fkarea="";

        function Area($idarea,$nombre,$fkarea){

        		
	    $this->idarea=    $idarea;
        $this->nombre=    $nombre;
        $this->fkarea=   $fkarea;
        	
        }
        function setIdarea($idarea){
         $this->idarea=    $idarea;
        }
        function getIdarea(){
		return  $this->idarea;
        }
        function setNombre($nombre){
         $this->nombre=  $nombre;
        }
        function getNombre(){
		return  $this->nombre;
        }
        function setFkarea($fkarea){
         $this->fkarea= $fkarea;
        }
        function getFkarea(){
		return  $this->fkarea;
        }

}
?>