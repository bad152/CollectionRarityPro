<?php

    session_start();
    require_once 'connect.php';

    $product_id = $_GET['id'];
    $product_upd = mysqli_query($link, "SELECT * FROM `products` WHERE `id` = '$product_id'");
    $product_upd = mysqli_fetch_assoc($product_upd);

    $id = $_POST['id'];
    $name_pro = $_POST['name_pro'];
    $id_category = $_POST['id_category'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
   
    
    $check_cat = mysqli_query($link, "SELECT * FROM `products` WHERE `name` = '$name' ");
   
    if (mysqli_num_rows($check_cat) > 0) {
        $_SESSION['message'] = 'Такой продукт уже существует';
        header('Location: ../../index.php?page=admin');
    }

       
         $path = 'img/' . $_FILES['imgs']['name'];
        if (!move_uploaded_file($_FILES['imgs']['tmp_name'], $path)) {
            header('Location: index.php?page=admin');
           
        }


        if ($path === 'img/'){

           if($product_upd['imgs'] === NULL){
            
           
           }else{
             $path = $product_upd['imgs'];
           }
            
        }

        mysqli_query($link, "UPDATE `products` SET `name` = '$name_pro', `category` = '$id_category', `desc` = '$desc', `imgs` = '$path', `price` = '$price', `discount` ='$discount' WHERE `products`.`id` = '$id';");
        $_SESSION['message'] = 'Продукт успешно изменен!';
        header('Location: index.php?page=admin');
       
?>
