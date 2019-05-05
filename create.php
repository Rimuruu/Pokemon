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
		<img src="Images/Pokemon" id="logo"/>
	<fieldset>
	<legend>Create your account  </legend>
	<a>Nom de compte  </a><input type="text" required name="nomcompte" class="input"><br>
	<a>Mot de passe  </a><input type="password" required name="mdp" class="input"><br>
	<a>Confirmez le mot de passe  </a><input required type="password" name="cmdp" class="input"><br>



	<label id='la1'><input required value="1" id="b1" type="radio" name="poke" class="pokeb"><img src="Images/Salameche" id="sala"/></label>



	<label><input required value="2" type="radio" name="poke" class="pokeb" id="b2"><img src="Images/Bulbizarre" id="bulb"/></label>

	<label><input required value="3" type="radio" name="poke" class="pokeb" id="b3">	<img src="Images/Carapuce" id="cara"/></label>
	<br>
	<input type="submit" name="valider" id='valider'><br>
	</fieldset>
	<a href="login.php" id='login'>Login page</a>
</form>


</body>
</html>