<?php 
include_once('../inc/connexion.php');
session_start();
	$id=$_POST['id'];
  $res = "INSERT INTO `save` VALUES ('',".$_SESSION['id'].",".$id.")";
  $req = mysql_query($res) or die('Erreur SQL !<br />'.$res.'<br />'.mysql_error());  

 ?>
