<?php 
session_start();
include 'security.php';
include 'user.php';

if (isset($_COOKIE['Adversaire'])) {
	$adv=$_COOKIE['Adversaire'];
	$role=$_COOKIE['Role'];
}

 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title>Combat</title>
 	<link rel="stylesheet" type="text/css" href="style.css">
 </head>
 <body onload="start()">
 	
 	<header>
	<h1 id="titre">Chasse</h1>
	<?php 
	echo "<a id='compte'><h1>".$nomcompte."</h1>";
	Show_pokedollar($nomcompte);
	
	 ?>

 	<div id='fenetre'>
 	
 	<?php 
 	if (!isset($_COOKIE['pokemonjoueur'])) {
 	
 	
 	echo "<div id='pokej'>";
 	$poke = Show_First_Pokemon_Available($nomcompte);
 	$hppoke = $poke['PVact'];
 	echo "<h2 id='nompoke'> ".utf8_encode($poke['NomP'])." Niv ".$poke['Niv']." </h2>";
 	echo "<h2 id='hpj'>".$poke['PVact']."</h2>";
 	echo "<progress id='healthj' value='".$poke['PVact']."' max='".$poke['PVmax']."'></progress>";
 	echo "<img class='show' id='pokeimg'src='img/".NomDepuisId($poke['ID']).".png'>";
 	echo "</div>";
 	$pokejoueur = Show_cap_by_id($poke['ID']);
 	$team = Show_other_poke($nomcompte,$poke['ID']);
 	$item = getItem($nomcompte);

 	}
 	else{


 		$hppoke = $_COOKIE['pokemonjoueur']['HP'];
 		$poke = $_COOKIE['pokemonjoueur']['ID'];
 		$poke = Get_pokemon($poke);
 		$poke['gainxp'] = $_COOKIE['pokemonjoueur']['GAINXP'];
 		$pokejoueur = Show_cap_by_id($poke['ID']);
 		echo "<div id='pokej'><h2 id='nompoke'>".NomDepuisId($poke['ID'])." Niv ".$poke['Niv']."</h2>";

 		echo "<h2 id='hpj'>".$_COOKIE['pokemonjoueur']['HP']."</h2>";
 		echo "<progress id='healthj' value='".$hppoke."' max='".$poke['PVmax']."'></progress>";
 		echo "<img class='show' id='pokeimg'src='img/".NomDepuisId($poke['ID']).".png'>";
 		echo "</div>";
 		$team = array();
 		for ($i=0; $i < 5; $i++) { 
 			if ($_COOKIE['team'][$i]['ID'] != 'NULL') {
 	
 				$team[$i] = Get_pokemon($_COOKIE['team'][$i]['ID']);
 				$team[$i]['gainxp'] = $_COOKIE['team'][$i]['GAINXP'];
 				$team[$i]['PVact']=$_COOKIE['team'][$i]['HP'];
 			}
 			
 		}
 		$item = getItem($nomcompte);
 		$item['nbPotion'] = $_COOKIE['nb_potion'];

 		
 				
 		
 		}
 	

 	$nb_poke = 1;
 	$cappoke1=null;
 	$cappoke2=null;
 	$cappoke3=null;
 	$cappoke4=null;
 	$cappoke5=null;
 	if (isset($team[0]['NomP'])) {
 		if ($team[0]['NomP']!='NULL') {
 			$cappoke1 = Show_cap_by_id($team[0]['ID'] );
 			$nb_poke = 2;
 			
 		}
 		
 	}
 	if (isset($team[1]['NomP'])) {
 		if ($team[1]['NomP']!='NULL') {
 			$cappoke2 = Show_cap_by_id($team[1]['ID'] );
 			$nb_poke = 3;
 		
 		}
 		
 	}
 	if (isset($team[2]['NomP'])) {
 		if ($team[2]['NomP']!='NULL') {
 			$cappoke3 = Show_cap_by_id($team[2]['ID'] );
 			$nb_poke = 4;
 	
 		}

 		
 	}
 	if (isset($team[3]['NomP'])) {
 		if ($team[3]['NomP']!='NULL') {
 			$cappoke4 = Show_cap_by_id($team[3]['ID'] );
 			$nb_poke = 5;
 		
 		}
 		
 	}
 	if (isset($team[4]['NomP'])) {
 		if ($team[4]['NomP']!='NULL') {
 			$cappoke5 = Show_cap_by_id($team[4]['ID'] );
 			$nb_poke = 6;
 			
 		}
 		
 	}

 	if (!isset($_COOKIE['pokemonjoueur2'])) {
 	
 	
 	echo "<div id='pokes'>";
 	$poke2 = Show_First_Pokemon_Available($adv);
 	$hppoke2 = $poke2['PVact'];
 	echo "<h2 id='nompoke2'> ".utf8_encode($poke2['NomP'])." Niv ".$poke2['Niv']." </h2>";
 	echo "<h2 id='hpj'>".$poke2['PVact']."</h2>";
 	echo "<progress id='healths' value='".$poke2['PVact']."' max='".$poke2['PVmax']."'></progress>";
 	echo "<img class='show' id='pokeimgs'src='img/".NomDepuisId($poke2['ID']).".png'>";
 	echo "</div>";
 	$pokejoueur2 = Show_cap_by_id($poke2['ID']);
 	$team2 = Show_other_poke($adv,$poke2['ID']);
 

 	}
 	else{


 		$hppoke2 = $_COOKIE['pokemonjoueur2']['HP'];
 		$poke2 = $_COOKIE['pokemonjoueur2']['ID'];
 		$poke2 = Get_pokemon($poke2);
 		$poke2['gainxp'] = $_COOKIE['pokemonjoueur2']['GAINXP'];
 		$pokejoueur2 = Show_cap_by_id($poke2['ID']);
 		echo "<div id='pokes'><h2 id='nompoke2'>".NomDepuisId($poke2['ID'])." Niv ".$poke2['Niv']."</h2>";

 		echo "<h2 id='hps'>".$_COOKIE['pokemonjoueur2']['HP']."</h2>";
 		echo "<progress id='healths' value='".$hppoke2."' max='".$poke2['PVmax']."'></progress>";
 		echo "<img class='show' id='pokeimgs'src='img/".NomDepuisId($poke2['ID']).".png'>";
 		echo "</div>";
 		$team2 = array();
 		for ($i=0; $i < 5; $i++) { 
 			if ($_COOKIE['team2'][$i]['ID'] != 'NULL') {
 	
 				$team2[$i] = Get_pokemon($_COOKIE['team2'][$i]['ID']);
 				$team2[$i]['gainxp'] = $_COOKIE['team2'][$i]['GAINXP'];
 				$team2[$i]['PVact']=$_COOKIE['team2'][$i]['HP'];
 			}
 			
 		}
 		

 		
 				
 		
 		}

 		$nb_poke = 1;
 	$cappoke21=null;
 	$cappoke22=null;
 	$cappoke23=null;
 	$cappoke24=null;
 	$cappoke25=null;
 	if (isset($team2[0]['NomP'])) {
 		if ($team2[0]['NomP']!='NULL') {
 			$cappoke21 = Show_cap_by_id($team2[0]['ID'] );
 			$nb_poke = 2;
 			
 		}
 		
 	}
 	if (isset($team2[1]['NomP'])) {
 		if ($team2[1]['NomP']!='NULL') {
 			$cappoke22 = Show_cap_by_id($team2[1]['ID'] );
 			$nb_poke = 3;
 		
 		}
 		
 	}
 	if (isset($team2[2]['NomP'])) {
 		if ($team2[2]['NomP']!='NULL') {
 			$cappoke23 = Show_cap_by_id($team2[2]['ID'] );
 			$nb_poke = 4;
 	
 		}

 		
 	}
 	if (isset($team2[3]['NomP'])) {
 		if ($team2[3]['NomP']!='NULL') {
 			$cappoke24 = Show_cap_by_id($team2[3]['ID'] );
 			$nb_poke = 5;
 		
 		}
 		
 	}
 	if (isset($team2[4]['NomP'])) {
 		if ($team2[4]['NomP']!='NULL') {
 			$cappoke25 = Show_cap_by_id($team2[4]['ID'] );
 			$nb_poke = 6;
 			
 		}
 		
 	}


 	 ?>

 </div>

 </body>
 <script type="text/javascript">

 	class Pokemon{
 		constructor(nom,hp,cap1,cap2,cap3,cap4,idpoke,typeu,typed,niv,ivpv,ivattaque,ivdefense,ivattspe,ivdefspe,ivvitesse,pvmax,vitesse,attaque,defense,attspe,defspe,gainxp,xpvaincu,courbe,xp){
 			this.nom = nom;
 			this.hp = hp;
 			this.cap = [cap1,cap2,cap3,cap4];
 			this.idpoke = idpoke;
 			this.typeu = typeu;
 			this.typed = typed;
 			this.niv = niv;
 			this.ivpv = ivpv;
 			this.ivattaque = ivattaque;
 			this.ivdefense = ivdefense;
 			this.ivattspe = ivattspe;
 			this.ivdefspe = ivdefspe;
 			this.ivvitesse = ivvitesse;
 			this.pvmax = pvmax;
 			this.vitesse = vitesse+ivvitesse;
 			this.attaque = attaque+ivattaque;
 			this.defense = defense+ivdefense;
 			this.attspe = attspe+ivattspe;
 			this.defspe = defspe+ivdefspe;
 			this.gainxp = gainxp;
 			this.xpvaincu = xpvaincu;
 			this.courbe = courbe;
 			this.xp =xp;

 		
 		}

 	}

 	class Equipe{
 		constructor(Poke1,Poke2,Poke3,Poke4,Poke5){
 			this.Poke = [Poke1,Poke2,Poke3,Poke4,Poke5];
 		}

 	}

 	class Cap{
 		constructor(noma,typa,classea,puissance,precis,pp,effets,ajoutpv,retirepv,nbattaque,statmboost,statanerf){
 			this.noma = noma;
 			this.typa = typa
 			this.classea = classea;
 			this.puissance = puissance
 			this.precis = precis;
 			this.pp = pp;
 			this.effets = effets;
 			this.ajoutpv = ajoutpv;
 			this.retirepv = retirepv;
 			this.nbattaque = nbattaque;
 			this.statmboost = statmboost;
 			this.statanerf = statmboost;
 		}


 	}
 	
 	class Jeu{
 		constructor(){
 			this.choixj = 0;
 			this.choixa = 0;
 			this.tour = 0;
 			this.attackj = 0;
 			this.nb_attackj=0;
 			this.attacka = null;
 			this.pokemonswap = 0;
 			this.pokemonswap2 = null;
 			this.jeufin = false;
 			this.objet = "";
 			this.objet2 = null;
 		}
 	};

 	class tabtype{
 		constructor(normal,feu,eau,plante,electrik,glace,combat,poison,sol,vol,psy,insecte,roche,spectre,dragon){
 			this.tab = {
 				'Normal' : normal,
 				'Feu' : feu,
 				'Eau' : eau,
 				'Plante' : plante,
 				'Electrik' : electrik,
 				'Glace' : glace,
 				'Combat' : combat,
 				'Poison' : poison,
 				'Sol' : sol, 
 				'Vol' : vol,
 				'Psy' : psy,
 				'Insecte' : insecte,
 				'Roche' : roche,
 				'Spectre' : spectre,
 				'Dragon' : dragon
 			}
 		}

 	}

 	class typep {
 		constructor(AttaqueNormal,AttaqueFeu,AttaqueEau,AttaquePlante,AttaqueElectrik,AttaqueGlace,AttaqueCombat,AttaquePoison,AttaqueSol,AttaqueVol,AttaquePsy,AttaqueInsecte,AttaqueRoche,AttaqueSpectre,AttaqueDragon,DefenseNormal,DefenseFeu,DefenseEau,DefensePlante,DefenseElectrik,DefenseGlace,DefenseCombat,DefensePoison,DefenseSol,DefenseVol,DefensePsy,DefenseInsecte,DefenseRoche,DefenseSpectre,DefenseDragon){
 			this.tab = {
			"AttaqueNormal": AttaqueNormal ,
			"AttaqueFeu": AttaqueFeu ,
			"AttaqueEau":AttaqueEau,
			"AttaquePlante": AttaquePlante,
			"AttaqueElectrik": AttaqueElectrik,
			"AttaqueGlace":AttaqueGlace,
			"AttaqueCombat": AttaqueCombat,
			"AttaquePoison":AttaquePoison,
			"AttaqueSol": AttaqueSol ,
			"AttaqueVol": AttaqueVol,
			"AttaquePsy":AttaquePsy,
			"AttaqueInsecte":AttaqueInsecte,
			"AttaqueRoche": AttaqueRoche,
			"AttaqueSpectre": AttaqueSpectre,
			"AttaqueDragon ":AttaqueDragon,
			"DefenseNormal": DefenseNormal,
			"DefenseFeu": DefenseFeu,
			"DefenseEau":DefenseEau,
			"DefensePlante": DefensePlante,
			"DefenseElectrik": DefenseElectrik,
			"DefenseGlace": DefenseGlace,
			"DefenseCombat": DefenseCombat,
			"DefensePoison":DefensePoison,
			"DefenseSol": DefenseSol,
			"DefenseVol": DefenseVol,
			"DefensePsy": DefensePsy,
			"DefenseInsecte": DefenseInsecte,
			"DefenseRoche": DefenseRoche,
			"DefenseSpectre": DefenseSpectre,
			"DefenseDragon": DefenseDragon
			}
 		}
 	}


 	var normal = new typep(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0.5, 0, 1, 1, 1, 1, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, 0, 1);
 	var feu = new typep( 1, 0.5, 0.5, 2, 1, 2, 1, 1, 1, 1, 1, 2, 0.5, 1, 0.5, 1, 0.5, 2, 0.5, 1, 1, 1, 1, 2, 1, 1, 0.5, 2, 1, 1);
 	var eau = new typep(1, 2, 0.5, 0.5, 1, 1, 1, 1, 2, 1, 1, 1, 2, 1, 0.5, 1, 0.5, 0.5, 2, 2, 0.5, 1, 1, 1, 1, 1, 1, 1, 1, 1);
 	var plante = new typep(1, 0.5, 2, 0.5, 1, 1, 1, 0.5, 2, 0.5, 1, 0.5, 2, 1, 0.5, 1, 2, 0.5, 0.5, 0.5, 2, 1, 2, 0.5, 2, 1, 2, 1, 1, 1);
 	var electrik = new typep(1, 1, 2, 0.5, 0.5, 1, 1, 1, 0, 2, 1, 1, 1, 1, 0.5, 1, 1, 1, 1, 0.5, 1, 1, 1, 2, 0.5, 1, 1, 1, 1, 1); 
 	var glace = new typep(1, 1, 0.5, 2, 1, 0.5, 1, 1, 2, 2, 1, 1, 1, 1, 2, 1, 2, 1, 1, 1, 0.5, 2, 1, 1, 1, 1, 1, 2, 1, 1);
 	var combat = new typep(2, 1, 1, 1, 1, 2, 1, 0.5, 1, 0.5, 0.5, 0.5, 2, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 0.5, 0.5, 1, 1);
 	var poison = new typep( 1, 1, 1, 2, 1, 1, 1, 0.5, 0.5, 1, 1, 2, 0.5, 0.5, 1, 1, 1, 1, 0.5, 1, 1, 0.5, 0.5, 2, 1, 2, 2, 1, 1, 1);
 	var sol = new typep( 1, 2, 1, 0.5, 2, 1, 1, 2, 1, 0, 1, 0.5, 2, 1, 1, 1, 1, 2, 2, 0, 2, 1, 0.5, 1, 1, 1, 1, 0.5, 1, 1);
 	var vol = new typep( 1, 1, 1, 2, 0.5, 1, 2, 1, 1, 1, 1, 2, 0.5, 1, 1, 1, 1, 1, 0.5, 2, 2, 0.5, 1, 0, 1, 1, 0.5, 2, 1, 1);
 	var psy = new typep(1, 1, 1, 1, 1, 1, 2, 2, 1, 1, 0.5, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0.5, 1, 1, 1, 0.5, 2, 1, 0, 1);
 	var insecte = new typep(1, 0.5, 1, 2, 1, 1, 0.5, 2, 1, 0.5, 2, 1, 1, 0.5, 1, 1, 2, 1, 0.5, 1, 1, 0.5, 2, 0.5, 2, 1, 1, 2, 1, 1);
 	var roche = new typep(1, 2, 1, 1, 1, 2, 0.5, 1, 0.5, 2, 1, 2, 1, 1, 1, 0.5, 0.5, 2, 2, 1, 1, 2, 0.5, 2, 0.5, 1, 1, 1, 1, 1);
 	var spectre = new typep(0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 2, 1, 0, 1, 1, 1, 1, 1, 0, 0.5, 1, 1, 1, 0.5, 1, 2, 1);
 	var dragon = new typep(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 1, 0.5, 0.5, 0.5, 0.5, 2, 1, 1, 1, 1, 1, 1, 1, 1, 2);
 	
 	var tabt = new tabtype(normal,feu,eau,plante,electrik,glace,combat,poison,sol,vol,psy,insecte,roche,spectre,dragon);

 	var jeu = new Jeu();


 	var pokemonjoueur = new Pokemon("<?php echo NomDepuisId($poke['ID']); ?>",
 		<?php echo $hppoke ?>,
 		new Cap("<?php echo $pokejoueur['CAP1']['NomA'] ?>",
 			"<?php echo $pokejoueur['CAP1']['TypeA'] ?>",
 			"<?php echo $pokejoueur['CAP1']['ClasseA'] ?>",
 			<?php if($pokejoueur['CAP1']['Puissance'] == NULL){echo '""';} else{echo $pokejoueur['CAP1']['Puissance'];} ?>,
 			<?php if($pokejoueur['CAP1']['Precis'] == NULL){echo '""';} else{echo $pokejoueur['CAP1']['Precis'];} ?>,
 			<?php if($pokejoueur['CAP1']['PP'] == NULL){echo '""';} else{echo $pokejoueur['CAP1']['PP'];} ?>,
 			"<?php echo $pokejoueur['CAP1']['Effets'] ?>",
 			"<?php echo $pokejoueur['CAP1']['AjoutPV'] ?>",
 			"<?php echo $pokejoueur['CAP1']['RetirePV'] ?>",
 			<?php if($pokejoueur['CAP1']['NbAttaque'] == NULL){echo '""';} else{echo $pokejoueur['CAP1']['NbAttaque'];} ?>,
 			"<?php echo $pokejoueur['CAP1']['StatMBoost'] ?>",
 			"<?php echo $pokejoueur['CAP1']['StatANerf'] ?>"),
 		new Cap("<?php echo $pokejoueur['CAP2']['NomA'] ?>",
 			"<?php echo $pokejoueur['CAP2']['TypeA'] ?>",
 			"<?php echo $pokejoueur['CAP2']['ClasseA'] ?>",
 			<?php if($pokejoueur['CAP2']['Puissance'] == NULL){echo '""';} else{echo $pokejoueur['CAP2']['Puissance'];} ?>,
 			<?php if($pokejoueur['CAP2']['Precis'] == NULL){echo '""';} else{echo $pokejoueur['CAP2']['Precis'];} ?>,
 			<?php if($pokejoueur['CAP2']['PP'] == NULL){echo '""';} else{echo $pokejoueur['CAP2']['PP'];}  ?>,
 			"<?php echo $pokejoueur['CAP2']['Effets'] ?>",
 			"<?php echo $pokejoueur['CAP2']['AjoutPV'] ?>",
 			"<?php echo $pokejoueur['CAP2']['RetirePV'] ?>",
 			<?php if($pokejoueur['CAP2']['NbAttaque'] == NULL){echo '""';} else{echo $pokejoueur['CAP2']['NbAttaque'];} ?>,
 			"<?php echo $pokejoueur['CAP2']['StatMBoost'] ?>",
 			"<?php echo $pokejoueur['CAP2']['StatANerf'] ?>"),
 		new Cap("<?php echo $pokejoueur['CAP3']['NomA'] ?>",
 			"<?php echo $pokejoueur['CAP3']['TypeA'] ?>",
 			"<?php echo $pokejoueur['CAP3']['ClasseA'] ?>",
 			<?php if($pokejoueur['CAP3']['Puissance'] == NULL){echo '""';} else{echo $pokejoueur['CAP3']['Puissance'];} ?>,
 			<?php if($pokejoueur['CAP3']['Precis'] == NULL){echo '""';} else{echo $pokejoueur['CAP3']['Precis'];} ?>,
 			<?php if($pokejoueur['CAP3']['PP'] == NULL){echo '""';} else{echo $pokejoueur['CAP3']['PP'];}  ?>,
 			"<?php echo $pokejoueur['CAP3']['Effets'] ?>",
 			"<?php echo $pokejoueur['CAP3']['AjoutPV'] ?>",
 			"<?php echo $pokejoueur['CAP3']['RetirePV'] ?>",
 			<?php if($pokejoueur['CAP3']['NbAttaque'] == NULL){echo '""';} else{echo $pokejoueur['CAP3']['NbAttaque'];} ?>,
 			"<?php echo $pokejoueur['CAP3']['StatMBoost'] ?>",
 			"<?php echo $pokejoueur['CAP3']['StatANerf'] ?>"),
 		new Cap("<?php echo $pokejoueur['CAP4']['NomA'] ?>",
 			"<?php echo $pokejoueur['CAP4']['TypeA'] ?>",
 			"<?php echo $pokejoueur['CAP4']['ClasseA'] ?>",
 			<?php if($pokejoueur['CAP4']['Puissance'] == NULL){echo '""';} else{echo $pokejoueur['CAP4']['Puissance'];} ?>,
 			<?php if($pokejoueur['CAP4']['Precis'] == NULL){echo '""';} else{echo $pokejoueur['CAP4']['Precis'];} ?>,
 			<?php if($pokejoueur['CAP4']['PP'] == NULL){echo '""';} else{echo $pokejoueur['CAP4']['PP'];}  ?>,
 			"<?php echo $pokejoueur['CAP4']['Effets'] ?>",
 			"<?php echo $pokejoueur['CAP4']['AjoutPV'] ?>",
 			"<?php echo $pokejoueur['CAP4']['RetirePV'] ?>",
 			<?php if($pokejoueur['CAP4']['NbAttaque'] == NULL){echo '""';} else{echo $pokejoueur['CAP4']['NbAttaque'];} ?>,
 			"<?php echo $pokejoueur['CAP4']['StatMBoost'] ?>",
 			"<?php echo $pokejoueur['CAP4']['StatANerf'] ?>"),
 		<?php echo $poke['ID'] ?>,
 		"<?php echo $poke['TypeU'] ?>",
 		"<?php echo $poke['TypeD'] ?>",
 		<?php echo $poke['Niv'] ?>,
 		<?php echo $poke['IVPV'] ?>,
 		<?php echo $poke['IVAttaque'] ?>,
 		<?php echo $poke['IVDefense'] ?>,
 		<?php echo $poke['IVAttSpe'] ?>,
 		<?php echo $poke['IVDefSpe'] ?>,
 		<?php echo $poke['IVVitesse'] ?>,
 		<?php echo $poke['PVmax'] ?>,
 		<?php echo $poke['Vitesse'] ?>,
 		<?php echo $poke['Attaque'] ?>,
 		<?php echo $poke['Defense'] ?>,
 		<?php echo $poke['AttSpe'] ?>,
 		<?php echo $poke['DefSPe'] ?>,
 		<?php if (isset($poke['gainxp'])){ echo $poke['gainxp'];}else{ echo 1;} ?>,
 		<?php echo $poke['XPVaincu'] ?>,
 		"<?php echo $poke['Courbe'] ?>",
 		<?php echo $poke['XP'] ?>

 		);

	var pokemonjoueur2 = new Pokemon("<?php echo NomDepuisId($poke2['ID']); ?>",
 		<?php echo $hppoke2 ?>,
 		new Cap("<?php echo $pokejoueur2['CAP1']['NomA'] ?>",
 			"<?php echo $pokejoueur2['CAP1']['TypeA'] ?>",
 			"<?php echo $pokejoueur2['CAP1']['ClasseA'] ?>",
 			<?php if($pokejoueur2['CAP1']['Puissance'] == NULL){echo '""';} else{echo $pokejoueur2['CAP1']['Puissance'];} ?>,
 			<?php if($pokejoueur2['CAP1']['Precis'] == NULL){echo '""';} else{echo $pokejoueur2['CAP1']['Precis'];} ?>,
 			<?php if($pokejoueur2['CAP1']['PP'] == NULL){echo '""';} else{echo $pokejoueur2['CAP1']['PP'];} ?>,
 			"<?php echo $pokejoueur2['CAP1']['Effets'] ?>",
 			"<?php echo $pokejoueur2['CAP1']['AjoutPV'] ?>",
 			"<?php echo $pokejoueur2['CAP1']['RetirePV'] ?>",
 			<?php if($pokejoueur2['CAP1']['NbAttaque'] == NULL){echo '""';} else{echo $pokejoueur2['CAP1']['NbAttaque'];} ?>,
 			"<?php echo $pokejoueur2['CAP1']['StatMBoost'] ?>",
 			"<?php echo $pokejoueur2['CAP1']['StatANerf'] ?>"),
 		new Cap("<?php echo $pokejoueur2['CAP2']['NomA'] ?>",
 			"<?php echo $pokejoueur2['CAP2']['TypeA'] ?>",
 			"<?php echo $pokejoueur2['CAP2']['ClasseA'] ?>",
 			<?php if($pokejoueur2['CAP2']['Puissance'] == NULL){echo '""';} else{echo $pokejoueur2['CAP2']['Puissance'];} ?>,
 			<?php if($pokejoueur2['CAP2']['Precis'] == NULL){echo '""';} else{echo $pokejoueur2['CAP2']['Precis'];} ?>,
 			<?php if($pokejoueur2['CAP2']['PP'] == NULL){echo '""';} else{echo $pokejoueur2['CAP2']['PP'];}  ?>,
 			"<?php echo $pokejoueur2['CAP2']['Effets'] ?>",
 			"<?php echo $pokejoueur2['CAP2']['AjoutPV'] ?>",
 			"<?php echo $pokejoueur2['CAP2']['RetirePV'] ?>",
 			<?php if($pokejoueur2['CAP2']['NbAttaque'] == NULL){echo '""';} else{echo $pokejoueur2['CAP2']['NbAttaque'];} ?>,
 			"<?php echo $pokejoueur2['CAP2']['StatMBoost'] ?>",
 			"<?php echo $pokejoueur2['CAP2']['StatANerf'] ?>"),
 		new Cap("<?php echo $pokejoueur2['CAP3']['NomA'] ?>",
 			"<?php echo $pokejoueur2['CAP3']['TypeA'] ?>",
 			"<?php echo $pokejoueur2['CAP3']['ClasseA'] ?>",
 			<?php if($pokejoueur2['CAP3']['Puissance'] == NULL){echo '""';} else{echo $pokejoueur2['CAP3']['Puissance'];} ?>,
 			<?php if($pokejoueur2['CAP3']['Precis'] == NULL){echo '""';} else{echo $pokejoueur2['CAP3']['Precis'];} ?>,
 			<?php if($pokejoueur2['CAP3']['PP'] == NULL){echo '""';} else{echo $pokejoueur2['CAP3']['PP'];}  ?>,
 			"<?php echo $pokejoueur2['CAP3']['Effets'] ?>",
 			"<?php echo $pokejoueur2['CAP3']['AjoutPV'] ?>",
 			"<?php echo $pokejoueur2['CAP3']['RetirePV'] ?>",
 			<?php if($pokejoueur2['CAP3']['NbAttaque'] == NULL){echo '""';} else{echo $pokejoueur2['CAP3']['NbAttaque'];} ?>,
 			"<?php echo $pokejoueur2['CAP3']['StatMBoost'] ?>",
 			"<?php echo $pokejoueur2['CAP3']['StatANerf'] ?>"),
 		new Cap("<?php echo $pokejoueur2['CAP4']['NomA'] ?>",
 			"<?php echo $pokejoueur2['CAP4']['TypeA'] ?>",
 			"<?php echo $pokejoueur2['CAP4']['ClasseA'] ?>",
 			<?php if($pokejoueur2['CAP4']['Puissance'] == NULL){echo '""';} else{echo $pokejoueur2['CAP4']['Puissance'];} ?>,
 			<?php if($pokejoueur2['CAP4']['Precis'] == NULL){echo '""';} else{echo $pokejoueur2['CAP4']['Precis'];} ?>,
 			<?php if($pokejoueur2['CAP4']['PP'] == NULL){echo '""';} else{echo $pokejoueur2['CAP4']['PP'];}  ?>,
 			"<?php echo $pokejoueur2['CAP4']['Effets'] ?>",
 			"<?php echo $pokejoueur2['CAP4']['AjoutPV'] ?>",
 			"<?php echo $pokejoueur2['CAP4']['RetirePV'] ?>",
 			<?php if($pokejoueur2['CAP4']['NbAttaque'] == NULL){echo '""';} else{echo $pokejoueur2['CAP4']['NbAttaque'];} ?>,
 			"<?php echo $pokejoueur2['CAP4']['StatMBoost'] ?>",
 			"<?php echo $pokejoueur2['CAP4']['StatANerf'] ?>"),
 		<?php echo $poke2['ID'] ?>,
 		"<?php echo $poke2['TypeU'] ?>",
 		"<?php echo $poke2['TypeD'] ?>",
 		<?php echo $poke2['Niv'] ?>,
 		<?php echo $poke2['IVPV'] ?>,
 		<?php echo $poke2['IVAttaque'] ?>,
 		<?php echo $poke2['IVDefense'] ?>,
 		<?php echo $poke2['IVAttSpe'] ?>,
 		<?php echo $poke2['IVDefSpe'] ?>,
 		<?php echo $poke2['IVVitesse'] ?>,
 		<?php echo $poke2['PVmax'] ?>,
 		<?php echo $poke2['Vitesse'] ?>,
 		<?php echo $poke2['Attaque'] ?>,
 		<?php echo $poke2['Defense'] ?>,
 		<?php echo $poke2['AttSpe'] ?>,
 		<?php echo $poke2['DefSPe'] ?>,
 		<?php if (isset($poke2['gainxp'])){ echo $poke2['gainxp'];}else{ echo 1;} ?>,
 		<?php echo $poke2['XPVaincu'] ?>,
 		"<?php echo $poke2['Courbe'] ?>",
 		<?php echo $poke2['XP'] ?>

 		);

 	
 	var equipejoueur =  new Equipe(
 		new Pokemon(
 			"<?php if(isset($team[0]['NomP'])){
 				echo utf8_encode($team[0]['NomP']);}else{ echo 'NULL';}  ?>", 
 				"<?php if(isset($team[0]['NomP'])){
 					echo $team[0]['PVact'];}else{echo 'NULL';}	?>",
 				new Cap("<?php if(isset($team[0]['NomP'])){echo $cappoke1['CAP1']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[0]['NomP'])){echo $cappoke1['CAP1']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[0]['NomP'])){echo $cappoke1['CAP1']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[0]['NomP'])){if($cappoke1['CAP1']['Puissance'] == NULL){echo '""';} else{echo $cappoke1['CAP1']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[0]['NomP'])){if($cappoke1['CAP1']['Precis'] == NULL){echo '""';} else{echo $cappoke1['CAP1']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[0]['NomP'])){if($cappoke1['CAP1']['PP'] == NULL){echo '""';} else{echo $cappoke1['CAP1']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team[0]['NomP'])){echo $cappoke1['CAP1']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[0]['NomP'])){echo $cappoke1['CAP1']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[0]['NomP'])){echo $cappoke1['CAP1']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[0]['NomP'])){if($cappoke1['CAP1']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke1['CAP1']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team[0]['NomP'])){echo $cappoke1['CAP1']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[0]['NomP'])){echo $cappoke1['CAP1']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team[0]['NomP'])){echo $cappoke1['CAP2']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[0]['NomP'])){echo $cappoke1['CAP2']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[0]['NomP'])){echo $cappoke1['CAP2']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[0]['NomP'])){if($cappoke1['CAP2']['Puissance'] == NULL){echo '""';} else{echo $cappoke1['CAP2']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[0]['NomP'])){if($cappoke1['CAP2']['Precis'] == NULL){echo '""';} else{echo $cappoke1['CAP2']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[0]['NomP'])){if($cappoke1['CAP2']['PP'] == NULL){echo '""';} else{echo $cappoke1['CAP2']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team[0]['NomP'])){echo $cappoke1['CAP2']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[0]['NomP'])){echo $cappoke1['CAP2']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[0]['NomP'])){echo $cappoke1['CAP2']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[0]['NomP'])){if($cappoke1['CAP2']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke1['CAP2']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team[0]['NomP'])){echo $cappoke1['CAP2']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[0]['NomP'])){echo $cappoke1['CAP2']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team[0]['NomP'])){echo $cappoke1['CAP3']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[0]['NomP'])){echo $cappoke1['CAP3']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[0]['NomP'])){echo $cappoke1['CAP3']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[0]['NomP'])){if($cappoke1['CAP3']['Puissance'] == NULL){echo '""';} else{echo $cappoke1['CAP3']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[0]['NomP'])){if($cappoke1['CAP3']['Precis'] == NULL){echo '""';} else{echo $cappoke1['CAP3']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[0]['NomP'])){if($cappoke1['CAP3']['PP'] == NULL){echo '""';} else{echo $cappoke1['CAP3']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team[0]['NomP'])){echo $cappoke1['CAP3']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[0]['NomP'])){echo $cappoke1['CAP3']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[0]['NomP'])){echo $cappoke1['CAP3']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[0]['NomP'])){if($cappoke1['CAP3']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke1['CAP3']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team[0]['NomP'])){echo $cappoke1['CAP3']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[0]['NomP'])){echo $cappoke1['CAP3']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team[0]['NomP'])){echo $cappoke1['CAP4']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[0]['NomP'])){echo $cappoke1['CAP4']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[0]['NomP'])){echo $cappoke1['CAP4']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[0]['NomP'])){if($cappoke1['CAP4']['Puissance'] == NULL){echo '""';} else{echo $cappoke1['CAP4']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[0]['NomP'])){if($cappoke1['CAP4']['Precis'] == NULL){echo '""';} else{echo $cappoke1['CAP4']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[0]['NomP'])){if($cappoke1['CAP4']['PP'] == NULL){echo '""';} else{echo $cappoke1['CAP4']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team[0]['NomP'])){echo $cappoke1['CAP4']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[0]['NomP'])){echo $cappoke1['CAP4']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[0]['NomP'])){echo $cappoke1['CAP4']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[0]['NomP'])){if($cappoke1['CAP4']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke1['CAP4']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team[0]['NomP'])){echo $cappoke1['CAP4']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[0]['NomP'])){echo $cappoke1['CAP4']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				<?php if(isset($team[0]['NomP'])){ echo $team[0]['ID'];}else{echo '"NULL"';}?>,
 				"<?php if(isset($team[0]['NomP'])){ echo $team[0]['TypeU'];}else{echo 'NULL';}?>",
 				"<?php if(isset($team[0]['NomP'])){ echo $team[0]['TypeD'];}else{echo 'NULL';}?>",
 				<?php if(isset($team[0]['NomP'])){ echo $team[0]['Niv'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[0]['NomP'])){ echo $team[0]['IVPV'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[0]['NomP'])){ echo $team[0]['IVAttaque'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[0]['NomP'])){ echo $team[0]['IVDefense'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[0]['NomP'])){ echo $team[0]['IVAttSpe'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[0]['NomP'])){ echo $team[0]['IVDefSpe'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[0]['NomP'])){ echo $team[0]['IVVitesse'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[0]['NomP'])){ echo $team[0]['PVmax'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[0]['NomP'])){ echo $team[0]['Vitesse'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[0]['NomP'])){ echo $team[0]['Attaque'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[0]['NomP'])){ echo $team[0]['Defense'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[0]['NomP'])){ echo $team[0]['AttSpe'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[0]['NomP'])){ echo $team[0]['DefSPe'];}else{echo '"NULL"';}?>,
 				<?php if (isset($team[0]['gainxp'])){ echo $team[0]['gainxp'];}else{ echo 0;} ?>,
 				<?php if(isset($team[0]['NomP'])){ echo $team[0]['XPVaincu'];}else{echo '"NULL"';}?>,
 				"<?php if(isset($team[0]['NomP'])){ echo $team[0]['Courbe'];}else{echo 'NULL';}?>",
 				<?php if(isset($team[0]['NomP'])){ echo $team[0]['XP'];}else{echo '"NULL"';}?>),
 		new Pokemon(
 			"<?php if(isset($team[1]['NomP'])){
 				echo utf8_encode($team[1]['NomP']);}else{ echo 'NULL';}  ?>", 
 				"<?php if(isset($team[1]['NomP'])){
 					echo $team[1]['PVact'];}else{echo 'NULL';}	?>",
 				new Cap("<?php if(isset($team[1]['NomP'])){echo $cappoke2['CAP1']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke2['CAP1']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke2['CAP1']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[1]['NomP'])){if($cappoke2['CAP1']['Puissance'] == NULL){echo '""';} else{echo $cappoke2['CAP1']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[1]['NomP'])){if($cappoke2['CAP1']['Precis'] == NULL){echo '""';} else{echo $cappoke2['CAP1']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[1]['NomP'])){if($cappoke2['CAP1']['PP'] == NULL){echo '""';} else{echo $cappoke2['CAP1']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke2['CAP1']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke2['CAP1']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke2['CAP1']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[1]['NomP'])){if($cappoke2['CAP1']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke2['CAP1']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke2['CAP1']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke2['CAP1']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team[1]['NomP'])){echo $cappoke2['CAP2']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke2['CAP2']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke2['CAP2']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[1]['NomP'])){if($cappoke2['CAP2']['Puissance'] == NULL){echo '""';} else{echo $cappoke2['CAP2']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[1]['NomP'])){if($cappoke2['CAP2']['Precis'] == NULL){echo '""';} else{echo $cappoke2['CAP2']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[1]['NomP'])){if($cappoke2['CAP2']['PP'] == NULL){echo '""';} else{echo $cappoke2['CAP2']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke2['CAP2']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke2['CAP2']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke2['CAP2']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[1]['NomP'])){if($cappoke2['CAP2']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke2['CAP2']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke2['CAP2']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke2['CAP2']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team[1]['NomP'])){echo $cappoke2['CAP3']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke2['CAP3']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke2['CAP3']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[1]['NomP'])){if($cappoke2['CAP3']['Puissance'] == NULL){echo '""';} else{echo $cappoke2['CAP3']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[1]['NomP'])){if($cappoke2['CAP3']['Precis'] == NULL){echo '""';} else{echo $cappoke2['CAP3']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[1]['NomP'])){if($cappoke2['CAP3']['PP'] == NULL){echo '""';} else{echo $cappoke2['CAP3']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke2['CAP3']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke2['CAP3']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke2['CAP3']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[1]['NomP'])){if($cappoke2['CAP3']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke2['CAP3']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke2['CAP3']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke2['CAP3']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team[1]['NomP'])){echo $cappoke2['CAP4']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke2['CAP4']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke2['CAP4']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[1]['NomP'])){if($cappoke2['CAP4']['Puissance'] == NULL){echo '""';} else{echo $cappoke2['CAP4']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[1]['NomP'])){if($cappoke2['CAP4']['Precis'] == NULL){echo '""';} else{echo $cappoke2['CAP4']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[1]['NomP'])){if($cappoke2['CAP4']['PP'] == NULL){echo '""';} else{echo $cappoke2['CAP4']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke2['CAP4']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke2['CAP4']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke2['CAP4']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[1]['NomP'])){if($cappoke2['CAP4']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke2['CAP4']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke2['CAP4']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke2['CAP4']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				<?php if(isset($team[1]['NomP'])){ echo $team[1]['ID'];}else{echo '"NULL"';}?>,
 				"<?php if(isset($team[1]['NomP'])){ echo $team[1]['TypeU'];}else{echo 'NULL';}?>",
 				"<?php if(isset($team[1]['NomP'])){ echo $team[1]['TypeD'];}else{echo 'NULL';}?>",
 				<?php if(isset($team[1]['NomP'])){ echo $team[1]['Niv'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[1]['NomP'])){ echo $team[1]['IVPV'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[1]['NomP'])){ echo $team[1]['IVAttaque'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[1]['NomP'])){ echo $team[1]['IVDefense'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[1]['NomP'])){ echo $team[1]['IVAttSpe'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[1]['NomP'])){ echo $team[1]['IVDefSpe'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[1]['NomP'])){ echo $team[1]['IVVitesse'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[1]['NomP'])){ echo $team[1]['PVmax'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[1]['NomP'])){ echo $team[1]['Vitesse'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[1]['NomP'])){ echo $team[1]['Attaque'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[1]['NomP'])){ echo $team[1]['Defense'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[1]['NomP'])){ echo $team[1]['AttSpe'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[1]['NomP'])){ echo $team[1]['DefSPe'];}else{echo '"NULL"';}?>,
 				<?php if (isset($team[1]['gainxp'])){ echo $team[1]['gainxp'];}else{ echo 0;} ?>,
 				<?php if(isset($team[1]['NomP'])){ echo $team[1]['XPVaincu'];}else{echo '"NULL"';}?>,
 				"<?php if(isset($team[1]['NomP'])){ echo $team[1]['Courbe'];}else{echo 'NULL';}?>",
 				<?php if(isset($team[1]['NomP'])){ echo $team[1]['XP'];}else{echo '"NULL"';}?>   ),
 		new Pokemon(
 			"<?php if(isset($team[2]['NomP'])){
 				echo utf8_encode($team[2]['NomP']);}else{ echo 'NULL';}  ?>", 
 				"<?php if(isset($team[2]['NomP'])){
 					echo $team[2]['PVact'];}else{echo 'NULL';}	?>",
 				new Cap("<?php if(isset($team[2]['NomP'])){echo $cappoke3['CAP1']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke3['CAP1']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke3['CAP1']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[2]['NomP'])){if($cappoke3['CAP1']['Puissance'] == NULL){echo '""';} else{echo $cappoke3['CAP1']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[2]['NomP'])){if($cappoke3['CAP1']['Precis'] == NULL){echo '""';} else{echo $cappoke3['CAP1']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[2]['NomP'])){if($cappoke3['CAP1']['PP'] == NULL){echo '""';} else{echo $cappoke3['CAP1']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke3['CAP1']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke3['CAP1']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke3['CAP1']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[2]['NomP'])){if($cappoke3['CAP1']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke3['CAP1']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke3['CAP1']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke3['CAP1']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team[2]['NomP'])){echo $cappoke3['CAP2']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke3['CAP2']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke3['CAP2']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[2]['NomP'])){if($cappoke3['CAP2']['Puissance'] == NULL){echo '""';} else{echo $cappoke3['CAP2']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[2]['NomP'])){if($cappoke3['CAP2']['Precis'] == NULL){echo '""';} else{echo $cappoke3['CAP2']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[2]['NomP'])){if($cappoke3['CAP2']['PP'] == NULL){echo '""';} else{echo $cappoke3['CAP2']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke3['CAP2']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke3['CAP2']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke3['CAP2']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[2]['NomP'])){if($cappoke3['CAP2']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke3['CAP2']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke3['CAP2']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke3['CAP2']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team[2]['NomP'])){echo $cappoke3['CAP3']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke3['CAP3']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke3['CAP3']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[2]['NomP'])){if($cappoke3['CAP3']['Puissance'] == NULL){echo '""';} else{echo $cappoke3['CAP3']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[2]['NomP'])){if($cappoke3['CAP3']['Precis'] == NULL){echo '""';} else{echo $cappoke3['CAP3']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[2]['NomP'])){if($cappoke3['CAP3']['PP'] == NULL){echo '""';} else{echo $cappoke3['CAP3']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke3['CAP3']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke3['CAP3']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke3['CAP3']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[2]['NomP'])){if($cappoke3['CAP3']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke3['CAP3']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke3['CAP3']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke3['CAP3']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team[2]['NomP'])){echo $cappoke3['CAP4']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke3['CAP4']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke3['CAP4']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[2]['NomP'])){if($cappoke3['CAP4']['Puissance'] == NULL){echo '""';} else{echo $cappoke3['CAP4']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[2]['NomP'])){if($cappoke3['CAP4']['Precis'] == NULL){echo '""';} else{echo $cappoke3['CAP4']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[2]['NomP'])){if($cappoke3['CAP4']['PP'] == NULL){echo '""';} else{echo $cappoke3['CAP4']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke3['CAP4']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke3['CAP4']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke3['CAP4']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[2]['NomP'])){if($cappoke3['CAP4']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke3['CAP4']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke3['CAP4']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke3['CAP4']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				<?php if(isset($team[2]['NomP'])){ echo $team[2]['ID'];}else{echo '"NULL"';}?>,
 				"<?php if(isset($team[2]['NomP'])){ echo $team[2]['TypeU'];}else{echo 'NULL';}?>",
 				"<?php if(isset($team[2]['NomP'])){ echo $team[2]['TypeD'];}else{echo 'NULL';}?>",
 				<?php if(isset($team[2]['NomP'])){ echo $team[2]['Niv'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[2]['NomP'])){ echo $team[2]['IVPV'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[2]['NomP'])){ echo $team[2]['IVAttaque'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[2]['NomP'])){ echo $team[2]['IVDefense'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[2]['NomP'])){ echo $team[2]['IVAttSpe'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[2]['NomP'])){ echo $team[2]['IVDefSpe'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[2]['NomP'])){ echo $team[2]['IVVitesse'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[2]['NomP'])){ echo $team[2]['PVmax'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[2]['NomP'])){ echo $team[2]['Vitesse'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[2]['NomP'])){ echo $team[2]['Attaque'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[2]['NomP'])){ echo $team[2]['Defense'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[2]['NomP'])){ echo $team[2]['AttSpe'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[2]['NomP'])){ echo $team[2]['DefSPe'];}else{echo '"NULL"';}?>,
 				<?php if (isset($team[2]['gainxp'])){ echo $team[2]['gainxp'];}else{ echo 0;} ?>,
 				<?php if(isset($team[2]['NomP'])){ echo $team[2]['XPVaincu'];}else{echo '"NULL"';}?>,
 				"<?php if(isset($team[2]['NomP'])){ echo $team[2]['Courbe'];}else{echo 'NULL';}?>",
 				<?php if(isset($team[2]['NomP'])){ echo $team[2]['XP'];}else{echo '"NULL"';}?>),
 		new Pokemon(
 			"<?php if(isset($team[3]['NomP'])){
 				echo utf8_encode($team[3]['NomP']);}else{ echo 'NULL';}  ?>", 
 				"<?php if(isset($team[3]['NomP'])){
 					echo$team[3]['PVact'];}else{echo 'NULL';}	?>",
 				new Cap("<?php if(isset($team[3]['NomP'])){echo $cappoke4['CAP1']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke4['CAP1']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke4['CAP1']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[3]['NomP'])){if($cappoke4['CAP1']['Puissance'] == NULL){echo '""';} else{echo $cappoke4['CAP1']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[3]['NomP'])){if($cappoke4['CAP1']['Precis'] == NULL){echo '""';} else{echo $cappoke4['CAP1']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[3]['NomP'])){if($cappoke4['CAP1']['PP'] == NULL){echo '""';} else{echo $cappoke4['CAP1']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke4['CAP1']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke4['CAP1']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke4['CAP1']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[3]['NomP'])){if($cappoke4['CAP1']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke4['CAP1']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke4['CAP1']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke4['CAP1']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team[3]['NomP'])){echo $cappoke4['CAP2']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke4['CAP2']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke4['CAP2']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[3]['NomP'])){if($cappoke4['CAP2']['Puissance'] == NULL){echo '""';} else{echo $cappoke4['CAP2']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[3]['NomP'])){if($cappoke4['CAP2']['Precis'] == NULL){echo '""';} else{echo $cappoke4['CAP2']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[3]['NomP'])){if($cappoke4['CAP2']['PP'] == NULL){echo '""';} else{echo $cappoke4['CAP2']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke4['CAP2']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke4['CAP2']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke4['CAP2']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[3]['NomP'])){if($cappoke4['CAP2']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke4['CAP2']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke4['CAP2']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke4['CAP2']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team[3]['NomP'])){echo $cappoke4['CAP3']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke4['CAP3']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke4['CAP3']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[3]['NomP'])){if($cappoke4['CAP3']['Puissance'] == NULL){echo '""';} else{echo $cappoke4['CAP3']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[3]['NomP'])){if($cappoke4['CAP3']['Precis'] == NULL){echo '""';} else{echo $cappoke4['CAP3']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[3]['NomP'])){if($cappoke4['CAP3']['PP'] == NULL){echo '""';} else{echo $cappoke4['CAP3']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke4['CAP3']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke4['CAP3']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke4['CAP3']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[3]['NomP'])){if($cappoke4['CAP3']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke4['CAP3']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke4['CAP3']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke4['CAP3']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team[3]['NomP'])){echo $cappoke4['CAP4']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke4['CAP4']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke4['CAP4']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[3]['NomP'])){if($cappoke4['CAP4']['Puissance'] == NULL){echo '""';} else{echo $cappoke4['CAP4']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[3]['NomP'])){if($cappoke4['CAP4']['Precis'] == NULL){echo '""';} else{echo $cappoke4['CAP4']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[3]['NomP'])){if($cappoke4['CAP4']['PP'] == NULL){echo '""';} else{echo $cappoke4['CAP4']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke4['CAP4']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke4['CAP4']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke4['CAP4']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[3]['NomP'])){if($cappoke4['CAP4']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke4['CAP4']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke4['CAP4']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke4['CAP4']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				<?php if(isset($team[3]['NomP'])){ echo $team[3]['ID'];}else{echo '"NULL"';}?>,
 				"<?php if(isset($team[3]['NomP'])){ echo $team[3]['TypeU'];}else{echo 'NULL';}?>",
 				"<?php if(isset($team[3]['NomP'])){ echo $team[3]['TypeD'];}else{echo 'NULL';}?>",
 				<?php if(isset($team[3]['NomP'])){ echo $team[3]['Niv'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[3]['NomP'])){ echo $team[3]['IVPV'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[3]['NomP'])){ echo $team[3]['IVAttaque'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[3]['NomP'])){ echo $team[3]['IVDefense'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[3]['NomP'])){ echo $team[3]['IVAttSpe'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[3]['NomP'])){ echo $team[3]['IVDefSpe'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[3]['NomP'])){ echo $team[3]['IVVitesse'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[3]['NomP'])){ echo $team[3]['PVmax'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[3]['NomP'])){ echo $team[3]['Vitesse'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[3]['NomP'])){ echo $team[3]['Attaque'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[3]['NomP'])){ echo $team[3]['Defense'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[3]['NomP'])){ echo $team[3]['AttSpe'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[3]['NomP'])){ echo $team[3]['DefSPe'];}else{echo '"NULL"';}?>,
 				<?php if (isset($team[3]['gainxp'])){ echo $team[3]['gainxp'];}else{ echo 0;} ?>,
 				<?php if(isset($team[3]['NomP'])){ echo $team[3]['XPVaincu'];}else{echo '"NULL"';}?>,
 				"<?php if(isset($team[3]['NomP'])){ echo $team[3]['Courbe'];}else{echo 'NULL';}?>",
 				<?php if(isset($team[3]['NomP'])){ echo $team[3]['XP'];}else{echo '"NULL"';}?>),
 		new Pokemon(
 			"<?php if(isset($team[4]['NomP'])){
 				echo utf8_encode($team[4]['NomP']);}else{ echo 'NULL';}  ?>", 
 				"<?php if(isset($team[4]['NomP'])){
 					echo $team[4]['PVact'];}else{echo 'NULL';}	?>",
 				new Cap("<?php if(isset($team[4]['NomP'])){echo $cappoke5['CAP1']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke5['CAP1']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke5['CAP1']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[4]['NomP'])){if($cappoke5['CAP1']['Puissance'] == NULL){echo '""';} else{echo $cappoke5['CAP1']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[4]['NomP'])){if($cappoke5['CAP1']['Precis'] == NULL){echo '""';} else{echo $cappoke5['CAP1']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[4]['NomP'])){if($cappoke5['CAP1']['PP'] == NULL){echo '""';} else{echo $cappoke5['CAP1']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke5['CAP1']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke5['CAP1']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke5['CAP1']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[4]['NomP'])){if($cappoke5['CAP1']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke5['CAP1']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke5['CAP1']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke5['CAP1']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team[4]['NomP'])){echo $cappoke5['CAP2']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke5['CAP2']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke5['CAP2']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[4]['NomP'])){if($cappoke5['CAP2']['Puissance'] == NULL){echo '""';} else{echo $cappoke5['CAP2']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[4]['NomP'])){if($cappoke5['CAP2']['Precis'] == NULL){echo '""';} else{echo $cappoke5['CAP2']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[4]['NomP'])){if($cappoke5['CAP2']['PP'] == NULL){echo '""';} else{echo $cappoke5['CAP2']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke5['CAP2']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke5['CAP2']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke5['CAP2']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[4]['NomP'])){if($cappoke5['CAP2']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke5['CAP2']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke5['CAP2']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke5['CAP2']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team[4]['NomP'])){echo $cappoke5['CAP3']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke5['CAP3']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke5['CAP3']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[4]['NomP'])){if($cappoke5['CAP3']['Puissance'] == NULL){echo '""';} else{echo $cappoke5['CAP3']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[4]['NomP'])){if($cappoke5['CAP3']['Precis'] == NULL){echo '""';} else{echo $cappoke5['CAP3']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[4]['NomP'])){if($cappoke5['CAP3']['PP'] == NULL){echo '""';} else{echo $cappoke5['CAP3']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke5['CAP3']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke5['CAP3']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke5['CAP3']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[4]['NomP'])){if($cappoke5['CAP3']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke5['CAP3']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke5['CAP3']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke5['CAP3']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team[4]['NomP'])){echo $cappoke5['CAP4']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke5['CAP4']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke5['CAP4']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[4]['NomP'])){if($cappoke5['CAP4']['Puissance'] == NULL){echo '""';} else{echo $cappoke5['CAP4']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[4]['NomP'])){if($cappoke5['CAP4']['Precis'] == NULL){echo '""';} else{echo $cappoke5['CAP4']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[4]['NomP'])){if($cappoke5['CAP4']['PP'] == NULL){echo '""';} else{echo $cappoke5['CAP4']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke5['CAP4']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke5['CAP4']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke5['CAP4']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[4]['NomP'])){if($cappoke5['CAP4']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke5['CAP4']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke5['CAP4']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke5['CAP4']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				<?php if(isset($team[4]['NomP'])){ echo $team[4]['ID'];}else{echo '"NULL"';}?>,
 				"<?php if(isset($team[4]['NomP'])){ echo $team[4]['TypeU'];}else{echo 'NULL';}?>",
 				"<?php if(isset($team[4]['NomP'])){ echo $team[4]['TypeD'];}else{echo 'NULL';}?>",
 				<?php if(isset($team[4]['NomP'])){ echo $team[4]['Niv'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[4]['NomP'])){ echo $team[4]['IVPV'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[4]['NomP'])){ echo $team[4]['IVAttaque'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[4]['NomP'])){ echo $team[4]['IVDefense'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[4]['NomP'])){ echo $team[4]['IVAttSpe'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[4]['NomP'])){ echo $team[4]['IVDefSpe'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[4]['NomP'])){ echo $team[4]['IVVitesse'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[4]['NomP'])){ echo $team[4]['PVmax'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[4]['NomP'])){ echo $team[4]['Vitesse'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[4]['NomP'])){ echo $team[4]['Attaque'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[4]['NomP'])){ echo $team[4]['Defense'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[4]['NomP'])){ echo $team[4]['AttSpe'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team[4]['NomP'])){ echo $team[4]['DefSPe'];}else{echo '"NULL"';}?>,
 				<?php if (isset($team[4]['gainxp'])){ echo $team[4]['gainxp'];}else{ echo 0;} ?>,
 				<?php if(isset($team[4]['NomP'])){ echo $team[4]['XPVaincu'];}else{echo '"NULL"';}?>,
 				"<?php if(isset($team[4]['NomP'])){ echo $team[4]['Courbe'];}else{echo 'NULL';}?>",
 				<?php if(isset($team[4]['NomP'])){ echo $team[4]['XP'];}else{echo '"NULL"';}?>)
 		


 		);


