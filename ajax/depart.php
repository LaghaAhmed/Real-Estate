<?php
  $c=$_POST['reg'];
include_once("../inc/connexion.php");

  echo "<select name='depart' id='depart' style='width:150px'>";
  echo "<option value='-2'>".$c."(tout la region)</option>";
  echo"<option value='' disabled>-------------</option>";
                $res = "SELECT `nom_departement` FROM `pays` WHERE `nom_region`='".$c."' GROUP BY `nom_departement`";
                $req = mysql_query($res) or die('Erreur SQL !<br />'.$res.'<br />'.mysql_error());
                while($row = mysql_fetch_array($req)){
                       echo "<option>".$row['nom_departement']."</option>";
                };    
  echo"</select>"
  ?>
