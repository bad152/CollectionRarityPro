<?php

    session_start();
    require_once 'connect.php';

    $name_pro = $_POST['name_pro'];
    $id_category = $_POST['id_category'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
   
    
    $check_cat = mysqli_query($link, "SELECT * FROM `products` WHERE `name` = '$name' ");

    if($id_category <= 0 ){
        $_SESSION['message'] = 'Для создания товара выберите категорию!';
        header('Location: index.php?page=admin'); 
        exit;
    }
   
    if (mysqli_num_rows($check_cat) > 0) {
        $_SESSION['message'] = 'Такой продукт уже существует';
        header('Location: ../../index.php?page=admin');
    }else{


         $path = 'img/' . $_FILES['imgs']['name'];
        if (!move_uploaded_file($_FILES['imgs']['tmp_name'], $path)) {
            header('Location: index.php?page=admin');
           
        }

        mysqli_query($link, "INSERT INTO `products` (`id`, `name`, `category`, `desc`, `imgs`,`price` ) VALUES (NULL, '$name_pro', '$id_category', '$desc', '$path', '$price')");

        $_SESSION['message'] = 'Товар создан!';
        header('Location: ../../index.php?page=admin'); 
}
?>
