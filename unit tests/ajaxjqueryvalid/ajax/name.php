<?php 
echo $_POST['name2'];
echo $_POST['name3'];
echo $_POST['name'];
if (isset($_POST['name']) === true && empty($_POST['name']) === false){
require'../connexion.php';
	$req='SELECT * FROM `annonceur` WHERE `pseudo` = "'.mysql_real_escape_string(trim($_POST["name"])).'"';
	$query= mysql_query($req);
echo (mysql_num_rows($query) !== 0 ) ? mysql_result($query, 0,'email') : 'Name not found' ;
}

 ?>