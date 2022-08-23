  <span></span>

<?php
include('head.php');

include('connect.php');

$id=$_GET['id'];
?>

<div class="row">
	<div class="col-md-2"></div>

	<div class="col-md-6 col-md-8">
		
		<div align="left" style="padding-left: 10px; background-color: white;">
			<fieldset>
<?php

$sql6="SELECT * FROM topics WHERE id='$id' ";
$result6=mysql_query($sql6);

$rows=mysql_fetch_assoc($result6);

    ?>
    <legend><?php echo $rows['topic'];  ?></legend>


   
       <div>
    <h5>
    <div>
    <i class="fas fa-calendar"></i>
        <?php echo $rows['date'].' '.$rows['time'];  ?> 

            <i class="fas fa-eye"></i>    
        <?php echo $rows['view'];  ?>   Views   </span>
    
    </div>

    <?php
$view_count=$rows['view'];

$view=$view_count+1;

$sql2="UPDATE topics SET view=$view WHERE id=$id ";
$result2=mysql_query($sql2);
    ?>
    </div></h5>
   </div>
   <img src="images/<?php echo $rows['pic'];  ?>" width="500" class="img-responsive">
<br>
   <div style="width: ; ">
            <h5><?php echo $rows['description'];  ?></h5>
   </div>
   <div>
   	<font color="green">Posted by: Admin</font>
   </div>
    
</fieldset>
	

	</div>
	<div class="col-md-3" style="overflow-y: scroll; height: 600px;">
        
        <fieldset>

    <legend>Other News Links</legend>

<?php
include ('connect.php');


$id=$_GET['id'];

$sql="SELECT * FROM topics WHERE id!='$id' ORDER BY id DESC ";
$result=mysql_query($sql);

while($rows=mysql_fetch_assoc($result)){



?>
<article class="c-article-card l-hero-section__item">
  
  <a href="view_news.php?id=<?php echo $rows['id'];  ?>" class="c-article-card__headline">
    <span class="c-article-card__headline-hover-inner"><strong style="text-shadow: 2px 2px 8px orange; color: green;"><?php echo $rows['topic'];  ?></strong> </span>
  </a>
<div class="c-article-info c-article-card__info fadeInDown">
    <i class="fas fa-clock"></i>
    <?php
    echo $rows['date'].' '.$rows['time'];
    ?> 

            <span class="c-article-info__views">  <i class="fas fa-eye"></i>  
      <?php echo $rows['view'];  ?>   Views   </span>
    
    </div>
</article>
<hr>
<?php
}
?>
</fieldset>
       
    </div>
</div>





<?php
include('footer.php');
?>