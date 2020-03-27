<!DOCTYPE html>
<html>
<head><title>Encuesta UCA</title></head>
<body>
	<?php
	error_reporting(E_ALL&~E_NOTICE);
		$enviar=$_POST["edad"];
		$asignatura=$_POST["asignatura"];
		$grupo=$_POST["grupo"];

		if(isset($enviar)){
			$conexion=mysqli_connect('localhost','root','','pw');

			$edad=$_POST['edad'];
			$sexo=$_POST['sexo'];
			$curso_alto=$_POST['curso_alto'];
			$curso_bajo=$_POST['curso_bajo'];
			$aniomatr=$_POST['curso'];
			$veces_examen=$_POST['veces_examen'];
			$interes=$_POST['interes'];
			$tutorias=$_POST['tutorias'];
			$dificultad=$_POST['dificultad'];
			$calificacion=$_POST['calificacion'];
			$asistencia=$_POST['asistencia'];

			$consulta="insert into alumnos(edad,sexo,curso_alto,curso_bajo,aniomatr,n_examinado,interes,tutorias,dificultad,nota_esperada) values(\"$edad\",\"$sexo\",\"$curso_alto\",\"$curso_bajo\",\"$aniomatr\",\"$veces_examen\",\"$interes\",\"$tutorias\",\"$dificultad\",\"$calificacion\")";

			$inserta=mysqli_query($conexion,$consulta) or die ("No se pudo");

			$id=mysqli_insert_id($conexion);


			$prof=$_POST['profesor'];


			$consulta2="insert into encuesta(id_asignatura,id_estudiante,id_grupo,id_profesor) values($asignatura,$id,$grupo,$prof)";


			$actualiza=mysqli_query($conexion,$consulta2) or die("No se ha podido");

			mysqli_close($conexion);
			
			print ("<P>Accedamos a las cuestiones sobre la asignatura</P>\n");
	    	print ("<A HREF='Cuestiones.php'>Acceder a las cuestiones</A>\n");


		}
		else{
			?>
			<form method="POST" action="Usuario.php">

				<input type="hidden" id="asignatura" name="asignatura" value="<?php echo $asignatura; ?>">
				<input type="hidden" id="grupo" name="grupo" value="<?php echo $grupo; ?>">

				
				Seleccione al profesor que imparte la asignatura:
				<select name="profesor">
					<?php
						$conecta=mysqli_connect('localhost','root','','pw');

						$consulta1="select id,nombre_prof from profesor ,prof_asig where prof_asig.id_asignatura=$asignatura and prof_asig.id_profesor=profesor.id";
						

						$extraer=mysqli_query($conecta,$consulta1);

						$num=mysqli_num_rows($extraer);
						if($num > 0){
							for($i=0;$i<$num;$i++){
								$sol=mysqli_fetch_array($extraer);
								echo '<option value='.$sol['id'].'>'.$sol['nombre_prof'].'</option>';
							}
						}
						mysqli_close($conecta);
					?>
				</select>

				<br><br>Seleccione un rango de edad:
				<select name="edad">
					<option value=17 checked>17
					<option value=18 >18
					<option value=19 >19
					<option value=20 >20
					<option value=21 >21
					<option value=22 >22
					<option value=23 >23
					<option value=24 >24
					<option value=25 >25
					<option value=26 >+25
				</select>

				<br><br>Introduzca su sexo:
				<select name="sexo">
						<option value=Mujer checked> Mujer
						<option value=Hombre> Hombre
				</select> 

				<br><br>Curso más alto que cursa en estos momentos:
				<select name="curso_alto">
					<option value=1 checked> 1 
					<option value=2> 2
					<option value=3> 3
					<option value=4> 4
				</select>

				<br><br>Curso más bajo que cursa en estos momentos:
				<select name="curso_bajo">
					<option value=1 checked> 1 
					<option value=2> 2
					<option value=3> 3
					<option value=4> 4
				</select>

				<br><br>Curso matriculado:
				<select name="curso">
					<option value=1920 checked> 19-20
				</select>

				<br><br>Número de veces que se ha presentado a examen:
				<select name="veces_examen">
					<option value=0 checked> 0 
					<option value=1> 1
					<option value=2> 2
					<option value=3> 3
					<option value=4> 4
				</select>

				<br><br>Interes por la asignatura:
				<select name="interes">
					<option value=Nada checked> Nada 
					<option value=Algo> Algo
					<option value=Bastante> Bastante
					<option value=Mucho> Mucho
				</select>

				<br><br>Uso de tutorias:
				<select name="tutorias">
					<option value=Nada checked> Nada 
					<option value=Algo> Algo
					<option value=Bastante> Bastante
					<option value=Mucho> Mucho
				</select>

				<br><br>Dificultad de la asignatura:
				<select name="dificultad">
					<option value=Baja checked> Baja 
					<option value=Media> Media
					<option value=Alta> Alta
					<option value="Muy alta"> Muy alta
				</select>

				<br><br>Calificacion esperada:
				<select name="calificacion">
					<option value=NP checked> NP 
					<option value=Suspenso> Suspenso
					<option value=Aprobado> Aprobado
					<option value=Notable> Notable
					<option value=Sobresaliente> Sobresaliente
					<option value="Matricula de honor"> Matricula de Honor
				</select>
				<br><br>Asistencia:
				<select name="asistencia">
					<option value=0 checked> 0 
					<option value=10> 10
					<option value=20> 20
					<option value=30> 30
					<option value=40> 40
					<option value=50> 50
					<option value=60> 60
					<option value=70> 70
					<option value=80> 80
					<option value=90> 90
					<option value=100> 100
				</select>


				<input type="submit" name="Enviar" value="Enviar">
			</form>
<?php 
		}
?>
</body>
</html>