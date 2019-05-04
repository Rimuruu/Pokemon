<?php

session_start();
if (isset($_SESSION['nomcompte'])) {
	header("location: log.php");
 } ?>
 
<!DOCTYPE html>
<html>
<head>
	<title>Création compte</title>
</head>
<body>
	<form method="post" action="createaccount.php">
	<fieldset>
	<legend>Login</legend>
	<a>les mots de passe ne correspondent pas</a><br>
	<a>Nom de compte</a><input type="text" required name="nomcompte"><br>
	<a>Mot de passe</a><input type="password" required name="mdp"><br>
	<a>Confirmé le mot de passe</a><input required type="password" name="cmdp"><br>
	<a>Salamèche</a><input value="1" type="radio" name="poke">
	<a>Bulbizarre</a><input value="2" type="radio" name="poke">
	<a>Carapuce</a><input value="3" type="radio" name="poke">
	<input type="submit" name="valider"><br>
	<a href="login.php">Login page</a>
	</fieldset>
</form>
</body>
</html>