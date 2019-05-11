<?php 

if (isset($_COOKIE['idpokemonsauvage'])) {
		header("location: chasse.php");
	}

else if (isset($_COOKIE['ADV'])) {
		header("location: lobby.php");
	}

?>