<?php 
include_once('../inc/connexion.php');
session_start();
	$j=$_POST['j'];
$req ="DELETE FROM `image` WHERE `id`= '".$_SESSION['image'.$j]."'";;
mysql_query ($req) or die('Erreur SQL !<br />'.$res.'<br />'.mysql_error());
	unset($_SESSION['image'.$j]);
 ?>
