<?php
/*
 * Voici comment utiliser cette classe.
*/


$dir = dirname(__FILE__)."/";

require_once $dir."ClassVideo.php";

//Placez ici votre embed
$embed = "";

//Cr�ation de la vid�o.
$Video = new Video( $embed );

//R�cup�rer son titre
$titre = $Video->getTitle();

//R�cup�ration de la description
$description = $Video->getDesc();

//R�cup�ration de l'auteur
$auteur = $Video->getAuthor();

//R�cup�ration des images (1 le plus souvent)
$images = $Video->getThumbs();
?>