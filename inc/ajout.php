<?php
include_once("connexion.php");
include_once("fonction.php");
session_start();
$oldps=$_SESSION['login'];
$pseudo=$_POST['pseudo'];
$mail=$_POST['email'];
$mp=$_POST['mp'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$tel=$_POST['tel'];
aff($_POST);
$monsalt = "LIOS";
$mp = crypt($mp,$monsalt);




if ( isset($_POST['modif']) && $_POST['modif']=='Enregistré' ){

	if(isset($_FILES['userimage']))
	{
    require('imgClass.php');
     	$dossier = '../img/profil/';

                $res = "SELECT `id` FROM `annonceur` WHERE `pseudo`='".$oldps."'";
                $req = mysql_query($res) or die('Erreur SQL !<br />'.$res.'<br />'.mysql_error());
                $row = mysql_fetch_array($req);

    	 $photo = basename($_FILES['userimage']['name']);
       $ext=strrchr($photo,'.');
       $photo=$row[0].$ext;

     	if(move_uploaded_file($_FILES['userimage']['tmp_name'], $dossier . $photo)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
    	{
          $sql=mysql_query("UPDATE `annonceur` SET `photo`='".$photo."' WHERE `pseudo`='".$oldps."'");
          Img::creerMin($dossier.$photo,$dossier.'gran',$photo,150,150);
          Img::creerMin($dossier.$photo,$dossier.'moy',$photo,60,60);
          Img::creerMin($dossier.$photo,$dossier.'min',$photo,18,18);
          echo 'Upload effectué avec succès !';
   		}
    	else //Sinon (la fonction renvoie FALSE).
    	{
        echo 'Echec de l\'upload !';
     	}
	}

  if ( isset($_POST['mp']) && !empty($_POST['mp']) )
    { mysql_query("UPDATE `annonceur` SET `mp`='".$_POST['mp']."' WHERE `pseudo`='".$oldps."'");
    }

	$strSQL = "UPDATE `annonceur` SET `pseudo`='".$pseudo."',`nom`='".$nom."',`prenom`='".$prenom."',`tel`='".$tel."' WHERE `pseudo`='".$oldps."'";
	$res= mysql_query($strSQL) or die ("Error Query [".$strSQL."]"); 
	$_SESSION['login'] = $pseudo;

}elseif ( isset($_POST['inscr']) && $_POST['inscr']=='envoyer' ){
	echo $strSQL = "insert into annonceur values ('','unknown.jpg','".$pseudo."','".$mp."','','','','".$mail."')";
	mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$_SESSION['login'] = $_POST['pseudo'];

}
   header('Location: ../index.php');

?>