<?php
include('head.php');

?>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
    	    
.profile-panel .profile-info {
    padding: 0;
    margin: 0;
    list-style: none;
}
.panel-footer {
    border-bottom-left-radius: 4px;
    border-bottom-right-radius: 4px;
    color: #fff;
}

.panel-footer {
    padding: 10px 15px;
    background-color: #f3f5f6;
    border-top: 1px solid #ddd;
}

.panel-default .panel-footer {
    color: #768399;
    background-color: #e4e9eb;
    border: 1px solid #e4e9eb;
    border-top: none;
}

.panel.plain .panel-footer {
    border-top: none;
}

.panel-footer .white-content {
    color: #768399;
    background: #fff;
    background-color: #fff;
}

.profile-panel .profile-stats-info a {
    font-size: 16px;
    margin-right: 10px;
    margin-top: 10px;
    color: #79859b;
    padding-left: 5px;
}

.profile-panel .user-name {
    margin-top: 10px;
    font-size: 18px;
    margin-bottom: 5px;
    padding-left: 5px;
}

.profile-panel .profile-avatar img {
    border-radius: 50%;
    border: 1px solid #e7e7e2;
}

.profile-panel .profile-avatar {
    border-radius: 50%;
    padding: 10px;
    border: 1px solid #e7e7e2;
    float: left;
}

.panel-default .panel-body {
    border: 1px solid #e4e9eb;
    border-top: none;
}

.panel-body {
    padding: 15px;
}

.profile-panel .profile-image {
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
}

.panel {
    position: relative;
    margin-bottom: 25px;
    border-radius: 4px;
    border: 0;
    box-shadow: none;
} 

.panel-default {
    border-color: #e4e9eb;
}

.panel.plain .panel-default .panel-heading {
    border: 1px solid #e4e9eb;
    border-bottom: none;
}
.panel.plain .panel-heading {
    border-bottom: none;
}
.panel.panel-default .panel-heading {
    color: #768399;
}

.panel-heading .white-content {
    color: #768399;
    background: #fff;
    background-color: #fff;
}
.panel-default .panel-heading {
    color: #768399;
    background-color: #e4e9eb;
    border-color: #e4e9eb;
}
.white-content {
    color: #768399;
    background: #fff;
    background-color: #fff;
}
.p-left {
    padding-left: 0!important;
}

.p-right {
    padding-right: 0!important;
}
.panel-heading {
    padding: 0 15px;
    min-height: 4px;
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
}
    </style>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="panel panel-default plain profile-panel">

<?php
//NB: category is either "Staff" or "Student"
include('connect.php');

$id=$_GET['id'];

$sql="SELECT * FROM users WHERE id='$id' ";
$result=mysql_query($sql);

$rows=mysql_fetch_assoc($result);
?>
        <div class="panel-body">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="profile-avatar">
                    <img class="img-responsive" src="user.png" alt="profile picture">
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12">
                <div class="user-name">

                    <?php echo $rows['name'];  ?> <span class="label label-success"><?php echo $rows['category'];  ?></span>
                </div>
                <div class="user-information">
                    
                </div>
                <div class="profile-stats-info">
                    <a>  <strong>ID Number:</strong> <font color="green"><?php echo $rows['regnum'];  ?></font>  <strong></strong></a><br>
                    <a>    </i> <strong>Keywords: </strong> <font color="green"><?php echo $rows['keyword'];  ?></font></a>
                    <a>     </i> <strong></strong></a>
                </div>
            </div>
        </div>
        <div class="panel-footer white-content">
            <ul class="profile-info">
                <li><i class="glyphicon glyphicon-phone"></i>      <?php echo $rows['phone'];  ?></li><br>
                <li><i class="glyphicon glyphicon-map-marker"></i>  <?php echo $rows['address'];  ?></li><br>
                <li><i class="glyphicon glyphicon-envelope"></i>    <?php echo $rows['email'];  ?></li><br>
                <li><i class="glyphicon glyphicon-user"></i>        <?php echo $rows['post'];  ?></li>
            </ul>
        </div>
    </div>
    </div>
</div>

<script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<?php
include('footer.php');
?>