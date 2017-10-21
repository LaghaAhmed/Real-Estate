
<?php
include_once("../inc/connexion.php");
session_start();

$i=$_SESSION['i'];
            echo $res = "SELECT MAX(`id`) FROM `image`";
            $req = mysql_query($res) or die('Erreur SQL !<br />'.$res.'<br />'.mysql_error());
            $row = mysql_fetch_array($req);
            $idphoto=$row[0]+1;
			$path = "../img/upload/";
	        	echo '<br>ext'.$ext=strrchr($_FILES['files']['name'][0],'.');
       			echo'<br>name='.$name=$idphoto.$ext;	
          			
          			echo '<br>tmpimage='.$tmpimage = $_FILES['files']['tmp_name'][0];
       				//echo '<br>tmpimage='.$tmpimage = $_FILES['files']['tmp_name'][0];
          			

	            if(move_uploaded_file($tmpimage, $path.$name)){
	            	
	            	echo '<br>Upload effectué avec succès !';
	            	echo '<br>'.$req = "insert into image values ('','0','".$name."')";
	            	mysql_query ($req);
	            	 require('../inc/imgClass.php');
         			 Img::creerMin($path.$name,$path.'moy',$name,260,260);
         			 Img::creerMin($path.$name,$path.'min',$name,78,78);
	            	$_SESSION['image'.$i]=$idphoto;
	      	    	$idphoto++;
	      	    	$_SESSION['i']++ ;
	            }else{echo '<br>problemproblemproblem<br>';};
?>