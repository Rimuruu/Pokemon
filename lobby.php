<?php
session_start();
include 'security.php';
include 'user.php';
$role = get_slot($nomcompte, $_COOKIE['ADV']);
if ($role == 'Adv') {
	$host = $_COOKIE['ADV'];
	$adv = $nomcompte;
}
else{
	$host = $nomcompte;
	$adv = $_COOKIE['ADV'];
}

?>

<!DOCTYPE html>
<html>
    <head>
    </head>
    <body onload='send_async()'>
    	<ul>
    		<li><a id='Host'> ???</a> <a id='statuh'> OFFLINE </a></li>
    		<li><a id='Adv'>???</a>  <a id='statua'> OFFLINE </a></li>
    		<a href="leftmatch.php"><input type="button" name="left" value="Quitter le lobby" id="inputc"></input></a>

    	</ul>
	
	<script>
	var nom = "<?php echo $host ?>";
	var adv = "<?php echo $adv ?>";
	var info = null;
	var check = setInterval(function(){send_async()},500);
	 function send_async() {

	     var xhr = new XMLHttpRequest();
	

	     xhr.open('POST', 'server.php', true);
	     xhr.addEventListener('readystatechange', function() {
		 if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
		     info = JSON.parse(xhr.responseText);
		     set_Info();
		 }
	     });

	     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	     xhr.send("HOST="+nom+"&ADV="+adv+"&joueur=<?php echo $nomcompte?>&role=<?php echo $role?>");
	     
	 }

	 function set_Info(){
	 	let h = document.getElementById('Host');
	 	let a = document.getElementById('Adv');
	 	let sh = document.getElementById('statuh');
	 	let sa = document.getElementById('statua');
	 	h.innerHTML = info["HOST"];
	 	a.innerHTML = info["ADV"];
	 	sh.innerHTML = info["STATUTH"];
	 	sa.innerHTML = info["STATUTA"];
	 	if (info['nbco'] == 2 && document.getElementById('join') == null) {
	 		Set_Join();
	 	}
	 	else if (info['nbco'] != 2 && document.getElementById('join') != null) {
	 		Delete_Join();
	 	}
	 	console.log(info);
	 }

	 function Set_Join(){
	 	let bouton= document.createElement('input');
	 	let a= document.createElement('a');
	 	bouton.id = "join";
	 	bouton.type = "button";
	 	bouton.value = "Rejoindre le Match";
	 	bouton.addEventListener('click',Join);
	 	a.id = "lien";
	 	a.href="MatchOnline.php";
	 	a.appendChild(bouton);
	 	document.body.appendChild(a);
	 }

	 function Delete_Join(){
	 	let bouton = document.getElementById('join');
	 	let a = document.getElementById('lien');
	 	bouton.remove();
	 	a.remove();
	 }

	 function Join(){
	 	set_cookie("Adversaire", "<?php echo  $_COOKIE['ADV']?>", 24);
	 	eraseCookie("ADV");  

	 }

	 function set_cookie(cookiename, cookievalue, hours) {
	    var date = new Date();
	    date.setTime(date.getTime() + Number(hours) * 3600 * 1000);
	    document.cookie = cookiename + "=" + cookievalue + "; path=/;expires = " + date.toGMTString();

}
	function eraseCookie(name) {   
   	 document.cookie = name+'=; Max-Age=-99999999;';  
}


	</script>
    </body>
</html>