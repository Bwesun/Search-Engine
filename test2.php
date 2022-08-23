  <span></span>

<?php
include('head.php');

?>

<style type="text/css">
	#search_text {
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

#search_text:focus {
    width: 100%;
    border-radius: 20px;
}
</style>
<div class="row">
	<div class="col-md-2"></div>

	<div class="col-md-6 col-md-8">

		<div align="left"  style="background-color: #00CC33; height: 80%; overflow-y: scroll;">
			
<?php
include('connect.php');
$search=$_POST['search'];

$sql="SELECT * FROM users WHERE fullname OR user_id LIKE '%".$_POST['search']."%' ";
$result=mysql_query($sql);

if(mysql_num_rows($result)>0)
{

$count=mysql_num_rows($result);
	?>
		<div class="alert alert-success">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<em>Information: </em>Successfully Found <b><?php echo $count;  ?> Results </b>
			</div>

<fieldset>
<legend>Search Result(s)</legend>	
<table style="background-color: white;" class="table table-striped">
	<?php
	while($rows=mysql_fetch_assoc($result)){
		?>
	<tr>
		<td width="10%"><h2><i class="fas fa-user"></i></h2></td>
		<td width="70%">
			<h3><?php echo $rows['fullname'];  ?></h3><br>
			<font color="green"><?php echo $rows['username'];  ?></font> |  
				<font color="red"><?php echo $rows['gender'];  ?></font> | 
				<font color="blue"><?php echo $rows['phone'];  ?></font> | 
				<font color="green"><?php echo $rows['ms'];  ?></font>  | 
				<font color="red"><?php echo $rows['email'];  ?></font> 
		</td>
		<td><a href="">View Profile</a></td>
	</tr>
	<?php
		}
	echo "<tr><td colspan='3'><b>Total Record Count: ".$count." </b></td></tr>";
	echo mysql_error();
		?>
</table>
</fieldset>


<?php
		
}
else
{
	echo '
	<script>
		alert("Oops... No Result(s) were Found");
	</script>
		<div class="alert alert-danger">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<em>Information: </em> Oops... No Result(s) were found!
			</div>
			<fieldset>
				<legend>Search Result(s)</legend>
			<table class="table table-striped"><tr><td><b>Total Record Count: 0. </b></td></tr>
</table></fieldset>';

}
?>

	</div>
</div>




<?php
include('footer.php');
?>