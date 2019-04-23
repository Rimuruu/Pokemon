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
	$idpoke2 = 1;
	$nompoke = NomDepuisNumero($idpoke2);
	Ajouter_pokemon_sauv($nompoke,$idpoke);
	mysqli_close($link);
	return $idpoke;
	
}


function Ajouter_pokemon_sauv($nompoke,$idpoke){
	$link = create_link();


	$querytest2 = "SELECT * from pokedex where NOMP=?";
	$stmt3 = mysqli_prepare($link,$querytest2);
	mysqli_stmt_bind_param($stmt3,"s",$nompoke);
	echo mysqli_error($link);
	mysqli_execute($stmt3);
	$result = mysqli_stmt_get_result($stmt3);
	$res = mysqli_fetch_assoc($result);

	$querytest2 = "SELECT * from attaque where TypeA=? AND (ClasseA = 'Physique' OR ClasseA = 'Speciale')";
	$stmt3 = mysqli_prepare($link,$querytest2);

	mysqli_stmt_bind_param($stmt3,"s",$res['TypeU']);
	echo mysqli_error($link);
	mysqli_execute($stmt3);
	$result = mysqli_stmt_get_result($stmt3);
	$nb_attaque= mysqli_num_rows($result);
	$rand_att = rand(1,$nb_attaque);
	 mysqli_data_seek($result, $rand_att);
	$resatt = mysqli_fetch_assoc($result);
	
	 $resa = $resatt['IDAtt'];

	 $querytest2 = "SELECT * from attaque where TypeA=? AND (ClasseA = 'Autre' OR ClasseA = 'Speciale')";
	$stmt3 = mysqli_prepare($link,$querytest2);
	mysqli_stmt_bind_param($stmt3,"s",$res['TypeU']);
	echo mysqli_error($link);
	mysqli_execute($stmt3);
	$result = mysqli_stmt_get_result($stmt3);
	$nb_attaque= mysqli_num_rows($result);
	$rand_att = rand(1,$nb_attaque);
	mysqli_data_seek($result, $rand_att);
	$resatt = mysqli_fetch_assoc($result);
	$resb = $resatt['IDAtt'];
	while($resb == $resa) {
		$querytest2 = "SELECT * from attaque where TypeA=? AND (ClasseA = 'Autre' OR ClasseA = 'Speciale')";
		$stmt3 = mysqli_prepare($link,$querytest2);
		mysqli_stmt_bind_param($stmt3,"s",$res['TypeU']);
		echo mysqli_error($link);
		mysqli_execute($stmt3);
		$result = mysqli_stmt_get_result($stmt3);
		$nb_attaque= mysqli_num_rows($result);
		$rand_att = rand(1,$nb_attaque);
		mysqli_data_seek($result, $rand_att);
		$resatt = mysqli_fetch_assoc($result);
		$resb = $resatt['IDAtt'];
	}
	 

	
	

	
	$xp = 0;
	$niv = 1;
	$IVPV = (100*($res['PV']-1-10))/1-1-2*$res['PV'];
	$IVATTAQUE = ($res['Attaque']/1-1)*100/1-1-2*$res['Attaque'];
	$IVDefense = ($res['Defense']/1-1)*100/1-1-2*$res['Defense'];
	$IVAttSpe = ($res['AttSpe']/1-1)*100/1-1-2*$res['AttSpe'];
	$IVDefSpe = ($res['DefSPe']/1-1)*100/1-1-2*$res['DefSPe'];
	$IVVitesse = ($res['Vitesse']/1-1)*100/1-1-2*$res['Vitesse'];
	$var = 1;
	$varn = NULL;
	if ($res['TypeD'] == NULL) {
		$res['TypeD'] = 'NULL';
		$query2= "INSERT INTO banque (ID,NUMP,NOMP,TYPEU,COURBE,XP,XPVAINCU,NIV,IVPV,IVATTAQUE,IVDEFENSE,IVATTSPE,IVDEFSPE,IVVITESSE,PVMAX,VITESSE,ATTAQUE,DEFENSE,ATTSPE,DEFSPE,CAP1,CAP2,PVACT) VALUES(".$idpoke.",".$var.",'".$nompoke."','".$res['TypeU']."','".$res['Courbe']."',".$var.",".$res['XPVaincu'].",".$niv.",".$IVPV.",".$IVATTAQUE.",".$IVDefense.",".$IVAttSpe.",".$IVDefSpe.",".$IVVitesse.",".$res['PV'].",".$res['Vitesse'].",".$res['Attaque'].",".$res['Defense'].",".$res['AttSpe'].",".$res['DefSPe'].",".$resa.",".$resb.",".$res['PV'].")";
		

	}
	else{
		$query2= "INSERT INTO banque (ID,NUMP,NOMP,TYPEU,TYPED,COURBE,XP,XPVAINCU,NIV,IVPV,IVATTAQUE,IVDEFENSE,IVATTSPE,IVDEFSPE,IVVITESSE,PVMAX,VITESSE,ATTAQUE,DEFENSE,ATTSPE,DEFSPE,CAP1,CAP2,PVACT) VALUES(".$idpoke.",".$var.",'".$nompoke."','".$res['TypeU']."','".$res['TypeD']."','".$res['Courbe']."',".$var.",".$res['XPVaincu'].",".$niv.",".$IVPV.",".$IVATTAQUE.",".$IVDefense.",".$IVAttSpe.",".$IVDefSpe.",".$IVVitesse.",".$res['PV'].",".$res['Vitesse'].",".$res['Attaque'].",".$res['Defense'].",".$res['AttSpe'].",".$res['DefSPe'].",".$resa.",".$resb.",".$res['PV'].")";
		
	}

	

	mysqli_query($link,$query2);
	mysqli_error($link); 



	mysqli_close($link);
}

function Show_pokemon_by_id($idpoke){
	$link =create_link();
	$querytest = "SELECT NOMP FROM banque where ID=?"; 
	$stmt2 = mysqli_prepare($link,$querytest);
	mysqli_stmt_bind_param($stmt2,"i",$idpoke);
	mysqli_execute($stmt2);
	$result = mysqli_stmt_get_result($stmt2);
	$res = mysqli_fetch_assoc($result);
	if ($res['NOMP']==NULL) {
		echo "<li> Vide </li>";
	}
	else{
	echo "<h2 id='pokesauvage'> ".utf8_encode($res['NOMP'])." </h2>";

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