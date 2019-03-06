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
 <script type="text/javascript">
 	var cap1 = document.getElementById('cap1');
 	var cap2 = document.getElementById('cap2');
 	var cap3 = document.getElementById('cap3');
 	var cap4 = document.getElementById('cap4');
 	cap1.onclick = function() {Attaque();};
 	function Attaque(){
 		window.location="attaque.php";
 	}
 	










 </script>
 </html>