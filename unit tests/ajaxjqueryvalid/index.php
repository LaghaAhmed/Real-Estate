<!DOCTYPE html>
<html>
<head><title>test</title></head>
<body>
<form name='f'>
<div class='divinput'>
name:<input type="text" class="name">
name2:<input type="text" class="name2">
name3:<input type="text" class="name3">
<input type="button" class="name-submit" value="grab"><br>
 <input type="file" id="file" name="files[]" title="Choisir un fichier à télécharger" multiple="multiple" accept="image/*"/>
 <div id='imgstore' style="line-height: 96px; width: 618px;min-height:156px;border: 2px dashed #DDDDDD;border-radius: 2px;padding:2px;">
      

</div>

<div class="name-data"></div>
</form>


</body>
<script>

     var j=0;
function loadimage(e1)
{        
var files = e1.target.files;

for( var i = 0; i < files.length; i++ ){
	$.post('ajax/name2.php' , {files : files[i].name});
  var filename = e1.target.files[i]; 
  var fr = new FileReader();
  fr.onload = imageHandler;  
  fr.readAsDataURL(filename);
}
         
     
}
function imageHandler(e2) 
{ 
  document.getElementById('imgstore').innerHTML=document.getElementById('imgstore').innerHTML+'<img src="' + e2.target.result +'" width="150" height="150" style="padding:2px;" name="'+j+'">';
  j++
}

window.onload=function()
{
  document.getElementById("file").addEventListener('change', loadimage, false);
}
</script>

<script src="js/jquery-1.10.2.js"></script>
<script>

$('.divinput .name-submit').on('click',function(){

	var name = $('.divinput .name').val();

	if($.trim(name) != '') {
		$.post('ajax/name.php' , {name : name} , function(data){ 
			$('.name-data').text(data);
		});
	}
});
</script>
</html>
