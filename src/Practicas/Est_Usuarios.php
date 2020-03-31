<!DOCTYPE html>
<html>
<head><title>Estadísticas Alumnos</title></head>
	<body>
		<?php
			error_reporting(E_ALL&~E_NOTICE);
			$enviar=$_POST["Enviar"];
			
			//Muestra la cantidad de alumnos que estudian x asignatura:

			if(isset($enviar)){
				$conexion=mysqli_connect('localhost','root','','pw');

				$consulta="select id_estudiante from encuesta where id_asignatura=".$_POST['asignatura']."";

				$extraer=mysqli_query($conexion,$consulta);

				$n=mysqli_num_rows($extraer);

				$cons="select id_estudiante from encuesta";
			
				$ext=mysqli_query($conexion,$cons);

				$u=mysqli_num_rows($ext);


				if($n>0){
					 	print ("<TABLE>\n"); 
								print ("<TR>\n");
     						 	print ("<TH>Estudiantes ".$_POST['asignatura']."</TH>\n");
  						    	print ("<TH>Porcentaje</TH>\n");
    						  	print ("<TH>Representacion grafica</TH>\n");
     						 	print ("</TR>\n");


					 			$porcentaje=round((($n/$u)*100),2);
						      	print ("<TR>\n");
     						 	print ("<TD CLASS='derecha'>$n</TD>\n");
     						 	print ("<TD CLASS='derecha'>$porcentaje %</TD>\n");
      							print ("<TD CLASS='izquierda'><IMG SRC='img/puntoamarillo.gif' HEIGHT='10' WIDTH='" .
        						$porcentaje*4 . "'></TD>\n");
      							print ("</TR>\n");

      							echo"<br><br>";

      							print ("<TABLE>\n"); 
								print ("<TR>\n");
     						 	print ("<TH>Estudiantes escuela</TH>\n");
  						    	print ("<TH>Porcentaje</TH>\n");
    						  	print ("<TH>Representacion grafica</TH>\n");
     						 	print ("</TR>\n");


					 			$porcentaje1=100;
						      	print ("<TR>\n");
     						 	print ("<TD CLASS='derecha'>$u</TD>\n");
     						 	print ("<TD CLASS='derecha'>$porcentaje1 %</TD>\n");
      							print ("<TD CLASS='izquierda'><IMG SRC='img/puntoamarillo.gif' HEIGHT='10' WIDTH='" .
        						$porcentaje*4 . "'></TD>\n");
      							print ("</TR>\n");
					 }
					 else{
					 	echo"No hay alumnos cursando la asignatura";
					 }
					 mysqli_close($conexion);
					}
			else{
					?>

					<form method="POST" action="Est_Usuarios.php">

						Selecciona una asignatura:

						<select name=asignatura>
						<?php
				
						$mysqli=mysqli_connect('localhost','root','','pw');

						$consulta="select * from asignatura";
				
						$extraccion=mysqli_query($mysqli,$consulta);
				
						$n=mysqli_num_rows($extraccion);
				
						if($n>0){
							for($i=0;$i<$n;$i++){
								$row=mysqli_fetch_array($extraccion);
								echo '<option value='.$row['id'].'>'.$row['id']."->".$row['nombre_asig'].'</option>';
							}
						}
						?>
						</select><br>
						<input type="submit" name="Enviar" value="Enviar">
					</form>
				<?php
				mysqli_close($mysqli);
				}
				?>
	</body>
</html>