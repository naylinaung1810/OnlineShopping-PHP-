<?php
session_start();

$pd_id=$_GET['id'];

$_SESSION['cart'][$pd_id]++;

header("location:cart.php");