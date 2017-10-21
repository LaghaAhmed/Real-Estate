<?php
include_once('inc/connexion.php');


$uploaddir = 'img/upload/';
$valid_formats = array("jpg", "png", "gif", "bmp");
$max_file_size = 1024*2000;
			
			$filename = $_FILES['imagefile'];
			$name=$filename['name'];

	        	$res = "SELECT MAX(`id`) FROM `image`";
                $req = mysql_query($res) or die('Erreur SQL !<br />'.$res.'<br />'.mysql_error());
                $row = mysql_fetch_array($req);
                $idphoto=$row[0]+1;

		
			if ($filename['error'] == 4) {
	        continue; // Skip file if any error found
	   		 }	       
	   		 if ($filename['error'] == 0) {	           
	        if ($filename['size'] > $max_file_size) {
	            $message[] = $name." is too large!.";
	            continue; // Skip large files
	        }
			elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
				$message[] = $name." is not a valid format";
				continue; // Skip invalid file formats
			}
	        else{ // No error found! Move uploaded files 



	        	$ext=strrchr($name,'.');
       			$name=$idphoto.$ext;

	            if(move_uploaded_file($filename["tmp_name"], $uploaddir .$name))

	            	$strSQL = "insert into image values ('','100','".$name."')";
  					mysql_query($strSQL) or die ("Error Query [".$strSQL."]");

  				echo json_encode($name);
	       		}
	 	    }
			
?>