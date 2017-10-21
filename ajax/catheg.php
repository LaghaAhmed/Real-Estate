
<?php

	
  if ($_POST['catheg']=='Terrain'){ };           
//-------------------------------------------------------------------------------------------------------------------------------------------
  if ($_POST['catheg']=='Maison'){
	?>
  <div style='display:inline;background-color:#b0c4de;'>
	Nombre de chambre:</div>&nbsp<input type='number' SIZE='2' MAXLENGTH='10' MIN='1' MAX='6' name='nbr-chambre'  placeholder="1" style='width:100px'>
	<input type="checkbox" name="detail[]" id='dm0' value="0">ou plus<br>
  
	<INPUT type="checkbox" name="detail[]" id='dm1' value='1'> Picine
	<INPUT type="checkbox" name="detail[]" id='dm2' value='2'> Garage
	<INPUT type="checkbox" name="detail[]" id='dm3' value='3'> Jardin
	<INPUT type="checkbox" name="detail[]" id='dm4' value='4'> Cave
	<INPUT type="checkbox" name="detail[]" id='dm5' value='5'> cheminée
	<INPUT type="checkbox" name="detail[]" id='dm6' value='6'> terrasse
	<?php 
  };           
//---------------------------------------------------------------------------------------------------------------------------------------------------
  if ($_POST['catheg']=='Bureau'){
?>
  <div style='display:inline;background-color:#b0c4de;'>
    nombre de salles:</div>&nbsp<input type='number' SIZE='2' MAXLENGTH='10' MIN='1' MAX='6' name='nbr-salles'  placeholder="1" style='width:100px'>
  <input type="checkbox" name="detail[]" id='dm0' value="0"> emplacement parking<br>
<?php };           
//---------------------------------------------------------------------------------------------------------------------------------------------------
  if ($_POST['catheg']=='Parking'){
?>
  <div style='display:inline;background-color:#b0c4de;'>
    Peut contenir combien voitures ?</div>&nbsp<input type='number' SIZE='2' MAXLENGTH='10' MIN='1' MAX='50' name='nbr-voiture'  placeholder="1" style='width:100px'>
  <input type="checkbox" name="detail[]" id='dm0' value="0">ou plus<br>
<?php };           
//---------------------------------------------------------------------------------------------------------------------------------------------------
  if ($_POST['catheg']=='Fond de commerce'){
?>
  <div style='display:inline;background-color:#b0c4de;'>
    Type</div>&nbsp<input type='text' MAXLENGTH='10' name='typefc' style='width:100px'>
<?php };    
//---------------------------------------------------------------------------------------------------------------------------------------------------       
  if ($_POST['catheg']=='Maison + terrain'){
?>
  <div style='display:inline;background-color:#b0c4de;'>
  Surface habitable</div>&nbsp<input type='number' SIZE='2' MAXLENGTH='10' MIN='1' MAX='6' name='nbr-chambre'  placeholder="1" style='width:100px'><br>
  <div style='display:inline;background-color:#b0c4de;'>
  nombre de chambre</div>&nbsp<input type='number' SIZE='2' MAXLENGTH='10' MIN='1' MAX='6' name='nbr-chambre'  placeholder="1" 'width:100px'><br>
  <input type="checkbox" name="detail[]" id='dm0' value="0">ou plus<br>
  <INPUT type="checkbox" name="detail[]" id='dm1' value='1'> Picine
  <INPUT type="checkbox" name="detail[]" id='dm2' value='2'> Garage
  <INPUT type="checkbox" name="detail[]" id='dm3' value='3'> Jardin<br>
  <INPUT type="checkbox" name="detail[]" id='dm4' value='4'> Cave
  <INPUT type="checkbox" name="detail[]" id='dm5' value='5'> cheminée
  <INPUT type="checkbox" name="detail[]" id='dm6' value='6'> terrasse
<?php };   
?>



