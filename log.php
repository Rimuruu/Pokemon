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
</head>
<body>
	<?php 
	echo "<h1>".$nomcompte."</h1>";
	Show_pokedollar($nomcompte);
	Show_team($nomcompte);

	
	 ?>
	<br>
	<form method="post" action="chasse.php"><input type="submit" name="chasse" value="Chasser un pokemon aléatoire"></form><br>
	<a href="listedresseurs.php"><input type="button" name="listej" value="Combat online"></a>
	<a href="teammanage.php"><input type="button" name="teammanage" value="Modifier l'ordre de l'equipe"></a>
	<a href="inventaire.php"><input type="button" name="sac" value="Sac"></a>
	<a href="boutique.php"><input type="button" name="Boutique" value="Boutique"></a>
	<a href="deconnexion.php"><input type="button" name="Déconnexion" value="deconnexion"></a>
</body>
</html>
