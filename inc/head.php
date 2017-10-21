

   <style type="text/css">

#connect {background-color: #F5F5F5;
    background-image: -moz-linear-gradient(center top , #FFFFFF, #E6E6E6);
    background-repeat: repeat-x;
    border-color: #E6E6E6 #E6E6E6 #B3B3B3;
    border-image: none;
    border-radius: 4px;
    border-style: solid;
    border-width: 1px;
    box-shadow: 0 1px 0 rgba(255, 255, 255, 0.2) inset, 0 1px 2px rgba(0, 0, 0, 0.05);
    color: #333333;
    cursor: pointer;
    display: inline-block;
    font-size: 13px;
    line-height: 18px;
    margin-bottom: 0;
    padding: 4px 10px;
    text-align: center;
    text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
    vertical-align: middle;}

.lb_close {
    float: right;
}

.fermerimage {
    background: url("img/glyphicons/fermer.png");
    height: 20px;
    width: 45px;

}
.saveimage {
    background-image: url("img/glyphicons/tr-icon.png");
    background-position: -523px -48px;
    background-repeat: no-repeat;
    display: inline-block;
    height: 36px;
    vertical-align: text-top;
    width: 36px;
}
.savedimage {
    background-image: url("img/glyphicons/tr-icon.png");
    background-position: -569px -53px;
    background-repeat: no-repeat;
    display: inline-block;
    height: 36px;
    vertical-align: text-top;
    width: 36px;
}

.supp {
    background: url("img/glyphicons/del16.png") no-repeat;
    height: 16px;
    width: 16px;
}
    #cbox ,#ibox{
    border: 1px solid #7A849F;
    border-radius: 3px;
    left: 0;


    position: absolute;
    top: 0;
    z-index: 100;
    background:#FFFFFF;
}

      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
      #myForm input:required:invalid{
        background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAMCAYAAABWdVznAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAT1JREFUeNpi/P//PwMpgImBRMACY/x7/uDX39sXt/67cMoDyOVgMjBjYFbV/8kkqcCBrIER5KS/967s+rmkXxzI5wJiRSBm/v8P7NTfHHFFl5mVdIzhGv4+u///x+xmuAlcdXPB9KeqeLgYd3bDU2ZpRRmwH4DOeAI07QXIRKipYPD35184/nn17CO4p/+cOfjl76+/X4GYAYThGn7/g+Mfh/ZZwjUA/aABpJVhpv6+dQUjZP78Z0YEK7OezS2gwltg64GmfTu6i+HL+mUMP34wgvGvL78ZOEysf8M1sGgZvQIqfA1SDAL8iUUMPIFRQLf+AmMQ4DQ0vYYSrL9vXDz2sq9LFsiX4dLRA0t8OX0SHKzi5bXf2HUMBVA0gN356N7p7xdOS3w5fAgcfNxWtn+BJi9gVVBOQfYPQIABABvRq3BwGT3OAAAAAElFTkSuQmCC");
        background-position: right top;
        background-repeat: no-repeat;
        box-shadow: none;
      }
      #myForm input:required:valid{
        background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAMCAYAAABWdVznAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAZZJREFUeNpi/P//PwMpgImBRMAy58QshrNPTzP8+vOLIUInisFQyYjhz98/DB9/fmT48/+35v7H+8KNhE2+WclZd+G0gZmJmYGThUNz1fUVMZtvbWT59eUXG9wGZIWMUPj993eJ5VeWxuy8veM/CzPL3yfvH/9H0QBSBDYZyOVm4mGYfn6q4cory5lYmFh+MrEwM/76/YsR7mk2ZjbWP///WP37/y8cqIDhx58fjvtu7XV6//ndT34G/v8FasUsDjKO/+A2PP3wpGLd+TVsfOz8XH6KAT+nHpokcu7h6d9q/BoMxToVbBYqlt9///+1GO4/WVdpXqY/zMqXn13/+vTjI9mj94/y//v9/3e9ZRObvYbDT0Y2xnm///x+wsfHB3GSGLf41jb3rv0O8nbcR66d+HPvxf2/+YZFTHaqjl8YWBnm/vv37yly5LL8+vuLgYuVa3uf/4T/Kd8SnSTZpb6FGUXwcvJxbAPKP2VkZESNOBDx8+9PBm4OwR1TwmYwcfzjsBUQFLjOxs52A2YyKysrXANAgAEA7buhysQuIREAAAAASUVORK5CYII=");
        background-position: right top;
        background-repeat: no-repeat;
      }
      p{display:inline;}

      .head1{
        height:148px;
        background:url(img/head.png);  
        background-repeat: no-repeat;
        -webkit-background-size:100%;
        -o-background-size:100%;
        background-size:100%
      }
      .valign {
        float:right;
        position:relative;
        top:18px;
      }
    </style>

