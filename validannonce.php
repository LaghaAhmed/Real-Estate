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
            
                   $idannonce=($_SESSION['idannonce']);                 
                   $strSQL = "SELECT * FROM `annonce` WHERE `id`=".$idannonce;;
                   mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
                   $res=mysql_query($strSQL);
                   $row = mysql_fetch_array($res);
                   $offre=$row['offre'];
                   $type=$row['type'];
                   $annonceur=$row['annonceur'];
                   $pays=$row['pays'];
                   $region=$row['region'];
                   $departement=$row['departement'];
                   $prix=$row['prix'];
                   $adresse=$row['adresse'];
                   $surface=$row['surface'];
                   $description=$row['description'];
                   $image=$row['image'];
                   $video=$row['video'];
                   $yt=substr(strrchr($video,'='),1);
                   $detail=$row['detail'];
                   $date=$row['date'];
                   $nbrvote=$row['nbrvote'];
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
if ($_SESSION['idannonce']=='0') header('location:cree-annonce.php');
            include_once("inc/connexion.php"); 
            include_once("inc/fonction.php"); 

            ?>
  </head>
<!--**********************************************************BODY***************************************************************-->
  
  <body style='margin: auto;max-width: 1500px;min-width: 980px;width:80%'>

          

        <div class="span9">
          <div class="hero-unit" style='min-height:980px;'> 
            <h1>Verifier votre annonce avant de le poser</h1><br>
            <h2 style='display: block;float: right;'><?php echo $prix.' €' ?></h2>
            <h1><u><?php echo $offre.' à ';
                    if ($type==1){echo 'vendre';}
                    elseif ($type==2){ echo 'louer';}
                    else {echo 'vendre ou à louer';};
                ?></u></h1> <br>


            <form name="r" method="post" enctype="multipart/form-data" action="index.php" >
            	

    
<div style='float:left;width:58%'>

        <div>
          <br>
        <p style='margin: 16px 0 10px 0;padding-bottom: 0px;color: #c7c7c7;font: bold 19px Arial;'>Donnée du bien</p>
        <hr style='color:#bbb;'>
        <?php echo '<b>Adresse:</b> '.$adresse.'<br/>' ;
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
        <?php echo $description.'<br/>' ?>
        </div>
        <div style="float:right;position:absolute;bottom:20px;right:15px;clear:right">
            <p><a class="btn btn-primary btn-large"  href="cree-annonce.php?id=<?php echo $idannonce ?>">Modifier l'annonce</a></p>
            <p><a class="btn btn-primary btn-large"  href="mes-annonces.php">Déposer l'annonce</a></p>
        </div>
        <br>
        <p style='margin: 16px 0 10px 0;padding-bottom: 0px;color: #c7c7c7;font: bold 19px Arial;'>Images</p>
        <hr style='color:#bbb;'>



        <div style="line-height: 154px;border: 2px dashed #DDDDDD;border-radius: 2px;padding:2px;float:left;width:100%">
              <?php

                        $res = "SELECT `image` FROM `image` WHERE `num-annonce`=".$idannonce ;
                        $req = mysql_query($res) or die('Erreur SQL !<br />'.$res.'<br />'.mysql_error());
                        while($row = mysql_fetch_array($req)){
                            echo '<img src="img/upload/'.$row['image'].'"  style="width:25%;height:150px;padding:2px;">';
                        };    
                    ?>
        </div>

        <?php
        if ($yt!='0'){ ?> 
            
            <div id='video'><br/><p style='margin: 16px 0 10px 0;padding-bottom: 0px;color: #c7c7c7;font: bold 19px Arial;'>Video</p>
        <hr style='color:#bbb;'>
        <iframe width="560" height="315" src="//www.youtube.com/embed/<?php echo $yt ?>?rel=0" frameborder="0" allowfullscreen></iframe>
            </div>

        <?php }?>
</div><!--/div gauche -->
          <div id='map-canvas' style='width: 40%;height: 480px;float:right'></div>
          </form>
      </div>
    </div>
    </body>
  </div>
</div>



<?php       
include_once('inc/footer.html')
?>