<?php 
session_start();
include 'security.php';
include 'user.php';
if (!isset($_POST['chasse'])) {
	header("location: log.php");
}
if (isset($_COOKIE['idpokemonsauvage'])) {
	$idpokesauvage=$_COOKIE['idpokemonsauvage'];
}

 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title>Combat</title>
 	<link rel="stylesheet" type="text/css" href="style.css">
 </head>
 <body onload="start()">
 	
 	<div id='fenetre'>
 	
 	<?php 
 	if (!isset($_COOKIE['pokemonjoueur'])) {
 	
 	
 	echo "<div id='pokej'>";
 	$poke = Show_First_Pokemon_Available($nomcompte);
 	$hppoke = $poke['PVact'];
 	echo "<h2 id='hpj'>".$poke['PVact']."</h2>";
 	echo "<progress id='healthj' value='".$poke['PVact']."' max='".$poke['PVmax']."'></progress>";
 	echo "<img id='pokeimg'src='img/".NomDepuisId($poke['ID'])."droite.png'>";
 	echo "</div>";
 	$pokejoueur = Show_cap_by_id($poke['ID']);
 	$team = Show_other_poke($nomcompte,$poke['ID']);

 	}
 	else{


 		$hppoke = $_COOKIE['pokemonjoueur']['HP'];
 		$poke = $_COOKIE['pokemonjoueur']['ID'];
 		$poke = Get_pokemon($poke);
 		$pokejoueur = Show_cap_by_id($poke['ID']);
 		echo "<div id='pokej'><h2 id='nompoke'>".NomDepuisId($poke['ID'])."</h2>";

 		echo "<h2 id='hpj'>".$_COOKIE['pokemonjoueur']['HP']."</h2>";
 		echo "<progress id='healthj' value='".$hppoke."' max='".$poke['PVmax']."'></progress>";
 		echo "<img id='pokeimg'src='img/".NomDepuisId($poke['ID'])."droite.png'>";
 		echo "</div>";
 		$team = array();
 		for ($i=0; $i < 5; $i++) { 
 			if ($_COOKIE['team'][$i]['ID'] != 'NULL') {
 				$team[$i] = Get_pokemon($_COOKIE['team'][$i]['ID']);
 			}
 			
 		}

 		
 				
 		
 		}
 	
 	$cappoke1=null;
 	$cappoke2=null;
 	$cappoke3=null;
 	$cappoke4=null;
 	$cappoke5=null;
 	if (isset($team[0]['NomP'])) {
 		if ($team[0]['NomP']!='NULL') {
 			$cappoke1 = Show_cap_by_id($team[0]['ID'] );
 		}
 		
 	}
 	if (isset($team[1]['NomP'])) {
 		if ($team[1]['NomP']!='NULL') {
 			$cappoke2 = Show_cap_by_id($team[1]['ID'] );
 		}
 		
 	}
 	if (isset($team[2]['NomP'])) {
 		if ($team[2]['NomP']!='NULL') {
 			$cappoke3 = Show_cap_by_id($team[2]['ID'] );
 		}

 		
 	}
 	if (isset($team[3]['NomP'])) {
 		if ($team[3]['NomP']!='NULL') {
 			$cappoke4 = Show_cap_by_id($team[3]['ID'] );
 		}
 		
 	}
 	if (isset($team[4]['NomP'])) {
 		if ($team[4]['NomP']!='NULL') {
 			$cappoke5 = Show_cap_by_id($team[4]['ID'] );
 		}
 		
 	}

 	

 	
 	if (!isset($idpokesauvage)) {
 		$idpokesauvage = Pokemon_alea();
 	}
 	echo "<div id='pokes'>";
 	$pokemonsauvage = Show_cap_by_id($idpokesauvage);
 	$pokesauv = Get_pokemon($idpokesauvage);
 	Show_pokemon_by_id($idpokesauvage);
 	if (isset($_COOKIE['pokemonsauvage'])) {
 		$hpsauvage = $_COOKIE['pokemonsauvage']['HP'];
 	}
 	else{
 		$hpsauvage = $pokesauv['PVact'];
 	}
 	echo "<h2 id='hps'>".$hpsauvage."</h2>";
 	echo "<progress id='healths' value='".$hpsauvage."' max='".$pokesauv['PVmax']."'></progress>";
 	echo "<img id='pokeimgs'src='img/".NomDepuisId($idpokesauvage)."gauche.png'>";
 	echo "</div>";
 	$_SESSION['idpokemonsauvage']=$idpokesauvage;
 	setcookie("idpokemonsauvage",$idpokesauvage);
 	
 	/*if (isset($_COOKIE['item'])) {
 		foreach($_COOKIE['item'] as $e){
			echo $e,'<br />';
		}
 	}*/
 	 ?>
 </div>

 </body>
 <script type="text/javascript">

 	class Pokemon{
 		constructor(nom,hp,cap1,cap2,cap3,cap4,idpoke,typeu,typed,niv,ivpv,ivattaque,ivdefense,ivattspe,ivdefspe,ivvitesse,pvmax,vitesse,attaque,defense,attspe,defspe){
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
 			this.vitesse = vitesse;
 			this.attaque = attaque;
 			this.defense = defense;
 			this.attspe = attspe;
 			this.defspe = defspe;

 		
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
 			this.attackj = null;
 			this.attacka = null;
 			this.pokemonswap = null;
 			this.jeufin = false;
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
 		<?php echo $poke['DefSPe'] ?>

 		);

 	var pokemonsauvage = new Pokemon("<?php echo NomDepuisId($idpokesauvage) ?>",
 		<?php echo $hpsauvage ?>,
 		new Cap("<?php echo $pokemonsauvage['CAP1']['NomA'] ?>",
 			"<?php echo $pokemonsauvage['CAP1']['TypeA'] ?>",
 			"<?php echo $pokemonsauvage['CAP1']['ClasseA'] ?>",
 			<?php if($pokemonsauvage['CAP1']['Puissance'] == NULL){echo '""';} else{echo $pokemonsauvage['CAP1']['Puissance'];} ?>,
 			<?php if($pokemonsauvage['CAP1']['Precis'] == NULL){echo '""';} else{echo $pokemonsauvage['CAP1']['Precis'];} ?>,
 			<?php if($pokemonsauvage['CAP1']['PP'] == NULL){echo '""';} else{echo $pokemonsauvage['CAP1']['PP'];} ?>,
 			"<?php echo $pokemonsauvage['CAP1']['Effets'] ?>",
 			"<?php echo $pokemonsauvage['CAP1']['AjoutPV'] ?>",
 			"<?php echo $pokemonsauvage['CAP1']['RetirePV'] ?>",
 			<?php if($pokemonsauvage['CAP1']['NbAttaque'] == NULL){echo '""';} else{echo $pokemonsauvage['CAP1']['NbAttaque'];} ?>,
 			"<?php echo $pokemonsauvage['CAP1']['StatMBoost'] ?>",
 			"<?php echo $pokemonsauvage['CAP1']['StatANerf'] ?>"),
 		new Cap("<?php echo $pokemonsauvage['CAP2']['NomA'] ?>",
 			"<?php echo $pokemonsauvage['CAP2']['TypeA'] ?>",
 			"<?php echo $pokemonsauvage['CAP2']['ClasseA'] ?>",
 			<?php if($pokemonsauvage['CAP2']['Puissance'] == NULL){echo '""';} else{echo $pokemonsauvage['CAP2']['Puissance'];} ?>,
 			<?php if($pokemonsauvage['CAP2']['Precis'] == NULL){echo '""';} else{echo $pokemonsauvage['CAP2']['Precis'];} ?>,
 			<?php if($pokemonsauvage['CAP2']['PP'] == NULL){echo '""';} else{echo $pokemonsauvage['CAP2']['PP'];}  ?>,
 			"<?php echo $pokemonsauvage['CAP2']['Effets'] ?>",
 			"<?php echo $pokemonsauvage['CAP2']['AjoutPV'] ?>",
 			"<?php echo $pokemonsauvage['CAP2']['RetirePV'] ?>",
 			<?php if($pokemonsauvage['CAP2']['NbAttaque'] == NULL){echo '""';} else{echo $pokemonsauvage['CAP2']['NbAttaque'];} ?>,
 			"<?php echo $pokemonsauvage['CAP2']['StatMBoost'] ?>",
 			"<?php echo $pokemonsauvage['CAP2']['StatANerf'] ?>"),
 		new Cap("<?php echo $pokemonsauvage['CAP3']['NomA'] ?>",
 			"<?php echo $pokemonsauvage['CAP3']['TypeA'] ?>",
 			"<?php echo $pokemonsauvage['CAP3']['ClasseA'] ?>",
 			<?php if($pokemonsauvage['CAP3']['Puissance'] == NULL){echo '""';} else{echo $pokemonsauvage['CAP3']['Puissance'];} ?>,
 			<?php if($pokemonsauvage['CAP3']['Precis'] == NULL){echo '""';} else{echo $pokemonsauvage['CAP3']['Precis'];} ?>,
 			<?php if($pokemonsauvage['CAP3']['PP'] == NULL){echo '""';} else{echo $pokemonsauvage['CAP3']['PP'];}  ?>,
 			"<?php echo $pokemonsauvage['CAP3']['Effets'] ?>",
 			"<?php echo $pokemonsauvage['CAP3']['AjoutPV'] ?>",
 			"<?php echo $pokemonsauvage['CAP3']['RetirePV'] ?>",
 			<?php if($pokemonsauvage['CAP3']['NbAttaque'] == NULL){echo '""';} else{echo $pokemonsauvage['CAP3']['NbAttaque'];} ?>,
 			"<?php echo $pokemonsauvage['CAP3']['StatMBoost'] ?>",
 			"<?php echo $pokemonsauvage['CAP3']['StatANerf'] ?>"),
 		new Cap("<?php echo $pokemonsauvage['CAP4']['NomA'] ?>",
 			"<?php echo $pokemonsauvage['CAP4']['TypeA'] ?>",
 			"<?php echo $pokemonsauvage['CAP4']['ClasseA'] ?>",
 			<?php if($pokemonsauvage['CAP4']['Puissance'] == NULL){echo '""';} else{echo $pokemonsauvage['CAP4']['Puissance'];} ?>,
 			<?php if($pokemonsauvage['CAP4']['Precis'] == NULL){echo '""';} else{echo $pokemonsauvage['CAP4']['Precis'];} ?>,
 			<?php if($pokemonsauvage['CAP4']['PP'] == NULL){echo '""';} else{echo $pokemonsauvage['CAP4']['PP'];}  ?>,
 			"<?php echo $pokemonsauvage['CAP4']['Effets'] ?>",
 			"<?php echo $pokemonsauvage['CAP4']['AjoutPV'] ?>",
 			"<?php echo $pokemonsauvage['CAP4']['RetirePV'] ?>",
 			<?php if($pokemonsauvage['CAP4']['NbAttaque'] == NULL){echo '""';} else{echo $pokemonsauvage['CAP4']['NbAttaque'];} ?>,
 			"<?php echo $pokemonsauvage['CAP4']['StatMBoost'] ?>",
 			"<?php echo $pokemonsauvage['CAP4']['StatANerf'] ?>"),
 		<?php echo $idpokesauvage ?>,
 		"<?php echo $pokesauv['TypeU'] ?>",
 		"<?php echo $pokesauv['TypeD'] ?>",
 		<?php echo $pokesauv['Niv'] ?>,
 		<?php echo $pokesauv['IVPV'] ?>,
 		<?php echo $pokesauv['IVAttaque'] ?>,
 		<?php echo $pokesauv['IVDefense'] ?>,
 		<?php echo $pokesauv['IVAttSpe'] ?>,
 		<?php echo $pokesauv['IVDefSpe'] ?>,
 		<?php echo $pokesauv['IVVitesse'] ?>,
 		<?php echo $pokesauv['PVmax'] ?>,
 		<?php echo $pokesauv['Vitesse'] ?>,
 		<?php echo $pokesauv['Attaque'] ?>,
 		<?php echo $pokesauv['Defense'] ?>,
 		<?php echo $pokesauv['AttSpe'] ?>,
 		<?php echo $pokesauv['DefSPe'] ?>
 		);

 	var equipejoueur =  new Equipe(
 		new Pokemon(
 			"<?php if(isset($team[0]['NomP'])){
 				echo utf8_encode($team[0]['NomP']);}else{ echo 'NULL';}  ?>", 
 				"<?php if(isset($team[0]['NomP'])){
 					echo getHpById($team[0]['ID']);}else{echo 'NULL';}	?>",
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
 				<?php if(isset($team[0]['NomP'])){ echo $team[0]['DefSPe'];}else{echo '"NULL"';}?>),
 		new Pokemon(
 			"<?php if(isset($team[1]['NomP'])){
 				echo utf8_encode($team[1]['NomP']);}else{ echo 'NULL';}  ?>", 
 				"<?php if(isset($team[1]['NomP'])){
 					echo getHpById($team[1]['ID']);}else{echo 'NULL';}	?>",
 				new Cap("<?php if(isset($team[1]['NomP'])){echo $cappoke1['CAP1']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke1['CAP1']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke1['CAP1']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[1]['NomP'])){if($cappoke1['CAP1']['Puissance'] == NULL){echo '""';} else{echo $cappoke1['CAP1']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[1]['NomP'])){if($cappoke1['CAP1']['Precis'] == NULL){echo '""';} else{echo $cappoke1['CAP1']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[1]['NomP'])){if($cappoke1['CAP1']['PP'] == NULL){echo '""';} else{echo $cappoke1['CAP1']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke1['CAP1']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke1['CAP1']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke1['CAP1']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[1]['NomP'])){if($cappoke1['CAP1']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke1['CAP1']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke1['CAP1']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke1['CAP1']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team[1]['NomP'])){echo $cappoke1['CAP2']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke1['CAP2']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke1['CAP2']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[1]['NomP'])){if($cappoke1['CAP2']['Puissance'] == NULL){echo '""';} else{echo $cappoke1['CAP2']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[1]['NomP'])){if($cappoke1['CAP2']['Precis'] == NULL){echo '""';} else{echo $cappoke1['CAP2']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[1]['NomP'])){if($cappoke1['CAP2']['PP'] == NULL){echo '""';} else{echo $cappoke1['CAP2']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke1['CAP2']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke1['CAP2']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke1['CAP2']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[1]['NomP'])){if($cappoke1['CAP2']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke1['CAP2']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke1['CAP2']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke1['CAP2']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team[1]['NomP'])){echo $cappoke1['CAP3']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke1['CAP3']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke1['CAP3']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[1]['NomP'])){if($cappoke1['CAP3']['Puissance'] == NULL){echo '""';} else{echo $cappoke1['CAP3']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[1]['NomP'])){if($cappoke1['CAP3']['Precis'] == NULL){echo '""';} else{echo $cappoke1['CAP3']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[1]['NomP'])){if($cappoke1['CAP3']['PP'] == NULL){echo '""';} else{echo $cappoke1['CAP3']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke1['CAP3']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke1['CAP3']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke1['CAP3']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[1]['NomP'])){if($cappoke1['CAP3']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke1['CAP3']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke1['CAP3']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke1['CAP3']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team[1]['NomP'])){echo $cappoke1['CAP4']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke1['CAP4']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke1['CAP4']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[1]['NomP'])){if($cappoke1['CAP4']['Puissance'] == NULL){echo '""';} else{echo $cappoke1['CAP4']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[1]['NomP'])){if($cappoke1['CAP4']['Precis'] == NULL){echo '""';} else{echo $cappoke1['CAP4']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[1]['NomP'])){if($cappoke1['CAP4']['PP'] == NULL){echo '""';} else{echo $cappoke1['CAP4']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke1['CAP4']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke1['CAP4']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke1['CAP4']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[1]['NomP'])){if($cappoke1['CAP4']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke1['CAP4']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke1['CAP4']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[1]['NomP'])){echo $cappoke1['CAP4']['StatANerf'];}else{ echo 'NULL';} ?>"),
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
 				<?php if(isset($team[1]['NomP'])){ echo $team[1]['DefSPe'];}else{echo '"NULL"';}?> ),
 		new Pokemon(
 			"<?php if(isset($team[2]['NomP'])){
 				echo utf8_encode($team[2]['NomP']);}else{ echo 'NULL';}  ?>", 
 				"<?php if(isset($team[2]['NomP'])){
 					echo getHpById($team[2]['ID']);}else{echo 'NULL';}	?>",
 				new Cap("<?php if(isset($team[2]['NomP'])){echo $cappoke1['CAP1']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke1['CAP1']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke1['CAP1']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[2]['NomP'])){if($cappoke1['CAP1']['Puissance'] == NULL){echo '""';} else{echo $cappoke1['CAP1']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[2]['NomP'])){if($cappoke1['CAP1']['Precis'] == NULL){echo '""';} else{echo $cappoke1['CAP1']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[2]['NomP'])){if($cappoke1['CAP1']['PP'] == NULL){echo '""';} else{echo $cappoke1['CAP1']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke1['CAP1']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke1['CAP1']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke1['CAP1']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[2]['NomP'])){if($cappoke1['CAP1']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke1['CAP1']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke1['CAP1']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke1['CAP1']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team[2]['NomP'])){echo $cappoke1['CAP2']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke1['CAP2']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke1['CAP2']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[2]['NomP'])){if($cappoke1['CAP2']['Puissance'] == NULL){echo '""';} else{echo $cappoke1['CAP2']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[2]['NomP'])){if($cappoke1['CAP2']['Precis'] == NULL){echo '""';} else{echo $cappoke1['CAP2']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[2]['NomP'])){if($cappoke1['CAP2']['PP'] == NULL){echo '""';} else{echo $cappoke1['CAP2']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke1['CAP2']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke1['CAP2']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke1['CAP2']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[2]['NomP'])){if($cappoke1['CAP2']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke1['CAP2']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke1['CAP2']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke1['CAP2']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team[2]['NomP'])){echo $cappoke1['CAP3']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke1['CAP3']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke1['CAP3']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[2]['NomP'])){if($cappoke1['CAP3']['Puissance'] == NULL){echo '""';} else{echo $cappoke1['CAP3']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[2]['NomP'])){if($cappoke1['CAP3']['Precis'] == NULL){echo '""';} else{echo $cappoke1['CAP3']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[2]['NomP'])){if($cappoke1['CAP3']['PP'] == NULL){echo '""';} else{echo $cappoke1['CAP3']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke1['CAP3']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke1['CAP3']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke1['CAP3']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[2]['NomP'])){if($cappoke1['CAP3']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke1['CAP3']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke1['CAP3']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke1['CAP3']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team[2]['NomP'])){echo $cappoke1['CAP4']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke1['CAP4']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke1['CAP4']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[2]['NomP'])){if($cappoke1['CAP4']['Puissance'] == NULL){echo '""';} else{echo $cappoke1['CAP4']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[2]['NomP'])){if($cappoke1['CAP4']['Precis'] == NULL){echo '""';} else{echo $cappoke1['CAP4']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[2]['NomP'])){if($cappoke1['CAP4']['PP'] == NULL){echo '""';} else{echo $cappoke1['CAP4']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke1['CAP4']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke1['CAP4']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke1['CAP4']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[2]['NomP'])){if($cappoke1['CAP4']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke1['CAP4']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke1['CAP4']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[2]['NomP'])){echo $cappoke1['CAP4']['StatANerf'];}else{ echo 'NULL';} ?>"),
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
 				<?php if(isset($team[2]['NomP'])){ echo $team[2]['DefSPe'];}else{echo '"NULL"';}?>),
 		new Pokemon(
 			"<?php if(isset($team[3]['NomP'])){
 				echo utf8_encode($team[3]['NomP']);}else{ echo 'NULL';}  ?>", 
 				"<?php if(isset($team[3]['NomP'])){
 					echo getHpById($team[3]['ID']);}else{echo 'NULL';}	?>",
 				new Cap("<?php if(isset($team[3]['NomP'])){echo $cappoke1['CAP1']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke1['CAP1']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke1['CAP1']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[3]['NomP'])){if($cappoke1['CAP1']['Puissance'] == NULL){echo '""';} else{echo $cappoke1['CAP1']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[3]['NomP'])){if($cappoke1['CAP1']['Precis'] == NULL){echo '""';} else{echo $cappoke1['CAP1']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[3]['NomP'])){if($cappoke1['CAP1']['PP'] == NULL){echo '""';} else{echo $cappoke1['CAP1']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke1['CAP1']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke1['CAP1']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke1['CAP1']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[3]['NomP'])){if($cappoke1['CAP1']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke1['CAP1']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke1['CAP1']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke1['CAP1']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team[3]['NomP'])){echo $cappoke1['CAP2']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke1['CAP2']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke1['CAP2']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[3]['NomP'])){if($cappoke1['CAP2']['Puissance'] == NULL){echo '""';} else{echo $cappoke1['CAP2']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[3]['NomP'])){if($cappoke1['CAP2']['Precis'] == NULL){echo '""';} else{echo $cappoke1['CAP2']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[3]['NomP'])){if($cappoke1['CAP2']['PP'] == NULL){echo '""';} else{echo $cappoke1['CAP2']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke1['CAP2']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke1['CAP2']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke1['CAP2']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[3]['NomP'])){if($cappoke1['CAP2']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke1['CAP2']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke1['CAP2']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke1['CAP2']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team[3]['NomP'])){echo $cappoke1['CAP3']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke1['CAP3']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke1['CAP3']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[3]['NomP'])){if($cappoke1['CAP3']['Puissance'] == NULL){echo '""';} else{echo $cappoke1['CAP3']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[3]['NomP'])){if($cappoke1['CAP3']['Precis'] == NULL){echo '""';} else{echo $cappoke1['CAP3']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[3]['NomP'])){if($cappoke1['CAP3']['PP'] == NULL){echo '""';} else{echo $cappoke1['CAP3']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke1['CAP3']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke1['CAP3']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke1['CAP3']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[3]['NomP'])){if($cappoke1['CAP3']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke1['CAP3']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke1['CAP3']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke1['CAP3']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team[3]['NomP'])){echo $cappoke1['CAP4']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke1['CAP4']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke1['CAP4']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[3]['NomP'])){if($cappoke1['CAP4']['Puissance'] == NULL){echo '""';} else{echo $cappoke1['CAP4']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[3]['NomP'])){if($cappoke1['CAP4']['Precis'] == NULL){echo '""';} else{echo $cappoke1['CAP4']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[3]['NomP'])){if($cappoke1['CAP4']['PP'] == NULL){echo '""';} else{echo $cappoke1['CAP4']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke1['CAP4']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke1['CAP4']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke1['CAP4']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[3]['NomP'])){if($cappoke1['CAP4']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke1['CAP4']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke1['CAP4']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[3]['NomP'])){echo $cappoke1['CAP4']['StatANerf'];}else{ echo 'NULL';} ?>"),
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
 				<?php if(isset($team[3]['NomP'])){ echo $team[3]['DefSPe'];}else{echo '"NULL"';}?>),
 		new Pokemon(
 			"<?php if(isset($team[4]['NomP'])){
 				echo utf8_encode($team[4]['NomP']);}else{ echo 'NULL';}  ?>", 
 				"<?php if(isset($team[4]['NomP'])){
 					echo getHpById($team[4]['ID']);}else{echo 'NULL';}	?>",
 				new Cap("<?php if(isset($team[4]['NomP'])){echo $cappoke1['CAP1']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke1['CAP1']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke1['CAP1']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[4]['NomP'])){if($cappoke1['CAP1']['Puissance'] == NULL){echo '""';} else{echo $cappoke1['CAP1']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[4]['NomP'])){if($cappoke1['CAP1']['Precis'] == NULL){echo '""';} else{echo $cappoke1['CAP1']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[4]['NomP'])){if($cappoke1['CAP1']['PP'] == NULL){echo '""';} else{echo $cappoke1['CAP1']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke1['CAP1']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke1['CAP1']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke1['CAP1']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[4]['NomP'])){if($cappoke1['CAP1']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke1['CAP1']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke1['CAP1']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke1['CAP1']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team[4]['NomP'])){echo $cappoke1['CAP2']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke1['CAP2']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke1['CAP2']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[4]['NomP'])){if($cappoke1['CAP2']['Puissance'] == NULL){echo '""';} else{echo $cappoke1['CAP2']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[4]['NomP'])){if($cappoke1['CAP2']['Precis'] == NULL){echo '""';} else{echo $cappoke1['CAP2']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[4]['NomP'])){if($cappoke1['CAP2']['PP'] == NULL){echo '""';} else{echo $cappoke1['CAP2']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke1['CAP2']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke1['CAP2']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke1['CAP2']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[4]['NomP'])){if($cappoke1['CAP2']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke1['CAP2']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke1['CAP2']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke1['CAP2']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team[4]['NomP'])){echo $cappoke1['CAP3']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke1['CAP3']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke1['CAP3']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[4]['NomP'])){if($cappoke1['CAP3']['Puissance'] == NULL){echo '""';} else{echo $cappoke1['CAP3']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[4]['NomP'])){if($cappoke1['CAP3']['Precis'] == NULL){echo '""';} else{echo $cappoke1['CAP3']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[4]['NomP'])){if($cappoke1['CAP3']['PP'] == NULL){echo '""';} else{echo $cappoke1['CAP3']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke1['CAP3']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke1['CAP3']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke1['CAP3']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[4]['NomP'])){if($cappoke1['CAP3']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke1['CAP3']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke1['CAP3']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke1['CAP3']['StatANerf'];}else{ echo 'NULL';} ?>"),
 				new Cap("<?php if(isset($team[4]['NomP'])){echo $cappoke1['CAP4']['NomA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke1['CAP4']['TypeA'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke1['CAP4']['ClasseA'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[4]['NomP'])){if($cappoke1['CAP4']['Puissance'] == NULL){echo '""';} else{echo $cappoke1['CAP4']['Puissance'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[4]['NomP'])){if($cappoke1['CAP4']['Precis'] == NULL){echo '""';} else{echo $cappoke1['CAP4']['Precis'];}}else{ echo '"NULL"';} ?>,
		 			<?php if(isset($team[4]['NomP'])){if($cappoke1['CAP4']['PP'] == NULL){echo '""';} else{echo $cappoke1['CAP4']['PP'];}}else{ echo '"NULL"';}  ?>,
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke1['CAP4']['Effets'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke1['CAP4']['AjoutPV'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke1['CAP4']['RetirePV'];}else{ echo 'NULL';} ?>",
		 			<?php if(isset($team[4]['NomP'])){if($cappoke1['CAP4']['NbAttaque'] == NULL){echo '""';} else{echo $cappoke1['CAP4']['NbAttaque'];}}else{ echo '"NULL"';} ?>,
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke1['CAP4']['StatMBoost'];}else{ echo 'NULL';} ?>",
		 			"<?php if(isset($team[4]['NomP'])){echo $cappoke1['CAP4']['StatANerf'];}else{ echo 'NULL';} ?>"),
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
 				<?php if(isset($team[4]['NomP'])){ echo $team[4]['DefSPe'];}else{echo '"NULL"';}?>)
 		


 		);


 	var hps = document.getElementById("hps");
 	var hpj = document.getElementById("hpj");
 	var healthbar = document.querySelector('#healthj');
	 healthbar.value = pokemonjoueur.hp;
	var healthbars = document.querySelector('#healths');
	 healthbars.value = pokemonsauvage.hp;
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

 	function start(){
 		Set_cap(pokemonjoueur);
 		
 	}



 	function Catch(){
 		window.location="catch.php";
 	}
 	function setAttaquej(attack){
 		jeu.choixj = 1;
 		jeu.attackj = attack;
 	}
 	function setAttaqueA(attack){
 		jeu.choixa = 1;
 		jeu.attacka = attack;
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
 				bouton.addEventListener('click',setAttaquej.bind(null,pokemonjoueur.cap[i]));
 			}
 			elem.appendChild(li);
 			li.appendChild(bouton);
 		}
 		li = document.createElement('li');
 		bouton= document.createElement('input');
 		bouton.id = "pokeball";
 		bouton.type = "button";
 		bouton.value ="Pokeball";
 		bouton.addEventListener('click',Catch)
 		elem.appendChild(li);
 		li.appendChild(bouton);
 		set_TextBar();
 		set_Equipe();

 	}

 	function set_TextBar(){
 		let elem = document.createElement('p');
 		elem.id = "textbox";
 		document.body.appendChild(elem);		
 	}

 	function setSwap(a){
 		jeu.choixj = 2;
 		jeu.pokemonswap = a;
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

 	function checkhp(pokemonsauvage){
 		if (pokemonsauvage.hp == 0) {DisableAll();KO();}
 		
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
 					setTimeout(function(){window.location = "defaite.php";},4000);
 					i=6;

 				}
 				else if (i==4 && equipejoueur.Poke[i].nom == 'NULL') {
 					DisableAll();
 					ClearText();
 					WriteText("Plus de Pokemon en état de combattre");
 					setTimeout(function(){window.location = "defaite.php";},4000);
 					i=6;
 				}
 			}


 		}
 		
 	}

 	function checktour(){
 		if (tour.x==1) {checkhp(pokemonsauvage);AttaqueA(hpj,10,pokemonjoueur,pokemonsauvage.cap[0].noma)}
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
 		else if (cible.idpoke == pokemonsauvage.idpoke) {healthbars.value = healthbars.value-1;}
 		
 		if (a != 1) {

 			setTimeout(function(){Reduction(object,a-1,cible);},50)}
 		}
 		
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
 		let  poke = document.getElementById("pokeball");
 		for (var i = 0; i < 4; i=i+1) {
 			cap[i].disabled = true;
 		}
 		for (var i = 0; i < equipej.length; i=i+1) {
 			equipej[i].disabled = true;
 		}
 		poke.disabled = true;

 	}

 	function DisableCap(){
 		let cap = [document.getElementById('cap0'),document.getElementById('cap1'),document.getElementById('cap2'),document.getElementById('cap3')];
 		let  poke = document.getElementById("pokeball");
 		for (var i = 0; i < 4; i=i+1) {
 			cap[i].disabled = true;
 		}
 		poke.disabled = true;
 		

 	}

 	function AbleAll(){
 		let cap = [document.getElementById('cap0'),document.getElementById('cap1'),document.getElementById('cap2'),document.getElementById('cap3')];
 		let equipej = document.getElementsByClassName("equipejoueur");
 		let  poke = document.getElementById("pokeball");
 		for (var i = 0; i < 4; i=i+1) {
 			cap[i].disabled = false;
 		}
 		for (var i = 0; i < equipej.length; i=i+1) {
 			equipej[i].disabled = false;
 		}
 		poke.disabled = false;

 	}
 	function AttaqueJ(object,damage,cible,attack){
 		
 		if (tour.x == 0) {
 		
 		ClearText();
 		WriteText(pokemonjoueur.nom+" utilise "+attack);
 		if (pokemonsauvage.hp-damage <= 0) {pokemonsauvage.hp = 0}
 		else{
 		pokemonsauvage.hp = pokemonsauvage.hp - damage;}
 		setTimeout(function(){
 			AnimationAttackJ();
 			Reduction(object,damage,cible);
 			
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
 		jeu.attackj = null;
 		jeu.attacka = null;
 		jeu.pokemonswap = null;
 		jeu.jeufin = false;
 		AbleAll();


 	}
 	function Partie(){
 		console.log('partie');
 		var degatj=0;
 		var degata=0;
 		if(!jeu.jeufin){
 			degata=0;
 			degatj=0;
 			
 			if (jeu.choixa == 0) {

 				setAttaqueA(pokemonsauvage.cap[Math.floor(Math.random() * Math.floor(1))]);
 			}
 				
 			
 			if (jeu.choixa == 1 && jeu.choixj == 1) {
 				DisableAll();
 				jeu.choixj = 0;
 				jeu.choixa = 0;
 				if (jeu.attackj.classea == "Physique" || jeu.attackj.classea == "Speciale") {
 					degatj = CalculDegat(jeu.attackj,pokemonjoueur,pokemonsauvage);
 			
 				}
 			
 				if (jeu.attacka.classea == "Physique" || jeu.attacka.classea == "Speciale") {
 					degata = CalculDegat(jeu.attacka,pokemonsauvage,pokemonjoueur);
 				
 				}
 			
 				if (pokemonjoueur.vitesse >= pokemonsauvage.vitesse) {
 					setTimeout(function(){
 						AttaqueJ(hps,degatj,pokemonsauvage,jeu.attackj.noma);
 						
 						setTimeout(function(){if (pokemonsauvage.hp - degatj > 0) {AttaqueA(hpj,degata,pokemonjoueur,jeu.attacka.noma);};setTimeout(function(){resetJeu();ClearText();checkhpj(pokemonjoueur);checkhp(pokemonsauvage);},4000);},2000);
 						
 						
 						
 					},2000);
 					
 				}
 				else {
 					setTimeout(function(){
 						AttaqueA(hpj,degata,pokemonjoueur,jeu.attacka.noma);
 						setTimeout(function(){if (pokemonjoueur.hp - degata > 0) {AttaqueJ(hps,degatj,pokemonsauvage,jeu.attackj.noma)};
 						setTimeout(function(){resetJeu();ClearText();checkhpj(pokemonjoueur);checkhp(pokemonsauvage);},4000);
 						},2000);
 					},2000);

 				}

 				
 			}
 			else if (jeu.choixa == 1 && jeu.choixj == 2) {
 				DisableAll();
 				jeu.choixj = 0;
 				jeu.choixa = 0;
 				if (jeu.attacka.classea == "Physique" || jeu.attacka.classea == "Speciale") {
 					degata = CalculDegat(jeu.attacka,pokemonsauvage,pokemonsauvage);
 				
 				}
 				setTimeout(function(){
 						Swap(jeu.pokemonswap);
 						setTimeout(function(){AttaqueA(hpj,degata,pokemonjoueur,jeu.attacka.noma);
 						setTimeout(function(){resetJeu();ClearText();checkhpj(pokemonjoueur);checkhp(pokemonsauvage);},4000);
 						},2000);
 					},2000);

 			}
 			//savegame();

 		}
 	}

 	function SwapPoke(a){
 		let Poke = pokemonjoueur;
 		pokemonjoueur = equipejoueur.Poke[a];
 		equipejoueur.Poke[a] = Poke;
 		
 	}
 	function SwapText(a){
 		let cap = [document.getElementById('cap0'),document.getElementById('cap1'),document.getElementById('cap2'),document.getElementById('cap3')];
	 		let input = document.getElementById('poke'+a);
	 		let name = document.getElementById('nompoke');
	 		let img = document.getElementById('pokeimg');
	 		
	 		img.src = "img/"+pokemonjoueur.nom+"droite.png";

	 		name.innerHTML = pokemonjoueur.nom;
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

 	function Swapko(a){
 		
 	
 			ClearText();
 			WriteText("Changement de Pokemon");
 			SwapPoke(a);
 			SwapText(a);
 			AbleAll();
	 		
	 		
	 		
 		
 		
 		
 	}

 	function AttaqueA(object,damage,cible,attack){
 		ClearText();
 		WriteText(pokemonsauvage.nom+" sauvage utilise "+attack);
 		if (pokemonjoueur.hp-damage <= 0) {pokemonjoueur.hp = 0}
 		else{
 		pokemonjoueur.hp = pokemonjoueur.hp - damage;}
 		setTimeout(function(){Reduction(object,damage,cible);
 			AnimationAttackS();},2000);
 		
 	
 	}

 	function KO(){
 		clearTimeout(checktour);
 		ClearText();
 		WriteText(pokemonsauvage.nom+" a été battu...");

 		setTimeout(function(){window.location="attaque.php";

 			
 		},5000);
 		
 	}
 	




 	function set_cookie(cookiename, cookievalue, hours) {
    var date = new Date();
    date.setTime(date.getTime() + Number(hours) * 3600 * 1000);
    document.cookie = cookiename + "=" + cookievalue + "; path=/;expires = " + date.toGMTString();

}

	function savegame(){
		set_cookie('pokemonjoueur[ID]',pokemonjoueur.idpoke,24);
		set_cookie('pokemonjoueur[HP]',pokemonjoueur.hp,24);
		set_cookie('pokemonsauvage[ID]',pokemonsauvage.idpoke,24);
		set_cookie('pokemonsauvage[HP]',pokemonsauvage.hp,24);
		for (var i = 0; i < 5; i=i+1) {
			set_cookie('team['+i+'][ID]',equipejoueur.Poke[i].idpoke,24);
			set_cookie('team['+i+'][HP]',equipejoueur.Poke[i].hp,24);
			
		}
		set_cookie('tour',tour.x,24);
	}





 </script>
 </html>