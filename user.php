<?php 



if(!@include_once('bdd.php')) {
  include 'bdd.php';
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
		$nompoke = "Salamèche";
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
	echo mysqli_error($link);
	mysqli_close($link);
	include 'login2.php';

		}
	}
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
		echo "<li> ".$res['NOM']." </li>";
	}
	}
	echo "<ul>";




}








 ?>