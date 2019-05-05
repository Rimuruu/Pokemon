<?php

session_start();
if (isset($_SESSION['nomcompte'])) {
	header("location: log.php");
 } ?>
 
<!DOCTYPE html>
<html>
<head>
	<title>Création compte</title>
	<link rel="stylesheet" type="text/css" href="created.css">
</head>
<body>
	<form method="post" action="createaccount.php">
	<fieldset id="ex">
	<legend>Create your account</legend>
	<a>Nom de compte ou mot de passe déjà utilisé</a><br>
	<a>Nom de compte</a><input type="text" required name="nomcompte" class="input"><br>
	<a>Mot de passe</a><input type="password" required name="mdp" class="input"><br>
	<a>Confirmez le mot de passe</a><input required type="password" name="cmdp" class="input"><br>
	<a class="poken">Salamèche</a><input value="1" type="radio" name="poke" class="pokeb">
	<a class="poken">Bulbizarre</a><input value="2" type="radio" name="poke" class="pokeb" id="b2">
	<a class="poken">Carapuce</a><input value="3" type="radio" name="poke" class="pokeb" id="b3">
	<img src="Images/Salameche" id="sala"/>
	<img src="Images/Bulbizarre" id="bulb"/>
	<img src="Images/Carapuce" id="cara"/>
	<input type="submit" name="valider" id="valider"><br>
	</fieldset>
	<a href="login.php" id="login">Login page</a>
	<img src="Images/Pokemon" id="logo"/>
</form>
</body>
</html>