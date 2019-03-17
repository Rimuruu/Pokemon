<?php 
session_start();
include 'security.php';
include 'user.php';
if (!isset($_POST['chasse'])) {
	header("location: log.php");
}
if (isset($_COOKIE['idpokemonsauvage'])) {
	$idpokesauvage=$_COOKIE['idpokemonsauvage'];
}

 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>

 	<?php 

 	$poke = Show_First_Pokemon_Available($nomcompte);
 	Show_cap($nomcompte,$poke);
 	if (!isset($idpokesauvage)) {
 		$idpokesauvage = Pokemon_alea();
 	}
 	Show_pokemon_by_id($idpokesauvage);
 	$_SESSION['idpokemonsauvage']=$idpokesauvage;
 	setcookie("idpokemonsauvage",$idpokesauvage);
 	

 	 ?>
 <a href="catch.php"><input type="button" name="Pokeball" value="Pokeball"></a>
 </body>
 <script type="text/javascript">
 	var cap1 = document.getElementById('cap1');
 	var cap2 = document.getElementById('cap2');
 	var cap3 = document.getElementById('cap3');
 	var cap4 = document.getElementById('cap4');
 	cap1.onclick = function() {Attaque();};
 	cap2.onclick = function() {Attaque();};
 	cap3.onclick = function() {Attaque();};
 	cap4.onclick = function() {Attaque();};
 	function Attaque(){
 		window.location="attaque.php";
 	}
 	










 </script>
 </html>