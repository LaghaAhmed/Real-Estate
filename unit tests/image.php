<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Upload</title>
<meta name="author" content="Pierre Pesty">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<?
/* variables à modifier */
$taillemax = 512000; // taille max d'un fichier (multiple de 1024)
$filetype = "/jpeg|gif/i"; // types de fichiers acceptés, séparés par |
$nametype = "/\.jpeg|\.jpg|\.gif/i"; // extensions correspondantes
$rep = "img/upload/"; // répertoire de destination
$maxfichier = 10; // nombre maximal de fichiers
/* fin des modifications */

// fichier courant (URI absolue) : formulaire récursif
$PHP_SELF = basename($_SERVER['PHP_SELF']);

if($_POST) {
	$msg = array(); // message
	$fichier = $_FILES['lefichier']; // simplication du tableau $_FILES
	for($i=0; $i<count($fichier['name']); $i++) {
		// nom du fichier original = nom par défaut
		$nom = $fichier['name'][$i];
		// test existence fichier
		if(!strlen($nom)) {
			$msg[] = "Aucun fichier !";
			continue;
		}
		// si un nouveau nom est renseigné (avec extension correcte)
		if(preg_match($nametype, $_POST['lenom'][$i]))
			$nom = $_POST['lenom'][$i];
		// répertoire de destination
		$destination = $rep.$nom;
		// test erreur (PHP 4.3)
		if($fichier['error'][$i]) {
			switch($fichier['error'][$i]) {
				// dépassement de upload_max_filesize dans php.ini
				case UPLOAD_ERR_INI_SIZE:
				  $msg[] = "Fichier trop volumineux !"; break;
				// dépassement de MAX_FILE_SIZE dans le formulaire
				case UPLOAD_ERR_FORM_SIZE:
				  $msg[] = "Fichier trop volumineux (supérieur à ".(INT)($taillemax/1024)." Mo)"; break;
				// autres erreurs
				default:
				  $msg[] = "Impossible d'uploader le fichier !";
			}
		}
		// test taille fichier
		//elseif($fichier['size'][$i] > $taillemax)
		//	$msg[] = "Fichier $nom trop volumineux : ".$fichier['size'][$i];
		// test type fichier
		//elseif(!preg_match($filetype, $fichier['type'][$i]))
		//	$msg[] = "Fichier $nom de type incorrect : ".$fichier['type'][$i];
		// test upload sur serveur (rep. temporaire)
		//elseif(!@is_uploaded_file($fichier['tmp_name'][$i]))
		//	$msg[] = "Impossible d'uploader $nom";
		// test transfert du serveur au répertoire
		//elseif(!@move_uploaded_file($fichier['tmp_name'][$i], $destination))
		//	$msg[] = "Problème de transfert avec $nom";
		//else
		//	$msg[] = "Fichier <b>$nom</b> téléchargé avec succès !";
	}
	// affichage confirmation
	for($i=0; $i<=count($msg); $i++)
		echo "<p>$msg[$i]</p>";
}

// 1 fichier par défaut (ou supérieur à $maxfichier)
$upload = (isset($_REQUEST['upload']) && $_REQUEST['upload'] <= $maxfichier) ? $_REQUEST['upload'] : 1;

// choix du nombre $upload de fichier(s)
echo "<form action='$PHP_SELF' method='post'>\n";
echo "Quantité <select name='upload' onChange=\"window.open(this.options[this.selectedIndex].value,'_self')\">\n";
for($i=1; $i<=$maxfichier; $i++) {
	echo "<option value='$PHP_SELF?upload=$i'";
	if($i == $upload) echo " selected";
	echo ">$i\n";
}
echo "</select>\n";
echo "<input name='upload' value='$upload' size='3'>\n";
echo "<input type='submit' value='Modifier'></form>\n";

// le formulaire
echo "<form action='$PHP_SELF' enctype='multipart/form-data' method='post'>\n";
// boucle selon nombre de fichiers $upload
for($i=1; $i<=$upload; $i++) {
	echo "<p>Nom $i <input name='lenom[]'>\n";
	echo "<input type='hidden' name='MAX_FILE_SIZE' value='$taillemax'>";
	echo "Fichier <input type='file' name='lefichier[]'></p>\n";
}
?>
<input type='submit' value='Envoyer'>
</form>

</body>
</html>