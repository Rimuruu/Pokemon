<?php

session_start();
include 'security.php';
include 'user.php';
include 'match.php';
$link =create_link();
$linkk=create_link();
$sql = mysqli_query($link,'SELECT Objet,TypeO FROM listeinventaire');
while ($value=mysqli_fetch_assoc($sql)) {
	if(isset($_POST[$value['Objet']])){
		$ob = $value['Objet'];
		$type = $value['TypeO'];
	}
}

$sac='UPDATE sac SET nb'.$ob.'=nb'.$ob.'- 1 WHERE Dresseur="'.$nomcompte.'"';
$sql = mysqli_query($link,$sac);


$infoob = 'SELECT * FROM listeinventaire WHERE Objet="'.$ob.'"';
$infobb=mysqli_query($link,$infoob);
$info=mysqli_fetch_assoc($infobb);
$infop = 'SELECT * FROM banque WHERE ID="'.$_POST['poke'].'"';
$infopp = mysqli_query($linkk,$infop);
$infoo=mysqli_fetch_assoc($infopp);



if($type=="Soin"){
$soin=$infoo['PVact']+$info['PVSoin'];
echo $soin;
if($soin>$infoo['PVmax']) $soin=$infoo['PVmax'];
$req='UPDATE banque SET PVact="'.$soin.'" WHERE ID="'.$_POST['poke'].'"';
}

if($type=="Statut"){
$req='UPDATE banque SET Statut=NULL WHERE ID="'.$_POST['poke'].'"';
echo $req;
}

if($type=="Rappel"){
	if($info['Rappel']=='Partiel') $soin=$infoo['PVmax']/2;
	else $soin = $infoo['PVmax'];
	$req = $req='UPDATE banque SET PVact="'.$soin.'" WHERE ID="'.$_POST['poke'].'"';
}

mysqli_query($link,$req);

header("location: inventaire.php")
?>