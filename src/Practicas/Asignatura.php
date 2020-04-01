<!DOCTYPE html>
<html>
<head><title>Encuesta UCA</title></head>
	<body>

		<form method="POST" action="Usuario.php">
			Selecciona una asignatura:

			<select name=asignatura>
				<?php

                $mysqli = mysqli_connect('db', 'root', 'adminB4sh#77#', 'pw');

                $titulacion = $_POST['titulacion'];

                $consulta = "select * from asignatura where {$titulacion}=titulacion";

                $extraccion = mysqli_query($mysqli, $consulta);

                $n = mysqli_num_rows($extraccion);

                if ($n > 0) {
                    for ($i = 0; $i < $n; ++$i) {
                        $row = mysqli_fetch_array($extraccion);
                        echo '<option value='.$row['id'].'>'.$row['nombre_asig'].'</option>';
                    }
                }
                ?>
			</select><br>

			<br>Introduzca un grupo:

			<input type="radio" value="1" name="grupo" checked>1
			<input type="radio" value="2" name="grupo">2
			<input type="radio" value="3" name="grupo">3
			<input type="submit" name="Enviar" value="Enviar">
		</form>
	</body>
</html>