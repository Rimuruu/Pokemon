<?php

session_start();
if (isset($_SESSION['nomcompte'])) {
	header("location: log.php");
 } ?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="create.css">
	<title>Création compte</title>
</head>
<body>
	<form method="post" action="createaccount.php">
	<fieldset>
	<legend>Create your account</legend>
	<a>Nom de compte</a><input type="text" required name="nomcompte" class="input"><br>
	<a>Mot de passe</a><input type="password" required name="mdp" class="input"><br>
	<a>Confirmé le mot de passe</a><input required type="password" name="cmdp" class="input"><br>
	<a class="poken">Salamèche</a><input required value="1" type="radio" name="poke" class="pokeb">
	<a class="poken">Bulbizarre</a><input required value="2" type="radio" name="poke" class="pokeb" id="b2">
	<a class="poken">Carapuce</a><input required value="3" type="radio" name="poke" class="pokeb" id="b3">
	<img src="Images/Salameche" id="sala"/>
	<img src="Images/Bulbizarre" id="bulb"/>
	<img src="Images/Carapuce" id="cara"/>
	<input type="submit" name="valider" id='valider'><br>
	</fieldset>
</form>
<img src="Images/Pokemon" id="logo"/>
<a href="login.php" id='login'>Login page</a>
</body>
</html>