<?php


session_start();
include_once("inc/fonction.php");
include_once("inc/connexion.php");
$connex=0;

if (isset($_SESSION['login'])) {
$connex=1;
}
elseif (isset($_POST['connexion']) && $_POST['connexion'] == 'Seconnecter') {
    if (( isset($_POST['login'])) && ( isset($_POST['mp']))) {
        $login=$_POST['login'];
        // on teste si une entrée de la base contient ce couple login / pass
        $mp=crypt($_POST['mp'],'LIOS');
        $sql = "SELECT count(*) FROM annonceur WHERE pseudo='".$login."' OR email='".$login."' AND mp='".$mp."'";
        $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
        $data = mysql_fetch_array($req);
        
        if ($data[0] == 1) { 
          $sql = "SELECT id,count(*) FROM annonceur WHERE pseudo='".$login."'";
          $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
          $data = mysql_fetch_array($req);
                $id=$data[0];
                if ($data[1] == 0){   
                    $sql = "SELECT id,pseudo FROM annonceur WHERE email='".$login."'";
                      $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
                      $data = mysql_fetch_array($req);
                      $id=$data[0];
                      $login=$data[1];
                }
        $_SESSION['login'] = $login;
        $_SESSION['id'] = $id;
        
        header('Location: index.php');
        exit();
        }
          // si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
        elseif ($data[0] == 0) {
          echo $erreur = 'Compte non reconnu.';
        }
          // sinon, alors la, il y a un gros problème :)
        else {
        echo $erreur = 'Probème dans la base de données : plusieurs membres ont les mêmes identifiants de connexion.';
        }
    }
else {
    echo 'Au moins un des champs est vide.';
    }
}
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
    <script src="js/jquery.js"></script>
<script>
    $(".bigbox").hide();
    $("#ibox").hide();
    $("#cbox").hide();
</script>

<div class="navbar navbar-fixed-top">

      <div class='head1'> 
          <div class='valign'>
              <p><a class="btn btn-primary btn-large"  href="cree-annonce.php">Déposer une annonce GRATUITE!</a></p>
          </div>
      </div>

      <div class="navbar-inner" >
        <div class="container-fluid"  style='margin: auto;max-width: 1600px;min-width: 980px;width:80%'>
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="index.php">Yes-annonce</a>

          <?php if($connex==1){ ?>
          <div class="btn-group pull-right">
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="icon-user">
                <?php
                  $sql = "SELECT photo FROM annonceur WHERE pseudo='".$_SESSION['login']."'";
                  $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
                  $data = mysql_fetch_array($req);
                ?>
                <img src="img/profil/min/<?php echo $data['photo'] ?>" style='position:relative;top:-2px;left:1%;width:19px;height:19px;border:1px solid #123682;' alt='imagemini'>
              </i>
                <?php echo $_SESSION['login'] ?>
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="#">About us</a></li>
              <li class="divider"></li>
              <li><a href="monprofil.php">Mon Profil</a></li>  
              <li class="divider"></li>
              <li><a href="inc/deconnexion.php">Déconnexion</a></li>
            </ul>
          </div>
          <?php }else{ ?>
          <div class="pull-right" style='position:relative;left:-0.3%;top:5px'>
            <a class="inscrir">s'inscrire</a> <a id='connect' class='connect' href="#">s'identifier</a>
          </div>       
          <?php } ?>
          <div class="nav-collapse">
              <ul class="nav">
        				<li>                  
                <?php if($connex==1){ ?>
                <a href="cree-annonce.php">Insérer une Annonce</a> 
                <?php }else{ ?>
                <a class='connect' href="#">Insérer une Annonce</a>
                <?php } ?> 
                </li>
        				<li>                  
                <?php if($connex==1){ ?>
                <a href="mes-annonces.php">Mes Annonces</a>  
                <?php }else{ ?>
                <a class='connect' href="#">Mes Annonces</a>
                <?php } ?> 
                </li>
        				<li><a href="message.php">Message</a></li>
                <li>
                <?php if($connex==1){ ?>
                <a href="mes-favoris.php">Mes Favoris</a>  
                <?php }else{ ?>
                <a class='connect' href="#">Mes Favoris</a>
                <?php } ?>
                </li>
                <?php if($connex==1){ ?>
                <li><a href="monprofil.php">Mon Profil</a></li>  
                <?php }else{ ?>
                <li><a class='connect' href="#">Mon Profil</a></li> 
                <?php } ?> 

                <li><a href="#">Contact</a></li>
              </ul>

          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
