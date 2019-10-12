<?php


include 'auth.php';
include 'config.php';

$row=new Users();
$user=$row->getProfile();
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My App</title>
    <link href="bots/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php
include ('nav.php');
?>

<div class="container-fluid">
    <div class="row" >
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                   <h4><span class="glyphicon glyphicon-user"></span> User Profile</h4>
                </div>
                <div class="panel-body">
                    <div class="col-md-4">

                        <img src="user/profile.png" class="img-responsive img-thumbnail" style="height: 150px;width: 150px">
                    </div>
                    <div class="col-md-8">
                        <ul class="list-group">
                            <li class="list-group-item" style="height: 40px"><div class="col-md-4"><span class="glyphicon glyphicon-user"></span> Username:</div><div class="col-md-8"><?php echo $user['name'];?></div> </li>
                            <li class="list-group-item" style="height: 40px"><div class="col-md-4"><span class="glyphicon glyphicon-envelope"></span> Email:</div><div class="col-md-8"><?php echo $user['email'];?></div> </li>
                            <li class="list-group-item" style="height: 60px"><div class="col-md-4"><!--<span class="glyphicon glyphicon-time"></span>--> Created Date:</div><div class="col-md-8"><?php echo date("D(d)-m-Y",strtotime($user['created_at']));?></div> </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="bots/js/jquery.js"></script>
<script src="bots/js/bootstrap.js"></script>
</body>
</html>