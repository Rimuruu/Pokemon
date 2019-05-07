<?php 

session_start();
include 'security.php';
include 'user.php';
include 'match.php';
$link =create_link();
$date = date("Y-m-d");

$dated = 'SELECT DateCo FROM compte WHERE Nom="'.$nomcompte.'"';
$datec = mysqli_query($link,$dated);
$dateco=mysqli_fetch_assoc($datec);

$date1 = strtotime($date);
$date2 = strtotime($dateco['DateCo']);

$res = ($date1 - $date2)/86400;

if($res > 0){
	for($i=0;$i<$res;$i=$i+1){
		$req = 'UPDATE compte SET Pokedollar = Pokedollar + 50 WHERE Nom="'.$nomcompte.'"';
		$cou = mysqli_query($link,$req);

		$sac = 'UPDATE sac SET nbPokeball = nbPokeball+5 WHERE Dresseur="'.$nomcompte.'"';
		$couc = mysqli_query($link,$sac);

		$poke = "UPDATE Banque SET PVact=PVmax WHERE Dresseur='".$nomcompte."'";
		$couco = mysqli_query($link,$poke);
		
		$pokemo = "UPDATE Banque SET Statut=NULL WHERE Dresseur='".$nomcompte."'";
		$coucoo=mysqli_query($link,$pokemo);
	}
}
	$datecoo = 'UPDATE compte SET DateCo = "'.$date.'" WHERE Nom="'.$nomcompte.'"';
	$coucou = mysqli_query($link,$datecoo);


 ?>




<!DOCTYPE html>
<html>
<head>
	<title>pokemon</title>
	<link rel="stylesheet" type="text/css" href="log.css">
</head>
<body>

	<img src="Images/Pokemon" id="logo"/>

	<header>
	<h1 id="titre">Menu</h1>
	<?php 
	echo "<a id='compte'><h1>".$nomcompte."</h1>";
	Show_pokedollar($nomcompte);
	echo "</a><a href='deconnexion.php'><input type='button' name='Déconnexion' value='Déconnexion' id='deco'></a></header>";
	Show_team($nomcompte);
	 ?>

	<br>
	<div>
	<a href="chasse.php"><input type="button" name="chasse" value="Chasser un pokemon aléatoire" id="input"><img src="Images/chasse.png" id="cha"/></input></a><br>
	<a href="listedresseurs.php"><input type="button" name="listej" value="Combat online" id="inputd"><img src="Images/combat.png" id="com"/></input></a><br>
	<a href="teammanage.php"><input type="button" name="teammanage" value="Modifier l'équipe" id="inputt"><img src="Images/équipe.png" id="equ"/></input></a><br>
	<a href="inventaire.php"><input type="button" name="sac" value="Sac" id="inputq"><img src="Images/sac.png" id="sac"/></input></a><br>
	<a href="boutique.php"><input type="button" name="Boutique" value="Boutique" id="inputc"><img src="Images/bou.png" id="bou"/></input></a><br>
	</div>
</body>
</html>
