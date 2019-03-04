<?php 


if(!@include_once('bdd.php')) {
  include 'bdd.php';
}

if(!@include_once('user.php')) {
  include 'user.php';
}

function Set_default_cap($idpoke){
	$link = create_link();
	for ($i=1; $i <= 4 ; $i=$i+1) { 
		$querytest = "SELECT pokedex.CAP".$i." FROM banque JOIN pokedex ON pokedex.NOM = banque.NOM where banque.ID =?"; 
		$stmt2 = mysqli_prepare($link,$querytest);
		mysqli_stmt_bind_param($stmt2,"i",$idpoke);
		mysqli_execute($stmt2);
		$result = mysqli_stmt_get_result($stmt2);
		$res = mysqli_fetch_assoc($result);

		
		if ($res['CAP'.$i]!=NULL) {
			$CAP=$res['CAP'.$i];
			$querytest = "UPDATE banque SET CAP".$i."=? WHERE ID=?"; 
			$stmt2 = mysqli_prepare($link,$querytest);
			mysqli_stmt_bind_param($stmt2,"si",$CAP,$idpoke);
			mysqli_execute($stmt2);
			$result = mysqli_stmt_get_result($stmt2);
			
		}
	}
	mysqli_close($link);
}
	
function Show_cap($nomcompte,$nth){
	$link =create_link();
	$querytest = "SELECT banque.CAP1,banque.CAP2,banque.CAP3,banque.CAP4 FROM banque JOIN equipe ON banque.ID = equipe.SLOT".$nth." JOIN compte ON compte.NOM = equipe.NOM where compte.NOM=?"; 
	$stmt2 = mysqli_prepare($link,$querytest);
	mysqli_stmt_bind_param($stmt2,"s",$nomcompte);
	mysqli_execute($stmt2);
	$result = mysqli_stmt_get_result($stmt2);
	$res = mysqli_fetch_assoc($result);
	echo "<ul>Capacité";
	echo "<li>".$res['CAP1']."</li>";
	echo "<li>".$res['CAP2']."</li>";
	echo "<li>".$res['CAP3']."</li>";
	echo "<li>".$res['CAP4']."</li>";
	echo "</ul>";
	mysqli_close($link);
}


function Show_cap_by_id($idpoke){
	$link =create_link();
	$querytest = "SELECT CAP1,CAP2,CAP3,CAP4 FROM banque where ID=?"; 
	$stmt2 = mysqli_prepare($link,$querytest);
	mysqli_stmt_bind_param($stmt2,"i",$idpoke);
	mysqli_execute($stmt2);
	$result = mysqli_stmt_get_result($stmt2);
	$res = mysqli_fetch_assoc($result);
	echo "<ul>Capacité";
	echo "<li>".$res['CAP1']."</li>";
	echo "<li>".$res['CAP2']."</li>";
	echo "<li>".$res['CAP3']."</li>";
	echo "<li>".$res['CAP4']."</li>";
	echo "<ul>";
	mysqli_close($link);
}

function NomDepuisNumero($numero){
	$link = create_link();
	$querytest = "SELECT NOM from pokedex where NUMERO=?";
	$stmt2 = mysqli_prepare($link,$querytest);
	mysqli_stmt_bind_param($stmt2,"i",$numero);
	mysqli_execute($stmt2);
	$result = mysqli_stmt_get_result($stmt2);
	$res = mysqli_fetch_assoc($result);
	mysqli_close($link);
	return $res['NOM'];
}


function Pokemon_alea(){
	$link = create_link();
	$querytest = "SELECT * from banque where ID=?";
	$stmt2 = mysqli_prepare($link,$querytest);
	$idpoke = rand(1, 99999);
	mysqli_stmt_bind_param($stmt2,"i",$idpoke);
	echo mysqli_error($link);
	mysqli_execute($stmt2);
	$result = mysqli_stmt_get_result($stmt2);
	while (mysqli_num_rows($result) > 0) {
		$querytest = "SELECT * from banque where ID=?";
		$stmt2 = mysqli_prepare($link,$querytest);
		$idpoke = rand(1, 99999);
		$verif=mysqli_stmt_bind_param($stmt2,"i",$idpoke);
		mysqli_execute($stmt2);
		$result = mysqli_stmt_get_result($stmt2);
	}
	$idpoke2 = rand(1, 3);
	$nompoke = NomDepuisNumero($idpoke2);
	$query2= "INSERT INTO banque (NOM,ID) VALUES (?,?)";
	$stmt2 = mysqli_prepare($link,$query2);
	mysqli_stmt_bind_param($stmt2,"si",$nompoke,$idpoke);
	mysqli_execute($stmt2);
	Set_default_cap($idpoke);
	mysqli_close($link);
	return $idpoke;
	
}

function Show_pokemon_by_id($idpoke){
	$link =create_link();
	$querytest = "SELECT NOM FROM banque where ID=?"; 
	$stmt2 = mysqli_prepare($link,$querytest);
	mysqli_stmt_bind_param($stmt2,"i",$idpoke);
	mysqli_execute($stmt2);
	$result = mysqli_stmt_get_result($stmt2);
	$res = mysqli_fetch_assoc($result);
	if ($res['NOM']==NULL) {
		echo "<li> Vide </li>";
	}
	else{
	echo "<li id='pokesauvage'> ".utf8_encode($res['NOM'])." </li>";

	}
	mysqli_close($link);
}





 ?>