<?php 

session_start();
include 'security.php';
include 'user.php';
include 'match.php';
if (!isset($_SESSION['idpokemonsauvage'])) {
	header("location: login.php");
}
$idpokemonsauvage = $_SESSION['idpokemonsauvage'];

$nompoke=NomDepuisID($idpokemonsauvage);
Delete_Pokemon_byID($idpokemonsauvage);
$_SESSION['idpokemonsauvage']=NULL;
if (isset($_COOKIE['pokemonjoueur']['ID'])) {
	setPVact($_COOKIE['pokemonjoueur']['ID'],$_COOKIE['pokemonjoueur']['HP']);
}
if ($_COOKIE['pokemonjoueur']['GAINXP'] == 1) {

	addXP($_COOKIE['pokemonjoueur']['ID']);
	CheckEvolution($_COOKIE['pokemonjoueur']['ID']);
}
for ($i=0; $i < 5; $i++) { 
 			if ($_COOKIE['team'][$i]['ID'] != 'NULL') {
 				setPVact($_COOKIE['team'][$i]['ID'] ,$_COOKIE['team'][$i]['HP']);
 				if ($_COOKIE['team'][$i]['GAINXP'] == 1) {
 					addXP($_COOKIE['team'][$i]['ID']);
 					CheckEvolution($_COOKIE['team'][$i]['ID']);
 				}
 			}
 			
 }

  $item = getItem($nomcompte);
 if (isset($_COOKIE['nb_PokeBall'])) {
 	$item['nbPokeBall'] = $_COOKIE['nb_PokeBall'];
 }
 if (isset($_COOKIE['nb_potion'])) {
 	$item['nbPotion'] = $_COOKIE['nb_potion'];
 }
changeItem($nomcompte,$item);
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
unset($_COOKIE['nb_PokeBall']);
setcookie('nb_PokeBall', '', time() - 3600);
unset($_COOKIE['nb_potion']);
setcookie('nb_potion', '', time() - 3600);



for ($i=0; $i < 5  ; $i=$i+1) { 
	unset($_COOKIE['team['.$i.'][HP]']);
	setcookie('team['.$i.'][HP]', '', time() - 3600);
	unset($_COOKIE['team['.$i.'][ID]']);
	setcookie('team['.$i.'][ID]', '', time() - 3600);
	unset($_COOKIE['team['.$i.'][GAINXP]']);
	setcookie('team['.$i.'][GAINXP]', '', time() - 3600);
}

header("location: log.php");


 ?>

