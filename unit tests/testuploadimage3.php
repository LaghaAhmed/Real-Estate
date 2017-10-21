<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
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
            document.getElementById('divimage').innerHTML = leselect;
          }
        }
 
        // Ici on va voir comment faire du post
        xhr.open("POST","images.php",true);
        // ne pas oublier ça pour le post
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded;multipart/form-data');
        // ne pas oublier de poster les arguments
        // ici, l'id de l'auteur
        images = document.getElementById('fileInput');
        images2 = images.files;
        xhr.send("images2="+images2);
      }</script>



  </head>
  <body>
    <form name="r" method="post" enctype="multipart/form-data">
<input type="file" name="file" id="fileInput" title="Choisir un fichier à télécharger" accept="image/*" onchange='go()'/>

   </script>
   <div id='divimage'>

</div>
</form>
   </body>
</html>