<?php
include_once("connexion.php");
include_once("fonction.php");
session_start();
aff($_SESSION);
aff($_POST);

$pseudo=$_SESSION['login'];
$catheg=$_POST['catheg'];
$desc=$_POST['description'];
echo $desc=str_replace ( "'", "\'", $desc) ;
$adresse=$_POST['adresse'];
echo $adresse=str_replace ( "'", "\'", $adresse) ;
$info=$_POST['info'];
$x=strstr($info,',', true);
$y=substr(strrchr($info,','),2);
$pays=$_POST['pays'];
$region=$_POST['reg'];
$depart=$_POST['depart'];
$prix=$_POST['prix'];
$video=$_POST['video'];
$surface=$_POST['surface'];
$nbrch=$_POST['nbr-chambre'];
$image=$_SESSION['i'];

aff($_FILES);

//typ=type de l'annance 0ou3=>vente ou achat / 1=>vente / 2=> achat

if ( isset($_POST['type']) && isset($_POST['type1'])){$typ='3';}
elseif (isset($_POST['type'])){$typ='1';}  
elseif (isset($_POST['type1'])){$typ='2';}


if ($catheg=='Maison')
	{	$detail=$nbrch;
		$detailm=$_POST['detail'];

		for ($i = 0,$j=0; $i <= 5; $i++) 
		{
			if($detailm[$j]==$i)
			{
				$detail.='1';
				$j++;
			}
			else {$detail.='0';}   			 
		}
	};

	if (isset($_GET['id'])){$id=$_GET['id']; echo $strSQL = "UPDATE `annonce` SET `offre`='".$catheg."',`type`='".$typ."',`annonceur`='".$pseudo."',`pays`='".$pays."',`region`='".$region."',`departement`='".$depart."',`prix`='".$prix."',`surface`='".$surface."',`description`='".$desc."',`image`='".$image."',`video`='".$video."',`adresse`='".$adresse."',`x`='".$x."',`y`='".$y."',`detail`='".$detail."' WHERE `id`='".$id."'" ;}
else{ echo $strSQL = "insert into annonce values ('','".$catheg."','".$typ."','".$pseudo."','".$pays."','".$region."','".$depart."','".$prix."','".$surface."','".$desc."','".$image."','".$video."','".$adresse."','".$x."','".$y."','".$detail."','".date('o-m-d')."','10',2)";}
 mysql_query($strSQL) or die ("Error Query [".$strSQL."]");

	if (!isset($_GET['id'])){$id=mysql_insert_id();}else{echo $req="DELETE FROM `image` WHERE `num-annonce`=".$id ;};


$path = "../img/upload/";
	for($i=0;$i<$_SESSION['i'];$i++){
		echo '<br>i='.$i;
		if(isset($_SESSION['image'.$i])){
	            	echo '<br>';
	            	echo $req = "UPDATE `image` SET `num-annonce`=".$id." WHERE `id`= '".$_SESSION['image'.$i]."'";
	            	mysql_query($req);
	            	echo '<br>'.$req2 = "UPDATE `annonce` SET `image`='1' WHERE `annonceur`='".$pseudo."'";
	            	mysql_query($req2);
	    }
	}
	$_SESSION['idannonce'] = $id;
	aff($_SESSION);
header('location:../validannonce.php');

?>