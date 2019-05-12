<?php
	include 'user.php';
	$degat = null; 
	$res = null;
	/*$_POST['OBJETH'] = "";
	$_POST['CHOIXH'] = 1;
	$_POST['POKEMONSWAPH'] = 0;
	$_POST['ATTACKH'] = 0;
	$_POST['joueur'] = "kett";*/
	/*$_POST['infoh'] = "kett";
	$_POST['joueur'] = "kett";*/
	if (isset($_POST['CHOIXA'])) {
		 SetChoixA($_POST['CHOIXA'],$_POST['ATTACKA'],$_POST['POKEMONSWAPA'],$_POST['OBJETA'],$_POST['joueur']);
		
		

	
	}
	else if(isset($_POST['CHOIXH'])){
		SetChoixH($_POST['CHOIXH'],$_POST['ATTACKH'],$_POST['POKEMONSWAPH'],$_POST['OBJETH'],$_POST['joueur']);
		//SetNULLH($_POST['joueur']);
	

	}
	else if (isset($_POST['infoa'])) {
		$res = GET_INFOA($_POST['joueur']);
	
		echo json_encode(GET_INFOA($_POST['joueur']));
		SetNULLA($_POST['joueur']);
	}
	else if (isset($_POST['infoh'])) {
		$res = GET_INFOH($_POST['joueur']);
	
		echo json_encode(GET_INFOH($_POST['joueur']));
		SetNULLH($_POST['joueur']);
	}
	else if (isset($_POST['degata'])) {
		$degat = GET_INFOA($_POST['joueur']);
		while ($degat['DEGATH'] == NULL) {
			$degat = GET_INFOA($_POST['joueur']);
		}
		SetNULLDEGATA($_POST['joueur']);
		return $degat['DEGATH']; 
	}
	else if (isset($_POST['degath'])) {
		$degat = GET_INFOH($_POST['joueur']);
		while($degat['DEGATA'] == NULL){
			$degat = GET_INFOH($_POST['joueur']);
		}
		SetNULLDEGATH($_POST['joueur']);
		return $degat['DEGATA']; 
	}
	else if (isset($_POST['degataa'])) {
		SetDEGATA($_POST['degataa'],$_POST['joueur']);
		
	}
	else if (isset($_POST['degathh'])) {
		SetDEGATH($_POST['degathh'],$_POST['joueur']);
		
	}


?>