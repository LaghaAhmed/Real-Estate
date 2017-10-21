<?php
$bd=mysql_connect("localhost","root","") or die('die');
mysql_select_db("bd",$bd);

$id=$_POST['id'];
$req=mysql_query("UPDATE `annonce` SET `verif`='0' WHERE `id`='".$id."'");
$res = mysql_query($req) or die('Erreur SQL !<br />'.$req.'<br />'.mysql_error());
?>