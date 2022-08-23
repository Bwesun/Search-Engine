<?php
$connect=mysqli_connect("localhost:3306", "censono1_innocent", "inno08144529253", "censono1_tab");


$output='';
$sql="SELECT * FROM users WHERE name LIKE '%".$_POST['search']."%' OR keyword LIKE '%".$_POST['search']."%' ";
$result=mysqli_query($connect, $sql);

if(mysqli_num_rows($result)>0)
{
	
	$output .= '<div class="table">
					<table class="table table-striped tableresponsive">
						<tr>
						</tr>
	';
	while($rows=mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td><a href="view_profile.php?id='.$rows['id'].'" title="View Profile">'.$rows["name"].'</a></td>
				<td>  <a class="btn btn-xs btn-success" href="view_profile.php?id='.$rows["id"].'">View Profile</td></a>
				</td>
				</tr>
		';
	}
	echo $output;
}
else
{
	echo '<font color="white"><strong>No Data Found</strong></font>';
}

?>