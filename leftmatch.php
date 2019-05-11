<?php
session_start();
include 'security.php';
include 'user.php';
$role = get_slot($nomcompte, $_COOKIE['ADV']);
if ($role == 'Adv') {
	$host = $_COOKIE['ADV'];
	$adv = $nomcompte;
}
else{
	$host = $nomcompte;
	$adv = $_COOKIE['ADV'];
}
if ((Role_Co($host,$adv) == 'Host' && $role == 'Host') || (Role_Co($host,$adv) == 'Adv' && $role == 'Adv')) {
	Delete_Match($host,$adv);
}
else if($role == 'Host'){
	left_matchHost($host,$adv);
}
else if ($role == 'Adv') {
	left_matchAdv($adv,$host);
}

unset($_COOKIE['ADV']);
setcookie('ADV', '', time() - 3600);
header("location: log.php");

?>