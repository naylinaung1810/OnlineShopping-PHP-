<?php

session_start();
class Products{
    public $db;
    public function __construct()
    {
        try{
            $this->db=new PDO("mysql:host=localhost; dbname=lessontwo","root","");
        }catch (PDOException $e)
        {
            die("connection failed");
        }
    }

    public function newCategory($name)
    {
        $old_sql="select * from category where cat_name='$name'";
        $sql=$this->db->query($old_sql)->fetch(PDO::FETCH_ASSOC);

        if(!$sql)
        {
            $my_sql="insert into category (cat_name) values ('$name')";
            $result=$this->db->query($my_sql);
            if($result)
            {
                $_SESSION['info']="Saved in database";
            }
            else
            {
                $_SESSION['err']="Your insert Sql is error";
            }
            header("location:category.php");
        }else
        {
            $_SESSION['err']="Your Category name is exist";
            header("location: category.php");
        }
    }

    public function getCategory()
    {
        $get_sql="select * from category";
        return $this->db->query($get_sql);
    }

    public function getDeleteCategory($id)
    {
        $del_sql="delete from category where id='$id'";
        $this->db->query($del_sql);
        $_SESSION['del_success']="Delection is success";
        header('location: category.php');
    }

    public function updateCategory($id,$name)
    {
        $sql="update category set cat_name='$name' where id='$id'";
        $this->db->query($sql);
        $_SESSION['del_success']="Update OK";
    }

    public function postNewProduct($name,$price,$id,$images)
    {

        $img_name=date("y-m-d-h-i-s").'.'.$images['name'];
        $img_temp=$images['tmp_name'];
        move_uploaded_file($img_temp,"images/$img_name");
        $sql="insert into product (p_name,price,image,cat_id,created_at) values ('$name','$price','$img_name','$id',now())";
        $this->db->query($sql);
        $_SESSION['info']="Your Item is added";
        header("location: daskboard.php");
    }

    //
    public function getProduct()
    {
        $sql="select product.*,category.cat_name from product left join category on product.cat_id=category.id";
        return $this->db->query($sql);
    }

    //used del_product.php........
    public function deleteProduct($id)
    {
        $pd="select image from product where id='$id'";
        $row=$this->db->query($pd)->fetch(PDO::FETCH_ASSOC);
        $old_img=$row['image'];
        unlink("images/$old_img");//delete file,image,video etc........

        $sql="delete from product where id='$id'";
        $this->db->query($sql);

        $_SESSION['info']="The selected item is deleted...";
        header("location: daskboard.php");
    }

    //used edit_product.php.......
    public function getProductById($id)
    {
        $sql="select * from product where id='$id'";
        return $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
    }


    //used update_product.php............
    public function updateProduct($id,$p_name,$price,$image,$cat_id)
    {
        $img_name=$image['name'];
        if(!empty($img_name))
        {
            $ss="select image from product where id='$id'";
            $row=$this->db->query($ss)->fetch(PDO::FETCH_ASSOC);
            $old_img=$row['image'];
            unlink("images/$old_img");
            $tmp_image=$image['tmp_name'];
            $new_img=date("y-m-d-h-i-s").'.'.$img_name;
            $sql="update product set p_name='$p_name',price='$price',image='$new_img',cat_id='$cat_id' where id='$id'";
            move_uploaded_file($tmp_image,"images/$new_img");
        }else
        {
            $sql="update product set p_name='$p_name',price='$price',cat_id='$cat_id' where id='$id'";
        }
        $this->db->query($sql);
        $_SESSION['info']="The selected item is updated";
        header("location: daskboard.php");
    }

    public function getProductByCategory($cat_id)
    {
        $sql="select product.*,category.cat_name from product left join category on product.cat_id=category.id where cat_id='$cat_id'";
        return $this->db->query($sql);
    }

    public function searchProducts($p_name)
    {
        $sql="select product.*,category.cat_name from product left join category on product.cat_id=category.id where p_name like '%$p_name%'";
        return $this->db->query($sql);
    }

    public function getCart($id)
    {
        $sql="select * from product where id='$id'";
        return $this->db->query($sql);
    }

    public function checkOut($name,$email,$phone,$address)
    {
        $sql="insert into orders(name,email,address,phone,created_at) values ('$name','$email','$address','$phone',now())";
        $this->db->query($sql);
        $order_id=$this->db->lastInsertId();
        //echo  $order_id;

        foreach ($_SESSION['cart'] as  $id=>$qty)
        {
            $sel_sql="select * from product where id='$id'";
            $items=$this->db->query($sel_sql);

            foreach ($items as $item)
            {
                $item_name=$item['p_name'];
                $price=$item['price'];

                $ord_sql="insert into order_items (order_id,item_name,price,qty) values ('$order_id','$item_name','$price','$qty')";
                $this->db->query($ord_sql);
                unset($_SESSION['cart']);
            }

        }

        header("location:index.php");

    }

    public function getOrder()
    {
        $sql="select * from orders order by id desc ";
        return $this->db->query($sql);
    }

    public function getOrderItems($order_id)
    {
        $sql="select * from order_items where order_id='$order_id'";
        return $this->db->query($sql);

    }

    public function getOrderById($id)
    {
        $sql="select * from orders where id='$id'";
        return $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

}