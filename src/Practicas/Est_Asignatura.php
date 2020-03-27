<!DOCTYPE html>
<html>
<head>
	<title>estadistica</title>
</head>
<body>
		<form method="post" action="Est_Asignatura.php" enctype = "multipart/form-data">
	<?php
        if (isset($_POST['Enviar']) && 'Enviar' == $_POST['Enviar']) {
            $mysqli = mysqli_connect('db', 'root', 'adminB4sh#77#', 'pw');
            $res = mysqli_query($mysqli, 'SELECT respuesta FROM respuestas WHERE respuestas.id_cuestion = '.$_POST['id'].' AND respuestas.id_estudiante = '.$_POST['id2']);
            $media = 0;
            $i = 0;
            while ($row = mysqli_fetch_array($res)) {
                if (0 != $row['respuesta']) {
                    $media = $media + $row['respuesta'];
                    ++$i;
                }
            }
            if (0 != $i) {
                $media = $media / $i;
                echo "<br>La media es {$media}<br>";
            } else {
                $media = 0;
                echo '<br> Esta pregunta no tiene ninguna respuesta.<br>';
            }

            mysqli_close($mysqli);
        }
        echo 'Elige el profesor:';
            echo '<SELECT name="id2">';
            $mysqli = mysqli_connect('db', 'root', 'adminB4sh#77#', 'pw');
            $res = mysqli_query($mysqli, 'SELECT id, nombre_prof FROM profesor;');
            while ($row = mysqli_fetch_array($res)) {
                echo '<option value="'.$row['id'].'">'.$row['nombre_prof'].'</option>';
            }
            mysqli_close($mysqli);
            echo '</SELECT><br>';
        echo 'Elige la pregunta:';
            echo '<SELECT name="id">';
            $mysqli = mysqli_connect('db', 'root', 'adminB4sh#77#', 'pw');
            $res = mysqli_query($mysqli, 'SELECT * FROM cuestiones;');
            while ($row = mysqli_fetch_array($res)) {
                echo '<option value="'.$row['id'].'">'.$row['cuestion1'].'</option>';
            }
            mysqli_close($mysqli);
            echo '</SELECT>';
            echo '<input type="submit" name="Enviar" value="Enviar">';
            echo '</form>';

    ?>
	
</body>
</html>