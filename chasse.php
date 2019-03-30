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
 	<title></title>
 	<link rel="stylesheet" type="text/css" href="style.css">
 </head>
 <body onload="Set_cap(pokemonjoueur)">
 	
 	<div id='fenetre'>
 	<?php 
 	echo "<div id='pokej'>";
 	$poke = Show_First_Pokemon_Available($nomcompte);
 	echo "<h2 id='hpj'>".getHpById($poke)."</h2>";
 	echo "</div>";
 	$pokejoueur = Show_cap_by_id($poke);
 	$team = Show_other_poke($nomcompte,$poke);
 	$cappoke1=null;
 	$cappoke2=null;
 	$cappoke3=null;
 	$cappoke4=null;
 	$cappoke5=null;
 	if (isset($team[0]['NOM'])) {
 		$cappoke1 = Show_cap_by_id($team[0]['ID'] );
 	}
 	if (isset($team[1]['NOM'])) {
 		$cappoke2 = Show_cap_by_id($team[1]['ID'] );
 	}
 	if (isset($team[2]['NOM']) ) {
 		$cappoke3 = Show_cap_by_id($team[2]['ID'] );
 	}
 	if (isset($team[3]['NOM'])) {
 		$cappoke4 = Show_cap_by_id($team[3]['ID'] );
 	}
 	if (isset($team[4]['NOM'])) {
 		$cappoke5 = Show_cap_by_id($team[4]['ID'] );
 	}
 	

 	
 	if (!isset($idpokesauvage)) {
 		$idpokesauvage = Pokemon_alea();
 	}
 	echo "<div id='pokes'>";
 	$pokemonsauvage = Show_cap_by_id($idpokesauvage);
 	Show_pokemon_by_id($idpokesauvage);
 	echo "<h2 id='hps'>".getHpById($idpokesauvage)."</h2>";
 	echo "</div>";
 	$_SESSION['idpokemonsauvage']=$idpokesauvage;
 	setcookie("idpokemonsauvage",$idpokesauvage);
 	

 	 ?>
 </div>

 </body>
 <script type="text/javascript">

 	class Pokemon{
 		constructor(nom,hp,cap1,cap2,cap3,cap4){
 			this.nom = nom;
 			this.hp = hp;
 			this.cap = [cap1,cap2,cap3,cap4];
 		
 		}

 	}

 	class Equipe{
 		constructor(Poke1,Poke2,Poke3,Poke4,Poke5){
 			this.Poke = [Poke1,Poke2,Poke3,Poke4,Poke5];
 		}

 	}
 	

 	var pokemonjoueur = new Pokemon("<?php echo NomDepuisId($poke) ?>",<?php echo getHpById($poke) ?>,"<?php echo $pokejoueur['CAP1'] ?>","<?php echo $pokejoueur['CAP2'] ?>","<?php echo $pokejoueur['CAP3'] ?>","<?php echo $pokejoueur['CAP4'] ?>");

 	var pokemonsauvage = new Pokemon("<?php echo NomDepuisId($idpokesauvage) ?>",<?php echo getHpById($idpokesauvage) ?>,"<?php echo $pokemonsauvage['CAP1'] ?>","<?php echo $pokemonsauvage['CAP2'] ?>","<?php echo $pokemonsauvage['CAP3'] ?>","<?php echo $pokemonsauvage['CAP4'] ?>");

 	var equipejoueur =  new Equipe(
 		new Pokemon(
 			"<?php if(isset($team[0]['NOM'])){
 				echo utf8_encode($team[0]['NOM']);}else{ echo 'NULL';}  ?>", 
 				"<?php if(isset($team[0]['NOM'])){
 					echo getHpById($team[0]['ID']);}else{echo 'NULL';}	?>",
 				"<?php if(isset($team[0]['NOM'])){
 				 echo $cappoke1['CAP1'];}else{ echo 'NULL';};	?>",
 				"<?php if(isset($team[0]['NOM'])){ echo $cappoke1['CAP2'];}else{echo 'NULL';}?>",
 				"<?php if(isset($team[0]['NOM'])){ echo $cappoke1['CAP3'];}else{echo 'NULL';}?>",
 				"<?php if(isset($team[0]['NOM'])){ echo $cappoke1['CAP4'];}else{echo 'NULL';}?>"),
 		new Pokemon(
 			"<?php if(isset($team[1]['NOM'])){
 				echo utf8_encode($team[1]['NOM']);}else{ echo 'NULL';}  ?>", 
 				"<?php if(isset($team[1]['NOM'])){
 					echo getHpById($team[1]['ID']);}else{echo 'NULL';}	?>",
 				"<?php if(isset($team[1]['NOM'])){
 				 echo $cappoke2['CAP1'];}else{ echo 'NULL';};	?>",
 				"<?php if(isset($team[1]['NOM'])){ echo $cappoke2['CAP2'];}else{echo 'NULL';}?>",
 				"<?php if(isset($team[1]['NOM'])){ echo $cappoke2['CAP3'];}else{echo 'NULL';}?>",
 				"<?php if(isset($team[1]['NOM'])){ echo $cappoke2['CAP4'];}else{echo 'NULL';}?>"),
 		new Pokemon(
 			"<?php if(isset($team[2]['NOM'])){
 				echo utf8_encode($team[2]['NOM']);}else{ echo 'NULL';}  ?>", 
 				"<?php if(isset($team[2]['NOM'])){
 					echo getHpById($team[2]['ID']);}else{echo 'NULL';}	?>",
 				"<?php if(isset($team[2]['NOM'])){
 				 echo $cappoke3['CAP1'];}else{ echo 'NULL';};	?>",
 				"<?php if(isset($team[2]['NOM'])){ echo $cappoke3['CAP2'];}else{echo 'NULL';}?>",
 				"<?php if(isset($team[2]['NOM'])){ echo $cappoke3['CAP3'];}else{echo 'NULL';}?>",
 				"<?php if(isset($team[2]['NOM'])){ echo $cappoke3['CAP4'];}else{echo 'NULL';}?>"),
 		new Pokemon(
 			"<?php if(isset($team[3]['NOM'])){
 				echo utf8_encode($team[3]['NOM']);}else{ echo 'NULL';}  ?>", 
 				"<?php if(isset($team[3]['NOM'])){
 					echo getHpById($team[3]['ID']);}else{echo 'NULL';}	?>",
 				"<?php if(isset($team[3]['NOM'])){
 				 echo $cappoke4['CAP1'];}else{ echo 'NULL';};	?>",
 				"<?php if(isset($team[3]['NOM'])){ echo $cappoke4['CAP2'];}else{echo 'NULL';}?>",
 				"<?php if(isset($team[3]['NOM'])){ echo $cappoke4['CAP3'];}else{echo 'NULL';}?>",
 				"<?php if(isset($team[3]['NOM'])){ echo $cappoke4['CAP4'];}else{echo 'NULL';}?>"),
 		new Pokemon(
 			"<?php if(isset($team[4]['NOM'])){
 				echo utf8_encode($team[4]['NOM']);}else{ echo 'NULL';}  ?>", 
 				"<?php if(isset($team[4]['NOM'])){
 					echo getHpById($team[4]['ID']);}else{echo 'NULL';}	?>",
 				"<?php if(isset($team[4]['NOM'])){
 				 echo $cappoke5['CAP1'];}else{ echo 'NULL';};	?>",
 				"<?php if(isset($team[4]['NOM'])){ echo $cappoke5['CAP2'];}else{echo 'NULL';}?>",
 				"<?php if(isset($team[4]['NOM'])){ echo $cappoke5['CAP3'];}else{echo 'NULL';}?>",
 				"<?php if(isset($team[4]['NOM'])){ echo $cappoke5['CAP4'];}else{echo 'NULL';}?>"),
 		


 		);


 	var hps = document.getElementById("hps");
 	var hpj = document.getElementById("hpj");
 	var tour = {x:0};
 	var checker2 = window.setInterval(checktour,4000);

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
 				bouton.addEventListener('click',AttaqueJ.bind(null,hps,20,pokemonsauvage,pokemonjoueur.cap[i]));
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
 		if (pokemonsauvage.hp == 0) {KO();}
 		
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
 		if (tour.x==1) {AttaqueA(hpj,10,pokemonjoueur,pokemonsauvage.cap[0])}
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
 		if (a != 1) {setTimeout(function(){Reduction(object,a-1,cible);},50)}
 		}
 		else{
 			checkhpj(pokemonjoueur);
 			checkhp(pokemonsauvage);
 		}
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
 		
 		if (tour.x != 1) {
 		DisableAll();
 		ClearText();
 		WriteText(pokemonjoueur.nom+" utilise "+attack);
 		setTimeout(function(){
 			Reduction(object,damage,cible);
 			checkhpj(pokemonjoueur);
 		},2000);
 		setTimeout(function(){tour.x =1;
 			AbleAll();
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
	 		name.innerHTML = pokemonjoueur.nom;
	 		input.value = equipejoueur.Poke[a].nom;
	 		hpj.innerHTML = pokemonjoueur.hp;
	 		cap[0].value = pokemonjoueur.cap[0];
	 		cap[1].value = pokemonjoueur.cap[1];
	 		cap[2].value = pokemonjoueur.cap[2];
	 		cap[3].value = pokemonjoueur.cap[3];
 	}

 	function Swap(a){
 		if (tour.x != 1) {
 			DisableAll();
 			ClearText();
 			if (equipejoueur.Poke[a].hp != 0) {
 			WriteText("Changement de Pokemon");
	 		setTimeout(function(){SwapPoke(a);},1000);
	 		setTimeout(function(){SwapText(a)},1000);
	 		setTimeout(function(){tour.x =1;
 			AbleAll();
 		},3000);
	 
	 		}
	 		else {
	 			WriteText("Ce pokemon est KO");
	 			setTimeout(function(){AbleAll();},3000);

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
 		setTimeout(function(){Reduction(object,damage,cible);},2000);
 		setTimeout(function(){tour.x =0;
 			
 		},3000);
 	
 	
 	}

 	function KO(){
 		window.location="attaque.php";
 	}
 	










 </script>
 </html>