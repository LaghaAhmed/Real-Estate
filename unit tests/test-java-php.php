<php $a='aaaa' 
echo "<div id='".$a."'>zzzzzzzzzzzzzzzzzzzzzz</div>";
	<script src="js/jquery.js"></script>
	<script  type="text/javascript">
	$(document).ready(function(){
    $(".<php echo $a ?>").hide();
		});
    </script>