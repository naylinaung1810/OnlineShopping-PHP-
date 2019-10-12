<?php
include ('auth.php');
include 'product_config.php';
$pts=new Products();
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My App >> Dash_board</title>
    <link href="bots/css/bootstrap.css" rel="stylesheet">
    <link href="bots/css/dataTable.css" rel="stylesheet"><!-- for data table..... -->
</head>
<body>
<?php
include ('nav.php');
?>

<div class="container">
    <div class="row">
        <?php
        if(isset($_SESSION['info']))
        {
            ?>
            <div class="alert alert-success" id="alte"><?php echo $_SESSION['info'];?>
                <button type="button" class="close" data-dismiss="" id="hide_btn" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <?php
        }
        unset($_SESSION['info']);
        ?>

        <h3><span class="glyphicon glyphicon-dashboard"></span> Product Avaliable</h3>
        <hr>
        <div class="col-md-8 table-responsive">
            <table class="table table-hover" id="dataTable">
                <thead class="">
                <tr style="background-color: gray;color: white">
                    <td>id</td>
                    <td>Images</td>
                    <td>Name</td>
                    <td>price</td>
                    <td>Cat_name</td>
                    <td>Action</td>
                </tr>
                </thead>
                <?php
                $product=$pts->getProduct();
                foreach ($product as $item):

                    ?>
                    <tr>
                    <td><?php echo $item['id']?></td>
                        <td><img src="images/<?php echo $item['image']?>" style="width: 50px;height: 50px" class="img-responsive img-thumbnail"></td>
                        <td><?php echo $item['p_name']?></td>
                        <td><?php echo $item['price'] ?> MMK</td>
                        <td><?php echo $item['cat_name']?></td>
                        <td>

                            <a href="edit_product.php?id=<?php echo $item['id']?>"><span class="glyphicon glyphicon-edit"></span> </a>
                            <a href="#" class="text-danger" data-toggle="modal" data-target="#d<?php echo $item['id']?>"><span class="glyphicon glyphicon-trash"></span> </a>

                            <!-- For Delete Modal box ....... -->
                            <div class="modal fade" id="d<?php echo $item['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Warning....</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-2 text-right" style="font-size: 50px">
                                                    <span class="glyphicon glyphicon-alert"></span>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="alert alert-danger">
                                                        Are you sure to drop <?php echo $item['p_name']?> ?
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <a href="del_product.php?id=<?php echo $item['id']?>" type="button" class="btn btn-primary">Agree</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of delete modal box ..... -->

                        </td>
                </tr>
                <?php

                endforeach;

                ?>
            </table>

        </div>
        <!-- For add product list...... -->
        <div class="col-md-4">
            <div class="panel-primary panel">
                <div class="panel-heading">
                    <h3><span class="glyphicon glyphicon-plus-sign"></span> Add Product List</h3>
                </div>
                <div class="panel-body">
                    <form enctype="multipart/form-data" action="post_product.php" method="post">
                        <div class="form-group">
                            <label class="control-label" for="p_name">Item Name</label>
                            <input type="text" class="form-control" name="p_name" id="p_name" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="price">Price</label>
                            <input type="number" class="form-control" id="price" name="price" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="image">Image</label>
                            <input type="file" class="form-control" id="image" name="image" required style="width: auto;height: auto">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="cat_id">Category Name</label>
                            <select class="form-control" name="cat_id" id="cat_id">
                                <option value="">Select category</option>
                                <?php
                                $cat_name=$pts->getCategory();
                                foreach ($cat_name as $cat):
                                    ?>
                                    <option value="<?php echo $cat['id'] ?>"><?php echo $cat['cat_name']?></option>

                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg">Save</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>
<script src="bots/js/jquery.js"></script>
<script src="bots/js/bootstrap.js"></script>
<script src="bots/js/jqueryDataTable.js"></script><!-- for data table... -->
<script src="bots/js/bootstratDataTable.js"></script><!-- for data table... -->
<script>
    $(function () {
       setTimeout(function () {
            $('#alte').fadeOut();
        },2000);

        $("#hide_btn").click(function () {
            $(".alert").fadeOut();
        })

        $("#dataTable").dataTable();// for data table
    })
</script>
</body>
</html>