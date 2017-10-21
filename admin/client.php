
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8"/>
  <title>Admin Panel</title>
  <link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
</head>


<body>

  <header id="header">
    <hgroup>
      <h1 class="site_title"><a href="index.php">Spotnet Admin</a></h1>
      <h2 class="section_title">Control panel</h2><div class="btn_view_site"><a href="http://www.spotnet.com" target="_blank" >View Site</a></div>
    </hgroup>
  </header> <!-- end of header bar -->
  
  <section id="secondary_bar">
    <div class="user">
      <p>Welcome admin</p>
        <a class="logout_user" href="home/logout" title="Logout">Logout</a>
    </div>
    <!--<div class="breadcrumbs_container">
      <article class="breadcrumbs"><a href="index.html">Website Admin</a> <div class="breadcrumb_divider"></div> <a class="current">Dashboard</a></article>
    </div>-->
  </section><!-- end of secondary bar -->
  
  <aside id="sidebar" class="column">
    <form class="quick_search">
      <input type="text" value="Quick Search" onFocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
    </form>
    <hr/>
    
    <h3>Admin</h3>
    <ul class="toggle">
      <li class="icn_new_article"><a href="http://localhost/monprojet/admin2/index.php/main/commandes">Orders</a></li>
      <li class="icn_folder"><a href="http://localhost/monprojet/admin2/index.php/main/packs">Packs</a></li>
      <li class="icn_photo"><a href="verif.php">Annonces à verifier</a></li>
      <li class="icn_profile"><a href="clients.php">Clients</a></li>
      <li class="icn_categories"><a href="annonce.php">Tous les annonces</a></li>
      <li class="icn_settings"><a href="signal.php">Annonces signalés</a></li>  
      <li class="icn_profile"><a href="admin.php">Admin</a></li>
      <li class="icn_jump_back"><a href="index.php">Logout</a></li>
    </ul>
    
    <footer>
      <hr />
      <p><strong>Copyright &copy; 2013 Spotnet Admin</strong></p>
      
    </footer>
  </aside><!-- end of sidebar -->
  
<section id="main" class="column">
    <div class="spacer">

<article class="module width_3_quarter">
    <header><h3 class="tabs_involved">Content Manager</h3>
    </header>

    <div class="tab_container">
      <div id="tab1" class="tab_content">
    <table class="tablesorter" cellspacing="0" style='width:100%'>
      <thead> 
        <tr> 
            <th>id annonce</th> 
            <th>offre</th> 
            <th>type</th> 
            <th>prix</th> 
            <th>region</th> 
            <th>departement</th> 
            <th>surface</th> 
            <th>description</th>
        </tr> 
      </thead> 
      <tbody> 
        <?php 
          include_once("../inc/connexion.php");

          $res = "SELECT * FROM `annonce` where `annonceur`='".$_GET['pseudo']."' ORDER BY `id` DESC";
          $req = mysql_query($res) or die('Erreur SQL !<br />'.$res.'<br />'.mysql_error());
            while($row = mysql_fetch_array($req)){

                   $idannonce=$row['id'];
                   $offre=$row['offre'];
                   $type=$row['type'];
                   $annonceur=$row['annonceur'];
                   $pays=$row['pays'];
                   $region=$row['region'];
                   $departement=$row['departement'];
                   $prix=$row['prix'].'€';
                   $surface=$row['surface'].'m²';
                   $description=$row['description'];
                   $image=$row['image'];
                   $video=$row['video'];
                   $detail=$row['detail'];
                   $date=$row['date'];
                   
        ?>

        <tr> 
            <td><?php echo $idannonce ?></td> 
            <td><?php echo $offre ?></td> 
            <td><?php echo $type ?></td> 
            <td><?php echo $prix ?></td> 
            <td><?php echo $region ?></td> 
            <td><?php echo $departement ?></td> 
            <td><?php echo $surface ?></td> 
            <td><?php echo $description ?></td> 
        </tr> 
        <tr><td colspan="9"><?php $res2 = "SELECT `image` FROM `image` WHERE `num-annonce`=".$idannonce ;
                    $req2 = mysql_query($res2) or die('Erreur SQL !<br />'.$res.'<br />'.mysql_error());
                    while($row2 = mysql_fetch_array($req2)){
                      echo '<img src="../img/upload/'.$row2['image'].'"  width="75" height="75" style="padding:2px;">';
                    } ?></td></tr>
        <?php } ?>
        
      </tbody> 
      </table>
      </div><!-- end of #tab1 -->
      
    </div><!-- end of .tab_container -->
    
    </article><!-- end of content manager article -->
    
    <article class="module width_quarter">
      <header><h3>Messages</h3></header>
      <div class="message_list">
        <div class="module_content">
          <div class="message"><p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor.</p>
          <p><strong>John Doe</strong></p></div>
          <div class="message"><p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor.</p>
          <p><strong>John Doe</strong></p></div>
          <div class="message"><p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor.</p>
          <p><strong>John Doe</strong></p></div>
          <div class="message"><p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor.</p>
          <p><strong>John Doe</strong></p></div>
          <div class="message"><p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor.</p>
          <p><strong>John Doe</strong></p></div>
        </div>
      </div>
      <footer>
        <form class="post_message">
          <input type="text" value="Message" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
          <input type="submit" class="btn_post_message" value=""/>
        </form>
      </footer>
    </article><!-- end of messages article -->

    </div>
  </section>

</body>

</html>