<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
	<title>Materias Estudiante</title>
	<link rel="stylesheet" type="text/css" href="../resources/estilosMaterias.css">
	<script type="text/javascript" src="../resources/jquery-3.4.1.js"></script>
	<script type="text/javascript" src="../resources/rating.js"></script>
	<script>
	function realizarProceso(codigoMateria){			
			var parametros = {					
					"codigoMateria" : codigoMateria
			};
			$.ajax({
					data:  parametros,
					url:   '../controlador2.php',
					type:  'post',					
					success:  function (response) {
							$("#resultado"+codigoMateria).html(response);
					}
			});
	}
	</script>
	<script type="text/javascript">
	$(document).ready(function() {
		$('#columna1Ms').rating('votar.php', {maxvalue: 5, curvalue:1, id:20});
	});
	</script>
</head>
<body>
	
	<section id="slide1">
        <img src="../img/slide.jpg" width="900" height="200" alt="imagen de control de materias">
    </section>
 
	<div id="contenedor">
	<div id="fila">
		<div id="columna1M">codigo</div>
		<div id="columna1M">materia</div>
		<div id="columna1M">semestre</div>
		<div id="columna1M">numero de creditos</div>
		<div id="columna1M">cursada</div>	
		
	</div>
	<?php  
	    $vectorMaterias = $_GET; 
		for ($i = 1; $i < sizeof($vectorMaterias); $i++) {
			echo '<div id="fila">';
			echo '<div  id="columna1M">'.$vectorMaterias[$i]['codigo'].'</div>';
			echo '<div  id="columna1M">'.$vectorMaterias[$i]['nombre'].'</div>';
			echo '<div  id="columna1M">'.$vectorMaterias[$i]['semestre'].'</div>';
			echo '<div  id="columna1Ms" >'.$vectorMaterias[$i]['creditos'];  
			echo '<div class="star-rating">';
			$num=(int)$vectorMaterias[$i]['creditos'];
			for($j=1;$j<=$num;$j++)
			{			 
				echo '<a href="#">&#9733;</a>';			
			}
			echo '</div>';
			echo '</div>';
			echo '<div  id="columna1M">'.'<a href="javascript:;" onclick="realizarProceso('.$vectorMaterias[$i]['codigo'].');"><span id="resultado'.$vectorMaterias[$i]['codigo'].'">'.$vectorMaterias[$i]['cursada'].'</span></a></div>';	
			echo '</div>';
		}
	
	?>
	
	</div>
	<section id = "DerechosAutor1">
                    <footer>
                        <p>
                            <font face = "tahoma" color = "black" size = "3">
                                (c) Todos los derechos reservados - Victor H Rendon & Darly Burbano <br>
                                Diseñado por victorhrendon@unicauca.edu.co & darlybur@unicauca.edu.co
                            </font>
                        </p>
                    </footer>
                </section>
</body>
</html>