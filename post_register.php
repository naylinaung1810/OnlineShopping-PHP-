<?php

include ('config.php');

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$password_confirm=$_POST['password_confirm'];


$user=new Users();
$user->singup($name,$email,$password,$password_confirm);