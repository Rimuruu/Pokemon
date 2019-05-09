<?php 



if(!@include_once('bdd.php')) {
  include 'bdd.php';
}

if(!@include_once('pokemon.php')) {
  include 'pokemon.php';
}


function Ajout_compte($nomcompte,$mdp,$cmdp,$poke){
	if ($mdp != $cmdp) {
	include 'erreurmdp.php';
}
else{
$mdp = encryptmdp($mdp);
$link = create_link();
$querytest = "SELECT * from compte where NOM=? OR MDP=?"; 
$stmt2 = mysqli_prepare($link,$querytest);
mysqli_stmt_bind_param($stmt2,"ss",$nomcompte,$mdp);
mysqli_execute($stmt2);
$result = mysqli_stmt_get_result($stmt2);
if (mysqli_num_rows($result)>0) {
	include 'erreurverif.php';
}
else{
	switch ($poke) {
	case 1:
		$nompoke = utf8_decode("Salamèche");
		$resa = 56;
		$resb = 43; 
		$var = 4;
		break;
	case 2:
		$nompoke = "Bulbizarre";
		$resa = 53;
		$resb = 43;
		$var = 1;
		break;
	case 3:
		$nompoke = "Carapuce";
		$resa = 56;
		$resb = 42;
		$var = 7;
		break;
	}
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

	$querytest = "SELECT * from equipe where IDEq=?";
	$stmt2 = mysqli_prepare($link,$querytest);
	$ideq = rand(1, 99999);
	mysqli_stmt_bind_param($stmt2,"i",$ideq);
	echo mysqli_error($link);
	mysqli_execute($stmt2);
	$result = mysqli_stmt_get_result($stmt2);
	while (mysqli_num_rows($result) > 0) {
		$querytest = "SELECT * from equipe where IDEq=?";
		$stmt2 = mysqli_prepare($link,$querytest);
		$ideq = rand(1, 99999);
		$verif=mysqli_stmt_bind_param($stmt2,"i",$ideq);
		mysqli_execute($stmt2);
		$result = mysqli_stmt_get_result($stmt2);
	}

	$querytest2 = "SELECT * from pokedex where NOMP=?";
	$stmt3 = mysqli_prepare($link,$querytest2);
	mysqli_stmt_bind_param($stmt3,"s",$nompoke);
	echo mysqli_error($link);
	mysqli_execute($stmt3);
	$result = mysqli_stmt_get_result($stmt3);
	$res = mysqli_fetch_assoc($result);
	
	$date = date("Y-m-d");
	
	$query= "INSERT INTO compte(NOM,MDP,DateCo) VALUES (?,?,'".$date."')";
	$xp = 0;
	$niv = 5;
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
	$res['PV'] = ((2*$res['PV']+$IVPV+5)*$niv)/100+5+$niv+10;
	$res['Attaque'] = ((2*$res['Attaque']+$IVATTAQUE+5)*$niv)/100+5;
	$res['Defense'] = ((2*$res['Defense']+$IVDefense+5)*$niv)/100+5;
	$res['Vitesse'] = ((2*$res['Vitesse']+$IVVitesse+5)*$niv)/100+5;
	$res['AttSpe'] = ((2*$res['AttSpe']+$IVAttSpe+5)*$niv)/100+5;
	$res['DefSPe'] = ((2*$res['DefSPe']+$IVDefSpe+5)*$niv)/100+5;
	

	$varn = NULL;
	if ($res['TypeD'] == NULL) {
		$res['TypeD'] = 'NULL';
		$query2= "INSERT INTO banque (ID,NUMP,NOMP,TYPEU,COURBE,XP,XPVAINCU,NIV,IVPV,IVATTAQUE,IVDEFENSE,IVATTSPE,IVDEFSPE,IVVITESSE,PVMAX,VITESSE,ATTAQUE,DEFENSE,ATTSPE,DEFSPE,CAP1,CAP2,DRESSEUR,PVACT) VALUES(".$idpoke.",".$var.",'".$nompoke."','".$res['TypeU']."','".$res['Courbe']."',0,".$res['XPVaincu'].",".$niv.",".$IVPV.",".$IVATTAQUE.",".$IVDefense.",".$IVAttSpe.",".$IVDefSpe.",".$IVVitesse.",".$res['PV'].",".$res['Vitesse'].",".$res['Attaque'].",".$res['Defense'].",".$res['AttSpe'].",".$res['DefSPe'].",".$resa.",".$resb.",'".$nomcompte."',".$res['PV'].")";

	}
	else{
		$query2= "INSERT INTO banque (ID,NUMP,NOMP,TYPEU,TYPED,COURBE,XP,XPVAINCU,NIV,IVPV,IVATTAQUE,IVDEFENSE,IVATTSPE,IVDEFSPE,IVVITESSE,PVMAX,VITESSE,ATTAQUE,DEFENSE,ATTSPE,DEFSPE,CAP1,CAP2,DRESSEUR,PVACT) VALUES(".$idpoke.",".$var.",'".$nompoke."','".$res['TypeU']."','".$res['TypeD']."','".$res['Courbe']."',0,".$res['XPVaincu'].",".$niv.",".$IVPV.",".$IVATTAQUE.",".$IVDefense.",".$IVAttSpe.",".$IVDefSpe.",".$IVVitesse.",".$res['PV'].",".$res['Vitesse'].",".$res['Attaque'].",".$res['Defense'].",".$res['AttSpe'].",".$res['DefSPe'].",".$resa.",".$resb.",'".$nomcompte."',".$res['PV'].")";
	}
	$query3= "INSERT INTO equipe(IDEq,DRESSEUR,SLOT1) VALUES (?,?,?)";
	$query4= "INSERT INTO sac(IDSac,Dresseur,nbPokeball,nbSuperBall,nbHyperBall,nbPotion,nbSuperPotion,nbHyperPotion,nbPotionMax,nbAntidote,nbAntiPara,nbAntiBrule,nbAntiGel,nbReveil,nbRappel,nbRappelMax,nbElexir,nbMaxElexir,nbHuile,nbHuileMax) VALUES (".$ideq.",'".$nomcompte."',5,0,0,5,0,0,0,0,0,0,0,0,0,0,0,0,0,0)";

	$stmt = mysqli_prepare($link,$query);
	$stmt3 = mysqli_prepare($link,$query3);

	
	mysqli_stmt_bind_param($stmt,"ss",$nomcompte,$mdp);

	mysqli_stmt_bind_param($stmt3,"isi",$ideq,$nomcompte,$idpoke);
	mysqli_execute($stmt);
	mysqli_query($link,$query2);
	mysqli_query($link,$query4);
	mysqli_error($link); 
	mysqli_execute($stmt3);


	mysqli_close($link);
	include 'login2.php';

		}
	}
}

