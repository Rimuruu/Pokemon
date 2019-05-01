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

function Get_pokedex($numP){
	$link =create_link();
	$querytest = "SELECT * FROM pokedex where NumP=?"; 

	$stmt2 = mysqli_prepare($link,$querytest);
	mysqli_stmt_bind_param($stmt2,"i",$numP);
	mysqli_execute($stmt2);
	$result = mysqli_stmt_get_result($stmt2);
	$res = mysqli_fetch_assoc($result);
	mysqli_close($link);

	return $res;

}

function CheckEvolution($idpoke){
	$poke = Get_pokemon($idpoke);
	$stat = Get_pokedex($poke['NumP']);
	if ($stat['NiveauEvolution'] != NULL) {
		
	
		if ($poke['Niv'] >= $stat['NiveauEvolution']) {
			$link =create_link();
			$stat = Get_pokedex($stat['Evolution']);
			if ($stat['TypeD'] == NULL) {
				$stat['TypeD'] ="NULL";
				$query = "UPDATE banque SET NumP=".$stat['NumP'].", NomP='".$stat['NomP']."', Courbe='".$stat['Courbe']."',TypeU='".$stat['TypeU']."'   WHERE ID=".$idpoke;
			}
			else{
				$link =create_link();
				$stat = Get_pokedex($stat['Evolution']);
			$query = "UPDATE banque SET NumP=".$stat['NumP'].", NomP='".$stat['NomP']."', Courbe='".$stat['Courbe']."',TypeU='".$stat['TypeU']."', TypeD='".$stat['TypeD']."'   WHERE ID=".$idpoke;}
			echo $query;
			mysqli_query($link,$query);
			mysqli_close($link);
			return true;
		}
	}
	return false;


}

function CheckLevelUp($idpoke){
	$poke = Get_pokemon($idpoke);
	$link = create_link();
	if ($poke['Courbe'] == "Moyen-") {
		$xpbesoin = pow($poke['Niv'],3);
	}
	else if ($poke['Courbe'] == "Moyen+") {
		$xpbesoin = 1.2*pow($poke['Niv'],3)-(15*pow($poke['Niv'],2))+100*$poke['Niv']-140;
	}
	else if ($poke['Courbe'] == "Rapide") {
		$xpbesoin = pow($poke['Niv'],3)*0.8;
	}
	else{
		$xpbesoin = pow($poke['Niv'],3)*1.25;

	}
	if (round($xpbesoin) <= $poke['XP']) {
		$query = "UPDATE banque SET Niv = Niv + 1 WHERE ID =".$idpoke;
		mysqli_query($link,$query);
		$query = "UPDATE banque SET XP = XP - ".round($xpbesoin)." WHERE ID =".$idpoke;
		mysqli_query($link,$query);
		$stat =  Get_pokedex($poke['NumP']);
		$niv = $poke['Niv']+1;
		$poke['PVmax'] = ((2*$stat['PV']+$poke['IVPV']+5)*$niv)/100+5+$niv+10;
		$poke['Attaque'] = ((2*$stat['Attaque']+$poke['IVAttaque']+5)*$niv)/100+5;
		$poke['Defense'] = ((2*$stat['Defense']+$poke['IVDefense']+5)*$niv)/100+5;
		$poke['Vitesse'] = ((2*$stat['Vitesse']+$poke['IVVitesse']+5)*$niv)/100+5;
		$poke['AttSpe'] = ((2*$stat['AttSpe']+$poke['IVAttSpe']+5)*$niv)/100+5;
		$poke['DefSPe'] = ((2*$stat['DefSPe']+$poke['IVDefSpe']+5)*$niv)/100+5;
		$query = "UPDATE banque SET  PVmax=".$poke['PVmax'].",Attaque=".$poke['Attaque'].",Defense=".$poke['Defense'].",Vitesse=".$poke['Vitesse'].",AttSpe=".$poke['AttSpe'].",DefSPe=".$poke['DefSPe']." WHERE ID =".$idpoke;
		echo $query;
		mysqli_query($link,$query);
	}
	$poke = Get_pokemon($idpoke);
	if ($poke['Courbe'] == "Moyen-") {
		$xpbesoin = pow($poke['Niv'],3);
	}
	else if ($poke['Courbe'] == "Moyen+") {
		$xpbesoin = 1.2*pow($poke['Niv'],3)-(15*pow($poke['Niv'],2))+100*$poke['Niv']-140;
	}
	else if ($poke['Courbe'] == "Rapide") {
		$xpbesoin = pow($poke['Niv'],3)*0.8;
	}
	else{
		$xpbesoin = pow($poke['Niv'],3)*1.25;

	}
	mysqli_close($link);
	if (round($xpbesoin) <= $poke['XP']) {
		return true;
	}
	else{
		return false;
	}
	
}
function addXP($idpoke){
	$poke = Get_pokemon($idpoke);
	$link = create_link();
	if ($poke['Niv'] != 100) {
		$query = "UPDATE banque SET XP = XP + ".$poke['XPVaincu']." WHERE ID =".$idpoke;
		//echo $query;
		mysqli_query($link,$query);
	}
	while (CheckLevelUp($idpoke)) {
		CheckLevelUp($idpoke);
	}
	mysqli_close($link);

}

