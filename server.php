<?php 

include 'user.php';

$host = $_POST['HOST'];
$adv = $_POST['ADV'];
$joueur = $_POST['joueur'];
$role = $_POST['role'];

if (Search_Match($host,$adv)) {
	if (Role_Co($host,$adv) == 'Host' && $role == 'Adv') {
		Join_matchAdv($joueur,$host);
	}
	else if (Role_Co($host,$adv) == 'Adv' && $role == 'Host') {
		Join_matchHost($joueur,$adv);
	}
	else if (Role_Co($host,$adv) == 'Nobody' && $role == 'Host') {
		Join_matchHost($joueur,$adv);
	}
	else if (Role_Co($host,$adv) == 'Nodody' && $role == 'Adv') {
		Join_matchAdv($joueur,$host);
	}
}
else{
	Create_match($host,$adv);
}

echo json_encode(Info_Combat($host,$adv));

?>