function Ajout_Pokemon($nomcompte,$idpoke,$SLOTNUMBER){
	$link = create_link();
	$query3= "UPDATE equipe SET SLOT".$SLOTNUMBER."=? where DRESSEUR=?";
	$stmt3 = mysqli_prepare($link,$query3);
	mysqli_stmt_bind_param($stmt3,"is",$idpoke,$nomcompte);
	mysqli_execute($stmt3);
	mysqli_close($link);

}

function getItem($nomcompte){
	$link = create_link();
	$query = "Select * FROM sac WHERE Dresseur='".$nomcompte."'";
	//echo $query;
	$result = mysqli_query($link,$query);
	$res = mysqli_fetch_assoc($result);
	mysqli_close($link);
	return $res;

}

function Show_team($nomcompte){
	$link =create_link();
	echo "<ul id='equipe'>Equipe pokemon";
	for ($i=1; $i <= 6 ; $i=$i+1) { 
		$querytest = "SELECT banque.NOMP, banque.Niv, banque.PVact, banque.PVmax, banque.Statut FROM banque JOIN equipe ON banque.ID = equipe.SLOT".$i." JOIN compte ON compte.NOM = equipe.Dresseur where compte.NOM=?"; 
		$stmt2 = mysqli_prepare($link,$querytest);
		mysqli_stmt_bind_param($stmt2,"s",$nomcompte);
		mysqli_execute($stmt2);
		$result = mysqli_stmt_get_result($stmt2);
		$res = mysqli_fetch_assoc($result);
		if ($res['NOMP']==NULL) {
			echo "<li id='slot".$i."''> Vide </li>";
		}
		else{
		echo "<li id='slot".$i."''><img src='img/".utf8_encode($res['NOMP'])."'/>".utf8_encode($res['NOMP'])." Niv ".$res['Niv']."<br> PV: ".$res['PVact']."/".$res['PVmax'];
		if($res['Statut']!=NULL) echo "   Statut : ".$res['Statut'];
		echo "</li>";
	}
	}
	echo "</ul>";
	mysqli_close($link);
}

