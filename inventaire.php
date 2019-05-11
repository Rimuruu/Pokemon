<?php 

session_start();
include 'security.php';
include 'user.php';
include 'match.php';

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Sac</title>
	<link rel="stylesheet" type="text/css" href="sac.css">
</head>
<body>

	<header>
	<h1 id="titre">Sac</h1>
	<?php 
	echo "<a id='compte'><h1>".$nomcompte."</h1>";
	Show_pokedollar($nomcompte);
	echo "</a><a href='log.php'><input type='button' name='Déconnexion' value='Menu' id='deco'></a></header>";
	?>

 		<ul>
 		<?php
		$link =create_link();
		$sql = mysqli_query($link,'SELECT * FROM listeinventaire');
		$sqld= mysqli_query($link,'SELECT * FROM Sac WHERE Dresseur="'.$nomcompte.'"');
		$valued=mysqli_fetch_assoc($sqld);	

		$pokemo = "SELECT ID,NomP,PVAct,PVmax,Statut FROM Banque B,Equipe E 
		WHERE B.Dresseur='".$nomcompte."' AND E.Dresseur='".$nomcompte."' 
		AND (ID=SLOT1 OR ID=SLOT2 OR ID=SLOT3 OR ID=SLOT4 OR ID=SLOT5 OR ID=SLOT6)";

		while ($value=mysqli_fetch_assoc($sql)) {
			
			if($value['TypeO']!='PP'){

				echo '<fieldset id="'.$value['Objet'].'""><li><img src="Images/'.$value['Objet'].'" id="'.$value['Objet'].'"/>'.$value['Objet'].'<br>Type d\'Objet: '.$value['TypeO'].'<br>';

				if($value['TypeO']=="Pokeball") {
					echo "Permet de capturer des pokémons sauvages.";
					if($value['Objet']=="SuperBall") echo "Plus efficace qu'une PokeBall classique";
					if($value['Objet']=="HyperBall") echo "Plus efficace qu'une PokeBall et qu'une SuperBall";
				}

				else if($value['TypeO']=="Soin"){
					if($value['Objet']=="PotionMax") echo "Permet de redonner tous ses PV à un pokémon";
					else echo "Permet de redonner ".$value['PVSoin']." Pv à un pokémon";
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

				echo "<br>Quantité : ".$valued["nb".$value['Objet']]."<br>";
				if ($valued['nb'.$value['Objet']]>0){
				echo '<form method="post" action="jeter.php">Quantité à jeter<input type="number" name="quantite" min="1" max="'.$valued["nb".$value['Objet']].'"><input type="submit" value="Jeter" name="'.$value['Objet'].'""></form>';

			
				if($value['TypeO']=="Pokeball") {
					echo "Cet objet ne peut pas être utiliser hors d'un combat avec un pokémon sauvage.";
				}


				else if($value['TypeO']=="Soin"){
					
					$pokemon = mysqli_query($link,$pokemo);
					$pokemonn = mysqli_query($link,$pokemo);

					$i=0;
					while ($valuet=mysqli_fetch_assoc($pokemon)){
						if($valuet['PVAct']<$valuet['PVmax'] && $valuet['PVAct']>0){
							$i=$i+1;
						}
					}

					if($i!=0) { 
						echo '<form method="post" action="objet.php">Utiliser sur : ';
						while ($valuet=mysqli_fetch_assoc($pokemonn)){
							if($valuet['PVAct']<$valuet['PVmax'] && $valuet['PVAct']>0){
								echo $valuet['NomP'].'<input type="radio" name="poke" value="'.$valuet['ID'].'">';
							}
						}
						echo '<input requiered type="submit" value="utiliser" name="'.$value['Objet'].'">';
						echo "</form>";
					}
					else echo '<br>Cet objet ne peut être utiliser sur un de vos pokémons';
				}


				else if($value['TypeO']=="Rappel"){

					$pokemon = mysqli_query($link,$pokemo);
					$pokemonn = mysqli_query($link,$pokemo);

					$i=0;
					while ($valuet=mysqli_fetch_assoc($pokemon)) {
						if($valuet['PVAct']<=0){
							$i=$i+1;
						}
					}
					if($i!=0) {
						echo '<form method="post" action="objet.php">Utiliser sur : ';
						while ($valuet=mysqli_fetch_assoc($pokemonn)) {
							if($valuet['PVAct']<=0){
								echo $valuet['NomP'].'<input type="radio" name="poke" value="'.$valuet['ID'].'">';
							}
						}
						echo '<input type="submit" value="utiliser" name="'.$value['Objet'].'">';
						echo "</form>";
					}
					else echo '<br>Cet objet ne peut être utiliser sur un de vos pokémons';
				}


				else if($value['TypeO']=="Statut"){

					$pokemon = mysqli_query($link,$pokemo);
					$pokemonn = mysqli_query($link,$pokemo);

					$i=0;
					while ($valuet=mysqli_fetch_assoc($pokemon)) {
						if(($valuet['Statut']=='Poi' && $value['Objet']=='Antidote') || ($valuet['Statut']=='Para' && $value['Objet']=='AntiPara') || ($valuet['Statut']=='Som' && $value['Objet']=='Reveil') || ($valuet['Statut']=='Bru' && $value['Objet']=='AntiBrule') || ($valuet['Statut']=='Gel' && $value['Objet']=='AntiGel')){
							$i=$i+1;
						}
					}
					if($i!=0) {
						echo '<form method="post" action="objet.php">Utiliser sur : ';
						while ($valuet=mysqli_fetch_assoc($pokemonn)) {
							if(($valuet['Statut']=='Poi' && $value['Objet']=='Antidote') || ($valuet['Statut']=='Para' && $value['Objet']=='AntiPara') || ($valuet['Statut']=='Som' && $value['Objet']=='Reveil') || ($valuet['Statut']=='Bru' && $value['Objet']=='AntiBrule') || ($valuet['Statut']=='Gel' && $value['Objet']=='AntiGel')){
							echo $valuet['NomP'].'<input type="radio" name="poke" value="'.$valuet['ID'].'">';
							}
						}
						echo '<input type="submit" value="utiliser" name="'.$value['Objet'].'">';
					}
					else echo '<br>Cet objet ne peut être utiliser sur un de vos pokémons';
				}

				/*if($value['TypeO']=="PP"){
					$i=0;
					while ($valuet=mysqli_fetch_assoc($pokemon)) {
						if(){
							$i=$i+1;
						}
					}
					if($i!=0){ 
						echo '<input type="submit" value="utiliser" name="'.$value['Objet'].'">';
						
						while($valuet=mysqli_fetch_assoc($pokemon)) {
							if(){
							echo $valuet['NomP'].'<input type="radio" name="poke" value="'.$valuet['ID'].'">';
								if($value['PPcible']=='Une'){






								}
							}
						}
						echo '<input type="submit" value="utiliser" name="'.$value['Objet'].'">';
						echo "</form>";
					}
				}*/
			}

			else echo "<br>Vous ne possédez pas cet objet<br>";


				echo "</li></fieldset>";
			}
		}
		?>

	</ul>
	<a href="log.php"><input type="button" name="menu" value="menu"></a>
</body>
</html>