<!--*************************************************************arriere plan************************************************-->
 <div style='height: 100%; left: 0; position: fixed; top: 18px; width: 100%; z-index: -999; background-image: url(img/googlemapcapture2.jpg);opacity: 0.4;'></div>
 <div style='background: #FFF; display: block; height: 100%; left: 0; position: fixed; top: 0; width: 100%; z-index: -998; background-image: url(img/overlay2.png);opacity: 0.4;'></div>


 <?php if ($connex==0){ ?>
<!--*************************************************************inscrit form************************************************-->
 
<div style="position:fixed;top: 35%; left: 40%;width:420px;height:230px;z-index:1031" id="ibox" align='center' class='container'>
    <a class="fermer"><span class="fermerimage lb_close"></span></a>
               <form name="form" method="POST" id="myForm" action="inc/ajout.php" class="form-signin" role="form" align="center" style="width:90%">
                    <h1 class="form-signin-heading">Crée un compte</h1>
<table align='center'>
<tr>
  <td width="200"><h4>Pseudo:</h4></td>
  <td width="159"><input type="text" name ='pseudo' id="pseud" pattern="\w+" required onchange="go6()"><p id='pseudo'></p></td></tr>
<tr>
  <td width="200"><h4>Adresse mail:</h4></td>
  <td width="159"><input type="text" size="200" name="email"  pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" required id="email"></td>
</tr>
<tr><td width="200"><h4>Mot de passe:</h4></td>
  <td width="159"><input id="password" type='password' required MAXLENGTH='16' name='mp' size="200" autocomplete="off" id="pwd" 
oninput="document.getElementsByName('confirm')[0].setAttribute('pattern', '^' + this.value.replace(/[-[\]{}()*+?.,\\^$|#\s]/g, '\\$&') + '$');" pattern=".{6,16}">
<tr>
  <td width="200"><h4>Retaper votre mot de passe:</h4></td>
  <td width="159"><input name="confirm" type='password' required>
 </td></tr>
</table>
<button class="btn btn-lg btn-primary btn-block" type="submit" name='inscr' value='envoyer'>s'enregistrer</button>
            </form>
</div>

<!--************************************************************connect form***********************************************-->

  <div id="cbox" style="position:fixed;top: 35%; left: 40%;width:420px;height:230px;z-index:1031" class='container' align='center' >
        <a class="fermer"><span class="fermerimage lb_close"></span></a>
      <form name='connexion' method='post' class="form-signin" role="form" align="center" style="width:70%">

        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" placeholder="Pseudo ou email" required name='login' autofocus><br>
        <input type="password" placeholder="Mot de passe" required name='mp'>
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <input class="btn btn-lg btn-primary btn-block" type="submit" value='Seconnecter' name='connexion' align='center'>
      </form>
</div>

<div style="display: block; opacity: 0.7;background-color: #fff;z-index:1030;position: fixed;top: 0;left: 0;height: 100%;width: 100%;" class='bigbox'></div>

 <?php }?>
