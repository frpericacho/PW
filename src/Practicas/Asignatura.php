<!DOCTYPE html>
<html>
<head><title>Encuesta UCA</title></head>
	<body>

		<form method="POST" action="Usuario.php">
			Selecciona una asignatura:

			<select name=asignatura>
				<?php
				
				$mysqli=mysqli_connect('localhost','root','','pw');
				
				$titulacion=$_POST["titulacion"];

				$consulta="select * from asignatura where $titulacion=titulacion";
				
				$extraccion=mysqli_query($mysqli,$consulta);
				
				$n=mysqli_num_rows($extraccion);
				
				if($n>0){
					for($i=0;$i<$n;$i++){
						$row=mysqli_fetch_array($extraccion);
							echo '<option value='.$row['id'].'>'.$row['nombre_asig'].'</option>';
					}
				}
				?>
			</select><br>

			<br>Introduzca un grupo:

			<?php
				$consulta1="Select * from grupo";
				$extrae=mysqli_query($mysqli,$consulta1);
				$n=mysqli_num_rows($extrae);

				if($n>0){
					for($i=1;$i<=$n;$i++){
						$fila=mysqli_fetch_array($extrae);
						$a=$fila['id'];
					?>
			<input type="radio" value="<?php echo"$a" ?>" name="grupo" checked><?php echo"$i" ?>
					
				<?php }
			} ?>
			<input type="submit" name="Enviar" value="Enviar">
		</form>
	</body>
</html>