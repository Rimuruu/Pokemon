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
	Show_team($nomcompte);
	
	 ?>
	<a href="deconnexion.php"><input type="button" name="Déconnexion" value="deconnexion"></a>
</body>
</html>
