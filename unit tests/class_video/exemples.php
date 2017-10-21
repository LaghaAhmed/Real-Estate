<?php
/*
 * Voici comment utiliser cette classe.
*/


$dir = dirname(__FILE__)."/";

require_once $dir."ClassVideo.php";

//Placez ici votre embed
$embed = "";

//Création de la vidéo.
$Video = new Video( $embed );

//Récupérer son titre
$titre = $Video->getTitle();

//Récupération de la description
$description = $Video->getDesc();

//Récupération de l'auteur
$auteur = $Video->getAuthor();

//Récupération des images (1 le plus souvent)
$images = $Video->getThumbs();
?>