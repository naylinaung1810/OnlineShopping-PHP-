<?php
include 'auth.php';
include 'product_config.php';

$id=$_GET['id'];

$pds=new Products();
$pds->deleteProduct($id);
