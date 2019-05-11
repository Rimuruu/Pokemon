<?php

session_start();
include 'security.php';
include 'user.php';
include 'match.php';

 ?>

 <!DOCTYPE html>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Combat Online</title>
 </head>
 <body onload='set_Defi()'>
 	<h1>Combat Online</h1>

 	<div>Liste des joueurs en ligne
 		<ul>
 		<?php
		$link =create_link();
		$sql = mysqli_query($link,'SELECT nom FROM compte WHERE nom!="'.$nomcompte.'" AND StatutCo="ONLINE"'/* AND Statut="ON"'*/);
		while ($value=mysqli_fetch_assoc($sql)) {
		echo '<li>'.$value['nom'].'<br><input type="button" id="'.$value['nom'].'"" class="defi" name="d'.$value['nom'].'"" value="défier '.$value['nom'].'"></li>';
		}
		?>
	</ul>
	</div>
	<a href="log.php"><input type="button" name="menu" value="menu"></a>
	<script type="text/javascript">
		
		function set_Defi(){
			let defi = document.getElementsByClassName("defi");
			for (var i = defi.length - 1; i >= 0; i--) {
				defi[i].addEventListener('click',Defi.bind(null,defi[i].id));
			}

		}

		function Defi(nom){
			set_cookie("ADV",nom,24);
			window.location='lobby.php';


		}

		function set_cookie(cookiename, cookievalue, hours) {
		    var date = new Date();
		    date.setTime(date.getTime() + Number(hours) * 3600 * 1000);
		    document.cookie = cookiename + "=" + cookievalue + "; path=/;expires = " + date.toGMTString();

}

	</script>
 </body>
 </html>
