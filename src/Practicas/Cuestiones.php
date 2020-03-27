<!DOCTYPE html>
<html>
<head><title>Encuesta UCA</title></head>
	<body>

		<?php

            error_reporting(E_ALL & ~E_NOTICE);

                $conexion = mysqli_connect('db', 'root', 'adminB4sh#77#', 'pw');

                $consulta = 'select * from cuestiones ';

                $extraer = mysqli_query($conexion, $consulta);

                $n = mysqli_num_rows($extraer);

                if ($n > 0) {
                    $enviar = $_POST['soluciones'];
                    if (isset($enviar)) {
                        $consult = 'select max(id) as id from alumnos';
                        $e = mysqli_query($conexion, $consult);
                        $c = mysqli_fetch_array($e);
                        for ($i = 1; $i <= $n; ++$i) {
                            $respuesta = $_POST['respuesta'.$i];
                            if (isset($respuesta)) {
                                $insertar = "insert into respuestas(respuesta,id_cuestion,id_estudiante) values({$respuesta},{$i},".$c['id'].')';

                                $query = mysqli_query($conexion, $insertar);
                            }
                        } ?>
					<h1> Su encuesta ha sido registrada correctamente </h1>
					<a href="Pantallaprincipal.php">Volver a la pantalla principal</a>
					<?php
                    } else {
                        ?>
					<form method="POST" action="Cuestiones.php">
					<?php
                        for ($i = 1; $i <= $n; ++$i) {
                            $sol = mysqli_fetch_array($extraer);

                            $pregunta = $sol['cuestion1'];

                            echo"{$pregunta}"; ?>
							<br><br>	
							<input type="radio" name="<?php echo'respuesta'.$i; ?>" value="0" checked>NS
							<input type="radio" name="<?php echo'respuesta'.$i; ?>" value="1">1
							<input type="radio" name="<?php echo'respuesta'.$i; ?>" value="2">2
							<input type="radio" name="<?php echo'respuesta'.$i; ?>" value="3">3
							<input type="radio" name="<?php echo'respuesta'.$i; ?>" value="4">4
							<input type="radio" name="<?php echo'respuesta'.$i; ?>" value="5">5
							<br><br>
							<?php
                        } ?>
						<input type="hidden" name="soluciones" value="true">
						<input type="submit" name="Enviar" value="Enviar">
						<br><br>
					</form>
				<?php
                    }
                }
                mysqli_close($conexion);
                ?>

	</body>
</html>