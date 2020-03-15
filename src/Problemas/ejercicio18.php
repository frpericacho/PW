<!DOCTYPE html>
<html>
<head><title>Ejercicio 18 - Eliminar -</title></head>
<body>
	<?php
        error_reporting(E_ALL & ~E_NOTICE);
        $enviar = $_POST['enviar'];

        if (isset($enviar)) {
            $conexion = mysqli_connect('localhost', 'root', '', 'lindavista');
            $consulta = 'Select * from noticias';
            $captura = mysqli_query($conexion, $consulta);

            $num_filas = mysqli_num_row($captura);

            if ($num_filas > 0) {
                echo '<TABLE>';
                echo '<TR>';
                echo '<TH> ID';
                echo '<TH> Noticia';
                echo '<\\TR>';

                for ($i = 0; $i < $num_filas; ++$i) {
                    echo '<TR>';
                    $result = mysqli_fetch_assoc($captura);
                    echo '<TD>'.$result['id'];
                    echo '<TD>'.$result['noticia'];
                }
                $respuesta = $_POST[ID];
				echo $consulta1="delete from noticias where $respuesta= '".$result['id']"' ";
								
                $res = mysqli_query($conexion, $consulta1);
            } else {
                echo 'No hay noticias que mostrar';
            }

            mysqli_close($conexion);
        } else {
            ?>
			<form name=Eliminar method=POST action="Ejercicio18.php">
				
				Indique el ID de la noticia que desee eliminar:
				<input type="text" name="ID" value="ID">
				<input type="Submit" name="enviar" value="Eliminar">
			</form>
				<A HREF="Ejercicio18.php">Eliminar otra Noticia</A>
				<?php
        }
                ?>

</body>
</html>