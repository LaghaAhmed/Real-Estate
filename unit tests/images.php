
      <?php
            include_once("../inc/fonction.php"); 

$valid_formats = array("jpg", "png", "gif", "bmp");
$max_file_size = 1024*2000; //100 kb
$count = 0;
if(isset($_POST['images2'])){ aff($_POST['images2']);
  // Loop $_FILES to exeicute all files
  foreach ($_FILES['files']['name'] as $f => $name) {     
      if ($_FILES['files']['error'][$f] == 4) {
          continue; // Skip file if any error found
      }        
      if ($_FILES['files']['error'][$f] == 0) {            
          if ($_FILES['files']['size'][$f] > $max_file_size) {
              $message[] = "$name is too large!.";
              continue; // Skip large files
          }
      elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
        $message[] = "$name is not a valid format";
        continue; // Skip invalid file formats
      }
          else{ // No error found! Move uploaded files 
              
echo 'aaaa';
              

              $count++; // Number of successfully uploaded file
              
          }
      }
  }
}







      aff('aaa'.$images);
      mysql_connect("localhost","root","") or die ("connexion impossible."); 
        mysql_select_db("bd") or die ("base de données non accessible"); 

                $res = "SELECT `image` FROM `image` WHERE `num-annonce`='46'";
                $req = mysql_query($res) or die('Erreur SQL !<br />'.$res.'<br />'.mysql_error());
                while($row = mysql_fetch_array($req)){
                    echo '<img src="../img/upload/'.$row['image'].'"  width="150" height="150">';
                };    
            ?>