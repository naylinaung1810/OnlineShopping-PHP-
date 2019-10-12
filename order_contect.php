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
        <div class="col-md-12">

            <?php
            include 'product_config.php';
            $pd=new Products();
            $orders=$pd->getOrder();
            foreach ($orders as $od)
            {
                ?>

                <div class="panel panel-primary">
                    <div class="panel-heading text-center"><h4>Order Id :<?php echo $od['id'] ?></h4></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                <p>Name : <?php echo $od['name']?></p>
                                <p>Email : <?php echo $od['email']?></p>
                                <p>Phone : <?php echo $od['phone']?></p>
                                <p>Order Date : <?php echo $od['created_at']?></p>
                            </div>
                            <div class="col-md-8 table-responsive" >
                                <table class="table table-hover">
                                    <thead class="bg-info">
                                    <td>Item Name</td>
                                    <td>Price</td>
                                    <td>Qty</td>
                                    <td>Amount</td>
                                    </thead>
                                <?php
                                $total_amount=0;
                                $items=$pd->getOrderItems($od['id']);
                                foreach ($items as $item)
                                {$total_amount+=$item['price']*$item['qty'];
                                    ?>
                                    <tr>
                                        <td><?php echo $item['item_name']?></td>
                                        <td><?php echo $item['price']?></td>
                                        <td><?php echo $item['qty']?></td>
                                        <td><?php echo $item['price']*$item['qty']?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                    <tfoot class="bg-success">
                                    <td colspan="3" class="text-right">Total Amount :</td>
                                    <td><?php echo $total_amount?></td>
                                    </tfoot>
                                </table>
                                <a href="print.php?id=<?php echo $od['id'] ?>" target="_blank" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span> </a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
            }
            ?>
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