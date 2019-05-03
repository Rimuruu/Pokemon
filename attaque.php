<?php 

session_start();
include 'security.php';
include 'user.php';
if (!isset($_SESSION['idpokemonsauvage'])) {
	header("location: login.php");
}
$idpokemonsauvage = $_SESSION['idpokemonsauvage'];

$nompoke=NomDepuisID($idpokemonsauvage);
Delete_Pokemon_byID($idpokemonsauvage);
$_SESSION['idpokemonsauvage']=NULL;
if ($_COOKIE['pokemonjoueur']['GAINXP'] == 1) {
	addXP($_COOKIE['pokemonjoueur']['ID']);
	CheckEvolution($_COOKIE['pokemonjoueur']['ID']);
}
for ($i=0; $i < 5; $i++) { 
 			if ($_COOKIE['team'][$i]['ID'] != 'NULL') {
 				if ($_COOKIE['team'][$i]['GAINXP'] += 1) {
 					addXP($_COOKIE['team'][$i]['ID']);
 					CheckEvolution($_COOKIE['team'][$i]['ID']);
 				}
 			}
 			
 }
unset($_COOKIE['idpokemonsauvage']);
setcookie('idpokemonsauvage', '', time() - 3600);

unset($_COOKIE['pokemonsauvage[HP]']);
setcookie('pokemonsauvage[HP]', '', time() - 3600);
unset($_COOKIE['pokemonsauvage[ID]']);
setcookie('pokemonsauvage[ID]', '', time() - 3600);


unset($_COOKIE['pokemonjoueur[ID]']);
setcookie('pokemonjoueur[ID]', '', time() - 3600);
unset($_COOKIE['pokemonjoueur[HP]']);
setcookie('pokemonjoueur[HP]', '', time() - 3600);
unset($_COOKIE['pokemonjoueur[GAINXP]']);
setcookie('pokemonjoueur[GAINXP]', '', time() - 3600);


unset($_COOKIE['tour']);
setcookie('tour', '', time() - 3600);



for ($i=0; $i < 5  ; $i=$i+1) { 
	unset($_COOKIE['team['.$i.'][HP]']);
	setcookie('team['.$i.'][HP]', '', time() - 3600);
	unset($_COOKIE['team['.$i.'][ID]']);
	setcookie('team['.$i.'][ID]', '', time() - 3600);
	unset($_COOKIE['team['.$i.'][GAINXP]']);
	setcookie('team['.$i.'][GAINXP]', '', time() - 3600);
}

//header("location: log.php");


 ?>

