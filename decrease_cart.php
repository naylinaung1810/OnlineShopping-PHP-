<?php
session_start();

$id=$_GET['id'];

foreach ($_SESSION['cart'] as $cart_id=>$qty)
{
    if($cart_id==$id)
    {
        if($qty<=1)
        {
            if(count($_SESSION['cart'])<=1)
                unset($_SESSION['cart']);
            else
            unset($_SESSION['cart'][$id]);
        }else
        {

            $_SESSION['cart'][$id]--;
        }
    }
}
header("location:cart.php");