<!DOCTYPE html>
<html>
<head><title>Estadísticas Asignatura</title></head>
	<body>
		<?php
            error_reporting(E_ALL & ~E_NOTICE);
            $enviar = $_POST['Enviar'];

            //Muestra la cantidad de alumnos que estudian x asignatura:

            if (isset($enviar)) {
                $conexion = mysqli_connect('db', 'root', 'adminB4sh#77#', 'pw');

                $consulta = 'select id from profesor where id IN(select id_profesor from prof_asig where prof_asig.id_asignatura='.$_POST['asignatura'].')';

                $extraer = mysqli_query($conexion, $consulta);

                $n = mysqli_num_rows($extraer);

                $cons = 'select id from profesor';

                $extra = mysqli_query($conexion, $cons);

                $u = mysqli_num_rows($extra);

                if ($n > 0) {
                    echo "<TABLE>\n";
                    echo "<TR>\n";
                    echo '<TH>Profesores '.$_POST['asignatura']."</TH>\n";
                    echo "<TH>Porcentaje</TH>\n";
                    echo "<TH>Representacion grafica</TH>\n";
                    echo "</TR>\n";

                    $porcentaje = round((($n / $u) * 100), 2);
                    echo "<TR>\n";
                    echo "<TD CLASS='derecha'>{$n}</TD>\n";
                    echo "<TD CLASS='derecha'>{$porcentaje} %</TD>\n";
                    echo "<TD CLASS='izquierda'><IMG SRC='img/puntoamarillo.gif' HEIGHT='10' WIDTH='".
                                $porcentaje * 4 ."'></TD>\n";
                    echo "</TR>\n";

                    echo'<br><br>';
                } else {
                    echo'No hay profesores impartiendo la asignatura';
                }
                mysqli_close($conexion);
            } else {
                ?>
					<form method="POST" action="EstAsig_num_prof.php">

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