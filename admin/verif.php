
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8"/>
  <title>Admin Panel</title>
  <link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
      <link href="../css/bootstrap.css" rel="stylesheet">
     <?php 
            include_once("../ajax/fonctionadmin.html"); 
     ?>
</head>


<body>


<?php include_once('inc/head.php'); ?>

    <div class="tab_container">
      <div id="tab1" class="tab_content">
    <table class="tablesorter" cellspacing="0">
      <thead> 
        <tr> 

            <th>id annonce</th> 
            <th>offre</th> 
            <th>type</th> 
            <th>region</th> 
            <th>departement</th> 
            <th>prix</th> 
            <th>surface</th> 
            <th>description</th>
            <th>accept/refus</th>
        </tr> 
      </thead> 
      <tbody> 
        <?php 
          include_once("../inc/connexion.php");

          $res = "SELECT * FROM `annonce` where `verif`=0 ORDER BY `date` DESC";
          $req = mysql_query($res) or die('Erreur SQL !<br />'.$res.'<br />'.mysql_error());
          $nbr_ligne_total=mysql_num_rows($req);
  if (isset($row['id']))
    {echo '<tr><td><h3><b>aucun nouveau annonce</td></tr>';}
  else{           if (isset($_GET['p']))
                  {$p=$_GET['p'];}else $p=1;
                  $deb=($p -1)*15+1;
                  $req = mysql_query($res.' LIMIT '.$deb.',15') or die('Erreur SQL !<br />'.$res.'<br />'.mysql_error());

                  $nbr_page=ceil($nbr_ligne_total/15);

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

        <tr id='tri<?php echo $idannonce ?>'> 
            <td><?php echo $idannonce ?></td> 
            <td><?php echo $offre ?></td> 
            <td><?php echo $type ?></td> 
            <td><?php echo $region ?></td> 
            <td><?php echo $departement ?></td> 
            <td><?php echo $region ?></td> 
            <td><?php echo $surface ?></td> 
            <td><?php echo $description ?></td> 
            <td><a href="#" onclick="verif(<?php echo $idannonce ?>,'y')">accepter</a>/<a href="#" onclick="verif(<?php echo $idannonce ?>,'n')">refuser</a></td> 
        </tr> 
        <tr id='tr<?php echo $idannonce ?>'><td colspan="9"><?php $res2 = "SELECT `image` FROM `image` WHERE `num-annonce`=".$idannonce;
                    $req2 = mysql_query($res2) or die('Erreur SQL !<br />'.$res2.'<br />'.mysql_error());
                    while($row2 = mysql_fetch_array($req2)){
                      echo '<img src="../img/upload/'.$row2['image'].'"  width="75" height="75" style="padding:2px;">';
                    } ?></td></tr>
        <?php }
        if ($nbr_page!=1){?>

      <tr>
          <td>
              <ul class="pagination">
                <?php if ($p!=1){ ?>  
                  <li><a href="verif.php?p=<?php $p1=$p-1;echo $p1;?>">&laquo;</a></li> <?php };

                    for ($i = 1; $i <= $nbr_page; $i++){ 

                        echo'<li>';
                          if ($p==$i){
                            echo'<a style="color:#999999;cursor:default;">'.$i.'</a>';
                          }else{
                            echo'<a href="verif.php?p='.$i.'">'.$i.'</a>';
                          };
                        echo'</li>';
                    } ?>

                <?php if ($p!=$nbr_page){ ?> <li><a href="verif.php?p=<?php $p1=$p+1;echo $p1; ?>">&raquo;</a></li><?php };?>
              </ul>
          </td>
      </tr>
              <?php }

  }
  ?>

        
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