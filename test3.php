<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<style type="text/css">
		.input{
			width: 300px;
			height: 35px;
			border-radius: 5px;
			font-family: sans-serif;
		}
		.sub{
			width: 50px;
			height: 35px;
			border-radius: 5px;
		}
		body{
			font-family: sans-serif;
		}
	</style>
</head>
<body>

<div>
	<div style="float: left; width: 40%;"> </div>
	<div align="center" style="background-color: gray; box-shadow: 8px 5px 8px 5px grey; border: 1px solid black; border-radius: 10px; color: white; float: left; width: 35%; top: 10%; left: 30%; position: absolute;">
		<br>
		<br>
		<img src="search.png" width="150" style="border-radius: 50%;">
	<fieldset><legend><strong>User Login</strong></legend>
	<table>
		<form method="post" action="submit.php">
		<tr>
			<td>Username</td>
			<td>:</td>
			<td><input class="input" type="text" name="username"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td>:</td>
			<td><input class="input" type="text" name="password"></td>
		</tr>
		<tr>
			<td colspan="3" align="center"><input class="sub" type="submit" name="" value="Login"></td>
		</tr>
	</form>
	</table>
	</fieldset>
</div>
</div>


</body>
</html>