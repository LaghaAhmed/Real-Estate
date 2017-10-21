    <meta charset="utf-8">
<?php 
include_once("../inc/connexion.php");
$b=$_POST['pays'];
  echo "<select name='reg' id='reg' style='width:150px' onchange='go3()'>";
  echo "<option value=''>".$b."(tout les regions)</option>";
  echo "<option value='' disabled>-------------</option>";
  $res = "SELECT * FROM `pays` WHERE `nom_pays`='france' GROUP BY `nom_region`";
  $req = mysql_query($res) or die('Erreur SQL !<br />'.$res.'<br />'.mysql_error());
  while($row = mysql_fetch_array($req)){
        echo "<option>".$row['nom_region']."</option>";
  };    
  echo"</select>"    
 ?>

