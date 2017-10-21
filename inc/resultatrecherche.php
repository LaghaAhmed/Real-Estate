<?php
include_once("../inc/fonction.php");
include_once("../inc/connexion.php");

?>
 			<table cellpadding=4 style="width:58%">
                <?php 
                		if(!isset($_GET['pay']) && !isset($_GET['type'])){$info='';}
	                   $catheg=$_POST['catheg'];
	                   $pays=$_POST['pays'];
	                   if (isset($_POST['region'])){$reg=$_POST['region'];};
	                   if (isset($_POST['departement'])){$depart=$_POST['departement'];};
	                   if ($_POST['pmin']=='')$pmin=0;else $pmin=$_POST['pmin'];
	                   if ($_POST['pmax']=='')$pmax=1000000;else $pmax=$_POST['pmax'];
	                   if ($_POST['smin']=='')$smin=0;else $smin=$_POST['smin'];
	                   if ($_POST['smax']=='')$smax=1000000;else $smax=$_POST['smax'];
	                   if($_POST['pays']=='Tout l\'Europe'){$pays=' LIKE "%" ';}else{$pays=" = '".$pays."' ";}
	                   if($_POST['catheg']==''){$catheg=' LIKE "%" ';}else{$catheg=" = '".$catheg."' ";}

	                   if(isset($_POST['chb1']) && isset($_POST['chb2'])){$type='1 OR `type`=2';}
	                   elseif(isset($_POST['chb1'])){$type='1';}
	                   elseif(isset($_POST['chb2'])){$type='2';}
	                   else {$type='1 OR `type`=2';};

	                echo $req = "SELECT * FROM `annonce` where (`type`=".$type." OR `type`=3) AND `pays`".$pays." AND `offre`".$catheg." AND `prix`>=".$pmin." AND `prix`<=".$pmax." AND `verif`<=1";
	                $res = mysql_query($req) or die('Erreur SQL !<br />'.$req.'<br />'.mysql_error());
	                $nbr_ligne_total=mysql_num_rows($res);
					include_once('aff-annonce.php');
				?>
			</table>
