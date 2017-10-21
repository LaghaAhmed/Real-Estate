<?php 
include_once('../inc/connexion.php');
	$id=$_POST['id'];
  $res = "DELETE FROM `annonce` WHERE `id`='".$id."'";
  $req = mysql_query($res) or die('Erreur SQL !<br />'.$res.'<br />'.mysql_error());  
 ?>
