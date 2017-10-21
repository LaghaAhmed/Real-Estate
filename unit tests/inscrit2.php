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


<!-------------------------------------------validation----------------------------------------------------------------->    
<link rel="stylesheet" href="validation/css/validationEngine.jquery.css" type="text/css"/>
<!--<link rel="stylesheet" href="validation/css/template.css" type="text/css"/>-->
<script src="validation/js/jquery-1.8.2.min.js" type="text/javascript">
</script>
<script src="validation/js/languages/jquery.validationEngine-fr.js" type="text/javascript" charset="utf-8">
</script>
<script src="validation/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8">
</script>
<script>
    jQuery(document).ready(function(){
        // binds form submission and fields to the validation engine
        jQuery("#formID").validationEngine();
    });

    function checkHELLO(field, rules, i, options){
        if (field.val() != "HELLO") {
            // this allows to use i18 for the error msgs
            return options.allrules.validate2fields.alertText;
        }
    }
</script>

</head>
   <body>
            <?php 
            include_once("inc/head.php"); 
            include_once("inc/gauche.php");
            ?>
            
        <div class="span9">
          <div class="hero-unit">
            <form id="formID" name='form' method="post" action="ajout.php">
                <h1 align='center'>Crée un compte</h1><br><br>
<table align='center'>
<tr><td width="200"><h4>Pseudo:</h4></td><td width="159">
<input class="validate[required,max[15]] text-input" type="text" name ='pseudo' id="req"></td><td><p id='pseud'></p></td></tr>
<tr><td width="200"><h4>Adresse mail:</h4></td><td width="159">
  <input class="validate[required,custom[email],max[30]]" type="text" name="email" id="email" /></td></tr>
<tr><td width="200"><h4>Mot de passe:</h4></td><td width="159">
  <input class="validate[required,equals[password],min[-5]] text-input"  id="password" type='password' SIZE='2' MAXLENGTH='16' name='mp' size="200" autocomplete="off"id='mp'>
<tr><td width="200"><h4>Retaper votre mot de passe:</h4></td><td width="159">
<input class="validate[required,equals[password],min[-5]] text-input" type="password" name="mpc" id="password2"></td></tr>
<tr><td><input type="reset" value ='annuler'></td><td></td><td><input type="submit" name='inscr' value='envoyer'></td></tr>
</table>
            </form>
          </div>
        </div><!--/span-->
      </div><!--/row-fluid-->
    </div><!--/container-fluid-->
</body>
</html>