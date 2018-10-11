<?
    class CtrArea{
	var $objArea;
	var $recordSet;
        function CtrArea($objArea){

            $this->objArea=$objArea;
        }

        function guardar(){

            $idarea=$this->objArea->getIdarea();
    	    $nombre=$this->objArea->getNombre();
            $fkarea=$this->objArea->getFkarea();
        
            $bd="repo";
            $ObjConexion=new CtrConexion();
            $enlace=$ObjConexion->conectar('localhost',$bd,'root','');

            $consulta="insert into area values(".$idarea.",'".$nombre."',".$fkarea.")";

		    $recordSet=$ObjConexion->ejecutarSql($bd,$consulta);
            $ObjConexion->cerrar($enlace);

		    if (!$recordSet)
		    {
			    die(" ERROR CON EL COMANDO SQL: ".mysql_error());
		    }
		    else
		    {
	            $this->recordSet=$recordSet;
		    }   
        }


        function consultar(){

        $idarea=$this->objArea->getIdarea();
        $bd="repo";
        $ObjConexion=new CtrConexion();
        $enlace=$ObjConexion->conectar('localhost',$bd,'root','');

        $consulta="select * from area where idArea =".$idarea;
       
		    $recordSet=$ObjConexion->ejecutarSql($bd,$consulta);

  
        $registro = mysql_fetch_array($recordSet);


        $this->objArea->setNombre($registro['nombre']);


        $this->objArea->setFkarea($registro['fkarea']);

        $ObjConexion->cerrar($enlace);
		
		if (!$recordSet)
		{
			die(" ERROR CON EL COMANDO SQL: ".mysql_error())."<br>";
		}
		else
		{
		
	    return $this->objArea;

		}

        }

 function borrar(){

        $idarea=$this->objArea->getIdarea();
        $bd="repo";
        $ObjConexion=new CtrConexion();
        $enlace=$ObjConexion->conectar('localhost',$bd,'root','');

        $consulta="delete from area where idArea =".$idarea;
       
        $ObjConexion->ejecutarSql($bd,$consulta);

        $ObjConexion->cerrar($enlace);
    
    if (!$recordSet)
    {
      die(" ERROR CON EL COMANDO SQL: ".mysql_error())."<br>";
    }
    else
    {
    
      return $this->objArea;

    }

        }

        


        function listarAreas(){

        $bd="repo";
        $ObjConexion=new CtrConexion();
        $enlace=$ObjConexion->conectar('localhost',$bd,'root','');
        $consulta="select * from area";
              $recordSet=$ObjConexion->ejecutarSql($bd,$consulta);


              $numRegistros = mysql_num_rows($recordSet);

              $mat[1][4]= $numRegistros;
              $i=1;


              while ($registro = mysql_fetch_array($recordSet)){

              $mat[$i][1]=  $registro['idarea'];
              $mat[$i][2]=  $registro['nombre'];
              $mat[$i][3]=  $registro['fkarea'];
              $i=$i+1;
               }


              mysql_free_result($recordSet);
              $ObjConexion->cerrar($enlace);


              return $mat;
        }

        function modificar(){

           $idarea=$this->objArea->getIdarea();
          $nombre=$this->objArea->getNombre();
          $fkarea=$this->objArea->getFkarea();

       

        $bd="repo";
        $ObjConexion=new CtrConexion();
        $enlace=$ObjConexion->conectar('localhost',$bd,'root','');


        $consulta="update area set nombre='".$nombre."', fkarea='".$fkarea."' where idarea =".$idarea;
         

         $recordSet=$ObjConexion->ejecutarSql($bd,$consulta);
         $ObjConexion->cerrar($enlace);
         if (!$recordSet){
          die(" ERROR CON EL COMANDO SQL: ".mysql_error());
        }


    }

    }


?>