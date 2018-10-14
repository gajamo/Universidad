<?
    class Area extends EntidadBase{
        private $idarea, $nombre, $fkarea;


        public function __construct()
        {   
            $table="area";
            parent::__construct($table);
        }

        public function setIdarea($idarea){
            $this->idarea=    $idarea;
        }

        public function getIdarea(){
            return  $this->idarea;
        }

        public function setNombre($nombre){
            $this->nombre=  $nombre;
        }

        public function getNombre(){
            return  $this->nombre;
        }

        public function setFkarea($fkarea){
            $this->fkarea= $fkarea;
        }

        public function getFkarea(){
            return  $this->fkarea;
        }

        public function save(){
            $query="INSERT INTO area (idarea,nombre,area_idarea) "
                . "VALUES (NULL,"
                . "'".$this->nombre."',"
                . $this->fkarea.");";
            $save=$this->db()->query($query);
            
            return $save;
        }

    }
