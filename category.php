<?php include 'auth.php';?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My App >> Category</title>
    <link href="bots/css/bootstrap.css" rel="stylesheet">



</head>
<body>
<?php
include ('nav.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-8">


            <?php
            if(isset($_SESSION['del_success']))
            {
            ?>
            <div class="alert alert-success" id="alte"><?php echo $_SESSION['del_success'];?>
                <button type="button" class="close" data-dismiss="" id="hide_btn" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <?php
            }
            unset($_SESSION['del_success']);
            ?>

            <?php include 'product_config.php';
            $conn=new Products();
            $get_cat=$conn->getCategory();
            ?>
            <h3><span class="glyphicon glyphicon-list"></span> Category List</h3>
            <hr>
            <table class="table table-hover table-responsive">
                <thead style="background-color: gray;color: white">
                <tr >
                    <td>Id</td>
                    <td>Name</td>
                    <td>Action</td>
                </tr>

                </thead>

                    <?php
                    foreach ($get_cat as $cat):
                    ?>
                        <tr>
                        <td><?php echo $cat['id']?></td>
                        <td><?php echo $cat['cat_name']?></td>
                        <td >
                        <a href="#" class="" data-toggle="modal" data-target="#<?php echo $cat['id']?>"><span class="glyphicon glyphicon-edit"></span> </a>

                            <!-- Modal -->
                            <div class="modal fade" id="<?php echo $cat['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <form method="post" action="post_update_category.php">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Update Category</h4>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="id" value="<?php echo $cat['id']?>">
                                            <div class="form-group">
                                                <label class="control-label" for="cat">Category</label>
                                                <input type="text" class="form-control" name="category" id="cat" value="<?php echo $cat['cat_name']?>">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                            <!-- modal close.....-->

                        <a href="del_cat.php?id=<?php echo $cat['id']?>" class="text-danger"><span class="glyphicon glyphicon-trash"></span> </a>
                        </td>
                        </tr>
                    <?php
                    endforeach;
                    ?>

            </table>


        </div>
        <div class="col-md-4">


            <!--for error message..............-->
            <?php
            if(isset($_SESSION['err']))
            {
                ?>
                <div class="alert alert-danger"><?php echo $_SESSION['err'];?></div>
                <?php
            }
            unset($_SESSION['err']);//delete message in session['err']........

            //for success message...........

            if(isset($_SESSION['info']))
            {
                ?>
                <div class="alert alert-success"><?php echo $_SESSION['info'];?></div>
                <?php
            }
            unset($_SESSION['info']);//delete message in session['info']...........
            ?>


            <h3><span class="glyphicon glyphicon-plus"></span> Add Category</h3>
            <hr>
            <form method="post" action="post_category.php">
            <div class="form-group">
                <label class="control-label" for="cat_name">
                    Category Name
                </label>
                <input type="text" class="form-control" id="cat_name" name="cat_name" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script src="bots/js/jquery.js"></script>
<script src="bots/js/bootstrap.js"></script>
<script>
    $(function () {
        setTimeout(function () {
            $('.alert').fadeOut();
        },2000);

        $("#hide_btn").click(function () {
            $(".alert").fadeOut();
        })
    })
</script>
</body>
</html>