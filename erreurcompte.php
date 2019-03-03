<?php 
session_start();
if (isset($_SESSION['nomcompte'])) {
	header("location: log.php");
 } ?>


<!DOCTYPE html>
<html>
<head>
	<title>pokemon</title>
</head>
<body>
<form method="post" action="log.php">
	<fieldset>
	<legend>Login</legend>
	<a>Le compte n'existe pas</a><br>
	<a>Nom de compte</a><input type="text" name="nomcompte"><br>
	<a>Mot de passe</a><input type="text" name="mdp"><br>
	<input type="submit" name="valider"><br>
	<a href="create.php">Créer un compte</a>
	</fieldset>
</form>
</body>
</html>