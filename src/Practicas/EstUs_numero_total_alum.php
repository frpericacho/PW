<!DOCTYPE html>
<html>
<head><title>Estadísticas</title></head>
	<body>
        <?php
                $conexion = mysqli_connect('localhost', 'root', '', 'pw');

                $consulta = 'select id_estudiante from encuesta';

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
                                $porcentaje1 * 4 ."'></TD>\n";
                    echo "</TR>\n";
                } else {
                    echo'No hay alumnos cursando la asignatura';
                }
                mysqli_close($conexion);
        ?>
	</body>
</html>