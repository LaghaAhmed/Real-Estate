<?php 
include_once('../inc/connexion.php');
session_start();
	$id=$_POST['id'];
  $res = "UPDATE `annonce` SET `verif`=1 WHERE `id`=".$id;
  $req = mysql_query($res) or die('Erreur SQL !<br />'.$res.'<br />'.mysql_error());  
 ?>
