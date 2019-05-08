<?php 
session_start();
include 'user.php';
if (isset($_SESSION['nomcompte'])) {
		$nomcompte = $_SESSION['nomcompte'];
		Deco($nomcompte);
	}

session_destroy();
header("location: login.php");

 ?>