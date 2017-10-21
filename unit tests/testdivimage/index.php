<!DOCTYPE html>
<html>
<head><title>test</title></head>
<body>
<form name='f' method="post" enctype="multipart/form-data">

<input type="file" id="file" name="files[]" title="Choisir un fichier à télécharger" multiple="multiple" accept="image/*"/>
<input type="button" class="name-submit" value="grab">

<div class="name-data"></div>
</form>


</body>

<script src="js/jquery-1.10.2.js"></script>
<script>

$('#file').change(function(e) {
      
      files = e.target.files[0];
      files_count = files.length;
      alert(files_count);
      }
</script>
</html>
