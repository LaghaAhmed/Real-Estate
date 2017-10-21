<?php 
include_once('../inc/connexion.php');
session_start();
	$id=$_POST['id'];
  echo $res = "DELETE FROM `save` WHERE `idannonce`=".$id." AND `idannonceur`=".$_SESSION['id'];
  $req = mysql_query($res) or die('Erreur SQL !<br />'.$res.'<br />'.mysql_error());  
 ?>
