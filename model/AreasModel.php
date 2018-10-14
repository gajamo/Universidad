<?php

    class AreasModel extends ModeloBase{

        private $table;

        public function __construct($table)
        {
            $this->table="area";
            parent::__construct($this->table);

        }

        public function getArea(){

                $query="SELECT * FROM area WHERE idarea=1";
                $area=$this->ejecjtuarSql($query);
                return area;
        }

    }