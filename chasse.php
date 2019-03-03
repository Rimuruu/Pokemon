<?php 
session_start();
include 'security.php';
include 'user.php';

 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>

 	<?php 
 	Show_nth_pokemon($nomcompte,1);
 	Show_cap($nomcompte,1);

 	 ?>
 
 </body>
 </html>