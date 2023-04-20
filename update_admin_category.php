<?php

    session_start();
    require_once 'connect.php';

    $category_id = $_GET['id'];
    $category_upd = mysqli_query($link, "SELECT * FROM `category` WHERE `id_category` = '$category_id'");
    $category_upd = mysqli_fetch_assoc($category_upd);

    $id = $_POST['id'];
    $name = $_POST['name'];
    
    $check_cat = mysqli_query($link, "SELECT * FROM `category` WHERE `name` = '$name' ");
   
    if (mysqli_num_rows($check_cat) > 0) {
        $_SESSION['message'] = 'Такая категория уже существует';
        header('Location: ../../index.php?page=admin');
    }

   

        
        $path = 'img/' . $_FILES['img']['name'];
        if (!move_uploaded_file($_FILES['img']['tmp_name'], $path)) {
            header('Location: index.php?page=admin');
           
        }

         if ($path === 'img/'){

           if($category_upd['img'] === NULL){
            
           
           }else{
             $path = $category_upd['img'];
           }
            
        }

        mysqli_query($link, "UPDATE `category` SET `name` = '$name', `img` = '$path' WHERE `category`.`id_category` = '$id';");
        $_SESSION['message'] = 'Категория успешно обновлена!';
        header('Location: ../../index.php?page=admin');

?>
