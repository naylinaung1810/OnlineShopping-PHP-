<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My App >> Register</title>
    <link href="bots/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php
include ('nav.php');
?>


<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <?php
                session_start();
                if(isset($_SESSION['err']))
                {?>
               <div class="alert alert-danger">
                   <button type="button" class="close pull-right " aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php
                    echo $_SESSION['err'];
                    ?>
               </div>
               <?php
                }
                unset($_SESSION['err']);

                ?>


            <?php
            //session_start();
            if(isset($_SESSION['info']))
            {?>
                <div class="alert alert-success">
                    <button type="button" class="close pull-right " aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php
                    echo $_SESSION['info'];
                    ?>
                </div>
                <?php
            }
            unset($_SESSION['info']);

            ?>



            <form action="post_register.php" method="post">
                    <h1 class="text-center">SignUp</h1>
                    <div class="form-group">
                        <label class="control-label" for="name" >Name</label>
                        <input class="form-control" type="text" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="email" >Email</label>
                        <input class="form-control" type="email" required id="email" name="email">
                    </div>
                    <div class="form-group" >
                        <label class="control-label" for="password" >Password</label>
                        <input class="form-control" type="password" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label  class="control-label" for="password_com">Password_confirm</label>
                        <input class="form-control" type="password" required name="password_confirm" id="password_com">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg " style="">SignUp</button>
                    </div>
                </form>
                Already have account?<a href="login.php">LogIn</a>


        </div>
    </div>
</div>



<script src="bots/js/jquery.js"></script>
<script src="bots/js/bootstrap.js"></script>
</body>
</html>