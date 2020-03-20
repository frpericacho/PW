<!DOCTYPE html>
<html>
<head><title>Encuesta UCA</title></head>
	<body>

		<form name="Encuesta Satisfaccion" method="POST" action="Alumno.php">
			Selecciona una titulacion <br>

			<select name="Asignatura">
				<?php
                $mysqli = mysqli_connect('bd', 'root', 'adminB4sh#77#', 'pw');
                $titulacion = $_POST['titulacion'];
                $consulta = "select cod_asig, nom_asig from Asignatura where cod_tit={$titulacion}";
                $n = mysqli_num_rows($consulta);
                if ($n > 0) {
                    for ($i = 0; $i < $n; ++$i) {
                        $row = mysqli_fetch_assoc($consulta);
                        echo'<option value="'.$fila['cod_asig'].'">'.$fila['nom_asig'].'</option>';
                    }
                }
                mysqli_close($consulta);

                ?>
	</body>
</html>
