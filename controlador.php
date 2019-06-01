<?php
	 require_once("./capaDatos/ClsArchivo.php");
	 
	 $codigo=$_POST['codigo'];
		
	if (version_compare(PHP_VERSION, '5.4.0', '<')) {
        if(session_id() == '') {session_start();}
    } else  {
       if (session_status() == PHP_SESSION_NONE) {session_start();}
    }	
	$_SESSION["usuario"] = $codigo;
	
	 $objArchivo = new ClsArchivo($codigo);
	 if( $objArchivo->verificarExisteArchivo() == true )
	 {
		$vectorMaterias=$objArchivo->obtenerJson();	
		ob_start();	
		$vectorAEnviar=http_build_query($vectorMaterias);
		header('Location: ./vistas/vistaMaterias.php?'.$vectorAEnviar);
		ob_end_flush();
		die();
		
	 }
	else
	{		
		$objArchivo->crearArchivoJson();	
		$vectorMaterias=$objArchivo->obtenerJson();	
		ob_start();	
		$vectorAEnviar=http_build_query($vectorMaterias);
		header('Location: ./vistas/vistaMaterias.php?'.$vectorAEnviar);
		ob_end_flush();
		die();
	}
		
   
?>