function Set_default_hp($idpoke){
	$link = create_link();
		$querytest = "SELECT pokédex.PV FROM banque JOIN pokédex ON pokédex.NOMP = banque.NOMP where banque.ID =?"; 
		$stmt2 = mysqli_prepare($link,$querytest);
		mysqli_stmt_bind_param($stmt2,"i",$idpoke);
		mysqli_execute($stmt2);
		$result = mysqli_stmt_get_result($stmt2);
		$res = mysqli_fetch_assoc($result);
			$HP=$res['HP'];
			$querytest = "UPDATE banque SET PVact=? WHERE ID=?"; 
			$stmt2 = mysqli_prepare($link,$querytest);
			mysqli_stmt_bind_param($stmt2,"ii",$HP,$idpoke);
			mysqli_execute($stmt2);
			$result = mysqli_stmt_get_result($stmt2);
	mysqli_close($link);
}

function getHpById($idpoke){
	$link = create_link();
		$querytest = "SELECT PVact FROM banque where ID =?"; 
		$stmt2 = mysqli_prepare($link,$querytest);
		mysqli_stmt_bind_param($stmt2,"i",$idpoke);
		mysqli_execute($stmt2);
		$result = mysqli_stmt_get_result($stmt2);
		$res = mysqli_fetch_assoc($result);
		$HP=$res['PVact'];
		mysqli_close($link);
		return $HP;
}
	
function Show_cap($nomcompte,$nth){
	$link =create_link();
	$querytest = "SELECT banque.CAP1,banque.CAP2,banque.CAP3,banque.CAP4 FROM banque JOIN equipe ON banque.ID = equipe.SLOT".$nth." JOIN compte ON compte.NOM = equipe.NOM where compte.NOM=?"; 
	$stmt2 = mysqli_prepare($link,$querytest);
	mysqli_stmt_bind_param($stmt2,"s",$nomcompte);
	mysqli_execute($stmt2);
	$result = mysqli_stmt_get_result($stmt2);
	$res = mysqli_fetch_assoc($result);
	echo "<ul> Capacité";
	for ($i=1; $i <= 4; $i=$i+1) {
		if ($res['CAP'.$i]!=NULL) {
			echo "<li><input id='cap".$i."' type='button' value=".$res['CAP'.$i]."></li>";
		}
		
	}
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
	for ($i=1; $i < 5; $i++) { 
		if ($res['CAP'.$i] != NULL) {
			$querytest = "SELECT * FROM attaque where IDAtt=?"; 
			$stmt2 = mysqli_prepare($link,$querytest);
			mysqli_stmt_bind_param($stmt2,"i",$res['CAP'.$i]);
			mysqli_execute($stmt2);
			$result = mysqli_stmt_get_result($stmt2);
			$res['CAP'.$i] = mysqli_fetch_assoc($result);
			$res['CAP'.$i]['NomA'] = utf8_encode($res['CAP'.$i]['NomA']);
		}
	}
	return $res;
	mysqli_close($link);
}

