<?php 
session_start();
include 'security.php';
include 'user.php';

 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>

 	<?php 
 	Show_nth_pokemon($nomcompte,1);
 	Show_cap($nomcompte,1);
 	$idpokesauvage = Pokemon_alea();
 	Show_pokemon_by_id($idpokesauvage);
 	$_SESSION['idpokemonsauvage']=$idpokesauvage;
 	//Show_cap_by_id($idpokesauvage);

 	 ?>
 <a href="catch.php"><input type="button" name="Pokeball" value="Pokeball"></a>
 <a href="deconnexion.php"><input type="button" name="Déconnexion" value="deconnexion"></a>
 </body>
 </html>