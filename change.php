<?php 
session_start();
include 'security.php';
include 'user.php';
if (!isset($_COOKIE['slot1'])) {
	header("location: login.php");
}
Ajout_Pokemon($nomcompte,$_COOKIE['slot1'],1);
Ajout_Pokemon($nomcompte,$_COOKIE['slot2'],2);
Ajout_Pokemon($nomcompte,$_COOKIE['slot3'],3);
Ajout_Pokemon($nomcompte,$_COOKIE['slot4'],4);
Ajout_Pokemon($nomcompte,$_COOKIE['slot5'],5);
Ajout_Pokemon($nomcompte,$_COOKIE['slot6'],6);

unset($_COOKIE['slot1']);
unset($_COOKIE['slot2']);
unset($_COOKIE['slot3']);
unset($_COOKIE['slot4']);
unset($_COOKIE['slot5']);
unset($_COOKIE['slot6']);
setcookie('slot1', '', time() - 3600);
setcookie('slot2', '', time() - 3600);
setcookie('slot3', '', time() - 3600);
setcookie('slot4', '', time() - 3600);
setcookie('slot5', '', time() - 3600);
setcookie('slot6', '', time() - 3600);
header("location: log.php");














?>