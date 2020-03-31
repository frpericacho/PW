<!DOCTYPE html>
<html>
<head><title>Estadística Profesor</title></head>
	<body>

		<?php
				error_reporting(E_ALL&~E_NOTICE);
				$enviar=$_POST["Enviar"];

				if(isset($enviar)){
					 $conexion = mysqli_connect('localhost', 'root', '', 'pw');

					 $consulta="select respuesta from respuestas where respuestas.id_cuestion=".$_POST['cuestion']." and respuestas.id_profesor=".$_POST['profesor']."";

					 $extraer=mysqli_query($conexion,$consulta);

					 $nu=mysqli_num_rows($extraer);

					 $num=0;

					 if($nu>0){
						for($i=1;$i<=$nu;$i++){

					 		$sol=mysqli_fetch_array($extraer);
					 			$num=$num+$sol['respuesta'];
					 	}
					 			print ("<TABLE>\n"); 
								print ("<TR>\n");
      							print ("<TH>Cuestion nº</TH>\n");
     						 	print ("<TH>Media</TH>\n");
  						    	print ("<TH>Porcentaje</TH>\n");
    						  	print ("<TH>Representacion grafica</TH>\n");
     						 	print ("</TR>\n");


					 			$porcentaje=round((($num/$nu)*100)/5,2);
						      	print ("<TR>\n");
     							print ("<TD CLASS='izquierda'>".$_POST['cuestion']." </TD>\n");
     						 	print ("<TD CLASS='derecha'>$num</TD>\n");
     						 	print ("<TD CLASS='derecha'>$porcentaje %</TD>\n");
      							print ("<TD CLASS='izquierda'><IMG SRC='img/puntoamarillo.gif' HEIGHT='10' WIDTH='" .
        						$porcentaje*4 . "'></TD>\n");
      							print ("</TR>\n");

					 }
					 else{
					 	echo"No hay contenido que procesar";
					 }
					 mysqli_close($conexion);
				}

				else{
					?>

					<form method="POST" action="Est_Profesores.php">

						Elige profesor:

						<select name="profesor">

							<?php
								$conecta=mysqli_connect('localhost','root','','pw');
								$consulta1="select id,nombre_prof from profesor";
								$ex=mysqli_query($conecta,$consulta1);

								$nume=mysqli_num_rows($ex);
								if($nume > 0){
									for($i=1;$i<=$nume;$i++){
										$so=mysqli_fetch_array($ex);
										echo '<option value='.$so['id'].'>'.$so['nombre_prof'].'</option>';
									}
								}

							?>
						</select><br>
							Elige cuestion:
							<select name="cuestion">
								<?php
									$consulta2="select id,cuestion1 from cuestiones";
									$e=mysqli_query($conecta,$consulta2);
									$numero=mysqli_num_rows($e);
									if($numero>0){
										for($i=1;$i<=$numero;$i++){
											$s=mysqli_fetch_array($e);
											echo '<option value='.$s['id'].'>'.$s['cuestion1'].'</option>';
										}
									}

								?>
							</select><br>
						<input type="submit" name="Enviar" value="Enviar">
					</form>
				<?php
				mysqli_close($conecta);
				}
				?>

	</body>
</html>