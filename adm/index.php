
 <span></span>

<?php
include('head.php');

?>

<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-6 col-md-8" style="overflow-y: scroll; height: 80%;">
		<fieldset>
			<legend>Admin Control Panel</legend>

<div align="">

	<a href="input.php" class="btn btn-success btn-lg"><i class="fas fa-user-plus"></i> Insert User Data</a>  <a href="delete.php" class="btn btn-success btn-lg"><i class="fas fa-eraser"></i> Delete User Data</a>  <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#basicExampleModal">
 <span class="fas fa-plus"></span> Add News</button>   <a href="delete_news.php" class="btn btn-success btn-lg"><i class="fas fa-eraser"></i> Delete News</a><br><br>

<!-- Add News Pop-up Modal-->
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Add News</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form method="post" action="" enctype="multipart/form-data" class="form-group">
      		<input type="text" required name="topic" class="form-control" placeholder="Enter Topic"><br>
			<textarea required name="description" class="form-control" placeholder="Enter Story..."></textarea><br>
      		Select Picture:<input type="file" onchange="previewFile()" name="pic" class="form-control"  required>
      		<img class="view img-thumbnail img-responsive" src="" width="100"  alt="">
      		<script type="text/javascript">
function previewFile() {
  var preview = document.querySelector('.view');
  var file = document.querySelector('input[type=file]').files[0];
  var reader = new FileReader();

  //EXPLANATION------>>>>
  // when user select an image, `reader.readAsDataURL(file)` will be triggered
  // reader instance will hold the result (base64) data
  // next, event listener will be triggered and we call `reader.result` to get
  // the base64 data and replace it with the image tag src attribute
  reader.addEventListener("load", function() {
    console.log('before preview');
    preview.src = reader.result;
    console.log('after preview');
  }, false);

  if (file) {
    console.log('inside if');
    reader.readAsDataURL(file);
  } else {
    console.log('inside else');
  }
}
</script>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="sub" class="btn btn-primary" value="Submit">
        </form>
      </div>
    </div>
  </div>
</div>

<?php

if(isset($_POST['sub'])){
	include('connect.php');

	$topic=$_POST['topic'];
	$description=$_POST['description'];
	$pic=$_POST['pic'];

	$date=date("y/m/d");
	$date=date(l).', '.$date;
	$time=date("h:i A");

$filename=$_FILES['pic']['name'];
	move_uploaded_file($_FILES['pic']['tmp_name'], "../images/".$_FILES['pic']['name']);


$sql="INSERT INTO topics (topic, description, pic, date, time, short_desc, view)VALUES('$topic', '$description', '$filename', '$date', '$time', '$description', '1') ";
$result=mysql_query($sql);

//STopped at declaring session for the movement stuff for success.php

	if($result){
        echo '
<div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <em>Feedback: </em>News Added Successfully! </b>
            </div>
        ';
    }else{
        echo '
        <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <em>Feedback: </em>Error in Adding News. Please try again! </b>
            </div>
            '.mysql_error();
    }
}


?>

</div>
		</fieldset>
	</div>
</div>





<?php
include('../footer.php');
?>