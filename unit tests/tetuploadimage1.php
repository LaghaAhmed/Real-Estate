<html>
<head></hrad>
<input type="submit" value=" Deposer l'annonce " class="butt">
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="../js/jquery.js"></script>
<script>
  $(document).ready(function(){
  	$(".divimage").hide();
    $(".butt").click(function(){
    $(".divimage").show();
  }); 
});
   </script>
   </body>
</html>