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
<legend>Insert New Record</legend>	
<?php
if(isset($_POST['sub_input'])){
    $name=$_POST['name'];
    $regnum=$_POST['regnum'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $category=$_POST['category'];
    $post=$_POST['post'];
    $address=$_POST['address'];
    $keyword=$_POST['keyword'];
    $pic=$_POST['pic'];

    $filename=$_FILES['pic']['name'];
    move_uploaded_file($_FILES['pic']['tmp_name'], "../images/".$_FILES['pic']['name']);

    $sql="INSERT INTO users(name, regnum, phone, email, category, post, address, keyword, pic)VALUES('$name', '$regnum', '$phone', '$email', '$category', '$post', '$address', '$keyword', '$filename') ";
    $result=mysql_query($sql);

    if($result){
        echo '
<div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <em>Feedback: </em>Record Created and Inserted Successfully! </b>
            </div>
        ';
    }else{
        echo '
        <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <em>Feedback: </em>Error in Creating Record. Please try again! </b>
            </div>
            '.mysql_error();
    }
}

?>
    <form class="form-group" method="post" enctype="multipart/form-data">
        <input type="text" name="name" class="form-control" placeholder="Enter Full Name"><br>
        <input type="text" name="regnum" class="form-control" placeholder="Enter ID Number"><br>
        <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number"><br>
        <input type="email" name="email" class="form-control" placeholder="Enter Valid Email"><br>
        <input type="radio" name="category" value="Staff"> Staff   <input type="radio" name="category" value="Student"> Student<br>
        <input type="text" name="post" class="form-control" placeholder="Enter Post"><br>
        <textarea name="address" class="form-control" placeholder="Enter Address"></textarea><br>
        <textarea class="form-control" name="keyword" placeholder="Enter Keywords"></textarea><br>
        Select Profile Picture:
        <input type="file" class="form-control" name="pic" >
        <div align="center">
            <input type="submit" name="sub_input" value="Submit" class="btn btn-success">
        </div>
    </form>
</fieldset>





	</div>
</div>




<?php
include('../footer.php');
?>