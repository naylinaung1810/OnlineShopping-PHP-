<?php
session_start();
include 'product_config.php';

$name=$_POST['name'];
$email=$_POST['user_email'];
$phone=$_POST['phone'];
$address=$_POST['address'];
//echo  $name,$email,$phone,$address;
$pd=new Products();
$pd->checkOut($name,$email,$phone,$address);
