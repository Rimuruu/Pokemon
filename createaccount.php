<?php
if (!isset($_POST['nomcompte'])) {
 	header("Location: login.php"); } 
extract($_POST);
include 'user.php';
Ajout_compte($nomcompte,$mdp,$cmdp,$poke);
 ?>