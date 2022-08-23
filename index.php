  <span></span>

<?php
include('head.php');

?>

<style type="text/css">
	#search_text {
    box-sizing: border-box;
    border: 2px solid white;
    border-radius: 8px;
    width: 60%;
    font-size: 16px;
    background-color: white;
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 15px 15px 15px 15;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

#search_text:focus {
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
			<input id="search_text" style=" border: 2px solid green;" type="text" name="search_text" id="search_text" placeholder="Enter Search Keyword..." required><br><br>
		</form>
		<div class="row">
		<div id="result" class="col-md-12"></div>
		</div>
		<div align="left" style="padding-left: 10px; background-color: white ; color: ;">
			<fieldset>
			<legend style="color: white;">News</legend>
			<?php
include ('connect.php');

$sql="SELECT * FROM topics ORDER BY id DESC LIMIT 0, 5; ";
$result=mysql_query($sql);

while($rows=mysql_fetch_assoc($result)){

?>
<style type="text/css">
	h4{
		text-shadow: 2px 2px 8px green;
	}
	h4:hover{
		text-shadow: 0 0 3px #FF0000;
	}
</style>

  <a style="" href="view_news.php?id=<?php echo $rows['id'];  ?>"><strong><h4><?php echo $rows['topic'];  ?></h4></strong>
  </a>
<div>
    <i class="fas fa-calendar"></i>
        <?php echo $rows['date'].' '.$rows['time'];  ?> 

            <i class="fas fa-eye"></i>  
      <?php echo $rows['view'];  ?>   Views   </span>
    
    </div>
    <hr>
<?php
}
?>

</fieldset>
		</div>
		</div>
	

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