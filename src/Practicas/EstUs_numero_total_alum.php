<!DOCTYPE html>
<html>
<head><title>Estadísticas</title></head>
	<body>
        <?php
            error_reporting(E_ALL & ~E_NOTICE);
            $enviar = $_POST['Enviar'];

            if (isset($enviar)) {
                $conexion = mysqli_connect('db', 'root', 'adminB4sh#77#', 'pw');

                $consulta = 'select id_estudiante from encuesta where id_asignatura='.$_POST['asignatura'].'';

                $extraer = mysqli_query($conexion, $consulta);

                $n = mysqli_num_rows($extraer);

                $cons = 'select id_estudiante from encuesta';

                $ext = mysqli_query($conexion, $cons);

                $u = mysqli_num_rows($ext);

                if ($n > 0) {
                    echo "<TABLE>\n";
                    echo "<TR>\n";
                    echo "<TH>Estudiantes escuela</TH>\n";
                    echo "<TH>Porcentaje</TH>\n";
                    echo "<TH>Representacion grafica</TH>\n";
                    echo "</TR>\n";

                    $porcentaje1 = 100;
                    echo "<TR>\n";
                    echo "<TD CLASS='derecha'>{$u}</TD>\n";
                    echo "<TD CLASS='derecha'>{$porcentaje1} %</TD>\n";
                    echo "<TD CLASS='izquierda'><IMG SRC='img/puntoamarillo.gif' HEIGHT='10' WIDTH='".
                                $porcentaje * 4 ."'></TD>\n";
                    echo "</TR>\n";
                } else {
                    echo'No hay alumnos cursando la asignatura';
                }
                mysqli_close($conexion);
            } else {
                ?>
					<form method="POST" action="EstUs_numero_total_alum.php">

						Selecciona una asignatura:

						<select name=asignatura>
						<?php

                            $mysqli = mysqli_connect('db', 'root', 'adminB4sh#77#', 'pw');

                $consulta = 'select * from asignatura';

                $extraccion = mysqli_query($mysqli, $consulta);

                $n = mysqli_num_rows($extraccion);

                if ($n > 0) {
                    for ($i = 0; $i < $n; ++$i) {
                        $row = mysqli_fetch_array($extraccion);
                        echo '<option value='.$row['id'].'>'.$row['id'].'->'.$row['nombre_asig'].'</option>';
                    }
                } ?>
						</select><br>
						<input type="submit" name="Enviar" value="Enviar">
					</form>
				<?php
                mysqli_close($mysqli);
            }
                ?>
	</body>
</html>