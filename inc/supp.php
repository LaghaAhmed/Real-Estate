<?php
$bd=mysql_connect("localhost","root","") or die('die');
mysql_select_db("bd",$bd);

$pseudo=$_POST['pseudo'];
mysql_query("DELETE FROM `annonceur` WHERE `pseudo`='lagha'");
header("location:annonce.php?pseudo=".$pseudo);
?>