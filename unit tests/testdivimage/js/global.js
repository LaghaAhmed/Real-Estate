$('.form1 .name-submit').on('click',function(){

	var name = $('.form1 .name').val();

	if($.trim(name) != '') {
		$.post('ajax/name.php' , {name : name} , function(data){ 
			$('.form1 .name-data').text(data);
		});
	}
});