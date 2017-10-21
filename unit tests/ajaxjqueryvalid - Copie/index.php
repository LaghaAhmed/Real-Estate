<!DOCTYPE html>
<html>
<head><title>test</title></head>
<body>
<form name='f'>
<div class='divinput'>
name:<input type="text" class="name">
<input type="button" class="name-submit" value="grab">
</div>

<div class="name-data"></div>
</form>


</body>

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
