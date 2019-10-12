<?php
 session_start();

 unset($_SESSION['login']);
unset($_SESSION['email']);
 header("location:login.php");