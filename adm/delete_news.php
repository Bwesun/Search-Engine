  <span></span>

<?php
include('head.php');

?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Delete News</title>
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

		<div align="left"  style="background-color: white; height: 80%; overflow-y: scroll;">
			
<?php
include('connect.php');
	?>

<fieldset>
<legend>Delete News</legend>	
<?php
if(isset($_POST['sub_delete'])){

    $id=$_POST['id'];

    $sql="DELETE FROM topics WHERE id='$id' ";
    $result=mysql_query($sql);

    if($result){
        echo '
<div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <em>Feedback: </em>News Deleted Successfully! </b>
            </div>
        ';
    }else{
        echo '
        <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <em>Feedback: </em>Error in Deleting News. Please try again! </b>
            </div>
            '.mysql_error();
    }
}

?>

<table class="table table-condensed">
    <tr>
        <th>S/N</th>
        <th>Topics</th>
        <th>Date/Time</th>
    </tr>
<?php
$sql="SELECT * FROM topics ";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
$i=1;

while($rows=mysql_fetch_assoc($result)){
?>
    <tr>
        <td><?php echo $i++;  ?></td>
        <td><?php echo $rows['topic'];  ?></td>
        <td><?php echo $rows['datetime'];  ?></td>
        <td>
            <form method="post" >
        <input type="hidden" name="id" value="<?php echo $rows['id']; ?>">
        <div align="center">
            <input type="submit" name="sub_delete" value="Delete" class="btn btn-danger">
        </div>
    </form>
        </td>
    </tr>
    
    <?php
}
?>
<tr>
        <td colspan="4"><strong>Total No. of News Record: <?php echo $count;  ?></strong></td>
    </tr>
</table>
    
</fieldset>





	</div>
</div>




<?php
include('../footer.php');
?>