function Show_other_poke($nomcompte,$idpoke){
	$link =create_link();
	$arr = array();
	$length = 0;
	for ($i=1; $i <= 6 ; $i=$i+1) { 
		$querytest = "SELECT * FROM banque JOIN equipe ON banque.ID = equipe.SLOT".$i." JOIN compte ON compte.NOM = equipe.DRESSEUR where compte.NOM=? AND banque.ID <> ?"; 
		//echo $querytest;
		$stmt2 = mysqli_prepare($link,$querytest);
		mysqli_stmt_bind_param($stmt2,"si",$nomcompte,$idpoke);
		mysqli_execute($stmt2);
		$result = mysqli_stmt_get_result($stmt2);
		$res = mysqli_fetch_assoc($result);
		if ($res['NomP'] != NULL) {
			$arr[$length]= $res;
			$length = $length +1;
		}
		
	}
	mysqli_close($link);
	return $arr;
	
}


function Show_pokedollar($nomcompte){
	$link =create_link();
	$querytest = "SELECT Pokedollar FROM compte where NOM=?"; 
	$stmt2 = mysqli_prepare($link,$querytest);
	mysqli_stmt_bind_param($stmt2,"s",$nomcompte);
	mysqli_execute($stmt2);
	$result = mysqli_stmt_get_result($stmt2);
	$res = mysqli_fetch_assoc($result);
	echo "<h2>".$res['Pokedollar']."  Pokédollars</h2>";
	mysqli_close($link);

}


function Show_nth_pokemon($nomcompte,$nth){
	$link =create_link();
	$querytest = "SELECT banque.NOMP FROM banque JOIN equipe ON banque.ID = equipe.SLOT".$nth." JOIN compte ON compte.NOM = equipe.DRESSEUR where compte.NOM=?"; 
	$stmt2 = mysqli_prepare($link,$querytest);
	mysqli_stmt_bind_param($stmt2,"s",$nomcompte);
	mysqli_execute($stmt2);
	$result = mysqli_stmt_get_result($stmt2);
	$res = mysqli_fetch_assoc($result);
	if ($res['NOMP']==NULL) {
		echo "<li> Vide </li>";
	}
	else{
	echo "<li> ".utf8_encode($res['NOMP'])." </li>";

	}
	mysqli_close($link);
}

function Show_First_Pokemon_Available($nomcompte){
	$link =create_link();
	for ($i=1; $i <= 6; $i=$i+1) { 
	$querytest = "SELECT * FROM banque JOIN equipe ON banque.ID = equipe.SLOT".$i." JOIN compte ON compte.NOM = equipe.DRESSEUR where compte.NOM=? AND banque.PVact <> 0"; 
	$stmt2 = mysqli_prepare($link,$querytest);
	mysqli_stmt_bind_param($stmt2,"s",$nomcompte);
	mysqli_execute($stmt2);
	$result = mysqli_stmt_get_result($stmt2);
	$res = mysqli_fetch_assoc($result);
	if ($res['NomP']!=NULL) {
		echo "<h2 id='nompoke'> ".utf8_encode($res['NomP'])." Niv ".$res['Niv']." </h2>";
		break;
		}
	}
	if ($res['NomP']==NULL) {
		$res = Show_First_Pokemon($nomcompte);
	}
	mysqli_close($link);
	return $res;
}

function Show_First_Pokemon($nomcompte){
	$link =create_link();
	for ($i=1; $i <= 6; $i=$i+1) { 
	$querytest = "SELECT * FROM banque JOIN equipe ON banque.ID = equipe.SLOT".$i." JOIN compte ON compte.NOM = equipe.DRESSEUR where compte.NOM=?"; 
	$stmt2 = mysqli_prepare($link,$querytest);
	mysqli_stmt_bind_param($stmt2,"s",$nomcompte);
	mysqli_execute($stmt2);
	$result = mysqli_stmt_get_result($stmt2);
	$res = mysqli_fetch_assoc($result);
	if ($res['NomP']!=NULL) {
		echo "<h2 id='nompoke'> ".utf8_encode($res['NomP'])." Niv ".$res['Niv']." </h2>";
		break;
		}
	}
	
	mysqli_close($link);
	return $res;
}

function Get_nth_pokemon($nomcompte,$nth){
	$link =create_link();
	$querytest = "SELECT banque.NOMP,banque.ID,banque.Niv FROM banque JOIN equipe ON banque.ID = equipe.SLOT".$nth." JOIN compte ON compte.NOM = equipe.DRESSEUR where compte.NOM=?"; 
	$stmt2 = mysqli_prepare($link,$querytest);
	mysqli_stmt_bind_param($stmt2,"s",$nomcompte);
	mysqli_execute($stmt2);
	$result = mysqli_stmt_get_result($stmt2);
	$res = mysqli_fetch_assoc($result);
	if ($res['NOMP']==NULL) {
		$res['NOMP']="Vide";
		$res['ID']="NULL";
		$res['Niv']="NULL";

	}
	mysqli_close($link);
	return $res;
}

