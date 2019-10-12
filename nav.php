
<?php
//session_start();
$totalQty=0;
if(isset($_SESSION['cart']))
{
    foreach ($_SESSION['cart'] as $id=>$qty)
    {
        $totalQty+=$qty;
    }
}
 ?>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-shopping-cart"></span> Our Shop</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> <span class="badge"><?php echo $totalQty;?></span></a></li>
            </ul>
            <form class="navbar-form navbar-left" role="search" action="index.php" method="get">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search" name="search" id="search">
                </div>
                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> </button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if(isset($_SESSION['login']))
                {
                    ?>
                    <li><a href="daskboard.php"><span class="glyphicon glyphicon-dashboard"></span> Dash_board</a> </li>
                    <li><a href="category.php"><span class="glyphicon glyphicon-list-alt"></span> Category</a> </li>
                    <li><a href="order_contect.php">Order</a> </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['login']?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                        </ul>
                    </li>
                    <?php
                }else
                {
                    ?>

                    <li><a href="login.php"> <span class="glyphicon glyphicon-log-in"></span> LogIn</a> </li>
                    <?php
                }
                ?>


            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>