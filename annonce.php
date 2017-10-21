<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Annonces</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
              <script type="text/javascript" src="js/fonction.js"></script>


    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style>
      html, body, #map-canvas {
        height: 50%;
        margin: 0px;
        padding: 0px
      }
      #map-canvas img {
      max-width: none;
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>

            <?php 
            include_once("inc/head.php"); 
            include_once("inc/gauche.php");
            
                   $idannonce=$_GET['id'];              
                   $strSQL = "SELECT * FROM `annonce` WHERE `id`=".$idannonce;;
                   mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
                   $res=mysql_query($strSQL);
                   $row = mysql_fetch_array($res);
                   $ps=$row['annonceur'];
                   $offre=$row['offre'];
                   $type=$row['type'];
                   $annonceur=$row['annonceur'];
                   $pays=$row['pays'];
                   $region=$row['region'];
                   $departement=$row['departement'];
                   $prix=$row['prix'];
                   $surface=$row['surface'];
                   $description=$row['description'];
                   $image=$row['image'];
                   $video=$row['video'];
                   $yt=substr(strrchr($video,'='),1);
                   $detail=$row['detail'];
                   $date=$row['date'];
                   $nbrvote=$row['nbrvote'];
                   $adresse=$row['adresse'];
                   $x=$row['x'];
                   $y=$row['y'];
                   $info=$x.', '.$y;
         
      ?>
          <script>
function initialize() {
  var mapOptions = {
    scaleControl: true,
    center: new google.maps.LatLng(<?php echo $info ?>),
    zoom: 11,
    mapTypeId: google.maps.MapTypeId.HYBRID,
    titre:'Votre proprieté'
  };

  var map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);

  var marker = new google.maps.Marker({
    map: map,
    position: map.getCenter()
  });
  var infowindow = new google.maps.InfoWindow();
  infowindow.setContent('<b>القاهرة</b>');
  google.maps.event.addListener(marker, 'click', function() {
      infowindow.open(map, marker);
  });
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>

    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">

   <?php  

            include_once("inc/connexion.php"); 
            include_once("inc/fonction.php"); 

            ?>
  </head>
<!--**********************************************************BODY***************************************************************-->
  
  <body style='margin: auto;max-width: 1500px;min-width: 980px;width:80%'>

        <div class="span9" style='width:64%'>
          <div class="hero-unit" style=' height:90%;min-height:1100px;'> 


                <h2 style='display: block;float: right;'><?php echo $prix.' €' ?></h2>
                <h1><u><?php echo '-'.$offre.' à ';
                        if ($type==1){echo 'vendre';}
                        elseif ($type==2){ echo 'louer';}
                        else {echo 'vendre ou à louer';};
                    ?></u></h1> <br>


                <form name="r" method="post" enctype="multipart/form-data" action="index.php" >
                    <div id='donnée+map'>
                    <div style='float:left;width:49%'>                  
                        <div>
                          <br>
                          <p style='margin: 16px 0 10px 0;padding-bottom: 0px;color: #c7c7c7;font: bold 19px Arial;'>Donnée du bien</p>
                           <hr style='color:#bbb;'>
                           <?php echo '<b>Adresse:</b>'.$adresse.'<br/>' ;
                              echo '<b>Surface:</b> '.$surface.' m²<br/>';
                              if (isset($detail)){
                              echo '<b>nombre de chambre : </b> '.$detail[0].'<br/>';
                                if ($detail[1]){ echo '<b>Picine :</b> oui<br/>';}
                                if ($detail[2]){ echo '<b>Garage :</b> oui<br/>';}
                                if ($detail[3]){ echo '<b>Jardin :</b> oui<br/>';}
                                if ($detail[4]){ echo '<b>Cave :</b> oui<br/>';}
                                if ($detail[5]){ echo '<b>Cheminée :</b> oui<br/>';}
                                if ($detail[6]){ echo '<b>Terrasse :</b> oui<br/>';}
                            }
                              ?>
                        </div>

                        <br>
                        <div>
                        <p style='margin: 16px 0 10px 0;padding-bottom: 0px;color: #c7c7c7;font: bold 19px Arial;'>Description</p>
                        <hr style='color:#bbb;'>
                        <?php echo $description; ?>
                        </div><br>

                        <p style='padding-bottom: 0px;color: #c7c7c7;font: bold 19px Arial;'>Images</p>
                        <hr style='color:#bbb;width:100%'>
                    </div><!--fin div gauche -->
                    <div id='map-canvas' style='width: 50%;height: 480px;float:right'></div>
                  </div><!--fin div donnée+map -->

                
        <div style="line-height: 154px;border: 2px dashed #DDDDDD;border-radius: 2px;padding:2px;float:left;width:100%">
              <?php

                        $res = "SELECT `image` FROM `image` WHERE `num-annonce`=".$idannonce ;
                        $req = mysql_query($res) or die('Erreur SQL !<br />'.$res.'<br />'.mysql_error());
                        while($row = mysql_fetch_array($req)){
                            echo '<img src="img/upload/'.$row['image'].'"  style="width:25%;height:150px;padding:2px;">';
                        };    
                    ?>
        </div>
        <br>


                <?php if ($yt!='0'){ ?>  <br><div id='video' style="float:left;width:100%"><p style='margin: 16px 0 10px 0;padding-bottom: 0px;color: #c7c7c7;font: bold 19px Arial;'>Video</p>
                <hr style='color:#bbb;'><iframe width="560" height="315" src="//www.youtube.com/embed/<?php echo $yt ?>?rel=0" frameborder="0" allowfullscreen></iframe></div>
                <?php }?>
            </form>
          </div>
        </div>
         <div class="span3" style='width:15%'> 
            <div class="well sidebar-nav" style="padding: 2px;">
                  <?php
                      $strSQL = "SELECT * FROM annonceur WHERE pseudo='".$ps."'";  
                      $res= mysql_query($strSQL) or die ("Error Query [".$strSQL."]"); 
                                     $row = mysql_fetch_array($res);
                                          $nom=$row['nom'];
                                          $prenom=$row['prenom'];
                                          $tel=$row['tel'];
                                          $mail=$row['email'];
                                          $photo=$row['photo'];
                                          $skype=$row['skype'];
                  ?>    
              <form method='post' align='center' enctype='multipart/form-data' id='profil'>

          <img src="img/profil/gran/<?php echo $photo ?>"  width="150" height="150" alt="image" name='photo'><br><br>
               pseudo:<?php echo $ps ?><br>
               mail:<?php echo $mail ?><br>
               <?php if ($tel!='') { ?>numero telephone:<?php echo $tel ?><br> <?php } ?>
               <?php if ($skype!='') { ?> skype:<?php echo $skype ?><br> <?php } ?>

                
               <input type="submit" name="modif" value="Contacter l'annonceur" class="btn btn-primary btn-large">
      
            </form>
            </div>
        </div>
    </body>
  </div>
</div>

<?php          
include_once('inc/footer.html')
?>