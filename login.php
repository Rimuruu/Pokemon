<?php
session_start(); 
if (isset($_SESSION['nomcompte'])) {
	header("location: log.php");
 } ?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="login.css">
	<title>pokemon</title>
</head>
<body>
<form method="post" action="log.php">
	<img src="Images/Pokemon" id="logo"/>
	<fieldset>
	<legend>Login</legend>
	<a>Nom de compte</a><input type="text" name="nomcompte" class="input"><br>
	<a>Mot de passe</a><input type="password" name="mdp" class="input"><br>
	<input type="submit" name="valider" id="valider"><br>
	</fieldset>
	<a href="create.php" id="create">Créer un compte</a>
	
</form>
</body>
</html>
