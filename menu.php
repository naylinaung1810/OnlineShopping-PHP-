
<?php// session_start(); ?>

<nav class="navbar navbar-default" style="background-color: #454a31;">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home"></span> </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            <ul class="nav navbar-nav" style="">

                <?php $cats=$pds->getCategory();
                foreach ($cats as $cat):
                    ?>
                <li style=""><a href="index.php?cat_id=<?php echo $cat['id']?>"><?php echo $cat['cat_name'] ?></a> </li>

                <?php
                endforeach;;
                ?>
            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>