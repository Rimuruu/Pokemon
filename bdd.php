<?php 
function create_link(){
	$link =new mysqli('localhost','root','','pokemon');
	return $link;
}

 ?>