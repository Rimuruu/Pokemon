<?php

session_start();
include 'security.php';
include 'user.php';


 ?>

 <!DOCTYPE html>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Combat Online</title>
 </head>
 <body>
 	<h1>Combat Online</h1>

 	<div>Liste des joueurs en ligne
 		<ul>
 		<?php
		$link =create_link();
		$sql = mysqli_query($link,'SELECT nom FROM compte WHERE nom!="'.$nomcompte.'"'/* AND Statut="ON"'*/);
		while ($value=mysqli_fetch_assoc($sql)) {
		echo '<li>'.$value['nom'].'<br><input type="button" name="d'.$value['nom'].'"" value="défier '.$value['nom'].'"></li>';
		}
		?>
	</ul>
	</div>
	<a href="log.php"><input type="button" name="menu" value="menu"></a>
 </body>
 </html>
