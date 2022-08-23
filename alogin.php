<?php
session_start();

if(isset($_SESSION['admin_user'])){
	echo "<script>window.open('adm/index.php','_self');</script>";
}
include('head.php');
?>
	<style>
	.col-md-4{
			-webkit-box-shadow: 0px 0px 52px 0px rgba(0,0,0,0.55);
-moz-box-shadow: 0px 0px 52px 0px rgba(0,0,0,0.55);
box-shadow: 0px 0px 52px 0px rgba(0,0,0,0.55);
border-radius: 10px;
		}
		input:hover{
			box-shadow: 0px 0px 52px 0px rgba(0,0,0,0.2);
		}
	</style>

<body>

	<div class="col-md-2"></div>
	<div class="col-md-6 col-md-8">
		<h3 align="center">Nigerian Institute of Leather and Science Technology <br>Search Engine</h3>
<div align="center"><img src="search.png" class="img-circle" width="100" align="center"></div>

		<form class="form-group" method="post">
			<fieldset><legend><b><span class="glyphicon glyphicon-cog"></span> Admin Login</b></legend>
			<div class="input-group">
				<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
				<input type="text" class="form-control" placeholder="Enter Username" name="username">
			</div><br>
			<div class="input-group">
				<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
				<input type="password" class="form-control" placeholder="Enter Password" name="password">
			</div><br>
			<div align="center">
				<input type="submit" class="btn btn-primary" name="sub_login" value="Login">
			</div><br>
					
			</fieldset>
		</form>
	</div>

	<?php
if(isset($_POST['sub_login'])){
	session_start();

	include('connect.php');

	$username=$_POST['username'];
	$password=$_POST['password'];

	//echo $email." <br>";
	/*echo $password." <br>";

	if($db_conn){
		echo "DB COnnect Success! <br>";
	}
	echo "It worked!";
  */

	$username=stripslashes($username);
	$password=stripslashes($password);

	$sql="SELECT * FROM admin WHERE username='$username' AND password='$password' ";
	$result=mysql_query($sql);

	$count=mysql_num_rows($result);

	if($count==1){

		$rows=mysql_fetch_assoc($result);
		$_SESSION['username']=$rows['username'];

		$_SESSION['admin_user']=$rows['id'];
		$_SESSION['name']=$rows['username'];

		echo "<script>window.open('adm/index.php', '_self')</script>";

		//echo "<script>window.open('index.php', '_self')</script>";

		echo "<br>Admin User ID: ".$_SESSION['admin_user'];
		echo "<br> Admin User Name: ".$_SESSION['username'];
		echo "<br> SQL code: ".$sql;
		echo "<br> Fetch code: ".$rows;

	}else{
		echo "<script>alert('Incorrect Username or Password! Please try again!')</script>";
	}

}
?>

	<?php
	include('footer.php');
	?>