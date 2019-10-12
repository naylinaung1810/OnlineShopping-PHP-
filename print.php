<?php
include 'auth.php';
include 'product_config.php';

$id=$_GET['id'];
$pd=new Products();
$od=$pd->getOrderById($id);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print page</title>
    <link rel="stylesheet" href="bots/css/bootstrap.css">
</head>
<body>

  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <h3 class="text-center">My Shopping.......</h3>
              <h3 class="text-center"><small>Happy</small></h3>
              <h3 class="text-center">Yangon...</h3>
              <h3 class="text-center">09745778</h3>
              <div class="row">
                  <div class="col-md-7">
                      <p>Customer : <?php echo $od['name']?></p>
                      <p>Email : <?php echo $od['email']?></p>
                  </div>
                  <div class="col-md-5 ">
                      <p >Order Id : <?php echo $od['id']?></p>
                      <p >Created Date : <?php echo date("D-m-Y/ h:i A",strtotime($od['created_at']))?></p>
                  </div>
              </div>

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
                  <tfoot>
                  <tr class="bg-success">
                  <td colspan="3" class="text-right">Total Amount :</td>
                  <td><?php echo $total_amount?></td>
                  </tr>
                  <tr class="bg-success">
                  <td colspan="3" class="text-right">Gov Tax(5%) :</td>
                  <td><?php echo $total_amount*0.05?></td>
                  </tr>
                  <tr class="bg-success">
                  <td colspan="3" class="text-right">Grand Amount :</td>
                  <td><?php echo $total_amount+$total_amount*0.05?></td>
                  </tr>
                  </tfoot>
              </table>
          </div>
      </div>
  </div>

</body>
</html>
