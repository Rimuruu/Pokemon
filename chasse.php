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
 <body onload="Set_cap(pokemonjoueur),checktour()">
 	
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
 		constructor(nom,hp,cap1,cap2,cap3,cap4,idpoke/*,typeu,typed,niv,ivpv,ivattaque,ivdefense,ivattspe,ivdefspe,ivvitesse,pvmax,vitesse,attaque,defense,attspe,defspe*/){
 			this.nom = nom;
 			this.hp = hp;
 			this.cap = [cap1,cap2,cap3,cap4];
 			this.idpoke = idpoke;

 		
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
 	

 	var pokemonjoueur = new Pokemon("<?php echo NomDepuisId($poke['ID']); ?>",
 		<?php echo $hppoke ?>,
 		"<?php echo $pokejoueur['CAP1']['NomA'] ?>",
 		"<?php echo $pokejoueur['CAP2']['NomA'] ?>",
 		"<?php echo $pokejoueur['CAP3']['NomA'] ?>",
 		"<?php echo $pokejoueur['CAP4']['NomA'] ?>",
 		<?php echo $poke['ID'] ?>,
 		"<?php echo $poke['TypeU'] ?>",
 		"<?php echo $poke['TypeD'] ?>",
 		<?php echo $poke['Niv'] ?>,
 		<?php echo $poke['IVPV'] ?>,
 		<?php echo $poke['IVAttaque'] ?>,
 		<?php echo $poke['IVDefense'] ?>,
 		<?php echo $poke['IVAttSpe'] ?>,
 		<?php echo $poke['IVDefSpe'] ?>,
 		<?php echo $poke['IVDefSpe'] ?>,
 		<?php echo $poke['PVmax'] ?>,
 		<?php echo $poke['Vitesse'] ?>,
 		<?php echo $poke['Attaque'] ?>,
 		<?php echo $poke['Defense'] ?>,
 		<?php echo $poke['AttSpe'] ?>,
 		<?php echo $poke['DefSPe'] ?>

 		);

 	var pokemonsauvage = new Pokemon("<?php echo NomDepuisId($idpokesauvage) ?>",
 		<?php echo $hpsauvage ?>,
 		"<?php echo $pokemonsauvage['CAP1']['NomA'] ?>",
 		"<?php echo $pokemonsauvage['CAP2']['NomA'] ?>",
 		"<?php echo $pokemonsauvage['CAP3']['NomA'] ?>",
 		"<?php echo $pokemonsauvage['CAP4']['NomA'] ?>",
 		<?php echo $idpokesauvage ?>);

 	var equipejoueur =  new Equipe(
 		new Pokemon(
 			"<?php if(isset($team[0]['NomP'])){
 				echo utf8_encode($team[0]['NomP']);}else{ echo 'NULL';}  ?>", 
 				"<?php if(isset($team[0]['NomP'])){
 					echo getHpById($team[0]['ID']);}else{echo 'NULL';}	?>",
 				"<?php if(isset($team[0]['NomP'])){ echo $cappoke1['CAP1']['NomA'];}else{ echo 'NULL';};?>",
 				"<?php if(isset($team[0]['NomP'])){ echo $cappoke1['CAP2']['NomA'];}else{echo 'NULL';}?>",
 				"<?php if(isset($team[0]['NomP'])){ echo $cappoke1['CAP3']['NomA'];}else{echo 'NULL';}?>",
 				"<?php if(isset($team[0]['NomP'])){ echo $cappoke1['CAP4']['NomA'];}else{echo 'NULL';}?>",
 				<?php if(isset($team[0]['NomP'])){ echo $team[0]['ID'];}else{echo 'NULL';}?>),
 		new Pokemon(
 			"<?php if(isset($team[1]['NomP'])){
 				echo utf8_encode($team[1]['NomP']);}else{ echo 'NULL';}  ?>", 
 				"<?php if(isset($team[1]['NomP'])){
 					echo getHpById($team[1]['ID']);}else{echo 'NULL';}	?>",
 				"<?php if(isset($team[1]['NomP'])){
 				 echo $cappoke2['CAP1']['NomA'];}else{ echo 'NULL';};	?>",
 				"<?php if(isset($team[1]['NomP'])){ echo $cappoke2['CAP2']['NomA'];}else{echo 'NULL';}?>",
 				"<?php if(isset($team[1]['NomP'])){ echo $cappoke2['CAP3']['NomA'];}else{echo 'NULL';}?>",
 				"<?php if(isset($team[1]['NomP'])){ echo $cappoke2['CAP4']['NomA'];}else{echo 'NULL';}?>",
 				<?php if(isset($team[1]['NomP'])){ echo $team[1]['ID'];}else{echo 'NULL';}?>),
 		new Pokemon(
 			"<?php if(isset($team[2]['NomP'])){
 				echo utf8_encode($team[2]['NomP']);}else{ echo 'NULL';}  ?>", 
 				"<?php if(isset($team[2]['NomP'])){
 					echo getHpById($team[2]['ID']);}else{echo 'NULL';}	?>",
 				"<?php if(isset($team[2]['NomP'])){
 				 echo $cappoke3['CAP1']['NomA'];}else{ echo 'NULL';};	?>",
 				"<?php if(isset($team[2]['NomP'])){ echo $cappoke3['CAP2']['NomA'];}else{echo 'NULL';}?>",
 				"<?php if(isset($team[2]['NomP'])){ echo $cappoke3['CAP3']['NomA'];}else{echo 'NULL';}?>",
 				"<?php if(isset($team[2]['NomP'])){ echo $cappoke3['CAP4']['NomA'];}else{echo 'NULL';}?>",
 				<?php if(isset($team[2]['NomP'])){ echo $team[2]['ID'];}else{echo 'NULL';}?>),
 		new Pokemon(
 			"<?php if(isset($team[3]['NomP'])){
 				echo utf8_encode($team[3]['NomP']);}else{ echo 'NULL';}  ?>", 
 				"<?php if(isset($team[3]['NomP'])){
 					echo getHpById($team[3]['ID']);}else{echo 'NULL';}	?>",
 				"<?php if(isset($team[3]['NomP'])){
 				 echo $cappoke4['CAP1']['NomA'];}else{ echo 'NULL';};	?>",
 				"<?php if(isset($team[3]['NomP'])){ echo $cappoke4['CAP2']['NomA'];}else{echo 'NULL';}?>",
 				"<?php if(isset($team[3]['NomP'])){ echo $cappoke4['CAP3']['NomA'];}else{echo 'NULL';}?>",
 				"<?php if(isset($team[3]['NomP'])){ echo $cappoke4['CAP4']['NomA'];}else{echo 'NULL';}?>",
 				<?php if(isset($team[3]['NomP'])){ echo $team[3]['ID'];}else{echo 'NULL';}?>),
 		new Pokemon(
 			"<?php if(isset($team[4]['NomP'])){
 				echo utf8_encode($team[4]['NomP']);}else{ echo 'NULL';}  ?>", 
 				"<?php if(isset($team[4]['NomP'])){
 					echo getHpById($team[4]['ID']);}else{echo 'NULL';}	?>",
 				"<?php if(isset($team[4]['NomP'])){
 				 echo $cappoke5['CAP1']['NomA'];}else{ echo 'NULL';};	?>",
 				"<?php if(isset($team[4]['NomP'])){ echo $cappoke5['CAP2']['NomA'];}else{echo 'NULL';}?>",
 				"<?php if(isset($team[4]['NomP'])){ echo $cappoke5['CAP3']['NomA'];}else{echo 'NULL';}?>",
 				"<?php if(isset($team[4]['NomP'])){ echo $cappoke5['CAP4']['NomA'];}else{echo 'NULL';}?>",
 				<?php if(isset($team[4]['NomP'])){ echo $team[4]['ID'];}else{echo 'NULL';}?>),
 		


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


 	


 	function Catch(){
 		window.location="catch.php";
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
 			bouton.value = pokemonjoueur.cap[i];
 			if(bouton.value != ""){
 				bouton.addEventListener('click',AttaqueJ.bind(null,hps,25,pokemonsauvage,pokemonjoueur.cap[i]));
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
 			bouton.addEventListener('click',Swap.bind(null,i));
 			elem.appendChild(li);
 			li.appendChild(bouton);
 			}
 		}
 		
 	}

 	function checkhp(pokemonsauvage){
 		if (pokemonsauvage.hp == 0) {tour.x=2;KO();}
 		
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

 					ClearText();
 					WriteText("Plus de Pokemon en état de combattre");
 					setTimeout(function(){window.location = "defaite.php";},4000);
 					i=6;

 				}
 				else if (i==4 && equipejoueur.Poke[i].nom == 'NULL') {

 					ClearText();
 					WriteText("Plus de Pokemon en état de combattre");
 					setTimeout(function(){window.location = "defaite.php";},4000);
 					i=6;
 				}
 			}


 		}
 		
 	}

 	function checktour(){
 		if (tour.x==1) {checkhp(pokemonsauvage);AttaqueA(hpj,10,pokemonjoueur,pokemonsauvage.cap[0])}
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
 		cible.hp = cible.hp-1;
 		if (cible.idpoke == pokemonjoueur.idpoke) {healthbar.value = healthbar.value-1;}
 		else if (cible.idpoke == pokemonsauvage.idpoke) {healthbars.value = healthbars.value-1;}
 		
 		if (a != 1) {

 			setTimeout(function(){Reduction(object,a-1,cible);},50)}
 		}
 		else{

 			savegame();
 			checkhpj(pokemonjoueur);
 			checkhp(pokemonsauvage);
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
 		DisableAll();
 		ClearText();
 		WriteText(pokemonjoueur.nom+" utilise "+attack);
 		setTimeout(function(){
 			AnimationAttackJ();
 			Reduction(object,damage,cible);
 			checkhp(pokemonjoueur);
 		},2000);
 		setTimeout(function(){tour.x =1;savegame();
 			AbleAll();if (pokemonsauvage.hp != 0) {checktour()}
 		},3000);
 		
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
	 		cap[0].value = pokemonjoueur.cap[0];
	 		cap[1].value = pokemonjoueur.cap[1];
	 		cap[2].value = pokemonjoueur.cap[2];
	 		cap[3].value = pokemonjoueur.cap[3];

 	}

 	function Swap(a){
 		if (tour.x == 0) {
 			DisableAll();
 			ClearText();
 			if (equipejoueur.Poke[a].hp != 0) {
 			WriteText("Changement de Pokemon");
	 		setTimeout(function(){SwapPoke(a);},1000);
	 		setTimeout(function(){SwapText(a)},1000);
	 		setTimeout(function(){tour.x =1;savegame();
 			AbleAll();checktour();
 		},3000);
	 
	 		}
	 		else {
	 			WriteText("Ce pokemon est KO");
	 			setTimeout(function(){AbleAll();checktour();},3000);

	 		}
	 		
 		}
 		
 		
 	}

 	function Swapko(a){
 		
 			DisableAll();
 			ClearText();
 			WriteText("Changement de Pokemon");
 			SwapPoke(a);
 			SwapText(a);
 			AbleAll();
	 		
	 		
	 		
 		
 		
 		
 	}

 	function AttaqueA(object,damage,cible,attack){
 		ClearText();
 		WriteText(pokemonsauvage.nom+" sauvage utilise "+attack);
 		setTimeout(function(){Reduction(object,damage,cible);
 			AnimationAttackS();},2000);
 		setTimeout(function(){tour.x =0;savegame();

 			
 		},3000);
 	
 	
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