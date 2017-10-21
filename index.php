<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Annonces</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
      <script type="text/javascript" src="js/fonction.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script type="text/javascript" src="js/googlemap.js"></script>


    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
      #mapCanvas img {
      max-width: none;
      }
        #mapCanvas {
    width: 429px;
    height: 480px;
  }
    </style>

<!--************************************************Partie ajax***********************************************************************-->
  </head>
<!--**********************************************************BODY***************************************************************-->
  <body style='margin: auto;max-width: 1500px;min-width: 980px;width:80%'  id="body" class="preload">
            <?php 
            include_once("inc/head.php"); 
            include_once("inc/gauche.php");
            ?>
            
      <div class="span9">
          <div class="hero-unit" id='recherche-div' style='min-height:2200px'> 
                      
            <form name="r" method="post" class='ajax' action='inc/resultatrecherche.php'>
              <h1>Rechercher Professionnel</h1>
              <br>

              <?php if((isset($_GET["pays"]))&&(($_GET["pays"])=='f')){ ?>

              
                <div id='mapCanvas' style="position:relative;width: 800px;height: 480px;">
                </div>

              <?php }else{
              ?>

              <div class="map" id="map" style="float:left;position:relative;top:-42px;left:22px">
                <img src="img/void.png" width="429" height="480" usemap="#Map" alt="map" />
                <map name="Map">
                <area shape="poly" coords="242,344,241,343,238,342,237,340,236,338,233,338,232,336,228,337,228,335,223,335,221,333,213,336,210,336,205,342,205,346,204,348,196,350,187,346,186,342,174,336,172,338,164,337,156,333,147,325,144,319,153,302,158,284,161,281,158,277,162,274,161,272,152,256,152,254,154,253,150,246,150,243,144,241,135,232,131,232,127,226,129,226,132,225,132,223,129,222,128,221,128,218,132,216,140,215,140,216,143,216,145,215,149,215,153,220,153,222,155,222,158,222,161,223,163,223,165,224,167,224,167,220,168,217,169,215,169,212,167,211,167,206,168,204,171,205,177,206,177,208,175,209,175,211,187,216,189,216,191,210,203,208,208,206,210,201,213,190,224,190,224,195,226,198,230,199,233,207,239,208,241,210,239,213,243,217,248,215,247,218,255,226,261,227,266,227,269,234,284,238,277,253,275,264,269,262,264,272,260,273,255,281,254,288,262,283,265,293,262,295,266,304,259,307,260,313,263,314,262,317,260,317,260,323,268,328,268,334,253,344,242,344" href="index.php?pays=f"/>
                <area shape="poly" coords="315,364,319,364,342,387,351,387,356,395,359,395,360,397,358,400,366,398,369,401,367,403,375,410,377,409,380,411,380,416,383,422,386,431,386,432,381,433,382,436,379,441,376,441,370,444,364,444,361,447,349,447,343,443,339,445,334,444,331,449,331,452,333,456,336,455,352,465,355,464,362,471,368,472,370,473,374,466,371,459,374,448,378,446,379,450,385,449,393,438,393,433,397,430,400,431,403,429,401,420,396,416,392,416,393,407,399,401,404,404,410,404,413,410,419,414,421,404,412,396,382,381,384,377,387,375,384,372,372,373,358,362,350,341,345,340,334,329,334,319,337,316,332,309,335,306,341,306,347,302,348,304,352,298,350,292,352,288,350,286,338,285,333,279,334,277,333,275,327,278,321,278,317,281,314,280,312,279,311,282,312,285,310,286,307,284,306,285,306,288,307,290,306,291,303,290,301,290,299,291,298,288,297,287,293,294,293,298,289,297,283,288,278,295,274,295,264,295,267,302,267,305,264,308,260,308,262,311,265,313,264,318,262,320,266,325,272,326,272,329,269,331,270,334,275,332,285,323,296,329,303,333,306,336,304,340,306,344,307,352,313,356" href="index.php?pays=i"/>
                <area shape="poly" coords="266,293,265,285,262,280,257,283,256,280,267,270,269,264,276,265,287,264,288,262,302,267,301,272,306,279,311,276,312,279,310,285,306,283,306,289,300,289,297,285,292,297,283,287,276,294" href="index.php?pays=s" />
                <area shape="poly" coords="276,263,285,238,268,232,266,226,269,221,264,216,268,210,264,198,269,190,266,182,275,182,280,174,276,171,276,169,280,169,284,158,279,154,284,150,293,150,296,153,299,147,302,149,302,144,298,140,303,138,300,131,303,128,309,131,313,130,317,134,316,137,323,141,328,140,327,144,325,146,329,148,332,146,343,141,349,141,350,138,353,140,356,142,352,145,357,146,362,151,359,152,362,155,363,165,361,169,361,171,365,175,365,180,367,181,366,183,367,195,370,197,370,204,366,207,364,206,361,202,359,207,344,214,341,213,337,217,334,216,338,224,338,230,342,235,345,236,351,244,352,244,355,249,352,251,349,250,350,253,342,258,344,261,345,269,340,267,334,266,319,271,314,268,310,273,305,267,301,266,298,263,292,263,289,260,284,264" href="index.php?pays=a" />
                <area shape="poly" coords="357,249,352,241,350,241,344,234,341,232,339,227,341,224,336,218,362,206,367,207,371,205,387,212,386,216,389,220,392,218,391,215,395,215,398,217,402,216,402,222,406,222,420,231,406,244,391,248,381,248,370,243,365,250,360,251" href="index.php?pays=t" />
                <area shape="poly" coords="279,153,266,155,262,157,261,163,264,166,260,171,258,169,259,167,260,164,258,162,256,157,251,172,237,185,236,188,244,190,248,186,260,192,264,197,268,192,265,181,274,181,279,175,275,169,279,168,283,159" href="index.php?pays=pb" />
                <area shape="poly" coords="233,187,242,191,248,188,253,189,262,196,260,201,265,203,267,210,264,212,261,213,258,219,259,224,255,225,248,218,248,213,243,216,240,213,241,210,237,207,234,206,230,197,226,197,224,190" href="index.php?pays=l" />
                <area shape="poly" coords="259,225,259,218,262,214,268,222,264,227" href="index.php?pays=b" />
                <area shape="poly" coords="124,186,132,191,135,187,144,187,148,191,157,185,160,184,164,189,176,188,180,192,182,188,199,192,211,188,213,183,206,180,215,172,219,169,221,160,217,152,209,151,207,153,204,153,207,150,208,149,207,135,205,134,205,130,207,129,204,126,204,122,197,118,197,99,194,97,194,92,187,88,183,89,184,86,190,86,191,84,188,83,188,81,193,81,194,78,203,66,203,60,190,58,189,56,186,56,183,57,185,54,183,52,195,47,203,32,200,29,194,31,192,36,194,38,194,40,183,39,177,36,173,42,171,42,169,47,164,47,165,52,162,54,161,49,158,48,153,53,158,60,155,62,157,63,159,62,159,65,156,66,151,75,160,75,158,78,147,83,149,87,156,84,152,94,155,94,158,91,160,94,163,87,165,92,156,101,157,107,159,108,160,106,164,110,165,107,169,109,175,107,170,115,174,124,170,135,159,134,156,130,154,132,156,138,151,142,157,142,155,151,140,155,140,163,148,161,150,166,155,166,156,171,162,172,161,174,148,171,132,184,130,185" href="index.php?pays=u" />
                <area shape="poly" coords="205,349,196,351,185,346,183,342,175,337,171,340,164,338,145,325,143,320,135,318,128,314,124,316,118,311,107,310,90,300,87,300,74,297,71,292,65,289,57,294,43,295,42,305,43,311,40,317,39,319,51,317,51,319,50,322,60,326,64,324,71,328,71,333,74,336,70,339,62,344,59,356,55,357,56,361,57,363,52,367,45,365,46,375,49,379,41,387,44,396,40,397,34,404,32,411,38,412,45,421,43,424,46,428,45,433,54,441,62,434,67,435,72,434,74,433,88,435,101,440,103,438,108,441,115,435,117,431,126,429,134,430,132,427,141,415,153,411,147,404,147,395,168,375,168,373,173,371,189,368,189,367,206,360,205,355,208,352,205,351" href="index.php?pays=s" />
                <area shape="poly" coords="32,409,28,411,23,411,15,406,8,406,16,395,16,388,20,383,20,380,15,380,14,378,15,373,12,374,12,371,18,361,22,360,38,336,40,320,50,318,49,322,61,327,64,324,70,328,70,333,73,336,61,344,58,356,54,355,56,361,52,366,45,365,45,376,48,378,41,386,43,395,33,404" href="index.php?p" />
                </map>
              </div>
              <?php };?>
              <!--******************************************************************************div recherche***********************************************************************************-->
              <div class="menurecherchepro" style='position:relative;float:left;width:100%;min-height:550px;margin: 0 auto -340px;' >
                
                <br>
                  <table style="width:58%; table-layout: fixed;">
                      <tr>
                        <td>
                          <pre>Deplacer la point rouge sur l'endroit ou vous voulez trouver des proprietés</pre>
                          <div style='display:inline-block;width:13%;margin:1px;background-color:#b0c4de;'><h5>Adresse</H5></div><input  id="adresse" type='text' name='adresse' style='width:350px' placeholder="Positionnez le point rouge sur votre proprieté"><br>
          <div style='display:inline-block;width:13%;margin:1px;background-color:#b0c4de;'><h5>Info Google</H5></div><input  id="info" type='text' name='info' style='width:350px'placeholder="Positionnez le point rouge sur votre proprieté"><br>
                          

                          <div style='display:inline-block;width:13%;margin:1px;background-color:#b0c4de;'>
                          <h5>Lieu:</h5>

                          </div>

                           <select name='pays' id='pays' onchange='go2()' style='width:150px'>
                            <option>Tout l Europe</option>
                            <option disabled>-------------</option>
                            <?php
                                include_once("inc/connexion.php");
                                $res = mysql_query("SELECT pays FROM lieu GROUP BY pays");
                                while($row = mysql_fetch_array($res)){
                                  echo "<option>".$row["pays"]."</option>";
                                }
                              ?>
                          </select>
                          <div id='region' style='display:inline-block'>
                          </div>
                          <div id='departement'  style='display:inline-block'>
                          </div>  
                          <input type='checkbox' name='chb' id='sat' style='display:inline-block' value='s'>Satellite
                      </tr>
                      <tr  valign="top">
                        <td><div style='display:inline-block;width:13%;margin:1px;background-color:#b0c4de;'><h5>Cathegorie:</h5></div>
                        <select name="catheg" id='catheg' onchange="go()" style='width:150px'>
                          <option value="">Toutes les offres</option>
                          <option value="" disabled>-------------------------</option>
                          <option value="Terrain">Terrain</option>
                          <option value="Maison">Maison</option>
                          <option value="Bureau">Bureau</option>
                          <option value="Parking">Parking</option>          
                          <option value="Fond de commerce">Fond de commerce</option>
                          <option value="Divers">Divers</option>
                          </select>
                          &nbsp&nbsp
                          <INPUT type="checkbox" name="chb1" id="v" value="v"> à vendre ou
                          <INPUT type="checkbox" name="chb2" id="l" value="l"> à louer
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div style='display:inline-block;width:49%;margin:1px'><h5 style='display:inline'>Prix entre:</h5><input type='number' id='pmin' name='pmin' style='width:25%' placeholder='200' MIN='200'> et <input type='number' id='pmax' name='pmax' style='width:25%' placeholder='5000' MAX='100000'><div id="prixbar" style='width:95%'></div></div>    
                          <div style='display:inline-block;width:49%;margin:1px'><h5 style='display:inline'>Surface entre:</h5><input type='number' id='smin' name='smin' style='width:25%' placeholder='200' MIN='200'> et <input type='number' id='smax' name='smax' style='width:25%' placeholder='200'  MAX='10000'><div id="surfbar" style='width:95%'></div></div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div id='avance' disabled></div>
                        </td>
                      </tr>
                      <tr>
                        <td align='right'>
                          <input type="submit" value=" Rechercher " class="butt">
                        </td>
                      </tr>
                  </table>
              </div>
              </form>
          
      <!--******************************************************************************resultat recherche***********************************************************************************-->
              <div id='resultatrecherche' style='position:relative;top:80px;float:left'>

                  <?php 
                  if (isset($_GET['p']))
                  {$p=$_GET['p'];}else $p=1;
                  $deb=($p -1)*15+1;
                  if (isset($_GET['type']))
                  {
                  $req = "SELECT * FROM `annonce` where `verif`=1 AND `offre`='".$_GET['type']."' ORDER BY `date` DESC";
                  $total = mysql_query($req);
                  $nbr_ligne_total=mysql_num_rows($total);
                  $info='&type='.$_GET['type'];
                  }
                  elseif (isset($_GET['pay']))
                  {
                  $req = "SELECT * FROM `annonce` where `verif`=1 AND `pays`='".$_GET['pay']."' ORDER BY `date` DESC";
                  $total = mysql_query($req);
                  $nbr_ligne_total=mysql_num_rows($total);
                  $info='&pay='.$_GET['pay'];
                  }
                  else
                  {
                  $req = "SELECT * FROM `annonce` where `verif`=1 ORDER BY `date` DESC";
                  $total = mysql_query($req);
                  $nbr_ligne_total=mysql_num_rows($total);
                  $info='';
                  }

                  $res = mysql_query($req.' LIMIT '.$deb.',15') or die('Erreur SQL !<br />'.$req.'<br />'.mysql_error());
                  $nbr_page=ceil($nbr_ligne_total/15);
                  include_once('inc/aff-annonce.php');
                  ?>

              </div>
          </div><!-- fin cadre -->
<?php if (!isset($_SESSION['id'])){
 echo'<script>$(".savelien").hide();$(".unsavelien").hide(); </script>';}
 ?>
  </div>
</div>
    </body>




  <?php 
include_once('inc/footer.html')
?>


