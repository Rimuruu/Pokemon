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
	<form method="post" action="chasse.php"><input type="submit" name="chasse" value="Chasser un pokemon aléatoire"></form><br>
	<a href="teammanage.php"><input type="button" name="teammanage" value="Modifier l'ordre de l'equipe"></a>
	<a href="boutique.php"><input type="button" name="Boutique" value="Boutique"></a>
	<a href="deconnexion.php"><input type="button" name="Déconnexion" value="deconnexion"></a>
</body>
</html>
