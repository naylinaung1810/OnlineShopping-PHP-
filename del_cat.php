<?php

include 'auth.php';
include 'product_config.php';

$id=$_GET['id'];
$conn=new Products();
$conn->getDeleteCategory($id);

