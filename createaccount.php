<?php
if (!isset($_POST['nomcompte'])) {
 	header("Location: login.php"); } 
extract($_POST);
if ($mdp != $cmdp) {
	include 'erreurmdp.php';
}
else{
$link =new mysqli('localhost','root','','pokemon');
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
	$query= "INSERT INTO compte (NOM,MDP,IDPOKEMON) VALUES (?,?,?)";
	$query2= "INSERT INTO banque (NOM,ID) VALUES (?,?)";
	$stmt = mysqli_prepare($link,$query);
	$stmt2 = mysqli_prepare($link,$query2);
	mysqli_stmt_bind_param($stmt,"ssi",$nomcompte,$mdp,$idpoke);
	mysqli_stmt_bind_param($stmt2,"si",$nompoke,$idpoke);
	mysqli_execute($stmt);
	mysqli_execute($stmt2);
	echo mysqli_error($link);
	mysqli_close($link);
	include 'login2.php';
	}
}
 ?>