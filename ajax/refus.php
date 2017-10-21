<?php 
include_once('../inc/connexion.php');
session_start();
	$id=$_POST['id'];
  $req = "DELETE FROM `annonce` WHERE `id`='".$id."'";
  $res = mysql_query($req) or die('Erreur SQL !<br />'.$res.'<br />'.mysql_error());  
  $req = "DELETE FROM `image` WHERE `num-annonce`='".$id."'";
  $res = mysql_query($req) or die('Erreur SQL !<br />'.$res.'<br />'.mysql_error());  
 ?>
