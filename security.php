<?php 

	if(!@include_once('bdd.php')) {
  		include 'bdd.php';
	}
	function encryptmdp2($pure_string) {
	$encryption_key = "SMASHMEILLEURJEUDUMONDEONDEVRAITDONNERASAKURAIUNPRIXNOBELPOURSONOEUVRE";
    $encrypted_string = crypt($pure_string,$encryption_key);
    return $encrypted_string;
}
	


	if (isset($_SESSION['nomcompte'])) {
		$nomcompte = $_SESSION['nomcompte'];
	}
	else if (isset($_POST['nomcompte'])) {
		$nomcompte = $_POST['nomcompte'];
		$mdp = $_POST['mdp'];
		$mdp = encryptmdp2($mdp);
		$link =create_link();
		$querytest = "SELECT * from compte where NOM=? AND MDP=?"; 
		$stmt2 = mysqli_prepare($link,$querytest);
		mysqli_stmt_bind_param($stmt2,"ss",$nomcompte,$mdp);
		mysqli_execute($stmt2);
		$result = mysqli_stmt_get_result($stmt2);
		if (mysqli_num_rows($result)>0) {
			$_SESSION['nomcompte'] = $nomcompte;
		}
		else{
			mysqli_close($link);
			header("location: erreurcompte.php");
			
		}
		mysqli_close($link);
			
	}
	else{
		header("location: login.php");
	}




 ?>