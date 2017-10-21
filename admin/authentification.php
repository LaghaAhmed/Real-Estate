<?php 
include_once("../inc/connexion.php");
        $login=$_POST['login'];
        // on teste si une entrée de la base contient ce couple login / pass
        $sql = "SELECT count(*) FROM admin WHERE pseudo='".$login."' OR mail='".$login."' AND mp='".$_POST['mp']."'";
        $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
        $data = mysql_fetch_array($req);
        
        if ($data[0] == 1) { 
              $sql = "SELECT id,count(*) FROM admin WHERE pseudo='".$login."'";
              $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
              $data = mysql_fetch_array($req);
                    $id=$data[0];
                    if ($data[1] == 0){   
                        $sql = "SELECT id,pseudo FROM admin WHERE mail='".$login."'";
                          $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
                          $data1 = mysql_fetch_array($req);
                          $login=$data1[1];
                    }
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $id;
            $_SESSION['i'] = 0;
            header('Location: paneau-admin.php');
            exit();
            }
              // si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
            elseif ($data[0] == 0) {
          header('Location: index.php?v=f');
        }

?>