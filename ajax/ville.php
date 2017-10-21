<?php
  $c=$_POST['reg'];
include_once("../inc/connexion.php");

  echo "<select name='depart' id='depart' style='width:150px'>";
  echo "<option value='-2'>".$c."(tout la region)</option>";
  echo"<option value='' disabled>-------------</option>";
                $req = "SELECT * FROM `pays` WHERE `nom_region`='".$c."' GROUP BY `nom_ville`";
                $res = mysql_query($req) or die('Erreur SQL !<br />'.$req.'<br />'.mysql_error());
                while($row = mysql_fetch_array($res)){
                       echo "<option>".$row['nom_ville']."</option>";
                };    
  echo"</select>"

 ?>
