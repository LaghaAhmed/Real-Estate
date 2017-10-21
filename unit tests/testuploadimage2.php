<html>
<head>
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
      function go(){
        var xhr = getXhr();
        // On défini ce qu'on va faire quand on aura la réponse
        xhr.onreadystatechange = function(){
          // On ne fait quelque chose que si on a tout reçu et que le serveur est ok
          if(xhr.readyState == 4 && xhr.status == 200){
            leselect = xhr.responseText;
            // On se sert de innerHTML pour rajouter les options a la liste
            document.getElementById('avance').innerHTML = leselect;
          }
        }
 
        // Ici on va voir comment faire du post
        xhr.open("POST","images.php",true);
        // ne pas oublier ça pour le post
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        // ne pas oublier de poster les arguments
        // ici, l'id de l'auteur
        images = document.getElementById('file').value;
        
        xhr.send("images="+images);
      }</script>
  </head>
  <body enctype="multipart/form-data">
<input type="file" id="file" name="files[]" title="Choisir un fichier à télécharger" multiple="multiple" accept="image/*" onchange="go()"/>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="../js/jquery.js"></script>
<script>
$("document").ready(function(){
    $(".divimage").hide();
    $("#file").change(function() {
    $(".divimage").show();
    aaa=document.getElementById('file').value;
    alert(aaa);
            });
});

   </script>
   <div class='divimage'>
      <?php
      mysql_connect("localhost","root","") or die ("connexion impossible."); 
        mysql_select_db("bd") or die ("base de données non accessible"); 

                $res = "SELECT `image` FROM `image` WHERE `num-annonce`='46'";
                $req = mysql_query($res) or die('Erreur SQL !<br />'.$res.'<br />'.mysql_error());
                while($row = mysql_fetch_array($req)){
                    echo '<img src="../img/upload/'.$row['image'].'"  width="150" height="150">';
                };    
            ?>
</div>
</form>
   </body>
</html>