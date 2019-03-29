<?php 

session_start();
include 'security.php';
include 'user.php';
if (!isset($_SESSION['idpokemonsauvage'])) {
	header("location: login.php");
}
$idpokemonsauvage = $_SESSION['idpokemonsauvage'];

$nompoke=NomDepuisID($idpokemonsauvage);
Delete_Pokemon_byID($idpokemonsauvage);
$_SESSION['idpokemonsauvage']=NULL;
unset($_COOKIE['idpokemonsauvage']);
setcookie('idpokemonsauvage', '', time() - 3600);



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
var text = "<?php echo $nompoke; ?> a été battu";
setTimeout(function(){Texte_catch(0);},1000);
function Texte_catch(a) {
	p = document.getElementById("texte");
	p.innerHTML=p.innerHTML+text.charAt(a);
	if (a<text.length) {
	setTimeout(function(){Texte_catch(a+1);},50);
	}
	else if (a == text.length){setTimeout(function(){window.location="log.php";},3000);}
}








</script>
</html>