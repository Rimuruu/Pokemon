<?php 



if(!@include_once('bdd.php')) {
  include 'bdd.php';
}

if(!@include_once('pokemon.php')) {
  include 'pokemon.php';
}


function Ajout_compte($nomcompte,$mdp,$cmdp,$poke){
	if ($mdp != $cmdp) {
	include 'erreurmdp.php';
}
else{
$link = create_link();
$querytest = "SELECT * from compte where NOM=? OR MDP=?"; 
$stmt2 = mysqli_prepare($link,$querytest);
mysqli_stmt_bind_param($stmt2,"ss",$nomcompte,$mdp);
mysqli_execute($stmt2);
$result = mysqli_stmt_get_result($stmt2);
if (mysqli_num_rows($result)>0) {
	include 'erreurverif.php';
}
else{
	switch ($poke) {
	case 1:
		$nompoke = utf8_decode("Salamèche");
		break;
	case 2:
		$nompoke = "Bulbizarre";
		break;
	case 3:
		$nompoke = "Carapuce";
		break;
	}
	$querytest = "SELECT * from banque where ID=?";
	$stmt2 = mysqli_prepare($link,$querytest);
	$idpoke = rand(1, 99999);
	mysqli_stmt_bind_param($stmt2,"i",$idpoke);
	echo mysqli_error($link);
	mysqli_execute($stmt2);
	$result = mysqli_stmt_get_result($stmt2);
	while (mysqli_num_rows($result) > 0) {
		$querytest = "SELECT * from banque where ID=?";
		$stmt2 = mysqli_prepare($link,$querytest);
		$idpoke = rand(1, 99999);
		$verif=mysqli_stmt_bind_param($stmt2,"i",$idpoke);
		mysqli_execute($stmt2);
		$result = mysqli_stmt_get_result($stmt2);
	}
	$query= "INSERT INTO compte (NOM,MDP) VALUES (?,?)";
	$query2= "INSERT INTO banque (NOM,ID) VALUES (?,?)";
	$query3= "INSERT INTO equipe (NOM,SLOT1) VALUES (?,?)";
	$stmt = mysqli_prepare($link,$query);
	$stmt2 = mysqli_prepare($link,$query2);
	$stmt3 = mysqli_prepare($link,$query3);
	mysqli_stmt_bind_param($stmt,"ss",$nomcompte,$mdp);
	mysqli_stmt_bind_param($stmt2,"si",$nompoke,$idpoke);
	mysqli_stmt_bind_param($stmt3,"si",$nomcompte,$idpoke);
	mysqli_execute($stmt);
	mysqli_execute($stmt2);
	mysqli_execute($stmt3);
	Set_default_cap($idpoke);
	echo mysqli_error($link);
	mysqli_close($link);
	include 'login2.php';

		}
	}
}

function Ajout_Pokemon($nomcompte,$idpoke,$SLOTNUMBER){
	$link = create_link();
	$query3= "UPDATE equipe SET SLOT".$SLOTNUMBER."=? where NOM=?";
	$stmt3 = mysqli_prepare($link,$query3);
	mysqli_stmt_bind_param($stmt3,"is",$idpoke,$nomcompte);
	mysqli_execute($stmt3);
	mysqli_close($link);

}

function Show_team($nomcompte){
	$link =create_link();
	echo "<ul>Equipe pokemon";
	for ($i=1; $i <= 6 ; $i=$i+1) { 
		$querytest = "SELECT banque.NOM FROM banque JOIN equipe ON banque.ID = equipe.SLOT".$i." JOIN compte ON compte.NOM = equipe.NOM where compte.NOM=?"; 
		$stmt2 = mysqli_prepare($link,$querytest);
		mysqli_stmt_bind_param($stmt2,"s",$nomcompte);
		mysqli_execute($stmt2);
		$result = mysqli_stmt_get_result($stmt2);
		$res = mysqli_fetch_assoc($result);
		if ($res['NOM']==NULL) {
			echo "<li> Vide </li>";
		}
		else{
		echo "<li id='pokesauvage'> ".utf8_encode($res['NOM'])." </li>";
	}
	}
	echo "<ul>";
	mysqli_close($link);
}

function Show_pokedollar($nomcompte){
	$link =create_link();
	$querytest = "SELECT Pokedollar FROM compte where NOM=?"; 
	$stmt2 = mysqli_prepare($link,$querytest);
	mysqli_stmt_bind_param($stmt2,"s",$nomcompte);
	mysqli_execute($stmt2);
	$result = mysqli_stmt_get_result($stmt2);
	$res = mysqli_fetch_assoc($result);
	echo "<h2>".$res['Pokedollar']."  Pokédollar</h2>";
	mysqli_close($link);

}


function Show_nth_pokemon($nomcompte,$nth){
	$link =create_link();
	$querytest = "SELECT banque.NOM FROM banque JOIN equipe ON banque.ID = equipe.SLOT".$nth." JOIN compte ON compte.NOM = equipe.NOM where compte.NOM=?"; 
	$stmt2 = mysqli_prepare($link,$querytest);
	mysqli_stmt_bind_param($stmt2,"s",$nomcompte);
	mysqli_execute($stmt2);
	$result = mysqli_stmt_get_result($stmt2);
	$res = mysqli_fetch_assoc($result);
	if ($res['NOM']==NULL) {
		echo "<li> Vide </li>";
	}
	else{
	echo "<li> ".utf8_encode($res['NOM'])." </li>";

	}
	mysqli_close($link);
}

function Catch_Pokemon($nomcompte,$idpoke){
	$link =create_link();
	$querytest = "Select SLOT1,SLOT2,SLOT3,SLOT4,SLOT5,SLOT6 FROM equipe JOIN compte ON equipe.NOM = compte.NOM where compte.NOM=?";
	$stmt2 = mysqli_prepare($link,$querytest);
	mysqli_stmt_bind_param($stmt2,"s",$nomcompte);
	mysqli_execute($stmt2);
	$result = mysqli_stmt_get_result($stmt2);
	$res = mysqli_fetch_assoc($result);
	for ($i=1; $i <= 6; $i=$i+1) { 
		$SLOT = $res['SLOT'.$i];
		if ($SLOT == NULL) {
			$SLOTNUMBER = $i;
			break;
		}
	}
	if ($SLOT == NULL) {
		Ajout_Pokemon($nomcompte,$idpoke,$SLOTNUMBER);
		
	}
	mysqli_close($link);






}









 ?>