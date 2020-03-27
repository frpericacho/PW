<?php 
		if(isset($_POST['Enviar']) && $_POST['Enviar']=="Enviar"){
			$mysqli = mysqli_connect('localhost','root',' ','pw');
			$res = mysqli_query($mysqli,"select usuario from administradores where usuario='".$_POST['usuario']."' and contraseña='".$_POST['contraseña']."'");
			$row=mysqli_fetch_array($res);
			if($row['usuario']==$_POST['usuario']){
				header("Location: Paneladmin.php");
			}
		}
	?>

<!DOCTYPE html>
<html>
<head>
	<title>Pantalla Administrador</title>
</head>
<body>
	<form method="post" action="Paneladmin.php" enctype = "multipart/form-data">
	Usuario:
	<input type="text" name="usuario"><br>
	Contraseña:
	<input type="password" name="contraseña">
	<input type="submit" name="Enviar" value="Enviar">
	</form>
</body>
</html>