function NomDepuisNumero($numero){
	$link = create_link();
	$querytest = "SELECT NOMP from pokedex where NumP=?";
	$stmt2 = mysqli_prepare($link,$querytest);
	mysqli_stmt_bind_param($stmt2,"i",$numero);
	mysqli_execute($stmt2);
	$result = mysqli_stmt_get_result($stmt2);
	$res = mysqli_fetch_assoc($result);
	mysqli_close($link);
	return $res['NOMP'];
}

function NomDepuisId($numero){
	$link = create_link();
	$querytest = "SELECT NOMP from banque where ID=?";
	$stmt2 = mysqli_prepare($link,$querytest);
	mysqli_stmt_bind_param($stmt2,"i",$numero);
	mysqli_execute($stmt2);
	$result = mysqli_stmt_get_result($stmt2);
	$res = mysqli_fetch_assoc($result);
	mysqli_close($link);
	return utf8_encode($res['NOMP']);
}


function Pokemon_alea($lvl){
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
	$query = "SELECT NumP FROM pokedex WHERE NumP NOT IN (SELECT Evolution FROM pokedex WHERE Evolution IS NOT NULL)";
	$res = mysqli_query($link,$query);

	$nb_poke= mysqli_num_rows($res);
	$rand_poke = rand(1,$nb_poke);
	mysqli_data_seek($res, $rand_poke);
	$resatt = mysqli_fetch_assoc($res);
	$idpoke2 = $resatt['NumP'];
	$nompoke = NomDepuisNumero($idpoke2);
	//echo $nompoke;
	Ajouter_pokemon_sauv($nompoke,$idpoke,$lvl);
	mysqli_close($link);
	return $idpoke;
	
}