function changeItem($nomcompte,$res){
	$link =create_link();
	$query = "UPDATE sac SET nbPokeball=".$res['nbPokeBall'].",nbSuperBall=".$res['nbSuperBall'].",nbHyperBall=".$res['nbHyperBall'].",nbPotion=".$res['nbPotion'].",nbSuperPotion=".$res['nbSuperPotion'].",nbHyperPotion=".$res['nbHyperPotion'].",nbPotionMax=".$res['nbPotionMax'].",nbAntidote=".$res['nbAntidote'].",nbAntiPara=".$res['nbAntiPara'].",nbAntiBrule=".$res['nbAntiBrule'].",nbAntiGel=".$res['nbAntiGel'].",nbReveil=".$res['nbReveil'].",nbRappel=".$res['nbRappel'].",nbRappelMax=".$res['nbRappelMax'].",nbElexir=".$res['nbElexir'].",nbMaxElexir=".$res['nbMaxElexir'].",nbHuile=".$res['nbHuile'].",nbHuileMax=".$res['nbHuileMax']." WHERE Dresseur='".$nomcompte."'";
	mysqli_query($link,$query);
	mysqli_close($link);


}

function Get_pokemon_from_computer($nomcompte){
	$slot1 = Get_nth_pokemon($nomcompte,1);
	$slot2 = Get_nth_pokemon($nomcompte,2);
	$slot3 = Get_nth_pokemon($nomcompte,3);
	$slot4 = Get_nth_pokemon($nomcompte,4);
	$slot5 = Get_nth_pokemon($nomcompte,5);
	$slot6 = Get_nth_pokemon($nomcompte,6);
	$link =create_link();
	$querytest = "SELECT NOMP,ID,Niv FROM banque where DRESSEUR=? AND ID NOT IN (?,?,?,?,?,?)"; 
	$stmt2 = mysqli_prepare($link,$querytest);
	mysqli_stmt_bind_param($stmt2,"siiiiii",$nomcompte,$slot1['ID'],$slot2['ID'],$slot3['ID'],$slot4['ID'],$slot5['ID'],$slot6['ID']);
	mysqli_execute($stmt2);
	$result = mysqli_stmt_get_result($stmt2);
	mysqli_close($link);
	return $result;
}

function Ajout_ordinateur($nomcompte,$idpoke){
	$link = create_link();
	$query3= "UPDATE banque SET DRESSEUR=? where ID=?";
	$stmt3 = mysqli_prepare($link,$query3);
	mysqli_stmt_bind_param($stmt3,"si",$nomcompte,$idpoke);
	mysqli_execute($stmt3);
	mysqli_close($link);


}

function Catch_Pokemon($nomcompte,$idpoke){
	$link =create_link();
	$querytest = "Select SLOT1,SLOT2,SLOT3,SLOT4,SLOT5,SLOT6 FROM equipe JOIN compte ON equipe.DRESSEUR = compte.NOM where compte.NOM=?";
	$stmt2 = mysqli_prepare($link,$querytest);
	mysqli_stmt_bind_param($stmt2,"s",$nomcompte);
	mysqli_execute($stmt2);
	$result = mysqli_stmt_get_result($stmt2);
	$res = mysqli_fetch_assoc($result);
	for ($i=1; $i <= 6; $i=$i+1) { 
		$SLOT = $res['SLOT'.$i];
		if ($SLOT == NULL) {
			$SLOTNUMBER = $i;
			break;
		}
	}
	if ($SLOT == NULL) {
		Ajout_Pokemon($nomcompte,$idpoke,$SLOTNUMBER);
		Ajout_ordinateur($nomcompte,$idpoke);
		
	}
	else{Ajout_ordinateur($nomcompte,$idpoke);}
	mysqli_close($link);





}

function encryptmdp($pure_string) {
	$encryption_key = "SMASHMEILLEURJEUDUMONDEONDEVRAITDONNERASAKURAIUNPRIXNOBELPOURSONOEUVRE";
    $encrypted_string = crypt($pure_string,$encryption_key);
    return $encrypted_string;
}

function Deco($nomcompte){
	$link = create_link();
	$query3= "UPDATE compte SET StatutCo='OFFLINE' where Nom=?";
	$stmt3 = mysqli_prepare($link,$query3);
	mysqli_stmt_bind_param($stmt3,"s",$nomcompte);
	mysqli_execute($stmt3);
	mysqli_close($link);

}











 ?>