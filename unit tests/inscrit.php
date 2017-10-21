<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <title>Inscrit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <style type="text/css">
    #facebox {
    border: 1px solid #7A849F;
    border-radius: 3px;
    left: 0;
    position: absolute;
    text-align: left;
    top: 0;
    z-index: 100;
}
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
      #myForm input:invalid{
        background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAMCAYAAABWdVznAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAT1JREFUeNpi/P//PwMpgImBRMACY/x7/uDX39sXt/67cMoDyOVgMjBjYFbV/8kkqcCBrIER5KS/967s+rmkXxzI5wJiRSBm/v8P7NTfHHFFl5mVdIzhGv4+u///x+xmuAlcdXPB9KeqeLgYd3bDU2ZpRRmwH4DOeAI07QXIRKipYPD35184/nn17CO4p/+cOfjl76+/X4GYAYThGn7/g+Mfh/ZZwjUA/aABpJVhpv6+dQUjZP78Z0YEK7OezS2gwltg64GmfTu6i+HL+mUMP34wgvGvL78ZOEysf8M1sGgZvQIqfA1SDAL8iUUMPIFRQLf+AmMQ4DQ0vYYSrL9vXDz2sq9LFsiX4dLRA0t8OX0SHKzi5bXf2HUMBVA0gN356N7p7xdOS3w5fAgcfNxWtn+BJi9gVVBOQfYPQIABABvRq3BwGT3OAAAAAElFTkSuQmCC");
        background-position: right top;
        background-repeat: no-repeat;
        box-shadow: none;
      }
      #myForm input:valid{
        background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAMCAYAAABWdVznAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAZZJREFUeNpi/P//PwMpgImBRMAy58QshrNPTzP8+vOLIUInisFQyYjhz98/DB9/fmT48/+35v7H+8KNhE2+WclZd+G0gZmJmYGThUNz1fUVMZtvbWT59eUXG9wGZIWMUPj993eJ5VeWxuy8veM/CzPL3yfvH/9H0QBSBDYZyOVm4mGYfn6q4cory5lYmFh+MrEwM/76/YsR7mk2ZjbWP///WP37/y8cqIDhx58fjvtu7XV6//ndT34G/v8FasUsDjKO/+A2PP3wpGLd+TVsfOz8XH6KAT+nHpokcu7h6d9q/BoMxToVbBYqlt9///+1GO4/WVdpXqY/zMqXn13/+vTjI9mj94/y//v9/3e9ZRObvYbDT0Y2xnm///x+wsfHB3GSGLf41jb3rv0O8nbcR66d+HPvxf2/+YZFTHaqjl8YWBnm/vv37yly5LL8+vuLgYuVa3uf/4T/Kd8SnSTZpb6FGUXwcvJxbAPKP2VkZESNOBDx8+9PBm4OwR1TwmYwcfzjsBUQFLjOxs52A2YyKysrXANAgAEA7buhysQuIREAAAAASUVORK5CYII=");
        background-position: right top;
        background-repeat: no-repeat;
      }
      p{display:inline;}
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

<!--**********************************************************Ajax******************************************************************-->
<script type='text/javascript'>
 
      function getXhr(){
                                var xhr = null; 
        if(window.XMLHttpRequest) // Firefox et autres
           xhr = new XMLHttpRequest(); 
        else if(window.ActiveXObject){ // Internet Explorer 
           try {
                      xhr = new ActiveXObject("Msxml2.XMLHTTP");
                  } catch (e) {
                      xhr = new ActiveXObject("Microsoft.XMLHTTP");
                  }
        }
        else { // XMLHttpRequest non supporté par le navigateur 
           alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest..."); 
           xhr = false; 
        } 
                                return xhr;
      }
 
      /**
      * Méthode qui sera appelée sur le click du bouton
      */
      function go6(){
        var xhr = getXhr();
        // On défini ce qu'on va faire quand on aura la réponse
        xhr.onreadystatechange = function(){
          // On ne fait quelque chose que si on a tout reçu et que le serveur est ok
          if(xhr.readyState == 4 && xhr.status == 200){
            leselect = xhr.responseText;
            // On se sert de innerHTML pour rajouter les options a la liste
            document.getElementById('pseudo').innerHTML = leselect;
          }
        }
 
        // Ici on va voir comment faire du post
        xhr.open("POST","ajax/pseudo.php",true);
        // ne pas oublier ça pour le post
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        // ne pas oublier de poster les arguments
        // ici, l'id de l'auteur
        sel = document.getElementById('pseud');
        pseudo = sel.value;
        xhr.send('pseudo='+pseudo);
      }
</script>

</head>
   <body>
            <?php 
            include_once("inc/head.php"); 
            include_once("inc/gauche.php");
            ?>


<div style="top: 477.2px; left: 591.5px;" id="facebox">


  <div align='center'>
    <h1>Crée un compte</h1>
  </div>

               <form name="form" method="POST" id="myForm" action="ajout.php">
<table align='center'>
<tr>
  <td width="200"><h4>Pseudo:</h4></td>
  <td width="159"><input type="text" name ='pseudo' id="pseud" pattern="\w+" required onchange="go6()"><p id='pseudo'></p></td></tr>
<tr>
  <td width="200"><h4>Adresse mail:</h4></td>
  <td width="159"><input type="email" size="200" name="email" required id="email"></td>
</tr>
<tr><td width="200"><h4>Mot de passe:</h4></td>
  <td width="159"><input id="password" type='password' required MAXLENGTH='16' name='mp' size="200" autocomplete="off" id="pwd" 
oninput="document.getElementsByName('confirm')[0].setAttribute('pattern', '^' + this.value.replace(/[-[\]{}()*+?.,\\^$|#\s]/g, '\\$&') + '$');" pattern=".{6,16}">
<tr>
  <td width="200"><h4>Retaper votre mot de passe:</h4></td>
  <td width="159"><input name="confirm" type='password' required>
 </td></tr>
<tr><td><input type="reset" value ='annuler'></td><td></td><td><input type="submit" name='inscr' value='envoyer'></td></tr>
</table>
            </form>

<div id="lb_footer">
    <a href="/compte/login">S'identifier</a>
  </div>

</div>

</div></div>
</body>
</html>