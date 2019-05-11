<?php 
session_start();
include 'security.php';
include 'user.php';
include 'match.php';
$box = 5;
$slot1 = Get_nth_pokemon($nomcompte,1);
$slot2 = Get_nth_pokemon($nomcompte,2);
$slot3 = Get_nth_pokemon($nomcompte,3);
$slot4 = Get_nth_pokemon($nomcompte,4);
$slot5 = Get_nth_pokemon($nomcompte,5);
$slot6 = Get_nth_pokemon($nomcompte,6);
if ($slot6['NOMP'] == 'Vide') {
	$box = $box-1;
}
if ($slot5['NOMP'] == 'Vide') {
	$box = $box-1;
}
if ($slot4['NOMP'] == 'Vide') {
	$box = $box-1;
}
if ($slot3['NOMP'] == 'Vide') {
	$box = $box-1;
}
if ($slot2['NOMP'] == 'Vide') {
	$box = $box-1;
}
if ($slot1['NOMP'] == 'Vide') {
	$box = $box-1;
}
$res = Get_pokemon_from_computer($nomcompte);
 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Modification équipe</title>
	<link rel="stylesheet" type="text/css" href="equipe.css">
</head>
<body onload="create_bu(equipe,box);">

	<header>
	<h1 id="titre">Gestion de<br> l'équipe</h1>
	<?php 
	echo "<a id='compte'><h1>".$nomcompte."</h1>";
	Show_pokedollar($nomcompte);
	echo "</a><a href='log.php'><input type='button' name='Menu' value='Menu' id='deco'></a></header>";


	echo "<ul id='ordinateur'>";
	while ($enr = mysqli_fetch_assoc($res)){
		echo "<li><input type='button' id='".$enr['ID']."' class='".$enr['ID']."' value='".utf8_encode($enr['NOMP'])." Niv ".utf8_encode($enr['Niv'])."''></li>";
	}
	echo "</ul>";
	echo "<ul id='equipe'></ul>";

	 ?>


</body>
<script type="text/javascript">
	var equipe = {"nom1":"<?php echo utf8_encode($slot1['NOMP']) ?>","id1":"<?php echo $slot1['ID'] ?>","niv1":"<?php echo ' Niv '.utf8_encode($slot1['Niv'])?>","nom2":"<?php echo utf8_encode($slot2['NOMP']) ?>","id2":"<?php echo $slot2['ID'] ?>","niv2":"<?php echo ' Niv '.utf8_encode($slot2['Niv'])?>","nom3":"<?php echo utf8_encode($slot3['NOMP']) ?>","id3":"<?php echo $slot3['ID'] ?>","niv3":"<?php echo ' Niv '.utf8_encode($slot3['Niv'])?>","nom4":"<?php echo utf8_encode($slot4['NOMP']) ?>","id4":"<?php echo $slot4['ID'] ?>","niv4":"<?php echo ' Niv '.utf8_encode($slot4['Niv'])?>","nom5":"<?php echo utf8_encode($slot5['NOMP']) ?>","id5":"<?php echo $slot5['ID'] ?>","niv5":"<?php echo ' Niv '.utf8_encode($slot5['Niv'])?>","nom6":"<?php echo utf8_encode($slot6['NOMP']) ?>","id6":"<?php echo $slot6['ID'] ?>","niv6":"<?php echo ' Niv '.utf8_encode($slot6['Niv'])?>"};
	var select={x:0,select2:null};
	var box = {y:<?php echo $box ?>};

	function swap(id,select) {
		let object2;
		let object;
		let save;
		console.log(select.x)
		if (select.x == 0) {
			object =document.getElementById(id);
			object.disabled=true;
			select.x = 1;
			select.select2 = object;
		}
		else{
			object = document.getElementById(id);
			object2 = select.select2;

			save = object.classList[0];
			object.classList.remove(object.classList[0]);
			object.classList.add(object2.classList[0]);

			object2.classList.remove(object2.classList[0]);
			object2.classList.add(save);

			save = object.value;
			object.value = object2.value;
			object2.value = save;
			object.disabled=false;
			object2.disabled=false;
			select.x = 0;


		}
		
	}

	function create_bu(equipe,box){
		let nom;
		let id;
		let elem;
		let li;
		let computer
		for (var i = 1; i <=6; i=i+1) {
			nom = equipe['nom'+i];
			id = equipe['id'+i];
			niv = equipe['niv'+i];
			elem = document.createElement('input');
			li = document.createElement('li');
			if (nom == "") {
				elem.value = "Vide";
			}
			else{
				if(niv == " Niv NULL")
				elem.value = nom;
				else elem.value = nom+niv;
			}
			elem.id = i;
			
			
			elem.classList.add(id);
			elem.type = "button";
			elem.addEventListener('click',swap.bind(null,i,select));
			document.getElementById("equipe").appendChild(li);
			li.appendChild(elem);
			if (box.y != 0) {
				elem = document.createElement('input');
				li = document.createElement('li');
				elem.value = "Vide";
				elem.id = id;
				elem.classList.add("NULL");
				elem.type = "button";
				elem.addEventListener('click',swap.bind(null,id,select));
				document.getElementById("ordinateur").appendChild(li);
				li.appendChild(elem);
				box.y = box.y-1;

			}


		}
		elem = document.createElement('input');
		elem.type = "button";
		elem.name = "Sauvegarder";
		elem.value = "Sauvegarder";
		elem.id = "save";
		elem.addEventListener('click',save);
		document.body.appendChild(elem);
		computer = document.getElementById("ordinateur");
		if (computer.hasChildNodes()) {
			let children = computer.childNodes;

 			 for (var i = 0; i < children.length; i++) {
 			 	let gchildren = children[i].childNodes;
 			 	

    			gchildren[0].addEventListener('click',swap.bind(null,gchildren[0].id,select));
  			}

		}

	

	}

	function save(){
		let elem;
		for (var i = 1; i <= 6; i=i+1) {
			elem = document.getElementById(i);
			setCookie("slot"+i,elem.classList[0],1);
		}
		window.location = "change.php";

	}
	
	function setCookie(cname, cvalue, exdays) {
  		var d = new Date();
  		d.setTime(d.getTime() + (exdays*24*60*60*1000));
 		 var expires = "expires="+ d.toUTCString();
 		 document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

	function getCookie(cname) {
  		var name = cname + "=";
  		var decodedCookie = decodeURIComponent(document.cookie);
  		var ca = decodedCookie.split(';');
  		for(var i = 0; i <ca.length; i++) {
   		 var c = ca[i];
   		 while (c.charAt(0) == ' ') {
     	 c = c.substring(1);
    	}
   		 if (c.indexOf(name) == 0) {
     	 return c.substring(name.length, c.length);
   	 }
  	}
  return "";
}


</script>
</html>