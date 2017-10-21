<div class="container-fluid">
  <div class="row-fluid">
    <div class="span3">   
      <div class="well sidebar-nav" style="padding: 2px;">   
        <?php
        $connex=0;
        if (!isset($_SESSION['login'])) {
        ?>
              <ul class="nav nav-list">
                <li class="nav-header">Mon compte</li>
                <li><a class='inscrir'>S'inscrire</a></li>
                <li><a class='connect'>Se connecter</a></li>
              </ul>
            <?php
            }else{ $sql = "SELECT * FROM annonceur WHERE `pseudo`='".$_SESSION['login']."'";
              $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
              $data = mysql_fetch_array($req);
              ?>
              <img src="img/profil/moy/<?php echo $data['photo'] ?>" style="align:right;position:relative;" width="60" height="60" alt="imagegc">
              <?php
              echo'&nbsp;&nbsp;&nbsp;Bonjour :'.$data["pseudo"].'<br>
              <a href="monprofil.php" style="position:relative;left:65px;top:-22px;">Modifié mon Profil</a><br>'
              ?>   
              <a class="decon" href="inc/deconnexion.php" style="position:relative;left:60%;top:-10px;"><b>Déconnexion</b></a>
            <?php } ?>
      </div>          
      <div class="well sidebar-nav">   
          <ul class="nav nav-list" style='list-style-type: none;'>          
              <li class="nav-header" >Recherche par cathegorie</li>
              <li><a href="index.php?type=Terrain">Terrain a louer</a></li>
              <li><a href="index.php?type=Terrain">Terrain a vendre</a></li>              
              <li><a href="index.php?type=Maison">Maison a louer</a></li>
              <li><a href="index.php?type=Maison">Maison a vendre</a></li>
              <li><a href="index.php?type=Bureau">Bureau a louer</a></li>
              <li><a href="index.php?type=Bureau">Bureau a vendre</a></li>
              <li><a href="index.php?type=Parking">Parking</a></li>
              <li><a href="index.php?type=Fond de commerce">Fond de commerce</a></li>              
          </ul>
      </div><!--/.well -->
      <div class="well sidebar-nav">
          <ul class="nav nav-list" style='list-style-type: none;'>
              <li class="nav-header">Rechercher dans votre ville</li>
              <li><a href="index.php?pay=Allemangne">Allemangne</a></li> 
              <li><a href="index.php?pay=France">France</a></li>
              <li><a href="index.php?pay=Suisse">Suisse</a></li>
          </ul>
      </div>  
    </div><!--/span-->