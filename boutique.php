<?php

session_start();
include 'user.php';
include 'security.php';
 ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Boutique</title>
	</head>
	<body>
		<h1>Boutique</h1>
		<a><?php echo "<h1>".$nomcompte."</h1>"; ?></a>
		<a><?php Show_pokedollar($nomcompte);?></a>

		<?php 
		$link =create_link();
		$sql = mysqli_query($link,'SELECT Objet,TypeO,Prix FROM listeinventaire');
		$money = mysqli_query($link,'SELECT Pokedollar FROM compte WHERE nom="'.$nomcompte.'"');
		$argent = mysqli_fetch_assoc($money);

		while ($value=mysqli_fetch_assoc($sql)) {
			echo "<fieldset><form method=\"post\" action=\"achat.php\">"; 
			echo $value['Objet'].'<br>Type d\'objet :'.$value['TypeO'].'<br>Prix à l\'unité:'.$value['Prix'].' pokeollars<br>';
					$max=$argent['Pokedollar']/$value['Prix'];
					if($max>99) $max=99;
					$max=round($max, 0, PHP_ROUND_HALF_DOWN);;
			echo "Quantité <input type=\"number\" name=\"quantite\" min=\"0\" max=\"".$max."\"><br>";
			echo "<input type=\"submit\" value=\"Acheter\" name=\"".$value['Objet']."\">";
			echo "</form></fieldset><br/>";
		}

		?>

		<a href="log.php"><input type="button" name="menu" value="menu"></a>
	</body>
</html>