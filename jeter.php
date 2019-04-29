<?php

session_start();
include 'user.php';
include 'security.php';

$link =create_link();
$sql = mysqli_query($link,'SELECT Objet FROM listeinventaire');

while ($value=mysqli_fetch_assoc($sql)) {
	if(isset($_POST[$value['Objet']])){
		$ob = $value['Objet'];
	}
}

$sac='UPDATE sac SET nb'.$ob.'=nb'.$ob.'-'.$_POST['quantite'].' WHERE Dresseur="'.$nomcompte.'"';
$sql = mysqli_query($link,$sac);

header("location: inventaire.php");
 ?>
