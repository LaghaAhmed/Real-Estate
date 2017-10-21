
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
        xhr.open("POST","ajax/catheg.php",true);
        // ne pas oublier ça pour le post
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        // ne pas oublier de poster les arguments
        // ici, l'id de l'auteur
        sel = document.getElementById('catheg');
        catheg = sel.options[sel.selectedIndex].value;
        xhr.send("catheg="+catheg);
      }

      function go2(){
        var xhr = getXhr();
        // On défini ce qu'on va faire quand on aura la réponse
        xhr.onreadystatechange = function(){
          // On ne fait quelque chose que si on a tout reçu et que le serveur est ok
          if(xhr.readyState == 4 && xhr.status == 200){
            leselect = xhr.responseText;
            // On se sert de innerHTML pour rajouter les options a la liste
            document.getElementById('region').innerHTML = leselect;

          }
        }
        // Ici on va voir comment faire du post
        xhr.open("POST","ajax/region.php",true);
        // ne pas oublier ça pour le post
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        // ne pas oublier de poster les arguments
        // ici, l'id de l'auteur
        sel2 = document.getElementById('pays');
        pays = sel2.options[sel2.selectedIndex].value;
        xhr.send("pays="+pays);  
      }

      function go3(){
        var xhr = getXhr();
        // On défini ce qu'on va faire quand on aura la réponse
        xhr.onreadystatechange = function(){
          // On ne fait quelque chose que si on a tout reçu et que le serveur est ok
          if(xhr.readyState == 4 && xhr.status == 200){
            leselect = xhr.responseText;
            // On se sert de innerHTML pour rajouter les options a la liste
            document.getElementById('departement').innerHTML = leselect;
          }
        }
        // Ici on va voir comment faire du post
        xhr.open("POST","ajax/depart.php",true);
        // ne pas oublier ça pour le post
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        // ne pas oublier de poster les arguments
        // ici, l'id de l'auteur
        sel3 = document.getElementById('reg');
        reg = sel3.options[sel3.selectedIndex].value;
        xhr.send("reg="+reg);
      }

      function supp(id){
        var xhr = getXhr();
        // On défini ce qu'on va faire quand on aura la réponse
        xhr.onreadystatechange = function(){
          // On ne fait quelque chose que si on a tout reçu et que le serveur est ok
          if(xhr.readyState == 4 && xhr.status == 200){
            leselect = xhr.responseText;
            // On se sert de innerHTML pour rajouter les options a la liste
            document.getElementById('div'+id).innerHTML = leselect;
          }
        }
        // Ici on va voir comment faire du post
        xhr.open("POST","ajax/supp-annonce.php",true);
        // ne pas oublier ça pour le post
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        // ne pas oublier de poster les arguments
        // ici, l'id de l'auteur
        xhr.send("id="+id);
      }
      function suppimage(j){
        var xhr = getXhr();
        // On défini ce qu'on va faire quand on aura la réponse
        xhr.onreadystatechange = function(){
          // On ne fait quelque chose que si on a tout reçu et que le serveur est ok
          if(xhr.readyState == 4 && xhr.status == 200){
            leselect = xhr.responseText;
            // On se sert de innerHTML pour rajouter les options a la liste
            divj='div'+j;
            document.getElementById(divj).innerHTML = leselect;
          }
        }
        // Ici on va voir comment faire du post
        xhr.open("POST","ajax/supp-image.php",true);
        // ne pas oublier ça pour le post
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        // ne pas oublier de poster les arguments
        // ici, l'id de l'auteur
        xhr.send("j="+j);
      }

      function save(id){
        var xhr = getXhr();
        // On défini ce qu'on va faire quand on aura la réponse
        xhr.onreadystatechange = function(){
          // On ne fait quelque chose que si on a tout reçu et que le serveur est ok
        }
        // Ici on va voir comment faire du post
        xhr.open("POST","ajax/save-annonce.php",true);
        // ne pas oublier ça pour le post
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        // ne pas oublier de poster les arguments
        // ici, l'id de l'auteur
        xhr.send("id="+id);
      }

      function unsave(id){
        var xhr = getXhr();
        // On défini ce qu'on va faire quand on aura la réponse
        xhr.onreadystatechange = function(){
          // On ne fait quelque chose que si on a tout reçu et que le serveur est ok
        }
        // Ici on va voir comment faire du post
        xhr.open("POST","ajax/unsave-annonce.php",true);
        // ne pas oublier ça pour le post
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        // ne pas oublier de poster les arguments
        // ici, l'id de l'auteur
        xhr.send("id="+id);
      }

        function brouillon(id){
        var xhr = getXhr();
        // On défini ce qu'on va faire quand on aura la réponse
        xhr.onreadystatechange = function(){
          // On ne fait quelque chose que si on a tout reçu et que le serveur est ok
        }
        // Ici on va voir comment faire du post
        xhr.open("POST","ajax/save-brouillon.php",true);
        // ne pas oublier ça pour le post
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        // ne pas oublier de poster les arguments
        // ici, l'id de l'auteur
        xhr.send("id="+id);
      }

        function deposer(id){
        var xhr = getXhr();
        // On défini ce qu'on va faire quand on aura la réponse
        xhr.onreadystatechange = function(){
          // On ne fait quelque chose que si on a tout reçu et que le serveur est ok
        }
        // Ici on va voir comment faire du post
        xhr.open("POST","ajax/deposer-annonce.php",true);
        // ne pas oublier ça pour le post
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        // ne pas oublier de poster les arguments
        // ici, l'id de l'auteur
        xhr.send("id="+id);
      }

        function mapreel(){
        var xhr = getXhr();
        xhr.onreadystatechange = function(){

            document.getElementById(mapp).innerHTML='aaa';


        }
        alert('aaaaa');
      }
