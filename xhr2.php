
<?php
include_once("../inc/connexion.php");
include_once("../inc/fonction.php");
session_start();
$_SESSION['i']++ ;
$_SESSION['f'.$_SESSION['i']]=$_FILES;
aff($_SESSION);
?>