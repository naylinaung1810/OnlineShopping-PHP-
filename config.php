<?php

session_start();
class Users{
    public $db;
   public function __construct()
    {
        try{
            $this->db=new PDO("mysql:host=localhost; dbname=lessontwo","root","");//connect with database in xampp......
        }catch (PDOException $e)
        {
            die("connection failed");
        }
    }

    public function getProfile()
    {
        $email=$_SESSION['email'];
        $pro_sql="select * from users where email='$email'";
        return $this->db->query($pro_sql)->fetch(PDO::FETCH_ASSOC);
    }

    public function signIn($email,$password)
    {

        $old_sql="select name,email,password from users where email='$email'";
        $old_email=$this->db->query($old_sql)->fetch(PDO::FETCH_ASSOC);
        if($old_email)
        {
          $en_password=md5($password);
          $old_password=$old_email['password'];
          if($old_password==$en_password)
          {
              $_SESSION['login']=$old_email['name'];
              $_SESSION['email']=$old_email['email'];
              header("location:daskboard.php");
          }else
          {
              $_SESSION['err']="Your password is invalid!";
              header("location:login.php");
          }

        }
        else
        {
            $_SESSION['err']="Your email is invalid!";
            header("location:login.php");
        }
    }


    public  function singup($name,$email,$password,$password_confirm)
    {

        $old_sql="select email from users where email='$email'";
        $old_email=$this->db->query($old_sql)->fetch(PDO::FETCH_ASSOC);
        if(!$old_email)
        {
            if($password==$password_confirm)
            {
                $en_pass=md5($password);

                $sql="insert into users (name ,email,password,created_at) values ('$name','$email','$en_pass',now() )";
                $this->db->query($sql);
                $_SESSION['info']="Account success!";
                header("location:register.php");
            }else
            {
                $_SESSION['err']="Miss Password and confirm password";
                header("location:register.php");
            }

        }else
        {
            $_SESSION['err']="Your email have already exit!";
            header("location:register.php");
        }
    }
}

