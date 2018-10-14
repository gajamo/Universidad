<?
include("../modelo/Area.php"); 
include("../control/CtrArea.php"); 
include("../control/CtrConexion.php"); 


if ($Guardar) {

    $idarea = $_POST["idarea"]; 
    $nombre = $_POST["nombre"]; 
    $fkarea = $_POST["fkarea"]; 


    $ObjArea = new Area($idarea, $nombre, $fkarea); 

    $ObjCtrArea = new CtrArea($ObjArea); 

    $ObjCtrArea->guardar(); 
    echo "<center>REGISTRO ALMACENADO</center>"; 
}

if ($Consultar) {
		
    $idarea = $_POST["idarea"]; 



    $ObjArea = new Area($idarea, '', ''); 

    $ObjCtrArea = new CtrArea($ObjArea); 
     
    $ObjCtrArea->consultar(); 

    $nombre = $ObjArea->getNombre(); 
    $fkarea = $ObjArea->getFkarea(); 

  
  echo "<center>
  <h3>Area</h3><form>
	<table border=\"1\">
		<tr>
			<td>Codigo Area:</td>
			<td><input type=\"text\" size=\"10\" maxlength=\"10\" name=\"idarea\"value='$idarea' ></td>
		</tr>
		<tr>
			<td>Nombre Area:</td>
			<td><input type=\"text\" size=\"60\" maxlength=\"60\" name=\"nombre\" value='$nombre'></td>
		</tr>
        		<tr>
			<td>C�digo Jefe:</td>
			<td><input type=\"text\" size=\"60\" maxlength=\"60\" name=\"fkarea\" value='$fkarea'></td>
		</tr>
	</table>
	<input type=\"submit\" value=\"Guardar\" name=\"Guardar\">
    <input type=\"submit\" value=\"Borrar\" name=\"Borrar\">
    <input type=\"submit\" value=\"Modificar\" name=\"Modificar\">
    <input type=\"submit\" value=\"Consultar\" name=\"Consultar\">
    <input type=\"submit\" value=\"ListarAreas\" name=\"ListarAreas\">
  </form></center>"; 
 }

if ($Modificar) {
    
    $idarea = $_POST["idarea"]; 
    $nombre = $_POST["nombre"]; 
    $fkarea = $_POST["fkarea"]; 

    $ObjArea = new Area($idarea, $nombre, $fkarea); 

    $ObjCtrArea = new CtrArea($ObjArea); 
     
    $ObjCtrArea->modificar(); 

    $nombre = $ObjArea->getNombre(); 
    $fkarea = $ObjArea->getFkarea(); 
  }

  if ($Borrar) {
    $idarea = $_POST["idarea"]; 
    $ObjArea = new Area($idarea, '', ''); 
    $ObjCtrArea = new CtrArea($ObjArea); 
    $ObjCtrArea->borrar(); 
  }

  if ($ListarAreas) { 
    $objArea = new Area(0, '', 0); 
    $objCtrArea = new CtrArea($objArea); 

    $mat = $objCtrArea->listarAreas(); 

    $x = "<table border='1'><tr><td>Codigo Area:</td><td>Nombre Area</td><td>fk area</td></tr>"; 
    for ($i = 1; $i <= $mat[1][4]; $i++) {
        $x = $x . "<tr><td>" . $mat[$i][1] . "</td><td>" . $mat[$i][2] . "</td><td>" . $mat[$i][3] . 
        "</td><td><input type='submit' value='editar' name='Editar'/></td></tr>"; 
    }
    $x = $x . "</table>"; 
  
    echo $x; 
  }

  if ($Editar) {
    echo '1'; 
  }?>