var equipejoueur2 =  new Equipe(
 		new Pokemon(
 			"<?php if(isset($team2[0]['NomP'])){
 				echo utf8_encode($team2[0]['NomP']);}else{ echo 'NULL';}  ?>", 
 				"<?php if(isset($team2[0]['NomP'])){
 					echo $team2[0]['PVact'];}else{echo 'NULL';}	?>",
 				new Cap("<?php if(isset($team2[0]['NomP'])){echo $cappoke21['CAP1']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[0]['NomP'])){echo $cappoke21['CAP1']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[0]['NomP'])){echo $cappoke21['CAP1']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team2[0]['NomP'])){if($cappoke21['CAP1']['Puissance'] == NULL){echo '""';} else{echo $cappoke21['CAP1']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team2[0]['NomP'])){if($cappoke21['CAP1']['Precis'] == NULL){echo '""';} else{echo $cappoke21['CAP1']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team2[0]['NomP'])){if($cappoke21['CAP1']['PP'] == NULL){echo '""';} else{echo $cappoke21['CAP1']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team2[0]['NomP'])){echo $cappoke21['CAP1']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[0]['NomP'])){echo $cappoke21['CAP1']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[0]['NomP'])){echo $cappoke21['CAP1']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team2[0]['NomP'])){if($cappoke21['CAP1']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke21['CAP1']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team2[0]['NomP'])){echo $cappoke21['CAP1']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[0]['NomP'])){echo $cappoke21['CAP1']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team2[0]['NomP'])){echo $cappoke21['CAP2']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[0]['NomP'])){echo $cappoke21['CAP2']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[0]['NomP'])){echo $cappoke21['CAP2']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team2[0]['NomP'])){if($cappoke21['CAP2']['Puissance'] == NULL){echo '""';} else{echo $cappoke21['CAP2']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team2[0]['NomP'])){if($cappoke21['CAP2']['Precis'] == NULL){echo '""';} else{echo $cappoke21['CAP2']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team2[0]['NomP'])){if($cappoke21['CAP2']['PP'] == NULL){echo '""';} else{echo $cappoke21['CAP2']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team2[0]['NomP'])){echo $cappoke21['CAP2']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[0]['NomP'])){echo $cappoke21['CAP2']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[0]['NomP'])){echo $cappoke21['CAP2']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team2[0]['NomP'])){if($cappoke21['CAP2']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke21['CAP2']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team2[0]['NomP'])){echo $cappoke21['CAP2']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[0]['NomP'])){echo $cappoke21['CAP2']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team2[0]['NomP'])){echo $cappoke21['CAP3']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[0]['NomP'])){echo $cappoke21['CAP3']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[0]['NomP'])){echo $cappoke21['CAP3']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team2[0]['NomP'])){if($cappoke21['CAP3']['Puissance'] == NULL){echo '""';} else{echo $cappoke21['CAP3']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team2[0]['NomP'])){if($cappoke21['CAP3']['Precis'] == NULL){echo '""';} else{echo $cappoke21['CAP3']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team2[0]['NomP'])){if($cappoke21['CAP3']['PP'] == NULL){echo '""';} else{echo $cappoke21['CAP3']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team2[0]['NomP'])){echo $cappoke21['CAP3']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[0]['NomP'])){echo $cappoke21['CAP3']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[0]['NomP'])){echo $cappoke21['CAP3']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team2[0]['NomP'])){if($cappoke21['CAP3']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke21['CAP3']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team2[0]['NomP'])){echo $cappoke21['CAP3']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[0]['NomP'])){echo $cappoke21['CAP3']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team2[0]['NomP'])){echo $cappoke21['CAP4']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[0]['NomP'])){echo $cappoke21['CAP4']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[0]['NomP'])){echo $cappoke21['CAP4']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team2[0]['NomP'])){if($cappoke21['CAP4']['Puissance'] == NULL){echo '""';} else{echo $cappoke21['CAP4']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team2[0]['NomP'])){if($cappoke21['CAP4']['Precis'] == NULL){echo '""';} else{echo $cappoke21['CAP4']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team2[0]['NomP'])){if($cappoke21['CAP4']['PP'] == NULL){echo '""';} else{echo $cappoke21['CAP4']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team2[0]['NomP'])){echo $cappoke21['CAP4']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[0]['NomP'])){echo $cappoke21['CAP4']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[0]['NomP'])){echo $cappoke21['CAP4']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team2[0]['NomP'])){if($cappoke21['CAP4']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke21['CAP4']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team2[0]['NomP'])){echo $cappoke21['CAP4']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[0]['NomP'])){echo $cappoke21['CAP4']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				<?php if(isset($team2[0]['NomP'])){ echo $team2[0]['ID'];}else{echo '"NULL"';}?>,
 				"<?php if(isset($team2[0]['NomP'])){ echo $team2[0]['TypeU'];}else{echo 'NULL';}?>",
 				"<?php if(isset($team2[0]['NomP'])){ echo $team2[0]['TypeD'];}else{echo 'NULL';}?>",
 				<?php if(isset($team2[0]['NomP'])){ echo $team2[0]['Niv'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[0]['NomP'])){ echo $team2[0]['IVPV'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[0]['NomP'])){ echo $team2[0]['IVAttaque'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[0]['NomP'])){ echo $team2[0]['IVDefense'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[0]['NomP'])){ echo $team2[0]['IVAttSpe'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[0]['NomP'])){ echo $team2[0]['IVDefSpe'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[0]['NomP'])){ echo $team2[0]['IVVitesse'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[0]['NomP'])){ echo $team2[0]['PVmax'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[0]['NomP'])){ echo $team2[0]['Vitesse'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[0]['NomP'])){ echo $team2[0]['Attaque'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[0]['NomP'])){ echo $team2[0]['Defense'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[0]['NomP'])){ echo $team2[0]['AttSpe'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[0]['NomP'])){ echo $team2[0]['DefSPe'];}else{echo '"NULL"';}?>,
 				<?php if (isset($team2[0]['gainxp'])){ echo $team2[0]['gainxp'];}else{ echo 0;} ?>,
 				<?php if(isset($team2[0]['NomP'])){ echo $team2[0]['XPVaincu'];}else{echo '"NULL"';}?>,
 				"<?php if(isset($team2[0]['NomP'])){ echo $team2[0]['Courbe'];}else{echo 'NULL';}?>",
 				<?php if(isset($team2[0]['NomP'])){ echo $team2[0]['XP'];}else{echo '"NULL"';}?>),
 		new Pokemon(
 			"<?php if(isset($team2[1]['NomP'])){
 				echo utf8_encode($team2[1]['NomP']);}else{ echo 'NULL';}  ?>", 
 				"<?php if(isset($team2[1]['NomP'])){
 					echo $team2[1]['PVact'];}else{echo 'NULL';}	?>",
 				new Cap("<?php if(isset($team2[1]['NomP'])){echo $cappoke22['CAP1']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[1]['NomP'])){echo $cappoke22['CAP1']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[1]['NomP'])){echo $cappoke22['CAP1']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team2[1]['NomP'])){if($cappoke22['CAP1']['Puissance'] == NULL){echo '""';} else{echo $cappoke22['CAP1']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team2[1]['NomP'])){if($cappoke22['CAP1']['Precis'] == NULL){echo '""';} else{echo $cappoke22['CAP1']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team2[1]['NomP'])){if($cappoke22['CAP1']['PP'] == NULL){echo '""';} else{echo $cappoke22['CAP1']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team2[1]['NomP'])){echo $cappoke22['CAP1']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[1]['NomP'])){echo $cappoke22['CAP1']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[1]['NomP'])){echo $cappoke22['CAP1']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team2[1]['NomP'])){if($cappoke22['CAP1']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke22['CAP1']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team2[1]['NomP'])){echo $cappoke22['CAP1']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[1]['NomP'])){echo $cappoke22['CAP1']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team2[1]['NomP'])){echo $cappoke22['CAP2']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[1]['NomP'])){echo $cappoke22['CAP2']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[1]['NomP'])){echo $cappoke22['CAP2']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team2[1]['NomP'])){if($cappoke22['CAP2']['Puissance'] == NULL){echo '""';} else{echo $cappoke22['CAP2']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team2[1]['NomP'])){if($cappoke22['CAP2']['Precis'] == NULL){echo '""';} else{echo $cappoke22['CAP2']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team2[1]['NomP'])){if($cappoke22['CAP2']['PP'] == NULL){echo '""';} else{echo $cappoke22['CAP2']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team2[1]['NomP'])){echo $cappoke22['CAP2']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[1]['NomP'])){echo $cappoke22['CAP2']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[1]['NomP'])){echo $cappoke22['CAP2']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team2[1]['NomP'])){if($cappoke22['CAP2']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke22['CAP2']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team2[1]['NomP'])){echo $cappoke22['CAP2']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[1]['NomP'])){echo $cappoke22['CAP2']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team2[1]['NomP'])){echo $cappoke22['CAP3']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[1]['NomP'])){echo $cappoke22['CAP3']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[1]['NomP'])){echo $cappoke22['CAP3']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team2[1]['NomP'])){if($cappoke22['CAP3']['Puissance'] == NULL){echo '""';} else{echo $cappoke22['CAP3']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team2[1]['NomP'])){if($cappoke22['CAP3']['Precis'] == NULL){echo '""';} else{echo $cappoke22['CAP3']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team2[1]['NomP'])){if($cappoke22['CAP3']['PP'] == NULL){echo '""';} else{echo $cappoke22['CAP3']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team2[1]['NomP'])){echo $cappoke22['CAP3']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[1]['NomP'])){echo $cappoke22['CAP3']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[1]['NomP'])){echo $cappoke22['CAP3']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team2[1]['NomP'])){if($cappoke22['CAP3']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke22['CAP3']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team2[1]['NomP'])){echo $cappoke22['CAP3']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[1]['NomP'])){echo $cappoke22['CAP3']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team2[1]['NomP'])){echo $cappoke22['CAP4']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[1]['NomP'])){echo $cappoke22['CAP4']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[1]['NomP'])){echo $cappoke22['CAP4']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team2[1]['NomP'])){if($cappoke22['CAP4']['Puissance'] == NULL){echo '""';} else{echo $cappoke22['CAP4']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team2[1]['NomP'])){if($cappoke22['CAP4']['Precis'] == NULL){echo '""';} else{echo $cappoke22['CAP4']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team2[1]['NomP'])){if($cappoke22['CAP4']['PP'] == NULL){echo '""';} else{echo $cappoke22['CAP4']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team2[1]['NomP'])){echo $cappoke22['CAP4']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[1]['NomP'])){echo $cappoke22['CAP4']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[1]['NomP'])){echo $cappoke22['CAP4']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team2[1]['NomP'])){if($cappoke22['CAP4']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke22['CAP4']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team2[1]['NomP'])){echo $cappoke22['CAP4']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[1]['NomP'])){echo $cappoke22['CAP4']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				<?php if(isset($team2[1]['NomP'])){ echo $team2[1]['ID'];}else{echo '"NULL"';}?>,
 				"<?php if(isset($team2[1]['NomP'])){ echo $team2[1]['TypeU'];}else{echo 'NULL';}?>",
 				"<?php if(isset($team2[1]['NomP'])){ echo $team2[1]['TypeD'];}else{echo 'NULL';}?>",
 				<?php if(isset($team2[1]['NomP'])){ echo $team2[1]['Niv'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[1]['NomP'])){ echo $team2[1]['IVPV'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[1]['NomP'])){ echo $team2[1]['IVAttaque'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[1]['NomP'])){ echo $team2[1]['IVDefense'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[1]['NomP'])){ echo $team2[1]['IVAttSpe'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[1]['NomP'])){ echo $team2[1]['IVDefSpe'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[1]['NomP'])){ echo $team2[1]['IVVitesse'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[1]['NomP'])){ echo $team2[1]['PVmax'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[1]['NomP'])){ echo $team2[1]['Vitesse'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[1]['NomP'])){ echo $team2[1]['Attaque'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[1]['NomP'])){ echo $team2[1]['Defense'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[1]['NomP'])){ echo $team2[1]['AttSpe'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[1]['NomP'])){ echo $team2[1]['DefSPe'];}else{echo '"NULL"';}?>,
 				<?php if (isset($team2[1]['gainxp'])){ echo $team2[1]['gainxp'];}else{ echo 0;} ?>,
 				<?php if(isset($team2[1]['NomP'])){ echo $team2[1]['XPVaincu'];}else{echo '"NULL"';}?>,
 				"<?php if(isset($team2[1]['NomP'])){ echo $team2[1]['Courbe'];}else{echo 'NULL';}?>",
 				<?php if(isset($team2[1]['NomP'])){ echo $team2[1]['XP'];}else{echo '"NULL"';}?>   ),
 		new Pokemon(
 			"<?php if(isset($team2[2]['NomP'])){
 				echo utf8_encode($team2[2]['NomP']);}else{ echo 'NULL';}  ?>", 
 				"<?php if(isset($team2[2]['NomP'])){
 					echo $team2[2]['PVact'];}else{echo 'NULL';}	?>",
 				new Cap("<?php if(isset($team2[2]['NomP'])){echo $cappoke23['CAP1']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[2]['NomP'])){echo $cappoke23['CAP1']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[2]['NomP'])){echo $cappoke23['CAP1']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team2[2]['NomP'])){if($cappoke23['CAP1']['Puissance'] == NULL){echo '""';} else{echo $cappoke23['CAP1']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team2[2]['NomP'])){if($cappoke23['CAP1']['Precis'] == NULL){echo '""';} else{echo $cappoke23['CAP1']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team2[2]['NomP'])){if($cappoke23['CAP1']['PP'] == NULL){echo '""';} else{echo $cappoke23['CAP1']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team2[2]['NomP'])){echo $cappoke23['CAP1']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[2]['NomP'])){echo $cappoke23['CAP1']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[2]['NomP'])){echo $cappoke23['CAP1']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team2[2]['NomP'])){if($cappoke23['CAP1']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke23['CAP1']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team2[2]['NomP'])){echo $cappoke23['CAP1']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[2]['NomP'])){echo $cappoke23['CAP1']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team2[2]['NomP'])){echo $cappoke23['CAP2']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[2]['NomP'])){echo $cappoke23['CAP2']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[2]['NomP'])){echo $cappoke23['CAP2']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team2[2]['NomP'])){if($cappoke23['CAP2']['Puissance'] == NULL){echo '""';} else{echo $cappoke23['CAP2']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team2[2]['NomP'])){if($cappoke23['CAP2']['Precis'] == NULL){echo '""';} else{echo $cappoke23['CAP2']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team2[2]['NomP'])){if($cappoke23['CAP2']['PP'] == NULL){echo '""';} else{echo $cappoke23['CAP2']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team2[2]['NomP'])){echo $cappoke23['CAP2']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[2]['NomP'])){echo $cappoke23['CAP2']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[2]['NomP'])){echo $cappoke23['CAP2']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team2[2]['NomP'])){if($cappoke23['CAP2']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke23['CAP2']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team2[2]['NomP'])){echo $cappoke23['CAP2']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[2]['NomP'])){echo $cappoke23['CAP2']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team2[2]['NomP'])){echo $cappoke23['CAP3']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[2]['NomP'])){echo $cappoke23['CAP3']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[2]['NomP'])){echo $cappoke23['CAP3']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team2[2]['NomP'])){if($cappoke23['CAP3']['Puissance'] == NULL){echo '""';} else{echo $cappoke23['CAP3']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team2[2]['NomP'])){if($cappoke23['CAP3']['Precis'] == NULL){echo '""';} else{echo $cappoke23['CAP3']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team2[2]['NomP'])){if($cappoke23['CAP3']['PP'] == NULL){echo '""';} else{echo $cappoke23['CAP3']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team2[2]['NomP'])){echo $cappoke23['CAP3']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[2]['NomP'])){echo $cappoke23['CAP3']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[2]['NomP'])){echo $cappoke23['CAP3']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team2[2]['NomP'])){if($cappoke23['CAP3']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke23['CAP3']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team2[2]['NomP'])){echo $cappoke23['CAP3']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[2]['NomP'])){echo $cappoke23['CAP3']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team2[2]['NomP'])){echo $cappoke23['CAP4']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[2]['NomP'])){echo $cappoke23['CAP4']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[2]['NomP'])){echo $cappoke23['CAP4']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team2[2]['NomP'])){if($cappoke23['CAP4']['Puissance'] == NULL){echo '""';} else{echo $cappoke23['CAP4']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team2[2]['NomP'])){if($cappoke23['CAP4']['Precis'] == NULL){echo '""';} else{echo $cappoke23['CAP4']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team2[2]['NomP'])){if($cappoke23['CAP4']['PP'] == NULL){echo '""';} else{echo $cappoke23['CAP4']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team2[2]['NomP'])){echo $cappoke23['CAP4']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[2]['NomP'])){echo $cappoke23['CAP4']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[2]['NomP'])){echo $cappoke23['CAP4']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team2[2]['NomP'])){if($cappoke23['CAP4']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke23['CAP4']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team2[2]['NomP'])){echo $cappoke23['CAP4']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[2]['NomP'])){echo $cappoke23['CAP4']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				<?php if(isset($team2[2]['NomP'])){ echo $team2[2]['ID'];}else{echo '"NULL"';}?>,
 				"<?php if(isset($team2[2]['NomP'])){ echo $team2[2]['TypeU'];}else{echo 'NULL';}?>",
 				"<?php if(isset($team2[2]['NomP'])){ echo $team2[2]['TypeD'];}else{echo 'NULL';}?>",
 				<?php if(isset($team2[2]['NomP'])){ echo $team2[2]['Niv'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[2]['NomP'])){ echo $team2[2]['IVPV'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[2]['NomP'])){ echo $team2[2]['IVAttaque'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[2]['NomP'])){ echo $team2[2]['IVDefense'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[2]['NomP'])){ echo $team2[2]['IVAttSpe'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[2]['NomP'])){ echo $team2[2]['IVDefSpe'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[2]['NomP'])){ echo $team2[2]['IVVitesse'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[2]['NomP'])){ echo $team2[2]['PVmax'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[2]['NomP'])){ echo $team2[2]['Vitesse'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[2]['NomP'])){ echo $team2[2]['Attaque'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[2]['NomP'])){ echo $team2[2]['Defense'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[2]['NomP'])){ echo $team2[2]['AttSpe'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[2]['NomP'])){ echo $team2[2]['DefSPe'];}else{echo '"NULL"';}?>,
 				<?php if (isset($team2[2]['gainxp'])){ echo $team2[2]['gainxp'];}else{ echo 0;} ?>,
 				<?php if(isset($team2[2]['NomP'])){ echo $team2[2]['XPVaincu'];}else{echo '"NULL"';}?>,
 				"<?php if(isset($team2[2]['NomP'])){ echo $team2[2]['Courbe'];}else{echo 'NULL';}?>",
 				<?php if(isset($team2[2]['NomP'])){ echo $team2[2]['XP'];}else{echo '"NULL"';}?>),
 		new Pokemon(
 			"<?php if(isset($team2[3]['NomP'])){
 				echo utf8_encode($team2[3]['NomP']);}else{ echo 'NULL';}  ?>", 
 				"<?php if(isset($team2[3]['NomP'])){
 					echo$team2[3]['PVact'];}else{echo 'NULL';}	?>",
 				new Cap("<?php if(isset($team2[3]['NomP'])){echo $cappoke24['CAP1']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[3]['NomP'])){echo $cappoke24['CAP1']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[3]['NomP'])){echo $cappoke24['CAP1']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team2[3]['NomP'])){if($cappoke24['CAP1']['Puissance'] == NULL){echo '""';} else{echo $cappoke24['CAP1']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team2[3]['NomP'])){if($cappoke24['CAP1']['Precis'] == NULL){echo '""';} else{echo $cappoke24['CAP1']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team2[3]['NomP'])){if($cappoke24['CAP1']['PP'] == NULL){echo '""';} else{echo $cappoke24['CAP1']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team2[3]['NomP'])){echo $cappoke24['CAP1']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[3]['NomP'])){echo $cappoke24['CAP1']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[3]['NomP'])){echo $cappoke24['CAP1']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team2[3]['NomP'])){if($cappoke24['CAP1']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke24['CAP1']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team2[3]['NomP'])){echo $cappoke24['CAP1']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[3]['NomP'])){echo $cappoke24['CAP1']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team2[3]['NomP'])){echo $cappoke24['CAP2']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[3]['NomP'])){echo $cappoke24['CAP2']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[3]['NomP'])){echo $cappoke24['CAP2']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team2[3]['NomP'])){if($cappoke24['CAP2']['Puissance'] == NULL){echo '""';} else{echo $cappoke24['CAP2']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team2[3]['NomP'])){if($cappoke24['CAP2']['Precis'] == NULL){echo '""';} else{echo $cappoke24['CAP2']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team2[3]['NomP'])){if($cappoke24['CAP2']['PP'] == NULL){echo '""';} else{echo $cappoke24['CAP2']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team2[3]['NomP'])){echo $cappoke24['CAP2']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[3]['NomP'])){echo $cappoke24['CAP2']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[3]['NomP'])){echo $cappoke24['CAP2']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team2[3]['NomP'])){if($cappoke24['CAP2']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke24['CAP2']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team2[3]['NomP'])){echo $cappoke24['CAP2']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[3]['NomP'])){echo $cappoke24['CAP2']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team2[3]['NomP'])){echo $cappoke24['CAP3']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[3]['NomP'])){echo $cappoke24['CAP3']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[3]['NomP'])){echo $cappoke24['CAP3']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team2[3]['NomP'])){if($cappoke24['CAP3']['Puissance'] == NULL){echo '""';} else{echo $cappoke24['CAP3']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team2[3]['NomP'])){if($cappoke24['CAP3']['Precis'] == NULL){echo '""';} else{echo $cappoke24['CAP3']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team2[3]['NomP'])){if($cappoke24['CAP3']['PP'] == NULL){echo '""';} else{echo $cappoke24['CAP3']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team2[3]['NomP'])){echo $cappoke24['CAP3']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[3]['NomP'])){echo $cappoke24['CAP3']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[3]['NomP'])){echo $cappoke24['CAP3']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team2[3]['NomP'])){if($cappoke24['CAP3']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke24['CAP3']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team2[3]['NomP'])){echo $cappoke24['CAP3']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[3]['NomP'])){echo $cappoke24['CAP3']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team2[3]['NomP'])){echo $cappoke24['CAP4']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[3]['NomP'])){echo $cappoke24['CAP4']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[3]['NomP'])){echo $cappoke24['CAP4']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team2[3]['NomP'])){if($cappoke24['CAP4']['Puissance'] == NULL){echo '""';} else{echo $cappoke24['CAP4']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team2[3]['NomP'])){if($cappoke24['CAP4']['Precis'] == NULL){echo '""';} else{echo $cappoke24['CAP4']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team2[3]['NomP'])){if($cappoke24['CAP4']['PP'] == NULL){echo '""';} else{echo $cappoke24['CAP4']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team2[3]['NomP'])){echo $cappoke24['CAP4']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[3]['NomP'])){echo $cappoke24['CAP4']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[3]['NomP'])){echo $cappoke24['CAP4']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team2[3]['NomP'])){if($cappoke24['CAP4']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke24['CAP4']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team2[3]['NomP'])){echo $cappoke24['CAP4']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[3]['NomP'])){echo $cappoke24['CAP4']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				<?php if(isset($team2[3]['NomP'])){ echo $team2[3]['ID'];}else{echo '"NULL"';}?>,
 				"<?php if(isset($team2[3]['NomP'])){ echo $team2[3]['TypeU'];}else{echo 'NULL';}?>",
 				"<?php if(isset($team2[3]['NomP'])){ echo $team2[3]['TypeD'];}else{echo 'NULL';}?>",
 				<?php if(isset($team2[3]['NomP'])){ echo $team2[3]['Niv'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[3]['NomP'])){ echo $team2[3]['IVPV'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[3]['NomP'])){ echo $team2[3]['IVAttaque'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[3]['NomP'])){ echo $team2[3]['IVDefense'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[3]['NomP'])){ echo $team2[3]['IVAttSpe'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[3]['NomP'])){ echo $team2[3]['IVDefSpe'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[3]['NomP'])){ echo $team2[3]['IVVitesse'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[3]['NomP'])){ echo $team2[3]['PVmax'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[3]['NomP'])){ echo $team2[3]['Vitesse'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[3]['NomP'])){ echo $team2[3]['Attaque'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[3]['NomP'])){ echo $team2[3]['Defense'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[3]['NomP'])){ echo $team2[3]['AttSpe'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[3]['NomP'])){ echo $team2[3]['DefSPe'];}else{echo '"NULL"';}?>,
 				<?php if (isset($team2[3]['gainxp'])){ echo $team2[3]['gainxp'];}else{ echo 0;} ?>,
 				<?php if(isset($team2[3]['NomP'])){ echo $team2[3]['XPVaincu'];}else{echo '"NULL"';}?>,
 				"<?php if(isset($team2[3]['NomP'])){ echo $team2[3]['Courbe'];}else{echo 'NULL';}?>",
 				<?php if(isset($team2[3]['NomP'])){ echo $team2[3]['XP'];}else{echo '"NULL"';}?>),
 		new Pokemon(
 			"<?php if(isset($team2[4]['NomP'])){
 				echo utf8_encode($team2[4]['NomP']);}else{ echo 'NULL';}  ?>", 
 				"<?php if(isset($team2[4]['NomP'])){
 					echo $team2[4]['PVact'];}else{echo 'NULL';}	?>",
 				new Cap("<?php if(isset($team2[4]['NomP'])){echo $cappoke25['CAP1']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[4]['NomP'])){echo $cappoke25['CAP1']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[4]['NomP'])){echo $cappoke25['CAP1']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team2[4]['NomP'])){if($cappoke25['CAP1']['Puissance'] == NULL){echo '""';} else{echo $cappoke25['CAP1']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team2[4]['NomP'])){if($cappoke25['CAP1']['Precis'] == NULL){echo '""';} else{echo $cappoke25['CAP1']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team2[4]['NomP'])){if($cappoke25['CAP1']['PP'] == NULL){echo '""';} else{echo $cappoke25['CAP1']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team2[4]['NomP'])){echo $cappoke25['CAP1']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[4]['NomP'])){echo $cappoke25['CAP1']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[4]['NomP'])){echo $cappoke25['CAP1']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team2[4]['NomP'])){if($cappoke25['CAP1']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke25['CAP1']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team2[4]['NomP'])){echo $cappoke25['CAP1']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[4]['NomP'])){echo $cappoke25['CAP1']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team2[4]['NomP'])){echo $cappoke25['CAP2']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[4]['NomP'])){echo $cappoke25['CAP2']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[4]['NomP'])){echo $cappoke25['CAP2']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team2[4]['NomP'])){if($cappoke25['CAP2']['Puissance'] == NULL){echo '""';} else{echo $cappoke25['CAP2']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team2[4]['NomP'])){if($cappoke25['CAP2']['Precis'] == NULL){echo '""';} else{echo $cappoke25['CAP2']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team2[4]['NomP'])){if($cappoke25['CAP2']['PP'] == NULL){echo '""';} else{echo $cappoke25['CAP2']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team2[4]['NomP'])){echo $cappoke25['CAP2']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[4]['NomP'])){echo $cappoke25['CAP2']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[4]['NomP'])){echo $cappoke25['CAP2']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team2[4]['NomP'])){if($cappoke25['CAP2']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke25['CAP2']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team2[4]['NomP'])){echo $cappoke25['CAP2']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[4]['NomP'])){echo $cappoke25['CAP2']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team2[4]['NomP'])){echo $cappoke25['CAP3']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[4]['NomP'])){echo $cappoke25['CAP3']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[4]['NomP'])){echo $cappoke25['CAP3']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team2[4]['NomP'])){if($cappoke25['CAP3']['Puissance'] == NULL){echo '""';} else{echo $cappoke25['CAP3']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team2[4]['NomP'])){if($cappoke25['CAP3']['Precis'] == NULL){echo '""';} else{echo $cappoke25['CAP3']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team2[4]['NomP'])){if($cappoke25['CAP3']['PP'] == NULL){echo '""';} else{echo $cappoke25['CAP3']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team2[4]['NomP'])){echo $cappoke25['CAP3']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[4]['NomP'])){echo $cappoke25['CAP3']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[4]['NomP'])){echo $cappoke25['CAP3']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team2[4]['NomP'])){if($cappoke25['CAP3']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke25['CAP3']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team2[4]['NomP'])){echo $cappoke25['CAP3']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[4]['NomP'])){echo $cappoke25['CAP3']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team2[4]['NomP'])){echo $cappoke25['CAP4']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[4]['NomP'])){echo $cappoke25['CAP4']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[4]['NomP'])){echo $cappoke25['CAP4']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team2[4]['NomP'])){if($cappoke25['CAP4']['Puissance'] == NULL){echo '""';} else{echo $cappoke25['CAP4']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team2[4]['NomP'])){if($cappoke25['CAP4']['Precis'] == NULL){echo '""';} else{echo $cappoke25['CAP4']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team2[4]['NomP'])){if($cappoke25['CAP4']['PP'] == NULL){echo '""';} else{echo $cappoke25['CAP4']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team2[4]['NomP'])){echo $cappoke25['CAP4']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[4]['NomP'])){echo $cappoke25['CAP4']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[4]['NomP'])){echo $cappoke25['CAP4']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team2[4]['NomP'])){if($cappoke25['CAP4']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke25['CAP4']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team2[4]['NomP'])){echo $cappoke25['CAP4']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team2[4]['NomP'])){echo $cappoke25['CAP4']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				<?php if(isset($team2[4]['NomP'])){ echo $team2[4]['ID'];}else{echo '"NULL"';}?>,
 				"<?php if(isset($team2[4]['NomP'])){ echo $team2[4]['TypeU'];}else{echo 'NULL';}?>",
 				"<?php if(isset($team2[4]['NomP'])){ echo $team2[4]['TypeD'];}else{echo 'NULL';}?>",
 				<?php if(isset($team2[4]['NomP'])){ echo $team2[4]['Niv'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[4]['NomP'])){ echo $team2[4]['IVPV'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[4]['NomP'])){ echo $team2[4]['IVAttaque'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[4]['NomP'])){ echo $team2[4]['IVDefense'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[4]['NomP'])){ echo $team2[4]['IVAttSpe'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[4]['NomP'])){ echo $team2[4]['IVDefSpe'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[4]['NomP'])){ echo $team2[4]['IVVitesse'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[4]['NomP'])){ echo $team2[4]['PVmax'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[4]['NomP'])){ echo $team2[4]['Vitesse'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[4]['NomP'])){ echo $team2[4]['Attaque'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[4]['NomP'])){ echo $team2[4]['Defense'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[4]['NomP'])){ echo $team2[4]['AttSpe'];}else{echo '"NULL"';}?>,
 				<?php if(isset($team2[4]['NomP'])){ echo $team2[4]['DefSPe'];}else{echo '"NULL"';}?>,
 				<?php if (isset($team2[4]['gainxp'])){ echo $team2[4]['gainxp'];}else{ echo 0;} ?>,
 				<?php if(isset($team2[4]['NomP'])){ echo $team2[4]['XPVaincu'];}else{echo '"NULL"';}?>,
 				"<?php if(isset($team2[4]['NomP'])){ echo $team2[4]['Courbe'];}else{echo 'NULL';}?>",
 				<?php if(isset($team2[4]['NomP'])){ echo $team2[4]['XP'];}else{echo '"NULL"';}?>)
 		


 		);


 	var hps = document.getElementById("hps");
 	var hpj = document.getElementById("hpj");
 	var healthbar = document.querySelector('#healthj');
	 healthbar.value = pokemonjoueur.hp;
	var healthbars = document.querySelector('#healths');
	healthbars.value = pokemonjoueur2.hp;
	 //healthbars.value = pokemonsauvage.hp;
 	var tour = {x:
 		<?php
 		if (isset($_COOKIE['tour'])) {
 			echo $_COOKIE['tour'];
 		}
 		else{
 			echo 0;
 		}

 		?>

 	};
 	var checkpartie = setInterval(Partie,1000);

 
 		var nb_PokeBall = <?php echo $item['nbPokeBall'];?>;
 	var nb_potion = <?php echo $item['nbPotion'];?>;
 	var degata = null;
 	var info=null;
 	var role = "<?php echo $role;?>";
 	var joueur1 = "<?php echo $nomcompte;?>";
 	var joueur2 = "<?php echo $adv;?>";
 	function start(){
 		Set_cap(pokemonjoueur);
 		checkhpj(pokemonjoueur);
 	
 		
 	}
 	

 	function set_info(){
 		if (role == "Adv") {
 			if (info['CHOIXH'] != null) {
 				jeu.choixa = info['CHOIXH'];
 				jeu.pokemonswapa = info['POKEMONSWAPH'];
 				jeu.attacka = pokemonjoueur2.cap[info['ATTACKH']];
 				jeu.objeta = info['OBJETH'];
 			}
 			else{
 				return false;
 			}
 		}
 		else if (role == "Host") {
 			if (info['CHOIXA'] != null) {
 				jeu.choixa = info['CHOIXA'];
 				jeu.pokemonswapa = info['POKEMONSWAPA'];
 				jeu.attacka = pokemonjoueur2.cap[info['ATTACKA']];
 				jeu.objeta = info['OBJETA'];
 			}
 			else{
 				return false;
 			}
 		}
 		info = null;
 		return true;
 	}

 	function send_async() {

	     var xhr = new XMLHttpRequest();
	

	     xhr.open('POST', 'servermatch.php', true);
	  	console.log('Send async');
		 

	     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	     if (role == "Adv") {
	     	xhr.send("CHOIXA="+jeu.choixj+"&ATTACKA="+jeu.nb_attackj+"&POKEMONSWAPA="+jeu.pokemonswap+"&OBJETA="+jeu.objet+"&joueur="+joueur1);
	     }
	     else if (role == "Host") {
	     	console.log('Send async HOST');
	     	console.log("CHOIXH="+jeu.choixj+"&ATTACKH="+jeu.nb_attackj+"&POKEMONSWAPH="+jeu.pokemonswap+"&OBJETH='"+jeu.objet+"'&joueur="+joueur1);
	     	xhr.send("CHOIXH="+jeu.choixj+"&ATTACKH="+jeu.nb_attackj+"&POKEMONSWAPH="+jeu.pokemonswap+"&OBJETH='"+jeu.objet+"'&joueur="+joueur1);
	     }
	     
	 }

	 	function wait_info() {

	     var xhr = new XMLHttpRequest();
	

	     xhr.open('POST', 'servermatch.php', true);
	     xhr.addEventListener('readystatechange', function() {
		 if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
		    info = JSON.parse(xhr.responseText);
		    return  set_info();

		     
		 }
	     });

	     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	     if (role == "Adv") {
	     	xhr.send("infoa="+1+"&joueur="+joueur1);
	     }
	     else if (role == "Host") {
	     	xhr.send("infoh="+1+"&joueur="+joueur1);
	     }
	     
	 }

	 function wait_degat() {

	     var xhr = new XMLHttpRequest();
	

	     xhr.open('POST', 'servermatch.php', false);
	     xhr.addEventListener('readystatechange', function() {
		 if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
		     return JSON.parse(xhr.responseText);
		    
		     
		 }
	     });

	     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	     if (role == "Adv") {
	     	xhr.send("degata="+1+"&joueur="+joueur1);
	     }
	     else if (role == "Host") {
	     	xhr.send("degath="+1+"&joueur="+joueur1);
	     }
	    
	     
	 }

	 function send_degat(degat) {

	     var xhr = new XMLHttpRequest();
	

	     xhr.open('POST', 'servermatch.php', true);
	   

	     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	     if (role == "Adv") {
	     	xhr.send("degataa="+degat+"&joueur="+joueur1);
	     }
	     else if (role == "Host") {
	     	xhr.send("degathh="+degat+"&joueur="+joueur1);
	     }
	 }
	     


 	/*function Catch(){
 		window.location="catch.php";
 	}*/
 	function setAttaquej(attack,nb){
 		jeu.choixj = 1;
 		jeu.attackj = attack;
 		jeu.nb_attackj = nb;
 		send_async();
 	}


 	function Set_cap(pokemonjoueur){
 		let bouton;
 		let li;
 		let elem = document.createElement('ul');
 		elem.id = "cap";
 		document.body.appendChild(elem);
 		for (var i = 0; i < 4; i=i+1) {
 			li = document.createElement('li');
 			bouton= document.createElement('input');
 			bouton.id = "cap"+i;
 			bouton.type = "button";
 			bouton.value = pokemonjoueur.cap[i].noma;
 			if(bouton.value != ""){
 				bouton.addEventListener('click',setAttaquej.bind(null,pokemonjoueur.cap[i],i));
 			}
 			elem.appendChild(li);
 			li.appendChild(bouton);
 		}
 		
 
 		set_TextBar();
 		set_Equipe();
 		set_Sac();

 	}

 	function set_Objet(objet){
 		jeu.choixj = 4;
 		jeu.objet= objet;
 		let p = document.getElementById("potion");
 		nb_potion = nb_potion -1;
 		p.value = objet+ " x"+nb_potion;
 		if (nb_potion == 0) {
 			
 			p.removeEventListener("click", set_Objet.bind(null,"Potion"));

 		}

 	}

 	function set_Sac(){
 		let bouton;
 		let li;
 		let elem = document.createElement('ul');
 		elem.id = "sac";
 		document.body.appendChild(elem);
 		li = document.createElement('li');
 		bouton= document.createElement('input');
 		bouton.id = "potion";
 		bouton.type = "button";
 		bouton.value ="Potion x"+nb_potion;
 		if (nb_potion != 0) {bouton.addEventListener('click',set_Objet.bind(null,"Potion"));}
 		
 		elem.appendChild(li);
 		li.appendChild(bouton);

 	}

 	function set_TextBar(){
 		let elem = document.createElement('p');
 		elem.id = "textbox";
 		document.body.appendChild(elem);		
 	}

 	function setSwap(a){
 		jeu.choixj = 2;
 		jeu.pokemonswap = a;
 		send_async();
 	}

 	function setSwap2(a){
 		jeu.choixa = 2;
 		jeu.pokemonswap2 = a;
 	}

 	function set_Equipe(){
 		let bouton;
 		let li;
 		let elem = document.createElement('ul');
 		elem.id = "equipe";
 		document.body.appendChild(elem);
 		for (var i = 0; i < 5; i=i+1) {
 			if (equipejoueur.Poke[i].nom != 'NULL') {
 			li = document.createElement('li');
 			bouton= document.createElement('input');
 			bouton.id = "poke"+i;
 			bouton.type = "button";
 			bouton.value = equipejoueur.Poke[i].nom;
 			bouton.classList.add("equipejoueur");
 			bouton.addEventListener('click',setSwap.bind(null,i));
 			elem.appendChild(li);
 			li.appendChild(bouton);
 			}
 		}
 		
 	}

 	

 	function checkhpj(pokemonjoueur){
	 
 		if (pokemonjoueur.hp == 0) {
 			for (var i = 0; i < 5; i=i+1) {
 				if (equipejoueur.Poke[i].hp != 0 && equipejoueur.Poke[i].nom != 'NULL') {

 					ClearText();
 					WriteText(pokemonjoueur.nom+" est KO. Choisissez un autre Pokemon");

 					DisableCap();
 					i=6;
 				}
 				if (i==4 && equipejoueur.Poke[i].hp == 0) {
 					DisableAll();
 					ClearText();
 					WriteText("Plus de Pokemon en état de combattre");
 					
 					i=6;

 				}
 				else if (i==4 && equipejoueur.Poke[i].nom == 'NULL') {
 					DisableAll();
 					ClearText();
 					WriteText("Plus de Pokemon en état de combattre");
 					
 					i=6;
 				}
 			}



 		}
 		
 	}

 	function checkhpj2(pokemonjoueur){
	 
 		if (pokemonjoueur.hp == 0) {
 			for (var i = 0; i < 5; i=i+1) {
 				if (equipejoueur2.Poke[i].hp != 0 && equipejoueur2.Poke[i].nom != 'NULL') {

 					ClearText();
 					WriteText(pokemonjoueur2.nom+" est KO. L'Adversaire choisis un autre pokemon");

 					DisableCap();
 					i=6;
 				}
 				if (i==4 && equipejoueur2.Poke[i].hp == 0) {
 					DisableAll();
 					ClearText();
 					WriteText("L'Adversaire n'a plus de Pokemon en état de combattre");
 					
 					i=6;

 				}
 				else if (i==4 && equipejoueur2.Poke[i].nom == 'NULL') {
 					DisableAll();
 					ClearText();
 					WriteText("L'Adversaire n'a plus de Pokemon en état de combattre");
 					
 					i=6;
 				}
 			}



 		}
 		
 	}

 	

 	function Animation(text,char){
 		let p = document.getElementById("textbox");
 		p.innerHTML = p.innerHTML + text.charAt(char);
 		if (char<text.length) {setTimeout(function(){Animation(text,char+1);},50);}

 	}

 	function WriteText(text){
 		Animation(text,0);

 	}

 	function ClearText(){
 		let p = document.getElementById("textbox");
 		p.innerHTML ="";
 	}

 	function Reduction(object,a,cible){
 		if (object.textContent - 1 != -1) {
 		object.textContent = object.textContent -1;
 	
 		if (cible.idpoke == pokemonjoueur.idpoke) {healthbar.value = healthbar.value-1;}
 		else if (cible.idpoke == pokemonjoueur2.idpoke) {healthbars.value = healthbars.value-1;}
 		
 		if (a > 1) {

 			setTimeout(function(){Reduction(object,a-1,cible);},50)}
 		}
 		
 	}

 	function Augmentation(object,a,cible,max){
 		if (object.textContent + 1 != max) {
 		
 		object.textContent = parseInt(object.textContent, 10) +1;
 	
 		if (cible.idpoke == pokemonjoueur.idpoke) {healthbar.value = healthbar.value+1;}
 		else if (cible.idpoke == pokemonjoueur2.idpoke) {healthbars.value = healthbars.value+1;}
 		
 		if (a > 1 && max != object.textContent) {

 			setTimeout(function(){Augmentation(object,a-1,cible,max);},50)}
 		}
 		
 	}


		function fadeIn(el){
		  el.classList.add('show');
		  el.classList.remove('hide');  
		}

		function fadeOut(el){
		  el.classList.add('hide');
		  el.classList.remove('show');
		}


 	function AnimationAttackS(){
 		let img = document.getElementById('pokeimg');
 		img.style.webkitAnimationPlayState="running";
		setTimeout(function(){let img = document.getElementById('pokeimg');img.style.webkitAnimationPlayState="paused";img.opacity =1},2000);

 		
 		



 	}

 	function AnimationAttackJ(){
 		let img = document.getElementById('pokeimgs');
 		
		img.style.webkitAnimationPlayState="running";
		setTimeout(function(){let img = document.getElementById('pokeimgs');img.style.webkitAnimationPlayState="paused";img.opacity =1},2000);
 		
 		



 	}

 	function DisableAll(){
 		let cap = [document.getElementById('cap0'),document.getElementById('cap1'),document.getElementById('cap2'),document.getElementById('cap3')];
 		let equipej = document.getElementsByClassName("equipejoueur");
 		let  poke = document.getElementById("PokeBall");
 		let potion = document.getElementById("potion");
 		for (var i = 0; i < 4; i=i+1) {
 			cap[i].disabled = true;
 		}
 		for (var i = 0; i < equipej.length; i=i+1) {
 			equipej[i].disabled = true;
 		}
 		//poke.disabled = true;
 		potion.disabled =true;

 	}

 	function DisableCap(){
 		let cap = [document.getElementById('cap0'),document.getElementById('cap1'),document.getElementById('cap2'),document.getElementById('cap3')];
 		let  poke = document.getElementById("PokeBall");
 		let potion = document.getElementById("potion");
 		for (var i = 0; i < 4; i=i+1) {
 			cap[i].disabled = true;
 		}
 		//poke.disabled = true;
 		potion.disabled =true;
 		

 	}

 	function AbleAll(){
 		let cap = [document.getElementById('cap0'),document.getElementById('cap1'),document.getElementById('cap2'),document.getElementById('cap3')];
 		let equipej = document.getElementsByClassName("equipejoueur");
 		let  poke = document.getElementById("PokeBall");
 		let potion = document.getElementById("potion");
 		for (var i = 0; i < 4; i=i+1) {
 			cap[i].disabled = false;
 		}
 		for (var i = 0; i < equipej.length; i=i+1) {
 			equipej[i].disabled = false;
 		}
 		//poke.disabled = false;
 		potion.disabled =false;

 	}

 	function AttaqueJ(object,damage,cible,attack){
 		
 		if (tour.x == 0) {
 		
 		ClearText();
 		WriteText(pokemonjoueur.nom+" utilise "+attack);
 		if (pokemonjoueur2.hp-damage <= 0) {pokemonjoueur2.hp = 0}
 		else{
 		pokemonjoueur2.hp = pokemonjoueur2.hp - damage;}
 		setTimeout(function(){
 			AnimationAttackJ();
 			Reduction(object,damage,cible);
 			
 		},2000);
 	
 		
 	}
}
 	function SoinJ(object,soin,cible,item){
 		
 		if (tour.x == 0) {
 		
 		ClearText();
 		WriteText("Vous utilisez l'objet "+ item);
 		if (pokemonjoueur.hp+soin >= pokemonjoueur.pvmax) {pokemonjoueur.hp = pokemonjoueur.pvmax}
 		else{
 		pokemonjoueur.hp = pokemonjoueur.hp + soin;}
 		setTimeout(function(){
 			Augmentation(object,soin,cible,pokemonjoueur.pvmax);
 			
 		},2000);
 	
 		
 	}
 }

 	function SoinA(object,soin,cible,item){
 		
 		if (tour.x == 0) {
 		
 		ClearText();
 		WriteText("Vous utilisez l'objet "+ item);
 		if (pokemonjoueur2.hp+soin >= pokemonjoueur2.pvmax) {pokemonjoueur2.hp = pokemonjoueur2.pvmax}
 		else{
 		pokemonjoueur2.hp = pokemonjoueur2.hp + soin;}
 		setTimeout(function(){
 			Augmentation(object,soin,cible,pokemonjoueur2.pvmax);
 			
 		},2000);
 	
 		
 	}

 	}
	function getRandomArbitrary(min, max) {
  		return Math.random() * (max - min) + min;
	}

 	function CalculDegat(attack,lanceur,cible){
 		let Stab = 1;
 		let defense = 1
 		let attaque = 1;
 		if (attack.typa == lanceur.typu || attack.typa == lanceur.typed) {
 			Stab = 1.5;
 		}
 		if (cible.typed != "") {
 			defense = tabt.tab[cible.typeu].tab['Attaque'+attack.typa]*tabt.tab[cible.typed].tab['Attaque'+attack.typa];
 			attaque = tabt.tab[attack.typa].tab['Defense'+attack.typa]*tabt.tab[attack.typa].tab['Defense'+attack.typa];
 			console.log("TypeUn: "+tabt.tab[attack.typa].tab['Defense'+attack.typa]+" typed : "+tabt.tab[attack.typa].tab['Defense'+attack.typa]);
 		}
 		else{
 			defense = tabt.tab[cible.typeu].tab['Attaque'+attack.typa];
 			attaque = tabt.tab[cible.typeu].tab['Attaque'+attack.typa];

 		}
 		let cm = getRandomArbitrary(0.85, 1)*attaque;
 		let degatt = lanceur.niv*0.4+2;
 		let degatt2 = degatt * lanceur.attaque*attack.puissance*Stab;
 		let degatb = cible.defense * 50*defense;
 		let degatd = degatt2 / degatb +2;
 		let degat = degatd * cm;
 		console.log("Attaque : "+attack.noma+" attaque : "+attaque+" defense "+defense+" degat " + degat);
 		if(degat < 1){
 			degat = 1;
 		}
 		return Math.floor(degat);



 	}
 	function resetJeu(){
 		jeu.choixj = 0;
 		jeu.choixa = 0;
 		jeu.attackj = 0;
 		jeu.nb_attackj = 0;
 		jeu.attacka = null;
 		jeu.pokemonswap = 0;
 		jeu.pokemonswap2 = null;
 		jeu.jeufin = false;
 		jeu.objet = "";
 		jeu.objet2 = null;
 		AbleAll();


 	}

 	function getRandomInt(max) {
  		return Math.floor(Math.random() * Math.floor(max));
}

 	

 	function Partie(){
 		console.log('partie');
 		var degatj=0;
 	
 		var pb;
 		if(!jeu.jeufin){
 			degata=null;
 			degatj=0;
 			
 			if (jeu.choixa == 0) {

 				wait_info();
 			}
 				
 			
 			if (jeu.choixa == 1 && jeu.choixj == 1) {
 				DisableAll();
 				jeu.choixj = 0;
 				jeu.choixa = 0;
 				pokemonjoueur.gainxp = 1;
 				if (jeu.attackj.classea == "Physique" || jeu.attackj.classea == "Speciale") {
 					degatj = CalculDegat(jeu.attackj,pokemonjoueur,pokemonjoueur2);
 					send_degat(degatj);
 			
 				}
 				if (jeu.attacka.classea == "Physique" || jeu.attacka.classea == "Speciale") {
 				
 					degata = wait_degat();
 					console.log("degat:"+degata);
 					
 			
 				}
 			
 			
 			
 				if (pokemonjoueur.vitesse >= pokemonjoueur2.vitesse) {
 					setTimeout(function(){
 						AttaqueJ(hps,degatj,pokemonjoueur2,jeu.attackj.noma);
 						
 						setTimeout(function(){if (pokemonjoueur2.hp  > 0) {AttaqueA(hpj,degata,pokemonjoueur,jeu.attacka.noma);};setTimeout(function(){resetJeu();ClearText();checkhpj(pokemonjoueur);checkhpj2(pokemonjoueur2);},4000);},2000);
 						
 						
 						
 					},2000);
 					
 				}
 				else {
 					setTimeout(function(){
 						AttaqueA(hpj,degata,pokemonjoueur,jeu.attacka.noma);
 						setTimeout(function(){if (pokemonjoueur.hp  > 0) {AttaqueJ(hps,degatj,pokemonjoueur2,jeu.attackj.noma)};
 						setTimeout(function(){resetJeu();ClearText();checkhpj(pokemonjoueur);checkhp(pokemonsauvage);},4000);
 						},2000);
 					},2000);

 				}

 				
 			}
 			else if (jeu.choixa == 1 && jeu.choixj == 2) {
 				DisableAll();
 				if (jeu.attacka.classea == "Physique" || jeu.attacka.classea == "Speciale") {
 					while(degata == null){
 					degata = wait_degat();
 					}
 			
 				}
 				jeu.choixj = 0;
 				jeu.choixa = 0;
 			
 				setTimeout(function(){
 						Swap(jeu.pokemonswap);
 						setTimeout(function(){if (pokemonjoueur.hp  > 0) {AttaqueA(hpj,degata,pokemonjoueur,jeu.attacka.noma);}
 						setTimeout(function(){resetJeu();ClearText();checkhpj(pokemonjoueur);checkhpj2(pokemonjoueur2);},4000);
 						},2000);
 					},2000);

 			}
 			else if (jeu.choixa == 2 && jeu.choixj == 1) {
 				DisableAll();
 				jeu.choixj = 0;
 				jeu.choixa = 0;
 				if (jeu.attackj.classea == "Physique" || jeu.attackj.classea == "Speciale") {
 					degatj = CalculDegat(jeu.attackj,pokemonjoueur,pokemonjoueur2);
 					send_degat(degatj);
 					//degatj = 20;
 			
 				}
 				setTimeout(function(){
 						Swap2(jeu.pokemonswap2);
 						setTimeout(function(){if (pokemonjoueur2.hp  > 0) {AttaqueJ(hps,degatj,pokemonjoueur2,jeu.attackj.noma);}
 						setTimeout(function(){resetJeu();ClearText();checkhpj(pokemonjoueur);checkhpj2(pokemonjoueur2);},4000);
 						},2000);
 					},2000);

 			}
 			else if (jeu.choixa == 2 && jeu.choixj == 2) {
 				DisableAll();
 				jeu.choixj = 0;
 				jeu.choixa = 0;
 				setTimeout(function(){
 						Swap(jeu.pokemonswap);
 						
 						setTimeout(function(){Swap2(jeu.pokemonswap2);
 						setTimeout(function(){resetJeu();ClearText();checkhpj(pokemonjoueur);checkhpj2(pokemonjoueur2);},4000);
 						},2000);
 					},2000);

 			}
 			
 			info = null;
 			//savegame();

 		}
 	}

 

 



 	function SwapPoke(a){
 		let Poke = pokemonjoueur;
 		pokemonjoueur = equipejoueur.Poke[a];
 		equipejoueur.Poke[a] = Poke;
 		
 	}

 	function SwapPoke2(a){
 		let Poke = pokemonjoueur2;
 		pokemonjoueur2 = equipejoueur2.Poke[a];
 		equipejoueur2.Poke[a] = Poke;
 		
 	}

 	function SwapText(a){
 		let cap = [document.getElementById('cap0'),document.getElementById('cap1'),document.getElementById('cap2'),document.getElementById('cap3')];
	 		let input = document.getElementById('poke'+a);
	 		let name = document.getElementById('nompoke');
	 		let img = document.getElementById('pokeimg');
	 		
	 		img.src = "img/"+pokemonjoueur.nom+".png";

	 		name.innerHTML = pokemonjoueur.nom+" Niv "+pokemonjoueur.niv;
	 		input.value = equipejoueur.Poke[a].nom;
	 		hpj.innerHTML = pokemonjoueur.hp;
	 		healthbar.value = pokemonjoueur.hp;
	 		healthbar.max = pokemonjoueur.pvmax;
	 		cap[0].value = pokemonjoueur.cap[0].noma;
	 		cap[1].value = pokemonjoueur.cap[1].noma;
	 		cap[2].value = pokemonjoueur.cap[2].noma;
	 		cap[3].value = pokemonjoueur.cap[3].noma;
	 		for (var i = 0; i < 4; i=i+1) {
 		
 			

 			if(cap[i].value != ""){
 				cap[i].addEventListener('click',setAttaquej.bind(null,pokemonjoueur.cap[i]));
 			}
 			
 		}

 	}

 	function SwapText2(a){
 		
	
	 		let name = document.getElementById('nompoke2');
	 		let img = document.getElementById('pokeimg');
	 		
	 		img.src = "img/"+pokemonjoueur2.nom+".png";

	 		name.innerHTML = pokemonjoueur2.nom+" Niv "+pokemonjoueur2.niv;
	 
	 		hps.innerHTML = pokemonjoueur2.hp;
	 		healthbars.value = pokemonjoueur2.hp;
	 		healthbars.max = pokemonjoueur2.pvmax;
	 		

 	}

 	function Swap(a){
 		

 			ClearText();
 			if (equipejoueur.Poke[a].hp != 0) {
 			WriteText("Changement de Pokemon");
	 		setTimeout(function(){SwapPoke(a);},1000);
	 		setTimeout(function(){SwapText(a)},1000);
	 		
	 
	 		}
	 		else {

	 			WriteText("Ce pokemon est KO");

	 			

	 		}
	 		
 		
 		
 		
 	}


 	function Swap(a){
 		

 			ClearText();
 			if (equipejoueur.Poke[a].hp != 0) {
 			WriteText("Changement de Pokemon");
	 		setTimeout(function(){SwapPoke(a);},1000);
	 		setTimeout(function(){SwapText(a)},1000);
	 		
	 
	 		}
	 		else {

	 			WriteText("Ce pokemon est KO");

	 			

	 		}
	 		
 		
 		
 		
 	}

 	function Swap2(a){
 		

 			ClearText();
 			if (equipejoueur2.Poke[a].hp != 0) {
 			WriteText("Changement de Pokemon");
	 		setTimeout(function(){SwapPoke2(a);},1000);
	 		setTimeout(function(){SwapText2(a)},1000);
	 		
	 
	 		}
	 		else {

	 			WriteText("Ce pokemon est KO");

	 			

	 		}
	 		
 		
 		
 		
 	}

 	function Swapko(a){
 		
 	
 			ClearText();
 			WriteText("Changement de Pokemon");
 			SwapPoke(a);
 			SwapText(a);
 			AbleAll();
	 		
	 		
	 		
 		
 		
 		
 	}

 	function AttaqueA(object,damage,cible,attack){
 		ClearText();
 		WriteText(pokemonjoueur2.nom+" sauvage utilise "+attack);
 		if (pokemonjoueur.hp-damage <= 0) {pokemonjoueur.hp = 0}
 		else{
 		pokemonjoueur.hp = pokemonjoueur.hp - damage;}
 		setTimeout(function(){Reduction(object,damage,cible);
 			AnimationAttackS();},2000);
 		
 	
 	}
 	function CheckLevelUp(a){
 		let courbe="";
 		let xp ="";
 		let niveau =1;
 		if (a == 0) {
 			xp = pokemonjoueur.xp + pokemonjoueur.xpvaincu;
 			courbe = pokemonjoueur.courbe;
 			niveau = pokemonjoueur.niv;
 			//console.log(courbe);

 		}
 		else{
 			xp = equipejoueur.Poke[a-1].xp + equipejoueur.Poke[a-1].xpvaincu;
 			courbe = equipejoueur.Poke[a-1].courbe;
 			niveau = equipejoueur.Poke[a-1].courbe;

 		}
 		if (courbe == "Moyen-") {
			xpbesoin = Math.pow(niveau,3);
		}
		else if (courbe == "Moyen+") {
			xpbesoin = 1.2*Math.pow(niveau,3)-(15*Math.pow(niveau,2))+100*niveau-140;
		}
		else if (courbe == "Rapide") {
			xpbesoin = Math.pow(niveau,3)*0.8;
		}
		else{
			xpbesoin = Math.pow(niveau,3)*1.25;

		}

		if (xpbesoin <= xp) { return true;}
		else {return false;}
 	}

 	function WriteXp(a){
 		ClearText();
 		if (a == 0) {
 			WriteText(pokemonjoueur.nom+" gagne "+pokemonjoueur.xpvaincu+" XP");
 			if (CheckLevelUp(a)) {
 				setTimeout(function(){ClearText();WriteText(pokemonjoueur.nom+" a monté de niveau");
 				setTimeout(function(){WriteXp(a+1);},3000);
 				 },3000);}
 			
 			else{
 			setTimeout(function(){WriteXp(a+1);},3000);
 		
 			}
 		}
 		else if(a < 5){
 			if (equipejoueur.Poke[a-1].nom != null && equipejoueur.Poke[a-1].gainxp == 1) {
 					WriteText(equipejoueur.Poke[a-1].nom+" gagne "+equipejoueur.Poke[a-1].xpvaincu+" XP");
 					if (CheckLevelUp(a)) {
 						setTimeout(function(){ClearText();WriteText(pokemonjoueur.nom+" a monté de niveau");
 						setTimeout(function(){WriteXp(a+1);},3000);
 				 		},3000);}
 			
 					else{
 					setTimeout(function(){WriteXp(a+1);},3000);
 		
 			}
 					
 			
 			}
 			else {WriteXp(a+1);}

 			
 	
 		}
 		else{
 			setTimeout(function(){window.location="attaque.php";

 			
 		},1000);
 		}

 	}

 	function WriteXpC(a){
 		ClearText();
 		if (a == 0) {
 			WriteText(pokemonjoueur.nom+" gagne "+pokemonjoueur.xpvaincu+" XP");
 			if (CheckLevelUp(a)) {
 				setTimeout(function(){ClearText();WriteText(pokemonjoueur.nom+" a monté de niveau");
 				setTimeout(function(){WriteXpC(a+1);},3000);
 				 },3000);}
 			
 			else{
 			setTimeout(function(){WriteXpC(a+1);},3000);
 		
 			}
 		}
 		else if(a < 5){
 			if (equipejoueur.Poke[a-1].nom != null && equipejoueur.Poke[a-1].gainxp == 1) {
 					WriteText(equipejoueur.Poke[a-1].nom+" gagne "+equipejoueur.Poke[a-1].xpvaincu+" XP");
 					if (CheckLevelUp(a)) {
 						setTimeout(function(){ClearText();WriteText(pokemonjoueur.nom+" a monté de niveau");
 						setTimeout(function(){WriteXpC(a+1);},3000);
 				 		},3000);}
 			
 					else{
 					setTimeout(function(){WriteXpC(a+1);},3000);
 		
 			}
 					
 			
 			}
 			else {WriteXpC(a+1);}

 			
 	
 		}
 		else{
 			setTimeout(function(){window.location="catch.php";

 			
 		},1000);
 		}

 	}

 	function KO(){
 		clearTimeout(checktour);
 		ClearText();
 		WriteText(pokemonjoueur2.nom+" a été battu...");
 		setTimeout(function(){WriteXp(0);

 			
 		},3000);

 	
 		
 	}
 	




 	function set_cookie(cookiename, cookievalue, hours) {
	    var date = new Date();
	    date.setTime(date.getTime() + Number(hours) * 3600 * 1000);
	    document.cookie = cookiename + "=" + cookievalue + "; path=/;expires = " + date.toGMTString();

}

	function savegame(){
		set_cookie('pokemonjoueur[ID]',pokemonjoueur.idpoke,24);
		set_cookie('pokemonjoueur[HP]',pokemonjoueur.hp,24);
		set_cookie('pokemonjoueur[GAINXP]',pokemonjoueur.gainxp,24);
		set_cookie('pokemonjoueur2[ID]',pokemonjoueur2.idpoke,24);
		set_cookie('pokemonjoueur2[HP]',pokemonjoueur2.hp,24);
		set_cookie('pokemonjoueur2[GAINXP]',pokemonjoueur2.gainxp,24);

		for (var i = 0; i < 5; i=i+1) {
			set_cookie('team['+i+'][ID]',equipejoueur.Poke[i].idpoke,24);
			set_cookie('team['+i+'][HP]',equipejoueur.Poke[i].hp,24);
			set_cookie('team['+i+'][GAINXP]',equipejoueur.Poke[i].gainxp,24);
			
		}

		for (var i = 0; i < 5; i=i+1) {
			set_cookie('team2['+i+'][ID]',equipejoueur2.Poke[i].idpoke,24);
			set_cookie('team2['+i+'][HP]',equipejoueur2.Poke[i].hp,24);
			set_cookie('team2['+i+'][GAINXP]',equipejoueur2.Poke[i].gainxp,24);
			
		}
		set_cookie('tour',tour.x,24);
		set_cookie('nb_PokeBall',nb_PokeBall,24);
		set_cookie('nb_potion',nb_potion,24);
	}





 </script>
 </html>