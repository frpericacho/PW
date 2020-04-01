<!DOCTYPE html>
<html>
<head><title>Encuesta UCA</title></head>
<body>
	<?php
    error_reporting(E_ALL & ~E_NOTICE);
        $enviar = $_POST['edad'];
        $asignatura = $_POST['asignatura'];
        $grupo = $_POST['grupo'];

        if (isset($enviar)) {
            $conexion = mysqli_connect('db', 'root', 'adminB4sh#77#', 'pw');

            $edad = $_POST['edad'];
            $sexo = $_POST['sexo'];
            $curso_alto = $_POST['curso_alto'];
            $curso_bajo = $_POST['curso_bajo'];
            $aniomatr = $_POST['curso'];
            $veces_examen = $_POST['veces_examen'];
            $interes = $_POST['interes'];
            $tutorias = $_POST['tutorias'];
            $dificultad = $_POST['dificultad'];
            $calificacion = $_POST['calificacion'];
            $asistencia = $_POST['asistencia'];

            $consulta = "insert into alumnos(edad,sexo,curso_alto,curso_bajo,aniomatr,n_examinado,interes,tutorias,dificultad,nota_esperada,asistencia) values(\"{$edad}\",\"{$sexo}\",\"{$curso_alto}\",\"{$curso_bajo}\",\"{$aniomatr}\",\"{$veces_examen}\",\"{$interes}\",\"{$tutorias}\",\"{$dificultad}\",\"{$calificacion}\",\"{$asistencia}\")";

            $inserta = mysqli_query($conexion, $consulta) or die('No se pudo');

            $id = mysqli_insert_id($conexion);

            $prof = $_POST['profesor'];

            $consulta2 = "insert into encuesta(id_asignatura,id_estudiante,id_grupo,id_profesor) values({$asignatura},{$id},{$grupo},{$prof})";

            $actualiza = mysqli_query($conexion, $consulta2) or die('No se ha podido');

            mysqli_close($conexion);

            echo "<P>Accedamos a las cuestiones sobre la asignatura</P>\n";
            echo "<A HREF='Cuestiones.php'>Acceder a las cuestiones</A>\n";
        } else {
            ?>
			<form method="POST" action="Usuario.php">

				<input type="hidden" id="asignatura" name="asignatura" value="<?php echo $asignatura; ?>">
				<input type="hidden" id="grupo" name="grupo" value="<?php echo $grupo; ?>">

				
				Seleccione al profesor que imparte la asignatura:
				<select name="profesor">
					<?php
                        $conecta = mysqli_connect('db', 'root', 'adminB4sh#77#', 'pw');

            $consulta1 = "select id,nombre_prof from profesor ,prof_asig where prof_asig.id_asignatura={$asignatura} and prof_asig.id_profesor=profesor.id";

            $extraer = mysqli_query($conecta, $consulta1);

            $num = mysqli_num_rows($extraer);
            if ($num > 0) {
                for ($i = 0; $i < $num; ++$i) {
                    $sol = mysqli_fetch_array($extraer);
                    echo '<option value='.$sol['id'].'>'.$sol['nombre_prof'].'</option>';
                }
            }
            mysqli_close($conecta); ?>
				</select>

				<br><br>Seleccione un rango de edad:
				<select name="edad">
					<?php
                        $conecta = mysqli_connect('db', 'root', 'adminB4sh#77#', 'pw');

            $consulta1 = 'select id from edad';

            $extraer = mysqli_query($conecta, $consulta1);

            $num = mysqli_num_rows($extraer);
            if ($num > 0) {
                for ($i = 0; $i < $num; ++$i) {
                    $sol = mysqli_fetch_array($extraer);
                    echo '<option value='.$sol['id'].'>'.$sol['id'].'</option>';
                }
            }
            mysqli_close($conecta); ?>
				</select>

				<br><br>Introduzca su sexo:
				<select name="sexo">
						<?php
                        $conecta = mysqli_connect('db', 'root', 'adminB4sh#77#', 'pw');

            $consulta1 = 'select nombre from sexo';

            $extraer = mysqli_query($conecta, $consulta1);

            $num = mysqli_num_rows($extraer);
            if ($num > 0) {
                for ($i = 0; $i < $num; ++$i) {
                    $sol = mysqli_fetch_array($extraer);
                    echo '<option value='.$sol['nombre'].'>'.$sol['nombre'].'</option>';
                }
            }
            mysqli_close($conecta); ?>
				</select> 

				<br><br>Curso más alto que cursa en estos momentos:
				<select name="curso_alto">
					<?php
                        $conecta = mysqli_connect('db', 'root', 'adminB4sh#77#', 'pw');

            $consulta1 = 'select curso_id from curso';

            $extraer = mysqli_query($conecta, $consulta1);

            $num = mysqli_num_rows($extraer);
            if ($num > 0) {
                for ($i = 0; $i < $num; ++$i) {
                    $sol = mysqli_fetch_array($extraer);
                    echo '<option value='.$sol['curso_id'].'>'.$sol['curso_id'].'</option>';
                }
            }
            mysqli_close($conecta); ?>
				</select>

				<br><br>Curso más bajo que cursa en estos momentos:
				<select name="curso_bajo">
					<?php
                        $conecta = mysqli_connect('db', 'root', 'adminB4sh#77#', 'pw');

            $consulta1 = 'select curso_id from curso';

            $extraer = mysqli_query($conecta, $consulta1);

            $num = mysqli_num_rows($extraer);
            if ($num > 0) {
                for ($i = 0; $i < $num; ++$i) {
                    $sol = mysqli_fetch_array($extraer);
                    echo '<option value='.$sol['curso_id'].'>'.$sol['curso_id'].'</option>';
                }
            }
            mysqli_close($conecta); ?>
				</select>

				<br><br>Curso matriculado:
				<select name="curso">
					<option value=1920 checked> 19-20
				</select>

				<br><br>Número de veces que se ha presentado a examen:
				<select name="veces_examen">
					<?php
                        $conecta = mysqli_connect('db', 'root', 'adminB4sh#77#', 'pw');

            $consulta1 = 'select id from n_examinado';

            $extraer = mysqli_query($conecta, $consulta1);

            $num = mysqli_num_rows($extraer);
            if ($num > 0) {
                for ($i = 0; $i < $num; ++$i) {
                    $sol = mysqli_fetch_array($extraer);
                    echo '<option value='.$sol['id'].'>'.$sol['id'].'</option>';
                }
            }
            mysqli_close($conecta); ?>
				</select>

				<br><br>Interes por la asignatura:
				<select name="interes">
					<?php
                        $conecta = mysqli_connect('db', 'root', 'adminB4sh#77#', 'pw');

            $consulta1 = 'select id from generico';

            $extraer = mysqli_query($conecta, $consulta1);

            $num = mysqli_num_rows($extraer);
            if ($num > 0) {
                for ($i = 0; $i < $num; ++$i) {
                    $sol = mysqli_fetch_array($extraer);
                    echo '<option value='.$sol['id'].'>'.$sol['id'].'</option>';
                }
            }
            mysqli_close($conecta); ?>
				</select>

				<br><br>Uso de tutorias:
				<select name="tutorias">
					<?php
                        $conecta = mysqli_connect('db', 'root', 'adminB4sh#77#', 'pw');

            $consulta1 = 'select id from generico';

            $extraer = mysqli_query($conecta, $consulta1);

            $num = mysqli_num_rows($extraer);
            if ($num > 0) {
                for ($i = 0; $i < $num; ++$i) {
                    $sol = mysqli_fetch_array($extraer);
                    echo '<option value='.$sol['id'].'>'.$sol['id'].'</option>';
                }
            }
            mysqli_close($conecta); ?>
				</select>

				<br><br>Dificultad de la asignatura:
				<select name="dificultad">
					<?php
                        $conecta = mysqli_connect('db', 'root', 'adminB4sh#77#', 'pw');

            $consulta1 = 'select id from dificultad';

            $extraer = mysqli_query($conecta, $consulta1);

            $num = mysqli_num_rows($extraer);
            if ($num > 0) {
                for ($i = 0; $i < $num; ++$i) {
                    $sol = mysqli_fetch_array($extraer);
                    echo '<option value='.$sol['id'].'>'.$sol['id'].'</option>';
                }
            }
            mysqli_close($conecta); ?>
				</select>

				<br><br>Calificacion esperada:
				<select name="calificacion">
					<?php
                        $conecta = mysqli_connect('db', 'root', 'adminB4sh#77#', 'pw');

            $consulta1 = 'select id from calificacion order by valor';

            $extraer = mysqli_query($conecta, $consulta1);

            $num = mysqli_num_rows($extraer);
            if ($num > 0) {
                for ($i = 0; $i < $num; ++$i) {
                    $sol = mysqli_fetch_array($extraer);
                    echo '<option value='.$sol['id'].'>'.$sol['id'].'</option>';
                }
            }
            mysqli_close($conecta); ?>
				</select>
				<br><br>Asistencia:
				<select name="asistencia">
					<?php
                        $conecta = mysqli_connect('db', 'root', 'adminB4sh#77#', 'pw');

            $consulta1 = 'select id from asistencia';

            $extraer = mysqli_query($conecta, $consulta1);

            $num = mysqli_num_rows($extraer);
            if ($num > 0) {
                for ($i = 0; $i < $num; ++$i) {
                    $sol = mysqli_fetch_array($extraer);
                    echo '<option value='.$sol['id'].'>'.$sol['id'].'</option>';
                }
            }
            mysqli_close($conecta); ?>
				</select>


				<input type="submit" name="Enviar" value="Enviar">
			</form>
<?php
        }
?>
</body>
</html>