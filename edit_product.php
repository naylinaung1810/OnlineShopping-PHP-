<?php
include 'auth.php';
include "product_config.php";

$id=$_GET['id'];
$pds=new Products();
$row=$pds->getProductById($id);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My App >> Edit Items</title>
    <link href="bots/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php
include ('nav.php');
?>


<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">

                    <h3><span class="glyphicon glyphicon-list"></span> Edit Items</h3>

                </div>
                <div class="panel-body">
                    <form enctype="multipart/form-data" action="update_product.php" method="post">
                        <input type="hidden" value="<?php echo $row['id']?>" name="id">
                        <div class="form-group">
                            <label class="control-label" for="p_name">Item Name</label>
                            <input value="<?php echo $row['p_name'] ?>" type="text" class="form-control" name="p_name" id="p_name" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="price">Price</label>
                            <input value="<?php echo $row['price'] ?>" type="number" class="form-control" id="price" name="price" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="image">Image</label>
                            <input type="file" class="form-control" id="image" name="image" style="height: auto">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="cat_id">Category Name</label>
                            <select class="form-control" name="cat_id" id="cat_id">
                               <?php
                               $cats=$pds->getCategory();
                               foreach ($cats as $item):
                                   ?>
                               <option <?php if($row['cat_id']==$item['id']): echo 'selected'; endif; ?> value="<?php echo $item['id'] ?>"><?php echo $item['cat_name']?></option>
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
</body>
</html>
