<!DOCTYPE html>
<html>
<head><title>EncuestaPHP</title></head>
	<body>
		<?php

        $nombre = $_POST['nombre'];
        $edad = $_POST['edad'];
        $sexo = $_POST['sexo'];
        $nac = $_POST['ciudadnac'];
        $res = $_POST['ciudadres'];
        $titulacion = $_POST['titulacion'];

        echo "{$nombre}, {$sexo}, con edad {$edad} nació en {$nac}, actualmente reside en {$res} y estudia {$titulacion}";
        ?>
	</body>
</html>