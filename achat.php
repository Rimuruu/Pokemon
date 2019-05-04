<?php

session_start();
include 'user.php';
include 'security.php';
include 'match.php';
$link =create_link();
$sql = mysqli_query($link,'SELECT Objet,Prix FROM listeinventaire');

while ($value=mysqli_fetch_assoc($sql)) {
	if(isset($_POST[$value['Objet']])){
		$prixo = $value['Prix'];
		$ob = $value['Objet'];
	}
}

$argentp=$_POST['quantite']*$prixo;

$query='UPDATE compte SET Pokedollar=Pokedollar-'.$argentp.' WHERE nom="'.$nomcompte.'"';
$sql=mysqli_query($link,$query);

$sac='UPDATE sac SET nb'.$ob.'=nb'.$ob.'+'.$_POST['quantite'].' WHERE Dresseur="'.$nomcompte.'"';
$sql=mysqli_query($link,$sac);

header("location: boutique.php");
?>