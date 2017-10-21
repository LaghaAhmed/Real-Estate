$(function() {
    $('#uploads').filedrop({
    	url:'upload.php',
    	paramname:'imagefile',
    	fallbackid:'upload_button',
    	maxfiles: 10,
    	maxfilessize: 2,
    	uploadFinished: function(i,file,response)
    	{
    		$('#filesarea').append('<span class="image"><img src="img/upload/' + response + '" widht="100%" height="100%"></span>')
    	}

    });
    
});