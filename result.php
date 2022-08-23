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

$sql="SELECT * FROM users WHERE name LIKE '%".$search."%' OR keyword LIKE '%".$search."%'";
$result=mysql_query($sql);

if(mysql_num_rows($result)>0)
{

$count=mysql_num_rows($result);
	?>
		<div class="alert alert-success">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<em>Feedback: </em>Search Engine Successfully Found <b><?php echo $count;  ?> Results </b>
			</div>

<fieldset>
<legend>Search Result(s) for <font color="white">"<b><?php echo $search; ?></b>"</font></legend>	
<table style="background-color: white;" class="table table-striped">
	<?php
	while($rows=mysql_fetch_assoc($result)){
		?>
	<tr>
		<td width="10%"><h2><i class="fas fa-user"></i></h2></td>
		<td width="70%">
			<h3><a href="view_profile.php?id=<?php echo $rows['id'];  ?>"><?php echo $rows['name'];  ?></a></h3><br>
				<font color="red"><?php echo $rows['email'];  ?></font> 
		</td>
		<td><a href="view_profile.php?id=<?php echo $rows['id'];  ?>">View Profile</a></td>
	</tr>
	<?php
		}
	echo "<tr><td colspan='3'><b>Total Record Count: ".$count." </b></td></tr>";

		?>
</table>
</fieldset>


<?php
		
}
else
{
	echo '
	
		<div class="alert alert-danger">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<em>Feedback: </em> Oops... Search Engine was unable to Find any Result!
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