<?php

session_start();
include 'user.php';
include 'security.php';
include 'match.php';
 ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Boutique</title>
		<link rel="stylesheet" type="text/css" href="boutique.css">
	</head>
	<body>
		<header>
		<h1 id="titre">Boutique</h1>
		<div id="compte"><a id="nom"><?php echo "<h1>".$nomcompte."</h1>"; ?></a>
		<a id="argent"><?php Show_pokedollar($nomcompte);?></a>
	</div>
		<div>Types d'ojets :
		<a href="#PokeBall">Pokeballs</a><br>
		<a href="#Potion">Potions</a><br>
		<a href="#Antidote">Soins statut</a><br>
		<a href="#Rappel">Rappels</a><br>
	</div>
		<a href="log.php"><input type="button" name="Menu" value="menu" id="menu"></a>
	</header>

		<?php 
		$link =create_link();
		$sql = mysqli_query($link,'SELECT * FROM listeinventaire');
		$money = mysqli_query($link,'SELECT Pokedollar FROM compte WHERE nom="'.$nomcompte.'"');
		$argent = mysqli_fetch_assoc($money);

		while ($value=mysqli_fetch_assoc($sql)) {
			if($value['TypeO']!='PP'){
			echo "<fieldset id='".$value['Objet']."'><form method=\"post\" action=\"achat.php\">"; 
			echo "<img src='Images/".$value['Objet']."' id='".$value['Objet']."'/>".$value['Objet'].'<br>Type d\'objet :'.$value['TypeO'].'<br>';

				if($value['TypeO']=="Pokeball") {
					echo "Permet de capturer des pokémons sauvages.";
					if($value['Objet']=="SuperBall") echo "Plus efficace qu'une PokeBall classique";
					if($value['Objet']=="HyperBall") echo "Plus efficace qu'une PokeBall et qu'une SuperBall";
				}
				else if($value['TypeO']=="Soin"){
					if($value['Objet']=="PotionMax") echo "Permet de redonner tous ses PV à un pokémon";
					else echo "Permet de redonner ".$value['PVSoin']." PV à un pokémon";
				}
				else if($value['TypeO']=="Statut"){
					if($value['Objet']=="Antidote") echo "Permet de soigner un pokémon de l'empoisonnement";
					else if($value['Objet']=="AntiPara") echo "Permet de soigner un pokémon de la paralysie";
					else if($value['Objet']=="AntiBrule") echo "Permet de soigner un pokémon d'une brûlure";
					else if($value['Objet']=="AntiGel") echo "Permet de soigner un pokémon du gel";
					else if($value['Objet']=="Reveil") echo "Permet de réveiller un pokémon endormi";
				}
				else if($value['TypeO']=="Rappel"){
					echo "Permet de réanimer un pokémon K.O. et lui rendre ";
					if($value['Objet']=="Rappel") echo "la moitié de ses PV";
					else echo "tous ses PV";
				}
				else if($value['TypeO']=="PP"){
					if($value['Objet']=="Huile") echo "Rend 10 PP à une attaque d'un pokémon";
					else if($value['Objet']=="HuileMax") echo "Rend tous ses PP à une attaque d'un pokémon";
					else if($value['Objet']=="Elexir") echo "Rend 10 PP à toutes les attaques d'un pokémon";
					else echo "Rend tous ses PP à toutes les attaques d'un pokémon";
				}

			echo '<br>Prix à l\'unité: '.$value['Prix'].' pokeollars<br>';
					$max=$argent['Pokedollar']/$value['Prix'];
					if($max>99) $max=99;
					$max=round($max, 0, PHP_ROUND_HALF_DOWN);;
			echo "Quantité <input type=\"number\" name=\"quantite\" min=\"0\" max=\"".$max."\"><br>";
			echo "<input type=\"submit\" value=\"Acheter\" name=\"".$value['Objet']."\">";
			echo "</form></fieldset><br/>";
		}
		}

		?>

	</body>
</html>