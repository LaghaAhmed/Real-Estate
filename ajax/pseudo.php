
<?php
$a=$_POST["pseudo"];
mysql_connect("localhost","root","") or die ("connexion impossible."); 
mysql_select_db("bd") or die ("base de données non accessible");


$sql = "SELECT count(pseudo) FROM annonceur WHERE pseudo='".$a."'";
                      $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
                      $data = mysql_fetch_array($req);
                      $data[0];
                      if($data[0]==1){

echo "pseudo deja utilisé";

 }?>