function Ajouter_pokemon_sauv($nompoke,$idpoke,$lvl){
	$link = create_link();


	$querytest2 = "SELECT * from pokedex where NOMP=?";
	$stmt3 = mysqli_prepare($link,$querytest2);
	mysqli_stmt_bind_param($stmt3,"s",$nompoke);
	echo mysqli_error($link);
	mysqli_execute($stmt3);
	$result = mysqli_stmt_get_result($stmt3);
	$res = mysqli_fetch_assoc($result);
	$numP = $res['NumP'];
	if ($res['TypeD'] == NULL) {
		$querytest2 = "SELECT * from attaque where TypeA=? AND (ClasseA = 'Physique' OR ClasseA = 'Speciale')";
		//echo $querytest2;
		$stmt3 = mysqli_prepare($link,$querytest2);
		mysqli_stmt_bind_param($stmt3,"s",$res['TypeU']);

	}
	else{
		$querytest2 = "SELECT * from attaque where (TypeA=? OR TypeA=?) AND (ClasseA = 'Physique' OR ClasseA = 'Speciale' )";
		//echo $querytest2;
		$stmt3 = mysqli_prepare($link,$querytest2);
		mysqli_stmt_bind_param($stmt3,"ss",$res['TypeU'],$res['TypeD']);
	}
	

	echo mysqli_error($link);
	mysqli_execute($stmt3);
	$result = mysqli_stmt_get_result($stmt3);
	$nb_attaque= mysqli_num_rows($result);
	$rand_att = rand(1,$nb_attaque);
	 mysqli_data_seek($result, $rand_att);
	$resatt = mysqli_fetch_assoc($result);
	
	 $resa = $resatt['IDAtt'];
	 if ($res['TypeD'] == NULL) {
		$querytest2 = "SELECT * from attaque where TypeA=? AND (ClasseA = 'Autre' OR ClasseA = 'Speciale' OR ClasseA = 'Physique' )";
		$stmt3 = mysqli_prepare($link,$querytest2);
		mysqli_stmt_bind_param($stmt3,"s",$res['TypeU']);
	}
	else{
		$querytest2 = "SELECT * from attaque where (TypeA=? OR TypeA=?) AND (ClasseA = 'Autre' OR ClasseA = 'Speciale' OR ClasseA = 'Physique' )";
		$stmt3 = mysqli_prepare($link,$querytest2);
		mysqli_stmt_bind_param($stmt3,"ss",$res['TypeU'],$res['TypeD']);
	}
	
	echo mysqli_error($link);
	mysqli_execute($stmt3);
	$result = mysqli_stmt_get_result($stmt3);
	$nb_attaque= mysqli_num_rows($result);
	$rand_att = rand(1,$nb_attaque);
	mysqli_data_seek($result, $rand_att);
	$resatt = mysqli_fetch_assoc($result);
	$resb = $resatt['IDAtt'];
	while($resb == $resa) {
		 if ($res['TypeD'] == NULL) {
		$querytest2 = "SELECT * from attaque where TypeA=? AND (ClasseA = 'Autre' OR ClasseA = 'Speciale' OR ClasseA = 'Physique' )";
		$stmt3 = mysqli_prepare($link,$querytest2);
		mysqli_stmt_bind_param($stmt3,"s",$res['TypeU']);
		}
		else{
		$querytest2 = "SELECT * from attaque where (TypeA=? OR TypeA=?) AND (ClasseA = 'Autre' OR ClasseA = 'Speciale' OR ClasseA = 'Physique' )";
		$stmt3 = mysqli_prepare($link,$querytest2);
		mysqli_stmt_bind_param($stmt3,"ss",$res['TypeU'],$res['TypeD']);
		}
		echo mysqli_error($link);
		mysqli_execute($stmt3);
		$result = mysqli_stmt_get_result($stmt3);
		$nb_attaque= mysqli_num_rows($result);
		$rand_att = rand(1,$nb_attaque);
		mysqli_data_seek($result, $rand_att);
		$resatt = mysqli_fetch_assoc($result);
		$resb = $resatt['IDAtt'];
	}
	 

	//echo "resa: ".$resa." resb : ".$resb;
	

	
	$xp = 0;
	$niv = $lvl;
	$iv = 31;
	$IVPV = 0;
	$IVATTAQUE = 0;
	$IVDefense = 0;
	$IVAttSpe = 0;
	$IVDefSpe = 0;
	$IVVitesse = 0;
	$stat = 0;
	while ($iv != 0) {
		$stat = rand(1,6);
		if ($stat == 1){
			$IVPV = $IVPV + 1;
		}
		else if ($stat == 2){
			$IVATTAQUE = $IVATTAQUE+1;
		}
		else if ($stat == 3){
			$IVDefense = $IVDefense+ 1;
		}
		else if ($stat == 4){
			$IVAttSpe = $IVAttSpe+ 1;
		}
		else if ($stat == 5){
			$IVDefSpe = $IVDefSpe + 1;
		}
		else if ($stat == 6){
			$IVVitesse = $IVVitesse + 1;
		}
		$iv = $iv-1;
	}
	$var = 1;
	$res['PV'] = ((2*$res['PV']+$IVPV+5)*$niv)/100+5+$niv+10;
	$res['Attaque'] = ((2*$res['Attaque']+$IVATTAQUE+5)*$niv)/100+5;
	$res['Defense'] = ((2*$res['Defense']+$IVDefense+5)*$niv)/100+5;
	$res['Vitesse'] = ((2*$res['Vitesse']+$IVVitesse+5)*$niv)/100+5;
	$res['AttSpe'] = ((2*$res['AttSpe']+$IVAttSpe+5)*$niv)/100+5;
	$res['DefSPe'] = ((2*$res['DefSPe']+$IVDefSpe+5)*$niv)/100+5;
	$varn = NULL;
	if ($res['TypeD'] == NULL) {
		$res['TypeD'] = 'NULL';
		$query2= "INSERT INTO banque (ID,NUMP,NOMP,TYPEU,COURBE,XP,XPVAINCU,NIV,IVPV,IVATTAQUE,IVDEFENSE,IVATTSPE,IVDEFSPE,IVVITESSE,PVMAX,VITESSE,ATTAQUE,DEFENSE,ATTSPE,DEFSPE,CAP1,CAP2,PVACT) VALUES(".$idpoke.",".$numP.",'".$nompoke."','".$res['TypeU']."','".$res['Courbe']."',".$var.",".$res['XPVaincu'].",".$niv.",".$IVPV.",".$IVATTAQUE.",".$IVDefense.",".$IVAttSpe.",".$IVDefSpe.",".$IVVitesse.",".$res['PV'].",".$res['Vitesse'].",".$res['Attaque'].",".$res['Defense'].",".$res['AttSpe'].",".$res['DefSPe'].",".$resa.",".$resb.",".$res['PV'].")";
		

	}
	else{
		$query2= "INSERT INTO banque (ID,NUMP,NOMP,TYPEU,TYPED,COURBE,XP,XPVAINCU,NIV,IVPV,IVATTAQUE,IVDEFENSE,IVATTSPE,IVDEFSPE,IVVITESSE,PVMAX,VITESSE,ATTAQUE,DEFENSE,ATTSPE,DEFSPE,CAP1,CAP2,PVACT) VALUES(".$idpoke.",".$numP.",'".$nompoke."','".$res['TypeU']."','".$res['TypeD']."','".$res['Courbe']."',".$var.",".$res['XPVaincu'].",".$niv.",".$IVPV.",".$IVATTAQUE.",".$IVDefense.",".$IVAttSpe.",".$IVDefSpe.",".$IVVitesse.",".$res['PV'].",".$res['Vitesse'].",".$res['Attaque'].",".$res['Defense'].",".$res['AttSpe'].",".$res['DefSPe'].",".$resa.",".$resb.",".$res['PV'].")";
		
	}

	

	mysqli_query($link,$query2);
	mysqli_error($link); 



	mysqli_close($link);
}

