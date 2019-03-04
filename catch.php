<?php 
session_start();
include 'security.php';
include 'user.php';
if (!isset($_SESSION['idpokemonsauvage'])) {
	header("location: login.php");
}
$idpokemonsauvage = $_SESSION['idpokemonsauvage'];
Catch_Pokemon($nomcompte,$idpokemonsauvage);
$_SESSION['idpokemonsauvage']=NULL;
 ?>


 <!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<p id="texte"></p>
</body>
<script type="text/javascript">
var text = "... <?php echo utf8_encode(NomDepuisID($idpokemonsauvage)); ?> a été attrapé";
setTimeout(function(){Texte_catch(0);},1000);
function Texte_catch(a) {
	p = document.getElementById("texte");
	p.innerHTML=p.innerHTML+text.charAt(a);
	if (a<text.length) {
	if (a>2) {setTimeout(function(){Texte_catch(a+1);},50)}
	else{setTimeout(function(){Texte_catch(a+1);},3000);}
	}
	else if (a == text.length){setTimeout(function(){window.location="log.php";},3000);}
	


}








</script>
</html>