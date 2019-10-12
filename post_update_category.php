<?php
include 'auth.php';
include 'product_config.php';


$id=$_POST['id'];
$name=$_POST['category'];

$con=new Products();
$con->updateCategory($id,$name);

header('location: category.php');
