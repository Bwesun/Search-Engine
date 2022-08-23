<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="../bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css">
<script type="text/javascript" language="javascript" src="../jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="../bootstrap.min.js"></script>
	<style type="text/css">
		body{
			margin-left: 3%;
			margin-right: 3%;
		}
		.nav-tabs{
			background-color: #FFFF99;
			margin-top: 1%;
			border: 1px solid #FFFF66;
		}
		#content{
			border-radius: 6px;
		}
		#profile{
			position: fixed;
			top: 20px;
			left: 82%;
			width: 60%
		}
		#wrapper{
			background-color: #FFFFCC;
		}
		#nav:hover{
			background-color: green;
			color: white;
		}
		#see input[type=text] {
    box-sizing: border-box;
    border: 2px solid white;
    border-radius: 8px;
    width: 40%;
    font-size: 16px;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 0px 7px 0px 7;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
    padding: 1% 1% 1% 1% ;
}

	</style>
</head>
<body>
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-6 col-md-8 ">
		<nav class="navbar navbar-default" style="background-color: #00CC33; color: white;" role="navigation">
	<div class="navbar-header">
		<button style="color: white;" type="button" class="navbar-toggle" data-toggle="collapse"
		data-target="#example-navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" style="color: white;" href="../index.php"><strong>NILEST SEARCH</strong>  <span class="glyphicon glyphicon-home"></span></a>
	</div>
	<div class="collapse navbar-collapse" id="example-navbar-collapse">
		<ul class="nav navbar-nav">
			<li><a href="index.php" style="color: white;"><span class="glyphicon glyphicon-home"></span> <b>Home</b></a></li>
			
		</ul>
		

<ul class="nav navbar-nav navbar-right">
			<li><a href="index.php" role="link" style="color: white;" onclick="goBack()"><b><span class="glyphicon glyphicon-arrow-left"></span> Back</b></a></li>
			<li><a href="logout.php" role="link" style="color: white;" onclick="goBack()"><b><span class="glyphicon glyphicon-arrow-left"></span> Logout</b></a></li>
			
		</ul>
	</div>
</nav>
</div>
</div>

		<script type="text/javascript">
			function goBack(){
				window.history.back();
			}
		</script>