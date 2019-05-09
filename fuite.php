<?php


session_start();
include 'security.php';
include 'user.php';


if (isset($_COOKIE['idpokemonsauvage'])) {

	$link =create_link();
	$req = 'DELETE FROM banque WHERE ID="'.$_COOKIE['idpokemonsauvage'].'"';
	$sql = mysqli_query($link,$req);
	unset($_COOKIE['idpokemonsauvage']);
	setcookie('idpokemonsauvage','',time()-3600);
}


header("location: log.php");

?>