

<?php
include('head.php');

?>

<style type="text/css">
	#sea {
    box-sizing: border-box;
    border: 2px solid white;
    border-radius: 8px;
    width: 40%;
    font-size: 16px;
    background-color: white;
    background-image: url('search.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 15px 15px 15px 15;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

#sea:focus {
    width: 100%;
    border-radius: 20px;
}
</style>
<div class="row">
	<div class="col-md-2"></div>

	<div class="col-md-6 col-md-8">
		<div align="center"  style="background-color: #00CC33; height: 80%; overflow-y: scroll;">
			<br>
			<br>
			<br>
			<br>
		<form method="post" class="form-group">
			<input id="sea" style=" border: 2px solid green;" type="text" name="search_text" id="search_text" placeholder="Enter Search Keyword..." required><br><br>
		</form>
		</div>
		<div id="result"></div>
	</div>
</div>




<script>
	$(document).ready(function(){
		$('#search_text').keyup(function(){
			var txt= $(this).val();
			if(txt !=''){
				$.ajax({
					url:"fetch.php",
					method:"post",
					data:{search:txt},
					dataType:"text",
					success:function(data)
					{
						$('#result').html(data);
					}
				});
			}
			else
			{
				$('#result').html('');
			}
		});
	});

</script>

<?php
include('footer.php');
?>