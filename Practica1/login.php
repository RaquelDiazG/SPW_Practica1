<html>
	<head>
		<title> Login </title>
		<meta charset="UTF-8">
	</head>
	<body>

		<?php
		session_start();
		if (isset($_POST['registro'])) {
			header("Location: registro.php");
		}

		if (isset($_POST['login'])) {
			// TODO 6: Comprobar captcha

			include ("includes/abrirbd.php");
			$sql = "SELECT * FROM usuarios WHERE user ='{$_POST['user']}'";
			$resultado = mysqli_query($link, $sql);

			if (mysqli_num_rows($resultado) == 1) {
				$usuario = mysqli_fetch_assoc($resultado);
				// TODO 3 Comprobar el password de entrada con el de la BD
				if (false) {
					// TODO 3 La condición del if es que el password sea correcto 	
					$_SESSION['autenticado'] = 'correcto';
					header("Location:MasterWeb.php");
				} else {
					$_SESSION['autenticado'] = 'incorrecto';
					header("Location: NoAuth.php");
				}
			} else {
				$_SESSION['autenticado'] = 'incorrecto';
				header("Location: NoAuth.php");
			}

			mysqli_close($link);
		} else {
			?>
			<br><br><br>
		<center>
			<img src="logo.png" width= 120 height= 60>
			<br><br><br>
			<form action= '<?php "{$_SERVER['PHP_SELF']}" ?>' method = post>
				<input type=submit name = 'registro' value = "REGISTRAR USUARIO"> <br><br><br>
				<table bgcolor = 'lightgrey'> 
					<tr>
						<td width= 100> Usuario: </td> 
						<td> <input type = text name ='user'></td>
					</tr>
					<tr>
						<td width= 100> Password: </td> 
						<td> <input type = password name ='passwd'></td>
					</tr>
				</table><br>
				<input type=submit name = 'login' value = "LOGIN"><br><br><br>
			</form>
			<?php
		}
		?>
	</center>
</body>
</html>