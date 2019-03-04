<?php 

session_start();
include 'security.php';
include 'user.php';


 ?>




<!DOCTYPE html>
<html>
<head>
	<title>pokemon</title>
</head>
<body>
	<?php 
	echo "<h1>".$nomcompte."</h1>";
	Show_pokedollar($nomcompte);
	Show_team($nomcompte);

	
	 ?>
	<br>
	<a href="chasse.php"><input type="button" name="chasse" value="Chasser un pokemon aléatoire"></a><br>
	<a href="deconnexion.php"><input type="button" name="Déconnexion" value="deconnexion"></a>
</body>
</html>
