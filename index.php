<?php
session_start();
include 'product_config.php';

$pds=new Products();

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

<div class="container">
    <?php include 'menu.php'?>
    <div class="row">
        <?php
        if(!empty($_GET['search']))
        {
            $name=$_GET['search'];
            $items=$pds->searchProducts($name);
        }else
            {
            if(!empty($_GET['cat_id']))
            {
                $cat_id=$_GET['cat_id'];
                $items=$pds->getProductByCategory($cat_id);
            }else
            {
                $items=$pds->getProduct();
            }
           }
        foreach ($items as $item):
            ?>
            <div class="col-md-3 col-sm-6">
                <div class="thumbnail">
                    <img src="images/<?php echo $item['image']; ?>" class="img-rounded img-responsive collapse in" style="height: 150px ">
                    <div id="<?php echo $item['id']?>" class="collapse">
                        <p>Category : <?php echo $item['cat_name']?></p>
                        <p>Created Date : <?php echo $item['created_at']?></p>
                    </div>


                <h5 class="">Name: <?php echo $item['p_name']?></h5>
                <p>Price: <?php echo $item['price']?> MMK<br>

                    <!-- for see detail called collapse....... -->
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $item['id']?>" aria-expanded="true" aria-controls="collapseOne">
                     Detail...
                     </a>


                    <!-- end of collapse...... -->

                    <a class="btn btn-primary btn-block" href="add_cat.php?id=<?php echo $item['id']?>"><span class="glyphicon glyphicon-shopping-cart"></span> Buy</a>
                </div>
            </div>
        <?php
        endforeach;;
        ?>
    </div>
</div>





<?php include 'footer.php'?>
<script src="bots/js/jquery.js"></script>
<script src="bots/js/bootstrap.js"></script>
<script>
  $(function () {
      $("#search").onkeyup(function () {
          <?php
          $name=$_GET['search'];
          $items=$pds->searchProducts($name);
          ?>
      })
  })
</script>
</body>
</html>