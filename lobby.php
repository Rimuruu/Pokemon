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
	var check = setInterval(function(){send_async()},5000);
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
	 	console.log(info);
	 }



	</script>
    </body>
</html>