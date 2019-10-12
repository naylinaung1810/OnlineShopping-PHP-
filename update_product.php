<?php
include 'auth.php';
include 'product_config.php';

$id=$_POST['id'];
$p_name=$_POST['p_name'];
$price=$_POST['price'];
$image=$_FILES['image'];
$cat_id=$_POST['cat_id'];

$pds=new Products();
$pds->updateProduct($id,$p_name,$price,$image,$cat_id);