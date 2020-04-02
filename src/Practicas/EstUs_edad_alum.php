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

                $consul = 'select id from alumnos where edad='.$_POST['edad'].' and id in(select id_estudiante from encuesta where id_asignatura in(select id from asignatura where id='.$_POST['asignatura'].'))';
                $extra = mysqli_query($conexion, $consul);
                $ul = mysqli_num_rows($extra);

                $co = 'select id from alumnos';
                $ex = mysqli_query($conexion, $co);

                $ulu = mysqli_num_rows($ex);
                $porcentaje = round((($n / $u) * 100), 2);

                if ($n > 0) {
                    echo "<TABLE>\n";
                    echo "<TR>\n";
                    echo '<TH>Edad '.$_POST['edad']."</TH>\n";
                    echo "<TH>Porcentaje</TH>\n";
                    echo "<TH>Representacion grafica</TH>\n";
                    echo "</TR>\n";
                    $porcentaje2 = round((($ul / $ulu) * 100), 2);
                    echo "<TR>\n";
                    echo "<TD CLASS='derecha'>{$ul}</TD>\n";
                    echo "<TD CLASS='derecha'>{$porcentaje2} %</TD>\n";
                    echo "<TD CLASS='izquierda'><IMG SRC='img/puntoamarillo.gif' HEIGHT='10' WIDTH='".
                                $porcentaje * 4 ."'></TD>\n";
                    echo "</TR>\n";
                } else {
                    echo'No hay alumnos cursando la asignatura';
                }
                mysqli_close($conexion);
            } else {
                ?>
					<form method="POST" action="EstUs_edad_alum.php">

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
                        seleccione una edad:

                        <select name=edad>
						<?php

                            $mysqli = mysqli_connect('db', 'root', 'adminB4sh#77#', 'pw');

                $consulta = 'select id from edad';

                $extra = mysqli_query($mysqli, $consulta);

                $n = mysqli_num_rows($extra);

                if ($n > 0) {
                    for ($i = 0; $i <= 9; ++$i) {
                        $row = mysqli_fetch_array($extra);
                        echo '<option value='.$row['id'].'>'.$row['id'].'</option>';
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