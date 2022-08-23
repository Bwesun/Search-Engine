  <span></span>

<?php
include('head.php');

?>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
<legend>Delete User Record</legend>	
<?php
if(isset($_POST['sub_delete'])){

    $id=$_POST['id'];

    $sql="DELETE FROM users WHERE id='$id' ";
    $result=mysql_query($sql);

    if($result){
        echo '
<div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <em>Feedback: </em>Record Deleted Successfully! </b>
            </div>
        ';
    }else{
        echo '
        <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <em>Feedback: </em>Error in Deleting Record. Please try again! </b>
            </div>
            '.mysql_error();
    }
}

?>

<table class="table table-condensed">
    <tr>
        <th>Name</th>
        <th>ID Number</th>
        <th>Phone</th>
        <th></th>
    </tr>
<?php
$sql="SELECT * FROM users ";
$result=mysql_query($sql);
$count=mysql_num_rows($result);

while($rows=mysql_fetch_assoc($result)){
?>
    <tr>
        <td><?php echo $rows['name'];  ?></td>
        <td><?php echo $rows['regnum'];  ?></td>
        <td><?php echo $rows['phone'];  ?></td>
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
        <td colspan="4"><strong>Total No. of Records: <?php echo $count;  ?></strong></td>
    </tr>
</table>
    
</fieldset>





	</div>
</div>




<?php
include('../footer.php');
?>