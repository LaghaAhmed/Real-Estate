<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Mon profil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">

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

   <body style='margin: auto;max-width: 1500px;min-width: 980px;width:80%'>
      <?php
        include_once("inc/head.php"); 
        include_once("inc/gauche.php");
$ps=$_SESSION['login'];
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
        <div class="span9">
          <div class="hero-unit" style=' height:90%;min-height:680px;'>           
              <form class='f' action='inc/ajout.php' method='post' align='center' enctype='multipart/form-data' id='profil'>

              <p><h1>Mon profil</h1></p>
              <br>
              <center><table width="50%" align="center"> 
                <tr><td id='photo'><img src="img/profil/<?php echo $photo ?>"  width="150" height="150" alt="image" name='photo'></td><td><input name="userimage" multi type="file" accept="image/*" id='file'/></td></tr>
                <tr><td>pseudo:*</td><td><input class="validate[required,max[15]] text-input" type='text' SIZE='2' MAXLENGTH='10' name='pseudo' placeholder="entrez un nouveau pseudo"  size="200" value="<?php echo $ps ?>"></td></tr>
                <tr><td>nom:</td><td><input type='text' SIZE='2' MAXLENGTH='10' name='nom'  placeholder="saisir votre nom" size="200" value="<?php echo $nom ?>"></td></tr>
                <tr><td>prenom:</td><td><input type='text' SIZE='2' MAXLENGTH='10' name='prenom'  placeholder="saisir votre prenom" size="200" value="<?php echo $prenom ?>"></td></tr>
                <tr><td>adresse mail:*</td><td><input class="validate[required,custom[email],max[30]]" type='email' SIZE='2' MAXLENGTH='30' name='email' size="200" value="<?php echo $mail ?>"></td></tr>
                <tr><td>skype:</td><td><input class="validate[required]" type='email' MAXLENGTH='30' name='skype' size="200" value="<?php echo $skype ?>"></td></tr>
                <tr><td>numero telephone:</td><td><input type='number' SIZE='2' MINLENGTH='8' MAXLENGTH='16' name='tel' size="200" value="<?php echo $tel ?>"></td></tr>
                <tr><td><div class='nmp'>entré votre nouveau mot de passe:</div></td>
                <td><div class='nmp'><input class="validate[required,min[6]] text-input" type='password' SIZE='2' MAXLENGTH='10' name='mp' size="200" autocomplete="off" id="password"></div></td></tr>
                <tr><td><div class='nmp'>retaper votre nouveau mot de passe:</div></td>
                <td><div class='nmp'><input class="validate[required,equals[password],min[6]] text-input" type='password' SIZE='2' MAXLENGTH='10' name='cmp' size="200" autocomplete="off" id="password2"></div></td></tr>
                <tr><td></td><td><div class='nmp'><a class="btn1">Annuler</a></div></td></tr>
                <tr><td></td><td><a class="btn2">Modifier votre mot de passe</a></td></tr>
                <tr><td></td><td><p style="position:relative;left:70px;top:15px;"><input type="submit" name="modif" value="Enregistré" class="btn btn-primary btn-large"></td></tr>
              </table></center>
            </form>
          </div>
        </div><!--/span-->
</body>
</div>
</div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>

</script>
<script>

function loadimage(e1)
{        
var files = e1.target.files;
  var filename = e1.target.files[0]; 
  var fr = new FileReader();
  fr.onload = imageHandler;  
  fr.readAsDataURL(filename);      
}
function imageHandler(e2) 
{ 
  document.getElementById('photo').innerHTML='<img src="' + e2.target.result +'" width="150" height="150">';
  j++
}

window.onload=function()
{
  document.getElementById("file").addEventListener('change', loadimage, false);
}
</script>
<?php
include_once('inc/footer.html')
?>