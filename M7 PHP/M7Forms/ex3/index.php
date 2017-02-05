<!DOCTYPE html>
<html>
<head>
<title>Registre usuari</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel='stylesheet' href="css/estil.css" />
</head>
<body>
	<main>
		<h1>Login</h1>
	<form method="post" action="login.php">
		<fieldset>
			<legend>Login</legend>
			<label>Login: <input type='text' name='login' /></label>
			<label>Password: <input type='password' name='password' /></label>
			<p>
				<input type="submit" name="enviar" value="Entrar" />
				<a href="forms/password.php">Recordar paraula clau</a>
			</p>
		</fieldset>
	</form>


	</main>
</body>
</html>