
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
    <table class="tablesorter" cellspacing="0" style='width:100%'>
      <thead> 
        <tr> 
            <th>id client</th> 
            <th>pseudo</th> 
            <th>@mail</th> 
            <th>tel</th> 
            <th>nom</th> 
            <th>prenom</th> 
            <th>annonce</th> 
        </tr> 
      </thead> 
      <tbody> 
        <?php 
          include_once("../inc/connexion.php");

          $res = "SELECT * FROM `annonceur` WHERE 1 ORDER BY `id` DESC";
          $req = mysql_query($res) or die('Erreur SQL !<br />'.$res.'<br />'.mysql_error());
           $nbr_ligne_total=mysql_num_rows($req);
           if (isset($_GET['p']))
                  {$p=$_GET['p'];}else $p=1;
                  $deb=($p -1)*15+1;
                  $req = mysql_query($res.' LIMIT '.$deb.',15') or die('Erreur SQL !<br />'.$res.'<br />'.mysql_error());

                  $nbr_page=ceil($nbr_ligne_total/15);
            while($row = mysql_fetch_array($req)){

                   $idclient=$row['id'];
                   $pseudo=$row['pseudo'];
                   $mail=$row['email'];
                   $tel=$row['tel'];
                   $nom=$row['nom'];
                   $prenom=$row['prenom'];
                   $lannonce='/';
                   $res2 = "SELECT `id` FROM `annonce` WHERE `annonceur`='".$pseudo."'" ;
                    $req2 = mysql_query($res2) or die('Erreur SQL !<br />'.$res.'<br />'.mysql_error());
                    while($row2 = mysql_fetch_array($req2)){
                      $lannonce.=" #".$row2['id']." /";
                    }               
      ?>

        <tr> 
            <td><?php echo '<a href="client.php?pseudo='.$pseudo.'">'.$idclient.'</a>' ?></td> 
            <td><?php echo $pseudo ?></td> 
            <td><?php echo $mail ?></td> 
            <td><?php echo $tel ?></td> 
            <td><?php echo $nom ?></td> 
            <td><?php echo $prenom ?></td> 
            <td><?php echo $lannonce ?></td> 
        </tr>
            <?php } 
             if ($nbr_page!=1){?>

      <tr>
          <td>
              <ul class="pagination">
                <?php if ($p!=1){ ?>  
                  <li><a href="clients.php?p=<?php $p1=$p-1;echo $p1;?>">&laquo;</a></li> <?php };

                    for ($i = 1; $i <= $nbr_page; $i++){ 

                        echo'<li>';
                          if ($p==$i){
                            echo'<a style="color:#999999;cursor:default;">'.$i.'</a>';
                          }else{
                            echo'<a href="clients.php?p='.$i.'">'.$i.'</a>';
                          };
                        echo'</li>';
                    } ?>

                <?php if ($p!=$nbr_page){ ?> <li><a href="clients.php?p=<?php $p1=$p+1;echo $p1; ?>">&raquo;</a></li><?php };?>
              </ul>
          </td>
      </tr>
              <?php }?>
        
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