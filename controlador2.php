<?php
	 require_once("./capaDatos/ClsArchivo.php");
	 
	 if (version_compare(PHP_VERSION, '5.4.0', '<')) {
        if(session_id() == '') {session_start();}
    } else  {
       if (session_status() == PHP_SESSION_NONE) {session_start();}
    }
	 $codigoMateria=$_POST['codigoMateria'];	
		
	 $objArchivo = new ClsArchivo($_SESSION["usuario"]);
	 $resultado=$objArchivo->modificarMateria($codigoMateria);
	 
	 echo $resultado;
	
   
?>

