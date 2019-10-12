<?php
include 'auth.php';
include 'product_config.php';

$name=$_POST['p_name'];
$price=$_POST['price'];
$image=$_FILES['image'];
$id=$_POST['cat_id'];

$pd=new Products();
$pd->postNewProduct($name,$price,$id,$image);