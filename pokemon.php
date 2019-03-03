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
			echo '<script>console.log("'.$CAP.'")</script>';
			$querytest = "UPDATE banque SET CAP".$i."=? WHERE ID=?"; 
			$stmt2 = mysqli_prepare($link,$querytest);
			mysqli_stmt_bind_param($stmt2,"si",$CAP,$idpoke);
			mysqli_execute($stmt2);
			$result = mysqli_stmt_get_result($stmt2);
			
		}
	}
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
	echo "<ul>";

	




}




 ?>