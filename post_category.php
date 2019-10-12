<?php

include 'auth.php';
include 'product_config.php';

$name=$_POST['cat_name'];

$product=new Products();
$product->newCategory($name);