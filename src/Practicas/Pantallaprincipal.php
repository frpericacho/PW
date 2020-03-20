<!DOCTYPE html>
<html>
<head><title>Encuesta UCA</title></head>
	<body>

		<h1>Bienvenidos a la encuesta</h1>

		<a href="Administrador.php">Acceso para Administradores</a>
		<br>
		<a href="Titulacion.php">Acceso para Usuario</a>

        <?php
            $conexion = mysqli_connect('bd', 'root', 'adminB4sh#77#', 'pw');
            $consulta = 'select * from titulacion';
            $res = mysqli_query($conexion, $consulta);
            $n = mysqli_num_rows($res); 	//Es un comprobante para control de fallos
            mysqli_close($conexion);
        ?>
        <pre><?php print_r($result); ?></pre>

	</body>
</html>