function Show_pokemon_by_id($idpoke){
	$link =create_link();
	$querytest = "SELECT * FROM banque where ID=?"; 
	$stmt2 = mysqli_prepare($link,$querytest);
	mysqli_stmt_bind_param($stmt2,"i",$idpoke);
	mysqli_execute($stmt2);
	$result = mysqli_stmt_get_result($stmt2);
	$res = mysqli_fetch_assoc($result);
	if ($res['NomP']==NULL) {
		echo "<li> Vide </li>";
	}
	else{
	echo "<h2 id='pokesauvage'> ".utf8_encode($res['NomP'])." Niv ".$res['Niv']." </h2>";

	}
	mysqli_close($link);
}

function Delete_Pokemon_byID($idpoke){
	$link =create_link();
	$query2= "DELETE FROM banque WHERE ID=?";
	$stmt2 = mysqli_prepare($link,$query2);
	mysqli_stmt_bind_param($stmt2,"i",$idpoke);
	mysqli_execute($stmt2);
	mysqli_close($link);




}

function Get_pokemon($id){
	$link =create_link();
	$querytest = "SELECT * FROM banque where ID=?"; 
	$stmt2 = mysqli_prepare($link,$querytest);
	mysqli_stmt_bind_param($stmt2,"i",$id);
	mysqli_execute($stmt2);
	$result = mysqli_stmt_get_result($stmt2);
	$res = mysqli_fetch_assoc($result);
	if ($res['NomP']==NULL) {
		$res['NomP']="Vide";
		$res['ID']="NULL";

	}
	mysqli_close($link);
	return $res;
}



 ?>