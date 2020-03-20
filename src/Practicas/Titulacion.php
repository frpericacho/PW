<html>
<head><title>Encuesta UCA</title></head>
	<body>
		<form action="Asignatura.php" method="POST" enctype = "multipart/form-data">
			Indique la titulación que cursa:
			
			<select name=titulacion>

				<?php
                    $conexion = mysqli_connect('bd', 'root', 'adminB4sh#77#', 'pw');
                    if (mysqli_connect_errno()) {
                        echo $conexion->connect_error;
                    } else {
                        $consulta = 'select * from titulacion';
                        $res = mysqli_query($conexion, $consulta);
                        $n = mysqli_num_rows($res); 	//Es un comprobante para control de fallos
                        if ($n > 0) {
                            for ($i = 0; $i < $n; ++$i) {
                                $row = mysqli_fetch_array($res);
                                echo '<option value='.$row['id'].'>'.$row['cod_titulacion'].'</option>';
                            }
                        }
                    }

                    mysqli_close($conexion);
                ?>
				</select><br>
			<input type="submit" name="titulacion" value="Siguiente ->">
		</form>
	</body>
</html>
