<?php
session_start();
include 'product_config.php';
$pds=new Products();

if(!isset($_SESSION['cart']))
    header("location: index.php");

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
   <div class="row">
       <div class="col-md-4">
           <div class="page-header"><h4><span class="glyphicon glyphicon-sort-by-order-alt"></span> Order Information</h4></div>
           <?php
             ?>
               <form method="post" action="checkOut.php">
                   <div class="form-group">
                       <label for="name1" class="control-label">Full Name</label>
                       <input type="text" class="form-control" id="name1" name="name" required>
                   </div>
                   <div class="form-group">
                       <label for="email" class="control-label">Email</label>
                       <input type="text" class="form-control" id="email" name="user_email" required>
                   </div>
                   <div class="form-group">
                       <label for="ph" class="control-label">Phone</label>
                       <input type="tel" class="form-control" id="ph" name="phone" required>
                   </div>
                   <div class="form-group">
                       <label for="add" class="control-label">Address</label>
                       <textarea class="form-control" name="address" required id="add"></textarea>
                   </div>
                   <div class="form-group">
                       <button type="submit" class="btn btn-primary btn-block" >CheckOut</button>
                   </div>
               </form>

               <?php

           ?>

       </div>
       <div class="col-md-8">
           <div class="page-header"><h2><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h2></div>
           <div class="table-responsive">
               <table class="table table-hover">
                   <thead class="text-primary bg-info" style="font-weight: lighter;font-size: 20px">
                   <td>Name</td>
                   <td>Price</td>
                   <td>Qty</td>
                   <td>Amount</td>
                   </thead>
                   <?php
                   $total_amount=0;
                   if(isset($_SESSION['cart']))
                   {
                       foreach ($_SESSION['cart'] as $id=>$qty)
                       {
                           $rows=$pds->getCart($id);
                           foreach ($rows as $row)
                           {$total_amount+=$row['price']*$qty;
                               ?>
                               <tr>
                                   <td><?php echo $row['p_name']?></td>
                                   <td><?php echo $row['price']?></td>
                                   <td>
                                       <a href="decrease_cart.php?id=<?php echo $row['id']?>"><span class="glyphicon glyphicon-minus-sign"></span> </a>
                                       <?php echo $qty;?>
                                       <a href="increase_cart.php?id=<?php echo $row['id']?>"><span class="glyphicon glyphicon-plus-sign"></span> </a>
                                   </td>
                                   <td><?php echo $qty*$row['price']?></td>
                               </tr>

                               <?php
                           }
                       }
                   }
                   ?>

                   <tfoot class="bg-success" >
                       <td colspan="3" class="text-right">Total Amount :</td>
                       <td><?php echo $total_amount;?></td>
                   </tfoot>

               </table>
           </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-6">
                    <a href="index.php" type="button" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-plus"></span> Continue</a>
                    <a href="del_cart.php" type="button" class="btn btn-danger btn-lg" id="delete"><span class="glyphicon glyphicon-trash"></span> Cancle</a>
                </div>
            </div>

       </div>
   </div>
</div>





<?php include 'footer.php'?>
<script src="bots/js/jquery.js"></script>
<script src="bots/js/bootstrap.js"></script>
<script>

</script>
</body>
</html>