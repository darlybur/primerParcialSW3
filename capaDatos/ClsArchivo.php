<?php


class ClsArchivo {

	var $nombreArchivo;
	function ClsArchivo($codigo)
	{
		$this->nombreArchivo='./materias/'.$codigo.'.json';
	}
	
   function crearArchivoJson()
   {	  
		
		$bandera=false;
        $fichero = './materias/plantilla.json';
		$nuevo_fichero = $this->nombreArchivo;

		if (copy($fichero, $nuevo_fichero)) {
			$bandera=true;
		}
		
		return $bandera;
   }
   
   function verificarExisteArchivo()
   {
	   
	   return file_exists($this->nombreArchivo);
   }
   
   function obtenerJson()
   {
	   $json = file_get_contents($this->nombreArchivo);

		$vectorMaterias = json_decode($json,true);
		return $vectorMaterias;
   }
   
   function modificarMateria($codigoMateria)
   {
	   
	   $resultado='si';
	   $json = file_get_contents($this->nombreArchivo);

		$vectorMaterias = json_decode($json,true);
		
		for($i=0;$i<sizeof($vectorMaterias);$i++)
		{
			if(strcmp($vectorMaterias[$i]['codigo'],$codigoMateria)==0)
			{
				if(strcmp($vectorMaterias[$i]['cursada'],'si')==0)
				{
					$vectorMaterias[$i]['cursada']='no';
					$resultado='no';
				}
				else
				{
					$vectorMaterias[$i]['cursada']='si';
				}
				$bandera=true;
				break;
			}
		}
		$vectorMateriasModificado=json_encode($vectorMaterias);
		
		$fp = fopen($this->nombreArchivo, 'w');
		fwrite($fp, $vectorMateriasModificado);
		fclose($fp);
		
		return $resultado;	   
   }

} 

?>